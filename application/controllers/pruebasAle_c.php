<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class PruebasAle_c extends CI_Controller
{

	public function __construct(){
           
          parent::__construct();
          
            $this->load->helper(array('html', 'url'));

        	$this->load->model(array('actores_m', 'general_m','reportes_m', 'catalogos_m','casos_m'));
       }
	
	function index() 
	{	
		
		$datos['idiomaCatalogo'] = $this->general_m->obtener_todo('idiomaCatalogo', 'idiomaId', 'descripcion');
		//  $this->load->view('actores/lista_v', $datos, true);
		print_r($datos['idiomaCatalogo']);
			$Data['datos']=$datos['idiomaCatalogo'];
	 $this->load->view('pruebasAle',$Data);
	}
	
	public function cAgregarCatalogoTipoDeDireccion(){
        echo "funcion";
        $catalogo = explode('&', read_file('statics/catalogos/catalogosDeUnSoloNivel/catalogoTipoDeDireccion.csv'));
        print_r($catalogo);
        foreach($catalogo as $filaCatalogo){
                
            $datos = explode('¬', $filaCatalogo);
            echo $datos; 
            $filas['tipoDireccionCatalogo'][trim($datos[0])] = array('tipoDireccionId' => trim($datos[0]), 'descripcion' => trim($datos[1]));

        }
        print_r($filas);
        $this->agregar_catalogos_m->mAgregarCatalogos($filas);
        
        echo 'Catalogo de tipos de direccion insertado exitosamente.<br />';
        
    }
}

?>