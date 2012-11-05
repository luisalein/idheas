<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_c extends CI_Controller
{

	public function __construct(){
           
          parent::__construct();
          
            $this->load->helper(array('html', 'url'));
			
			$this->load->library('session');

        	$this->load->model(array('actores_m', 'general_m','reportes_m', 'catalogos_m','casos_m'));
     }
	
	 
    function index(){
           
		if(!empty($_POST['usuario']) && !empty($_POST['contrasenia'])){
			
			$datos=array('usr'=>$_POST['usuario'],'pass'=>$_POST['contrasenia']);
			
			$mensaje = $this->general_m->mVerificarLoginUsuario($datos);
			
			//echo $mensaje;
			
			if($mensaje == '2'){
				
				return "contraseña no válida";
			
			}elseif($mensaje == '1'){
				
				$newdata = array(
		                   'usr'  => $_POST['usuario'],
		                   'pass'     => $_POST['contrasenia'],
		                   'logged_in' => TRUE
		         );
		
				$this->session->set_userdata($newdata);	
				
				$session =	$this->session->all_userdata();
		
				if(!empty($session['usr'])){
		        	
		        	redirect('actores_c/mostrar_actor');  
					    	
		        }
				
			}elseif($mensaje == '3'){
				
				return "No existe el usuario";
			}else{
				
				return "Error en validación";
				
			}
			
		}   
	   
    }
	
	public function cambiarContrasenia(){
		
		$datos = array ( 'datosViejos'=> array ( 'usr' => $_POST['usuario'], 'pass' => $_POST['contrasenia']),
						 'datosNuevos' => array('pass' => $_POST['newContrasenia']));
						 
		$mensaje = $this->general_m->mCambiarPassUsuario($datos);
		
		return $mensaje;
		
	}
}

?>