<?php
	require_once 'EmpleadoTest.php';
	
	class EmpleadoPermanenteTest extends EmpleadoTest{
		
		//Funcion crear un Nuevo Empleado Eventual
		public function crear($nombre="Adriano", $apellido="Caloni", $dni=36543024, $salario=15000, $fechaIngreso=null){
			$fecha = new \DateTime();
			$ep = new \App\EmpleadoPermanente($nombre, $apellido, $dni, $salario, $fechaIngreso);
			return $ep;
		}

		//Tests 1/6: getFechaIngreso()
		public function testSePuedeCrearYObtenerFechaIngreso(){
			$hoy = new DateTime();
			$ep= $this->crear();
			$this->assertEquals($hoy->format('Y-m-d'), $ep->getFechaIngreso()->format('Y-m-d'));
		}

		//Tests 2/6: calcularComision()
		public function testCalcularComisionEnBaseALaAntiguedad(){
			$ingreso = new DateTime();
			$ingreso->modify('-10 years');
			$ep= $this->crear('Adriano','Caloni','36543024','15000', $ingreso); 
			$this->assertEquals("15%",$ep->calcularComision());
		}

         //Tests 3/6: calcularIngresoTotal()
		public function testSePuedeCalcularElIngresoTotal(){
			$ingreso = new DateTime();
			$ingreso->modify('-10 years');
			$ep= $this->crear('Adriano','Caloni','36543024','15000', $ingreso); 
			$this->assertEquals(16500,$ep->calcularIngresoTotal());
		}

		//Tests 4/6: calcularAntiguedad() 
		public function testSePuedeCalcularAntiguedad(){
			$ingreso = new DateTime();
			$ingreso->modify('-10 years');
			$ep= $this->crear('Adriano','Caloni','36543024','15000', $ingreso);
			$this->assertEquals(10,$ep->calcularAntiguedad());
		}

		
	}
?>