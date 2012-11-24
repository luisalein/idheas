<html>

	<head>
	<?=$head?>
	</head>
		
	<body>
		<div class="twelve columns">
			<div class="four columns"> 	<!--Lista de victimas-->

				<div class="twelve columns espacioSuperior">
					<div class="four columns">
						<form action="<?= base_url(); ?>index.php/casos_c/mostrarVictimas/<?=$idActo; ?>/0/1" method="post">
							<input class="small button" value="Nueva víctima" type="submit">
						</form>
					</div>
					<div class="five columns"><input class="small button" value="Eliminar víctima" type="button"></div>
					<div class="three columns">
						<form action="http://localhost/idheas/index.php/casos_c/mostrarVictimas/<?=$idActo; ?>/<?=$idVictima; ?>/1" method="post">
							<input class="small button" value="Editar víctima" type="submit">
						</form>
					</div>
				</div>
				

				<div class="twelve columns panel">
					<div class="four columns"> <b>Foto</b> </div>
					<div class="eight columns">	<b>Nombre</b> </div>
				</div>

				<div class="twelve columns lineasLista" >
					<?php if ($victimas=="0") {
						foreach ($victimas['victimas'] as $victima) { ?>
							 <a href="<?=base_url(); ?>index.php/casos_c/mostrarVictimas/<?=$idActo; ?>/<?=$victima['actorId']; ?>/0">
							 	<div class="<?= $idVictima==($victima['victimaId']) ? "victimaSeleccionada" : "victimaNoSeleccionada" ;?>">
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
							<img class="three columns"src="<?= ($idVictima>0) ? base_url().$victimas['victimas'][$idVictima]['foto'] : " " ; ?>"/>
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

						</div>

				</fieldset>


				</div>
			</div><!--Termina información general de la victima-->
		</div>
	</body>	
</html> 