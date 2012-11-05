<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ReportePdf_c extends CI_Controller
{

	public function __construct(){
           
          parent::__construct();
          
            $this->load->helper(array('html', 'url'));
        	$this->load->model(array('actores_m', 'general_m','reportes_m', 'catalogos_m'));
			$this->load->library('cezpdf');
       }
	
	
	function index() 
	{	
		$this->headers();
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
        
        $datos['actosCatalogo'] = $this->catalogos_m->mTraerDatosCatalogoActos();

        $datos['tipoPerpetrador'] = $this->catalogos_m->mTraerDatosCatalogoTipoPerpetrador();

        $datos['derechosAfectadosCatalogo'] = $this->catalogos_m->mTraerDatosCatalogoDerechosAfectados();

        $datos['nivelConfiabilidadCatalogo'] = $this->catalogos_m->mTraerDatosCatalogoNombre('nivelConfiabilidadCatalogo');

        $datos['gradoDeInvolucramiento'] = $this->catalogos_m->mTraerDatosCatalogoGradoInvolucramiento();

        $datos['estatusPerpetradorCatalogo'] = $this->catalogos_m->mTraerDatosCatalogoNombre('estatusPerpetradorCatalogo');

        $datos['estatusVictimaCatalogo'] = $this->catalogos_m->mTraerDatosCatalogoNombre('estatusVictimaCatalogo');

        $datos['ListaTodosActores'] = $this->actores_m-> mListaTodosActores();

        return $datos;
        
    }

	function generaReporteLargo($casoId)
	{

		$datos['catalogos'] = $this->traer_catalogos();
		$Data['reporte']= $this->reportes_m->mReporteLargo($casoId);
		$Data['nombreCaso']=$Data['reporte']['casos']['nombre'];

		$this->cezpdf->ezText($Data['nombreCaso'] , 15, array('justification' => 'center'));
		$this->cezpdf->ezSetDy(-10);

/**************Información general***********************/
		$contenidoReporte['EncabezadosInfoGeneral']="Información general" . "\n\n";
		$contenidoReporte['NombreCaso']="Nombre del caso:" ." " . $Data['reporte']['casos']['nombre'] . "\n";
		$contenidoReporte['PersonasAfectadas']="Personas afectadas:" ." " . $Data['reporte']['casos']['personasAfectadas'] . "\n";
		$contenidoReporte['fechaInicio']="Fecha de inicio:" ." " . $Data['reporte']['casos']['fechaInicial'] . "\n";
/******************************************/	

/**************Lugares***********************/
	$contenidoReporte['encabezadoLugares']="\nLugares\n\n";

	if (isset($Data['reporte']['lugares']	)) {
		foreach ($Data['reporte']['lugares'] as $key => $value) {
			
			$contenidoReporte['numeroLugar'.$key]=" Lugar " . $key . ":  ";
			$contenidoReporte['pais'.$key]=$datos['catalogos']['paisesCatalogo'][$value['paisesCatalogo_paisId']]['nombre'] . ", ";
			$contenidoReporte['estado'.$key]=$datos['catalogos']['estadosCatalogo'][$value['estadosCatalogo_estadoId']]['nombre'] . ", ";
			$contenidoReporte['municipio'.$key]=$datos['catalogos']['municipiosCatalogo'][$value['municipiosCatalogo_municipioId']]['nombre'] . "\n";
		}
	}
/******************************************/	

/**************Descripción***********************/
		$contenidoReporte['encabezadoDescripcion']="\nDescripción" . "\n\n";
		$contenidoReporte['descripcion']= $Data['reporte']['infoCaso']['descripcion']. "\n";
/******************************************/

/**************Resumen***********************/
		$contenidoReporte['encabezadoResumen']="\nResumen" . "\n\n";
		$contenidoReporte['resumen']= $Data['reporte']['infoCaso']['resumen']. "\n";
/******************************************/

/**************Observaciones***********************/
		$contenidoReporte['encabezadoObservaciones']="\nObservaciones" . "\n\n";
		$contenidoReporte['observacion']= $Data['reporte']['infoCaso']['observaciones']. "\n";
/******************************************/

/**************Seguimiento del caso***********************/
		$contenidoReporte['encabezadoSeguimientoCaso']="\nSeguimiento del caso" . "\n\n";
		
		if (isset($Data['reporte']['fichas']	)) {
			foreach ($Data['reporte']['fichas'] as $key => $value) {
				$contenidoReporte['claveId'.$key]= "Clave:  ".$value['fichaId']. "\n";
				$contenidoReporte['titulo'.$key]= "Título:  ".$value['titulo']. "\n";
				$contenidoReporte['fecha'.$key]= "Fecha:  ".$value['fecha']. "\n";
				$contenidoReporte['fichaComentario'.$key]= "Comentarios:  ".$value['comentarios']. "\n";
			}
		}
/******************************************/

/**************Nucleo del caso***********************/
		$contenidoReporte['encabezadoNucleoCaso']="\nNucléo del caso "."\n\n";
		$contenidoReporte['fechaInicio']="Fecha de incio: " . $Data['reporte']['nucleoCaso']['fechaInicio']."\n";
		$contenidoReporte['fechaTermino']="Fecha de término: " . $Data['reporte']['nucleoCaso']['fechaTermino']."\n";
		$contenidoReporte['noPersonasAfectadas']="Personas afectadas: " . $Data['reporte']['nucleoCaso']['noPersonasAfectadas']."\n";
		$contenidoReporte['municipiosCatalogo_municipioId']="Municipio: " . $datos['catalogos']['municipiosCatalogo'][$Data['reporte']['nucleoCaso']['municipiosCatalogo_municipioId']]["nombre"]."\n";
		$contenidoReporte['estadosCatalogo_estadoId']="Estado: " . $datos['catalogos']['estadosCatalogo'][$Data['reporte']['nucleoCaso']['estadosCatalogo_estadoId']]['nombre']."\n";
		$contenidoReporte['paisesCatalogo_paisId']="País: " . $datos['catalogos']['paisesCatalogo'][$Data['reporte']['nucleoCaso']['paisesCatalogo_paisId']]['nombre']."\n";
/******************************************/

/**************Derechos afectados y actos***********************/
		
		if (isset($Data['reporte']['derechoAfectado']	)) {
			foreach ($Data['reporte']['derechoAfectado'] as $key => $value) {
				
				$contenidoReporte['encabezadoDErechosAfectados'.$key]="\nDerechos afectads y actos "."\n\n";
				$contenidoReporte['derechoAfectado'.$key]="Derecho afectado:  ".$datos['catalogos']['derechosAfectadosCatalogo']['derechosAfectadosN'.$value['derechoAfectadoNivel'].'Catalogos'][$value['derechoAfectadoCasoId']]['descripcion'] ."\n";
				$contenidoReporte['acto'.$key]="Acto:  ". $datos['catalogos']['actosCatalogo']['actosN'.$Data['reporte']['actos'][$key]['actoViolatorioNivel'].'Catalogo'][$Data['reporte']['actos'][$key]['actoViolatorioId']]['descripcion'] ."\n";
				$contenidoReporte['fechaInicial'.$key]="Fecha de inicio:  ". $value['fechaInicial']."\n";
				$contenidoReporte['fechaTermino'.$key]="Fecha de termino:  " . $value['fechaTermino']."\n";

				if (isset($Data['reporte']['victimas']	)) {
					foreach ($Data['reporte']['victimas'] as $key => $value2) {
						if ($value2['actos_actoId']==$value['actos_actoId']) {
							$contenidoReporte['EncabezadoVictimas'.$key]="\nVictimas:  ". "\n";
							$contenidoReporte['victimasComentarios'.$key]="Comentarios sobre victimas y perpetradores:  \n". $value2['comentarios'] ."\n";
							$contenidoReporte['estatusVictimaId'.$key]="Estado:  ". $datos['catalogos']['estatusVictimaCatalogo']['estatusVictimaCatalogo'][$value2['estatusVictimaId']]['descripcion']."\n";
						}
					}
				}

				if (isset($Data['reporte']['perpetradores']	)) {
					foreach ($Data['reporte']['perpetradores'] as $key => $value3) {
						if ($value3['victimas_victimaId']==$value2['victimaId']) {
							$contenidoReporte['EncabezadoPerpetradores'.$key]="\nPerpetradores  "."\n";
							$contenidoReporte['perpetradorId'.$key]="Perpetrador".$key.":  ". $datos['catalogos']['ListaTodosActores'][$value3['perpetradorId']]['nombre'] ." ". $datos['catalogos']['ListaTodosActores'][$value3['perpetradorId']]['apellidosSiglas'] ."\n";
							$value3['tipoPerpetradorNivel']=1;//lo puse porque el campo estaba en blanco
							$contenidoReporte['tipoPerpetradorId'.$key]="Tipo de perpetrador:  ".$datos['catalogos']['tipoPerpetrador']['tipoPerpetradorN'.$value3['tipoPerpetradorNivel'].'Catalogo'][$value3['tipoPerpetradorId']]['descripcion']. "\n";
							$contenidoReporte['estatusPerpetradorId'.$key]="Estado del perpetrador:  ". $datos['catalogos']['estatusPerpetradorCatalogo']['estatusPerpetradorCatalogo'][$value3['estatusPerpetradorCatalogo_estatusPerpetradorId']]['descripcion']."\n";
							$contenidoReporte['gradoInvolucramientoid'.$key]="Grado de involucramiento:  ". $datos['catalogos']['gradoDeInvolucramiento']['gradoInvolucramientoN'.$value3['nivelInvolugramientoId'].'Catalogo'][$value3['gradoInvolucramientoid']]['descripcion']."\n";
							$contenidoReporte['afiliacionPerpetrador'.$key]="Tipo de afiliación:  ".$datos['catalogos']['relacionActoresCatalogo'][$value3['nivelInvolugramientoId']]['nombre']."\n";
						}
					}
				}

			}
		}
/******************************************/		

/**************Intervenciones***********************/
		$contenidoReporte['encabezadoIntervenciones']="\nIntervenciones "."\n\n";

		if (isset($Data['reporte']['intervenciones'])) {
			foreach ($Data['reporte']['intervenciones'] as $key => $intervencion) {
				$contenidoReporte['intervencionFecha']=	"Fecha de intervención:  ". $intervencion['fecha']."\n";
				$contenidoReporte['intervencionReceptor']=	"Receptor:  ". $datos['catalogos']['ListaTodosActores'][$intervencion['receptorId']]['nombre'] ." ". $datos['catalogos']['ListaTodosActores'][$intervencion['receptorId']]['apellidosSiglas'] ."\n";
				if ( ($datos['catalogos']['ListaTodosActores'][$intervencion['interventorId']]['tipoActorId']) == 3) {
					$contenidoReporte['intervencionInstitucion']=	"Institución:  ". $datos['catalogos']['ListaTodosActores'][$intervencion['interventorId']]['nombre'] ." ". $datos['catalogos']['ListaTodosActores'][$intervencion['interventorId']]['apellidosSiglas'] ."\n";
				}
				else{				
					$contenidoReporte['intervencionInterventor']=	"Interventor:  ".$datos['catalogos']['ListaTodosActores'][$intervencion['interventorId']]['nombre'] ." ". $datos['catalogos']['ListaTodosActores'][$intervencion['interventorId']]['apellidosSiglas'] ."\n";
				}
				$contenidoReporte['intervencionafiliacion']=	"Tipo de afiliación:  ".$datos['catalogos']['relacionActoresCatalogo'][$intervencion['receptorId']]['nombre']."\n";
				$contenidoReporte['intervencionImpacto']=	"Impacto:  ". $intervencion['impacto']."\n";
				$contenidoReporte['intervencionRespuesta']=	"Respuesta:  ". $intervencion['respuesta']."\n";
			}
		}	

/******************************************/

/**************Informcion Adicional***********************/

		$contenidoReporte['encabezadoInfoAdcional']="\nInformacion adicional "."\n\n";

		$contenidoReporte['encabezadoFuenteDocumental']="\n Fuentes documentales  \n\n";
		if (isset($Data['reporte']['tipoFuenteDocumental'])) {
			foreach ($Data['reporte']['tipoFuenteDocumental'] as $key => $documental) {
					$contenidoReporte['fuenteDocNombre'.$key]="\nNombre:  ".$documental['nombre']. "\n";
					$contenidoReporte['fuenteDocfechaPublicacion'.$key]="Fecha de publicación:  ".$documental['fecha']. "\n";
					$contenidoReporte['fuenteDocfechaAcceso'.$key]="Fecha de acceso:  ".$documental['fechaAcceso']. "\n";
					$contenidoReporte['fuenteDocinfoAdiocional'.$key]="Informción adicional:  ".$documental['infoAdiocional']. "\n";
					$contenidoReporte['fuenteDocNivelConfiabilidad'.$key]="Nivel de confiabilidad:  ". $datos['catalogos']['nivelConfiabilidadCatalogo']['nivelConfiabilidadCatalogo'][$documental['nivelConfiabilidadCatalogo_nivelConfiabilidadId']]['descripcion']. "\n";
					$contenidoReporte['fuenteDocobservaciones'.$key]="Informción adicional:  ".$documental['observaciones']. "\n";
			}
		}

		$contenidoReporte['encabezadoFuentePersonal']="\n Fuentes de información personal  \n\n";

		if (isset($Data['reporte']['fuenteInfoPersonal'])) {
			foreach ($Data['reporte']['fuenteInfoPersonal'] as $key => $infoAdicional) {
				$contenidoReporte['infoAdicionalPersonal'.$key]="Nombre:  ".$datos['catalogos']['ListaTodosActores'][$infoAdicional['actorId']]['nombre']." ".$datos['catalogos']['ListaTodosActores'][$infoAdicional['actorId']]['apellidosSiglas']."\n";
				$contenidoReporte['infoAdicionalfehca'.$key]="Fecha:  ".$infoAdicional['fecha']."\n";

			}
		}

/******************************************/

		foreach ($contenidoReporte as  $value) {
		
		$content = $content . $value;

		}

		$this->cezpdf->ezText($content, 10);

		$this->cezpdf->ezStream();
	}



}

?>