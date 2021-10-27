<?php
	require_once 'EmpleadoTest.php';
	
	class EmpleadoPermanenteTest extends EmpleadoTest{
		
		//Funcion crear un Nuevo Empleado Eventual
		public function crear($nombre="Ricardo", $apellido="Montaner", $dni=1235789, $salario=3500, $fechaIngreso=null){
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
			$ep= $this->crear('Ricardo','Montaner','1235789','3500', $ingreso); 
			$this->assertEquals("10%",$ep->calcularComision());
		}

         //Tests 3/6: calcularIngresoTotal()
		public function testSePuedeCalcularElIngresoTotal(){
			$ingreso = new DateTime();
			$ingreso->modify('-10 years');
			$ep= $this->crear('Ricardo','Montaner','1235789','3500', $ingreso); 
			$this->assertEquals(3850 ,$ep->calcularIngresoTotal());
		}

		//Tests 4/6: calcularAntiguedad() 
		public function testSePuedeCalcularAntiguedad(){
			$ingreso = new DateTime();
			$ingreso->modify('-10 years');
			$ep= $this->crear('Ricardo','Montaner','1235789','3500', $ingreso);
			$this->assertEquals(10,$ep->calcularAntiguedad());

		}

		//Test 5/6: Empleado sin proporcionar la fecha de ingreso.
		public function testFechaSinProporcionar(){
			$ep = $this->crear("Ricardo", "Montaner", '1235789', '3500'); //Inicializo sin Fecha
			$fecha = new DateTime();

			$this->assertEquals(date_format($fecha,'y-m-d'), date_format($ep->getFechaIngreso(),'y-m-d')); 

			$this->assertEquals(0,$ep->calcularAntiguedad());
		}

		//Tests 6/6: Fecha de ingreso posterior a la de hoy, excepción
		public function testNoSePuedeCrearConFechaPosteriorAlDiaDeHoy(){
			$ingreso = new DateTime();
			$ingreso->modify('+15 years'); //le sumo 15 años a la fecha creada
			$this->expectException(\Exception::class);
			$ep= $this->crear('Ricardo','Montaner','1235789','3500', $ingreso); 
		}


		
	}
?>