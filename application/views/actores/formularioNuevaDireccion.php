<!-------------------Comienza la parte de detalles del lugar------------------------------------>
<html>

	<head>
    <?=$head; ?>

	</head>
	
<body>
	<form action='<?= (isset($datosActor)) ? (base_url().'index.php/actores_c/actualizaDireccion'.'/'.$datosActor['direccionId'].'/'.$actorId) : (base_url().'index.php/actores_c/agregarDireccion'.'/'.$actorId) ;?>' method="post" accept-charset="utf-8">
            <fieldset>
                <legend>Dirección</legend>
                <div class="six columns">
                <label for="direccionActor_tipoDireccionId">Tipo de dirección</label>
                <select  id="direccionActor_tipoDireccionId" name="direccionActor_tipoDireccionId">			
                <option></option>
                <?php if(isset($datosActor['tipoDireccionId'])){
                foreach($catalogos['tipoDireccion'] as $item):?> <!--muestra todas las edades de 1 a 100-->
                <option value="<?=$item['tipoDireccionId']; ?>" <?=($datosActor['tipoDireccionId'] == $item['tipoDireccionId']) ? 'selected="selected"' : '' ; ?>> <?=$item['descripcion']; ?></option>
                <?php endforeach;
                } else {
                foreach($catalogos['tipoDireccion'] as $item):?> <!--muestra todas las edades de 1 a 100-->
                <option value="<?=$item['tipoDireccionId']; ?>"> <?=$item['descripcion']; ?></option>
                <?php endforeach;
                } ?>
                </select>
                <input id="BotonmasdireccionActor_tipoDireccionId" type="button" class="tiny button"  value="+" onclick="mostrarTexto(this)" />	
                <label for="direccionActor_direccion">Ubicación</label>
                <input type="text" id="direccionActor_direccion" name="direccionActor_direccion"  <?=(isset($datosActor['direccion']) ? 'value="'.$datosActor['direccion'].'"' : ''); ?> />
                <label for="direccionActor_codigoPostal">Código Postal</label>
                <input type="text" id="direccionActor_codigoPostal" name="direccionActor_codigoPostal"  <?=(isset($datosActor['codigoPostal']) ? 'value="'.$datosActor['codigoPostal'].'"' : ''); ?> />
                </div>
                <div class="six columns">
                                                                   
                <label for="paisdir">País</label>
                <select id="direccionActor_paisesCatalogo_paisId" name="direccionActor_paisesCatalogo_paisId">						
                    <option></option>
                    <?php if(isset($datosActor['paisesCatalogo_paisId'])){
                        foreach($catalogos['paisesCatalogo'] as $key => $item): ?> <!--muestra los estados civiles-->
                        <option  value="<?=$item['paisId']?>" <?=($datosActor['paisesCatalogo_paisId'] == $item['paisId']) ? 'selected="selected"' : '' ; ?> > <?=$item['nombre']?></option>
                    <?php endforeach; } else { ?>
                        <?php foreach($catalogos['paisesCatalogo'] as $key => $item):?> <!--muestra los estados civiles-->
                        <option value="<?=$item['paisId']; ?>"><?=$item['nombre']; ?></option>
                    <?php endforeach; } ?>
                </select>

                <input id="BotonmasdireccionActor_paisesCatalogo_paisId" type="button" class="tiny button"  value="+" onclick="mostrarTexto(this)" />
                <label for="estadodir">Estado</label>

                <select id="direccionActor_estadosCatalogo_estadoId" name="direccionActor_estadosCatalogo_estadoId">						
                <option></option>
                <?php if(isset($datosActor['estadosCatalogo_estadoId'])){
                foreach($catalogos['estadosCatalogo'] as $item): ?> <!--muestra los estados civiles-->
                <option  value="<?=$item['estadoId']?>" <?=($datosActor['estadosCatalogo_estadoId'] == $item['estadoId']) ? 'selected="selected"' : '' ; ?> > <?=$item['nombre']?></option>
                <?php endforeach; } else { ?>
                <?php foreach($catalogos['estadosCatalogo'] as $key => $item):?> <!--muestra los estados civiles-->
                <option value="<?=$item['estadoId']; ?>"><?=$item['nombre']; ?></option>
                <?php endforeach; } ?>
                </select>	
                <input id="BotonmasdireccionActor_paisesCatalogo_paisId" type="button" class="tiny button"  value="+" onclick="mostrarTexto(this)" />

                <label for="municipiodir">Municipio</label>
                <select id="direccionActor_municipiosCatalogo_municipioId" name="direccionActor_municipiosCatalogo_municipioId">						
                    <?php if(isset($datosActor['municipiosCatalogo_municipioId'])){
                    foreach($catalogos['municipiosCatalogo'] as $key => $item): ?> <!--muestra los estados civiles-->
                        <option  value="<?=$item['municipioId']?>" <?=($datosActor['municipiosCatalogo_municipioId'] == $item['municipioId']) ? 'selected="selected"' : '' ; ?> > <?=$item['nombre']?></option>
                        <?php endforeach; } else { ?>
                        <option></option>
                    <?php foreach($catalogos['municipiosCatalogo'] as $key => $item):?> <!--muestra los estados civiles-->
                        <option value="<?=$item['municipioId']; ?>"><?=$item['nombre']; ?></option>
                    <?php endforeach; } ?>
                </select>
                <input id="BotonmasdireccionActor_municipiosCatalogo_municipioId" type="button" class="tiny button"  value="+" onclick="mostrarTexto(this)" />	
            </fieldset><!--Termina datos dirección-->
            <input type="submit" class="small button" value="guardar">
    </form>
</body>
</html>

