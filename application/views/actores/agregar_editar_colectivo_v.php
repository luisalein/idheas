<form action="<?=$action; ?>" method="post" enctype="multipart/form-data">
<div class="three columns">
            <?php if(isset($datosActor)){ ?>    

            <input type="hidden" value="<?=$actorId; ?>" name="actores_actorId" />
                <img class="twelve columns" src="<?=base_url().$datosActor['actores']['foto']; ?>" />
            <?php }?>


            <label>Foto </label>
                <input name="archivo" type="file" size="10" />  
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
					
<label for="tipoActor">Notas Tipo de actor colectivo</label>
<div id="notasTipoActorColectivo"></div>
<label for="tipoActor">Tipo de actor colectivo</label>
<span id="infoGralActores_tipoActorColectivoIdSelect">
<select name="infoGralActores_tipoActorColectivoId" id="infoGralActores_tipoActorColectivoId">
<option></option>
<?php if(isset($datosActor['infoGralActores']['tipoActorColectivoId'])){
foreach($catalogos['tipoActorColectivo'] as $key => $item): ?> <!--muestra los estados civiles-->
<option onclick="notasCatalogos('<?=$item['descripcion']; ?>','notasTipoActorColectivo')" value="<?=$item['tipoActorColectivoId']?>" <?=($datosActor['infoGralActores']['tipoActorColectivoId'] == $item['tipoActorColectivoId']) ? 'selected="selected"' : '' ; ?> > <?=$item['descripcion']?></option>
<?php endforeach; } else { ?>
<?php foreach($catalogos['tipoActorColectivo'] as $key => $item):?> <!--muestra los estados civiles-->
<option onclick="notasCatalogos('<?=$item['descripcion']; ?>','notasTipoActorColectivo')" value="<?=$item['tipoActorColectivoId']; ?>"><?=$item['descripcion']; ?></option>
<?php endforeach; } ?>
</select>
<input id="BotonmasinfoGralActores_tipoActorColectivoId" type="button" class="tiny button"  value="+" onclick="mostrarTexto(this)" />	
</span>
<span id="TextoEspecial_infoGralActores_tipoActorColectivoId" class="Escondido twelve columns"></span>

</div> <!--cierra six columns-->

<div class="six columns">

    <p>
    <label for="siglas">Siglas:</label>
            <input type="text" id="actores_apellidosSiglas" name="actores_apellidosSiglas" <?=(isset($datosActor['actores']['nombre']) ? 'value="'.$datosActor['actores']['apellidosSiglas'].'"' : ''); ?> required />
    </p>

    <label for="actividad">Actividad</label>
    <span id="infoGralActores_actividadSelect">
    <select name="infoGralActores_actividad" id="infoGralActores_actividad">
    <option > </option>
    <?php if(isset($datosActor['infoGralActores']['actividad'])){
    foreach($catalogos['ocupacionesCatalogo'] as $key => $item): ?> <!--muestra los estados civiles-->
    <?php if($item['tipoActorId'] == 2){ ?>
        <option  value="<?=$item['ocupacionId']?>" <?=($datosActor['infoGralActores']['actividad'] == $item['ocupacionId']) ? 'selected="selected"' : '' ; ?> > <?=$item['descripcion']?></option>
     <?php } ?>
    <?php endforeach; } else { ?>
    <?php foreach($catalogos['ocupacionesCatalogo'] as $key => $item):?> <!--muestra los estados civiles-->
    <?php if($item['tipoActorId'] == 2){ ?>
        <option value="<?=$item['ocupacionId']; ?>"><?=$item['descripcion']; ?></option>
     <?php } ?>
    <?php endforeach; } ?>
    </select>
    <input id="BotonmasinfoGralActores_actividad" type="button" class="tiny button"  value="+" onclick="mostrarTexto(this)" />	
    </span>
    <span id="TextoEspecial_infoGralActores_actividad" class="Escondido twelve columns"></span>

</div>	<!--six columns--> 


</fieldset>	<!--Termina Información general-->
<?php echo br(2);?>

<fieldset>
<legend>Dirección</legend>

<div class="six columns">  
<p>
<label for="ubicacion">Ubicación</label>
<input type="text"  name="direccionActor_direccion" value="<?=(isset($datosActor['direccionActor']['direccion'])) ? $datosActor['direccionActor']['direccion'] : ''; ?>" size="30"    />
</p>

<label for="paisdir">País</label>
<div id="2direccionActor_paisesCatalogo_paisIdSelect" class="twelve columns">
<select name="direccionActor_paisesCatalogo_paisId" id="2direccionActor_paisesCatalogo_paisId">
<option></option>
<?php if(isset($datosActor['direccionActor']['paisesCatalogo_paisId'])){
foreach($catalogos['paisesCatalogo'] as $key => $item): ?> <!--muestra los estados civiles-->
<option  value="<?=$item['paisId']?>" <?=($datosActor['direccionActor']['paisesCatalogo_paisId'] == $item['paisId']) ? 'selected="selected"' : '' ; ?> > <?=$item['nombre']?></option>
<?php endforeach; } else { ?>
<?php foreach($catalogos['paisesCatalogo'] as $pais):?> <!--muestra los estados civiles-->
    <option value="<?=$pais['paisId']; ?>"><?=$pais['nombre']; ?></option>
<?php endforeach; } ?>
</select>
<input id="Botonmas2direccionActor_paisesCatalogo_paisId" type="button" class="tiny button"  value="+" onclick="mostrarTexto2(this)" />	
</div>
<span id="TextoEspecial_2direccionActor_paisesCatalogo_paisId" class="Escondido twelve columns">	</span>


