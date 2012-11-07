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

	public function direccion($id){
	
		$this->load->helper(array('html', 'url'));	

		$datos['is_active'] = 'actores';
		
		$datos['head'] = $this->load->view('general/head_v', $datos, true);
		
		$datos['catalogos'] = traer_catalogos();
		
		$datos['actorId'] = $id;
		
		$this->load->view('actores/formularioNuevaDireccion', $datos);
	}

	    function mostrar_caso($casoId = 0){
        
     
		$this->load->helper(array('html', 'url'));
        $datos['casoId'] = $casoId;
        
        if ($casoId!=0) {
        $datos['clase']="";
    }else{
        $datos['clase']="Escondido";
    }
        
        if($casoId > 0){
            
            $datos['catalogos'] = $this->traer_catalogos();
            
            $datos['datosCaso'] = $this->casos_m->mTraerDatosCaso($casoId);
            
        }
        
        $datos['is_active'] = 'casos';
        
        $datos['head'] = $this->load->view('general/head_v', $datos, true);
        
        /*
         * se selecciona el tipo de actor y se trae la vista segun el tipo de actor
         */
                    
            
            $datos['listado'] = $this->casos_m->mListaCasos();
            
        

        $datos['casos']=$this->load->view('casos/informacionGeneral_v', $datos, true);

        $datos['casosNucleo']=$this->load->view('casos/nucleoCaso_v', $datos, true);

        $datos['infoAdicional']=$this->load->view('casos/infoAdicional_v', $datos, true);
        

        $datos['lista'] = $this->load->view('actores/lista_v', $datos, true);
        
        $datos['form'] = $this->load->view('casos/principalCasos_v', $datos, true);
        
        $datos['content'] = $this->load->view('actores/principal_v', $datos, true);
        
        $datos['body'] = $this->load->view('general/body_v', $datos, true);
            
        $this->load->view('general/principal_v', $datos);
        
    }

/**Terminan las funciones que pertenecen a la parte de información general de la sección de casos**/	
}


?>

