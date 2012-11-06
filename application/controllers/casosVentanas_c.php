<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class CasosVentanas_c extends CI_Controller {
    
    function __construct() {
        
        parent::__construct();
        
        $this->load->helper(array('html', 'url'));
        
        //$this->load->library(array('traer_catalogos_l'));
        
        $this->load->model(array('actores_m', 'general_m', 'casos_m','catalogos_m'));
        
    }
    
    function traer_catalogos(){
        
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
		
        return $datos;
        
    }

    function ventanaLugares($casoId, $i){

        $datos['head'] = $this->load->view('general/head_v', "", true);

        $datos['casoId']= $casoId;

        $datos['catalogos']= $this->traer_catalogos();
		
		$datos['datosCaso'] = $this->casos_m->mTraerDatosCaso($casoId);
		
		if(!empty($datos['datosCaso']['lugares'][$i]))
		
			$datos['lugar']=$datos['datosCaso']['lugares'][$i];

        $this->load->view('casos/formulariodetalleLugar_v', $datos);
        
    }

    function seguimientoCaso($casoId, $i){

        $datos['head'] = $this->load->view('general/head_v', "", true);

        $datos['casoId']= $casoId;

        $datos['catalogos']= $this->traer_catalogos();
		
		$datos['datosCaso'] = $this->casos_m->mTraerDatosCaso($casoId);
		
		if(!empty($datos['datosCaso']['fichas'][$i]))
		
			$datos['ficha']=$datos['datosCaso']['fichas'][$i];

        $this->load->view('casos/formularioSeguimientoCaso_v', $datos);
        
    }

    function derechosAfectados($casoId, $i){

        $datos['head'] = $this->load->view('general/head_v', "", true);

        $datos['casoId']= $casoId;

        $datos['derechosAfectados'] = $this->catalogos_m->mTraerDatosCatalogoDerechosAfectados();

        $datos['actos'] = $this->catalogos_m->mTraerDatosCatalogoActos();

        $datos['catalogos']= $this->traer_catalogos();

		$datos['datosCaso'] = $this->casos_m->mTraerDatosCaso($casoId);
		
		if(!empty($datos['datosCaso']['derechoAfectado'][$i]))
		
			$datos['derechoAfectado']=$datos['datosCaso']['derechoAfectado'][$i];
		
        $this->load->view('casos/formularioActo_v', $datos);
        
    }


    function intervenciones($casoId, $i){

        $datos['head'] = $this->load->view('general/head_v', "", true);

        $datos['casoId']= $casoId;

        $datos['catalogos']= $this->traer_catalogos();
		
		$datos['datosCaso'] = $this->casos_m->mTraerDatosCaso($casoId);
		
		if(!empty($datos['datosCaso']['intervenciones'][$i]))
		
			$datos['intervenciones']=$datos['datosCaso']['intervenciones'][$i];

        $this->load->view('casos/formularioIntervencion', $datos);
        
    }

	function fuentesDeInformacion($casoId,$actorId){
		
		$datos['head'] = $this->load->view('general/head_v', "", true);

        $datos['casoId'] = $casoId;
		
		$datos['catalogos'] = $this->traer_catalogos();
		
		$datos['datosCaso'] = $this->casos_m->mTraerDatosCaso($casoId);
		
		$datos['actoresColectivos'] = $this->actores_m->listado_actores_m(3);
		 
		$datos['actoresIndividuales'] =  $this->actores_m->listado_actores_m(1);
		
		$datos['actoresTrans'] = $this->actores_m->listado_actores_m(2);
		
		$datos['actIndividualesTrns'] = array_merge($datos['actoresIndividuales'],$datos['actoresTrans']);

		$datos['actoresRelacionados'] = $this->actores_m->mTraeRelacionesColectivo($actorId);
		
		$this->load->view('casos/formularioFuenteDoc_v', $datos);
	}
	
	function fuentesDeInformacionPersonal($casoId,$actorId){
		
		$datos['head'] = $this->load->view('general/head_v', "", true);

        $datos['casoId'] = $casoId;
		
		$datos['catalogos'] = $this->traer_catalogos();
		
		$datos['datosCaso'] = $this->casos_m->mTraerDatosCaso($casoId);
		
		$datos['actoresColectivos'] = $this->actores_m->listado_actores_m(3);
		 
		$datos['actoresIndividuales'] =  $this->actores_m->listado_actores_m(1);
		
		$datos['actoresTrans'] = $this->actores_m->listado_actores_m(2);
		
		$datos['actIndividualesTrns'] = array_merge($datos['actoresIndividuales'],$datos['actoresTrans']);

		$datos['actoresRelacionados'] = $this->actores_m->mTraeRelacionesColectivo($actorId);
		
		$this->load->view('casos/formularioFuentePersonal', $datos);
	}
	
	public function relacionCasos($casoId,$actorId){
		
		$datos['head'] = $this->load->view('general/head_v', "", true);

        $datos['casoId'] = $casoId;
		
		$datos['catalogos'] = $this->traer_catalogos();
		
		$datos['datosCaso'] = $this->casos_m->mTraerDatosCaso($casoId);
		
		$datos['actoresColectivos'] = $this->actores_m->listado_actores_m(3);
		 
		$datos['actoresIndividuales'] =  $this->actores_m->listado_actores_m(1);
		
		$datos['actoresTrans'] = $this->actores_m->listado_actores_m(2);
		
		$datos['actIndividualesTrns'] = array_merge($datos['actoresIndividuales'],$datos['actoresTrans']);

		$datos['actoresRelacionados'] = $this->actores_m->mTraeRelacionesColectivo($actorId);
		
		$this->load->view('casos/formularioRelacionCasos', $datos);
	}
	
	
	function guardarDatosVentanas($id){
		
		 foreach($_POST as $campo => $valor){ 
			
            $pos = strpos($campo, '_');
			
            $nombre_tabla = substr($campo, 0, $pos);
	
            $nombre_campo = substr($campo, ++$pos);
			
			if(!empty($valor))
			
            	$datos[$nombre_tabla][$nombre_campo] = $valor; 

        } 
		
		switch ($id){
            
            case(1): 
				if($_POST['editar'] == 1){
					$datos1['lugares'] = $datos['lugares'];
            		$mensaje = $this->general_m->mActualizaDatosLugar($datos1);
				}else{
					$datos1['lugares'] = $datos['lugares'];
            		$mensaje = $this->general_m->llenar_tabla_m($datos1);	
				}
            break;
        
            case(2):
				if($_POST['editar'] == 1){
					$datos2['fichas']=$datos['fichas'];
	            	$mensaje = $this->general_m->general_m->mActualizaDatosFicha($datos2); 
				}else{
					$datos2['fichas']=$datos['fichas'];
	            	$mensaje = $this->general_m->general_m->llenar_tabla_m($datos2); 
				}
            break;
			
			case(3): 
				if($_POST['editar'] == 1){
					$datos31['actos'] = $datos['actos'];
					$mensaje = $this->general_m->casos_m->mActualizaDatosActo($datos31);
					$datos32['derechoAfectado'] =  $datos['derechoAfectado'];
					$mensaje = $mansaje . $this->general_m->casos_m->mActualizaDatosDerechoAfectado($datos32);
				}else{
					$datos3['actos'] = $datos['actos'];
					$datos3['derechoAfectado'] =  $datos['derechoAfectado'];
					$mensaje = $this->general_m->casos_m->mAgregarDerechosAfectados($datos3);
				}
            break;
			
			case(4):  
				if($_POST['editar'] == 1){
					$datos41['intervenciones'] = $datos['intervenciones'];
					$mensaje =  $this->general_m->casos_m->mActualizaDatosIntervencion($datos41);
					$datos42['intervenidos'] =  $datos['intervenidos'];
					$mensaje = $mensaje . $this->general_m->casos_m->mActualizaDatosIntervenido($datos42);
				}else{
					$datos4['intervenciones'] = $datos['intervenciones'];
					$datos4['intervenidos'] =  $datos['intervenidos'];
					$mensaje = $this->general_m->casos_m->mAgregarIntervenciones($datos4);
				}
            break;
			
			case(5): 
				if($_POST['editar'] == 1){
					$datos5['fuenteInfoPersonal'] = $datos['fuenteInfoPersonal'];
					$mensaje = $this->general_m->mActualizaDatosFuenteInfoPersonal($datos5);
				}else{
					$datos5['fuenteInfoPersonal'] = $datos['fuenteInfoPersonal'];
					$mensaje = $this->general_m->llenar_tabla_m($datos5);
				}
            break;
			
			case(6):
				if($_POST['editar'] == 1){
					$datos6['tipoFuenteDocumental'] = $datos['tipoFuenteDocumental'];
					$mensaje = $this->general_m->mActualizaDatosTipoFuenteDocumental($datos6);
				}else{ 
					$datos6['tipoFuenteDocumental'] = $datos['tipoFuenteDocumental'];
					$mensaje = $this->general_m->llenar_tabla_m($datos6);
				}
            break;
        
            case(7):
				if($_POST['editar'] == 1){
					$datos7['relacionCasos'] = $datos['relacionCasos'];
	            	$mensaje = $this->general_m->mActualizaDatosRelacionCaso($datos7);
				}else{ 
	            	$datos7['relacionCasos'] = $datos['relacionCasos'];
	            	$mensaje = $this->general_m->llenar_tabla_m($datos7);
				}
            break;
            
        }
        
		return $mensaje;
	}

	public function eliminarLugar($lugarId){
	
		$mensaje = $this->casos_m->mEliminaLugar($lugarId);
		
		return $mensaje;
    }
	
	public function eliminarFicha($fichaId){
		
		$mensaje = $this->casos_m->mEliminaFicha($fichaId);
		
		return $mensaje;
	}
	
	public function eliminarDerechoAfectado(){
		
	}
	
	public function eliminarIntervencion($intervencionId){
		
		$mensaje =  $this->casos_m-> mEliminaIntervenciones($intervencionId);
		
		return $mensaje;
	}
	
	public function eliminarFuenteInfoPersonal($fuenteInfoPersonalId){
			
		$mensaje =  $this->casos_m->mEliminaFuenteInfoPersonal($fuenteInfoPersonalId);
		
		return $mensaje;
	}
	
	public function eliminarFuenteInfoDocumental($tipoFuenteDocumentalId){
		
		$mensaje =  $this->casos_m->mEliminaTipoFuenteDocumental($tipoFuenteDocumentalId);
		
		return $mensaje;
	}
	
	
	public function eliminaRelacionCasos($relacionId){
		
		$mensaje =  $this->casos_m->mEliminaRelacionCasos($relacionId);
		
		return $mensaje;
	}
	
}


    
?>