<?php
class Contrasenia_c extends CI_Controller {
	
	function __construct() {
        
        parent::__construct();
        
        $this->load->helper(array('html', 'url'));
        
        //$this->load->library(array('traer_catalogos_l'));
        $this->load->library('session');
        
		$this->is_logged_in();
		
        $this->load->model(array('actores_m', 'general_m', 'catalogos_m'));
        
    }
	
	private function is_logged_in(){
		$logged_in = $this->session->userdata('logged_in');
		if(!isset($logged_in) or $logged_in != TRUE){
			redirect(base_url());
		}
	}
	
	function mostrar_cambioPass(){
		
		$datos['is_active'] = 'contrasenia';
		
		$datos['derechosAfectados'] = $this->catalogos_m->mTraerDatosCatalogoDerechosAfectados();

        $datos['actos'] = $this->catalogos_m->mTraerDatosCatalogoActos();

        $datos['head'] = $this->load->view('general/head_v', $datos, true);

        $datos['content'] = $this->load->view('general/cambiarContrasenia_v', $datos, true);
       
        $datos['body'] = $this->load->view('general/body_v', $datos, true);


        $this->load->view('general/principal_v', $datos);
	}
	
	function cambiarPass(){
		$oldPass = $_POST['oldPass'];
		$newPass1 = $_POST['newPass1'];
		$newPass2 = $_POST['newPass2'];
		
		$session =	$this->session->all_userdata();
		
		$usr = $session['usr'];
	
		if((strcasecmp($newPass1, $newPass2)==0) && isset($usr)){
			$datos = array ( 'datosViejos'=> array ( 'usr' => $usr, 'pass' => $oldPass), 
		 				'datosNuevos' => array('pass' => $newPass2));
			$mensaje = $this->general_m->mCambiarPassUsuario($datos);
		
		}
		echo $mensaje;
		
	}
}
?>	
	