<?php
	require_once 'EmpleadoTest.php';
	
    class EmpleadoEventualTest extends EmpleadoTest{
        //Funcion Crear
		public function crear(  $nombre='Ricardo', $apellido ='Montaner', $dni=1235789, $salario = 3500,
								$montos = [100,150,200,250]){

							   $ee = new \App\EmpleadoEventual($nombre,$apellido, $dni, $salario, $montos);
							   return $ee;
		}
        
        //Tests 1/3: Metodo calcularComision()
		public function testLaComisionPorVentasFuncionaCorrectamente(){
			$ee= $this->crear(); 
			$this-> assertEquals(8.95,$ee->calcularComision()); 
		}
    }
?>