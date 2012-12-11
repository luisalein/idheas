<html>

	<head>
	<?=$head?>
	</head>
		
	<body>
		<div class="twelve columns">
			<div class="four columns"> 	<!--Lista de victimas-->
					<div class="twelve columns espacioSuperior">
						<div class="six columns">
							<form action="<?= base_url(); ?>index.php/casos_c/mostrarVictimas/<?=$idActo; ?>/0/1" method="post">
								<center><input class="small button" value="Nueva víctima" type="submit"></center>
							</form>
						</div>
						<?php if ($idVictima>0) { ?>
							<div class="six columns">
								<form action="<?= base_url(); ?>index.php/casos_c/eliminarVictima/<?=$idActo; ?>/<?=$victimas['victimas'][$idVictima]['victimaId']; ?>">
								<center><input class="small button" value="Eliminar víctima" type="submit"></center>
								</form>
							</div>
							<div class="twelve columns">
								<form action="http://localhost/idheas/index.php/casos_c/mostrarVictimas/<?=$idActo; ?>/<?=$idVictima; ?>/1" method="post">
									<center><input class="small button" value="Editar víctima" type="submit"></center>
								</form>
							</div>
						<?php }?>
					</div>
					
				<div class="twelve columns panel">
					<div class="four columns"> <b>Foto</b> </div>
					<div class="eight columns">	<b>Nombre</b> </div>
				</div>
				<div class="twelve columns lineasLista" >
					<?php if (isset($victimas['victimas'])) {
						foreach ($victimas['victimas'] as $victima) { ?>
							 <a href="<?=base_url(); ?>index.php/casos_c/mostrarVictimas/<?=$idActo; ?>/<?=$victima['victimaId']; ?>/0">
							 	<div class="<?= $idVictima==($victima['actorId']) ? "victimaSeleccionada" : "victimaNoSeleccionada" ;?>">
									<img class="four columns" style="width:90px !important; height:70px !important;" src="<?=base_url().$victima["foto"]; ?>" />
									<span class="eight columns"><?= $victima['nombre']." ".$victima['apellidosSiglas']?></span>
								</div>
							</a>
						<?php }
					} ?>
				</div>
			</div>	<!--Termina lista de victimas-->

			<!-- --------Comienza Formulario --------- -->
			<div class="eight columns"><!--Información general de la victima-->
				<div class="twelve columns">
				<form action="<?= ($idVictima>0) ? (base_url().'index.php/casos_c/editarVictima/'.$idActo.'/'.$victimas['victimas'][$idVictima]['victimaId']) : (base_url().'index.php/casos_c/guardarVictima/'.$idActo) ;?>" method="post" id="CasoForm" name="CasoForm"> 
					<fieldset>
						<legend>Información general</legend>
							<label>Victima</label><br/>
							<div class="twelve columns">


									<input type="hidden"  id="nameSeleccionado"  value="victimas_actorId"><!--Este campo me da el name al que hay modificar el value al agregar acto(SIRVE PARA AGREGAR ACTOR)-->

									<input type="hidden"  id="ValoresBotonCancelar" value="<?= ($idVictima>0) ? $victimas['victimas'][$idVictima]['actorId']."*".$victimas['victimas'][$idVictima]['nombre']." ".$victimas['victimas'][$idVictima]['apellidosSiglas']."*".$victimas['victimas'][$idVictima]['foto'] : "" ;  ?>"><!--Este campo da los valores en caso de que se cancele la ventana agregar actor-->

									<input type="hidden" onchange="valorID()" name="victimas_actorId" id="victimas_actorId" value="<?= ($idVictima>0) ? $victimas['victimas'][$idVictima]['actorId'] : " " ;?>" >

								<div id="vistaActorRelacionado"  >

					                <?php if($idVictima>0){ ?>    

					                <input type="hidden" value="<?=$idVictima; ?>" name="victimas_victimaId" />

					                <img class="three columns" style="width:120px !important; height:90px !important;" src="<?= (isset($victimas['victimas'][$idVictima]['foto'])) ? base_url().$victimas['victimas'][$idVictima]['foto'] : " " ; ?>" />
									<div class="nine columns"><h5><?=(isset($victimas['victimas'][$idVictima]['nombre'])) ? $victimas['victimas'][$idVictima]['nombre']." "	 : " " ; ?><?= (isset($victimas['victimas'][$idVictima]['apellidosSiglas'])) ? $victimas['victimas'][$idVictima]['apellidosSiglas'] : "" ;?></h5></div> 
					                <?php }?>

								</div>

								<input type="button" class="small button" onclick="seleccionarActorIndividual()" value="Agregar actor">
								<input type="button" class="small button" value="Eliminar actor" onclick="eliminaActor()">

							</div>
							<div class="twelve columns"> 
								<br /><label>Estado</label>	<br />
								<select name="victimas_estatusVictimaId" id="victimas_estatusVictimaId">
									<option></option>
									<?php if ($idVictima>0){
										foreach ($catalogos['estatusVictimaCatalogo'] as $estatus) { ?>
										<option value="<?= $estatus['estatusVictimaId'];?>" onclick="notasCatalogos('<?= $estatus['notas']; ?>')" <?= ($victimas['victimas'][$idVictima]['estatusVictimaId']==$estatus['estatusVictimaId']) ? "selected=selected" : "" ;?> ><?= $estatus['descripcion'];?></option>
									<?php }
									}else{ 
										foreach ($catalogos['estatusVictimaCatalogo'] as $estatus) { ?>
										<option value="<?= $estatus['estatusVictimaId'];?>" onclick="notasCatalogos('<?= $estatus['notas']; ?>')" ><?= $estatus['descripcion'];?></option>
										<?php } 
									}?>
								</select>
							</div>

							<div class="twelve columns">
								<br /><label>Comentarios sobre víctimas y perpetradores</label>	<br />
									 <textarea  placeholder="Escribir algun comentario"  rows="10" cols="100" name="victimas_comentarios" id="victimas_comentarios"  wrap="hard" ><?= ($idVictima>0) ? $victimas['victimas'][$idVictima]['comentarios'] : "" ; ?></textarea>
							</div>

					<div class="eight columns">
						<input type="submit" value="Guardar" class="small button"/>
					</div>
					<div class="four columns">
						<a href="<?=base_url(); ?>index.php/casos_c/mostrarVictimas/<?=$idActo;  ;?>/" class="small button">Cancelar</a>
					</div>
				</form>	
							<div class="twelve columns espacio">
								<br/><label>Perpetradores</label> <br/>

			            <table class="twelve columns">
			                <thead>
			                    <tr>
			                        <th>Apellido(s)</th>
			                        <th>Nombre(s)</th>
			                        <th>Institución/Organización</th>
			                        <th>Tipo perpetrador</th>
			                        <th>Accion(es)</th>
			                    </tr>
			                </thead>
			                <tbody>
								<?php if (isset($victimas['victimas'][$idVictima]['perpetradores'])) { ?>
			            			<?php foreach ($victimas['victimas'][$idVictima]['perpetradores'] as $key => $perpetrador) { ?>
			                			<tr>
					                        <td><?=(isset($perpetrador['perpetradorId'])) ? $catalogos['listaTodosActores'][$perpetrador['perpetradorId']]['nombre'] : ''; ?></td>
					                        <td><?=(isset($perpetrador['perpetradorId'])) ? $catalogos['listaTodosActores'][$perpetrador['perpetradorId']]['apellidosSiglas'] : ''; ?></td>
					                          <td><?=(isset($perpetrador['actorRelacionadoId'])&&($perpetrador['actorRelacionadoId']>0)) ? $catalogos['listaTodosActores'][$catalogos['relacionesActoresCatalogo'][$perpetrador['actorRelacionadoId']]['actorRelacionadoId']]['nombre'] : ''; ?></td>
					                        <td><?=(isset($perpetrador['tipoPerpetradorId'])&& isset($perpetrador['tipoPerpetradorNivel'])) ? $catalogos['tipoPerpetradorN'.$perpetrador['tipoPerpetradorNivel'].'Catalogo'][$perpetrador['tipoPerpetradorId']]['descripcion'] : ''; ?></td>
					                        <td>
					                        	<div class="twelve columns"><input class="tiny button" value="Editar" onclick="ventanaPerpetradores('<?=$idActo;?>', '<?= $victimas['victimas'][$idVictima]['victimaId']?>', '<?= $perpetrador['perpetradorVictimaId'] ?>')" type="button"> </div>
					                        	<div class="twelve columns">
					                        		<form method="POST" action="<?= base_url(); ?>index.php/casos_c/eliminarPerpetrador/<?=$idActo; ?>/<?=$victimas['victimas'][$idVictima]['victimaId']; ?>/<?= $perpetrador['perpetradorVictimaId']; ?>">
					                        		<input class="tiny button" type="submit"> 
					                        		</form>
					                        	</div>
					                        </td>
			                    		</tr>
				            		<?php } ?>
								<?php } ?>
			                </tbody>
			            </table>
			            <div class="twelve columns"> 
								<div class="three columns push-nine" >
									<?php if ($idVictima>0) {?>
										<input class="tiny button" value="nuevo perpetrador" onclick="ventanaPerpetradores('<?=$idActo;  ;?>', <?= $victimas['victimas'][$idVictima]['victimaId']?>, 0)" type="button">
									<?php }?>
								</div>
						</div>
							</div>

					</fieldset>
				</div>
			</div><!--Termina información general de la victima-->

<!-- --------Termina Formulario --------- -->
		</div>
	</body>	
</html> 