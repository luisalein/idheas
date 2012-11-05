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

	       <input type="hidden" value="<?=$casoId; ?>" name="lugares_casos_casoId" id="lugares_casos_casoId" />
	       <input type="hidden" <?=(isset($lugar['lugarId']) ? 'value="'.$lugar['lugarId'].'"'.' '.'name="lugares_lugarId"' : ''); ?>  id="lugares_lugarId" />

			<div class="four columns">
				<label for="pais">País</label>


    			    <select id="lugares_paisesCatalogo_paisId" name="lugares_paisesCatalogo_paisId">
					        <option value="1" data-imagesrc="<?=base_url(); ?>/statics/media/img/actores/1; ?>.jpg">
					        nombre1</option>
					        <option value="2" data-imagesrc="<?=base_url(); ?>/statics/media/img/actores/2; ?>.jpg">
					        nombre1</option>
					        <option value="3" data-imagesrc="<?=base_url(); ?>/statics/media/img/actores/3; ?>.jpg">
					        nombre1</option>
			    </select>
			    

			</div>
                 
			<div class="four columns">
				<label for="estado">Estado</label>
				<select id="lugares_estadosCatalogo_estadoId" name="lugares_estadosCatalogo_estadoId">
					<option></option>
					<?php if(isset($lugar)){
		                foreach($catalogos['estadosCatalogo'] as $key => $item): ?> <!--muestra los estados civiles-->
		            <option  onclick="paisEstadodoMunicipio(2,'<?=$item['estadoId']?>')" value="<?=$item['estadoId']?>" <?=($lugar['estadosCatalogo_estadoId'] == $item['estadoId']) ? 'selected="selected"' : '' ; ?> > <?=$item['nombre']?></option>
		            <?php endforeach; }
		            	else { ?>
		                <?php foreach($catalogos['estadosCatalogo'] as $pais):?> <!--muestra los estados civiles-->
		                <option onclick="paisEstadodoMunicipio(2,<?=$pais['estadoId']?>)" value="<?=$pais['estadoId']; ?>"><?=$pais['nombre']; ?></option>
		            <?php endforeach; } ?>
		        </select>
			</div>

			<div class="four columns">
				<label for="municipio">Municipio</label>
				<select id="lugares_municipiosCatalogo_municipioId" name="lugares_municipiosCatalogo_municipioId">						
					<option></option>
					<?php if(isset($lugar)){
		                foreach($catalogos['municipiosCatalogo'] as $key => $item): ?> <!--muestra los estados civiles-->
		            <option onclick="paisEstadodoMunicipio(3,'<?=$item['municipioId']?>')" value="<?=$item['municipioId']?>" <?=($lugar['municipiosCatalogo_municipioId'] == $item['municipioId']) ? 'selected="selected"' : '' ; ?> > <?=$item['nombre']?></option>
		            <?php endforeach; }
		            	else { ?>
		                <?php foreach($catalogos['municipiosCatalogo'] as $pais):?> <!--muestra los estados civiles-->
		                <option onclick="paisEstadodoMunicipio(3,<?=$pais['municipioId']?>)"  value="<?=$pais['municipioId']; ?>"><?=$pais['nombre']; ?></option>
		            <?php endforeach; } ?>
				</select>
			</div>

			<br />
			
			<input class="medium button" type="submit" value="Guardar"/>
		</div>
</div>
</body>
</html>

