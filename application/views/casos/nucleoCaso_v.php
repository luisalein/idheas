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
			              <?php foreach ($datosCaso['derechoAfectado'] as $index => $lugar) {?>
			              <tr>
			              	<td><?php print_r($lugar['derechoAfectadoId']); ?></td>

			              <?php foreach ($datosCaso['actos'] as $index2 => $acto) {
			              	if ($acto['derechoAfectado_derechoAfectadoCasoId']== $lugar['derechoAfectadoCasoId']) { ?>
			              	<td><?php print_r($acto['actoViolatorioId']); ?></td>
			              	<?} }?>

			              	<td><?php print_r($lugar['fechaInicial']); ?></td>
			              	<td><?php print_r($lugar['fechaTermino']); ?></td>
			                <td><input type="button" class="tiny button"  value="Editar" onclick="ventanaDerAfectados('<?=$casoId; ?>', '<?=$index?>')" />
			                <input type="button" class="tiny button"  value="Eliminar" onclick="" /></td>
			              </tr><?php } ?><?php } ?>
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
			                <td><span id="descho_fichaId"><?=(isset($inter['receptorId'])) ? $catalogos['listaTodosActores'][$inter['receptorId']]['nombre']." ".$catalogos['listaTodosActores'][$inter['receptorId']]['apellidosSiglas'] : ''; ?></span></td>
			                <td><span id="descho_fichaId"><?=(isset($inter['interventorId'])) ?  $catalogos['listaTodosActores'][$inter['interventorId']]['nombre']." ".$catalogos['listaTodosActores'][$inter['interventorId']]['apellidosSiglas'] : ''; ?></span></td>
			                <td><span id="descho_fichaId">Tipo de Intervencion</td>
			                <td><span id="descho_fichaId"><?=(isset($inter['fecha'])) ? $inter['fecha'] : ''; ?></span>	</td>
			                <td><input type="button" class="tiny button"  value="Editar" onclick="ventanaInterevenciones('<?=$casoId; ?>', '<?=$index?>')" />
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