
<?php if ( ! defined('BASEPATH') ) exit('No direct script access allowed'); 
	 
	
class Actores_c extends CI_Controller {
    
    function __construct() {
        
        parent::__construct();
        
        $this->load->helper(array('html', 'url'));
        
        //$this->load->library(array('traer_catalogos_l'));
        
        $this->load->model(array('actores_m', 'general_m','catalogos_m','casos_m'));
        
    }
	
	
		

    
    function traer_catalogos(){
        
        $datos['paisesCatalogo'] = $this->general_m->obtener_todo('paisesCatalogo', 'paisId', 'nombre');
        
        $datos['estadosCatalogo'] = $this->general_m->obtener_todo('estadosCatalogo', 'estadoId', 'nombre');
        
        $datos['municipiosCatalogo'] = $this->general_m->obtener_todo('municipiosCatalogo', 'municipioId', 'nombre');
        
        $datos['gruposIndigenasCatalogo'] = $this->general_m->obtener_todo('gruposIndigenas', 'grupoIndigenaId', 'descripcion');
        
        $datos['estadosCivilesCatalogo'] = $this->general_m->obtener_todo('estadoCivil', 'estadoCivilId', 'descripcion');
        
        $datos['ocupacionesCatalogo'] = $this->general_m->obtener_todo('ocupacionesCatalogo', 'ocupacionId', 'descripcion');
        
        $datos['nacionalidadesCatalogo'] = $this->general_m->obtener_todo('nacionalidadesCatalogo', 'nacionalidadId', 'nombre');
        
        $datos['relacionActoresCatalogo'] = $this->general_m->obtener_todo('relacionActoresCatalogo', 'tipoRelacionId', 'nombre');
        
        $datos['tipoActorColectivo'] = $this->general_m->obtener_todo('tipoActorColectivo', 'tipoActorColectivoId', 'descripcion');
        
        $datos['nivelEscolaridad'] = $this->general_m->obtener_todo('nivelEscolaridadCatalogo', 'nivelEscolaridadId', 'descripcion');
        
        $datos['tipoDireccion'] = $this->general_m->obtener_todo('tipoDireccionCatalogo', 'tipoDireccionId', 'descripcion');

        $datos['listaTodosActores'] = $this->actores_m-> mListaTodosActores();

        return $datos;
        
    }
    
