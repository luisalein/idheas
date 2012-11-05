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
			
			<label>Tipo de fuente</label>
			<select>
				<option> </option>
			</select>
			
			<label> Fecha</label>
			<select>
				<option> </option>
			</select>
			
			<label>Idioma</label>			
			<select>
				<option> </option>
			</select>
			
			<label>Nivel de confiabilidad</label>			
			<select>
				<option> </option>
			</select>
			
			<label>Observaciones</label>
			<textarea id="" wrap="hard" style="width: 400px; height: 200px" name="" > </textarea>
			
			<label>Comentarios</label>
			<textarea id="" wrap="hard" style="width: 400px; height: 200px" name="" > </textarea>
			
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
		</form>
	</body>
</html>
