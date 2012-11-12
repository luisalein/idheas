<html>

	<head>
	<?=$head?>
	</head>
		
	<body>
		<pre><?= print_r($catalogos['estatusVictimaCatalogo'])?></pre>
		<div class="twelve columns">
			<div class="four columns"> 	<!--Lista de victimas-->
				<div class="panel">
					<div class="four columns"> <b>Foto</b> </div>
					<div class="eight columns">	<b>Nombre</b> </div>
				</div>

				<div class="twelve columns lineasLista" >
					<?php if (isset($victimas)) {
						foreach ($victimas['victimas'] as $victima) { ?>
							<div class="<?= $idVictima==($victima['victimaId']) ? "victimaSeleccionada" : " " ;?>">
								<img class="four columns" style="width:90px !important; height:70px !important;" src="<?=base_url().$victima["foto"]; ?>" />
								<span class="eight columns"><?= $victima['nombre']." ".$victima['apellidosSiglas']?></span>
							</div>
						<?php }
					} ?>
				</div>
			</div>	<!--Termina lista de victimas-->
			<div class="eight columns"><!--Información general de la victima-->
				<div class="twelve columns">
				<fieldset>
					<legend>Información general</legend>
						<label>Victima</label><br/>
						<img class="three columns"src="<?= base_url().$victimas['victimas'][$idVictima]['foto'] ?>"/>
						<div class="nine columns"> <?= $victimas['victimas'][$idVictima]['nombre']." ".$victimas['victimas'][$idVictima]['apellidosSiglas'] ?></div> 
				</fieldset>
				</div>
			</div><!--Termina información general de la victima-->
		</div>
	</body>	
</html> 