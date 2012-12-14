
<div id="pestania" data-collapse>
	<h2 class="open">Información adicional</h2><!--título de la sub-pestaña-->  
	<div>
		<div id="subPestanias" data-collapse>
	  		<h2 class="open">Fuentes de información</h2>
	  		<div>
				<div id="subPestanias" data-collapse>
		  		<h2 class="open">Fuente documental</h2>
			  		<div>
		  				 <div>
		  				 	<table class="twelve columns">
					            <thead>
					              <tr>
					                <th>Nombre de fuente</th>
					                <th>Tipo de fuente</th>
					                <th>Actor reportado</th>
					                <th>Fecha de publicación</th>
					                <th>Fecha de acceso</th>
					                <th>Acción(es)</th>
					              </tr>
					            </thead>
					            <tbody>
					            	<?php if(isset($datosCaso['tipoFuenteDocumental'])){
					            		foreach ($datosCaso['tipoFuenteDocumental'] as $index => $fuenteDoc) { ?>
							              <tr>
							              	
							                <td><?= $fuenteDoc['nombre'] ?></td>
							                <td><?= ($fuenteDoc['tipoFuenteCatalogo_tipoFuenteId']==$catalogos['tipoFuenteCatalogo'][$fuenteDoc['tipoFuenteCatalogo_tipoFuenteId']]) ? $catalogos['tipoFuenteCatalogo'][$fuenteDoc['tipoFuenteCatalogo_tipoFuenteId']]['descripcion']:$catalogos['tipoFuenteCatalogo'][$fuenteDoc['tipoFuenteCatalogo_tipoFuenteId']]['descripcion'] ?></td>
							                <td><?= (isset($fuenteDoc['actorReportado']) ? $catalogos['listaTodosActores'][$fuenteDoc['actorReportado']]['nombre'].' '.$catalogos['listaTodosActores'][$fuenteDoc['actorReportado']]['apellidosSiglas'] : 'No hay actor reportado') ?> </td>
							                <td><?= $fuenteDoc['fecha'] ?></td>
							                <td><?= $fuenteDoc['fechaAcceso'] ?></td>
							                <td><input type="button" class="tiny button"  value="Editar" onclick="ventanaFuenteDoc('<?= $casoId; ?>','<?= $fuenteDoc['actorReportado'] ?>','<?= $index ?>')" />
							                <input type="button" class="tiny button"  value="Eliminar" onclick="eliminarFuenteDocumental('<?=$index?>','<?= $casoId; ?>')" /></td>
							              </tr>
							              <?php }}?>
					            </tbody>
				          </table>
				          <input type="button" class="tiny button <?=$clase?>"  value="Nuevo" onclick="ventanaFuenteDoc(<?=$casoId; ?>, '0','0')" />
		  				 </div>
			  		</div>
			  	</div><!--fin acordeon Fuente documental-->	  			
	  			
	  			
			  	<div id="subPestanias" data-collapse>
			  		<h2 class="open">Fuentes de información personal</h2>
				  		<div>
				  			<div>
				  				<table class="twelve columns">
						            <thead>
						              <tr>
						                <th>Nombre de fuente</th>
						                <th>Tipo de fuente(Fuente de información documental)</th>
						                <th>Actor reportado</th>
						                <th>Fecha</th>
						                <th>Acción(es)</th>
						              </tr>
						            </thead>
						            <tbody>
						            	<?php if(isset($datosCaso['fuenteInfoPersonal'])){
						            		foreach ($datosCaso['fuenteInfoPersonal'] as $index => $fuentePersonal) { ?>
								              <tr>
								              	
								                <td>No aparece nombre de la fuente</td>
								                <td><?= $fuentePersonal['tipoFuenteCatalogo_tipoFuenteId'] ?> </td>
								                <td><?= $fuentePersonal['actorReportadoNombre']." ".$fuentePersonal['actorReportadoApellidosSiglas'] ?></td>
								                <td><?= $fuentePersonal['fecha'] ?></td>
								                <td><input type="button" class="tiny button"  value="Editar" onclick="ventanaFuentePersonal('<?= $casoId; ?>', '<?= $fuentePersonal['actorReportado'] ?>','<?=$fuentePersonal['fuenteInfoPersonalId']?>')" />
								                <input type="button" class="tiny button"  value="Eliminar" onclick="eliminarFuentePersonal('<?=$fuentePersonal['fuenteInfoPersonalId']?>','<?= $casoId; ?>')" /></td>
								               <?php }}?>
								              </tr>
						            </tbody>
				          		</table>
				          		<input type="button" class="tiny button <?=$clase?>" value="nuevo" onclick="ventanaFuentePersonal(<?= $casoId; ?>,'0','0')" />
				  			</div>
				  		</div>
				  	</div><!--fin acordeon Fuentes de información personal-->
	  		</div>

	  	</div><!--fin acordeon Fuentes de información-->
	  	
	  	<div id="subPestanias" data-collapse>
	  		<h2>Relación entre casos</h2>
	  		<div>
	  			<div>
	  				<table class="twelve columns">
			            <thead>
			              <tr>
			                <th>Tipo de relación</th>
			                <th>Caso relacionado</th>
			                <th>Fecha de inicio</th>
			                <th>Fecha de término</th>
			                <th>Acción(es)</th>
			              </tr>
			            </thead>
			            <tbody>			            
			            <?php if(isset($datosCaso['relacionCasos'])):?>	  		
			              	<?php foreach($datosCaso['relacionCasos'] as $casoRelacionado):?>
			              		<tr>
				              		<td><?php if(isset($casoRelacionado['tipoRelacionId'])) 
											foreach($catalogos['relacionCasosCatalogo'] as $relacion){
												if($relacion['relacionCasosId'] == $casoRelacionado['tipoRelacionId'] ){
													echo $relacion['descripcion'];
												}
											} 
				              		?></td>
				              		<td><?=(isset($casoRelacionado['nombreCasoIdB']))? $casoRelacionado['nombreCasoIdB']: ''?></td>
				              		<td><?=(isset($casoRelacionado['fechaIncial']))? $casoRelacionado['fechaIncial']: ''?></td>
				              		<td><?=(isset($casoRelacionado['fechaTermino']))? $casoRelacionado['fechaTermino']: ''?></td>
				              		<td><input type="button"  class="tiny button" value="Editar" onclick="ventanaRelacionCasos('<?= $casoId; ?>', '<?=$casoRelacionado['relacionId']?>')"/>
				              			<input type="button"  class="tiny button" value="Eliminar" onclick="eliminarRelacionCasos('<?=$casoRelacionado['relacionId']?>','<?= $casoId; ?>')" />
			              			</td>
			              		</tr>
			              	<?php endforeach;?>		
			             <?php endif;?>  
			            </tbody>
	          		</table>
					<input type="button"  class="tiny button" value="Nuevo" onclick="ventanaRelacionCasos('<?= $casoId; ?>', '0')" />
				<br /><br />
	  			</div>
	  		</div>
	  	</div><!--fin acordeon Relación entre casos-->
	</div>
	  
</div><!--fin acordeon Información adicional-->
