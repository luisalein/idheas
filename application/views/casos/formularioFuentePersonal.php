<!DOCTYPE >
<html>
	<head>
		<?=$head?>
	</head>
	
	<body>
		
		<form method="post"  action='<?=base_url(); ?>index.php/casosVentanas_c/guardarDatosVentanas/5' accept-charset="utf-8">
		 
		<input type="hidden" id="editar"  name="editar" value="<?= (isset($fuenteInfoPersonal)) ? "1" : "0" ;?>"/>
		<input type="hidden" id="nameSeleccionado"  value="fuenteInfoPersonal_actorId"/>
		
		<input type="hidden" id="nameSeleccionado"  value="fuenteInfoPersonal_actorId"/>
		<input type="hidden" id="fuenteInfoPersonal_actorId"  name="fuenteInfoPersonal_actorId" value="<?= (isset($fuenteInfoPersonal['actorId'])) ? $fuenteInfoPersonal['actorId'] : " " ;?>"/>
		
		<input type="hidden" id="nameDeLaRelacion"  value="fuenteInfoPersonal_relacionId"/>
		<input type="hidden" id="fuenteInfoPersonal_relacionId"  name="fuenteInfoPersonal_relacionId" value="<?= (isset($fuenteInfoPersonal['relacionId'])) ? $fuenteInfoPersonal['relacionId'] : " " ;?>"/>
		
		<input type="hidden" id="nameSeleccionadoReceptor"  value="fuenteInfoPersonal_actorReportado"/>
		<input type="hidden" id="fuenteInfoPersonal_actorReportado"  name="fuenteInfoPersonal_actorReportado" value="<?= (isset($fuenteInfoPersonal['actorReportado'])) ? $fuenteInfoPersonal['actorReportado'] : " " ;?>"/>

		<input type="hidden" id="nameDeLaRelacionReceptor"  value="fuenteInfoPersonal_tipoRelacionActorReportadoId"/>
		<input type="hidden" id="fuenteInfoPersonal_tipoRelacionActorReportadoId"  name="fuenteInfoPersonal_tipoRelacionActorReportadoId" value="<?= (isset($fuenteInfoPersonal['tipoRelacionActorReportadoId'])) ? $fuenteInfoPersonal['tipoRelacionActorReportadoId'] : " " ;?>"/>

		<input type="hidden" id='casos_casoId' name='casos_casoId'	value="<?= $casoId ?>"/>
		<input type="hidden" id='fuenteInfoPersonal_casos_casoId' name='fuenteInfoPersonal_casos_casoId' value="<?= $casoId ?>"/>

		<input type="hidden" id="fuenteInfoPersonal_fuenteInfoPersonalId"  name="fuenteInfoPersonal_fuenteInfoPersonalId" value="<?= (isset($fuenteInfoPersonal['fuenteInfoPersonalId'])) ? $fuenteInfoPersonal['fuenteInfoPersonalId'] : " " ;?>"/>
