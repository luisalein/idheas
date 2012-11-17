<!-------------------Comienza la parte de detalles del lugar------------------------------------>
<html>

	<head>
    <?=$head; ?>

	</head>
	
<body>
	<form action='<?= (isset($datosActor)) ? (base_url().'index.php/actores_c/actualizaDireccion'.'/'.$datosActor['direccionId'].'/'.$actorId) : (base_url().'index.php/actores_c/agregarDireccion'.'/'.$actorId) ;?>' id="menuForm" name="menuForm" method="post" accept-charset="utf-8">
            <fieldset>
            	<input type="hidden" id="tipoActorAE"  name="3"/>
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

                <label for="direccionActor_direccion">Ubicación</label>
                <input type="text" id="direccionActor_direccion" name="direccionActor_direccion"  <?=(isset($datosActor['direccion']) ? 'value="'.$datosActor['direccion'].'"' : ''); ?> />
                <label for="direccionActor_codigoPostal">Código Postal</label>
                <input type="number" id="direccionActor_codigoPostal" pattern="[0-9]+" name="direccionActor_codigoPostal"  <?=(isset($datosActor['codigoPostal']) ? 'value="'.$datosActor['codigoPostal'].'"' : ''); ?> />
                </div>
                
                <div class="six columns">
                    <?= $filtroDireccion?>                                               
                </div>
            </fieldset><!--Termina datos dirección-->
           	
            <input type="submit" class="small button"  value="guardar">
    </form>
</body>
</html>

