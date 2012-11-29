<!DOCTYPE >
<html>
	<head>
		<?=$head?>
	</head>
	<body>
		<form method="post" name="formRelacionCasos"  action='<?=base_url(); ?>index.php/casosVentanas_c/guardarDatosVentanas/7' accept-charset="utf-8">
			<div style="padding: 20px;">
				<input type="hidden" name="relacionCasos_casos_casoId" value="<?=$datosCaso['casos']['casoId']?>"/>
				<b>Nombre del caso actual</b><br />
					<label> <?=$datosCaso['casos']['nombre'];?></label>
				<br />
				<b>Tipo de relación</b><br />
				<select name="relacionCasos_tipoRelacionId" class="nine columns">
					<option></option>
					<?php foreach($catalogos['relacionCasosCatalogo'] as $relacion){
						echo '<option value="'.$relacion['relacionCasosId'].'">'.$relacion['descripcion'].'</option>';
					}?>
				</select>
				<?=br(3);?>
				<table class="nine columns" >
					<tr>
						<th><b>Nombre del caso</b></th>
						<th><b>Fecha inicial</b></th>
						<th><b>Fecha de término</b></th>
					</tr>
					<tr  id="datosCasoRelacionado">
						
					</tr>
				</table>		
				<?=br(2);?>
				<input type="button" value="Seleccionar Caso" onclick="mostrarCasos()" style="margin-left: 20px;"/>
				<?=br(3);?>
				<label for="comentFichas">Comentarios</label>
				<textarea id="fichas_Comentarios" style="width: 550px; height: 200px" name="fichas_Comentarios" wrap="hard"  > </textarea>
						
				<label for="comentFichas">Observaciones</label>
				<textarea id="fichas_Comentarios" style="width: 550px; height: 200px" name="fichas_Comentarios" wrap="hard"  > </textarea>
				
				<input class="medium button" type="submit" value="Guardar"/>
				<input class="medium button" value="Cancelar" onclick="cerrarVentana()" />
			</div>
		</form>
	</body>
</html>