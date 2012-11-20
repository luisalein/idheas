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
					<?php if (isset($victimas)) {
						foreach ($victimas['victimas'] as $victima) { ?>
							 <a href="<?=base_url(); ?>index.php/casos_c/mostrarVictimas/<?=$idActo; ?>/<?=$victima['victimaId']; ?>/0">
							 	<div class="<?= $idVictima==($victima['victimaId']) ? "victimaSeleccionada" : "victimaNoSeleccionada" ;?>">
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
				<fieldset>
					<legend>Información general</legend>
						<label>Victima</label><br/>
						<div class="twelve columns">

								<input type="hidden"  id="nameSeleccionado"  value="victimas_actorId"><!--Este campo me da el name al que hay modificar el value al agregar acto(SIRVE PARA AGREGAR ACTOR)-->

								<input type="hidden"  id="ValoresBotonCancelar" value="<?= (isset($victimas['victimas'][$idVictima]['actorId'])&&($victimas['victimas'][$idVictima]['actorId']!=0)) ? $victimas['victimas'][$idVictima]['actorId']."*".$victimas['victimas'][$idVictima]['nombre']." ".$victimas['victimas'][$idVictima]['apellidosSiglas']."*".$victimas['victimas'][$idVictima]['foto'] : "" ;  ?>"><!--Este campo da los valores en caso de que se cancele la ventana agregar actor-->

								<input type="hidden" name="victimas_actorId" id="victimas_actorId" value="<?= (isset($victimas['victimas'][$idVictima]['actorId'])) ? $victimas['victimas'][$idVictima]['actorId'] : " " ;?>" >

							
							<div id="vistaActorRelacionado"  >

				                <?php if(isset($victimas['victimas'][$idVictima])){ ?>    

				                <input type="hidden" value="<?=$idVictima; ?>" name="victimas_victimaId" />

				                <img class="three columns" src="<?=base_url().$victimas['victimas'][$idVictima]['foto']; ?>" />
								<div class="nine columns"><h5><?= $victimas['victimas'][$idVictima]['nombre']." ".$victimas['victimas'][$idVictima]['apellidosSiglas'] ?></h5></div> 
				                <?php }?>

							</div>

							<input type="button" class="small button" onclick="seleccionarActorIndividual()" value="Agregar actor">
							<input type="button" class="small button" value="Eliminar actor">

						</div>
						<div class="twelve columns"> 
							<br /><label>Estado</label>	<br />
							<select name="victimas_estatusVictimaId" id="victimas_estatusVictimaId">
								<option></option>
								<?php if (isset($victimas['victimas'][$idVictima]['estatusVictimaId']) ){
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
								 <textarea  placeholder="Escribir algun comentario"  rows="10" cols="100" name="victmas_comentarios" id="victmas_comentarios" wrap="hard" >
								<?= (isset($victimas['victimas'][$idVictima]['comentarios'])) ? $victimas['victimas'][$idVictima]['comentarios'] : "" ; ?>
					            </textarea>
						</div>

						<div class="twelve columns espacio">
							<br/><label>Perpetradores</label> <br/>
							<div class="two columns push-ten" >
								<input class="small button" value="nuevo perpetrador" type="button">
							</div>

						</div>

				</fieldset>
				</div>
			</div><!--Termina información general de la victima-->

<!-- --------Termina Formulario --------- -->
		</div>
	</body>	
</html> 