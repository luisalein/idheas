<html>
	<head>
	<?=$head?>	
	</head>
	<body>
	<pre>
	<?=print_r($datosCaso) ?>
	</pre>
<form action='<?=base_url(); ?>index.php/casosVentanas_c/guardarDatosVentanas/5' method="post" accept-charset="utf-8">
	<!--<input type="hidden" id="editar"  name="editar" value="<?= (isset($datos)) ? "1" : "0" ;?>"/>-->
		<!-----------------Comienza la parte de Fuente documental------------------------>
		<div id="formularioFuenteDocumental" class="twelve columns">
			<div id="pestania" data-collapse>
			<h2 class="open">Fuente documental</h2><!--título de la sub-pestaña-->  
			<div>
			
				<fieldset>
					  <legend>Fuente documental</legend>
						<div class="twelve columns espacioSuperior">
									
							<label for="nombreFuente ">Nombre de la fuente</label>
							<textarea id="infoAdicional_nombreFuente" style="width: 100%; height: 20%" name="tipoFuenteDocumental_nombre" wrap="hard"> </textarea>
							
							<label for="tipoRespuesta">Información adicional</label>
							<textarea id="infoAdicional_infoAdicionalFuenteDocumental" style="width: 100%; height: 20%" name="tipoFuenteDocumental_infoAdicional" wrap="hard"  > </textarea>

							<div class="six columns">
								<label for="tipoFuente">Tipo de la fuente</label>
								<select id="tipoFuenteDocumentalCatalogo" name="tipoFuenteDocumental">						
									<?php foreach($catalogos['tipoFuenteCatalogo'] as $key => $item):?> <!--muestra los tipo de fuente-->
                                   		<option  value="<?=$item['tipoFuenteId']?>" > <?=$item['descripcion']?></option>
                                	<?php endforeach; ?>
								</select>
							</div>
							

							<div class="six columns">
										<label for="nivConfiabilidad">Nivel de confiabilidad</label>
										<select id="tipoFuenteDocumental_nivelConfiabilidadCatalogo_nivelConfiabilidadId" name="infoAdicional_nivelConfiabilidadCatalogo_nivelConfiabilidadId">						
										<?php foreach($catalogos['nivelConfiabilidadCatalogo'] as $key => $item):?> <!--muestra los niveles de confiabilidad-->
                                   			<option  value="<?=$item['nivelConfiabilidadId']?>" > <?=$item['descripcion']?></option>
                                		<?php endforeach; ?>
										</select>
										
							</div>
							
							
							<div class="six columns espacioSuperior">									
								<label for="FechaPubli">Fecha de publicación</label>
				                <input type="text"  id="fechaPubli" name="tipoFuenteDocumental_fecha" <?=(isset($datos) ? 'value="'.$datos.'"' : 'value=""'); ?> placeholder="AAAA-MM-DD" />
							</div>
							<div class="six columns espacioSuperior">
								<label for="FechaAcce">Fecha de acceso</label>
								<input type="text" id="fechaAcceso" name="tipoFuenteDocumental_fechaAcceso" value="" placeholder="AAAA-MM-DD" />	
							</div>	
									
							<div  class="twelve columns">	
								<label for="fuenteLiga">Liga</label>
								<textarea id="infoAdicional_url"  name="tipoFuenteDocumental_url" > </textarea>
							</div>		
								
							
							<div class="twelve columns">
										<label for="comentFuente">Comentarios</label>
										<textarea id="infoAdicional_comentarios" style="width: 100%; height: 200px" name="infoAdicional_comentarios" wrap="hard"  > </textarea>
							
							</div>
							
							
							<div class="twelve columns">
										<label for="comentFuente">Observaciones</label>
										<textarea id="infoAdicional_observaciones" style="width: 100%; height: 200px" name="infoAdicional_observaciones" wrap="hard"  > </textarea>
							
							</div>
							
							
							
							
							
					
						
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

