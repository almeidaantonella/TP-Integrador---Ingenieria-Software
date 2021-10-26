<?php

	abstract class EmpleadoTest extends \PHPUnit\Framework\TestCase{

		// Funcion crear Nuevo Empleado 

		public function crear ($nombre = "Pepe", $apellido = "Argento", $dni = 36543023, $salario = 1200, $sector = "indefinido")
		{
			$emp = new \App\Empleado ($nombre, $apellido, $dni, $salario, $sector);
			return $emp;
		}

        //Tests 1/7:  getNombreApellido - Nombre Y Apellido
        public function testSePuedeCrearYObtenerNombreYApellido()
        { 
            $emp= $this->crear();
            $this->assertEquals("Ricardo Montaner", $emp->getNombreApellido());
         } 

        //Tests 1/7:getDNI - DNI
        public function testSePuedeCrearYObtenerDNI()
        { 
            $emp= $this->crear();
            $this->assertEquals("1235789", $emp->getDNI());
         } 

        //Tests 1/7: getSalario Salario
		public function testSePuedeCrearyObtenerElSalario(){
			$emp = $this->crear();
			$this->assertEquals(3500,$emp->getSalario());
		}

	}
?>