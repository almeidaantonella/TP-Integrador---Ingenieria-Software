<?php

	abstract class EmpleadoTest extends \PHPUnit\Framework\TestCase{

		// Funcion crear Nuevo Empleado 


		public function crear ($nombre = "Pepe", $apellido = "Argento", $dni = 36543023, $salario = 1200, $sector = "indefinido")
		{
			$emp = new \App\Empleado ($nombre, $apellido, $dni, $salario, $sector);
			return $emp;
		}

        //Tests 1/7: Nombre Y Apellido
        public function testSePuedeCrearYObtenerNombreYApellido()
        { 
            $emp= $this->crear();
            $this->assertEquals("Ricardo Montaner", $emp->getNombreApellido());
         } 

	}
?>