<label for="estadodir">Estado</label>
<span id="2direccionActor_estadosCatalogo_estadoIdSelect" class="twelve columns">
<select name="direccionActor_estadosCatalogo_estadoId"  id="2direccionActor_estadosCatalogo_estadoId" >
<option > </option>
<?php if(isset($datosActor['direccionActor']['estadosCatalogo_estadoId'])){
foreach($catalogos['estadosCatalogo'] as $item): ?> <!--muestra los estados civiles-->
<option  value="<?=$item['estadoId']?>" <?=($datosActor['direccionActor']['estadosCatalogo_estadoId'] == $item['estadoId']) ? 'selected="selected"' : '' ; ?> > <?=$item['nombre']?></option>
<?php endforeach; } else { ?>
<?php foreach($catalogos['estadosCatalogo'] as $estado):?><!--muestra los estados civiles-->
<option value="<?=$estado['estadoId']; ?>"><?=$estado['nombre']; ?></option>
<?php endforeach; } ?>
</select>
<input id="Botonmas2direccionActor_estadosCatalogo_estadoId" type="button" class="tiny button"  value="+" onclick="mostrarTexto2(this)" />	
</span>
<span id="TextoEspecial_2direccionActor_estadosCatalogo_estadoId" class="Escondido twelve columns"></span>

</div>

<div class="six columns">
<label for="municipioId">Municipio</label>
<span id="2direccionActor_municipiosCatalogo_municipioIdSelect" >
<select name="direccionActor_municipiosCatalogo_municipioId" id="direccionActor_municipiosCatalogo_municipioId">
<option></option>
    <?php if(isset($datosActor['direccionActor']['municipiosCatalogo_municipioId'])){ ?>
        <?php foreach($catalogos['municipiosCatalogo'] as $key => $item):?> <!--muestra los estados civiles-->
                <option value="<?=$item['municipioId']; ?>" <?=($datosActor['direccionActor']['municipiosCatalogo_municipioId'] == $item['municipioId']) ? 'selected="selected"' : '' ; ?>><?=$item['nombre']; ?></option>
        <?php endforeach; ?>
    <?php } else { ?>
        <?php foreach($catalogos['municipiosCatalogo'] as $key => $item):?> <!--muestra los estados civiles-->
            <option value="<?=$item['municipioId']; ?>"><?=$item['nombre']; ?></option>
        <?php endforeach; ?>
    <?php } ?>
</select>
<input id="Botonmas2direccionActor_municipiosCatalogo_municipioId" type="button" class="tiny button"  value="+" onclick="mostrarTexto2(this)" />	
</span>
<span id="TextoEspecial_2direccionActor_municipiosCatalogo_municipioId" class="Escondido twelve columns"></span>

<p>
<label for="codigoPos">Código Postal</label>
<input type="text"  name="actores_codigoPostal"  <?=(isset($datosActor['actores']['codigoPostal']) ? 'value="'.$datosActor['actores']['codigoPostal'].'"' : ''); ?>  size="30"  />
</p>

</div> <!--six columns -->


</fieldset><!--Termina dirección-->
<fieldset>

<legend>Información de contacto</legend>

<div class="six columns">
<p>
<label for="telefono">Teléfono</label>
<input type="text" id="infoContacto_telefono" name="infoContacto_telefono" <?=(isset($datosActor['infoContacto']['telefono']) ? 'value="'.$datosActor['infoContacto']['telefono'].'"' : ''); ?>  size="30"  />
</p>

<p>
<label for="fax">Fax</label>
<input type="text" id="infoContacto_fax" name="infoContacto_fax"  <?=(isset($datosActor['infoContacto']['fax']) ? 'value="'.$datosActor['infoContacto']['fax'].'"' : ''); ?>  size="30" />
</p>

</div> <!-- six columns -->

<div class="six columns">

<p>
<label for="correo">Correo electrónico</label>
<input type="email" id="infoContacto_correoE" name="infoContacto_correoE"  <?=(isset($datosActor['infoContacto']['correoE']) ? 'value="'.$datosActor['infoContacto']['correoE'].'"' : ''); ?>  size="30"  />
</p> 

<p>
<label for="paginaPersonal">Página web</label>
<input type="text" id="infoGralActores_paginaWeb" name="infoGralActores_paginaWeb"  <?=(isset($datosActor['infoGralActores']['paginaWeb']) ? 'value="'.$datosActor['infoGralActores']['paginaWeb'].'"' : ''); ?>  size="30" />
</p>

</div> <!--six columns-->

</fieldset><!--Termina información de contacto-->

<?php echo br(2);?>

<div class="row">
<div  class="six columns offset-by-six" >

<input class="medium button" type="submit" value="Guardar" />
<input onClick="pagInicial()" class="medium button" type="reset" value="Cancelar"  />
</div>
</div>

</div>
</div>
</form>