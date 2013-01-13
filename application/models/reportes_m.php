<?php

    class Reportes_m extends CI_Model {

        function __construct(){
            
            parent::__construct();
            
            $this->load->database();
        
        }
		
			public function mReporteLargo($casoId){
		
				/* Trae todos los datos de casos*/
				$this->db->select('*');
				$this->db->from('casos');
				$this->db->where('casoId',$casoId);
				$consulta = $this->db->get();
							
				if ($consulta->num_rows() > 0){				
					/* Pasa la consulta a un cadena */
					foreach ($consulta->result_array() as $row) {
						$datos['casos'] = $row;
					}
				}
				
				
				/* Trae todos los datos de infoCaso*/
				$this->db->select('*');
				$this->db->from('infoCaso');
				$this->db->where('casos_casoId',$casoId);
				$consulta = $this->db->get();
							
				if ($consulta->num_rows() > 0){				
					/* Pasa la consulta a un cadena */
					foreach ($consulta->result_array() as $row) {
						$datos['infoCaso'] = $row;
					}
				}
				
				/* Trae todos los datos de fichas*/
				$this->db->select('*');
				$this->db->from('fichas');
				$this->db->where('casos_casoId',$casoId);
				$consulta = $this->db->get();
							
				if ($consulta->num_rows() > 0){				
					/* Pasa la consulta a un cadena */
					foreach ($consulta->result_array() as $row) {
						$datos['fichas'][$row['fichaId']] = $row;
					}
				}
				
				/* Trae todos los datos de lugares*/
				$this->db->select('*');
				$this->db->from('lugares');
				$this->db->where('casos_casoId',$casoId);
				$consulta = $this->db->get();
							
				if ($consulta->num_rows() > 0){				
					/* Pasa la consulta a un cadena */
					foreach ($consulta->result_array() as $row) {
						$datos['lugares'][$row['lugarId']] = $row;
					}
				}
				
				/* Trae todos los datos de intervenciones*/
				$this->db->select('*');
				$this->db->from('intervenciones');
				$this->db->where('casos_casoId',$casoId);
				$consulta = $this->db->get();
							
				if ($consulta->num_rows() > 0){				
					/* Pasa la consulta a un cadena */
					foreach ($consulta->result_array() as $row) {
						$datos['intervenciones'][$row['intervencionId']] = $row;
					}
					
					foreach ($datos['intervenciones'] as $row) {
				
						/*Trae los intervenidos de una intervención*/
						$this->db->select('*');
						$this->db->from('intervenidos');
						$this->db->where('intervenciones_intervencionId',$row['intervencionId']);
						$this->db->order_by("intervenidoId", "desc"); 
						$consultaIntervenidos = $this->db->get();
						
						if ($consultaIntervenidos->num_rows() > 0) {
							foreach ($consultaIntervenidos->result_array() as $row4) {
								$datos['intervenciones'][$row['intervencionId']]['intervenidos'][$row4['intervenidoId']]=$row4;
								
							}
						}
					}
				}
				
				/* Trae todos los datos de actos*/
				$this->db->select('*');
				$this->db->from('actos');
				$this->db->where('casos_casoId',$casoId);
				$consulta = $this->db->get();
							
				if ($consulta->num_rows() > 0){				
					/* Pasa la consulta a un cadena */
					foreach ($consulta->result_array() as $row) {
						$datos['actos'][$row['derechoAfectado_derechoAfectadoCasoId']] = $row;
					}
					
					/*Trae todos los datos de derechosafectados*/
					foreach ($datos['actos'] as $row) {
						$this->db->select('*');
						$this->db->from('derechoAfectado');
						$this->db->where('derechoAfectadoCasoId', $row['derechoAfectado_derechoAfectadoCasoId']);
						$consulta = $this->db->get();
						
						if ($consulta->num_rows() > 0){				
							/* Pasa la consulta a un cadena */
							foreach ($consulta->result_array() as $row) {
								$datos['derechoAfectado'][$row['derechoAfectadoCasoId']] = $row;
							}
						}
					}/* Fin foreach de derechoAfectado*/
					
					foreach ($datos['actos'] as $row) {
						$this->db->select('*');
						$this->db->from('victimas');
						$this->db->where('actos_actoId', $row['actoId']);
						$consulta = $this->db->get();
						
						if ($consulta->num_rows() > 0){				
							/* Pasa la consulta a un cadena */
							foreach ($consulta->result_array() as $row) {
								$datos['victimas'][$row['victimaId']] = $row;
							}
							
							foreach ($datos['victimas'] as $row) {
								$this->db->select('*');
								$this->db->from('perpetradores');
								$this->db->where('victimas_victimaId', $row['victimaId']);
								$consulta = $this->db->get();
								
								if ($consulta->num_rows() > 0){				
									/* Pasa la consulta a un cadena */
									foreach ($consulta->result_array() as $row) {
										$datos['perpetradores'][$row['perpetradorVictimaId']] = $row;
									}
								}
							}/*Fin foreach Victimas*/
						}
						
					}/*Fin foreach actos*/
					
					/* Trae todos los datos de fuenteInfoPersonal*/
					$this->db->select('*');
					$this->db->from('fuenteInfoPersonal');
					$this->db->where('casos_casoId',$casoId);
					$consulta = $this->db->get();
								
					if ($consulta->num_rows() > 0){				
						/* Pasa la consulta a un cadena */
						foreach ($consulta->result_array() as $row) {
							$datos['fuenteInfoPersonal'][$row['fuenteInfoPersonalId']] = $row;
						}
					}
					
					/* Trae todos los datos de fuenteInfoPersonal*/
					$this->db->select('*');
					$this->db->from('tipoFuenteDocumental');
					$this->db->where('casos_casoId',$casoId);
					$consulta = $this->db->get();
								
					if ($consulta->num_rows() > 0){				
						/* Pasa la consulta a un cadena */
						foreach ($consulta->result_array() as $row) {
							$datos['tipoFuenteDocumental'][$row['tipoFuenteDocumentalId']] = $row;
						}
					} 	
				}
				if (isset($datos)) {
					return $datos;
				}else{
					return $mensaje = 'No hay datos en la base de datos';
				}
				
			}/* Fin de mReporteLargo*/
			
			/* Trae los datos necesarios para generar un reporte corto 
			 * @param $casoId */
			public function mTraeDatosCorto($casoId){
		
		
				/* Trae el nombre del caso */
				$this->db->select('*');
				$this->db->from('casos');
				$this->db->where('estadoActivo',1);
				$this->db->where('casoId',$casoId);
				$consulta = $this->db->get();

							
				if ($consulta->num_rows() > 0){				
					/* Pasa la consulta a un cadena */
					foreach ($consulta->result_array() as $row) {
						$datos['caso'] = $row;
					}
				}
				
				/* Trae todos los datos de actos*/
				$this->db->select('*');
				$this->db->from('actos');
				$this->db->where('casos_casoId',$casoId);
				$consulta = $this->db->get();
							
				if ($consulta->num_rows() > 0){				
					/* Pasa la consulta a un cadena */
					foreach ($consulta->result_array() as $row) {
						$datos['actos'][$row['actoId']] = $row;
					}
					
					foreach ($datos['actos'] as $row) {
						$this->db->select('*');
						$this->db->from('victimas');
						$this->db->where('actos_actoId', $row['actoId']);
						$consulta = $this->db->get();
						
						if ($consulta->num_rows() > 0){				
							/* Pasa la consulta a un cadena */
							foreach ($consulta->result_array() as $row) {
								$datos['victimas'][$row['victimaId']] = $row;
							}
							
							foreach ($datos['victimas'] as $row) {
								$this->db->select('*');
								$this->db->from('perpetradores');
								$this->db->where('victimas_victimaId', $row['victimaId']);
								$consulta = $this->db->get();
								
								if ($consulta->num_rows() > 0){				
									/* Pasa la consulta a un cadena */
									foreach ($consulta->result_array() as $row) {
										$datos['perpetradores'][$row['perpetradorVictimaId']] = $row;
										
										$this->db->select('nombre,apellidosSiglas');
										$this->db->from('actores');
										$this->db->where('actorId',$row['perpetradorId']);
										$consultaActores = $this->db->get();
										
										if($consultaActores->num_rows() > 0){
											foreach ($consultaActores->result_array() as $datosActores) {
												$datos['perpetradores'][$row['perpetradorVictimaId']]['nombre'] = $datosActores['nombre'];
												$datos['perpetradores'][$row['perpetradorVictimaId']]['apellidos'] = $datosActores['apellidosSiglas'];
											}/*fin foreach $consultaActores*/
											
										}/*fin if $consultaActores*/
										
									}/*fin foreach consulta*/
								}
							}/*Fin foreach Victimas*/
						}
					}/*Fin foreach actos*/
					
					foreach ($datos['actos'] as $row) {
						$this->db->select('*');
						$this->db->from('derechoAfectado');
						$this->db->where('derechoAfectadoCasoId', $row['derechoAfectado_derechoAfectadoCasoId']);
						$consulta = $this->db->get();
						
						if ($consulta->num_rows() > 0){				
							/* Pasa la consulta a un cadena */
							foreach ($consulta->result_array() as $row) {
								$datos['derechoAfectado'][$row['derechoAfectadoCasoId']] = $row;
							}
						}
					}/* Fin foreach de derechoAfectado*/
				}/* Fin de if Actos*/
				
				return $datos;
			}/* Fin de mTraeDatosCorto */
			
			/* Este modelo trae los datos para poder generar un reporte corto
			 * @param $datos = array (
			  						'nombre' 					=> 'caso1',
			  						'desdeFecha' 				=> '1987-07-24',
			  						'hastaFecha' 				=> '1987-09-16',
			  						'actoViolatorioId' 					=> '1',
			  						'actoViolatorioNivel'					=> '1'
			  						);
			 */
			
			public function mGeneraReporteCorto($datos){
				
				if($datos['nombre'] != ''){
					$datos = $this->mReporteCortoNombre($datos);
					return $datos;
				}elseif(($datos['desdeFecha'] != '') && ($datos['hastaFecha'] != '')){
					$datos = $this->mReporteCortoFechas($datos);
					return $datos;
				}else{
					$this->mReporteCortoActoDerechoAfectado($datos);
					return $datos;
				}
				
				return $mensaje;
			}/* Fin de mReporteCorto*/
			/*$datos = array('nombre'=>'caso1');
			 * */
			public function mReporteCortoNombre($datos){
				$this->db->select('casoId');
				$this->db->from('casos');
				$this->db->where('estadoActivo',1);
				$this->db->where('nombre',$datos['nombre']);
				$consulta = $this->db->get();
				
				if ($consulta->num_rows() > 0){				
					/* Pasa la consulta a un cadena */
					foreach ($consulta->result_array() as $value) {
						$casoId = $value;
					}
					
					$datos=$this->mTraeDatosCorto($casoId['casoId']);
					return $datos;
				}
			}
			/*$datos = array('desdeFecha'=>'fechainicial','hastaFecha'=>'fechafinal');
			 * */
			public function mReporteCortoFechas($datos){
				/* Trae los casoId de los casos que esten entre las fechas desdeFecha, hastaFecha*/
				$this->db->select('casoId');
				$this->db->from('casos');
				$this->db->where('estadoActivo',1);
				$this->db->where('fechaInicial >=',$datos['desdeFecha']);
				$this->db->where('fechaInicial <=',$datos['hastaFecha']);
				$consulta = $this->db->get();
				
				if ($consulta->num_rows() > 0){				
					/* Pasa la consulta a un cadena */
					foreach ($consulta->result_array() as $row) {
						$casos['casos'][$row['casoId']] = $row;
					}
					
					/* Por cada caso trae los datos dependiendo de su casoId */
					foreach ($casos['casos'] as $row) {
						$casoId = $row['casoId'];
						$datosCasos['casos'][$row['casoId']]=$this->mTraeDatosCorto($casoId);
					}
					return($datosCasos);
					
				}/*fin if */
				
			}/* fin de mReporteCortoFechas*/
			
			public function mReporteCortoActoDerechoAfectado($datos){
				/* Trae los actosId relacionados con un derecho afectado*/
				$this->db->select('casos_casoId');
				$this->db->from('actos');
				$this->db->where('actoViolatorioId',$datos['actoViolatorioId']);
				$this->db->where('actoViolatorioNivel',$datos['actoViolatorioNivel']);
				$consultaCasos = $this->db->get();
				
				if ($consultaCasos->num_rows() > 0){
					foreach ($consultaCasos->result_array() as $row) {
						$casosId['casos'][$row['casos_casoId']] = $row;
					}
					
					/* Por cada caso trae los datos dependiendo de su casoId */
					foreach ($casosId['casos'] as $row) {
						$casoId = $row['casos_casoId'];
						$datosCasos['casos'][$row['casos_casoId']]=$this->mTraeDatosCorto($casoId);
					}
					return($datosCasos);
				}/*fin if consultaCasos */
			}/* fin de mReporteCortoActoDerechoAfectado*/
			
			
	}/* Fin de clase Reportes_m*/
	
?>