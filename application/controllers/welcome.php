<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	 
	 public function __construct(){
           
          parent::__construct();
          
            $this->load->helper(array('html', 'url'));
			
			$this->load->library('session');

        	$this->load->model(array('actores_m', 'general_m','reportes_m', 'catalogos_m','casos_m'));
     }
	 
	public function index(){
            
		/*$newdata = array(
                   'username'  => '',
                   'pass'     => '',
                   'logged_in' => TRUE
         );


		//validar en base de datos si existe el usuario y contraseña
		$this->session->set_userdata($newdata);		*/
			
		$session =	$this->session->all_userdata();
		
        if(!empty($session['usr'])){
        	
        	redirect('actores_c/mostrar_actor');  
			       	
        }
        else{
        	
        	$datos['head'] = $this->load->view('general/head_v', '', true);
        	
        	$this->load->view('login',$datos); 
			           
        }
            
	
   }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */