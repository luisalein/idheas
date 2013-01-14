<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class ReportePdf_c extends CI_Controller
{

	public function __construct(){
           
          parent::__construct();
          
            $this->load->helper(array('html', 'url'));
			$this->load->library('session');
        
			$this->is_logged_in();
        	$this->load->model(array('actores_m', 'general_m','reportes_m', 'catalogos_m'));
			$this->load->library('cezpdf');
       }
	
	
	function index() 
	{	
		$this->headers();
	}
    
	private function is_logged_in(){
		$logged_in = $this->session->userdata('logged_in');
		if(!isset($logged_in) or $logged_in != TRUE){
			redirect(base_url());
		}
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
		
		$datos['tipoFuenteCatalogo'] = $this->catalogos_m->mTraerDatosCatalogoNombre('tipoFuenteCatalogo');
		
		$datos['relacionCasosCatalogo'] = $this->catalogos_m->mTraerDatosCatalogoNombre('relacionCasosCatalogo');

        $datos['ListaTodosActores'] = $this->actores_m-> mListaTodosActores();

        return $datos;
        
    }

	function generaReporteLargo($casoId)
	{

		$datos['catalogos'] = $this->traer_catalogos();
		// echo "<pre>";
		// print_r($datos['catalogos']['nivelConfiabilidadCatalogo']);
		$Data['reporte']= $this->reportes_m->mReporteLargo($casoId);
		$Data['nombreCaso']=$Data['reporte']['casos']['nombre'];
		
		$this->cezpdf->ezText($Data['nombreCaso'] , 15, array('justification' => 'center'));
		$this->cezpdf->ezSetDy(-10);
		/**************Información general***********************/
		$contenidoReporte['EncabezadosInfoGeneral']="Información general" . "\n\n";
		$contenidoReporte['NombreCaso']='Nombre del caso:' ." " . $Data['reporte']['casos']['nombre'] . "\n";
		$contenidoReporte['PersonasAfectadas']="Personas afectadas:" ." " . $Data['reporte']['casos']['personasAfectadas'] . "\n";
		$contenidoReporte['fechaInicio']="Fecha de inicio:" ." " . $Data['reporte']['casos']['fechaInicial'] . "\n";
		$contenidoReporte['fechaTermino']="Fecha de término:" ." " . $Data['reporte']['casos']['fechaTermino'] . "\n";
/******************************************/	

/**************Lugares***********************/
	$contenidoReporte['encabezadoLugares']="\nLugares\n\n";

	if (isset($Data['reporte']['lugares']	)) {
		foreach ($Data['reporte']['lugares'] as $key => $value) {
			
			$contenidoReporte['numeroLugar'.$key]=" Lugar:";
			$contenidoReporte['pais'.$key]=$datos['catalogos']['paisesCatalogo'][$value['paisesCatalogo_paisId']]['nombre'] . ", ";
			$contenidoReporte['estado'.$key]=$datos['catalogos']['estadosCatalogo'][$value['estadosCatalogo_estadoId']]['nombre'] . ", ";
			$contenidoReporte['municipio'.$key]=$datos['catalogos']['municipiosCatalogo'][$value['municipiosCatalogo_municipioId']]['nombre'] . "\n";
		}
	}
/******************************************/	
		$contenidoReporte['encabezadoDescripcion']="\nDescripción:" . "\n\n";
		$contenidoReporte['descripcion']= $Data['reporte']['infoCaso']['descripcion']. "\n";
/******************************************/

		$contenidoReporte['encabezadoResumen']="\nResumen:" . "\n\n";
		$contenidoReporte['resumen']= $Data['reporte']['infoCaso']['resumen']. "\n";
/******************************************/

		$contenidoReporte['encabezadoObservaciones']="\nObservaciones:" . "\n\n";
		$contenidoReporte['observacion']= $Data['reporte']['infoCaso']['observaciones']. "\n";
/******************************************/

/**************Seguimiento del caso***********************/
		$contenidoReporte['encabezadoSeguimientoCaso']="\nSeguimiento del caso" . "\n\n";
		
		if (isset($Data['reporte']['fichas']	)) {
			foreach ($Data['reporte']['fichas'] as $key => $value) {
				$contenidoReporte['claveId'.$key]= "Clave:  ".$value['fichaId']. "\n";
				$contenidoReporte['titulo'.$key]= "Título:  ".$value['titulo']. "\n";
				$contenidoReporte['fecha'.$key]= "Fecha:  ".$value['fecha']. "\n";
				$contenidoReporte['fichaComentario'.$key]= "Comentarios:  ".$value['comentarios']."\n\n";
			}
		}
/******************************************/

/**************Derechos afectados y actos***********************/
		
		if (isset($Data['reporte']['derechoAfectado'])) {
			$contenidoReporte['encabezadoDErechosAfectados']="\n\nNúcleo del caso\n\nDerechos afectados y actos "."\n";
			foreach ($Data['reporte']['derechoAfectado'] as $key => $value) {
				
				$contenidoReporte['derechoAfectado'.$key]="\n"."Derecho afectado:  ".$datos['catalogos']['derechosAfectadosCatalogo']['derechosAfectadosN'.$value['derechoAfectadoNivel'].'Catalogos'][$value['derechoAfectadoCasoId']]['descripcion'] ."\n";
				$contenidoReporte['acto'.$key]="Acto:  ". $datos['catalogos']['actosCatalogo']['actosN'.$Data['reporte']['actos'][$key]['actoViolatorioNivel'].'Catalogo'][$Data['reporte']['actos'][$key]['actoViolatorioId']]['descripcion'] ."\n";
				$contenidoReporte['noVictimas'.$key] = "No. afectados: ". $value['noVictimas']."\n";
				$contenidoReporte['fechaInicial'.$key]="Fecha de inicio:  ". $value['fechaInicial']."\n";
				$contenidoDerechoAfectado['tipoFechaInicial'.$key]="Tipo de fecha:  ". $value['tipoFechaInicialId']."\n";
				$contenidoReporte['fechaTermino'.$key]="Fecha de termino:  " . $value['fechaTermino']."\n";
				$contenidoDerechoAfectado['tipoFechaTermino'.$key]="Tipo de fecha:  ". $value['tipoFechaTerminoId']."\n";
				
				$actoId=$Data['reporte']['actos'][$key]['actoId'];
				if (isset($Data['reporte']['victimas']	)) {
					$contenidoReporte['EncabezadoVictimas'.$key]="\nVictimas  ". "\n";
					$nVic = 1;
					foreach ($Data['reporte']['victimas'] as $key => $value2) {
						$nPerp = 0;
						if ($value2['actos_actoId']==$actoId) {
							$contenidoReporte['victimasComentarios'.$key]= "\n".'Víctima '.$nVic.': '.
							$datos['catalogos']['ListaTodosActores'][$value2['victimaId']]['nombre'] ." ". $datos['catalogos']['ListaTodosActores'][$value2['victimaId']]['apellidosSiglas'] ."\n".
							"Comentarios sobre victimas y perpetradores:  \n". $value2['comentarios'];
							if(isset($value2['estatusVictimaId'])){
								$contenidoReporte['estatusVictimaId'.$key]="Estado:  ". $datos['catalogos']['estatusVictimaCatalogo']['estatusVictimaCatalogo'][$value2['estatusVictimaId']]['descripcion']."\n";
							}
							if (isset($Data['reporte']['perpetradores']	)) {
								$contenidoReporte['EncabezadoPerpetradores'.$key]="\nPerpetradores  "."\n\n";
								foreach ($Data['reporte']['perpetradores'] as $key => $value3) {
									if ($value3['victimas_victimaId']==$value2['victimaId']) {
										$nPerp = $nPerp+1;
										$status = $value3['estatusPerpetradorCatalogo_estatusPerpetradorId'] -1;
										$contenidoReporte['perpetradorId'.$key]="Perpetrador ".$nPerp.":  ". $datos['catalogos']['ListaTodosActores'][$value3['perpetradorId']]['nombre'] ." ". $datos['catalogos']['ListaTodosActores'][$value3['perpetradorId']]['apellidosSiglas'] ."\n";
										$contenidoReporte['tipoPerpetradorId'.$key]="Tipo de perpetrador:  ".$datos['catalogos']['tipoPerpetrador']['tipoPerpetradorN'.$value3['tipoPerpetradorNivel'].'Catalogo'][$value3['tipoPerpetradorId']]['descripcion']. "\n";
										if(isset($value3['estatusPerpetradorCatalogo_estatusPerpetradorId'])){
											$contenidoReporte['estatusPerpetradorId'.$key]="Estado del perpetrador:  ". $datos['catalogos']['estatusPerpetradorCatalogo']['estatusPerpetradorCatalogo'][$value3['estatusPerpetradorCatalogo_estatusPerpetradorId']]['descripcion']."\n";
										}
										if( $value3['nivelInvolugramientoId'] != 0 ){
											$contenidoReporte['gradoInvolucramientoid'.$key]="Grado de involucramiento:  ". $datos['catalogos']['gradoDeInvolucramiento']['gradoInvolucramientoN'.$value3['nivelInvolugramientoId'].'Catalogo'][$value3['gradoInvolucramientoid']]['descripcion']."\n";
											$contenidoReporte['afiliacionPerpetrador'.$key]="Tipo de afiliación:  ".$datos['catalogos']['relacionActoresCatalogo'][$value3['nivelInvolugramientoId']]['nombre']."\n\n";
										}
									}
									
								}
							}
						
						}
						$nVic = $nVic+1;
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
				if ( ($datos['catalogos']['ListaTodosActores'][$intervencion['interventorId']]['tipoActorId']) == 3) {
					$contenidoReporte['intervencionInstitucion']=	"Institución:  ". $datos['catalogos']['ListaTodosActores'][$intervencion['interventorId']]['nombre'] ." ". $datos['catalogos']['ListaTodosActores'][$intervencion['interventorId']]['apellidosSiglas'] ."\n";
				}
				else{				
					$contenidoReporte['intervencionInterventor']=	"Interventor:  ".$datos['catalogos']['ListaTodosActores'][$intervencion['interventorId']]['nombre'] ." ". $datos['catalogos']['ListaTodosActores'][$intervencion['interventorId']]['apellidosSiglas'] ."\n";
					if($intervencion['tipoRelacionInterventor'] > 0){
						$contenidoReporte['actorRelacionadoInterventor']= "Actor colectivo relacionado:  ".$intervencion['actorRelacionadoInterventor'][$intervencion['tipoRelacionInterventor']]['nombre']."\n";
						$contenidoReporte['tipoRelacionInterventor']= "Tipo relación:  ".$datos['catalogos']['relacionActoresCatalogo'][$intervencion['actorRelacionadoInterventor'][$intervencion['tipoRelacionInterventor']]['tipoRelacionId']]['Nivel2']."\n";
					}
				}
				$contenidoReporte['intervencionReceptor']=	"Receptor:  ". $datos['catalogos']['ListaTodosActores'][$intervencion['receptorId']]['nombre'] ." ". $datos['catalogos']['ListaTodosActores'][$intervencion['receptorId']]['apellidosSiglas'] ."\n";
				if(isset($intervencion['tipoRelaciontipoRelacionReceptor']) && $intervencion['tipoRelaciontipoRelacionReceptor'] > 0){
					$contenidoReporte['actorRelacionadoReceptor']= "Actor colectivo relacionado:  ".$intervencion['actorRelacionadoReceptor'][$intervencion['tipoRelacionReceptor']]['nombre']."\n";
					$contenidoReporte['tipoRelacionReceptor']= "Tipo relación:  ".$datos['catalogos']['relacionActoresCatalogo'][$intervencion['actorRelacionadoReceptor'][$intervencion['tipoRelacionReceptor']]['tipoRelacionId']]['Nivel2']."\n";
				}
				$contenidoReporte['intervencionImpacto']=	"Impacto:  ". $intervencion['impacto']."\n";
				$contenidoReporte['intervencionRespuesta']=	"Respuesta:  ". $intervencion['respuesta']."\n";
				
				$intervenidos ="Personas por las que se intervino: "."\n";
				if(isset($intervencion['intervenidos'])){
					foreach ($intervencion['intervenidos'] as $intervenido) {
						$intervenidos = $intervenidos. $datos['catalogos']['ListaTodosActores'][$intervenido['intervenidoId']]['nombre']." ". $datos['catalogos']['ListaTodosActores'][$intervenido['intervenidoId']]['apellidosSiglas'] ."\n";
					}
				}
				$contenidoReporte['intervenidos'] =$intervenidos;
			}
		}	

/******************************************/

/**************Informcion Adicional***********************/

		$contenidoReporte['encabezadoInfoAdcional']="\nInformacion adicional: "."\n\n";

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
				if($infoAdicional['relacionId'] > 0){
						$contenidoReporte['actorRelacionadoPersonal']= "Actor colectivo relacionado:  ".$infoAdicional['actorRelacionadoPersonal'][$infoAdicional['relacionId']]['nombre']."\n";
						$contenidoReporte['tipoRelacionPersonal']= "Tipo relación:  ".$datos['catalogos']['relacionActoresCatalogo'][$infoAdicional['actorRelacionadoPersonal'][$infoAdicional['relacionId']]['tipoRelacionId']]['Nivel2']."\n";
				}
				$contenidoReporte['infoAdicionalTipoFuente'] = "Tipo fuente:  ".$datos['catalogos']['tipoFuenteCatalogo']['tipoFuenteCatalogo'][$infoAdicional['tipoFuenteCatalogo_tipoFuenteId']]['descripcion']."\n";
				$contenidoReporte['infoAdicionalfecha'] = "Fecha:  ".$infoAdicional['fecha']."\n";
				$contenidoReporte['infoAdicionalNivelConfiabilidad'] = "Nivel confiabilidad:  ".$datos['catalogos']['nivelConfiabilidadCatalogo']['nivelConfiabilidadCatalogo'][$infoAdicional['nivelConfiabilidadCatalogo_nivelConfiabilidadId']]['descripcion']."\n";				
				$contenidoReporte['infoadicionalObservaciones']= "Observaciones:  ".$infoAdicional['observaciones']."\n";
				$contenidoReporte['infoadicionalComentarios']= "Comentarios:  ".$infoAdicional['comentarios']."\n";
				$contenidoReporte['infoAdicionalPersonalReportado'.$key]="Actor reportado:  ".$datos['catalogos']['ListaTodosActores'][$infoAdicional['actorReportado']]['nombre']." ".$datos['catalogos']['ListaTodosActores'][$infoAdicional['actorReportado']]['apellidosSiglas']."\n";
				if($infoAdicional['actorRelacionadoReportado'] > 0){
						$contenidoReporte['actorRelacionadoReportado']= "Actor colectivo relacionado:  ".$infoAdicional['actorRelacionadoReportado'][$infoAdicional['tipoRelacionActorReportadoId']]['nombre']."\n";
						$contenidoReporte['tipoRelacionPersonal']= "Tipo relación:  ".$datos['catalogos']['relacionActoresCatalogo'][$infoAdicional['actorRelacionadoReportado'][$infoAdicional['tipoRelacionActorReportadoId']]['tipoRelacionId']]['Nivel2']."\n";
				}
			}
		}
		
		$contenidoReporte['encabezadoCasosRelacionados']="\n Casos relacionados  \n\n";
		if(isset($Data['reporte']['relacionCasos'])){
			foreach ($Data['reporte']['relacionCasos'] as $key => $relacionCasos) {
				$contenidoReporte['encabezadoCaso'.$key] = "Caso"."\n";
				$contenidoReporte['nombrecaso'.$key]="Caso relacionado:  ".$relacionCasos['nombreCasoIdB']."\n";
				$contenidoReporte['tipoRelacionCaso'.$key]="Tipo de relación:  ".$datos['catalogos']['relacionCasosCatalogo']['relacionCasosCatalogo'][$relacionCasos['tipoRelacionId']]['descripcion']."\n";
				$contenidoReporte['FechaInicio'.$key]="Fecha de inicio:  ".$relacionCasos['fechaIncial']."\n";
				$contenidoReporte['FechaTermino'.$key]="Fecha de término:  ".$relacionCasos['fechaTermino']."\n";
			}	
			
		}
		$content ="";
/******************************************/
		foreach ($contenidoReporte as  $value) {
		
		$content = $content . $value;

		}
	$this->cezpdf->ezText($content, 10);

	$this->cezpdf->ezStream();
		
	}



}

?>