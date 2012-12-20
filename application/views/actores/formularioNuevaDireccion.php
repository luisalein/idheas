<!-------------------Comienza la parte de detalles del lugar------------------------------------>
<html>

	<head>
    <?=$head; ?>

	</head>
	<script>
		
		window.onunload = function(){
		   window.opener.clearDiv();
		}
	</script>
<body>
	<input type="hidden" id="tipoActorAE"  name="3"/>
	<form action='<?= (isset($datosActor)) ? (base_url().'index.php/actores_c/actualizaDireccion'.'/'.$datosActor['direccionId'].'/'.$actorId) : (base_url().'index.php/actores_c/agregarDireccion'.'/'.$actorId) ;?>' id="menuForm" name="menuForm" method="post" accept-charset="utf-8">
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

                <label for="direccionActor_direccion">Ubicación</label>
                <input type="text" id="direccionActor_direccion" name="direccionActor_direccion"  <?=(isset($datosActor['direccion']) ? 'value="'.$datosActor['direccion'].'"' : ''); ?> />
                <label for="direccionActor_codigoPostal">Código Postal</label>
                <input type="number" id="direccionActor_codigoPostal" pattern="[0-9]+" name="direccionActor_codigoPostal"  <?=(isset($datosActor['codigoPostal']) ? 'value="'.$datosActor['codigoPostal'].'"' : ''); ?> />
                </div>
                
                <div class="six columns">
                    <?= $filtroDireccion?>                                               
                </div>
            </fieldset><!--Termina datos dirección-->
           	<input style="float: right;margin:20px 25px 0px 0px;padding: 9px 20px 9px 20px !important;" onclick="cerrarVentana()" type="button" class="medium button"  value="cancelar">
            <input style="float: right;margin:20px 25px 0px 0px	" type="submit" class="medium button"  value="guardar">
    </form>
</body>
</html>