    function mostrar_actor($actorId = 0, $tipoActorId = 0, $cadena = '', $tipoFiltro = 0){
        
        $datos['actorId'] = $actorId;
        
		$datos['EstoyEnActor']=1;
		
        if($actorId > 0){
            
            $datos['catalogos'] = $this->traer_catalogos();
            
            $datos['datosActor'] = $this->actores_m->traer_datos_actor_m($actorId, $tipoActorId);

            $datos['citaActor'] = $this->actores_m->mTraerCitasActor($actorId);
			if ($tipoActorId==3) {
            $datos['casosRelacionados'] = $this->casosRelacionados($actorId);
            }
            
        }
        
        $datos['is_active'] = 'actores';
        
        $datos['is_actor_type'] = $tipoActorId;
        
        $datos['head'] = $this->load->view('general/head_v', $datos, true);
        
        /*
         * se selecciona el tipo de actor y se trae la vista segun el tipo de actor
         */
        
        switch ($tipoActorId){
            
            case(1): $datos['form'] = $this->load->view('actores/individual_v', $datos, true);
                
            break;
        
            case(2): $datos['form'] = $this->load->view('actores/transmigrante_v', $datos, true);
                
            break;
        
            case(3): $datos['form'] = $this->load->view('actores/colectivo_v', $datos, true);
                
            break;
            
        }
        
        if($tipoActorId > 0){
			 if ($cadena != '0' && ($tipoFiltro == 0)){
		   		
				$datos['listado']  = $this->actores_m->mBuscarActoresNombre($cadena);
				 
				$datos['cadena'] = $cadena; 
			   
			}elseif($cadena == '0' && ($tipoFiltro != 0)){
				
				$datos['listado']   = $this->actores_m->mFiltrosBusquedaActor($tipoFiltro);	
				
				$datos['tipoFiltro'] = $tipoFiltro;
					
			}elseif($cadena != '0' && ($tipoFiltro != 0)){
				
				$datos['listado']  = $this->actores_m->mBusquedaActorFiltroNombre($tipoFiltro, $cadena);
				
				$datos['cadena'] = $cadena; 
				
				$datos['tipoFiltro'] = $tipoFiltro;
			}else{
            	$datos['listado'] = $this->actores_m->listado_actores_m($tipoActorId);
			}
				
			
        }
		
		if(!empty($datos['casosRelacionados'])){
			
			 $datos['casos'] = $this->load->view('actores/casos_v', $datos, true);
			
		}
        
        $datos['lista'] = $this->load->view('actores/lista_v', $datos, true);
        
        $datos['content'] = $this->load->view('actores/principal_v', $datos, true);
        
        $datos['body'] = $this->load->view('general/body_v', $datos, true);
            
        $this->load->view('general/principal_v', $datos);
        
    }
   
		
	function mostrar_actor_lista(){
      
	    $actorId = $this->input->post("actorId");	
		
		$tipoActorId = $this->input->post("tipoActor");
		
        $datos['actorId'] = $actorId;
        
		$datos['EstoyEnActor']=1;
		
        if($actorId > 0){
            
            $datos['catalogos'] = $this->traer_catalogos();
            
            $datos['datosActor'] = $this->actores_m->traer_datos_actor_m($actorId, $tipoActorId);

            $datos['citaActor'] = $this->actores_m->mTraerCitasActor($actorId);
			if($tipoActorId == 3)
				$datos['casosRelacionados'] = $this->casosRelacionados($actorId);
            
        }
        
        $datos['is_active'] = 'actores';
        
        $datos['is_actor_type'] = $tipoActorId;
        
        $datos['head'] = $this->load->view('general/head_v', $datos, true);
        
        /*
         * se selecciona el tipo de actor y se trae la vista segun el tipo de actor
         */
        
        switch ($tipoActorId){
            
            case(1): $datos['form'] = $this->load->view('actores/individual_v', $datos, true);
                
            break;
        
            case(2): $datos['form'] = $this->load->view('actores/transmigrante_v', $datos, true);
                
            break;
        
            case(3): $datos['form'] = $this->load->view('actores/colectivo_v', $datos, true);
                
            break;
            
        }
        
        if($tipoActorId > 0){
            
            $datos['listado'] = $this->actores_m->listado_actores_m($tipoActorId);
            
        }
		
		if(!empty($datos['casosRelacionados'])){
			
			 $datos['casos'] = $this->load->view('actores/casos_v', $datos, true);
			
		}
        
        $datos['lista'] = $this->load->view('actores/lista_v', $datos, true);
        
        $datos['content'] = $this->load->view('actores/principal_v', $datos, true);
        
        $datos['body'] = $this->load->view('general/body_v', $datos, true);
            
        $this->load->view('general/principal_v', $datos);
        
    }	
  
    function agregar_actor($tipoActorId = 0){
        
        $datos['catalogos'] = $this->traer_catalogos();
        
        if($tipoActorId > 0){
            
            $datos['action'] = base_url().'index.php/actores_c/agregar_actor_bd';
            
                switch ($tipoActorId){

                    case(1):

                        $datos['form'] = $this->load->view('actores/agregar_editar_individual_v', $datos, true);

                    break;

                    case(2): 

                        $datos['form'] = $this->load->view('actores/agregar_editar_transmigrante_v', $datos, true);

                    break;

                    case(3): 

                        $datos['form'] = $this->load->view('actores/agregar_editar_colectivo_v', $datos, true);

                    break;
                
                    default : redirect(base_url().'index.php/actores_c/mostrar_actor');
                        
                    break;

                }
                
				
				if($tipoActorId > 0){
		            
		            $datos['listado'] = $this->actores_m->listado_actores_m($tipoActorId);
		            
		        }
				
				
                $datos['is_active'] = 'actores';
        
                $datos['is_actor_type'] = $tipoActorId;

                $datos['head'] = $this->load->view('general/head_v', $datos, true);
                
                $datos['lista'] = $this->load->view('actores/lista_v', $datos, true);
        
                $datos['content'] = $this->load->view('actores/principal_v', $datos, true);

                $datos['body'] = $this->load->view('general/body_v', $datos, true);

                $this->load->view('general/principal_v', $datos);
            
        } else {
            
            redirect(base_url().'index.php/actores_c/mostrar_actor');
            
        }
        
    }
    
