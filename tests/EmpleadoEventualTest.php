<?php
	require_once 'EmpleadoTest.php';
	
    class EmpleadoEventualTest extends EmpleadoTest{
        //Funcion Crear
		public function crear(  $nombre='Ricardo', $apellido ='Montaner', $dni=1235789, $salario = 3500,
								$montos = [150,200,250,150]){

							   $ee = new \App\EmpleadoEventual($nombre,$apellido, $dni, $salario, $montos);
							   return $ee;
		}
        
        //Tests 1/3: Metodo calcularComision()
		public function testLaComisionPorVentasFuncionaCorrectamente(){
			$ee= $this->crear(); //(150+200+250+150)/4)*0,05 = 9,375
			$this-> assertEquals(9.375,$ee->calcularComision()); 
		}

<<<<<<< HEAD
=======
		//Tests 2/3:
>>>>>>> 11688ec7a6c42c5007ca9eda6f865b2d5f017448
		public function calcularComision() {
			$suma = 0;
			foreach ($this->montosDeVentas as $unaVenta) {
				$suma += $unaVenta;
			}
			// La comisión es el 5% del promedio de ventas:
			return ($suma / count($this->montosDeVentas)) * 0.05;
		}

		//Tests 2/3: método calcularIngresoTotal() funciona como se espera
		public function calcularIngresoTotal() {
			return $this->salario + $this->calcularComision();
		}
    }
?>