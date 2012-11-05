<?php
class reportes_c extends CI_Controller {
	
	function __construct() {
        
        parent::__construct();
        
        $this->load->helper(array('html', 'url'));
        
        //$this->load->library(array('traer_catalogos_l'));
        
        $this->load->model(array('actores_m', 'general_m', 'catalogos_m'));
        
    }
    
    function generar_reporte(){
		
		$datos['is_active'] = 'reportes';

        $datos['derechosAfectados'] = $this->catalogos_m->mTraerDatosCatalogoDerechosAfectados();

        $datos['actos'] = $this->catalogos_m->mTraerDatosCatalogoActos();

        $datos['head'] = $this->load->view('general/head_v', $datos, true);

        $datos['content'] = $this->load->view('reporte/reporte_v', $datos, true);

        $datos['body'] = $this->load->view('general/body_v', $datos, true);


        $this->load->view('general/principal_v', $datos);
		
		}
	
	}
	
?>
