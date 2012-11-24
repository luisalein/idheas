<html>	
	<head>
		<?=$head?>
	</head>

	<body>
		<form>

			<input type="hidden"  id="nameSeleccionado"  value="perpetradores_perpetradorId"><!--Este campo me da el name al que hay modificar el value al agregar acto(SIRVE PARA AGREGAR PERPETRADOR)-->

			<input type="hidden"  id="ValoresBotonCancelar" value="<?= (isset($victimas['victimas'][$idVictima]['actorId'])&&($victimas['victimas'][$idVictima]['actorId']!=0)) ? $victimas['victimas'][$idVictima]['actorId']."*".$victimas['victimas'][$idVictima]['nombre']." ".$victimas['victimas'][$idVictima]['apellidosSiglas']."*".$victimas['victimas'][$idVictima]['foto'] : "" ;  ?>"><!--Este campo da los valores en caso de que se cancele la ventana agregar actor-->

			<input type="hidden" name="perpetradores_perpetradorId" id="perpetradores_perpetradorId" value="<?= (isset($victimas['victimas'][$idVictima]['actorId'])) ? $victimas['victimas'][$idVictima]['actorId'] : " " ;?>" >

			<fieldset>
				<legend>Información general</legend>

				<label>Perpetrador</label>

			</fieldset>
			<input type="submit" value="Guardar" class="tiny button">
		</form>
	</body>
</html>	
