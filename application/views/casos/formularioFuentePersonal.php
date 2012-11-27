<!DOCTYPE >
<html>
	<head>
		<?=$head?>
	</head>
	
	<body>
		
		<form method="post"  action='<?=base_url(); ?>index.php/casosVentanas_c/guardarDatosVentanas/5' accept-charset="utf-8">
			<fieldset>
				<legend>Fuente de información personal</legend>
					<input type="radio"  value="" name="" id=""/>Persona
					<input type="radio"  value="" name="" id=""/>Actor colectivo
					<b>Persona:</b> <br />
												
					
					<div id="pestania" data-collapse >
						<h2 class="open">Actor colectivo</h2><!--título de la sub-pestaña-->  
							<div >
							  
							</div>
					</div>					
			</fieldset>
			<fieldset>
			<div class="twelve columns espacioSuperior">
				<div class="twelve columns" >
					<div class="six columns" >
						<label>Tipo de fuente</label>
						<select >
							<option> </option>
						</select>
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
						<label>Idioma</label>			
						<select>
							<option> </option>
						</select>
					</div>
					<div class="six columns">
						<label>Nivel de confiabilidad</label>			
						<select>
							<option> </option>
						</select>
					</div>
				</div>
				
				<div class="twelve columns espacioSuperior">
					<label>Observaciones</label>
					<textarea id="" wrap="hard"  name="" > </textarea>
				</div>
				<div class="twelve columns">
					<label>Comentarios</label>
					<textarea id="" wrap="hard"  name="" > </textarea>
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
