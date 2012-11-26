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

    function notas(){

        $datos['head'] = $this->load->view('general/head_v', "", true);

        $this->load->view('actores/notasCatalogos_', $datos);
        
    }

    function derechosAfectados($casoId,$i){

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
				
		if(isset($datos['actoresIndividuales']) && isset($datos['actoresTrans']))		
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
		
		if(isset($datos['actoresIndividuales']) && isset($datos['actoresTrans']))
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
					$mensaje = $this->casos_m->mActualizaDatosLugar($datos['lugares'],$datos['lugares']['lugarId']);
					
				}else{
					$datos1['lugares'] = $datos['lugares'];
            		$mensaje = $this->general_m->llenar_tabla_m($datos1);	
				}
				
            break;
        
            case(2):if($_POST['editar'] == 1){
            	
            		$ruta = $this->cargarPDF();
					
					$nombreArchivo = $_FILES["pdf"]['name'];
					
					$data = array('nombreRegistro'=>$nombreArchivo,'ruta'=>$ruta,'fichas_fichaId'=>$datos['fichas']['fichaId']);
					
					if($nombreArchivo != '' && $ruta != '')
						$this->casos_m->mAgregarRegistroFicha($data);
					
	            	$mensaje=$this->general_m->casos_m->mActualizaDatosFicha($datos['fichas'],$datos['fichas']['fichaId']); 
					
				}else{
					$datos2['fichas']=$datos['fichas'];
	            	$mensaje = $this->general_m->general_m->llenar_tabla_m($datos2); 
				}
				
            break;
			
			case(3): 
				if($_POST['editar'] == 1){
					if(isset($datos['actos'])){
						$mensaje = $this->casos_m->mActualizaDatosActo($datos['actos'],$datos['actos']['actoId']);
					}
					
					$datos32['derechoAfectado'] =  $datos['derechoAfectado'];
					$mensaje = $mansaje . $this->casos_m->mActualizaDatosDerechoAfectado($datos32);
				}else{
					$datos3['actos'] = $datos['actos'];
					$datos3['derechoAfectado'] =  $datos['derechoAfectado'];
					$mensaje = $this->casos_m->mAgregarDerechosAfectados($datos3);
				}
            break;
			
			case(4):  
				if($_POST['editar'] == 1){
					$mensaje =  $this->casos_m->mActualizaDatosIntervencion($datos['intervenciones'],$datos['intervenciones']['intervencioNId']);

					$mensaje = $mensaje . $this->casos_m->mActualizaDatosIntervenido($datos['intervenidos'],$datos['intervenidos']['intervenidoId']);
				}else{
					$datos4['intervencion'] = $datos['intervenciones'];
					$datos4['intervenidos'] =  $datos['intervenidos'];
					$mensaje = $this->casos_m->mAgregarIntervenciones($datos4);
				}
				
            break;
			
			case(5): 
				if($_POST['editar'] == 1){
					$mensaje = $this->casos_m->mActualizaDatosFuenteInfoPersonal($datos['fuenteInfoPersonal'],$datos['fuenteInfoPersonal']['fuenteInfoPersonalId']);
				}else{
					$datos5['fuenteInfoPersonal'] = $datos['fuenteInfoPersonal'];
					$mensaje = $this->general_m->llenar_tabla_m($datos5);
				}
				
            break;
			
			case(6):
				if($_POST['editar'] == 1){
					$mensaje = $this->casos_m->mActualizaDatosTipoFuenteDocumental($datos['tipoFuenteDocumental'],$datos['tipoFuenteDocumental']['tipoFuenteDocumentalId']);
				}else{ 
					$datos6['tipoFuenteDocumental'] = $datos['tipoFuenteDocumental'];
					$mensaje = $this->general_m->llenar_tabla_m($datos6);
				}
				
            break;
        
            case(7):
				if($_POST['editar'] == 1){
	            	$mensaje = $this->casos_m->mActualizaDatosRelacionCaso($datos['relacionCasos']['relacionId'],$datos['relacionCasos']);
				}else{ 
	            	$datos7['relacionCasos'] = $datos['relacionCasos'];
	            	$mensaje = $this->general_m->llenar_tabla_m($datos7);
				}
				
            break;
            
        }
		echo "<script languaje='javascript' type='text/javascript'>
			window.opener.location.reload();
			window.close();
		</script>";
			
		
		return $mensaje;
	}

	public function eliminarLugar($lugarId,$idCaso){
	
		$mensaje = $this->casos_m->mEliminaLugar($lugarId);
		
		redirect(base_url().'index.php/casos_c/mostrar_caso/'.$idCaso);
		
		return $mensaje;
    }
	
	public function eliminarFicha($fichaId,$idCaso){
		
		$mensaje = $this->casos_m->mEliminaFicha($fichaId);
		
		redirect(base_url().'index.php/casos_c/mostrar_caso/'.$idCaso);
		
		return $mensaje;
	}
	
	public function eliminarRegistro($registroId,$idCaso){
		
		$mensaje = $this->casos_m->mEliminarRegistro($registroId);
		
		redirect(base_url().'index.php/casos_c/mostrar_caso/'.$idCaso);
		
		return $mensaje;
	}
	
	public function eliminarDerechoAfectado($derechoId, $idCaso){
		$mensaje = $this->casos_m->mEliminaDerechoAfectadoCaso($derechoId);
		
		redirect(base_url().'index.php/casos_c/mostrar_caso/'.$idCaso);
		
		return $mensaje;
		
	}
	
	public function eliminarIntervencion($intervencionId,$idCaso){
		
		$mensaje =  $this->casos_m-> mEliminaIntervenciones($intervencionId);
		
		redirect(base_url().'index.php/casos_c/mostrar_caso/'.$idCaso);
		
		return $mensaje;
	}
	
	public function eliminarFuenteInfoPersonal($fuenteInfoPersonalId,$idCaso){
			
		$mensaje =  $this->casos_m->mEliminaFuenteInfoPersonal($fuenteInfoPersonalId);
		
		redirect(base_url().'index.php/casos_c/mostrar_caso/'.$idCaso);
		
		return $mensaje;
	}
	
	public function eliminarFuenteInfoDocumental($tipoFuenteDocumentalId,$idCaso){
		
		$mensaje =  $this->casos_m->mEliminaTipoFuenteDocumental($tipoFuenteDocumentalId);
		
		redirect(base_url().'index.php/casos_c/mostrar_caso/'.$idCaso);
		
		return $mensaje;
	}
	
	
	public function eliminaRelacionCasos($relacionId,$idCaso){
		
		$mensaje =  $this->casos_m->mEliminaRelacionCasos($relacionId);
		
		redirect(base_url().'index.php/casos_c/mostrar_caso/'.$idCaso);
		
		return $mensaje;
	}
	public function seguimientoCaso($casoId, $i){

        $datos['head'] = $this->load->view('general/head_v', "", true);

        $datos['casoId']= $casoId;

        $datos['catalogos']= $this->traer_catalogos();
		
		$datos['datosCaso'] = $this->casos_m->mTraerDatosCaso($casoId);
		
		if(!empty($datos['datosCaso']['fichas'][$i]))
		
			$datos['ficha']=$datos['datosCaso']['fichas'][$i];

        $this->load->view('casos/formularioSeguimientoCaso_v', $datos);
        
    }
	
	public function traerActos(){
		
		$id1 = $this->input->post("id1");	
		
		$id2 = $this->input->post("id2");
		
		$id3 = $this->input->post("id3");
		
		$id4 = $this->input->post("id4");	
		
		$datos=array();
		
		if($id1 !='undefined')
			$datos = array(1=>$id1);
		
		if($id1 !='undefined' && $id2 !='undefined')
			$datos = array(1=>$id1,2=>$id2);
		
		if($id1 !='undefined' && $id2 !='undefined' && $id3 !='undefined')
			$datos = array(1=>$id1,2=>$id2,3=>$id3);
		
		if($id1 !='undefined' && $id2 !='undefined' && $id3 !='undefined' && $id4 !='undefined')
			$datos = array(1=>$id1,2=>$id2,3=>$id3,4=>$id4);
		
		$data=$this->casos_m->mTraerActoDerechoAfectado($datos);
		
		$lista='';
		
		//print_r($data['actosN1']);
		
		if(isset($data['actosN1'])){
			$lista = $lista.' <ul>';
			foreach ($data['actosN1'] as $acto1) {
				$lista = $lista. '<li onclick="nombreacto('.$acto1['descripcion'].','.$acto1['actoId'].','.$acto1['notas'].')">'.
						$acto1['descripcion'].'
						<ul>';	
						if(isset($data['actosN2'])){
							foreach ($data['actosN2'] as $acto2) {
								$lista = $lista. '<li onclick="nombreactosub1('.$acto2['descripcion'].','.$acto2['actoN2Id'].','.$acto2['notas'].')">'.
								$acto2['descripcion'];
							}
						}
						$lista = $lista.'</li></ul>';
					
			     }
			     $lista = $lista.'</li></ul>';
		    }
		
	
		//print_r($data);
		print_r($lista);
		
		//echo $id1 .$id2 .$id3.$id4  ;
		
	}
	
	public function cargarPDF(){
		
		$status = "aca";
	   
			// obtenemos los datos del archivo
			$tamano = $_FILES["pdf"]['size'];
			$tipo = $_FILES["pdf"]['type'];
			$archivo = $_FILES["pdf"]['name'];
			$prefijo = substr(md5(uniqid(rand())),0,6);
	
			
			if($tipo == "application/pdf"){			
				if ($archivo != "") {
				    // guardamos el archivo a la carpeta files
				    
				    //para MAC y Linux
				    $urlBase = system('pwd');
					
				    //Para windows
					//$urlBase = system('chdir');
					
				    $destino = $urlBase.'/statics/fichas/'.$prefijo.'_'.$archivo;
				  					
				    if (move_uploaded_file($_FILES['pdf']['tmp_name'],$destino)) {
				    	
						$status = "Archivo subido: <b>".$archivo."</b>";
						
						return '/statics/fichas/'.$prefijo.'_'.$archivo;
						
				    } else {
				    	
						$status = $destino;
						
				    }
				} else {
					
				    $status = $archivo;
					
				}
				
			}else{
					
				$status = $tipo;
				
			}
	    
		return $status;
	}
	
}
    
?>