    function agregar_actor_bd(){
        
        foreach($_POST as $campo => $valor){ 
			
            $pos = strpos($campo, '_');
			
            $nombre_tabla = substr($campo, 0, $pos);
	
            $nombre_campo = substr($campo, ++$pos);
			
			if(!empty($valor))
			
            	$datos[$nombre_tabla][$nombre_campo] = $valor; 

        } 
		
		$foto = $this->cargarFoto();
		
		$datos['actores']['foto'] = $foto;
		
        $datos['agregado'] = $this->actores_m->agregar_actor_m($datos);
        
        redirect(base_url().'index.php/actores_c/mostrar_actor/'.$datos['agregado'].'/'.$_POST['actores_tipoActorId']);
        
    }

	public function cargarFoto(){
		
		$status = "";
	   
			// obtenemos los datos del archivo
			$tamano = $_FILES["archivo"]['size'];
			$tipo = $_FILES["archivo"]['type'];
			$archivo = $_FILES["archivo"]['name'];
			$prefijo = substr(md5(uniqid(rand())),0,6);
	
			
			if($tipo == "image/png" || $tipo == "image/jpg" || $tipo == "image/jpeg"){			
				if ($archivo != "") {
				    // guardamos el archivo a la carpeta files
				    
				    //para MAC y Linux
				    $urlBase = system('pwd');
					
				    //Para windows
					//$urlBase = system('chdir');
					
				    $destino = $urlBase.'/statics/fotosActor/'.$prefijo.'_'.$archivo;
				  					
				    if (move_uploaded_file($_FILES['archivo']['tmp_name'],$destino)) {
				    	
						$status = "Archivo subido: <b>".$archivo."</b>";
						
						return '/statics/fotosActor/'.$prefijo.'_'.$archivo;
						
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
    
    function agregar_relacion_actor($actorId,$tipoRelacion,$ventana,$idRelacionActor){
        

        $datos['catalogos'] = $this->traer_catalogos();
        
        $datos['actorId'] = $actorId;

        $datos['listaIndividual'] = $this->actores_m->listado_actores_m(1);

        $datos['listaTransmigrante'] = $this->actores_m->listado_actores_m(2);

        $datos['listaColectivo'] = $this->actores_m->listado_actores_m(3);

        $datos['listaTodosActores'] = $this->actores_m-> mListaTodosActores();

        $datos['datosActor'] = $this->actores_m->traer_datos_actor_m($actorId, $datos['listaTodosActores'][$actorId]['tipoActorId']);

        $datos['relacionActoresColectivo'] =$this->catalogos_m->mTraerDatosCatalogoNombre('relacionActoresCatalogo');

        $datos['head'] = $this->load->view('general/head_v', $datos, true);


        if ($idRelacionActor!=0) {
            $datos['relaciones']=$datos['datosActor']['relacionActores'][$idRelacionActor];
        } 
        
        if ($ventana==0) {

            $datos['action'] = base_url().'index.php/actores_c/guardar_relacion';

        } else {
            $datos['action'] = base_url().'index.php/actores_c/editar_relacion';
        }


        if ($tipoRelacion==1) {
                        
            $datos['archivoRelacion']='relacion_actores_individual_v';

        }
        else{

            $datos['archivoRelacion']='relacion_actores_colectivo_v';
        }


            $this->load->view('actores/'.$datos['archivoRelacion'], $datos);        
        
    }
    
    function guardar_relacion(){
        
        
        foreach($_POST as $campo => $valor){ 
   		
            $datos[$campo] = $valor;

        }
        
        $respuesta = $this->actores_m->relaciona_actores_m($datos);
        
        
    }
    
    function editar_relacion(){
        
        foreach($_POST as $campo => $valor){ 
   		
            $datos[$campo] = $valor;

        }
        
        $this->actores_m->mActualizaDatosRelacionActor($datos['relacionActoresId'], $datos);
        
    }
    
    function eliminar_actor(){
        	
		$actorId = $this->input->post("actorId");	
		
		$tipoActor = $this->input->post("tipoActor");
			
		$datos['actoresRelacionados'] = $this->actores_m->mTraeRelacionesColectivo($actorId);
		
		$datos['casosRelacionados'] = $this->actores_m->mTraeCasosRelacionadosActor($actorId);
		
		if($datos['actoresRelacionados'] == '0' && $datos['casosRelacionados'] == '0'){
			
			$mensaje = $this->actores_m->mCambiaEstadoActivoActor($actorId);
			
		}else{
			
			$mensaje = "Este caso tiene otros casos y/o actores relacionados, elimina primero estas relaciones";
			
		}
        
		echo $mensaje;
				
   }
	
    function editar_actor($actorId, $tipoActorId){
        
        $datos['actorId'] = $actorId;
        
        $datos['datosActor'] = $this->actores_m->traer_datos_actor_m($actorId, $tipoActorId);
        
        $datos['catalogos'] = $this->traer_catalogos();
        
        if($tipoActorId > 0){
            
            $datos['action'] = base_url().'index.php/actores_c/editar_actor_bd';
            
                switch ($tipoActorId){

                    case(1):

                        $datos['form'] = $this->load->view('actores/agregar_editar_individual_v', $datos, true);

                    break;

                    case(2): 

                        $datos['form'] = $this->load->view('actores/agregar_editar_transmigrante_v', $datos, true);

                    break;

                    case(3): 

                        $datos['form'] = $this->load->view('actores/agregar_editar_colectivo_v', $datos, true);

                    break;
                
                    default : redirect(base_url().'index.php/actores_c/mostrar_actor');
                        
                    break;

                }
				
				if($tipoActorId > 0){
		            
		            $datos['listado'] = $this->actores_m->listado_actores_m($tipoActorId);
		            
				}
                
                $datos['is_active'] = 'actores';
        
                $datos['is_actor_type'] = $tipoActorId;

                $datos['head'] = $this->load->view('general/head_v', $datos, true);
                
                $datos['lista'] = $this->load->view('actores/lista_v', $datos, true);
        
                $datos['content'] = $this->load->view('actores/principal_v', $datos, true);

                $datos['body'] = $this->load->view('general/body_v', $datos, true);

                $this->load->view('general/principal_v', $datos);
            
        } else {
            
            redirect(base_url().'index.php/actores_c/mostrar_actor');
            
        }
        
    }
    
    public function editar_actor_bd(){
        
        foreach($_POST as $campo => $valor){
            
            if($campo != 'userfile' && $valor !=''){
            
                $pos = strpos($campo, '_');

                $nombre_tabla = substr($campo, 0, $pos);

                $nombre_campo = substr($campo, ++$pos);

                $datos[$nombre_tabla][$nombre_campo] = $valor; 
                
            }

        }
		if(!isset($datos['actores']['foto'])){
			$foto = $this->cargarFoto();
		
			$datos['actores']['foto'] = $foto;
		}
		
		
        $this->actores_m->mActualizaDatosActor($datos['actores']['actorId'], $datos);
        
        redirect(base_url().'index.php/actores_c/mostrar_actor/'.$datos['actores']['actorId'].'/'.$_POST['actores_tipoActorId']);
        
    }

	/*
	 * Recibe el tipo 1 => pais ó 2=>estado y obtiene sus estados o municipios respectivamente
	 * */
	public function filtroPaisEstado($tipo, $id){
		
		if($tipo == 1){
			
			$datosTabla = array('tabla' => 'estadosCatalogo' , 'campo' => 'paises_paisId', 'valor' => $id);
			
			$datos['catalogos']['estadosCatalogos'] = $this->general_m->mTraerDatosTabla($datosTabla);
		
		}elseif ($tipo == 2) {
			
			$datosTabla = array('tabla' => 'municipiosCatalogo' , 'campo' => 'estados_estadoId', 'valor' => $id);
			
			$datos['catalogos']['municipiosCatalogos'] = $this->general_m->mTraerDatosTabla($datosTabla);
			
		}else{
			echo "no se encuentra el tipo de filtro";
		}
		
		return $datos;
	}


	/*Trae los casos relacionados con un actor colectivo y sus afiliados*/
	public function casosRelacionados($actorCId)
	{
		
		//Traer casos relacionados con el actor colectivo
		$datos['casosRelacionadosId']=$this->actores_m->mTraeCasosRelacionadosActor($actorCId);

		if(!empty($datos['casosRelacionadosId'])){
			
			for($i=1 ;$i <= sizeof($datos['casosRelacionadosId']);$i++){
			
				if(!empty($datos['casosRelacionadosId'][$i]['casos_casoId'])){
					
					$v1 = $datos['casosRelacionadosId'][$i]['casos_casoId'];
					
					$datos['casosActor'][$v1]=$this->casos_m->mTraerDatosCaso($v1);
				
					//Modifica el arreglo de casos actor para cambiar el id de tipo de intervencion por su nombre
					for($k=1; $k <= sizeof($datos['casosActor'][$v1]['intervenciones']); $k++){
						
						if(isset($datos['casosActor'][$v1]['intervenciones'][$k]['IntervencionNId'])){
							
							$n = $datos['casosActor'][$v1]['intervenciones'][$k]['IntervencionNId'];
				
							$datos['tipoIntervencionN'.$n['IntervencionNId'].'Catalogo'] = $this->general_m->obtener_todo('tipoIntervencionN'.$n['IntervencionNId'].'Catalogo', 'tipoIntervencionN'.$n['IntervencionNId'].'Id', 'descripcion');
					
					
							for($m=1; $m <= sizeof($datos['tipoIntervencionN'.$n['IntervencionNId'].'Catalogo']); $m++){
								
								$v2 = $datos['tipoIntervencionN'.$n['IntervencionNId'].'Catalogo'][$m];
								
								if($v2['tipoIntervencionN'.$n['IntervencionNId'].'Id'] == $n){
									
									$datos['casosActor'][$v1]['intervenciones'][$k]['tipoIntervencionId']=$v2['descripcion'];
								}
								
								
							}
						}
						
					}
					
					//Modifica el arreglo de casos actor para cambiar el id de tipo de derecho afectado por su nombre
					
					for($k=1; $k <= sizeof($datos['casosActor'][$v1]['derechoAfectado']); $k++){
						
						if(isset($datos['casosActor'][$v1]['derechoAfectado'][$k]['derechoAfectadoNivel'])){
							
							$n = $datos['casosActor'][$v1]['derechoAfectado'][$k]['derechoAfectadoNivel'];
				
							$datos['derechosAfectadosN'.$n['derechoAfectadoNivel'].'Catalogo'] = $this->general_m->obtener_todo('derechosAfectadosN'.$n['derechoAfectadoNivel'].'Catalogo', 'derechoAfectadoN'.$n['derechoAfectadoNivel'].'Id', 'descripcion');
					
					
							for($m=1; $m <= sizeof($datos['derechosAfectadosN'.$n['derechoAfectadoNivel'].'Catalogo']); $m++){
								
								$v2 = $datos['derechosAfectadosN'.$n['derechoAfectadoNivel'].'Catalogo'][$m];
								
								if($v2['derechoAfectadoN'.$n['derechoAfectadoNivel'].'Id'] == $n){
									
									$datos['casosActor'][$v1]['derechoAfectado'][$k]['derechoAfectadoId']=$v2['descripcion'];
								}
								
								
							}
						}
						
					}
					
					//Modifica el arreglo de casos actor para cambiar el id de tipo acto violatorio por su nombre
		
					for($k=1; $k <= sizeof($datos['casosActor'][$v1]['actos']); $k++){
						
						if(isset($datos['casosActor'][$v1]['actos'][$k]['actoViolatorioNivel'])){
							
							$n = $datos['casosActor'][$v1]['actos'][$k]['actoViolatorioNivel'];
							
							if($n['actoViolatorioNivel']==1){
								$datos['actosN'.$n['actoViolatorioNivel'].'Catalogo'] = $this->general_m->obtener_todo('actosN'.$n['actoViolatorioNivel'].'Catalogo', 'actoId', 'descripcion');
								
								for($m=1; $m <= sizeof($datos['actosN'.$n['actoViolatorioNivel'].'Catalogo']); $m++){
								
								$v2 = $datos['actosN'.$n['actoViolatorioNivel'].'Catalogo'][$m];
								
								if($v2['actoId'] == $n){
									
									$datos['casosActor'][$v1]['actos'][$k]['actoViolatorioId']=$v2['descripcion'];
								}
								
							}
								
							}else{
								$datos['actosN'.$n['actoViolatorioNivel'].'Catalogo'] = $this->general_m->obtener_todo('actosN'.$n['actoViolatorioNivel'].'Catalogo', 'actoN'.$n['actoViolatorioNivel'].'Id', 'descripcion');
								for($m=1; $m <= sizeof($datos['actosN'.$n['actoViolatorioNivel'].'Catalogo']); $m++){
								
									$v2 = $datos['actosN'.$n['actoViolatorioNivel'].'Catalogo'][$m];
									
									if($v2['actoN'.$n['actoViolatorioNivel'].'Id'] == $n){
										
										$datos['casosActor'][$v1]['actos'][$k]['actoViolatorioId']=$v2['descripcion'];
									}
									
								}
							}
					 					
						}
						
					}
					
					
					
				}
			
			}
				
		}

		//print_r($datos['casosActor']);
		
		//Traer casos relacionados con los afiliados del actor colectivo
		
		$datos['actoresAfiliados']=$this->actores_m->mTraeRelacionesColectivo($actorCId);		
		
	
		
		if($datos['actoresAfiliados'] != '0' && $datos['actoresAfiliados'] != ''){
			
			foreach ($datos['actoresAfiliados'] as $valor)
			
				$datos['casosAfiliados'][$valor['actorId']]=$this->actores_m->mTraeCasosRelacionadosActor($valor['actorId']);
		
		
			
			foreach ($datos['casosAfiliados'] as $valor){
				
				if(isset($datos['casosAfiliados'][$valor[1]['casos_casoId']])){
					
					$datos['casosAfiliados'][$valor[1]['casos_casoId']]=$this->casos_m->mTraerDatosCaso($valor[1]['casos_casoId']);
				
					//Modifica el arreglo de casos actor para cambiar el id de tipo de intervencion por su nombre
					for($k=1; $k <= sizeof($datos['casosAfiliados'][$valor[1]['casos_casoId']]['intervenciones']); $k++){
						
						if(isset($datos['casosAfiliados'][$valor[1]['casos_casoId']]['intervenciones'][$k]['IntervencionNId'])){
							
							$n = $datos['casosAfiliados'][$valor[1]['casos_casoId']]['intervenciones'][$k]['IntervencionNId'];
				
							$datos['tipoIntervencionN'.$n['IntervencionNId'].'Catalogo'] = $this->general_m->obtener_todo('tipoIntervencionN'.$n['IntervencionNId'].'Catalogo', 'tipoIntervencionN'.$n['IntervencionNId'].'Id', 'descripcion');
					
					
							for($m=1; $m <= sizeof($datos['tipoIntervencionN'.$n['IntervencionNId'].'Catalogo']); $m++){
								
								$v2 = $datos['tipoIntervencionN'.$n['IntervencionNId'].'Catalogo'][$m];
								
								if($v2['tipoIntervencionN'.$n['IntervencionNId'].'Id'] == $n){
									
									$datos['casosAfiliados'][$valor[1]['casos_casoId']]['intervenciones'][$k]['tipoIntervencionId']=$v2['descripcion'];
								}
								
								
							}
						}
						
					}
					
					//Modifica el arreglo de casos actor para cambiar el id de tipo de derecho afectado por su nombre
				
					for($k=1; $k <= sizeof($datos['casosAfiliados'][$valor[1]['casos_casoId']]['derechoAfectado']); $k++){
						
						if(isset($datos['casosAfiliados'][$valor[1]['casos_casoId']]['derechoAfectado'][$k]['derechoAfectadoNivel'])){
							
							$n = $datos['casosAfiliados'][$valor[1]['casos_casoId']]['derechoAfectado'][$k]['derechoAfectadoNivel'];
				
							$datos['derechosAfectadosN'.$n['derechoAfectadoNivel'].'Catalogo'] = $this->general_m->obtener_todo('derechosAfectadosN'.$n['derechoAfectadoNivel'].'Catalogo', 'derechoAfectadoN'.$n['derechoAfectadoNivel'].'Id', 'descripcion');
					
					
							for($m=1; $m <= sizeof($datos['derechosAfectadosN'.$n['derechoAfectadoNivel'].'Catalogo']); $m++){
								
								$v2 = $datos['derechosAfectadosN'.$n['derechoAfectadoNivel'].'Catalogo'][$m];
								
								if($v2['derechoAfectadoN'.$n['derechoAfectadoNivel'].'Id'] == $n){
									
									$datos['casosAfiliados'][$valor[1]['casos_casoId']]['derechoAfectado'][$k]['derechoAfectadoId']=$v2['descripcion'];
								}
								
								
							}
						}
						
					}
					
					
					//Modifica el arreglo de casos actor para cambiar el id de tipo acto violatorio por su nombre
	
					for($k=1; $k <= sizeof($datos['casosAfiliados'][$valor[1]['casos_casoId']]['actos']); $k++){
						
						if(isset($datos['casosAfiliados'][$valor[1]['casos_casoId']]['actos'][$k]['actoViolatorioNivel'])){
							
							$n = $datos['casosAfiliados'][$valor[1]['casos_casoId']]['actos'][$k]['actoViolatorioNivel'];
							
							if($n['actoViolatorioNivel']==1){
								$datos['actosN'.$n['actoViolatorioNivel'].'Catalogo'] = $this->general_m->obtener_todo('actosN'.$n['actoViolatorioNivel'].'Catalogo', 'actoId', 'descripcion');
								
								for($m=1; $m <= sizeof($datos['actosN'.$n['actoViolatorioNivel'].'Catalogo']); $m++){
								
								$v2 = $datos['actosN'.$n['actoViolatorioNivel'].'Catalogo'][$m];
								
								if($v2['actoId'] == $n){
									
									$datos['casosAfiliados'][$valor[1]['casos_casoId']]['actos'][$k]['actoViolatorioId']=$v2['descripcion'];
								}
								
							}
								
							}else{
								$datos['actosN'.$n['actoViolatorioNivel'].'Catalogo'] = $this->general_m->obtener_todo('actosN'.$n['actoViolatorioNivel'].'Catalogo', 'actoN'.$n['actoViolatorioNivel'].'Id', 'descripcion');
								for($m=1; $m <= sizeof($datos['actosN'.$n['actoViolatorioNivel'].'Catalogo']); $m++){
								
									$v2 = $datos['actosN'.$n['actoViolatorioNivel'].'Catalogo'][$m];
									
									if($v2['actoN'.$n['actoViolatorioNivel'].'Id'] == $n){
										
										$datos['casosAfiliados'][$valor[1]['casos_casoId']]['actos'][$k]['actoViolatorioId']=$v2['descripcion'];
									}
									
								}
							}
					 					
						}
						
					}
				}
				
				
			
			}
			
		}
		
		if(!empty($datos['actoresAfiliados']) || !empty($datos['casosRelacionadosId'])){
				
			return $datos;
			
		}else{
			
			return '0';	
			
		}	
	}

	public function filtrarActor(){
		
		$cadena = "";
		
		$tipoFiltro = "";
		
		$tipoActor = 1;
		
		$tipoActor = $this->input->post('tipoActor');
		
		$cadena = $this->input->post('cadena');
		
		$tipoFiltro = $this->input->post('tipoFiltro');
		
		   if ((!empty($cadena)) && ($tipoFiltro == 0)){
		   	
				$data = $this->actores_m->mBuscarActoresNombre($cadena);
			   
			}elseif((empty($cadena)) && ($tipoFiltro != 0)){
				
				$data = $this->actores_m->mFiltrosBusquedaActor($tipoFiltro);	
					
			}elseif((!empty($cadena)) && ($tipoFiltro != 0)){
				
				$data = $this->actores_m->mBusquedaActorFiltroNombre($tipoFiltro, $cadena);
				
			}else{
            	echo "error";
			}
				$datos="";
		 		if($data == 0){
					echo "No existen actores con ese filtro";
				}else{
					
					foreach ($data as $individual) {
						
						$datos = $datos.  '<div class="twelve columns" id="caja'.$individual['actorId'].'" onclick="cargarActor('.$individual['actorId'].','.$tipoActor.')" style="cursor: pointer;">		        
		                    <img class="five columns" src="'.base_url().$individual['foto'].'" />
		                    <p style="color:#0080FF;">'.$individual['nombre'].' '.$individual['apellidosSiglas'].'</p>
			             </div><hr />';	
						
					}
				}
		
			print_r($datos);
		
	}

	
	public function relacionaActorCaso($idCaso, $idActor)
	{
		$datos = array('casoId' => $idCaso , 'actorId' => $idActor);
		
		$mensaje = $this->actores_m->mRelacionaCasoActor($datos);
		
		return $mensaje;
	}

	public function agregarDireccion($actorId){
		
		
		 foreach($_POST as $campo => $valor){ 
			
            $pos = strpos($campo, '_');
			
            $nombre_tabla = substr($campo, 0, $pos);
	
            $nombre_campo = substr($campo, ++$pos);
			
			if(!empty($valor))
			
            	$datos[$nombre_tabla][$nombre_campo] = $valor; 

        } 
		
		$datos['direccionActor']['actores_actorId'] = $actorId;
		
        $mensaje = $this->actores_m->mAgregarDireccionActor($datos['direccionActor']);
		
     	return $mensaje;
	}

	public function eliminarDireccion($direccionId,$actorId,$tipoActor){
		
		$mensaje = $this->actores_m->mEliminarDireccionActor($direccionId);	
		
		redirect(base_url().'index.php/actores_c/mostrar_actor/'.$actorId.'/'.$tipoActor);
		
		return $mensaje;
		
	}
	
	public function actualizaDireccion($direccionId,$actorId){
		
		 foreach($_POST as $campo => $valor){ 
			
            $pos = strpos($campo, '_');
			
            $nombre_tabla = substr($campo, 0, $pos);
	
            $nombre_campo = substr($campo, ++$pos);
			
			if(!empty($valor))
			
            	$datos[$nombre_tabla][$nombre_campo] = $valor; 

        } 

        $mensaje = $this->actores_m->mActualizaDatosDireccion($datos,$direccionId);
        
		redirect(base_url().'index.php/actores_c/mostrar_actor/'.$actorId.'/'.$_POST['actores_tipoActorId']);
		
		return $mensaje;
		
		
	}
    
	public function eliminarRelacionActor($relacionActoresId, $actorId){
		
		$mensaje = $this->actores_m->mEliminaRelacionActores($relacionActoresId);
		
		redirect(base_url().'index.php/actores_c/mostrar_actor/'.$actorId.'/'.$_POST['actores_tipoActorId']);
		
		return $mensaje;
	}
	
	public function seleccionarColectivo(){
		
		$datos['is_active'] = 'actores';
		
		$datos['head'] = $this->load->view('general/head_v', $datos, true);
		 
		$datos['actoresColectivos'] = $this->actores_m->listado_actores_m(3);
		
		$this->load->view('casos/SeleccionActorColectivo', $datos);
	}
	
	public function seleccionarIndividual(){
		
		$datos['is_active'] = 'actores';
		
		$datos['head'] = $this->load->view('general/head_v', $datos, true);
		
		$datos['actoresIndividuales'] = $this->actores_m->listado_actores_m(1);
		
		$datos['actoresTransmigrantes'] = $this->actores_m->listado_actores_m(2);
		
		$this->load->view('casos/SeleccionActorIndividual', $datos);
	}
	
	public function seleccionarActores(){
		
		$datos['is_active'] = 'actores';
		
		$datos['head'] = $this->load->view('general/head_v', $datos, true);
		
		$datos['todosActores'] =  $this->actores_m->mListaTodosActores();
		
		$this->load->view('casos/SeleccionrActor', $datos);
	}
	
	public function direccion($idActor, $direccionId = 0){
		
		$datos['is_active'] = 'actores';
		
		$datos['head'] = $this->load->view('general/head_v', $datos, true);

        $datos['catalogos'] = $this->traer_catalogos();
		
		$datos['actorId'] = $idActor;
		
		if($direccionId != 0){
			
			$datos['listaTodosActores'] = $this->actores_m-> mListaTodosActores();
			
			$datos['datos'] = $this->actores_m->traer_datos_actor_m($idActor, $datos['listaTodosActores'][$idActor]['tipoActorId']);

			if(isset($datos['datos']['direccionActor'][$direccionId])){
				
				$datos['datosActor'] = $datos['datos']['direccionActor'][$direccionId];
				
			}
			
		}
		
		$this->load->view('actores/formularioNuevaDireccion', $datos);
	}
}

/* End of file actores_c.php */
/* Location: ./application/controllers/actores_c.php */