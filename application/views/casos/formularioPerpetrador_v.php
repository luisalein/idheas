<html>	
	<head>
		<?=$head?>
	</head>

	<body>
		<form>

			<input type="hidden"  id="nameSeleccionado"  value="perpetradores_perpetradorId"><!--Este campo me da el name al que hay modificar el value al agregar acto(SIRVE PARA AGREGAR PERPETRADOR)-->

			<input type="hidden"  id="ValoresBotonCancelar" value="<?= (isset($perpetrador['perpetradorId'])&&($perpetrador['perpetradorId']!=0)) ? $perpetrador['perpetradorId']."*".$catalogos['listaTodosActores'][$perpetrador['perpetradorId']]['nombre']." ".$catalogos['listaTodosActores'][$perpetrador['perpetradorId']]['apellidosSiglas']."*".$catalogos['listaTodosActores'][$perpetrador['perpetradorId']]['foto'] : "" ;  ?>"><!--Este campo da los valores en caso de que se cancele la ventana agregar actor-->

			<input type="hidden" name="perpetradores_perpetradorId" id="perpetradores_perpetradorId" value="<?= (isset($perpetrador['perpetradorId'])) ? $perpetrador['perpetradorId'] : " " ;?>" >

			<fieldset>
				<legend>Información general</legend>
					<pre><?= print_r($perpetrador)?></pre>
					<pre><?= print_r($catalogos['listaTodosActores'][$perpetrador['perpetradorId']]['nombre'])?></pre>
				<label>Perpetrador</label>

					<div id="vistaActorRelacionado"  >

		                <?php if(isset($perpetrador['perpetradorId'])){ ?>    
		                <div class="three columns" >
		                <img style="width:120px !important; height:150px !important;" src="<?= (isset($catalogos['listaTodosActores'][$perpetrador['perpetradorId']]['foto'])) ? base_url().$catalogos['listaTodosActores'][$perpetrador['perpetradorId']]['foto'] : " " ; ?>" />
						</div>
						<div class="nine columns"><h5><?=(isset($catalogos['listaTodosActores'][$perpetrador['perpetradorId']]['nombre'])) ? $catalogos['listaTodosActores'][$perpetrador['perpetradorId']]['nombre']." "	 : " " ; ?><?= (isset($catalogos['listaTodosActores'][$perpetrador['perpetradorId']]['apellidosSiglas'])) ? $catalogos['listaTodosActores'][$perpetrador['perpetradorId']]['apellidosSiglas'] : "" ;?>
						</h5></div> 
		                <?php }?>

					</div>

					<input type="button" class="small button" onclick="seleccionarActorIndividual()" value="Agregar actor">
					<input type="button" class="small button" value="Eliminar actor" onclick="eliminaActor()">
			</fieldset>
			<input type="submit" value="Guardar" class="tiny button">
		</form>
	</body>
</html>	
