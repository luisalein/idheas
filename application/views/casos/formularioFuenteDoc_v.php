<html>
	<head>
	<?=$head?>	
	</head>
	<body>
	<pre>
	<!--<pre><?= print_r($datosCaso['tipoFuenteDocumental'][$id]) ?></pre>-->
	
	</pre>
	<form action='<?=base_url(); ?>index.php/casosVentanas_c/guardarDatosVentanas/6' method="post" accept-charset="utf-8">
	<input type="hidden" id="editar"  name="editar" value="<?= (isset($datosCaso['tipoFuenteDocumental'][$id])) ? "1" : "0" ;?>"/>
	<input type="hidden" id='casos_casoId' name='casos_casoId'	value="<?= $casoId ?>"/>
	<input type="hidden" id='tipoFuenteDocumental_casos_casoId' name='tipoFuenteDocumental_casos_casoId' value="<?= $casoId ?>"/>

		<!-----------------Comienza la parte de Fuente documental- ----------------------->
		<div id="formularioFuenteDocumental" class="twelve columns">
			<div id="pestania" data-collapse>
			<h2 class="open">Fuente documental</h2><!--título de la sub-pestaña-->  
			<div>
			
				<fieldset>
					  <legend>Fuente documental</legend>
						<div class="twelve columns espacioSuperior">
							<div class="twelve columns">		
								<label for="nombreFuente ">Nombre de la fuente</label>
								<textarea id="infoAdicional_nombreFuente" name="tipoFuenteDocumental_nombre"><?=(isset($datosCaso['tipoFuenteDocumental'][$id]['nombre']) ? $datosCaso['tipoFuenteDocumental'][$id]['nombre'] : ''); ?></textarea>
							</div>
							
							<div class="twelve columns">
								<label for="tipoRespuesta">Información adicional</label>
								<textarea id="infoAdicional_infoAdicionalFuenteDocumental" name="tipoFuenteDocumental_infoAdicional" ><?=(isset($datosCaso['tipoFuenteDocumental'][$id]['infoAdicional']) ? $datosCaso['tipoFuenteDocumental'][$id]['infoAdicional'] : ''); ?></textarea>
							</div>
							<div class="six columns">
								<label for="tipoFuente">Tipo de la fuente</label>
								<select id="tipoFuenteDocumentalCatalogo_tipoFuenteCatalogo_tipoFuenteId" name="tipoFuenteDocumental_tipoFuenteCatalogo_tipoFuenteId">
									 <option></option>							
									 <?php if(isset($datosCaso['tipoFuenteDocumental'][$id]['tipoFuenteCatalogo_tipoFuenteId'])){
				                                foreach($catalogos['tipoFuenteCatalogo'] as $key => $item): ?> <!--muestra los estados civiles-->
				                                    <option onclick="notasCatalogos('<?=$item['notas']; ?>','tipoFuenteDocumentalCatalogo','2')" value="<?=$item['tipoFuenteId']?>" <?=($datosCaso['tipoFuenteDocumental'][$id]['tipoFuenteCatalogo_tipoFuenteId'] == $item['tipoFuenteId']) ? 'selected="selected"' : '' ; ?> > <?=$item['descripcion']?></option>
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
											<?php if(isset($datosCaso['tipoFuenteDocumental'][$id]['nivelConfiabilidadCatalogo_nivelConfiabilidadId'])){
						                                foreach($catalogos['nivelConfiabilidadCatalogo'] as $key => $item): ?> <!--muestra los estados civiles-->
						                                    <option onclick="notasCatalogos('<?=$item['notas']; ?>','nivelConfiabilidadCatalogo','2')" value="<?=$item['nivelConfiabilidadId']?>" <?=($datosCaso['tipoFuenteDocumental'][$id]['nivelConfiabilidadCatalogo_nivelConfiabilidadId'] == $item['nivelConfiabilidadId']) ? 'selected="selected"' : '' ; ?> > <?=$item['descripcion']?></option>
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
				                <input type="text"  id="fechaPubli" name="tipoFuenteDocumental_fecha" <?=(isset($datosCaso['tipoFuenteDocumental'][$id]['fecha']) ? 'value="'.$datosCaso['tipoFuenteDocumental'][$id]['fecha'].'"' : 'value=""'); ?> placeholder="AAAA-MM-DD" />
							</div>
							<div class="six columns espacioSuperior">
								<label for="FechaAcce">Fecha de acceso</label>
								<input type="text" id="fechaAcceso" name="tipoFuenteDocumental_fechaAcceso" <?=(isset($datosCaso['tipoFuenteDocumental'][$id]['fechaAcceso']) ? 'value="'.$datosCaso['tipoFuenteDocumental'][$id]['fechaAcceso'].'"' : 'value=""'); ?> placeholder="AAAA-MM-DD" />	
							</div>	
									
							<div  class="twelve columns">	
								<label for="fuenteLiga">Liga</label>
								<textarea id="infoAdicional_url"  name="tipoFuenteDocumental_url" ><?=(isset($datosCaso['tipoFuenteDocumental'][$id]['url']) ? $datosCaso['tipoFuenteDocumental'][$id]['url'] : ''); ?></textarea>
							</div>		
								
							
							<div class="twelve columns">
								<label for="comentFuente">Comentarios</label>
								<textarea id="infoAdicional_comentarios" name="infoAdicional_comentarios"><?=(isset($datosCaso['tipoFuenteDocumental'][$id]['comentarios']) ? $datosCaso['tipoFuenteDocumental'][$id]['comentarios'] : ''); ?></textarea>
							</div>
							
							
							<div class="twelve columns">
								<label for="comentFuente">Observaciones</label>
								<textarea id="infoAdicional_observaciones"  name="infoAdicional_observaciones" ><?=(isset($datosCaso['tipoFuenteDocumental'][$id]['observaciones']) ? $datosCaso['tipoFuenteDocumental'][$id]['observaciones'] : ''); ?></textarea>
							</div>
							
							
							<div class="twelve columns">
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

