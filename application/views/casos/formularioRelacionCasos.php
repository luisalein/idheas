<!DOCTYPE >
<html>
	<head>
		<?=$head?>
	</head>
	<body>
		<form method="post" name="formRelacionCasos"  action='<?=base_url(); ?>index.php/casosVentanas_c/guardarDatosVentanas/7' accept-charset="utf-8">
			<div style="padding: 20px;">
				<input type="hidden" name="editar" value="<?=(isset($datosCaso['relacionCasos'][$id]))? '1' : '0'?>"/>
				<input type="hidden" name="relacionCasos_casos_casoId" value="<?=$datosCaso['casos']['casoId']?>"/>
				<input type="hidden" name="relacionCasos_relacionId" value="<?=(isset($datosCaso['relacionCasos'][$id]['relacionId']))? $datosCaso['relacionCasos'][$id]['relacionId'] : '0'?>"/>
				<b>Nombre del caso actual</b><br />
					<label> <?=$datosCaso['casos']['nombre'];?></label>
				<br />
				<b>Tipo de relación</b><br />
				<select name="relacionCasos_tipoRelacionId" class="nine columns" required>
					<option></option>
					<?php foreach($catalogos['relacionCasosCatalogo'] as $relacion){
						if(isset($datosCaso['relacionCasos'][$id]) && $datosCaso['relacionCasos'][$id]['tipoRelacionId'] == $relacion['relacionCasosId']){
							echo '<option selected="selected" value="'.$relacion['relacionCasosId'].'">'.$relacion['descripcion'].'</option>';
						}else{
							echo '<option value="'.$relacion['relacionCasosId'].'">'.$relacion['descripcion'].'</option>';
						}
					}?>
				</select>
				<?=br(3);?>
				<table class="nine columns" >
					<tr>
						<th><b>Nombre del caso</b></th>
						<th><b>Fecha inicial</b></th>
						<th><b>Fecha de término</b></th>
					</tr>
					<tr  id="datosCasoRelacionado" >
						<?php if(isset($datosCaso['relacionCasos'][$id])):?>
							<td><?=$datosCaso['relacionCasos'][$id]['nombreCasoIdB']?></td>
							<td><?=$datosCaso['relacionCasos'][$id]['fechaIncial']?></td>
							<td><?=$datosCaso['relacionCasos'][$id]['fechaTermino']?></td>
							<input type="hidden" name="relacionCasos_casoIdB" value="<?=$datosCaso['relacionCasos'][$id]['relacionId']?>"/>
						<?php endif;?>	
					</tr>
					
				</table>		
				
				<input type="hidden" value="<?=(isset($datosCaso['relacionCasos'][$id]['nombreCasoIdB'])? '1' : '0')?>" id="casoSeleccionado_seleccionado" name="casoSeleccionado_seleccionado"/>
				<?=br(2);?>
				<input type="button" class="small button" value="Seleccionar Caso" onclick="mostrarCasos()" style="margin-left: 20px;"/>
				<?=br(3);?>
				<label for="comentFichas">Comentarios</label>
				<textarea id="relacionCasos_Comentarios" style="width: 550px; height: 200px" name="relacionCasos_Comentarios" wrap="hard"  ><?=(isset($datosCaso['relacionCasos'][$id]['comentarios']))? $datosCaso['relacionCasos'][$id]['comentarios'] : ''?></textarea>
						
				<label for="comentFichas">Observaciones</label>
				<textarea id="relacionCasos_Observaciones" style="width: 550px; height: 200px" name="relacionCasos_Observaciones" wrap="hard"  ><?=(isset($datosCaso['relacionCasos'][$id]['comentarios']))? $datosCaso['relacionCasos'][$id]['observaciones'] : ''?></textarea>
				
				<input style="padding: 7px 11px 8px 11px;" class="small button" type="submit" value="Guardar"/>
				<input class="small button" type="button" value="Cancelar" onclick="cerrarVentana()" />
			</div>
		</form>
	</body>
</html>