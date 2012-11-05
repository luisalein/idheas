<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Agregar_catalogos_c extends CI_Controller {
    
    public function __construct() {
        
        parent::__construct();
        
        $this->load->helper(array('file', 'url'));
        
        $this->load->model('agregar_catalogos_m');
        
    }
    
    public function index(){
                
        $this->cAgregarCatalogoDeOcupaciones();
        
        $this->cAgregarCatalogoGruposIndigenas();
        
        $this->cAgregarCatalogosLugares();
        
        $this->cAgregarCatalogosTipoDeIntervencion();
        
        $this->cAgregarCatalogosTipoPerpetrador();
        
        $this->cAgregarDerechosCatalogos();
        
        $this->cAgregarActosCatalogos();
        
        $this->cAgregarCatalogoEstatusDeLaVictima();
        
        $this->cAgregarCatalogoEstatusDelPerpetrador();
        
        $this->cAgregarCatalogoNivelDeConfiabilidad();
        
        $this->cAgregarCatalogoTipoDeFuente();
        
        $this->cAgregarCatalogoTipoDeActorColectivo();
        
        $this->cAgregarEstadoCivilCatalogo();
        
        $this->cAgregarCatalogoRelacionEntreActores();
        
        $this->cAgregarCatalogoDeNacionalidades();
        
    }
    
    /*
     * @name: Agrega los catalogos de derechos afectados
     * @param: no_aplica
     * @descripcion: Esta función agrega el catalogo de paises a la bse de datos.
     * 
     */
    
    public function cAgregarEstadoCivilCatalogo(){
        
        $estadoCivil['estadoCivil'][1] = array('estadoCivilId' => 1, 'descripcion' => 'Soltero');
        
        $estadoCivil['estadoCivil'][2] = array('estadoCivilId' => 2, 'descripcion' => 'Casado');
        
        $estadoCivil['estadoCivil'][3] = array('estadoCivilId' => 3, 'descripcion' => 'Viudo');
        
        $estadoCivil['estadoCivil'][4] = array('estadoCivilId' => 4, 'descripcion' => 'Separado');
        
        $estadoCivil['estadoCivil'][5] = array('estadoCivilId' => 5, 'descripcion' => 'Divorciado');
        
        $estadoCivil['estadoCivil'][6] = array('estadoCivilId' => 6, 'descripcion' => 'En Unión Libre');
        
        $estadoCivil['estadoCivil'][7] = array('estadoCivilId' => 7, 'descripcion' => 'Con Compañero');
        
        $estadoCivil['estadoCivil'][8] = array('estadoCivilId' => 8, 'descripcion' => 'En Sociedad De Convivencia');
        
        $this->agregar_catalogos_m->mAgregarCatalogos($estadoCivil);
        
        echo 'Catalogos de estados civiles insertados exitosamente<br />';
        
    }


    public function cAgregarDerechosCatalogos(){
        
        $derechosN1 = read_file('statics/catalogos/derechosAfectados/Derechos_Nivel1.csv');
        
        $derechosN1 = explode('&', $derechosN1);
        
        foreach($derechosN1 as $derechoN1){
            
            $obtener_datos = explode('¬', $derechoN1);
                
              $derechos['derechosAfectadosN1Catalogo'][trim($obtener_datos[0])] = array('derechoAfectadoN1Id' => trim($obtener_datos[0]), 'descripcion' => trim($obtener_datos[1]));

        }

        $derechosN2 = read_file('statics/catalogos/derechosAfectados/Derechos_Nivel2.csv');
        
        $derechosN2 = explode('&', $derechosN2);
        
        foreach($derechosN2 as $derechoN2){
            
            $obtener_datos = explode('¬', $derechoN2);
                
              $derechos['derechosAfectadosN2Catalogo'][trim($obtener_datos[0])] = array('derechoAfectadoN2Id' => trim($obtener_datos[0]), 'descripcion' => trim($obtener_datos[1]), 'derechosAfectadosN1Catalogo_derechoAfectadoN1Id' => trim($obtener_datos[2]), 'notas' => trim($obtener_datos[3]));

        }
        
        $derechosN3 = read_file('statics/catalogos/derechosAfectados/Derechos_Nivel3.csv');
        
        $derechosN3 = explode('&', $derechosN3);
        
        foreach($derechosN3 as $derechoN3){
            
            $obtener_datos = explode('¬', $derechoN3);
                
              $derechos['derechosAfectadosN3Catalogo'][trim($obtener_datos[0])] = array('derechoAfectadoN3Id' => trim($obtener_datos[0]), 'descripcion' => trim($obtener_datos[1]), 'derechosAfectadosN2Catalogo_derechoAfectadoN2Id' => trim($obtener_datos[2]), 'notas' => trim($obtener_datos[3]));

        }
        
        $derechosN4 = read_file('statics/catalogos/derechosAfectados/Derechos_Nivel4.csv');
        
        $derechosN4 = explode('&', $derechosN4);
        
        foreach($derechosN4 as $derechoN4){
            
            $obtener_datos = explode('¬', $derechoN4);
                
              $derechos['derechosAfectadosN4Catalogo'][trim($obtener_datos[0])] = array('derechoAfectadoN4Id' => trim($obtener_datos[0]), 'descripcion' => trim($obtener_datos[1]), 'derechosAfectadosN3Catalogo_derechoAfectadoN3Id' => trim($obtener_datos[2]), 'notas' => trim($obtener_datos[3]));

        }
        
        $this->agregar_catalogos_m->mAgregarDerechosCatalogos($derechos);
        
        echo 'cataologos de derechos afectados ingresados correctamente<br />';
        
    }
    
        public function cAgregarActosCatalogos(){
        
        $derechosN1 = read_file('statics/catalogos/catalogoviolaciones/CatalogoViolaciones_nivel1.csv');
        
        $derechosN1 = explode('&', $derechosN1);
        
        foreach($derechosN1 as $derechoN1){
            
            $obtener_datos = explode('¬', $derechoN1);
                
              $derechos['actosN1Catalogo'][trim($obtener_datos[0])] = array('actoId' => trim($obtener_datos[0]), 'descripcion' => trim($obtener_datos[1]));

        }

        $derechosN2 = read_file('statics/catalogos/catalogoviolaciones/CatalogoViolaciones_nivel2.csv');
        
        $derechosN2 = explode('&', $derechosN2);
        
        foreach($derechosN2 as $derechoN2){
            
            $obtener_datos = explode('¬', $derechoN2);
                
              $derechos['actosN2Catalogo'][trim($obtener_datos[0])] = array('actoN2Id' => trim($obtener_datos[0]), 'descripcion' => trim($obtener_datos[1]), 'actosN1Catalogo_actoId' => trim($obtener_datos[2]), 'notas' => trim($obtener_datos[3]));

        }
        
        $derechosN3 = read_file('statics/catalogos/catalogoviolaciones/CatalogoViolaciones_nivel3.csv');
        
        $derechosN3 = explode('&', $derechosN3);
        
        foreach($derechosN3 as $derechoN3){
            
            $obtener_datos = explode('¬', $derechoN3);
                
              $derechos['actosN3Catalogo'][trim($obtener_datos[0])] = array('actoN3Id' => trim($obtener_datos[0]), 'descripcion' => trim($obtener_datos[1]), 'actosN2Catalogo_actoN2Id' => trim($obtener_datos[2]), 'notas' => trim($obtener_datos[3]));

        }
        
        $derechosN4 = read_file('statics/catalogos/catalogoviolaciones/CatalogoViolaciones_nivel3.csv');
        
        $derechosN4 = explode('&', $derechosN4);
        
        foreach($derechosN4 as $derechoN4){
            
            $obtener_datos = explode('¬', $derechoN4);
                
              $derechos['actosN4Catalogo'][trim($obtener_datos[0])] = array('actoN4Id' => trim($obtener_datos[0]), 'descripcion' => trim($obtener_datos[1]), 'actosN3Catalogo_actoN3Id' => trim($obtener_datos[2]), 'notas' => trim($obtener_datos[3]));

        }
        
        $this->agregar_catalogos_m->mAgregarDerechosCatalogos($derechos);
        
        echo 'Cataologos de actos violatorios ingresados correctamente<br />';
        
    }
    
    public function cAgregarCatalogosLugares(){
        
        $paises = read_file('statics/catalogos/catalogosLugares/paises.csv');
        
        $estados = read_file('statics/catalogos/catalogosLugares/CatalogosEdos.csv');
        
        $municipios = read_file('statics/catalogos/catalogosLugares/CatalogosMunicipios.csv');
        
        $paises = explode('&', $paises);
        
        $estados = explode('&', $estados);
        
        $municipios = explode('&', $municipios);
        
        foreach($paises as $pais){
            
            $datos_pais = explode('¬', $pais);
            
            $lugares['paisesCatalogo'][$datos_pais[0]] = array('paisId' => trim($datos_pais[0]), 'nombre' => trim($datos_pais[1]));
            
        }
        
        foreach($estados as $estado){
            
            $datos_estado = explode('¬', $estado);
            
            $lugares['estadosCatalogo'][trim($datos_estado[0])] = array('estadoId' => trim($datos_estado[0]), 'nombre' => trim($datos_estado[1]), 'paises_paisId' => trim($datos_estado[2]));
            
        }
        
        foreach($municipios as $municipio){
            
            $datos_municipio = explode('¬', $municipio);
            
            $lugares['municipiosCatalogo'][trim($datos_municipio[0])] = array('municipioId' => trim($datos_municipio[0]), 'nombre' => trim($datos_municipio[1]), 'estados_estadoId' => trim($datos_municipio[2]));
            
        }
        
        $this->agregar_catalogos_m->mAgregarCatalogos($lugares);
        
        echo 'Catalogos de lugares insertados exitosamente.<br />';
        
    }
    
    public function cAgregarCatalogosTipoDeIntervencion(){
        
        for($n = 1; $n <= 4; $n++){
            
            $tipoDeIntervencion[$n] = explode('&', read_file('statics/catalogos/catalogotipodeintervencion/TipodeIntervencion_nivel'.$n.'.csv'));
            
        }
            
            foreach($tipoDeIntervencion[1] as $nivelDeIntervencion){
                
                $datosNivel = explode('¬', $nivelDeIntervencion);
            
                $tiposDeIntervencionNiveles['tipoIntervencionN1Catalogo'][trim($datosNivel[0])] = array('tipoIntervencionN1Id' => trim($datosNivel[0]), 'descripcion' => trim($datosNivel[1]));
   
            }
            
            foreach($tipoDeIntervencion[2] as $nivelDeIntervencion){
                
                    $datosNivel = explode('¬', $nivelDeIntervencion);
                
                    $tiposDeIntervencionNiveles['tipoIntervencionN2Catalogo'][trim($datosNivel[0])] = array('tipoIntervencionN2Id' => trim($datosNivel[0]), 'descripcion' => trim($datosNivel[1]), 'tipoIntervencionN1Catalogo_tipoIntervencionN1Id' => trim($datosNivel[2]));
                
            }
            
            foreach($tipoDeIntervencion[3] as $nivelDeIntervencion){
                
                    $datosNivel = explode('¬', $nivelDeIntervencion);
                
                    $tiposDeIntervencionNiveles['tipoIntervencionN3Catalogo'][trim($datosNivel[0])] = array('tipoIntervencionN3Id' => trim($datosNivel[0]), 'descripcion' => trim($datosNivel[1]), 'tipoIntervencionN2Catalogo_tipoIntervencionN2Id' => trim($datosNivel[2]));
                
            }
            
            foreach($tipoDeIntervencion[4] as $nivelDeIntervencion){
                
                    $datosNivel = explode('¬', $nivelDeIntervencion);
                
                    $tiposDeIntervencionNiveles['tipoIntervencionN4Catalogo'][trim($datosNivel[0])] = array('tipoIntervencionN4Id' => trim($datosNivel[0]), 'descripcion' => trim($datosNivel[1]), 'tipoIntervencionN3Catalogo_tipoIntervencionN3Id' => trim($datosNivel[2]));
                
            }
            
     
        
            $this->agregar_catalogos_m->mAgregarCatalogos($tiposDeIntervencionNiveles);
        
            echo 'Catalogos de Tipo de intervencion insertados exitosamente<br />';
            
    }
    
    public function cAgregarCatalogosTipoPerpetrador(){
        
        for($n = 1; $n <= 5; $n++){
            
            $tipoDePerpetrador[$n] = explode('&', read_file('statics/catalogos/catalogotipodeperpetrador/TipodePerpetrador_nivel'.$n.'.csv'));
            
        }
        
        foreach($tipoDePerpetrador[1] as $nivelDePerpetrador){
                
                    $datosNivel = explode('¬', $nivelDePerpetrador);
                
                    $tiposDePerpetradorNiveles['tipoPerpetradorN1Catalogo'][trim($datosNivel[0])] = array('tipoPerpetradorN1Id' => trim($datosNivel[0]), 'descripcion' => trim($datosNivel[1]), 'notas' => trim($datosNivel[2]));
                
        }
        
        foreach($tipoDePerpetrador[2] as $nivelDePerpetrador){
                
                $datosNivel = explode('¬', $nivelDePerpetrador);
                
                $tiposDePerpetradorNiveles['tipoPerpetradorN2Catalogo'][trim($datosNivel[0])] = array('tipoPerpetradorN2Id' => trim($datosNivel[0]), 'descripcion' => trim($datosNivel[1]), 'notas' => trim($datosNivel[3]), 'tipoPerpetradorN1Catalogo_tipoPerpetradorN1Id' => trim($datosNivel[2]));
                
        }
        
        foreach($tipoDePerpetrador[3] as $nivelDePerpetrador){
                
                $datosNivel = explode('¬', $nivelDePerpetrador);
                
                $tiposDePerpetradorNiveles['tipoPerpetradorN3Catalogo'][trim($datosNivel[0])] = array('tipoPerpetradorN3Id' => trim($datosNivel[0]), 'descripcion' => trim($datosNivel[1]), 'notas' => trim($datosNivel[3]), 'tipoPerpetradorN2Catalogo_tipoPerpetradorN2Id' => trim($datosNivel[2]));
                
        }
        
        foreach($tipoDePerpetrador[4] as $nivelDePerpetrador){
                
                $datosNivel = explode('¬', $nivelDePerpetrador);
                
                $tiposDePerpetradorNiveles['tipoPerpetradorN4Catalogo'][trim($datosNivel[0])] = array('tipoPerpetradorN4Id' => trim($datosNivel[0]), 'descripcion' => trim($datosNivel[1]), 'notas' => trim($datosNivel[3]), 'tipoPerpetradorN3Catalogo_tipoPerpetradorN3Id' => trim($datosNivel[2]));
                
        }
        
        foreach($tipoDePerpetrador[5] as $nivelDePerpetrador){
                
                $datosNivel = explode('¬', $nivelDePerpetrador);
                
                $tiposDePerpetradorNiveles['tipoPerpetradorN5Catalogo'][trim($datosNivel[0])] = array('tipoPerpetradorN5Id' => trim($datosNivel[0]), 'descripcion' => trim($datosNivel[1]), 'notas' => trim($datosNivel[3]), 'tipoPerpetradorN4Catalogo_tipoPerpetradorN4Id' => trim($datosNivel[2]));
                
        }
        
        $this->agregar_catalogos_m->mAgregarCatalogos($tiposDePerpetradorNiveles);
        
        echo 'Catalogos de tipos de perpetrador insertados exitosamente.<br />';
        
    }
    
    public function cAgregarCatalogoGruposIndigenas(){
        
        $catalogoGruposIndigenas = explode('&', read_file('statics/catalogos/catalogosDeUnSoloNivel/catalogoDeGruposIndigenas.csv'));
        
        foreach($catalogoGruposIndigenas as $grupoIndigena){
                
            $datosGrupo = explode('¬', $grupoIndigena);
                
            $gruposIndigenas['gruposIndigenas'][trim($datosGrupo[0])] = array('grupoIndigenaId' => trim($datosGrupo[0]), 'paisId' => trim($datosGrupo[2]), 'descripcion' => trim($datosGrupo[1]), 'notas' => trim($datosGrupo[3]));

        }
        
        $this->agregar_catalogos_m->mAgregarCatalogos($gruposIndigenas);
        
        echo 'Catalogos de grupos indigenas insertados exitosamente.<br />';
        
    }
    
    public function cAgregarCatalogoDeNacionalidades(){
        
        $catalogoOcupaciones = explode('&', read_file('statics/catalogos/catalogosDeUnSoloNivel/nacionalidadesCatalogo.csv'));
        
        foreach($catalogoOcupaciones as $ocupacion){
            
            $datosOcupacion = explode('¬', $ocupacion);
            
            $ocupaciones['nacionalidadesCatalogo'][$datosOcupacion[0]] = array('nacionalidadId' => trim($datosOcupacion[0]), 'nombre' => trim($datosOcupacion[1]), 'generoNacionalidad' => trim($datosOcupacion[2]));
            
        }
        
        $this->agregar_catalogos_m->mAgregarCatalogos($ocupaciones);
        
        echo 'Catalogo de nacionalidades insertado exitosamente.<br />';
        
    }
    
    public function cAgregarCatalogoDeOcupaciones(){
        
        $catalogoOcupaciones = explode('&', read_file('statics/catalogos/catalogosDeUnSoloNivel/catalogoDeOcupacionesActoresIndividuales.csv'));
        
        foreach($catalogoOcupaciones as $ocupacion){
            
            $datosOcupacion = explode('¬', $ocupacion);
            
            $ocupaciones['ocupacionesCatalogo'][$datosOcupacion[0]] = array('ocupacionId' => trim($datosOcupacion[1]), 'descripcion' => trim($datosOcupacion[1]), 'notas' => trim($datosOcupacion[1]), 'tipoActorId' => 1);
            
        }
        
        $catalogoOcupaciones = explode('&', read_file('statics/catalogos/catalogosDeUnSoloNivel/catalogoDeOcupacionesActoresColectivos.csv'));
        
        foreach($catalogoOcupaciones as $ocupacion){
            
            $datosOcupacion = explode('¬', $ocupacion);
            
            $ocupaciones['ocupacionesCatalogo'][$datosOcupacion[0]] = array('ocupacionId' => trim($datosOcupacion[1]), 'descripcion' => trim($datosOcupacion[1]), 'notas' => trim($datosOcupacion[1]), 'tipoActorId' => 2);
            
        }
        
        $this->agregar_catalogos_m->mAgregarCatalogos($ocupaciones);
        
        echo 'Catalogo de ocupaciones insertados exitosamente.<br />';
        
    }
    
    public function cAgregarCatalogoEstatusDeLaVictima(){
        
        $catalogoEstatusDeLAVictima = explode('&', read_file('statics/catalogos/catalogosDeUnSoloNivel/catalogoEstatusDeLaVictima.csv'));
        
        foreach($catalogoEstatusDeLAVictima as $estatusDeLaVictima){
                
            $datosEstatusDeLaVictima = explode('¬', $estatusDeLaVictima);
                
            $estatus['estatusVictimaCatalogo'][trim($datosEstatusDeLaVictima[0])] = array('estatusVictimaId' => trim($datosEstatusDeLaVictima[0]), 'descripcion' => trim($datosEstatusDeLaVictima[1]), 'notas' => trim($datosEstatusDeLaVictima[2]));

        }
        
        $this->agregar_catalogos_m->mAgregarCatalogos($estatus);
        
        echo 'Catalogo de estatus de victimas insertado exitosamente.<br />';
        
    }
    
        public function cAgregarCatalogoEstatusDelPerpetrador(){
        
        $catalogoEstatusDelPerpetrador = explode('&', read_file('statics/catalogos/catalogosDeUnSoloNivel/catalogoEstatusDelPerpetrador.csv'));
        
        foreach($catalogoEstatusDelPerpetrador as $estatusDelPerpetrador){
                
            $datosEstatusDelPerpetrador = explode('¬', $estatusDelPerpetrador);
                
            $estatus['estatusPerpetradorCatalogo'][trim($datosEstatusDelPerpetrador[0])] = array('estatusPerpetradorId' => trim($datosEstatusDelPerpetrador[0]), 'descripcion' => trim($datosEstatusDelPerpetrador[1]), 'notas' => trim($datosEstatusDelPerpetrador[2]));

        }
        
        $this->agregar_catalogos_m->mAgregarCatalogos($estatus);
        
        echo 'Catalogo de estatus de perpetradores insertado exitosamente.<br />';
        
    }
    
    public function cAgregarCatalogoNivelDeConfiabilidad(){
        
        $catalogo = explode('&', read_file('statics/catalogos/catalogosDeUnSoloNivel/catalogoNivelDeConfiabilidad.csv'));
        
        foreach($catalogo as $filaCatalogo){
                
            $datos = explode('¬', $filaCatalogo);
                
            $filas['nivelConfiabilidadCatalogo'][trim($datos[0])] = array('nivelConfiabilidadId' => trim($datos[0]), 'descripcion' => trim($datos[1]), 'notas' => trim($datos[2]));

        }
        
        $this->agregar_catalogos_m->mAgregarCatalogos($filas);
        
        echo 'Catalogo de niveles de confiabilidad de las funetes insertados exitosamente.<br />';
        
    }

    
    public function cAgregarCatalogoTipoDeFuente(){
        
        $catalogo = explode('&', read_file('statics/catalogos/catalogosDeUnSoloNivel/catalogoTipoDeFuente.csv'));
        
        foreach($catalogo as $filaCatalogo){
                
            $datos = explode('¬', $filaCatalogo);
                
            $filas['tipoFuenteCatalogo'][trim($datos[0])] = array('tipoFuenteId' => trim($datos[0]), 'descripcion' => trim($datos[1]), 'notas' => trim($datos[2]) ,'selectorTipoFuente' => 1);

        }
        
        $this->agregar_catalogos_m->mAgregarCatalogos($filas);
        
        echo 'Catalogo de niveles de confiabilidad de las funetes insertados exitosamente.<br />';
        
    }
    
    public function cAgregarCatalogoTipoDeActorColectivo(){
        
        $catalogo = explode('&', read_file('statics/catalogos/catalogosDeUnSoloNivel/tipoDeActorColectivo.csv'));
        
        foreach($catalogo as $filaCatalogo){
                
            $datos = explode('¬', $filaCatalogo);
                
            $filas['tipoActorColectivo'][trim($datos[0])] = array('tipoActorColectivoId' => trim($datos[0]), 'descripcion' => trim($datos[1]), 'notas' => trim($datos[2]));

        }
        
        $this->agregar_catalogos_m->mAgregarCatalogos($filas);
        
        echo 'Catalogo de actores colectivos insertados exitosamente.<br />';
        
    }
    
    public function cAgregarCatalogoRelacionEntreActores(){
        
        $catalogo = explode('&', read_file('statics/catalogos/catalogosDeUnSoloNivel/relacionEntreActores.csv'));
        
        foreach($catalogo as $filaCatalogo){
                
            $datos = explode('¬', $filaCatalogo);
                
            $filas['relacionActoresCatalogo'][trim($datos[0])] = array('tipoRelacionId' => trim($datos[0]), 'nombre' => trim($datos[1]), 'notas' => trim($datos[2]), 'nivel2' => trim($datos[3]), 'tipoDeRelacionId' => trim($datos[4]));

        }
        
        $this->agregar_catalogos_m->mAgregarCatalogos($filas);
        
        echo 'Catalogo de relación entre actores insertados exitosamente.<br />';
        
    }
    
    /*
     * Funcion sin terminar.
     */
    
    public function agregar_general($config){
        
        $archiv = read_file($config['archivo']);
        
        $filas = explode('&', $archivo);
        
        foreach($filas as $fila){
            
            $datos_fila = explode('¬', $fila);
                
            $config[];

        }
        
    }
    
    
    
}

/* End of file principal.php */
/* Location: ./application/controllers/principal.php */
