<?php

class casosNucleo_c extends CI_Controller {
    
    function __construct() {
        parent::__construct();
          $this->load->model(array('actores_m', 'casos_m', 'catalogos_m', 'actores_m', 'general_m'));
    }
/**Las siguientes funciones pertenecen a la parte de Nucleo Caso **/

    function index($casoId) /***Funcion que carga los detalles de la información personal***/
	{
		$this->load->helper(array('html', 'url'));					
		
        $DatosGenerales['casoId'] = $casoId; 
		$DatosGenerales['derechosAfectados']= $this->catalogos_m->mTraerDatosCatalogoDerechosAfectados();
		$DatosGenerales['actos']= $this->catalogos_m->mTraerDatosCatalogoActos();
		$DatosGenerales['lugares']= $this->catalogos_m->mTraerDatosCatalogoPaises();
	
		$this->load->view('casos/formularioActo_v', $DatosGenerales);
	
		
	}
       
       public function traerCatalogos(){
           
           $catalogos = array('estadosCatalogo', 'estatusPerpetradorCatalogo', 'estatusVictimaCatalogo', 'gruposIndigenas', 'idiomaCatalogo', 'municipiosCatalogo', 'nivelConfiabilidadCatalogo', 'ocupacionesCatalogo', 'paisesCatalogo', 'relacionActoresCatalogo', 'tipoFuenteCatalogo', );

            foreach($catalogos as $catalogo){

                $datos[$catalogo] = $this->catalogos_m->mTraerDatosCatalogoNombre($catalogo);

            }
	        
	        $datos['paisesCatalogo'] = $this->general_m->obtener_todo('paisesCatalogo', 'paisId', 'nombre');
	        
	        $datos['estadosCatalogo'] = $this->general_m->obtener_todo('estadosCatalogo', 'estadoId', 'nombre');
	        
	        $datos['municipiosCatalogo'] = $this->general_m->obtener_todo('municipiosCatalogo', 'municipioId', 'nombre');
	        
	        $datos['gruposIndigenasCatalogo'] = $this->general_m->obtener_todo('gruposIndigenas', 'grupoIndigenaId', 'descripcion');
	        
	        $datos['estadosCivilesCatalogo'] = $this->general_m->obtener_todo('estadoCivil', 'estadoCivilId', 'descripcion');
	        
	        $datos['ocupacionesCatalogo'] = $this->general_m->obtener_todo('ocupacionesCatalogo', 'ocupacionId', 'descripcion');
	        
	        $datos['nacionalidadesCatalogo'] = $this->general_m->obtener_todo('nacionalidadesCatalogo', 'nacionalidadId', 'nombre');
	        
	        $datos['relacionActoresCatalogo'] = $this->general_m->obtener_todo('relacionActoresCatalogo', 'tipoRelacionId', 'tipoRelacionId');
	        
			$datos['nivelConfiabilidadCatalogo'] = $this->general_m->obtener_todo('nivelConfiabilidadCatalogo', 'nivelConfiabilidadId', 'descripcion');
			
			$datos['idiomaCatalogo'] = $this->general_m->obtener_todo('idiomaCatalogo', 'idiomaId', 'descripcion');
			
			$datos['tipoFuenteCatalogo'] = $this->general_m->obtener_todo('tipoFuenteCatalogo', 'tipoFuenteId', 'descripcion');

        	$datos['tipoDireccion'] = $this->general_m->obtener_todo('tipoDireccionCatalogo', 'tipoDireccionId', 'descripcion');
			
        	$datos['listaTodosActores'] = $this->actores_m-> mListaTodosActores();
	        
	        return $datos;

       }
       	
	
    function prueba() /**función que carga el seguimiento de casos**/
	{
		$this->load->helper(array('html', 'url'));					

        
        $DatosGenerales['listado2'] = $this->actores_m->listado_actores_m(2);
        $DatosGenerales['todosActores'] = $this->actores_m->listado_actores_m(1);

        $DatosGenerales['head'] = $this->load->view('general/head_v', "", true);
		
		
		$this->load->view('casos/SelecionActor',$DatosGenerales);
	}

	
    function prueba2() /**función que carga el seguimiento de casos**/
	{
		$this->load->helper(array('html', 'url'));					

		$DatosGenerales['catalogos']= $this->traerCatalogos();
        
        $DatosGenerales['listado2'] = $this->actores_m->listado_actores_m(2);
        $DatosGenerales['listado1'] = $this->actores_m->listado_actores_m(1);

        $DatosGenerales['head'] = $this->load->view('general/head_v', "", true);
		
		
		$this->load->view('actores/formularioNuevaDireccion',$DatosGenerales);
	}

/**Terminan las funciones que pertenecen a la parte de información general de la sección de casos**/	
}


?>

