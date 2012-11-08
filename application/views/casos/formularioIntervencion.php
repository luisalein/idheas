<!-------------------Comienza la parte de detalles del lugar------------------------------------>
<html>

	<head>
	<?=$head?>
	</head>
	
<body>
		
	<!-----------------Comienza la parte de Intervención---------------------------->
	<form action='<?=base_url(); ?>index.php/casosVentanas_c/guardarDatosVentanas/4' method="post" accept-charset="utf-8">

		<div id="pestania" data-collapse>
			<h2 class="open twelve columns">Intervención</h2><!--título de la sub-pestaña-->  
			<div>
				
					
				<br /><br />		
					<fieldset>
						<input type="hidden" value="<?=$casoId; ?>" name="lugares_casos_casoId" id="lugares_casos_casoId" />
						  <legend>Información general</legend>
							
							<div class="six columns">
								<p>
									<label for="tipoIntervencion">Tipo de intervención</label>
									<select id="tipoIntervencion" name="intervenciones_tipoIntervencionId">
									<?php foreach($lugares['paisesCatalogo'] as $key => $item):?> 
									<option value="<?=$item['paisId']; ?>"><?=$item['nombre']; ?></option>
									<?php endforeach;?>
									</select>
								</p>
								</div>
							
							<div class="six columns">	
								<p>
									<label for="fecha">Fecha: </label>
									<input type="text" id="datepickerIntervencion"name="intervenciones_fecha" <?= (isset($intervenciones['fecha'])) ? 'value="'.$intervenciones['fecha'].'"' : "" ;?> placeholder="AAAA-MM-DD" />

								</p>
							</div>
								<div class="twelve columns">
									<label for="tipoIntervencion">Impacto</label>									
									<textarea id="intervenciones_impacto" style="width: 400px; height: 200px" name="intervenciones_impacto" value="" wrap="hard"  ><?= (isset($intervenciones['impacto'])) ? $intervenciones['impacto'] : ' ' ;?> </textarea>
								</div>

								<div class="twelve columns">
									<label for="tipoRespuesta">En respuesta</label>
									<textarea id="intervenciones_respuesta" style="width: 400px; height: 200px" name="intervenciones_respuesta" value="" wrap="hard"  > <?= (isset($intervenciones['respuesta'])) ? $intervenciones['respuesta'] : ' ' ;?> </textarea>
								</div>
							<?php echo br(2);?>	

					</fieldset>
					
								<?php echo br(1);?>	
							<div class="twelve columns">
								<div class="six columns">
									
									<fieldset>
										  <legend>Interventor </legend>
											<label for="Interventor">Persona</label>
												<input type="button" class="tiny button"  value="Seleccionar actor" onclick="" />
												<input type="button" class="tiny button"  value="Eliminar actor" onclick="" />
										
											<div id="subpestanias" data-collapse>
												<h2 class="twelve columns">Actor colectivo</h2><!--título de la sub-pestaña-->  
												<div>

													<input type="button" class="tiny button"  value="Seleccionar actor" onclick="" />
													<input type="button" class="tiny button"  value="Eliminar actor" onclick="" />
													<div><b>Tipo de relación</b></div>
												</div>	
											</div>	
											
									</fieldset>

								</div>
								
								<?php echo br(2);?>	

								<div class="six columns">
									<fieldset>
										  <legend>Receptor </legend>
											<label for="receptor">Persona</label>
												<div  id="listaActoresreceptor" class="casosScorll">
												</div>
														
											<div id="subpestanias" data-collapse>
												<h2 class="twelve columns">Actor colectivo</h2><!--título de la sub-pestaña-->  
												<div>
													<div><b>Tipo de relación</b></div>
												</div>
											</div>	
									</fieldset>
								</div>
								<?php echo br(2);?>	
							</div>
					
					
					
					<div id="subPestanias" data-collapse>
						<h2 class="twelve columns">Personas por las que se interviene</h2>
							<div >
								  <span>Agregar</span>
				  
									<div  id="listaActorpersonasinterviene" class="casosScorll">
									</div>
							</div>	  
					</div><!--fin acordeon descripción-->
			
					<input class="medium button" type="submit" value="Guardar"/>		
			</div>
			
		</div><!--fin acordeon información general-->
	</form>
	<!-----------------------Termina la parte de Intervención---------------------->

</body>
</html>
