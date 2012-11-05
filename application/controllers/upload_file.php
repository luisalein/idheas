<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Upload_file extends CI_Controller
{
	public function __construct(){
           
          parent::__construct();
          
            $this->load->helper(array('html', 'url'));

        	$this->load->model(array('actores_m', 'general_m','reportes_m', 'catalogos_m','casos_m'));
       }
	function index() 
	{
		$status = "";
	    if ($_POST["action"] == "uploadFoto") {
			// obtenemos los datos del archivo
			$tamano = $_FILES["archivo"]['size'];
			$tipo = $_FILES["archivo"]['type'];
			$archivo = $_FILES["archivo"]['name'];
			$prefijo = substr(md5(uniqid(rand())),0,6);
	
			
			if($tipo == "image/png" || $tipo == "image/jpg"){			
				if ($archivo != "") {
				    // guardamos el archivo a la carpeta files
				    $destino = base_url(). "statics/fotosActor/".$prefijo."_".$archivo;
					
				    if (move_uploaded_file($_FILES['archivo']['tmp_name'],$destino)) {
				    	
				    	$datos['registro'] = array('ruta'=>$destino,'fichas_fichaId'=>$_POST['fichaId']);
						$mensaje = $this->general_m->llenar_tabla_m($datos);
						$status = "Archivo subido: <b>".$archivo."</b>";
						
				    } else {
				    	
						$status = "Error al subir el archivo";
						
				    }
				} else {
					
				    $status = "Error al subir archivo";
					
				}
				
			}
	    }
		
		if ($_POST["action"] == "uploadPdf") {
			// obtenemos los datos del archivo
			$tamano = $_FILES["archivo"]['size'];
			$tipo = $_FILES["archivo"]['type'];
			$archivo = $_FILES["archivo"]['name'];
			$prefijo = substr(md5(uniqid(rand())),0,6);
	
			
			if($tipo == "application/pdf"){			
				if ($archivo != "") {
				    // guardamos el archivo a la carpeta files
				    $destino =  base_url(). "statics/registros/".$prefijo."_".$archivo;
				    if (move_uploaded_file($_FILES['archivo']['tmp_name'],$destino)) {
							
						$datos['registro'] = array('ruta'=>$destino,'fichas_fichaId'=>$_POST['fichaId']);
						$mensaje = $this->general_m->llenar_tabla_m($datos);	
						$status = "Archivo subido: <b>".$archivo."</b>";
						
				    } else {
				    	
						$status = "Error al subir el archivo";
				    }
				} else {
				    $status = "Error al subir archivo";
				}
				
			}
	    }
		
		return $status;
	}
	
}