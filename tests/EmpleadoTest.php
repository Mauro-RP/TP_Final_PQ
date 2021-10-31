<?php 
class EmpleadoTest extends \PHPUnit\Framework\TestCase 
{
	public function crearE_Eventual($nombre, $apellido, $dni, $salario, $montos)
	{
		$e = new \App\EmpleadoEventual($nombre,$apellido,$dni,$salario,$montos);
		return $e;
	}

	public function crearE_Permanente($nombre, $apellido, $dni, $salario, $fechaIngreso = null)
	{
		$e = new \App\EmpleadoPermanente($nombre,$apellido,$dni,$salario,$fechaIngreso);
		return $e;
	}

	public function testNombreApellidoDelEmpleado()
	{
		$e = $this->crearE_Eventual("Nicolas","Quartero",36000111,60000,$montos= array (100,200,300,400));
		$this->assertEquals("Nicolas Quartero",$e->getNombreApellido());
		$p = $this->crearE_Permanente("Mauro","Prieto",36207505,70000);
		$this->assertEquals("Mauro Prieto",$p->getNombreApellido());
	}

	public function testNoSePuedeConstruirConDNIconteniendoLetrasEmpleadoEventual()
	{
		$this->expectException(\Exception::class);
		$e = $this->crearE_Eventual("Nicolas","Quartero",'361a12b2',60000,$montos= array (100,200,300,400));	
	}

	public function testNoSePuedeConstruirConDNIconteniendoLetrasEmpleadoPermanente()
	{
		$this->expectException(\Exception::class);
		$p = $this->crearE_Permanente("Mauro","Prieto",'361a12b2',70000);
	}
}

?>