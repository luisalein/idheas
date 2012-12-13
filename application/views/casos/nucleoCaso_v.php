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

			              	<td><?php print_r($derecho['fechaInicial']); ?></td>
			              	<td><?php print_r($derecho['fechaTermino']); ?></td>
			                <td><input type="button" class="tiny button"  value="Editar" onclick="ventanaDerAfectados('<?=$casoId; ?>', '<?=$index?>')" />
			                <input type="button" class="tiny button"  value="Eliminar" onclick="eliminarDerechoAfectado('<?= $derecho['derechoAfectadoCasoId']?>', '<?=$casoId; ?>')" /></td>
			              </tr><?php } }?><?php } ?>
			            </tbody>
			          </table>
			    <input type="button" class="tiny button <?=$clase?>"  value="Nuevo " onclick="ventanaDerAfectados('<?=$casoId; ?>',0)" />
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
			                <td><span id="descho_fichaId"><?=(isset($inter['receptorId']) && ($inter['receptorId']>0)) ? $catalogos['listaTodosActores'][$inter['receptorId']]['nombre']." ".$catalogos['listaTodosActores'][$inter['receptorId']]['apellidosSiglas'] : ''; ?></span></td>
			                <td><span id="descho_fichaId"><?=(isset($inter['interventorId']) && ($inter['interventorId']>0)) ?  $catalogos['listaTodosActores'][$inter['interventorId']]['nombre']." ".$catalogos['listaTodosActores'][$inter['interventorId']]['apellidosSiglas'] : ''; ?></span></td>
			                <td><span id="descho_fichaId"><?=(isset($inter['tipoIntervencionId']) && isset($inter['intervencionNId'])) ?  $catalogos['tipoIntervencionN'.$inter['intervencionNId'].'Catalogo'][$inter['tipoIntervencionId']]['descripcion'] : ''; ?></span></td>
			                <td><span id="descho_fichaId"><?=(isset($inter['fecha'])) ? $inter['fecha'] : ''; ?></span>	</td>
			                <td><input type="button" class="tiny button"  value="Editar" onclick="ventanaInterevenciones('<?=$casoId; ?>', '<?=$inter['intervencionId']?>')" />
			                <input type="button" class="tiny button"  value="Eliminar" onclick="ventanaInterevenciones()" /></td>
			              </tr> <?php } }?>
			            </tbody>
			          </table>
				<input type="button" class="tiny button <?=$clase?>"  value="Nuevo" onclick="ventanaInterevenciones('<?=$casoId; ?>',0)" />	  
	  			</div>
	  			  
	  		</div>
	  	</div><!--fin acordeon Intervenciones-->
	</div>
	  
</div><!--fin acordeon Núcleo caso-->