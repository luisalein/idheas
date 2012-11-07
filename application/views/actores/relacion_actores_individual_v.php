<!---Comienza la parte de detalles del lugar-->
<html>
<head>
    <?=$head; ?>
</head>
<body>

	<form action="<?php print_r($action)?>" method="post" accept-charset="utf-8">
	<input type="hidden" name="actores_actorId" value="<?=$actorId;?>" />	

	<input type="hidden"  id="tipoRelacionIndividualColectivoId" name="tipoRelacionIndividualColectivoId" value="1"/>

	<input type="hidden"  id="relacionActores_tipoRelacionInd" name="relacionActoresId" <?= (isset($relaciones['relacionActoresId'])) ? 'value="'.$relaciones['relacionActoresId'].'"' : '' ;?> />

	<input type="hidden"  id="nameSeleccionado"  value="actorRelacionadoId"><!--Este campo me da el name al que hay modificar el value al agregar acto(SIRVE PARA AGREGAR ACTOR)-->

	<input type="hidden"  id="ValoresBotonCancelar"   value="<?= (isset($relaciones['actorRelacionadoId'])&&($relaciones['actorRelacionadoId']!=0)) ? $relaciones['actorRelacionadoId']."*".$catalogos['listaTodosActores'][$relaciones['actorRelacionadoId']]['nombre']." ".$catalogos['listaTodosActores'][$relaciones['actorRelacionadoId']]['apellidosSiglas']."*".$catalogos['listaTodosActores'][$relaciones['actorRelacionadoId']]['foto'] : "" ;  ?>"><!--Este campo da los valores en caso de que se cancele la ventana agregar actor-->
	
	<input type="hidden"  id="actorRelacionadoId" name="actorRelacionadoId" value="<?= (isset($relaciones['actorRelacionadoId'])) ? $relaciones['actorRelacionadoId'] : '' ;?>"/>

	<div class="twelve columns">
		<br/>
		<label for="TipoRel">Notas tipo de relación</label>
		<br />
		<div id="notasTipoDeRelacion" class="twelve columns"></div>
		<div id="tipoRelNotas" class="twelve columns"></div>
		<br />
		<label for="TipoRel">Tipo de relación</label>
			<?php 
			if($catalogos['listaTodosActores'][$actorId]['tipoActorId']<3){ ?>
				<select id="relacionActores" name="tipoRelacionId">
					<?php 
						if (isset($relaciones['tipoRelacionId'])) {?>
							<?php foreach($catalogos['relacionActoresCatalogo'] as $index => $item):?> 
								<?php if ($item['tipoDeRelacionId']==1){?>
									<option <?= ($item['tipoRelacionId']==$relaciones['tipoRelacionId']) ? 'selected="selected"' : "" ;?> onclick="notasCatalogos('<?php print_r($item['notas']);?>','notasTipoDeRelacion')" value="<?= $item['tipoRelacionId']; ?>"><?php print_r($item['nombre']); ?> </option>
								<?php }?>	
							<?php endforeach;?><!--Termina lista de los actores-->
							<?php } 
						else{?>
							<?php foreach($catalogos['relacionActoresCatalogo'] as $index => $item):?> 
								<?php if ($item['tipoDeRelacionId']==1){?>
									<option onclick="notasCatalogos('<?php print_r($item['notas']);?>','notasTipoDeRelacion')" value="<?php print_r($item['tipoRelacionId']); ?>"><?php print_r($item['nombre']); ?> </option>
								<?php }?>	
							<?php endforeach;}?><!--Termina lista de los actores-->
				</select>
			<?php }

			else{ ?>	
			<div class="caja">
					<ol>
						<li  onclick="desplegar('relacionEmpleo')" > Relaciones de empleo</li>
							<li>
								<ul id="relacionEmpleo" class="Escondido">
								<?php foreach($relacionActoresColectivo['relacionActoresCatalogo'] as  $item):?> 
									<?php if (($item['tipoDeRelacionId']==2)&&($item['nombre']=='Relaciones de afiliación')) {?>
										<li class="cambiarColorRelacion" id='<?=$item['tipoRelacionId']?>' onclick="tipoRelacion('<?=$item['tipoRelacionId']?>','<?=$item['notas']?>','<?=$item['Nivel2']?>')"> <?=$item['Nivel2']?>	 </li>
									<?php }?>
								<?php endforeach;?>
								</ul>
							</li>
						<li  onclick="desplegar('relacionAfiliacion')" > Relaciones de afiliación</li>
							<li>
								<ul id="relacionAfiliacion" class="Escondido" >
								<?php foreach($relacionActoresColectivo['relacionActoresCatalogo'] as  $item):?> 
									<?php if (($item['tipoDeRelacionId']==2)&&($item['nombre']=='Relaciones de empleo')) {?>
										<li  class="cambiarColorRelacion" id='<?=$item['tipoRelacionId']?>' onclick="tipoRelacion('<?=$item['tipoRelacionId']?>','<?=$item['notas']?>','<?=$item['Nivel2']?>')"> <?=$item['Nivel2']?>	 </li>
									<?php }?>
								<?php endforeach;?>
								</ul>
							</li>
					</ol>
			</div>
			<?php }?>
	<br/><br/>
	</div>

	<br /><br />
	<label for="PerRelacionada">Persona Relacionada</label><br />
	<div id="vistaActorRelacionado"  >
	<?php if (isset($relaciones['actorRelacionadoId'])) {?> 
	<?php if ($relaciones['actorRelacionadoId']!=0) {?> 
		<img class="three columns"  src="<?php print_r(base_url().$catalogos['listaTodosActores'][$relaciones['actorRelacionadoId']]['foto']) ?>" >
		<h4><b><?php print_r($catalogos['listaTodosActores'][$relaciones['actorRelacionadoId']]['nombre']." ".$catalogos['listaTodosActores'][$relaciones['actorRelacionadoId']]['apellidosSiglas']) ?></h4></b>
	<?php }}?>
	</div>
		<input type="button" class="small button" onclick="seleccionarActorIndividual()" value="Agregar actor">
		<input type="button" class="small button" value="Eliminar actor">
	<br/>

	<div class="twelve columns">

		<div class="six columns" >
	<br/>
		<label for="edad">Fecha inicial</label>
			<select onclick="fechaInicialCasosRP(value)" >
								<option></option>
						<option  value="1" >fecha exacta</option>
						<option  value="2">fecha aproximada</option>
						<option  value="3">Se desconce el día</option>
						<option  value="4">Se desconce el día y el mes</option>
			</select>
			</div>
			<div class="six columns">
				<br/>
						<p class='<?=(isset($relaciones['fechaInicial']) ? ' ' : 'Escondido'); ?>' id="fechaExactaVRP">
							<input type="text" id="fechaExactaRP"<?=(isset($relaciones) ? 'value="'.$relaciones['fechaInicial'].'"' : ''); ?> placeholder="AAAA-MM-DD" />

						</p>

						<p class="Escondido" id="fechaAproxVRP">
							<input type="text" id="fechaAproxRP"  placeholder="AAAA-MM-DD" />

						</p>

						<p class="Escondido" id="fechaSinDiaVRP">
							<input type="text" id="fechaSinDiaRP" placeholder="AAAA-MM-00" />

						</p >

						<p class="Escondido" id="fechaSinDiaSinMesVRP">
							<input type="text" id="fechaSinDiaSinMesRP" placeholder="AAAA-00-00" />

						</p>
			</div>
	</div>



	<div class="twelve columns" >
	<label for="Termonio">Fecha término</label>
				<div class="six columns">
					<select onclick="fechaTerminalCasosRP(value)" >
								<option></option>
								<option  value="1">fecha exacta</option>
								<option  value="2">fecha aproximada</option>
								<option  value="3">Se desconce el día</option>
								<option  value="4">Se desconce el día y el mes</option>
					</select>
				</div>
				
				<div class="six columns">
					<p class='<?=(isset($relaciones['fechaTermino']) ? ' ' : 'Escondido'); ?>' id="fechaExactaV2RP">
						<input type="text" id="fechaExacta2RP" <?=(isset($relaciones) ? 'value="'.$relaciones['fechaTermino'].'"' : ''); ?> placeholder="AAAA-MM-DD" />

					</p>

					<p class="Escondido" id="fechaAproxV2RP">
						<input type="text" id="fechaAprox2RP" placeholder="AAAA-MM-DD" />

					</p>

					<p class="Escondido" id="fechaSinDiaV2RP">
						<input type="text" id="fechaSinDia2RP" placeholder="AAAA-MM-00" />

					</p >

					<p class="Escondido" id="fechaSinDiaSinMesV2RP">
						<input type="text" id="fechaSinDiaSinMes2RP" placeholder="AAAA-00-00" />

					</p>
				</div>
	</div> <!---termina opciones de fechaTermino-->

	<br /><br />
	<div  id="pestania" data-collapse>
		<h2 class="open">Comentarios</h2>
		<div class="twelve columns">
			<textarea placeholder="Agregar un comentario" rows="10"   cols="100" id="TextoRelActoresIndividual" value="" style="width: 400px; height: 200px" wrap="hard"  name="comentarios"> <?=(isset($relaciones['comentarios']) ? $relaciones['comentarios'] : ''); ?></textarea>
		</div>	  

	</div>	
	<input class="medium button" type="submit" value="Guardar" />
	<input class="medium button" type="button" value="Cancelar"  onclick="cerrarVentana()"/>

	</form>		
</body>
</html>