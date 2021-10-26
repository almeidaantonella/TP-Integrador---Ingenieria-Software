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
    }
?>