<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Casos_c extends CI_Controller {
    
    function __construct() {
        
        parent::__construct();
        
        $this->load->helper(array('html', 'url'));
        
        //$this->load->library(array('traer_catalogos_l'));
        
        $this->load->model(array('actores_m', 'general_m', 'casos_m'));
        
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

        $datos['listaTodosActores'] = $this->actores_m-> mListaTodosActores();
        
        return $datos;
        
    }
    
    function mostrar_caso($casoId = 0, $cadena ='0'){
        
     
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
           if($cadena != '0'){
           		$datos['listado'] = $this->casos_m->mBuscarCasosNombre($cadena);
				//$datos['listado']['mensaje']='ok';/ 	print_r($datos['listado']);
           }else{
           		$datos['listado'] = $this->casos_m->mListaCasos();
           }         
                    
            
            
            
        

        $datos['casos']=$this->load->view('casos/informacionGeneral_v', $datos, true);

        $datos['casosNucleo']=$this->load->view('casos/nucleoCaso_v', $datos, true);

        $datos['infoAdicional']=$this->load->view('casos/infoAdicional_v', $datos, true);
        

        $datos['lista'] = $this->load->view('actores/lista_v', $datos, true);
        
        $datos['form'] = $this->load->view('casos/principalCasos_v', $datos, true);
        
        $datos['content'] = $this->load->view('actores/principal_v', $datos, true);
        
        $datos['body'] = $this->load->view('general/body_v', $datos, true);
            
        $this->load->view('general/principal_v', $datos);
        
    }
    
    public function agregar_caso(){
        
        $datos['action'] = base_url().'index.php/casos_c/guardar_caso';
        
        $datos['is_active'] = 'casos';
        
        $datos['head'] = $this->load->view('general/head_v', $datos, true);
        
        /*
         * se selecciona el tipo de actor y se trae la vista segun el tipo de actor
         */
                    
        //$datos['listado'] = $this->casos_m->mListaCasos();
        
        //$datos['lista'] = $this->load->view('actores/lista_v', $datos, true);
        
        $datos['content'] = $this->load->view('casos/formularioInfoGral_v', $datos, true);
        
        //$datos['content'] = $this->load->view('actores/principal_v', $datos, true);
        
        $datos['body'] = $this->load->view('general/body_v', $datos, true);
            
        $this->load->view('general/principal_v', $datos);
        
    }
    
    public function guardar_caso(){
        
        foreach($_POST as $campo => $valor){ 
   		
                    $pos = strpos($campo, '_');
                    
                    $nombre_tabla = substr($campo, 0, $pos);
                    
                    $nombre_campo = substr($campo, ++$pos);
                    
                    $datos['tablas'][$nombre_tabla][$nombre_campo] = $valor; 
                        
                }

           $casoId = $this->casos_m->mAgregarCaso($datos);
           
           $url = base_url().'index.php/casos_c/mostrar_caso/'.$casoId;
           
           redirect($url);
        
    }
	/*
	 * Valida si hay casos o actores relacionados con el caso, si no los hay cambia el estado del caso a "inactivo"
	 * se existen al menos un caso o un actor relacionado, manda el mensaje de que no puede eliminar el caso
	 * */
	public function eliminarCaso(){
		
		$casoId = $this->input->post("idCaso");	
		
		$datos['relacionesConCasos'] = $this->casos_m-> mTraeRelacionesCaso($casoId);
		
		$datos['relacionesConActores'] = $this->casos_m->mTraerActoresRelacionadosCaso($casoId);

		if($datos['relacionesConCasos'] == '0' && $datos['relacionesConActores'] == '0'){
			
			 $mensaje = $this->casos_m->mCambiaEstadoActivoCaso($casoId);
			
		}else{
			
			$mensaje = "Este caso tiene otros casos o actores relacionados, elimina primero estas relaciones";
			
		}
		
		echo $mensaje;
	}
	
	function editarCaso($casoId){
        
        $datos['casoId'] = $casoId;
        
        $datos['datosCaso'] = $this->actores_m->mTraerDatosCaso($casoId);

        
        if($casoId > 0){
            
            $datos['action'] = base_url().'index.php/actores_c/editarCasoBd';
            
			$datos['form'] = $this->load->view('casos/formularioInfoGral_v', $datos, true);
               
            $datos['is_active'] = 'casos';

            $datos['head'] = $this->load->view('general/head_v', $datos, true);
                
            $datos['lista'] = $this->load->view('casos/listaCasos_v', $datos, true);
        
            $datos['content'] = $this->load->view('casos/principalCasos_v', $datos, true);

            $datos['body'] = $this->load->view('general/body_v', $datos, true);

            $this->load->view('general/principal_v', $datos);
            
        } else {
            
            redirect(base_url().'index.php/casos_c/mostrar_caso');
            
        }
        
    }
    
    public function editarCasoBd(){
        
        foreach($_POST as $campo => $valor){
            
            if($campo != 'userfile' && $valor != ''){
            
                $pos = strpos($campo, '_');

                $nombre_tabla = substr($campo, 0, $pos);

                $nombre_campo = substr($campo, ++$pos);

                $datos[$nombre_tabla][$nombre_campo] = $valor; 
                
            }

        }
        
        $this->actores_m->mActualizaDatosCaso($datos['casos']['casoId'], $datos);
        
        redirect(base_url().'index.php/casos_c/mostrar_caso/'.$datos['casos']['casoId']);
        
    }
	
	public function seleccionActor(){
		
		$DatosGenerales['head'] = $this->load->view('general/head_v', "", true);
		
		
		$this->load->view('casos/SelecionActor',$DatosGenerales);
	}
	
	
	public function buscarCasos(){
		
		$cadena = $this->input->post('cadena');
		$total = 0;
		if(!empty($cadena)){
			$data = $this->casos_m->mBuscarCasosNombre($cadena);
			
			$datos="";
		 		if($data == 0){
					echo "No existen casos con ese filtro";
				}else{
					
					foreach ($data as $individual) {
						
						$datos = $datos. '<div class="twelve columns" id="caja'.$individual['casoId'].
						'" onclick="cargarCaso('.$individual['casoId'].')" style="cursor: pointer;">'.$individual['nombre'].'</div><hr />';
						
						$total = $total +1;
					}
				}
			
    	
		    	if ($total==1) {
		    		$datos = $datos .'<div id="numeroRegistros">'.$total.' registro encontrado</div>';
				} else {
				    $datos = $datos .'<div id="numeroRegistros">'.$total.' registros encontrados</div>';
				} 
		    
			print_r($datos);			
			
		}else{
			echo 0;
		}
	    
		
	}
	
	
	public function mostrarVictimas($idActo,$idVictima = 0, $ventana = 0){
			
		$datos['catalogos'] = $this->traer_catalogos();
		
		$datos['victimas'] = $this->casos_m->mTraerVictimasActo($idActo);
		
		$datos['head'] = $this->load->view('general/head_v', $datos, true);
		
		$datos['idVictima'] = $idVictima;
		
		$datos['idActo'] = $idActo;
		if($ventana == 0){
			$this->load->view('casos/formularioVictima_v', $datos);
		}
		if($ventana == 1){
			$this->load->view('casos/formularioEditarVictima_v', $datos);
		}
		
	}
	
	public function guardarVictima($idActo){
		
		foreach($_POST as $campo => $valor){ 
			
            $pos = strpos($campo, '_');
			
            $nombre_tabla = substr($campo, 0, $pos);
	
            $nombre_campo = substr($campo, ++$pos);
			
			if(!empty($valor))
			
            	$datos[$nombre_tabla][$nombre_campo] = $valor; 

        } 
		
		$datos['victimas']['actos_actoId'] = $idActo;
		
		$this->casos_m->mAgregarVictimaActo($datos['victimas']);
		
		redirect(base_url().'index.php/casos_c/mostrarVictimas'.$idActo);
				
	}

	public function editarVictima($idActo, $idVictima){
		
		foreach($_POST as $campo => $valor){ 
			
            $pos = strpos($campo, '_');
			
            $nombre_tabla = substr($campo, 0, $pos);
	
            $nombre_campo = substr($campo, ++$pos);
			
			if(!empty($valor))
			
            	$datos[$nombre_tabla][$nombre_campo] = $valor; 

        } 
		
		$datos['victimas']['actos_actoId'] = $idActo;
		
		$this->casos_m->mActualizaDatosVictima($datos['victimas'],$idVictima);
		
		redirect(base_url().'index.php/casos_c/mostrarVictimas'.$idActo);
		
	}
	
	public function eliminarVictima($idActo,$idVictima){
		
		
	}
    
}