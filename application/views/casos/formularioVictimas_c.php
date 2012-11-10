<html>

	<head>
	<?=$head?>
	</head>
		
	<body>
		<div class="three columns">
			<span class"five columns"> <b>Foto</b> </span>
			<span class"seven columns">	<b>Nombre</b> </span>
			
			<div class="twelve columns">
				<?php if (isset($victimas)) {
					foreach ($variable as $key => $value) { ?>
						<img class="five columns" style="width:100px !important; height:70px !important;" src="<?=base_url().$actor['foto']; ?>" />
					<?php }
				} ?>
			</div>
		</div>
		<div class="nine columns"></div>
	</body>	
</html>