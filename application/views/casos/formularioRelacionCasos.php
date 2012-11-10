<!DOCTYPE >
<html>
	<head>
		<?=$head?>
	</head>
	<body>
		<form method="post"  action='<?=base_url(); ?>index.php/casosVentanas_c/guardarDatosVentanas/7' accept-charset="utf-8">
		
			<b>Nombre del caso actual</b><br />
			
			<b>Tipo de relación</b><br />
			<select>
				<option></option>
			</select>
			
			<b>Nombre del caso</b><br />
			
			<b>Fecha inicial</b><br />
			
			<b>Fecha de término</b><br />
			
			<label for="comentFichas">Comentarios</label>
			<textarea id="fichas_Comentarios" style="width: 400px; height: 200px" name="fichas_Comentarios" wrap="hard"  > </textarea>
					
			<label for="comentFichas">Observaciones</label>
			<textarea id="fichas_Comentarios" style="width: 400px; height: 200px" name="fichas_Comentarios" wrap="hard"  > </textarea>
			
			<input class="medium button" type="submit" value="Guardar"/>
			<input class="medium button" value="Cancelar" onclick="cerrarVentana()" />
		</form>
	</body>
</html>