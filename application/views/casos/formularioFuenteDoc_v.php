<html>
	<head>
	<?=$head?>	
	</head>
	<body>

<form action='<?=base_url(); ?>index.php/casosVentanas_c/guardarDatosVentanas/5' method="post" accept-charset="utf-8">
		<!-----------------Comienza la parte de Fuente documental------------------------>
		<div id="formularioFuenteDocumental" class="twelve columns">
			<div id="pestania" data-collapse>
			<h2 class="open">Fuente documental</h2><!--título de la sub-pestaña-->  
			<div>
			
				<fieldset>
					  <legend>fuente documental</legend>
						<div class="twelve columns">
									<label for="nombreFuente">Nombre de la fuente</label>
									<textarea id="infoAdicional_nombreFuente" style="width: 400px; height: 200px" name="tipoFuenteDocumental_nombre" wrap="hard"  > </textarea>
									<label for="tipoRespuesta">Información adicional</label>
									<textarea id="infoAdicional_infoAdicionalFuenteDocumental" style="width: 400px; height: 200px" name="tipoFuenteDocumental_infoAdicional" wrap="hard"  > </textarea>

									<label for="tipoFuente">Tipo de la fuente</label>

									<div class="six columns">
												<label for="idioma">Idioma</label>
												<select id="tipoFuenteDocumental_idiomaCatalogo_idiomaId" name="tipoFuenteDocumental_idiomaCatalogo_idiomaId">						
												<?php foreach($pais as $key => $item):?> 
														<option value="<?=$item?>"><?=$key?></option>
												<?php endforeach;?>
												</select>
									</div>
									<div class="six columns">
												<label for="nivConfiabilidad">Nivel de confiabilidad</label>
												<select id="tipoFuenteDocumental_nivelConfiabilidadCatalogo_nivelConfiabilidadId" name="infoAdicional_nivelConfiabilidadCatalogo_nivelConfiabilidadId">						
												<?php foreach($pais as $key => $item):?> 
														<option value="<?=$item?>"><?=$key?></option>
												<?php endforeach;?>
												</select>
									</div>

									<label for="FechaPubli">Fecha de publicación</label>
										<input type="text" id="infoAdicional_fechaPublicacion" name="tipoFuenteDocumental_fecha" value="" placeholder="AAAA-MM-DD" />
									
									<span>Notas</span>
									
									<label for="fuenteLiga">Liga</label>
									<textarea id="infoAdicional_url" style="width: 400px; height: 200px" name="tipoFuenteDocumental_url" wrap="hard"  > </textarea>
									<label for="FechaPubli">Fecha de acceso</label>
										<input type="text" id="infoAdicional_fechaAcceso" name="tipoFuenteDocumental_fechaAcceso" value="" placeholder="AAAA-MM-DD" />
									
								</p>
								
							
							<div class="twelve columns">
										<label for="comentFuente">Comentarios</label>
										<textarea id="infoAdicional_comentarios" style="width: 400px; height: 200px" name="infoAdicional_comentarios" wrap="hard"  > </textarea>
							
							</div>
							
							
							<div class="twelve columns">
										<label for="comentFuente">Observaciones</label>
										<textarea id="infoAdicional_observaciones" style="width: 400px; height: 200px" name="infoAdicional_observaciones" wrap="hard"  > </textarea>
							
							</div>
							
					
						
						</div>

						</div>										
										
				</fieldset>
			</div>

			</div>
			
		<input class="medium button" type="submit" />		
		</div>
		<!-----------------termina la parte de Fuente documental------------------------>

	</form>
	</body>
</html>

