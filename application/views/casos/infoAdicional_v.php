
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
					            		foreach ($datosCaso['tipoFuenteDocumental'] as $index => $fuenteDoc) {
						            		foreach ($fuenteDoc['casosActor'] as $fuenteDoc2) {
						            			if ($fuenteDoc2['casos_casoId']==$casoId) {
						            				$actorReportado=$fuenteDoc2['casoActorId'];
						            			} else{
						            				$actorReportado=0;
						            			}
						            		}
					            		 ?>
							              <tr>
							              	
							                <td><?= $fuenteDoc['nombre'] ?></td>
							                <td><?= (isset($relacionId['tipoFuenteDocumentalCatalogoId']) && isset($fuenteDoc['tipoFuenteDocumentalCatalogoNivel']) && ($fuenteDoc['tipoFuenteDocumentalCatalogoId']>0)) ? $catalogos['tipoFuenteDocumentalN'.$fuenteDoc['tipoFuenteDocumentalCatalogoNivel'].'Catalogo'][$fuenteDoc['tipoFuenteDocumentalCatalogoId']]['descripcion'] : " " ; ?></td>
							                <td><?= (isset($fuenteDoc['actorReportado']) ? $catalogos['listaTodosActores'][$fuenteDoc['actorReportado']]['nombre'].' '.$catalogos['listaTodosActores'][$fuenteDoc['actorReportado']]['apellidosSiglas'] : 'No hay actor reportado') ?><?=(isset($fuenteDoc['relacionId']) && ($fuenteDoc['relacionId']>0)&&(isset($catalogos['relacionesActoresCatalogo'][$fuenteDoc['relacionId']]))) ? ' ('.$catalogos['relacionActoresCatalogo'][$catalogos['relacionesActoresCatalogo'][$fuenteDoc['relacionId']]['tipoRelacionId']]['Nivel2'].') '.$catalogos['listaTodosActores'][$catalogos['relacionesActoresCatalogo'][$fuenteDoc['relacionId']]['actorRelacionadoId']]['nombre']." ".$catalogos['listaTodosActores'][$catalogos['relacionesActoresCatalogo'][$fuenteDoc['relacionId']]['actorRelacionadoId']]['apellidosSiglas'] : ''; ?></td>
							                <td><?= $fuenteDoc['fecha'] ?></td>
							                <td><?= $fuenteDoc['fechaAcceso'] ?></td>
							                <td><input type="button" class="tiny button" style="padding:5px 15px 5px 15px;margin-bottom: 5px"  value="Editar" onclick="ventanaFuenteDoc('<?= $casoId; ?>','<?= $fuenteDoc['actorReportado'] ?>','<?= $index ?>')" />
							                <input type="button" class="tiny button"  value="Eliminar" onclick="eliminarFuenteDocumental('<?=$index?>','<?= $casoId; ?>','<?=$actorReportado?>')" /></td>
							              </tr>
							              <?php }}?>
					            </tbody>
				          </table>
				          <input type="button" class="small button <?=$clase?>"  value="Nuevo" onclick="ventanaFuenteDoc(<?=$casoId; ?>, '0','0')" />
		  				 </div>
			  		</div>
			  	</div><!--fin acordeon Fuente documental-->	  			
	  			
			  	<div id="subPestanias" data-collapse>
			  		<h2 class="open">Fuente individual o colectiva</h2>
				  		<div>
				  			<div>
				  				<table class="twelve columns">
						            <thead>
						              <tr>
						                <th>Nombre de fuente</th>
						                <th>Tipo de fuente</th>
						                <th>Actor reportado</th>
						                <th>Fecha</th>
						                <th>Acción(es)</th>
						              </tr>
						            </thead>
						            <tbody>
						            	<?php if(isset($datosCaso['fuenteInfoPersonal'])){
						            		foreach ($datosCaso['fuenteInfoPersonal'] as $index => $fuentePersonal) { 
						            			foreach ($fuentePersonal['casosActorReportado'] as $documental) {
						            				if ($documental['casos_casoId']==$casoId) {
						            					$actorReportado=$documental['casoActorId'];
						            				}
						            				else{
						            					$actorReportado=0;
						            				}
						            			}foreach ($fuentePersonal['casosActor'] as $documental) {
						            				if ($documental['casos_casoId']==$casoId) {

						            					$casoActorIdActorId=$documental['casoActorId'];
						            				}
						            				else{
						            					$casoActorIdActorId=0;
						            				}
						            			}
						            	?>
								              <tr>
								              	<td><?= (isset($fuentePersonal['actorId'])) ? $catalogos['listaTodosActores'][$fuentePersonal['actorId']]['nombre']." ".$catalogos['listaTodosActores'][$fuentePersonal['actorId']]['apellidosSiglas'] : "No hay hactor" ; ?> <?=(isset($fuentePersonal['relacionId']) && ($fuentePersonal['relacionId']>0)&&(isset($catalogos['relacionesActoresCatalogo'][$fuentePersonal['relacionId']]))) ? ' ('.$catalogos['relacionActoresCatalogo'][$catalogos['relacionesActoresCatalogo'][$fuentePersonal['relacionId']]['tipoRelacionId']]['Nivel2'].') '.$catalogos['listaTodosActores'][$catalogos['relacionesActoresCatalogo'][$fuentePersonal['relacionId']]['actorRelacionadoId']]['nombre']." ".$catalogos['listaTodosActores'][$catalogos['relacionesActoresCatalogo'][$fuentePersonal['relacionId']]['actorRelacionadoId']]['apellidosSiglas'] : ''; ?></td>
								                <td><?= (isset($fuentePersonal['tipoFuenteCatalogo_tipoFuenteId'])) ? $catalogos['tipoFuenteCatalogo'][$fuentePersonal['tipoFuenteCatalogo_tipoFuenteId']]['descripcion'] : " " ; ?> </td>
								              	<td><?= (isset($fuentePersonal['actorReportadoNombre'])) ? $fuentePersonal['actorReportadoNombre']." ".$fuentePersonal['actorReportadoApellidosSiglas']  : "No hay hactor" ; ?><?=(isset($fuentePersonal['tipoRelacionActorReportadoId']) && ($fuentePersonal['tipoRelacionActorReportadoId']>0)&&(isset($catalogos['relacionesActoresCatalogo'][$fuentePersonal['tipoRelacionActorReportadoId']]))) ? ' ('.$catalogos['relacionActoresCatalogo'][$catalogos['relacionesActoresCatalogo'][$fuentePersonal['tipoRelacionActorReportadoId']]['tipoRelacionId']]['Nivel2'].') '.$catalogos['listaTodosActores'][$catalogos['relacionesActoresCatalogo'][$fuentePersonal['tipoRelacionActorReportadoId']]['actorRelacionadoId']]['nombre']." ".$catalogos['listaTodosActores'][$catalogos['relacionesActoresCatalogo'][$fuentePersonal['tipoRelacionActorReportadoId']]['actorRelacionadoId']]['apellidosSiglas'] : ''; ?> </td>
								                <td><?= $fuentePersonal['fecha'] ?></td>
								                <td><input type="button" class="tiny button" style="padding:5px 15px 5px 15px;margin-bottom: 5px" value="Editar" onclick="ventanaFuentePersonal('<?= $casoId; ?>', '<?= $fuentePersonal['actorReportado'] ?>','<?=$fuentePersonal['fuenteInfoPersonalId']?>')" />
								                <input type="button" class="tiny button"  value="Eliminar" onclick="eliminarFuentePersonal('<?=$fuentePersonal['fuenteInfoPersonalId']?>','<?= $casoId; ?>','<?= $casoActorIdActorId; ?>','<?= $actorReportado; ?>')" /></td>
								               <?php }}?>
								              </tr>
						            </tbody>
				          		</table>
				          		<input type="button" class="small button <?=$clase?>" value="Nuevo" onclick="ventanaFuentePersonal(<?= $casoId; ?>,'0','0')" />
				  			</div>
				  		</div>
				  	</div><!--fin acordeon Fuentes de información personal-->
	  		</div>

	  	</div><!--fin acordeon Fuentes de información-->
	  	
	  	<div id="subPestanias" data-collapse>
	  		<h2>Relación entre casos</h2>
	  		<div>
	  			<div class="twelve columns">
	  				<?php if(isset($datosCaso['relacionCasos']) && $datosCaso['relacionCasos'] != '0'):?>	
	  				<table class="twelve columns">
			            <thead>
			              <tr>
			                <th>Caso</th>
			                <th>Tipo de relación</th>
			                <th>Caso relacionado</th>
			                <th>Fecha de inicio</th>
			                <th>Fecha de término</th>
			                <th>Acción(es)</th>
			              </tr>
			            </thead>
			            <tbody>			            
			              		
			              	<?php foreach($datosCaso['relacionCasos'] as $casoRelacionado):?>
			              		<tr>
				              		<td><?=(isset($datosCaso['casos']['nombre']) && isset($casoRelacionado['nombreCasoIdB'])) ? $datosCaso['casos']['nombre'] : ''; ?></td>
				              		<td>
				              			<?php if(isset($casoRelacionado['tipoRelacionId']) && isset($casoRelacionado['nombreCasoIdB'])){ 
											foreach($catalogos['relacionCasosCatalogo'] as $relacion){
												if($relacion['relacionCasosId'] == $casoRelacionado['tipoRelacionId'] ){
													echo $relacion['descripcion'];
												}
											} 
				              			?>
				              		</td>
				              		<td><?=(isset($casoRelacionado['nombreCasoIdB']))? $casoRelacionado['nombreCasoIdB']: ''?></td>
				              		<td><?=(isset($casoRelacionado['fechaIncial']))? $casoRelacionado['fechaIncial']: ''?></td>
				              		<td><?=(isset($casoRelacionado['fechaTermino']))? $casoRelacionado['fechaTermino']: ''?></td>
				              		<td><input type="button"  class="tiny button" style="padding:5px 15px 5px 15px;margin-bottom: 5px" value="Editar" onclick="ventanaRelacionCasos('<?= $casoId; ?>', '<?=$casoRelacionado['relacionId']?>')"/>
				              			<input type="button"  class="tiny button" value="Eliminar" onclick="eliminarRelacionCasos('<?=$casoRelacionado['relacionId']?>','<?= $casoId; ?>')" />
			              			</td>
			              		</tr>
			              	<?php }endforeach;?>		
			             <?php endif;?>  
			            </tbody>
	          		</table>
					<input type="button"  class="small button" value="Nuevo" onclick="ventanaRelacionCasos('<?= $casoId; ?>', '0')" />
					<br /><br />
	  			</div>

			  	<div class="twelve columns" id="subPestanias" data-collapse>
			  		<h2>Citado como caso</h2>
			  		<div>
			  			<div>
			  			   <?php if(isset($datosCaso['relacionCasos']) && $datosCaso['relacionCasos'] != '0'):?>		
			  				<table class="twelve columns">
					            <thead>
					              <tr>
			                		<th>Caso</th>
					                <th>Tipo de relación</th>
					                <th>Caso relacionado</th>
					                <th>Fecha de inicio</th>
					                <th>Fecha de término</th>
					              </tr>
					            </thead>
					            <tbody>	
					              	<?php foreach($datosCaso['relacionCasos'] as $casoRelacionado):?>
					              		<tr>
						              		<td><?=(isset($casoRelacionado['nombreCasoId']))? $casoRelacionado['nombreCasoId']: ''?></td>
						              		<td><?php if(isset($casoRelacionado['tipoRelacionId']) && isset($casoRelacionado['nombreCasoId'])) 
													foreach($catalogos['relacionCasosCatalogo'] as $relacion){
														if($relacion['relacionCasosId'] == $casoRelacionado['tipoRelacionId'] ){
															echo $relacion['descripcion'];
														}
													} 
						              		?></td>
				              				<td><?=(isset($datosCaso['casos']['nombre']) && isset($casoRelacionado['nombreCasoId'])) ? $datosCaso['casos']['nombre'] : ''; ?></td>
						              		<td><?=(isset($casoRelacionado['fechaIncialCasoId']))? $casoRelacionado['fechaIncialCasoId']: ''?></td>
						              		<td><?=(isset($casoRelacionado['fechaTerminoCasoId']))? $casoRelacionado['fechaTerminoCasoId']: ''?></td>
					              		</tr>
					              	<?php endforeach;?>		
					             <?php endif;?>  
					            </tbody>
			          		</table>
							<br /><br />
			  			</div>
			  		</div>
			  	</div><!--fin acordeon Relación entre casos-->
	  		</div>
	  	</div><!--fin acordeon Relación entre casos-->
	</div>
	  
</div><!--fin acordeon Información adicional-->
