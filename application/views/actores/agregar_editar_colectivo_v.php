<input type="hidden" id="tipoActorAE"  name="3"/>
<form action="<?=$action; ?>" method="post" enctype="multipart/form-data" id="menuForm" name="menuForm">
	
<div class="three columns">
            <?php if(isset($datosActor)){ ?>    

            <input type="hidden" value="<?=$actorId; ?>" name="actores_actorId" />
            <input type="hidden" value="<?=$actorId; ?>" name="direccionActor_actores_actorId" />
            <input type="hidden" value="<?=$actorId; ?>" name="infoGralActores_actores_actorId" />
                <img class="twelve columns" src="<?=base_url().$datosActor['actores']['foto']; ?>" />
            <?php }?>


            <label>Foto </label>
                <input name="archivo" type="file" size="10" accept="image/*" />  
                <input type="hidden" <?= (isset($datosActor['actores']['foto'])) ? 'value="'.$datosActor['actores']['foto'].'"' : "" ;?>  name="actores_foto" />
              
</div>


<div class="nine columns">
        <?php if(isset($actorId)){ ?>
        <input type="hidden" value="<?=$actorId; ?>" name="actores_actorId" />
    <?php } ?>
    <input type="hidden" value="3" name="actores_tipoActorId" />
<div	id="Actores" >
<fieldset >
<legend>Información general</legend>

<div class="six columns">
<p>
<label for="nombre">Nombre</label>
        <input autofocus type="text" id="actores_nombre" name="actores_nombre"  <?=(isset($datosActor['actores']['nombre']) ? 'value="'.$datosActor['actores']['nombre'].'"' : ''); ?> required />
</p>
					
<label for="tipoActor">Tipo de actor colectivo</label>
<span id="infoGralActores_tipoActorColectivoIdSelect">
<select name="infoGralActores_tipoActorColectivoId" id="infoGralActores_tipoActorColectivoId">
<option></option>
<?php if(isset($datosActor['infoGralActores']['tipoActorColectivoId'])){
foreach($catalogos['tipoActorColectivo'] as $key => $item): ?> <!--muestra los estados civiles-->
<option onclick="notasCatalogos('<?=$item['notas']; ?>','infoGralActores_tipoActorColectivoId','1')" value="<?=$item['tipoActorColectivoId']?>" <?=($datosActor['infoGralActores']['tipoActorColectivoId'] == $item['tipoActorColectivoId']) ? 'selected="selected"' : '' ; ?> > <?=$item['descripcion']?></option>
<?php endforeach; } else { ?>
<?php foreach($catalogos['tipoActorColectivo'] as $key => $item):?> <!--muestra los estados civiles-->
<option onclick="notasCatalogos('<?=$item['notas']; ?>','infoGralActores_tipoActorColectivoId','1')" value="<?=$item['tipoActorColectivoId']; ?>"><?=$item['descripcion']; ?></option>
<?php endforeach; } ?>
</select><div id="notasinfoGralActores_tipoActorColectivoId"></div>
</span>
<!--<input id="BotonmasinfoGralActores_tipoActorColectivoId" type="button" class="tiny button"  value="+" onclick="mostrarTexto(this)" />   
<span id="TextoEspecial_infoGralActores_tipoActorColectivoId" class="Escondido twelve columns"></span>-->

</div> <!--cierra six columns-->

<div class="six columns">

    <p>
    <label for="siglas">Siglas:</label>
            <input type="text" id="actores_apellidosSiglas" name="actores_apellidosSiglas" <?=(isset($datosActor['actores']['nombre']) ? 'value="'.$datosActor['actores']['apellidosSiglas'].'"' : 'value=""'); ?> required />
    </p>

    <label for="actividad">Actividad</label>
    <span id="infoGralActores_actividadSelect">
    <select name="infoGralActores_actividad" id="infoGralActores_actividad">
    <option > </option>
    <?php if(isset($datosActor['infoGralActores']['actividad'])){
    foreach($catalogos['ocupacionesCatalogo'] as $key => $item): ?> <!--muestra los estados civiles-->
    <?php if($item['tipoActorId'] == 2){ ?>
        <option onclick="notasCatalogos('<?=$item['notas']; ?>','infoGralActores_actividad','1')" value="<?=$item['ocupacionId']?>" <?=($datosActor['infoGralActores']['actividad'] == $item['ocupacionId']) ? 'selected="selected"' : '' ; ?> > <?=$item['descripcion']?></option>
     <?php } ?>
    <?php endforeach; } else { ?>
    <?php foreach($catalogos['ocupacionesCatalogo'] as $key => $item):?> <!--muestra los estados civiles-->
    <?php if($item['tipoActorId'] == 2){ ?>
        <option onclick="notasCatalogos('<?=$item['notas']; ?>','infoGralActores_actividad','1')" value="<?=$item['ocupacionId']; ?>"><?=$item['descripcion']; ?></option>
     <?php } ?>
    <?php endforeach; } ?>
    </select><div id="notasinfoGralActores_actividad"></div>
    </span>
    <!--<input id="BotonmasinfoGralActores_actividad" type="button" class="tiny button"  value="+" onclick="mostrarTexto(this)" />  
    <span id="TextoEspecial_infoGralActores_actividad" class="Escondido twelve columns"></span>-->

