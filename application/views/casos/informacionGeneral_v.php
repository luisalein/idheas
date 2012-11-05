<div id="pestania" data-collapse>
	<h2 class="open">Información general </h2><!--título de la sub-pestaña---->  
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
                <form action="<?=base_url(); ?>index.php/ReportePdf_c/generaReporteLargo/<?=$casoId; ?>" method="post" >
                    <input type="submit" class="tiny button <?=$clase?>" value="Exportar" />
                </form>
	  	</div>
	  	
	  	<div id="subPestanias" data-collapse>
	  		<h2>Lugares</h2>
	  		<div>
	  			<div>
	  				<!------------------------------ Comienza tabla lugare-------------------------------------->
	  				<table class="twelve columns">
			            <thead>
			              <tr>
			                <th>País</th>
			                <th>Estado</th>
			                <th>Municipio</th>
			                <th>Acción(es)</th>
			              </tr>
			            </thead>
			            <tbody>
			              <?php if(isset($datosCaso['lugares'])){ ?>
			              <?php foreach ($datosCaso['lugares'] as $index => $lugar) {
			              	?><tr><?php
			              	$indice = ($lugar['paisesCatalogo_paisId']) ?>
			              	<td><?php print_r($catalogos['paisesCatalogo'][$indice]['nombre']); ?></td>
			              	<?php $indice = ($lugar['estadosCatalogo_estadoId']) ?>
			              	<td><?php print_r($catalogos['estadosCatalogo'][$indice]['nombre']); ?></td>
			              	<?php $indice = ($lugar['municipiosCatalogo_municipioId']) ?>
			              	<td><?php print_r($catalogos['municipiosCatalogo'][$indice]['nombre']); ?></td>
			                <td><input type="button" class="tiny button"  value="Editar" onclick="ventanaDetalleLugar('<?=$casoId; ?>', '<?=$index?>')" />
			                	<input type="button" class="tiny button"  value="Eliminar" onclick="" /></td>
			              </tr><?php } ?><?php } ?>
			            </tbody>
			          </table>
				<input type="button" class="tiny button <?=$clase?>"  value="Nuevo" onclick="ventanaDetalleLugar('<?=$casoId; ?>',0)" />  
	  				<!------------------------------ Termina tabla lugares-------------------------------------->
	  			</div>
	  		</div>
	  	</div><!--fin acordeon lugares-->
	  	
	  	<div id="subPestanias" data-collapse>
	  		<h2>Descripción</h2>
	  		<div>
	  			<div id="infoCaso_descripcion" class="panel">
  					<p>
          			<span id="infoCaso_descripcion"><?=(isset($datosCaso['infoCaso']['descripcion'])) ? $datosCaso['infoCaso']['descripcion'] : ''; ?></span>
          			</p>
				</div>	  			  
	  		</div>
	  	</div><!--fin acordeon descripción-->
	  	

	  	<div id="subPestanias" data-collapse>
	  		<h2>Resumen</h2>
	  		<div>
	  			<div id="infoCaso_resumen" class="panel">
  					<p>
          			<span id="infoCaso_resumen"><?=(isset($datosCaso['infoCaso']['resumen'])) ? $datosCaso['infoCaso']['resumen'] : ''; ?></span>
  					</p>
				</div>	  			  
	  		</div>
	  	</div><!--fin acordeon resumen-->
	  	

	  	<div id="subPestanias" data-collapse>
	  		<h2>Obsevaciones</h2>
	  		<div>
	  			<div id="infoCaso_descripcion" class="panel">
  					<p>
          			<span id="infoCaso_descripcion"><?=(isset($datosCaso['infoCaso']['observaciones'])) ? $datosCaso['infoCaso']['observaciones'] : ''; ?></span>
  					</p>
				</div>	  			  
	  		</div>
	  	</div><!--fin acordeon observaciones-->
	  	
	  	<div id="subPestanias" data-collapse>
	  		<h2 class="open">Seguimiento del caso</h2>
	  		<div>
	  			<div>
	  				<table class="twelve columns">
			            <thead>
			              <tr>
			                <th>Id</th>
			                <th>Título</th>
			                <th>Fecha de recibo</th>
			                <th>Acción(es)</th>
			              </tr>
			            </thead>
			            <tbody>
			              <?php if(isset($datosCaso['fichas'])){ ?>
			              <?php foreach ($datosCaso['fichas'] as $key => $seguimiento) {
			              	?><tr>
			                <td> <span id="infoCaso_fichaId"><?=(isset($seguimiento['fichaId'])) ? $seguimiento['fichaId'] : ''; ?></span> </td>
			                <td> <span id="infoCaso_titulo"><?=(isset($seguimiento['titulo'])) ? $seguimiento['titulo'] : ''; ?></span> </td>
			                <td> <span id="infoCaso_titulo"><?=(isset($seguimiento['fecha'])) ? $seguimiento['fecha'] : ''; ?></span></td>
			                <td><input type="button" class="tiny button"  value="Editar" onclick="ventanaFicha('<?=$casoId; ?>', '<?=$key; ?>')" />
			                	<input type="button" class="tiny button"  value="Eliminar" onclick="" /></td>
			              </tr><?php }} ?>
			            </tbody>
			          </table>
	  			</div>
	  		<input type="button" class="tiny button <?=$clase?>"  value="Nuevo" onclick="ventanaFicha('<?=$casoId; ?>',0)" />	  
	  				<!------------------------------ Termina tabla seguimiento del caso-------------------------------------->
	  		</div>
	  	</div><!--fin acordeon Seguimiento del caso-->
	</div>
	  
</div><!--fin acordeon información general-->
