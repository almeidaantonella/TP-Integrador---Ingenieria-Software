<?php

	abstract class EmpleadoTest extends \PHPUnit\Framework\TestCase{

		// Funcion crear Nuevo Empleado 

		public function crear ($nombre = "Pepe", $apellido = "Argento", $dni = 36543023, $salario = 1200, $sector = "indefinido")
		{
			$emp= new \App\Empleado ($nombre, $apellido, $dni, $salario, $sector);
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

        // Tests 1/7: setSector y getSector
		public function testSePuedeModificarElSectorDelEmpleado(){
			$emp=$this->crear();
			$lugar = "En el Fin del Mundo";
			$this->assertEquals("No especificado",$emp->getSector());
			//seteo el sector que le asigno
			$emp->setSector($lugar);
			//pruebo si se asigno correctamente
			$this->assertEquals("En el Fin del Mundo",$emp->getSector());
		}

		// Test 1/7: __toString
		public function testSePuedeConvertirElObjetoEnUnaCadena(){
			$emp=$this->crear();
			$this->assertEquals("Ricardo Montaner 1235789 3500",$emp);
		}

        // Test 2/7: Nombre Empty
		public function testExcepcionSiSeCreaEmpleadoConNombreVacio(){
			$this->expectException(\Exception::class);
			$emp= $this-> crear($nombre="");
		}

		//Test 3/7: Apellido Empty
		public function testExcepcionSiSeCreaEmpleadoConApellidoVacio(){
			$this->expectException(\Exception::class);
			$emp= $this-> crear($nombre="Franco", $Apellido="");
		}
		//Test 4/7: DNI Empty
		public function testExcepcionSiSeCreaEmpleadoConDniVacio(){
			$this->expectException(\Exception::class);
			$emp= $this-> crear(null, null,$dni="");
		}

        //Test 5/7: Salario Empty
		public function testExcepcionSiSeCreaEmpleadoConSalarioVacio(){
			$this->expectException(\Exception::class);
			$emp= $this-> crear(null, null, null,$Salario="");
		}
		//Test 6/7: DNI Con letras o caracteres no numericos
		public function testExcepcionSiSeCreaEmpleadoConDniQueContengaLetras(){
			$this->expectException(\Exception::class);
			$emp= $this-> crear(null, null, "4kh123l");
		}
		//Test 7/7: No se especifica el sector
		public function testSectorNoEspecificadoSiSeDanInstanciaSinEspecificar(){
			$emp= $this-> crear("Antonella", "Adriano", 2, 5000);
			$this->assertEquals("No especificado", $emp->getSector());
		}

	}
?>