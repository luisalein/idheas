<html>
	<head>
	<?=$head?>	
	</head>
	<body>
	<pre>
	<!--<pre><?= print_r($fuenteDocumental) ?></pre>-->
	<!-- <pre><?= print_r($catalogos['listaTodosActores']) ?></pre> -->
	
	</pre>
	<form action='<?=base_url(); ?>index.php/casosVentanas_c/guardarDatosVentanas/6' method="post" accept-charset="utf-8">
	<input type="hidden" id="editar"  name="editar" value="<?= (isset($fuenteDocumental)) ? "1" : "0" ;?>"/>
	<input type="hidden" id='casos_casoId' name='casos_casoId'	value="<?= $casoId ?>"/>
	<input type="hidden" id='tipoFuenteDocumental_casos_casoId' name='tipoFuenteDocumental_casos_casoId' value="<?= $casoId ?>"/>
	
	<input type="hidden" id='nameSeleccionado' value="tipoFuenteDocumental_actorReportado"/>
	<input type="hidden" id='tipoFuenteDocumental_actorReportado' name='tipoFuenteDocumental_actorReportado' value="<?= (isset($fuenteDocumental['actorReportado'])) ? $fuenteDocumental['actorReportado'] : " " ; ?>"/>
	
	<input type="hidden" id='tipoFuenteDocumental_tipoFuenteDocumentalId' name='tipoFuenteDocumental_tipoFuenteDocumentalId' value="<?= (isset($fuenteDocumental['tipoFuenteDocumentalId'])) ? $fuenteDocumental['tipoFuenteDocumentalId'] : " " ; ?>"/>
	
	<input type="hidden" id='nameDeLaRelacion' value="tipoFuenteDocumental_relacionId"/>
	<input type="hidden" id='tipoFuenteDocumental_relacionId' name='tipoFuenteDocumental_relacionId' value="<?= (isset($fuenteDocumental['relacionId'])) ? $fuenteDocumental['relacionId'] : " " ; ?>"/>

		<!-----------------Comienza la parte de Fuente documental- ---------------------->
		<div id="formularioFuenteDocumental" class="twelve columns">
			<div id="pestania" data-collapse>
			<h2 class="open">Fuente documental</h2><!--título de la sub-pestaña-->  
			<div>
			
				<fieldset>
					  <legend>Fuente documental</legend>
						<div class="twelve columns espacioSuperior">
							<div class="twelve columns">		
								<label for="nombreFuente ">Nombre de la fuente</label>
								<textarea id="infoAdicional_nombreFuente" name="tipoFuenteDocumental_nombre"><?=(isset($fuenteDocumental['nombre']) ? $fuenteDocumental['nombre'] : ''); ?></textarea>
							</div>
							
							<div class="twelve columns">
								<label for="tipoRespuesta">Información adicional</label>
								<textarea id="infoAdicional_infoAdicionalFuenteDocumental" name="tipoFuenteDocumental_infoAdicional" ><?=(isset($fuenteDocumental['infoAdicional']) ? $fuenteDocumental['infoAdicional'] : ''); ?></textarea>
							</div>
							<div class="six columns">
								<label for="tipoFuente">Tipo de la fuente</label>
								<select id="tipoFuenteDocumentalCatalogo_tipoFuenteCatalogo_tipoFuenteId" name="tipoFuenteDocumental_tipoFuenteCatalogo_tipoFuenteId">
									 <option></option>							
									 <?php if(isset($fuenteDocumental['tipoFuenteCatalogo_tipoFuenteId'])){
				                                foreach($catalogos['tipoFuenteCatalogo'] as $key => $item): ?> <!--muestra los estados civiles-->
				                                    <option onclick="notasCatalogos('<?=$item['notas']; ?>','tipoFuenteDocumentalCatalogo','2')" value="<?=$item['tipoFuenteId']?>" <?=($fuenteDocumental['tipoFuenteCatalogo_tipoFuenteId'] == $item['tipoFuenteId']) ? 'selected="selected"' : '' ; ?> > <?=$item['descripcion']?></option>
				                                <?php endforeach;
				                            } else { ?>
				                                <?php foreach($catalogos['tipoFuenteCatalogo'] as $key => $item):?> <!--muestra los estados civiles-->
				                                    <option onclick="notasCatalogos('<?=$item['notas']; ?>','tipoFuenteDocumentalCatalogo','2')"  value="<?=$item['tipoFuenteId']?>" ><?=$item['descripcion']?></option>
				                                <?php endforeach; } 
				                      ?>
								</select>
										<div id="notastipoFuenteDocumentalCatalogo"></div>
							</div>
							

							<div class="six columns">
										<label for="nivelConfiabilidad">Nivel de confiabilidad</label>
										<select id="nivelConfiabilidadCatalogo_nivelConfiabilidadCatalogo_nivelConfiabilidadId" name="tipoFuenteDocumental_nivelConfiabilidadCatalogo_nivelConfiabilidadId">
											<option></option>						
											<?php if(isset($fuenteDocumental['nivelConfiabilidadCatalogo_nivelConfiabilidadId'])){
						                                foreach($catalogos['nivelConfiabilidadCatalogo'] as $key => $item): ?> <!--muestra los estados civiles-->
						                                    <option onclick="notasCatalogos('<?=$item['notas']; ?>','nivelConfiabilidadCatalogo','2')" value="<?=$item['nivelConfiabilidadId']?>" <?=($fuenteDocumental['nivelConfiabilidadCatalogo_nivelConfiabilidadId'] == $item['nivelConfiabilidadId']) ? 'selected="selected"' : '' ; ?> > <?=$item['descripcion']?></option>
						                                <?php endforeach;
						                            } else { ?>
						                                <?php foreach($catalogos['nivelConfiabilidadCatalogo'] as $key => $item):?> <!--muestra los estados civiles-->
						                                    <option onclick="notasCatalogos('<?=$item['notas']; ?>','nivelConfiabilidadCatalogo','2')" value="<?=$item['nivelConfiabilidadId']?>" > <?=$item['descripcion']?></option>
						                                <?php endforeach; } 
						                      ?>
										</select>
										<div id="notasnivelConfiabilidadCatalogo"></div>
							</div>
							
							
							<div class="six columns espacioSuperior">									
								<label for="FechaPubli">Fecha de publicación</label>
				                <input type="text"  id="fechaPubli" name="tipoFuenteDocumental_fecha" <?=(isset($fuenteDocumental['fecha']) ? 'value="'.$fuenteDocumental['fecha'].'"' : 'value=""'); ?> placeholder="AAAA-MM-DD" />
							</div>
							<div class="six columns espacioSuperior">
								<label for="FechaAcce">Fecha de acceso</label>
								<input type="text" id="fechaAcceso" name="tipoFuenteDocumental_fechaAcceso" <?=(isset($fuenteDocumental['fechaAcceso']) ? 'value="'.$fuenteDocumental['fechaAcceso'].'"' : 'value=""'); ?> placeholder="AAAA-MM-DD" />	
							</div>	
									
							<div  class="twelve columns">	
								<label for="fuenteLiga">Liga</label>
								<textarea id="infoAdicional_url"  name="tipoFuenteDocumental_url" ><?=(isset($fuenteDocumental['url']) ? $fuenteDocumental['url'] : ''); ?></textarea>
							</div>		
								
							
							<div class="twelve columns">
								<label for="comentFuente">Comentarios</label>
								<textarea id="infoAdicional_comentarios" name="infoAdicional_comentarios"><?=(isset($fuenteDocumental['comentarios']) ? $fuenteDocumental['comentarios'] : ''); ?></textarea>
							</div>
							
							
							<div class="twelve columns">
								<label for="comentFuente">Observaciones</label>
								<textarea id="infoAdicional_observaciones"  name="infoAdicional_observaciones" ><?=(isset($fuenteDocumental['observaciones']) ? $fuenteDocumental['observaciones'] : ''); ?></textarea>
							</div>
							
							
						<div class="twelve columns">
			<fieldset>
				<legend class="espacioInferior">Actor reportado</legend>
					<input type="radio" onclick="pintaIndividualesInfoDocumental()" name="selecionaActor" <?= (isset($fuenteDocumental['actorReportado']) && ($catalogos['listaTodosActores'][$fuenteDocumental['actorReportado']]['tipoActorId']< 3)) ? "checked='checked'" : " " ;?>/>Persona
					<input type="radio"	onclick="pintaColectivosInfoDocumental()" name="selecionaActor"<?= (isset($fuenteDocumental['actorReportado']) && ($catalogos['listaTodosActores'][$fuenteDocumental['actorReportado']]['tipoActorId']== 3)) ? "checked='checked'" : " " ;?> />Actor colectivo <br />
					<label class="espacioSuperior"><b >Persona:</b></label> <br />


					<div class="twelve columns espacioSuperior" id="actorReportado">
						<?php if (isset($fuenteDocumental['actorReportado']) && ($fuenteDocumental['actorReportado']>0)) {?>
						<div class="three columns"><img class="foto" src="<?= base_url().$catalogos['listaTodosActores'][$fuenteDocumental['actorReportado']]['foto']?>" /></div><b><h4><?= (isset($catalogos['listaTodosActores'][$fuenteDocumental['actorReportado']]['nombre'])) ? $catalogos['listaTodosActores'][$fuenteDocumental['actorReportado']]['nombre'] : " " ; ?>  <?= (isset($fuenteDocumental['actorReportado'])) ? $catalogos['listaTodosActores'][$fuenteDocumental['actorReportado']]['apellidosSiglas'] :  '' ;?></h4></b>
						<?php }?>
					</div>

					<div class="twelve columns espacioSuperior" id="actorReportadoBotones">
							<div class="nine columns">
								<?php if (isset($fuenteDocumental['actorReportado']) && ($catalogos['listaTodosActores'][$fuenteDocumental['actorReportado']]['tipoActorId']< 3)) {?>
									<input class="tiny button" type="button" onclick="seleccionarActorseleccionarActorIndColDatos('6')" value="Seleccionar actor">
								<?php } else { ?>
								<input class="tiny button" type="button" onclick="seleccionarActorseleccionarColDatos('4')" value="Seleccionar actor">
								<?php } ?>
							</div>
							<div id="eliminarVistaActor" class="three columns">
								<?php if (isset($fuenteDocumental['actorReportado']) && ($fuenteDocumental['actorReportado']>0)) {?>
									<input class="tiny button" type="button" onclick="eliminarRelacionVista('eliminarVistaActor','fuenteDocumental_actorReportado','infoColectio','fuenteDocumental_relacionId')" value="Eliminar Actor">
								<?php }?>
							</div>
					</div>
												
					<div class="twelve columns espacioSuperior" id="infoColectio" <?= (isset($fuenteDocumental)) ? "" : 'class="Escondido"' ;?>>
						<div id="pestania" data-collapse  >
							<h2 class="open">Actor colectivo</h2>
								<div>
									<div id="infoColectioContenido" >
									<?php if (isset($fuenteDocumental['relacionId']) &&($fuenteDocumental['relacionId'] > 0)) { ?>
										<div class="three columns">
											<img class="foto" src="<?= base_url().$catalogos['listaTodosActores'][$catalogos['relacionesActoresCatalogo'][$fuenteDocumental['relacionId']]['actorRelacionadoId']]['foto']?>" />
										</div>
										<b><h4><?= (isset($catalogos['listaTodosActores'][$catalogos['relacionesActoresCatalogo'][$fuenteDocumental['relacionId']]['actorRelacionadoId']]['nombre'])) ? $catalogos['listaTodosActores'][$catalogos['relacionesActoresCatalogo'][$fuenteDocumental['relacionId']]['actorRelacionadoId']]['nombre'] : " " ; ?>  <?= (isset($catalogos['listaTodosActores'][$catalogos['relacionesActoresCatalogo'][$fuenteDocumental['relacionId']]['actorRelacionadoId']]['apellidosSiglas'])) ? $catalogos['listaTodosActores'][$catalogos['relacionesActoresCatalogo'][$fuenteDocumental['relacionId']]['actorRelacionadoId']]['apellidosSiglas'] :  '' ;?></h4></b>
										<?php } ?>
									</div>
									<div id="infoColectioContenidoBotones" >
										<?php if (isset($fuenteDocumental['actorReportado']) &&($fuenteDocumental['actorReportado'] > 0)) { ?>
											<input class="tiny button" type="button" onclick="ventanaColectivoRelacionados('<?= $catalogos['listaTodosActores'][$fuenteDocumental['actorReportado']]['actorId'] ?>','3')" value="Seleccionar relación">
											<input class="tiny button" type="button" onclick="eliminarRelacionVista('infoColectioContenido','fuenteDocumental_relacionId')" value="Eliminar relación">
										<?php } ?>
									</div>
								</div>
						</div>
					</div>
			</fieldset>


						</div>
						
							
					
						
						</div>
						

						</div>										
										
				</fieldset>
			</div>

			</div>
			
		<input class="medium button" type="submit" value="Guardar" />
		<input class="medium button" value="Cancelar" onclick="cerrarVentana()" />		
		</div>
		<!-----------------termina la parte de Fuente documental------------------------>

	</form>
	</body>
</html>