</div>	<!--six columns--> 


</fieldset>	<!--Termina Información general-->
<?php echo br(2);?>

<fieldset>

<legend>Información de contacto</legend>

<div class="six columns">
<p>
<label for="telefono">Teléfono</label>
<input type="text" id="infoContacto_telefono" name="infoContacto_telefono" <?=(isset($datosActor['infoContacto']['telefono']) ? 'value="'.$datosActor['infoContacto']['telefono'].'"' : 'value=""'); ?>  size="30"  />
</p>

<p>
<label for="fax">Fax</label>
<input type="text" id="infoContacto_fax" name="infoContacto_fax"  <?=(isset($datosActor['infoContacto']['fax']) ? 'value="'.$datosActor['infoContacto']['fax'].'"' : 'value=""'); ?>  size="30" />
</p>

</div> <!-- six columns -->

<div class="six columns">

<p>
<label for="correo">Correo electrónico</label>
<input type="email" id="infoContacto_correoE" name="infoContacto_correoE"  <?=(isset($datosActor['infoContacto']['correoE']) ? 'value="'.$datosActor['infoContacto']['correoE'].'"' : 'value=""'); ?>  size="30"  />
</p> 

<p>
<label for="paginaPersonal">Página web</label>
<input type="text" id="infoGralActores_paginaWeb" name="infoGralActores_paginaWeb"  <?=(isset($datosActor['infoGralActores']['paginaWeb']) ? 'value="'.$datosActor['infoGralActores']['paginaWeb'].'"' : 'value=""'); ?>  size="30" />
</p>

</div> <!--six columns-->

</fieldset><!--Termina información de contacto-->
<?php echo br(2);?>


<?php if (isset($datosActor['direccionActor'])) {?>
    <?php foreach ($datosActor['direccionActor'] as $direccion){?>
    <fieldset>
        <legend>Dirección</legend>
        <div class="twelve columns">  
			<div class="twelve columns"> 
	            <label for="ubicacion">Ubicación</label>
	            <input type="text"  name="direccionActor_direccion" value="<?=(isset($direccion['direccion'])) ? $direccion['direccion'] : ''; ?>" size="30"    />
           	</div>
            <?=$filtroPais;?>	           
        <!--<input id="Botonmas2direccionActor_municipiosCatalogo_municipioId" type="button" class="tiny button"  value="+" onclick="mostrarTexto2(this)" />    
        <span id="TextoEspecial_2direccionActor_municipiosCatalogo_municipioId" class="Escondido twelve columns"></span>-->
	        <div class="six columns"> 
		        <label for="codigoPos">Código Postal</label>
		        <input type="number"  name="direccionActor_codigoPostal" pattern="[0-9]+" <?=(isset($direccion['codigoPostal']) ? 'value="'.$direccion['codigoPostal'].'"' : 'value=""'); ?>  size="30"  />
			</div>
        </div> 


    </fieldset><!--Termina dirección-->
    <?php }
    }else{?>
        <fieldset>
                <legend>Dirección</legend>
                <div class="twelve columns">  
					<div class="twelve columns"> 
			            <label for="ubicacion">Ubicación</label>
			            <input type="text"  name="direccionActor_direccion" value="<?=(isset($direccion['direccion'])) ? $direccion['direccion'] : ''; ?>" size="30"    />
		           	</div>
		            <?=$filtroPais;?>	           
		        <!--<input id="Botonmas2direccionActor_municipiosCatalogo_municipioId" type="button" class="tiny button"  value="+" onclick="mostrarTexto2(this)" />    
		        <span id="TextoEspecial_2direccionActor_municipiosCatalogo_municipioId" class="Escondido twelve columns"></span>-->
			        <div class="six columns"> 
				        <label for="codigoPos">Código Postal</label>
				        <input type="number"  name="direccionActor_codigoPostal" pattern="[0-9]+" <?=(isset($direccion['codigoPostal']) ? 'value="'.$direccion['codigoPostal'].'"' : 'value=""'); ?>  size="30"  />
					</div>
		        </div> 
            </fieldset><!--Termina dirección-->
    <?php }?>

    <div class="row espacioInferior espacioSuperior">
        <div class="nine columns">
            <input class="medium button" type="submit" value="Guardar" />
        </div>      
</form>
        <div  class="three columns" >
                <a href="<?=base_url(); ?>index.php/actores_c/mostrar_actor/<?= (isset($actorId)) ? $actorId : "0" ;?>/3" class="medium button">Cancelar</a>
        </div>
    </div>

</div>
</div>