<!-- 
		<pre> <?php print_r($catalogos['relacionesActoresCatalogo'][$fuenteInfoPersonal['relacionId']])?></pre>
		<pre> <?php print_r($catalogos['relacionesActoresCatalogo'][$fuenteInfoPersonal['relacionId']]['actorRelacionadoId'])?></pre>
		<pre> <?php print_r($catalogos['listaTodosActores'][$fuenteInfoPersonal['actorId']])?></pre>
		<pre> <?php print_r($catalogos['listaTodosActores'][$fuenteInfoPersonal['actorId']]['actorId'])?></pre>
		 -->
		<pre> <?php print_r($fuenteInfoPersonal)?></pre>
			<fieldset>
				<legend class="espacioInferior">Fuente de información personal</legend>
					<input type="radio" onclick="pintaIndividualesInfoPersonal()" name="selecionaActor" <?= (isset($fuenteInfoPersonal['actorId']) && ($fuenteInfoPersonal['actorId']< 3)) ? "checked='checked'" : " " ;?>/>Persona
					<input type="radio"	onclick="pintaColectivosInfoPersonal()" name="selecionaActor"<?= (isset($fuenteInfoPersonal['actorId']) && ($fuenteInfoPersonal['actorId']== 3)) ? "checked='checked'" : " " ;?> />Actor colectivo <br />
					<label class="espacioSuperior"><b >Persona:</b></label> <br />


					<div class="twelve columns espacioSuperior" id="infoPersonalActor">
						<?php if (isset($fuenteInfoPersonal['actorId']) && ($fuenteInfoPersonal['actorId']>0)) {?>
						<div class="three columns"><img class="foto" src="<?= base_url().$catalogos['listaTodosActores'][$fuenteInfoPersonal['actorId']]['foto']?>" /></div><b><h4><?= (isset($catalogos['listaTodosActores'][$fuenteInfoPersonal['actorId']]['nombre'])) ? $catalogos['listaTodosActores'][$fuenteInfoPersonal['actorId']]['nombre'] : " " ; ?>  <?= (isset($fuenteInfoPersonal['actorId'])) ? $catalogos['listaTodosActores'][$fuenteInfoPersonal['actorId']]['apellidosSiglas'] :  '' ;?></h4></b>
						<?php }?>
					</div>

					<div class="twelve columns espacioSuperior" id="infoPersonalActorBotones">
							<div class="nine columns">
								<?php if (isset($fuenteInfoPersonal['actorId']) && ($fuenteInfoPersonal['actorId']>0)) {?>
									<input class="tiny button" type="button" onclick="seleccionarActorseleccionarActorIndColDatos('5')" value="Seleccionar actor">
								<?php }?>
							</div>
							<div id="eliminarVistaActor" class="three columns">
								<?php if (isset($fuenteInfoPersonal['actorId']) && ($fuenteInfoPersonal['actorId']>0)) {?>
									<input class="tiny button" type="button" onclick="eliminarRelacionVista('eliminarVistaActor','fuenteInfoPersonal_actorId','infoColectio','fuenteInfoPersonal_relacionId')" value="Eliminar Actor">
								<?php }?>
							</div>
					</div>
												
					<div class="twelve columns espacioSuperior" id="infoColectio" <?= (isset($fuenteInfoPersonal)) ? "" : 'class="Escondido"' ;?>>
						<div id="pestania" data-collapse  >
							<h2 class="open">Actor colectivo</h2>
								<div>
									<div id="infoColectioContenido" >
									<?php if (isset($fuenteInfoPersonal['relacionId']) &&($fuenteInfoPersonal['relacionId'] > 0)) { ?>
										<div class="three columns">
											<img class="foto" src="<?= base_url().$catalogos['listaTodosActores'][$catalogos['relacionesActoresCatalogo'][$fuenteInfoPersonal['relacionId']]['actorRelacionadoId']]['foto']?>" />
										</div>
										<b><h4><?= (isset($catalogos['listaTodosActores'][$catalogos['relacionesActoresCatalogo'][$fuenteInfoPersonal['relacionId']]['actorRelacionadoId']]['nombre'])) ? $catalogos['listaTodosActores'][$catalogos['relacionesActoresCatalogo'][$fuenteInfoPersonal['relacionId']]['actorRelacionadoId']]['nombre'] : " " ; ?>  <?= (isset($catalogos['listaTodosActores'][$catalogos['relacionesActoresCatalogo'][$fuenteInfoPersonal['relacionId']]['actorRelacionadoId']]['apellidosSiglas'])) ? $catalogos['listaTodosActores'][$catalogos['relacionesActoresCatalogo'][$fuenteInfoPersonal['relacionId']]['actorRelacionadoId']]['apellidosSiglas'] :  '' ;?></h4></b>
										<?php } ?>
									</div>
									<div id="infoColectioContenidoBotones" >
										<?php if (isset($fuenteInfoPersonal['actorId']) &&($fuenteInfoPersonal['actorId'] > 0)) { ?>
											<input class="tiny button" type="button" onclick="ventanaColectivoRelacionados('<?= $catalogos['listaTodosActores'][$fuenteInfoPersonal['actorId']]['actorId'] ?>','3')" value="Seleccionar relación">
											<input class="tiny button" type="button" onclick="eliminarRelacionVista('infoColectioContenido','fuenteInfoPersonal_relacionId')" value="Eliminar relación">
										<?php } ?>
									</div>
								</div>
						</div>
					</div>
			</fieldset>
			<fieldset>
			<div class="twelve columns espacioSuperior">
				<div class="twelve columns" >
					<div class="six columns">
						<label for="tipoFuente">Tipo de la fuente</label>
						<select id="fuenteInfoPersonal_tipoFuenteCatalogo_tipoFuenteId" name="fuenteInfoPersonal_tipoFuenteCatalogo_tipoFuenteId">
							 <option></option>							
							 <?php if(isset($fuenteInfoPersonal['tipoFuenteCatalogo_tipoFuenteId'])){
		                                foreach($catalogos['tipoFuenteCatalogo'] as $key => $item): ?> <!--muestra los estados civiles-->
		                                    <option onclick="notasCatalogos('<?=$item['notas']; ?>','tipoFuenteDocumentalCatalogo','2')" value="<?=$item['tipoFuenteId']?>" <?=($fuenteInfoPersonal['tipoFuenteCatalogo_tipoFuenteId'] == $item['tipoFuenteId']) ? 'selected="selected"' : '' ; ?> > <?=$item['descripcion']?></option>
		                                <?php endforeach;
		                            } else { ?>
		                                <?php foreach($catalogos['tipoFuenteCatalogo'] as $key => $item):?> <!--muestra los estados civiles-->
		                                    <option onclick="notasCatalogos('<?=$item['notas']; ?>','tipoFuenteDocumentalCatalogo','2')"  value="<?=$item['tipoFuenteId']?>" ><?=$item['descripcion']?></option>
		                                <?php endforeach; } 
		                      ?>
						</select>
								<div id="notastipoFuenteDocumentalCatalogo"></div>
					</div>
				</div>
				
				<div class="twelve columns espacioSuperior espacioInferior">
					<div class="six columns">
						<label for="edad">Fecha</label>
							<select onclick="fechaInicialCasosActos(value)">
										<option  value="1" checked="checked" >fecha exacta</option>
										<option  value="2">fecha aproximada</option>
										<option  value="3">Se desconce el día</option>
										<option  value="4">Se desconce el día y el mes</option>
							</select>
					</div>
		
					<div class="six columns">
						<br />
						<p class="Escondido" id="fechaExactaVAct">
							<input type="text" id="fechaExactaAct"   placeholder="AAAA-MM-DD" />

						</p>

						<p class="Escondido" id="fechaAproxVAct">
							<input type="text" id="fechaAproxAct"   placeholder="AAAA-MM-DD" />

						</p>

						<p class="Escondido" id="fechaSinDiaVAct">
							<input type="text" id="fechaSinDiaAct"   placeholder="AAAA-MM-00" />

						</p >

						<p class="Escondido" id="fechaSinDiaSinMesVAct">
							<input type="text" id="fechaSinDiaSinMesAct"  placeholder="AAAA-00-00" />

						</p>
					</div>
				</div> <!---termina opciones de fechaInicial-->
				
				<div class="twelve columns">	
					
					<div class="six columns">
						<label for="nivelConfiabilidad">Nivel de confiabilidad</label>
						<select id="nivelConfiabilidadCatalogo_nivelConfiabilidadCatalogo_nivelConfiabilidadId" name="fuenteInfoPersonal_nivelConfiabilidadCatalogo_nivelConfiabilidadId">
							<option></option>						
							<?php if(isset($fuenteInfoPersonal['nivelConfiabilidadCatalogo_nivelConfiabilidadId'])){
		                                foreach($catalogos['nivelConfiabilidadCatalogo'] as $key => $item): ?> <!--muestra los estados civiles-->
		                                    <option onclick="notasCatalogos('<?=$item['notas']; ?>','nivelConfiabilidadCatalogo','2')" value="<?=$item['nivelConfiabilidadId']?>" <?=($fuenteInfoPersonal['nivelConfiabilidadCatalogo_nivelConfiabilidadId'] == $item['nivelConfiabilidadId']) ? 'selected="selected"' : '' ; ?> > <?=$item['descripcion']?></option>
		                                <?php endforeach;
		                            } else { ?>
		                                <?php foreach($catalogos['nivelConfiabilidadCatalogo'] as $key => $item):?> <!--muestra los estados civiles-->
		                                    <option onclick="notasCatalogos('<?=$item['notas']; ?>','nivelConfiabilidadCatalogo','2')" value="<?=$item['nivelConfiabilidadId']?>" > <?=$item['descripcion']?></option>
		                                <?php endforeach; } 
		                      ?>
						</select>
						<div id="notasnivelConfiabilidadCatalogo"></div>
					</div>
				</div>
				
				<div class="twelve columns">
					<label for="comentFuente">Observaciones</label>
					<textarea id="infoAdicional_observaciones"  name="infoAdicional_observaciones" ><?=(isset($fuenteInfoPersonal['observaciones']) ? $fuenteInfoPersonal['observaciones'] : ''); ?></textarea>
				</div>
				<div class="twelve columns">
					<label for="comentFuente">Comentarios</label>
					<textarea id="infoAdicional_comentarios" name="infoAdicional_comentarios"><?=(isset($fuenteInfoPersonal['comentarios']) ? $fuenteInfoPersonal['comentarios'] : ''); ?></textarea>
				</div>


			<fieldset>
				<legend class="espacioInferior">Actor reportado</legend>
					<input type="radio" onclick="pintaIndividualesInfoPersonalReportado()" name="selecionaActorReportado"/>Persona
					<input type="radio"	onclick="pintaColectivosInfoPersonalReportado()" name="selecionaActorReportado" />Actor colectivo <br />
					<label class="espacioSuperior"><b >Persona:</b></label> <br />

					<div class="twelve columns espacioSuperior" id="infoPersonalActorReportado"></div>
					<div class="twelve columns espacioSuperior" id="infoPersonalActorReportadoBotones"></div>
												
					<div class="twelve columns espacioSuperior" id="infoColectioReportado" <?= (isset($fuenteInfoPersonal)) ? "" : 'class="Escondido"' ;?>>
						<div id="pestania" data-collapse  >
							<h2 class="open">Actor colectivo</h2>
								<div>
									<div id="infoColectioContenidoReportado" >
										<!--Información por corrergir pero en escencia es la idea-->
										<?php if (isset($intervenciones['interventorId'])&& ($intervenciones['interventorId']>0)) { ?>
											<input type="button" value="Eliminar" onclick="eliminarRelacionVista('vistaActorRelacionadoPerpetrador','intervencioneses_actorRelacionadoId')" class="tiny button">	
											<input type="button" class="tiny button" value="Cambiar relación" onclick="ventanaColectivoRelacionados('<?= $intervenciones['interventorId'] ?>')">
										<!--Aquí termina lo que hay que corregir-->
										<?php } ?>
									</div>
									<div id="infoColectioContenidoReportadoBotones" ></div>
								</div>
						</div>
					</div>
			</div>
			</fieldset>
			<input class="medium button" type="submit" value="Guardar"/>
			<input class="medium button" value="Cancelar" onclick="cerrarVentana()" />
		</form>
	</body>
</html>
