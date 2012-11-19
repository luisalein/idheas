<!-------------------Comienza la parte de detalles del lugar-------------------------------------->
<html>
	<head>
    	<?=$head; ?>
	</head>

	<body>
			<input type="hidden" id="tipoActorAE"  name="3"/>
	<form action="<?=$action?>" method="post" accept-charset="utf-8">
			<input type="hidden"  name="actores_actorId" value='<?=$actorId;?>' />	

			<input type="hidden"  id="tipoRelacionIndividualColectivoId" name="tipoRelacionIndividualColectivoId" value="2"/>

			<input type="hidden"  id="nameSeleccionado"  value="actorRelacionadoId"> <!--Este campo me da el name al que hay modificar el value al agregar acto(SIRVE PARA AGREGAR ACTOR)-->

			<input type="hidden"  id="ValoresBotonCancelar"   value="<?= (isset($relaciones['actorRelacionadoId'])&&($relaciones['actorRelacionadoId']!=0)) ? $relaciones['actorRelacionadoId']."*".$catalogos['listaTodosActores'][$relaciones['actorRelacionadoId']]['nombre']." ".$catalogos['listaTodosActores'][$relaciones['actorRelacionadoId']]['apellidosSiglas']."*".$catalogos['listaTodosActores'][$relaciones['actorRelacionadoId']]['foto'] : "" ;  ?>"><!--Este campo da los valores en caso de que se cancele la ventana agregar actor-->

			<input type="hidden"  id="tipoRelacionId" name="tipoRelacionId" value="<?= (isset($relaciones['tipoRelacionId']) ) ? $relaciones['tipoRelacionId'] : "" ;?>"/>

			<input type="hidden"  id="actorRelacionadoId" name="actorRelacionadoId" value="<?= (isset($relaciones['actorRelacionadoId']) ) ? $relaciones['actorRelacionadoId'] : "" ;?>"/>

			<input type="hidden"  id="relacionActores_tipoRelacionInd" name="relacionActoresId" <?= (isset($relaciones['relacionActoresId'])) ? 'value="'.$relaciones['relacionActoresId'].'"' : '' ;?> />

			<br />
	
			<label>Persona</label>

			<div class="twelve columns">
			<img class="foto" src="<?=base_url().$listaTodosActores[$actorId]['foto']?>" />
			<br /><br />
			<?=$listaTodosActores[$actorId]['nombre']." ".$listaTodosActores[$actorId]['apellidosSiglas']?>
			</div>

			<br />
			<div id="tipoRelTexto"> </div>
			
			<br/>
			<div id="tipoRelNotas"> </div>
			
			<br/><br/>

		<label for="TipoRel">Tipo de relación</label>
		<!--Estos datos solo apareceran para su actualización-->
			<?php if (isset($relaciones['tipoRelacionId'])) {?>
				<div id="relacionActual"> <br />
					Relación Actual<br />
					<?php if ($listaTodosActores[$actorId]['tipoActorId']<3) {?>
						<?php print_r($relacionActoresColectivo['relacionActoresCatalogo'][$relaciones['tipoRelacionId']]['Nivel2'])?>
						<label>notas</label>
						<?php print_r($relacionActoresColectivo['relacionActoresCatalogo'][$relaciones['tipoRelacionId']]['notas'])?>
					<?php } else{?>
						<?php print_r($relacionActoresColectivo['relacionActoresCatalogo'][$relaciones['tipoRelacionId']]['nombre'])?>
						<label>notas</label>
						<?php print_r($relacionActoresColectivo['relacionActoresCatalogo'][$relaciones['tipoRelacionId']]['notas'])?>
					<?php }?>
					<br />
					<br />
					<br />
				</div>
			<?php }?>

			<div class="caja">
				<?php if ($listaTodosActores[$actorId]['tipoActorId']<3) {?>

					<?php if(isset($relacionActoresColectivo)){ ?>
						<ol>
							<li  onclick="desplegar('relacionEmpleo')" > Relaciones de empleo >> </li>
								<li>
									<ul id="relacionEmpleo" class="Escondido">
									<?php foreach($relacionActoresColectivo['relacionActoresCatalogo'] as  $item):?> 
										<?php if (($item['tipoDeRelacionId']==2)&&($item['nombre']=='Relaciones de empleo')) {?>
											<li class="cambiarColorRelacion" id='<?=$item['tipoRelacionId']?>' onclick="tipoRelacion('<?=$item['tipoRelacionId']?>','<?=$item['notas']?>','<?=$item['Nivel2']?>')"> <?=$item['Nivel2']?>	 </li>
										<?php }?>
									<?php endforeach;?>
									</ul>
								</li>
							<li  onclick="desplegar('relacionAfiliacion')" > Relaciones de afiliación</li>
								<li>
									<ul id="relacionAfiliacion" class="Escondido" >
									<?php foreach($relacionActoresColectivo['relacionActoresCatalogo'] as  $item):?> 
										<?php if (($item['tipoDeRelacionId']==2)&&($item['nombre']=='Relaciones de afiliación')) {?>
											<li  class="cambiarColorRelacion" id='<?=$item['tipoRelacionId']?>' onclick="tipoRelacion('<?=$item['tipoRelacionId']?>','<?=$item['notas']?>','<?=$item['Nivel2']?>')"> <?=$item['Nivel2']?>	 </li>
										<?php }?>
									<?php endforeach;?>
									</ul>
								</li>
						</ol>
					<?php } ?>

				<?php } else {?>
						<ul id="relacionAfiliacion" >
						<?php foreach($relacionActoresColectivo['relacionActoresCatalogo'] as  $item):?> 
							<?php if ($item['tipoDeRelacionId']==3) {?>
								<li  class="cambiarColorRelacion" id='<?=$item['tipoRelacionId']?>' onclick="tipoRelacion('<?=$item['tipoRelacionId']?>','<?=$item['notas']?>','<?=$item['nombre']?>')"> <?=$item['nombre']?>	 </li>
							<?php }?>
						<?php endforeach;?>
						</ul>
				<?php }
				 ?>

			</div>
			
			
	<label>Actores colectivos</label>
	
	<div id="vistaActorRelacionado">
	<?php if (isset($relaciones['actorRelacionadoId'])) {?> 
	<?php if ($relaciones['actorRelacionadoId']!=0) {?> 
		<img class="four columns"  src="<?php print_r(base_url().$catalogos['listaTodosActores'][$relaciones['actorRelacionadoId']]['foto']) ?>" / >
		<h4><b><?php print_r($catalogos['listaTodosActores'][$relaciones['actorRelacionadoId']]['nombre']." ".$catalogos['listaTodosActores'][$relaciones['actorRelacionadoId']]['apellidosSiglas']) ?></h4></b>
	<?php }}?>
	</div>
		<input type="button" class="small button" onclick="seleccionarActorColectivo()" value="Agregar actor">
		<input type="button" class="small button" value="Eliminar actor">
	<br/>

			<br/><br/>
			
			
			<div class="twelve columns">
				<div class="six columns">
				<label for="edad">Fecha inicial</label>
					<select onclick="fechaInicialCasosRIC(value)" >
						<option></option>
								<option  value="1" checked="checked" >fecha exacta</option>
								<option  value="2">fecha aproximada</option>
								<option  value="3">Se desconce el día</option>
								<option  value="4">Se desconce el día y el mes</option>
					</select>
				</div>
				
				<div class="six columns">
					<p class='<?=(isset($relaciones['fechaInicial']) ? ' ' : 'Escondido'); ?>' id="fechaExactaVRIC">
						<input type="text" id="fechaExactaRP" <?=(isset($relaciones) ? 'value="'.$relaciones['fechaInicial'].'"' : ''); ?> placeholder="AAAA-MM-DD" />

					</p>

					<p class="Escondido" id="fechaAproxVRIC">
						<input type="text" id="fechaAproxRIC" placeholder="AAAA-MM-DD" />

					</p>

					<p class="Escondido" id="fechaSinDiaVRIC">
						<input type="text" id="fechaSinDiaRIC"  placeholder="AAAA-MM-00" />

					</p >

					<p class="Escondido" id="fechaSinDiaSinMesVRIC">
						<input type="text" id="fechaSinDiaSinMesRIC"  placeholder="AAAA-00-00" />

					</p>
				</div>
		</div> <!---termina opciones de fechaInicial-->
				
				
			<div class="twelve columns">
					<label for="Termonio">Fecha término</label>
				<div class="six columns">
					<select onclick="fechaTerminalCasosRIC(value)" >
						<option></option>
						<option  value="1" checked="checked" >fecha exacta</option>
						<option  value="2">fecha aproximada</option>
						<option  value="3">Se desconce el día</option>
						<option  value="4">Se desconce el día y el mes</option>
					</select>
				</div>
				
				<div class="six columns">
					<p class='<?=(isset($relaciones['fechaTermino']) ? ' ' : 'Escondido'); ?>' id="fechaExactaV2RIC">
						<input type="text" id="fechaExacta2RIC"  <?=(isset($relaciones) ? 'value="'.$relaciones['fechaTermino'].'"' : ''); ?> placeholder="AAAA-MM-DD" />

					</p>

					<p class="Escondido" id="fechaAproxV2RIC">
						<input type="text" id="fechaAprox2RIC" placeholder="AAAA-MM-DD" />

					</p>

					<p class="Escondido" id="fechaSinDiaV2RIC">
						<input type="text" id="fechaSinDia2RIC"  placeholder="AAAA-MM-00" />

					</p >

					<p class="Escondido" id="fechaSinDiaSinMesV2RIC">
						<input type="text" id="fechaSinDiaSinMes2RIC" placeholder="AAAA-00-00" />

					</p>
				</div>
			</div> <!---termina opciones de fechaTermino-->
			
			<br /><br />
			<div  id="pestania" data-collapse>
				<h2 class="open">Comentarios</h2>

				<div class="twelve columns">

					<textarea rows="10" cols="100"  id="TextoRelActoresColectivo" style="width: 400px; height: 200px" wrap="hard"  name="comentarios"><?=(isset($relaciones) ? $relaciones['comentarios'] : ''); ?></textarea>
			   </div>	  

			</div>
			
			
		<input class="medium button" type="submit" value="Guardar" />
		<input class="medium button" type="button" value="Cancelar"  onclick="cerrarVentana()"/>
			
		</form>		
		
	</body>
</html>
