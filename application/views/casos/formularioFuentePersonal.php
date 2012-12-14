<!DOCTYPE >
<html>
	<head>
		<?=$head?>
	</head>
	
	<body>
		
		<form method="post"  action='<?=base_url(); ?>index.php/casosVentanas_c/guardarDatosVentanas/5' accept-charset="utf-8">
		 
		<input type="hidden" id="editar"  name="editar" value="<?= (isset($datosCaso['fuenteInfoPersonal'][$id])) ? "1" : "0" ;?>"/>
		<input type="hidden" id='casos_casoId' name='casos_casoId'	value="<?= $casoId ?>"/>
		<input type="hidden" id='fuenteInfoPersonal_casos_casoId' name='fuenteInfoPersonal_casos_casoId' value="<?= $casoId ?>"/>
		
			<fieldset>
				<legend class="espacioInferior">Fuente de información personal</legend>
					<input type="radio" onclick="pintaIndividualesInfoPersonal()" name="selecionaActor"/>Persona
					<input type="radio"	onclick="pintaColectivosInfoPersonal()" name="selecionaActor" />Actor colectivo <br />
					<label class="espacioSuperior"><b >Persona:</b></label> <br />

					<div class="twelve columns espacioSuperior" id="infoPersonalActor"></div>
												
					<div class="twelve columns espacioSuperior" id="infoColectio" <?= (isset($datosCaso['fuenteInfoPersonal'][$id])) ? "" : 'class="Escondido"' ;?>>
						<div id="pestania" data-collapse  >
							<h2 class="open">Actor colectivo</h2>
								<div id="infoColectioContenido" >
								  
								</div>
						</div>
					</div>
			</fieldset>
			<fieldset>
			<div class="twelve columns espacioSuperior">
				<div class="twelve columns" >
					<div class="six columns">
						<label for="tipoFuente">Tipo de la fuente</label>
						<select id="tipoFuenteDocumentalCatalogo_tipoFuenteCatalogo_tipoFuenteId" name="tipoFuenteDocumental_tipoFuenteCatalogo_tipoFuenteId">
							 <option></option>							
							 <?php if(isset($datosCaso['fuenteInfoPersonal'][$id]['tipoFuenteCatalogo_tipoFuenteId'])){
		                                foreach($catalogos['tipoFuenteCatalogo'] as $key => $item): ?> <!--muestra los estados civiles-->
		                                    <option onclick="notasCatalogos('<?=$item['notas']; ?>','tipoFuenteDocumentalCatalogo','2')" value="<?=$item['tipoFuenteId']?>" <?=($datosCaso['fuenteInfoPersonal'][$id]['tipoFuenteCatalogo_tipoFuenteId'] == $item['tipoFuenteId']) ? 'selected="selected"' : '' ; ?> > <?=$item['descripcion']?></option>
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
						<select id="nivelConfiabilidadCatalogo_nivelConfiabilidadCatalogo_nivelConfiabilidadId" name="tipoFuenteDocumental_nivelConfiabilidadCatalogo_nivelConfiabilidadId">
							<option></option>						
							<?php if(isset($datosCaso['fuenteInfoPersonal'][$id]['nivelConfiabilidadCatalogo_nivelConfiabilidadId'])){
		                                foreach($catalogos['nivelConfiabilidadCatalogo'] as $key => $item): ?> <!--muestra los estados civiles-->
		                                    <option onclick="notasCatalogos('<?=$item['notas']; ?>','nivelConfiabilidadCatalogo','2')" value="<?=$item['nivelConfiabilidadId']?>" <?=($datosCaso['fuenteInfoPersonal'][$id]['nivelConfiabilidadCatalogo_nivelConfiabilidadId'] == $item['nivelConfiabilidadId']) ? 'selected="selected"' : '' ; ?> > <?=$item['descripcion']?></option>
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
					<textarea id="infoAdicional_observaciones"  name="infoAdicional_observaciones" ><?=(isset($datosCaso['fuenteInfoPersonal'][$id]['observaciones']) ? $datosCaso['fuenteInfoPersonal'][$id]['observaciones'] : ''); ?></textarea>
				</div>
				<div class="twelve columns">
					<label for="comentFuente">Comentarios</label>
					<textarea id="infoAdicional_comentarios" name="infoAdicional_comentarios"><?=(isset($datosCaso['fuenteInfoPersonal'][$id]['comentarios']) ? $datosCaso['fuenteInfoPersonal'][$id]['comentarios'] : ''); ?></textarea>
				</div>
				<fieldset>
					<legend>Actor reportado</legend>
						<input type="radio"  value="" name="" id=""/>Persona
						<input type="radio"  value="" name="" id=""/>Actor colectivo
						<b>Persona:</b> <br />
													
						
						<div id="pestania" data-collapse >
							<h2 class="open">Actor colectivo</h2><!--título de la sub-pestaña-->  
								<div >
								  
								</div>
						</div>
				</fieldset>
			</div>
			</fieldset>
			<input class="medium button" type="submit" value="Guardar"/>
			<input class="medium button" value="Cancelar" onclick="cerrarVentana()" />
		</form>
	</body>
</html>
