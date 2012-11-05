<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class PruebasJulio_c extends CI_Controller
{

	public function __construct(){
           
          parent::__construct();
          
            $this->load->helper(array('html', 'url'));

        	$this->load->model(array('actores_m', 'general_m','reportes_m', 'catalogos_m','casos_m'));
       }
	
	function index() 
	{	
		$datos = array (
			  						'nombre' 					=> '',
			  						'desdeFecha' 				=> '1987-05-01',
			  						'hastaFecha' 				=> '1987-10-01',
			  						'derechoAfectadoId' 		=> '',
			  						'derechoAfectadoNivel' 		=> '',
			  						'actoViolatorioId' 			=> '',
			  						'actoViolatorioNivel'		=> ''
			  			);
									
		$datos2 = array (
							'tabla' => 'actores',
							'campo'	=> 'actorId',
							'valor' => 1
						);
						
		$datos3 = array ( 'datosViejos'=> array ( 'usr' => 'brass3a3', 'pass' => '1234'), 'datosNuevos' => array('pass' => '123')
							
		);
		$datos4 = array(
                  
				  'actoViolatorioId' => 1,
				  'actoViolatorioNivel' => 1,
				  'casos_casoId' => 1,
				  'derechoAfectado_derechoAfectadoCasoId' => 1
				  );
				   
				   
				   
			echo 'hola';  						
			$Data['datos']=$this->actores_m->mTraeCasosRelacionadosActor(1);
			//
			echo 'hola2';
			
			$this->load->view('pruebasJulio', $Data);
	}

}

?>
