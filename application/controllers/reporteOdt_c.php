<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ReporteOdt_c extends CI_Controller
{

	public function __construct(){
           
          parent::__construct();
          
            $this->load->helper(array('html', 'url'));
        	$this->load->model(array('actores_m', 'general_m','reportes_m', 'catalogos_m','casos_m'));
			//$this->load->library('word');
       }
	
	
	function index() 
	{
		$casoId = 1;
		$this->generaReporteLargoOdt($casoId);
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
	function generaReporteLargoOdt($casoId)
	{
		echo "aca";
		$datos['catalogos'] = $this->traer_catalogos();
		$Data['reporte']= $this->reportes_m->mReporteLargo($casoId);
		$Data['nombreCaso']=$Data['reporte']['casos']['nombre'];
		
		print_r($Data['reporte']);
		
		$section = $this->word->createSection(array('orientation'=>'landscape'));

		/**************Información general***********************/
		$contenidoReporte['NombreCaso']="Nombre del caso:" ." " . $Data['reporte']['casos']['nombre'];
		$contenidoReporte['PersonasAfectadas']="Personas afectadas:" ." " . $Data['reporte']['casos']['personasAfectadas'] ;
		$contenidoReporte['fechaInicio']="Fecha de inicio:" ." " . $Data['reporte']['casos']['fechaInicial'];
		/******************************************/	
		
		/**************Lugares***********************/
		if (isset($Data['reporte']['lugares']	)) {
			foreach ($Data['reporte']['lugares'] as $key => $value) {
				
				$contenidoLugares['numeroLugar'.$key]=" Lugar " . $key . ":  ";
				$contenidoLugares['pais'.$key]=$datos['catalogos']['paisesCatalogo'][$value['paisesCatalogo_paisId']]['nombre'] . ", ";
				$contenidoLugares['estado'.$key]=$datos['catalogos']['estadosCatalogo'][$value['estadosCatalogo_estadoId']]['nombre'] . ", ";
				$contenidoLugares['municipio'.$key]=$datos['catalogos']['municipiosCatalogo'][$value['municipiosCatalogo_municipioId']]['nombre'];
			}
		}
		
		$lugares="";
		foreach ($contenidoLugares as $key => $value) {
			$lugares=$lugares." ".$value;
		}
		/******************************************/
		/**************Descripción***********************/
		$contenidoReporte['descripcion']= $Data['reporte']['infoCaso']['descripcion'];
		/******************************************/
		
		/**************Resumen***********************/
		$contenidoReporte['resumen']= $Data['reporte']['infoCaso']['resumen']. "\n";
		/******************************************/
		
		/**************Observaciones***********************/
		$contenidoReporte['observacion']= $Data['reporte']['infoCaso']['observaciones']. "\n";
		/******************************************/
		
		/**************Seguimiento del caso***********************/
		if (isset($Data['reporte']['fichas']	)) {
			foreach ($Data['reporte']['fichas'] as $key => $value) {
				$contenidoSeguimientoCaso['claveId'.$key]= "Clave:  ".$value['fichaId']. "\n";
				$contenidoSeguimientoCaso['titulo'.$key]= "Título:  ".$value['titulo']. "\n";
				$contenidoSeguimientoCaso['fecha'.$key]= "Fecha:  ".$value['fecha']. "\n";
				$contenidoSeguimientoCaso['fichaComentario'.$key]= "Comentarios:  ".$value['comentarios']. "\n";
			}
		}
		/******************************************/
		
		/**************Nucleo del caso***********************/
		$contenidoNucleoCaso['fechaInicio']="Fecha de incio: " . $Data['reporte']['nucleoCaso']['fechaInicio']."\n";
		$contenidoNucleoCaso['fechaTermino']="Fecha de termino: " . $Data['reporte']['nucleoCaso']['fechaTermino']."\n";
		$contenidoNucleoCaso['noPersonasAfectadas']="Personas afectadas: " . $Data['reporte']['nucleoCaso']['noPersonasAfectadas']."\n";
		$contenidoNucleoCaso['municipiosCatalogo_municipioId']="Municipio: " . $datos['catalogos']['municipiosCatalogo'][$Data['reporte']['nucleoCaso']['municipiosCatalogo_municipioId']]["nombre"]."\n";
		$contenidoNucleoCaso['estadosCatalogo_estadoId']="Estado: " . $datos['catalogos']['estadosCatalogo'][$Data['reporte']['nucleoCaso']['estadosCatalogo_estadoId']]['nombre']."\n";
		$contenidoNucleoCaso['paisesCatalogo_paisId']="País: " . $datos['catalogos']['paisesCatalogo'][$Data['reporte']['nucleoCaso']['paisesCatalogo_paisId']]['nombre']."\n";
		/******************************************/
		
		/**************Derechos afectados y actos***********************/
		
		if (isset($Data['reporte']['derechoAfectado']	)) {
			foreach ($Data['reporte']['derechoAfectado'] as $key => $value) {
				
				$contenidoDerechoAfectadoe['derechoAfectado'.$key]="Derecho afectado:  ".$datos['catalogos']['derechosAfectadosCatalogo']['derechosAfectadosN'.$value['derechoAfectadoNivel'].'Catalogos'][$value['derechoAfectadoCasoId']]['descripcion'] ."\n";
				$contenidoDerechoAfectado['acto'.$key]="Acto:  ". $datos['catalogos']['actosCatalogo']['actosN'.$Data['reporte']['actos'][$key]['actoViolatorioNivel'].'Catalogo'][$Data['reporte']['actos'][$key]['actoViolatorioId']]['descripcion'] ."\n";
				$contenidoDerechoAfectado['fechaInicial'.$key]="Fecha de inicio:  ". $value['fechaInicial']."\n";
				$contenidoDerechoAfectado['fechaTermino'.$key]="Fecha de termino:  " . $value['fechaTermino']."\n";

				if (isset($Data['reporte']['victimas']	)) {
					foreach ($Data['reporte']['victimas'] as $key => $value2) {
						if ($value2['actos_actoId']==$value['actos_actoId']) {
							$contenidoDerechoAfectado['EncabezadoVictimas'.$key]="\nVictimas:  ". "\n";
							$contenidoDerechoAfectado['victimasComentarios'.$key]="Comentarios sobre victimas y perpetradores:  \n". $value2['comentarios'] ."\n";
							$contenidoDerechoAfectado['estatusVictimaId'.$key]="Estado:  ". $datos['catalogos']['estatusVictimaCatalogo']['estatusVictimaCatalogo'][$value2['estatusVictimaId']]['descripcion']."\n";
						}
					}
				}

				if (isset($Data['reporte']['perpetradores']	)) {
					foreach ($Data['reporte']['perpetradores'] as $key => $value3) {
						if ($value3['victimas_victimaId']==$value2['victimaId']) {
							$contenidoDerechoAfectado['EncabezadoPerpetradores'.$key]="\nPerpetradores  "."\n";
							$contenidoDerechoAfectado['perpetradorId'.$key]="Perpetrador".$key.":  ". $datos['catalogos']['ListaTodosActores'][$value3['perpetradorId']]['nombre'] ." ". $datos['catalogos']['ListaTodosActores'][$value3['perpetradorId']]['apellidosSiglas'] ."\n";
							$value3['tipoPerpetradorNivel']=1;//lo puse porque el campo estaba en blanco
							$contenidoDerechoAfectado['tipoPerpetradorId'.$key]="Tipo de perpetrador:  ".$datos['catalogos']['tipoPerpetrador']['tipoPerpetradorN'.$value3['tipoPerpetradorNivel'].'Catalogo'][$value3['tipoPerpetradorId']]['descripcion']. "\n";
							$contenidoDerechoAfectado['estatusPerpetradorId'.$key]="Estado del perpetrador:  ". $datos['catalogos']['estatusPerpetradorCatalogo']['estatusPerpetradorCatalogo'][$value3['estatusPerpetradorCatalogo_estatusPerpetradorId']]['descripcion']."\n";
							$contenidoDerechoAfectado['gradoInvolucramientoid'.$key]="Grado de involucramiento:  ". $datos['catalogos']['gradoDeInvolucramiento']['gradoInvolucramientoN'.$value3['nivelInvolugramientoId'].'Catalogo'][$value3['gradoInvolucramientoid']]['descripcion']."\n";
							$contenidoDerechoAfectado['InstitucionPerpetrador'.$key]="Institución:  ". $value3['gradoInvolucramientoid']."\n";
							$contenidoDerechoAfectado['afiliacionPerpetrador'.$key]="Tipo de afiliación:  ".$datos['catalogos']['relacionActoresCatalogo'][$value3['nivelInvolugramientoId']]['nombre']."\n";
						}
					}
				}

			}
		}
		/******************************************/	
		
		/**************Intervenciones***********************/
		if (isset($Data['reporte']['intervenciones'])) {
			foreach ($Data['reporte']['intervenciones'] as $key => $intervencion) {
				$contenidoIntervenciones['intervencionFecha']=	"Fecha de intervención:  ". $intervencion['fecha']."\n";
				$contenidoIntervenciones['intervencionReceptor']=	"Receptor:  ". $datos['catalogos']['ListaTodosActores'][$intervencion['receptorId']]['nombre'] ." ". $datos['catalogos']['ListaTodosActores'][$intervencion['receptorId']]['apellidosSiglas'] ."\n";
				if ( ($datos['catalogos']['ListaTodosActores'][$intervencion['interventorId']]['tipoActorId']) == 3) {
					$contenidoIntervenciones['intervencionInstitucion']=	"Institución:  ". $datos['catalogos']['ListaTodosActores'][$intervencion['interventorId']]['nombre'] ." ". $datos['catalogos']['ListaTodosActores'][$intervencion['interventorId']]['apellidosSiglas'] ."\n";
				}
				else{				
					$contenidoIntervenciones['intervencionInterventor']=	"Interventor:  ".$datos['catalogos']['ListaTodosActores'][$intervencion['interventorId']]['nombre'] ." ". $datos['catalogos']['ListaTodosActores'][$intervencion['interventorId']]['apellidosSiglas'] ."\n";
				}
				$contenidoIntervenciones['intervencionafiliacion']=	"Tipo de afiliación:  ".$datos['catalogos']['relacionActoresCatalogo'][$intervencion['receptorId']]['nombre']."\n";
				$contenidoIntervenciones['intervencionImpacto']=	"Impacto:  ". $intervencion['receptorId']."\n";
				$contenidoIntervenciones['intervencionRespuesta']=	"Respuesta:  ". $intervencion['respuesta']."\n";
			}
		}	

		/******************************************/
		
		/**************Informcion Adicional***********************/

		if (isset($Data['reporte']['tipoFuenteDocumental'])) {
			foreach ($Data['reporte']['tipoFuenteDocumental'] as $key => $documental) {
					$contenidoFuenteDocumental['fuenteDocNombre'.$key]="\nNombre:  ".$documental['nombre']. "\n";
					$contenidoFuenteDocumental['fuenteDocfechaPublicacion'.$key]="Fecha de publicación:  ".$documental['fecha']. "\n";
					$contenidoFuenteDocumental['fuenteDocfechaAcceso'.$key]="Fecha de acceso:  ".$documental['fechaAcceso']. "\n";
					$contenidoFuenteDocumental['fuenteDocinfoAdiocional'.$key]="Informción adicional:  ".$documental['infoAdiocional']. "\n";
					$contenidoFuenteDocumental['fuenteDocNivelConfiabilidad'.$key]="Nivel de confiabilidad:  ". $datos['catalogos']['nivelConfiabilidadCatalogo']['nivelConfiabilidadCatalogo'][$documental['nivelConfiabilidadCatalogo_nivelConfiabilidadId']]['descripcion']. "\n";
					$contenidoFuenteDocumental['fuenteDocobservaciones'.$key]="Observaciones:  ".$documental['observaciones']. "\n";
			}
		}

		if (isset($Data['reporte']['fuenteInfoPersonal'])) {
			foreach ($Data['reporte']['fuenteInfoPersonal'] as $key => $infoAdicional) {
				$contenidoFuentePersonal['infoAdicionalPersonal'.$key]="Nombre:  ".$infoAdicional['actorId']."\n";
				$contenidoFuentePersonal['infoAdicionalfehca'.$key]="Fecha:  ".$infoAdicional['fecha']."\n";

			}
		}

		/******************************************/
		
		// Add text elements
		$this->word->addFontStyle('Style', array('bold'=>true, 'size'=>13,));
		$this->word->addFontStyle('estilo', array('size'=>11));
		$this->word->addParagraphStyle('tituloStyle', array('align'=>'center'));
		$section->addText($Data['nombreCaso'], 'Style', 'tituloStyle');
		$section->addText('Información general', 'Style');
		$section->addText(' ', 'Style');
			$section->addText($contenidoReporte['NombreCaso'],'estilo');
			$section->addText($contenidoReporte['PersonasAfectadas'],'estilo');
			$section->addText($contenidoReporte['fechaInicio'],'estilo');
		$section->addText(' ', 'Style');
		$section->addText('Lugares', 'Style');
		$section->addText(' ', 'Style');
			$section->addText($lugares,'estilo');
		$section->addText(' ', 'Style');
		$section->addText('Descripción', 'Style');
		$section->addText(' ', 'Style');
			$section->addText($contenidoReporte['descripcion'],'estilo');
		$section->addText(' ', 'Style');
		$section->addText('Resumen', 'Style');
		$section->addText(' ', 'Style');
			$section->addText($contenidoReporte['resumen'],'estilo');
		$section->addText(' ', 'Style');
		$section->addText('Observaciones', 'Style');
		$section->addText(' ', 'Style');
			$section->addText($contenidoReporte['observacion'],'estilo');
		$section->addText(' ', 'Style');
		$section->addText('Seguimiento del caso', 'Style');
		$section->addText(' ', 'Style');
		foreach ($contenidoSeguimientoCaso as $key => $value) {
			$seguimientoCaso[$key]=$value;
			$section->addText($seguimientoCaso[$key],'estilo');
		}
		$section->addText(' ', 'Style');
		$section->addText('Nuclo del caso', 'Style');
		$section->addText(' ', 'Style');
		foreach ($contenidoNucleoCaso as $key => $value) {
			$nucleoCaso[$key]=$value;
			$section->addText($nucleoCaso[$key],'estilo');
		}
		$section->addText(' ', 'Style');
		$section->addText('Derechos afectados y actos', 'Style');
		$section->addText(' ', 'Style');
		foreach ($contenidoDerechoAfectado as $key => $value) {
			$derechoAfectado[$key]=$value;
			$section->addText($derechoAfectado[$key],'estilo');
		}
		$section->addText(' ', 'Style');
		$section->addText('Intervenciones', 'Style');
		$section->addText(' ', 'Style');
		foreach ($contenidoIntervenciones as $key => $value) {
			$intervenciones[$key]=$value;
			$section->addText($intervenciones[$key],'estilo');
		}

		$section->addText(' ', 'Style');
		$section->addText('Información adicional', 'Style');

		$section->addText(' ', 'Style');
		$section->addText('Fuente documental', 'Style');
		$section->addText(' ', 'Style');
		foreach ($contenidoFuenteDocumental as $key => $value) {
			$fuenteDocumental[$key]=$value;
			$section->addText($fuenteDocumental[$key],'estilo');
		}
		
		$section->addText(' ', 'Style');
		$section->addText('Fuente de información personal', 'Style');
		$section->addText(' ', 'Style');
		foreach ($contenidoFuentePersonal as $key => $value) {
			$fuentePersonal[$key]=$value;
			$section->addText($fuentePersonal[$key],'estilo');
		}
			
		/*$filename='reporte_largo_del_'.$Data['nombreCaso'].'.odt'; //save our document as this file name
		header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document'); //mime type
		header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
		header('Cache-Control: max-age=0'); //no cache
		 
		$objWriter = PHPWord_IOFactory::createWriter($this->word, 'ODText');
		$objWriter->save('php://output');*/
	}
	
}

?>