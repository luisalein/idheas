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
		
		
<<<<<<< HEAD
			$Data['rrr']=$this->actores_m->mTraeRelacionesColectivo(1);	
	
			if($Data['rrr'] !=''){
				$Data['datos']=	$Data['rrr'];
				
			}else{
				$Data['datos']=	"No Hecho";
			}
				
=======
		
		$datos['actoresAfiliados']=$this->actores_m->mTraeRelacionesColectivo(4);		
		
	
		
		
			
			foreach ($datos['actoresAfiliados'] as $valor)
			
				$Data['datos'][$valor['actorId']]=$this->actores_m->mTraeCasosRelacionadosActor($valor['actorId']);
		
		
>>>>>>> b8e307dbacd6d0cef1708ef42ca331420727f32d
			
    		//$Data['datos']= system('pwd');
    		
		
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