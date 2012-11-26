<div id="pestania" data-collapse>
	<h2>Información adicional</h2><!--título de la sub-pestaña-->  
	<div>
		<div id="subPestanias" data-collapse>
	  		<h2>Fuentes de información</h2>
	  		<div>
				<div id="subPestanias" data-collapse>
		  		<h2>Fuente documental</h2>
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
					            		foreach ($datosCaso['tipoFuenteDocumental'] as $fuenteDoc) { ?>
							              <tr>
							                <td><?= $fuenteDoc['nombre'] ?></td>
							                <td><?= $fuenteDoc['tipoFuenteCatalogo_tipoFuenteId'] ?></td>
							                <td>No aparece actor reportado</td>
							                <td><?= $fuenteDoc['fecha'] ?></td>
							                <td><?= $fuenteDoc['fechaAcceso'] ?></td>
							                <td><input type="button" class="tiny button"  value="Editar" onclick="ventanaFuenteDoc(<?=$casoId; ?>)" />
							                <input type="button" class="tiny button"  value="Eliminar" onclick="" /></td>
							              </tr>
							              <?php }}?>
					            </tbody>
				          </table>
				          <input type="button" class="tiny button <?=$clase?>"  value="Nuevo" onclick="ventanaFuenteDoc(<?=$casoId; ?>, 0)" />
		  				 </div>
			  		</div>
			  	</div><!--fin acordeon Fuente documental-->	  			
	  			
	  			
			  	<div id="subPestanias" data-collapse>
			  		<h2>Fuentes de información personal</h2>
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
						            		foreach ($datosCaso['fuenteInfoPersonal'] as $infoGeneral) { ?>
								              <tr>
								                <td>No aparece nombre de la fuente</td>
								                <td><?= $infoGeneral['tipoFuenteCatalogo_tipoFuenteId'] ?> </td>
								                <td><?= $infoGeneral['actorReportadoNombre']." ".$infoGeneral['actorReportadoApellidosSiglas'] ?></td>
								                <td><?= $infoGeneral['fecha'] ?></td>
								                <td><input type="button" class="tiny button"  value="Editar" onclick="" />
								                <input type="button" class="tiny button"  value="Eliminar" onclick="" /></td>
								               <?php }}?>
								              </tr>
						            </tbody>
				          		</table>
				          		<input type="button" class="tiny button <?=$clase?>" value="nuevo" onclick="" />
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
			                <th>Caso</th>
			                <th>Tipo de relación</th>
			                <th>Caso relacionado</th>
			                <th>Feche de inicio</th>
			                <th>Feche de término</th>
			                <th>Acción(es)</th>
			              </tr>
			            </thead>
			            <tbody>
			              <tr>
			                <td> <span id="infoCaso_descripcion"><?=(isset($datosCaso['relacionCasos'][1]['casoIdB'])) ? $datosCaso['relacionCasos'][1]['casoIdB'] : ''; ?></span> </td>
			                <td> <span id="infoCaso_descripcion"><?=(isset($datosCaso['relacionCasos'][1]['relacionId'])) ? $datosCaso['relacionCasos'][1]['relacionId'] : ''; ?></span> </td>
			                <td> <span id="infoCaso_descripcion"><?=(isset($datosCaso['relacionCasos'][1]['relacionId'])) ? $datosCaso['relacionCasos'][1]['relacionId'] : ''; ?></span> </td>
			                <td>Content</td>
			                <td>Content</td>
			                <td><input type="button" class="tiny button"  value="Editar" onclick="" />
			                <input type="button" class="tiny button"  value="Eliminar" onclick="" /></td>
			              </tr>
			            </tbody>
	          		</table>
				<input type="button" class="tiny button <?=$clase?>" value="nuevo" onclick="" />
				<br /><br />
	  			</div>
	  		</div>
	  	</div><!--fin acordeon Relación entre casos-->
	</div>
	  
</div><!--fin acordeon Información adicional-->
