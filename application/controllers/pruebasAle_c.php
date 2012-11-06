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
		$datos = array (
			  						'nombre' 					=> '',
			  						'desdeFecha' 				=> '1987-05-01',
			  						'hastaFecha' 				=> '1987-10-01',
			  						'derechoAfectadoId' 		=> '',
			  						'derechoAfectadoNivel' 		=> '',
			  						'actoViolatorioId' 			=> '',
			  						'actoViolatorioNivel'		=> ''
			  						);
		
		

    	$datos['listaTodosActores'] = $this->actores_m-> mListaTodosActores();
			
		$datos['datos'] = $this->actores_m->traer_datos_actor_m(6, $datos['listaTodosActores'][6]['tipoActorId']);

	if(isset($datos['datos']['direccionActor'][1]))
		$Data['datos'] = $datos['datos'];
	else 
	 $Data['datos']="hola";
	
		//  $this->load->view('actores/lista_v', $datos, true);
			
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