<div id="pestania" data-collapse>	
	<h2 class="open">Casos</h2><!--título de la pestaña-->  
	<?php if (isset($casosRelacionados['casosActor'])) {?>
	<?php foreach ($casosRelacionados['casosActor'] as $datosCaso) {?>
	<div>
		<div id="subPestanias" data-collapse>	
  
			<h2 class="open"><?php print_r($datosCaso['casos']['nombre'])?></h2><!--título de la pestaña-->  
				<div>


						<div id="casos_nombre">
					  		<p>Nombre:
				          	<span id="casos_nombre"><?=(isset($datosCaso['casos']['nombre'])) ? $datosCaso['casos']['nombre'] : ''; ?></span>
				          	</p>
					  	</div>
					  	<div id="casos_personasAfectadas">
					  		<p>Personas Afectadas:
				          	<span id="casos_pesonasAfectadas"><?=(isset($datosCaso['casos']['personasAfectadas'])) ? $datosCaso['casos']['personasAfectadas'] : ''; ?></span>
				          	</p>
					  	</div>
					  	<div id="casos_fechaInicial">
					  		<p>Fecha inicial:
				          	<span id="casos_fechaInicial"><?=(isset($datosCaso['casos']['fechaInicial'])) ? $datosCaso['casos']['fechaInicial'] : ''; ?></span>
				          	</p>
					  	</div>
					  	<div id="casos_fechaTermino">
					  		<p>Fecha término:
				          	<span id="casos_fechaInicial"><?=(isset($datosCaso['casos']['fechaInicial'])) ? $datosCaso['casos']['fechaInicial'] : ''; ?></span>
				          	</p>
			  	</div>
		
		<div id="subPestanias" data-collapse>					
			<h2>Lugares</h2><!--título de la pestaña-->  
				<div>
					<table>
						<thead>
						  <tr>
							<th>País</th>
							<th>Estado</th>
							<th>Municipio</th>
						</thead>
						<tbody>
			              <?php if(isset($datosCaso['lugares'])){ ?>
			              <?php foreach ($datosCaso['lugares'] as $lugar) {
			              	?><tr><?php
			              	$indice = ($lugar['paisesCatalogo_paisId']) ?>
			              	<td><?php print_r($catalogos['paisesCatalogo'][$indice]['nombre']); ?></td>
			              	<?php $indice = ($lugar['estadosCatalogo_estadoId']) ?>
			              	<td><?php print_r($catalogos['estadosCatalogo'][$indice]['nombre']); ?></td>
			              	<?php $indice = ($lugar['municipiosCatalogo_municipioId']) ?>
			              	<td><?php print_r($catalogos['municipiosCatalogo'][$indice]['nombre']); ?></td>
			              </tr><?php } ?><?php } ?>
			            </tbody>
					  </table>
				</div><!--fin acordeon lugares-->
		</div>
				

		<div id="subPestanias" data-collapse>	
			<h2>Núcleo caso</h2><!--título de la pestaña-->  
				<div>
					<div id="subPestanias" data-collapse>
						<h2>Derechos afectados y actos</h2>
						<div>
							<div>
								<table>
									<thead>
									  <tr>
										<th>Derecho humano</th>
										<th>Acto</th>
										<th>Fecha inicio</th>
										<th>Fecha término</th>
									  </tr>
									</thead>
									<tbody>
							              <?php if(isset($datosCaso['derechoAfectado'])){ ?>
							              <?php foreach ($datosCaso['derechoAfectado'] as $index => $lugar) {?>
							              <tr>
							              	<td><?php print_r($lugar['derechoAfectadoId']); ?></td>

							              <?php foreach ($datosCaso['actos'] as $index => $acto) {
							              	if ($acto['derechoAfectado_derechoAfectadoCasoId']== $lugar['derechoAfectadoCasoId']) { ?>
							              	<td><?php print_r($acto['actoViolatorioId']); ?></td>
							              	<?} }?>

							              	<td><?php print_r($lugar['fechaInicial']); ?></td>
							              	<td><?php print_r($lugar['fechaTermino']); ?></td>
							              </tr><?php } ?><?php } ?>
									</tbody>
								  </table>
							</div>
						</div>
					</div>
						<!--fin acordeon Derechos afectados y actos-->
					<div id="subPestanias" data-collapse>
						<h2>Intervenciones</h2>
						<div>
								<table>
									<thead>
									  <tr>
										<th>Receptor</th>
										<th>Interventor</th>
										<th>Tipo de intervención</th>
										<th>Fecha</th>
									  </tr>
									</thead>
									<tbody>
									  <?php if(isset($datosCaso['intervenciones'])){ ?>
						              <?php foreach ($datosCaso['intervenciones'] as $inter) {?>
						              	 <tr>
						                <td><span id="descho_fichaId"><?=(isset($inter['receptorId'])) ? $catalogos['listaTodosActores'][$inter['receptorId']]['nombre']." ".$catalogos['listaTodosActores'][$inter['receptorId']]['apellidosSiglas'] : ''; ?></span></td>
						                <td><span id="descho_fichaId"><?=(isset($inter['interventorId'])) ?  $catalogos['listaTodosActores'][$inter['interventorId']]['nombre']." ".$catalogos['listaTodosActores'][$inter['interventorId']]['apellidosSiglas'] : ''; ?></span></td>
						                <td><span id="descho_fichaId">Tipo de Intervencion</td>
						                <td><span id="descho_fichaId"><?=(isset($inter['fecha'])) ? $inter['fecha'] : ''; ?></span>	</td>
						              </tr> <?php } }?>
									</tbody>
								  </table>
						</div>
					</div>
						<!--fin acordeon Intervenciones-->
					<div id="subPestanias" data-collapse>
						<h2>Actores asociados al caso</h2><!--título de la pestaña-->
						<div>
							<div class="twelve" id="subPestanias" data-collapse>	
								  <h2>Victimas</h2><!--título de la pestaña-->									
									<div >		
										<div class="PruebaScorll">		
											<?php if (isset($datosCaso['actos'])) {?>
											<?php foreach($datosCaso['actos'] as $acto):?> <!--muestra cada elemento de la lista-->
											<?php if (isset($acto['victimas'])) {?>
											<?php foreach($acto['victimas'] as $actor):?> <!--muestra cada elemento de la lista-->
								                <div class="twelve columns">
								                    <img class="three columns" src="<?=base_url(); ?>statics/media/img/actores/<?=$actor['actorId']; ?>.jpg" />
								                    <br/><br/>
									                <div class="nine columns">
									                        <?=$catalogos['listaTodosActores'][$actor['victimaId']]['nombre'].' '.$catalogos['listaTodosActores'][$actor['actorId']]['apellidosSiglas']; ?>
									                </div>
								                </div>
											<?php endforeach;?><!--Termina lista de los actores-->
											<?php }?>
											<?php endforeach;?><!--Termina lista de los actores-->
											<?php }?>
										</div>
									</div>
							</div>
									  
							<div class="twelve" id="subPestanias" data-collapse>	
								  <h2 >Perpetradores</h2><!--título de la pestaña---->			
									<div>											
										<div class="PruebaScorll">		
											<?php if (isset($datosCaso['actos'])) {?>
											<?php foreach($datosCaso['actos'] as $actos):?> <!--muestra cada elemento de la lista-->
												<?php if (isset($actos['victimas'])) {?>
												<?php foreach($actos['victimas'] as $victimas):?> <!--muestra cada elemento de la lista-->
													<?php if (isset($victimas['perpetradores'])) {?>
													<?php foreach($victimas['perpetradores'] as $actor):?> <!--muestra cada elemento de la lista-->
													
										                <div class="twelve columns">
										                    <img class="three columns" src="<?=base_url(); ?>statics/media/img/actores/<?=$actor['perpetradorId']; ?>.jpg" />
										                    <br/><br/>
											                <div class="nine columns">
											                        <?=$catalogos['listaTodosActores'][$actor['perpetradorId']]['nombre'].' '.$catalogos['listaTodosActores'][$actor['perpetradorId']]['apellidosSiglas']; ?>
											                </div>
										                </div>
															
													<?php endforeach;?><!--Termina lista de los actores-->
													<?php }?>
												<?php endforeach;?><!--Termina lista de los actores-->
												<?php }?>
											<?php endforeach;?><!--Termina lista de los actores-->
											<?php }?>
										</div>
									</div>
							</div>

							<div class="twelve" id="subPestanias" data-collapse>	
								  <h2>Interventores</h2><!--título de la pestaña-->
									<div>											
										<div class="PruebaScorll">		
											<?php if (isset($datosCaso['actos']['victimas']['perpetradores'])) {?>
											<?php foreach($datosCaso['intervenciones'] as $actor):?> <!--muestra cada elemento de la lista-->
											
								                <div class="twelve columns">
								                    <img class="three columns" src="<?=base_url(); ?>statics/media/img/actores/<?=$actor['interventorId']; ?>.jpg" />
								                    <br/><br/>
									                <div class="nine columns">
									                        <?=$catalogos['listaTodosActores'][$actor['interventorId']]['nombre'].' '.$catalogos['listaTodosActores'][$actor['interventorId']]['apellidosSiglas']; ?>
									                </div>
								                </div>
													
											<?php endforeach;?><!--Termina lista de los actores-->
											<?php }?>
										</div>
									</div>
							</div>
							<div class="twelve" id="subPestanias" data-collapse>	
								  <h2 >Receptores</h2><!--título de la pestaña-->
									<div>									
										<div class="PruebaScorll">
											<?php if (isset($datosCaso['intervenciones'])) {?>		
											<?php foreach($datosCaso['intervenciones'] as $actor):?> <!--muestra cada elemento de la lista-->
											
								                <div class="twelve columns">
								                    <img class="three columns" src="<?=base_url(); ?>statics/media/img/actores/<?=$actor['receptorId']; ?>.jpg" />
								                    <br/><br/>
									                <div class="nine columns">
									                        <?=$catalogos['listaTodosActores'][$actor['receptorId']]['nombre'].' '.$catalogos['listaTodosActores'][$actor['receptorId']]['apellidosSiglas']; ?>
									                </div>
								                </div>
													
											<?php endforeach;?><!--Termina lista de los actores-->
											<?php }?>
										</div>
									</div>

								  <h2>Fuentes de información personal</h2><!--título de la pestaña-->				
									<div>											
										<div class="PruebaScorll">		
											<?php if (isset($datosCaso['fuenteInfoPersonal'])) {?>
											<?php foreach($datosCaso['fuenteInfoPersonal'] as $actor):?> <!--muestra cada elemento de la lista-->
											
								                <div class="twelve columns">
								                    <img class="three columns" src="<?=base_url(); ?>statics/media/img/actores/<?=$actor['actorId']; ?>.jpg" />
								                    <br/><br/>
									                <div class="nine columns">
									                        <?=$catalogos['listaTodosActores'][$actor['actorReportado']]['nombre'].' '.$catalogos['listaTodosActores'][$actor['actorReportado']]['apellidosSiglas']; ?>
									                </div>
								                </div>
													
											<?php endforeach;?><!--Termina lista de los actores-->
											<?php }?>
										</div>
									</div>

								  <h2 >Fuente documental</h2><!--título de la pestaña-->
									<div>											
										<div class="PruebaScorll">		
											<?php if (isset($datosCaso['fuenteInfoPersonal'])) {?>
											<?php foreach($datosCaso['fuenteInfoPersonal'] as $actor):?> <!--muestra cada elemento de la lista-->
											
								                <div class="twelve columns">
								                    <img class="three columns" src="<?=base_url(); ?>statics/media/img/actores/<?=$actor['actorId']; ?>.jpg" />
								                    <br/><br/>
									                <div class="nine columns">
									                        <?=$catalogos['listaTodosActores'][$actor['actorId']]['nombre'].' '.$catalogos['listaTodosActores'][$actor['actorId']]['apellidosSiglas']; ?>
									                </div>
								                </div>
													
											<?php endforeach;?><!--Termina lista de los actores-->
											<?php }?>
										</div>
									</div>
							</div>
						
						</div>

					</div>
				</div>
		</div>

		<div id="subPestanias" data-collapse>	
			<h2>Relación entre casos</h2><!--título de la pestaña-->
			<div>
				<table>
					<thead>
					  <tr>
						<th>Caso</th>
						<th>Tipo de relación</th>
						<th>Caso Relacionado</th>
						<th>Fecha inicio</th>
						<th>Fecha término</th>
					  </tr>
					</thead>
					<tbody>
					  <tr>
						<?php if (isset($datosCaso['relacionCasos'])) {?>
						<?php foreach($datosCaso['relacionCasos'] as $relacionCaso){?> <!--muestra cada elemento de la lista-->
							<td><?php print_r($datosCaso['casos']['nombre'])?></td>
							<td><?php print_r($relacionCaso['tipoRelacionId'])?></td>
							<td><?php print_r($relacionCaso['nombreCasoIdB'])?></td>
							<td><?php print_r($relacionCaso['tipoRelacionId'])?></td>
							<td><?php print_r($relacionCaso['tipoRelacionId'])?></td>
						<?php }}?>
					  </tr>
					</tbody>
				</table>
			</div>
		</div>

	</div>
	<?php }?>
	<?php }?>
</div>
	
