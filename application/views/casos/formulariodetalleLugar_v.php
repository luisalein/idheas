<!-------------------Comienza la parte de detalles del lugar------------------------------------>
<html>

	<head>
    <?=$head; ?>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#lugares_paisesCatalogo_paisId').ddslick();
        });
    </script>
	</head>
	
<body>
<form action='<?=base_url(); ?>index.php/casosVentanas_c/guardarDatosVentanas/1' method="post" accept-charset="utf-8">
			<input type="hidden" id="tipoActorAE"  name="4"/>
	       <input type="hidden" value="<?=$casoId; ?>" name="lugares_casos_casoId" id="lugares_casos_casoId" />
	       <input type="hidden" <?=(isset($lugar['lugarId']) ? 'value="'.$lugar['lugarId'].'"'.' '.'name="lugares_lugarId"' : ''); ?>  id="lugares_lugarId" />

	       <div class="twelve columns">
				<?=$filtroPais;?>
			</div>
			<div>

			<?php echo br(4);?>		
			<input class="small button" type="submit" value="Guardar"/>
			<input class="small button" value="Cancelar" onclick="cerrarVentana()" />
			</div>
		</div>
</div>
</body>
</html>

