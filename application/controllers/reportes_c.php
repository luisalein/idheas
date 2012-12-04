<?php
class reportes_c extends CI_Controller {
	
	function __construct() {
        
        parent::__construct();
        
        $this->load->helper(array('html', 'url'));
        
        //$this->load->library(array('traer_catalogos_l'));
        
        $this->load->model(array('actores_m', 'general_m', 'catalogos_m'));
        
    }
    
    function traer_catalogos(){
        		
		$datos['actosN1Catalogo'] = $this->general_m->obtener_todo('actosN1Catalogo', 'actoId', 'descripcion');
		
		$datos['actosN2Catalogo'] = $this->general_m->obtener_todo('actosN2Catalogo', 'actoN2Id', 'descripcion');
		
		$datos['actosN3Catalogo'] = $this->general_m->obtener_todo('actosN3Catalogo', 'actoN3Id', 'descripcion');
		
		$datos['actosN4Catalogo'] = $this->general_m->obtener_todo('actosN4Catalogo', 'actoN4Id', 'descripcion');
		
		$datos['derechosAfectadosN1Catalogo'] = $this->general_m->obtener_todo('derechosAfectadosN1Catalogo', 'derechoAfectadoN1Id', 'descripcion');
		
		$datos['derechosAfectadosN2Catalogo'] = $this->general_m->obtener_todo('derechosAfectadosN2Catalogo', 'derechoAfectadoN2Id', 'descripcion');
		
		$datos['derechosAfectadosN3Catalogo'] = $this->general_m->obtener_todo('derechosAfectadosN3Catalogo', 'derechoAfectadoN3Id', 'descripcion');
		
		$datos['derechosAfectadosN4Catalogo'] = $this->general_m->obtener_todo('derechosAfectadosN4Catalogo', 'derechoAfectadoN4Id', 'descripcion');
      	
	    return $datos;
        
    }
	
	
    function generar_reporte(){
		
		$datos['is_active'] = 'reportes';

        $datos['derechosAfectados'] = $this->catalogos_m->mTraerDatosCatalogoDerechosAfectados();

        $datos['actos'] = $this->catalogos_m->mTraerDatosCatalogoActos();
		
		$datos['catalogos']= $this->traer_catalogos();

        $datos['head'] = $this->load->view('general/head_v', $datos, true);

        $datos['content'] = $this->load->view('reporte/reporte_v', $datos, true);

        $datos['body'] = $this->load->view('general/body_v', $datos, true);


        $this->load->view('general/principal_v', $datos);
		
		}
	
	}
	
?>
