<html>

	<head>
	<?=$head?>
	</head>
		
	<body>
		<div class="twelve columns">
			<div class="four columns"> 	<!--Lista de victimas-->

				<div class="twelve columns espacioSuperior">
					<?php if ($idVictima>0) {?>
						<div class="six columns">
							<form action="<?= base_url(); ?>index.php/casos_c/eliminarVictima/<?=$idActo; ?>/<?=$victimas['victimas'][$idVictima]['victimaId']; ?>">
							<center><input class="small button" value="Eliminar víctima" type="submit"></center>
							</form>
						</div>
						<div class="six columns">
							<form action="http://localhost/idheas/index.php/casos_c/mostrarVictimas/<?=$idActo; ?>/<?=$idVictima; ?>/1" method="post">
								<center><input class="small button" value="Editar víctima" type="submit"></center>
							</form>
						</div>
					<?php }?>
					<div  class="twelve columns">
						<form action="<?= base_url(); ?>index.php/casos_c/mostrarVictimas/<?=$idActo; ?>/0/1" method="post" >
							<center><input class="small button " value="Nueva víctima" type="submit"></center>
						</form>
					</div>
				</div>
				
<!-- 						<pre><?= print_r($victimas['victimas'][$idVictima]['victimaId'])?></pre>
						<pre><?= print_r($victimas)?></pre>
 -->
				<div class="twelve columns panel">
					<div class="four columns"> <b>Foto</b> </div>
					<div class="eight columns">	<b>Nombre</b> </div>
				</div>
				<div class="twelve columns lineasLista" >
					<?php if ($victimas!="0") {
						foreach ($victimas['victimas'] as $victima) { ?>
							 <a href="<?=base_url(); ?>index.php/casos_c/mostrarVictimas/<?=$idActo; ?>/<?=$victima['actorId']; ?>/0">
							 	<div class="<?= $idVictima==($victima['actorId']) ? "victimaSeleccionada" : "victimaNoSeleccionada" ;?>">
									<img class="four columns " style="width:90px !important; height:70px !important;" src="<?=base_url().$victima["foto"]; ?>" />
									<span class="eight columns"><?= $victima['nombre']." ".$victima['apellidosSiglas']?></span>
								</div>
							</a>	
						<?php }
					} ?>
				</div>
			</div>	<!--Termina lista de victimas-->
			<div class="eight columns"><!--Información general de la victima-->
				<div class="twelve columns">
				<fieldset>
					<legend>Información general</legend>
						<label>Victima</label><br/>
						<div class="twelve columns">
							<img class="three columns" style="width:100px !important; height:80px !important;" src="<?= ($idVictima>0) ? base_url().$victimas['victimas'][$idVictima]['foto'] : " " ; ?>"/>
							<div class="nine columns"> <?= ($idVictima>0) ? $victimas['victimas'][$idVictima]['nombre']." ".$victimas['victimas'][$idVictima]['apellidosSiglas'] : " " ; ?></div> 
						</div>
						<div class="twelve columns"> 
							<br /><label>Estado</label>	<br />
							<?= ($idVictima>0) ? $catalogos['estatusVictimaCatalogo'][$victimas['victimas'][$idVictima]['estatusVictimaId']]['descripcion'] : "" ;?><br />
						</div>

						<div class="twelve columns">
							<br /><label>Comentarios sobre víctimas y perpetradores</label>	<br />
							<div class="panel espacio">
								<?= ($idVictima>0) ? $victimas['victimas'][$idVictima]['comentarios'] : "" ; ?>
							</div>
						</div>

						<div class="twelve columns espacio">
							<br/><label>Perpetradores</label> <br/>



			            <table>
			                <thead>
			                    <tr>
			                        <th>Perpetrador</th>
			                        <th>Tipo perpetrador</th>
			                        <th>Tipo lugar</th>
			                        <th>Grado Involucramiento</th>
			                    </tr>
			                </thead>
			                <tbody>
								<?php if (isset($victimas['victimas'][$idVictima]['perpetradores'])) { ?>
			            			<?php foreach ($victimas['victimas'][$idVictima]['perpetradores'] as $key => $perpetrador) { ?>
			                			<tr>
					                        <td><?=(isset($perpetrador['perpetradorId'])) ? $perpetrador['perpetradorId'] : ''; ?></td>
					                        <td><?=(isset($perpetrador['tipoPerpetradorId'])&& isset($perpetrador['tipoPerpetradorNivel'])) ? $perpetrador['tipoPerpetradorNivel'] : ''; ?></td>
					                        <td><?=(isset($perpetrador['tipoLugarId'])) ? $perpetrador['tipoLugarId'] : ''; ?></td>
					                        <td><?=(isset($perpetrador['gradoInvolucramientoid'])&& isset($perpetrador['nivelInvolugramientoId'])) ? $perpetrador['nivelInvolugramientoId'] : ''; ?></td>
			                    		</tr>
				            		<?php } ?>
								<?php } ?>
			                </tbody>
			            </table>

						</div>

				</fieldset>


				</div>
			</div><!--Termina información general de la victima-->
		</div>
	</body>	
</html> 