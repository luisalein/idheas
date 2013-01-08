<div id="pestania" data-collapse>
	<h2 class="open">Núcleo caso</h2><!--título de la sub-pestaña---->  
	<div>
	  	<div id="subPestanias" data-collapse>
	  		<h2 class="open">Derechos afectados y actos</h2>
	  		<div>
	  			<div>
	  				<table class="twelve columns">
			            <thead>
			              <tr>
			                <th>Derecho humano</th>
			                <th>Acto</th>
			                <th>Fecha inicio</th>
			                <th>Fecha término</th>
			                <th>Acción(es)</th>
			              </tr>
			            </thead>
			            <tbody>
  			              <?php if(isset($datosCaso['derechoAfectado'])){ ?>
			              <?php foreach ($datosCaso['derechoAfectado'] as $index => $derecho) {?>
			              <tr>
			              	<?php foreach ($catalogos['derechosAfectadosN'.$derecho['derechoAfectadoNivel'].'Catalogo'] as $catalogo) {
								  		if($catalogo['derechoAfectadoN'.$derecho['derechoAfectadoNivel'].'Id']==$derecho['derechoAfectadoId']){
										  	echo '<td>'.$catalogo['descripcion'].'</td>';
										  }
							  } ?>
							  
							 
						<?php if(isset($datosCaso['actos'])){?>	  	
			              <?php foreach ($datosCaso['actos'] as $index2 => $acto) {
			              	if ($acto['derechoAfectado_derechoAfectadoCasoId']== $derecho['derechoAfectadoCasoId']) { ?>
			              		<?php foreach ($catalogos['actosN'.$acto['actoViolatorioNivel'].'Catalogo'] as $catalogo) {
			              			if($acto['actoViolatorioNivel']==1){
			              				if($catalogo['actoId']==$acto['actoViolatorioId']){
										  	echo '<td>'.$catalogo['descripcion'].'</td>';
										  }
			              			}else{
			              				if($catalogo['actoN'.$acto['actoViolatorioNivel'].'Id']==$acto['actoViolatorioId']){
										  	echo '<td>'.$catalogo['descripcion'].'</td>';
										  }
			              			}
								  		
							  	} ?>
			              	<?} }?>

			              	<td><?=(isset($derecho['fechaInicial'])) ? $derecho['fechaInicial'] : " " ; ?></td>
			              	<td><?=(isset($derecho['fechaTermino'])) ? $derecho['fechaTermino'] : " " ; ?></td>
			                <td><input type="button" style="padding: 7px 19px 7px 19px"  class="small button"  value="Editar" onclick="ventanaDerAfectados('<?=$casoId; ?>', '<?=$index?>')" />
			                <input type="button" style="margin-top: 5px;" class="small button"  value="Eliminar" onclick="eliminarDerechoAfectado('<?= $derecho['derechoAfectadoCasoId']?>', '<?=$casoId; ?>')" /></td>
			              </tr><?php } }?><?php } ?>
			            </tbody>
			          </table>
			    <input type="button" class="small button <?=$clase?>"  value="Nuevo " onclick="ventanaDerAfectados('<?=$casoId; ?>',0)" />
	  			</div>
	  			  
	  		</div>

	  	</div><!--fin acordeon Derechos afectados y actos-->
	  	<div id="subPestanias" data-collapse>
	  		<h2 class="open">Intervenciones</h2>
	  		<div>
	  			<div>
	  				<table class="twelve columns">
			            <thead>
			              <tr>
			                <th>Receptor</th>
			                <th>Interventor</th>
			                <th>Tipo de intervención</th>
			                <th>Fecha</th>
			                <th>Acción(es)</th>
			              </tr>
			            </thead>
			            <tbody>
			              <?php if(isset($datosCaso['intervenciones'])){ ?>
			              <?php foreach ($datosCaso['intervenciones'] as $index => $inter) {?>
			              	 <tr>

			              <?php	if ($inter['casosActorReceptor']) {
				              		foreach ($inter['casosActorReceptor'] as $inter2) {
					              		if ($inter2['casos_casoId'] == $casoId) {
					              			$casoActorIdReceptor=$inter2['casoActorId'];
					              		}
					              		else{
					              			$casoActorIdReceptor=0;	
					              		}
					              	}
			              		}

			              		if ($inter['casosActorInterventor']) {
			              			foreach ($inter['casosActorInterventor'] as $inter2) {
					              		if ($inter2['casos_casoId'] == $casoId) {
					              			$casoActorIdInterventor=$inter2['casoActorId'];
					              		}
					              		else{
					              			$casoActorIdInterventor=0;	
					              		}
			              		}
			              	} ?>
			                <td><span id="descho_fichaId"><?=(isset($inter['receptorId']) && ($inter['receptorId']>0)) ? $catalogos['listaTodosActores'][$inter['receptorId']]['nombre']." ".$catalogos['listaTodosActores'][$inter['receptorId']]['apellidosSiglas'] : ''; ?><?=(isset($inter['tipoRelacionInterventor']) && ($inter['tipoRelacionInterventor']>0)) ? ' ('.$catalogos['relacionActoresCatalogo'][$catalogos['relacionesActoresCatalogo'][$inter['tipoRelacionInterventor']]['tipoRelacionId']]['Nivel2'].') '.$catalogos['listaTodosActores'][$catalogos['relacionesActoresCatalogo'][$inter['tipoRelacionInterventor']]['actorRelacionadoId']]['nombre']." ".$catalogos['listaTodosActores'][$catalogos['relacionesActoresCatalogo'][$inter['tipoRelacionInterventor']]['actorRelacionadoId']]['apellidosSiglas'] : ''; ?></span></td>
			                <td><span id="descho_fichaId"><?=(isset($inter['interventorId']) && ($inter['interventorId']>0)) ?  $catalogos['listaTodosActores'][$inter['interventorId']]['nombre']." ".$catalogos['listaTodosActores'][$inter['interventorId']]['apellidosSiglas'] : ''; ?><?=(isset($inter['tipoRelacionReceptor']) && ($inter['tipoRelacionReceptor']>0)) ? ' ('.$catalogos['relacionActoresCatalogo'][$catalogos['relacionesActoresCatalogo'][$inter['tipoRelacionReceptor']]['tipoRelacionId']]['Nivel2'].') '.$catalogos['listaTodosActores'][$catalogos['relacionesActoresCatalogo'][$inter['tipoRelacionReceptor']]['actorRelacionadoId']]['nombre']." ".$catalogos['listaTodosActores'][$catalogos['relacionesActoresCatalogo'][$inter['tipoRelacionReceptor']]['actorRelacionadoId']]['apellidosSiglas'] : ''; ?></span></td>
			                <td><span id="descho_fichaId"><?=(isset($inter['tipoIntervencionId']) && isset($inter['intervencionNId'])) ?  $catalogos['tipoIntervencionN'.$inter['intervencionNId'].'Catalogo'][$inter['tipoIntervencionId']]['descripcion'] : ''; ?></span></td>
			                <td><span id="descho_fichaId"><?=(isset($inter['fecha'])) ? $inter['fecha'] : ''; ?></span>	</td>
			                <td><input type="button" class="tiny button"  value="Editar" onclick="ventanaInterevenciones('<?=$casoId; ?>', '<?=$inter['intervencionId']?>')" />
			                <input type="button" class="tiny button"  value="Eliminar" onclick="eliminarIntervencion('<?=$inter['intervencionId']?>','<?=$casoId?>','<?=$casoActorIdReceptor?>','<?=$casoActorIdInterventor?>')" /></td>
			              </tr> <?php } }?>
			            </tbody>
			          </table>
				<input type="button" class="small button <?=$clase?>"  value="Nuevo" onclick="ventanaInterevenciones('<?=$casoId; ?>',0)" />	  
	  			</div>
	  			  
	  		</div>
	  	</div><!--fin acordeon Intervenciones-->
	</div>
	  
</div><!--fin acordeon Núcleo caso-->