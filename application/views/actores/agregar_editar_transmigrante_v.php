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
<input type="hidden" value="2" name="actores_tipoActorId" />			
<div id="Actores" >


<fieldset>
<legend>Información general</legend>
<div class="six columns">

    <label for="nombre">Nombre</label>
    <input autofocus type="text" id="actores_nombre" name="actores_nombre"  <?=(isset($datosActor['actores']['nombre']) ? 'value="'.$datosActor['actores']['nombre'].'"' : ''); ?> required />

    <label for="apellidos">Apellidos</label>
            <input type="text" id="actores_apellidosSiglas" name="actores_apellidosSiglas" <?=(isset($datosActor['actores']['nombre']) ? 'value="'.$datosActor['actores']['apellidosSiglas'].'"' : ''); ?> required />

    <label for="alias">Alias</label>
            <input type="text" id="alias_alias" name="alias_alias" <?=(isset($datosActor['alias']['alias']) ? 'value="'.$datosActor['alias']['alias'].'"' : ''); ?> />

</div>

<div class="six columns">

<div class="seven columns">
    <label for="genero">Género</label>
    <?php if(isset($datosActor['infoGralActor']['generoId'])) { ?>
                <input type="radio" id="infoGralActor_generoid" name="infoGralActor_generoId" <?php if($datosActor['infoGralActor']['generoId'] == 1){ echo 'checked="checked"'; }?> value="1" />Hombre
                <input type="radio" id="infoGralActor_generoid" name="infoGralActor_generoId" <?php if($datosActor['infoGralActor']['generoId'] == 2){ echo 'checked="checked"'; }?> value="2" />Mujer
            <?php } else { ?>
                <input type="radio" id="infoGralActor_generoid" name="infoGralActor_generoId"  checked="checked" value="1" />Hombre
                <input type="radio" id="infoGralActor_generoid" name="infoGralActor_generoId"  value="2" />Mujer
            <?php } ?>
</div>

<div class="five columns">
    <label for="edad">Edad</label>
    <select name="infoGralActor_edad" id="infoGralActor_edad">					
    <option  > </option>	
                <?php if(isset($datosActor['infoGralActor']['edad'])){
                    for($i = 0; $i <= 100; $i++):?> <!--muestra todas las edades de 1 a 100-->
                        <option value="<?=$i?>" <?=($datosActor['infoGralActor']['edad'] == $i) ? 'selected=selected' : '' ?>><?=$i?></option>
                    <?php endfor;
                } else {
                    for($i = 0; $i <= 100; $i++):?> <!--muestra todas las edades de 1 a 100-->
                        <option value="<?=$i?>"><?=$i?></option>
                    <?php endfor;
                } ?>
    </select>
</div>

<label for="estadoCivil">Estado Civil</label>
<span class="twelve columns" id="infoGralActor_estadoCivil_estadoCivilIdSelect">
<select id="infoGralActor_estadoCivil_estadoCivilId" name="infoGralActor_estadoCivil_estadoCivilId"  >
<option></option>
<?php if(isset($datosActor['infoGralActor']['estadoCivil_estadoCivilId'])){
                foreach($catalogos['estadosCivilesCatalogo'] as $key => $item): ?> <!--muestra los estados civiles-->
                    <option  value="<?=$item['estadoCivilId']?>" <?=($datosActor['infoGralActor']['estadoCivil_estadoCivilId'] == $item['estadoCivilId']) ? 'selected="selected"' : '' ; ?> > <?=$item['descripcion']?></option>
                <?php endforeach;
            } else { ?>
                <?php foreach($catalogos['estadosCivilesCatalogo'] as $key => $item):?> <!--muestra los estados civiles-->
                    <option  value="<?=$item['estadoCivilId']?>" > <?=$item['descripcion']?></option>
                <?php endforeach; } ?>
</select>
<!--
</span>
<input id="BotonmasinfoGralActor_estadoCivil_estadoCivilId" type="button" class="tiny button"  value="+" onclick="mostrarTexto(this)" />    
<span id="TextoEspecial_infoGralActor_estadoCivil_estadoCivilId" class="Escondido twelve columns">
</span>-->


<label for="nacionalidadID">Nacionalidad</label>
    <select id="infoGralActor_nacionalidadIdSelect" name="infoGralActor_nacionalidadId">
        <option></option>
        <?php if(isset($datosActor['infoGralActor']['nacionalidadId'])){
                        foreach($catalogos['nacionalidadesCatalogo'] as $nacionalidad):?> <!--muestra todas las edades de 1 a 100-->
                            <option value="<?=$nacionalidad['nacionalidadId']; ?>" <?=($datosActor['infoGralActor']['nacionalidadId'] == $nacionalidad['nacionalidadId']) ? 'selected="selected"' : '' ; ?>> <?=$nacionalidad['nombre']; ?></option>
                        <?php endforeach;
                    } else {
                        foreach($catalogos['nacionalidadesCatalogo'] as $nacionalidad):?>
                            <option value="<?=$nacionalidad['nacionalidadId']; ?>"> <?=$nacionalidad['nombre'] ?></option>
                        <?php endforeach;
                    } ?>
    </select>


<!--<input id="BotonmasinfoGralActor_nacionalidadId" type="button" class="tiny button"  value="+" onclick="mostrarTexto(this)" />   
<span id="TextoEspecial_infoGralActor_nacionalidadId" class="Escondido twelve columns">
</span>-->

</div>

</fieldset>	<!--Termina información general-->

<fieldset>
<legend>Detalles</legend>
<div class="six columns">


    <label for="hijos">Hijos</label>
    <span class="twelve columns" id="infoGralActor_hijosSelect">
    <select name="infoGralActor_hijos" id="infoGralActor_hijos" >						
    <option></option>
    <?php if(isset($datosActor['infoGralActor']['hijos'])){
    for($edad = 0; $edad <= 100; $edad++):?> <!--muestra todas las edades de 1 a 100-->
    <option value="<?=$edad?>" <?=($datosActor['infoGralActor']['hijos'] == $edad) ? 'selected="selected"' : '' ; ?>> <?=$edad; ?></option>
    <?php endfor;
    } else {
    for($edad = 0; $edad <= 100; $edad++):?><!--muestra todas las edades de 1 a 100-->
    <option value="<?=$edad?>"><?=$edad?></option>
    <?php endfor;
    } ?>
    </select>
    </span>

    <!--<input id="BotonmasinfoGralActor_hijos" type="button" class="tiny button"  value="+" onclick="mostrarTexto(this)" />    
    <span id="TextoEspecial_infoGralActor_hijos" class="Escondido twelve columns">
    </span>-->


    <label for="genero">¿Habla español?</label>
    <?php if(isset($datosActor['inofGralActor']['espaniol'])){ ?>
        <input type="radio" id="infoGralActor_espaniol" name="infoGralActor_espaniol" <?=($datosActor['infoGralActor']['espaniol'] == 'Si') ? 'checked="checked"' : ''; ?> value="Si" />Si
        <input type="radio" id="infoGralActor_espaniol" name="infoGralActor_espaniol" <?=($datosActor['infoGralActor']['espaniol'] == 'No') ? 'checked="checked"' : ''; ?> value="No" />No
    <?php } else { ?>
        <input type="radio" id="infoGralActor_espaniol" name="infoGralActor_espaniol" checked="checked" value="Si" />Si
        <input type="radio" id="infoGralActor_espaniol" name="infoGralActor_espaniol" value="No" />No
    <?php } ?>


    <label for="grupoIndigena">Grupo Indígena</label>
    <span class="twelve columns" id="infoGralActor_gruposIndigenas_grupoIndigenaIdSelect">
        <select name="infoGralActor_gruposIndigenas_grupoIndigenaId" id="infoGralActor_gruposIndigenas_grupoIndigenaId">
        <option></option>
        <?php if(isset($datosActor['infoGralActor']['gruposIndigenas_grupoIndigenaId'])){
        foreach($catalogos['gruposIndigenasCatalogo'] as $key => $item): ?> <!--muestra los estados civiles-->
        <option  value="<?=$item['grupoIndigenaId']?>" <?=($datosActor['infoGralActor']['gruposIndigenas_grupoIndigenaId'] == $item['grupoIndigenaId']) ? 'selected="selected"' : '' ; ?> > <?=$item['descripcion']?></option>
        <?php endforeach; } else { ?>
        <?php foreach($catalogos['gruposIndigenasCatalogo'] as $key => $item):?> <!--muestra los estados civiles-->
        <option  value="<?=$item['grupoIndigenaId']; ?>"><?=$item['descripcion']; ?></option>
        <?php endforeach; } ?>
        </select>
    </span>
        <!--<input id="BotonmasinfoGralActor_gruposIndigenas_grupoIndigenaId" type="button" class="tiny button"  value="+" onclick="mostrarTexto(this)" />	
    <span id="TextoEspecial_infoGralActor_gruposIndigenas_grupoIndigenaId" class="Escondido twelve columns">
    </span>-->



</div>
<div class="six columns">


<label for="nivelEscolaridad">Nivel de Escolaridad</label>
<select id="infoGralActor_escolaridadId" name="infoGralActor_escolaridadId">                        
    <option></option>
    <?php if(isset($datosActor['infoGralActor']['escolaridadId'])){
        foreach($catalogos['nivelEscolaridad'] as $key => $item):?> <!--muestra todas las edades de 1 a 100-->
        <option  value="<?=$item['nivelEscolaridadId']; ?>" <?=($datosActor['infoGralActor']['escolaridadId'] == $item['nivelEscolaridadId']) ? 'selected="selected"' : '' ; ?>> <?=$item['descripcion']; ?></option>
    <?php endforeach;
    } else {
        foreach($catalogos['nivelEscolaridad'] as $key => $item):?> <!--muestra todas las edades de 1 a 100-->
        <option value="<?=$item['nivelEscolaridadId'] ?>"> <?=$item['descripcion']; ?></option>
    <?php endforeach;}?>    
</select>

</span>
<!--<input id="BotonmasinfoGralActor_escolaridadId" type="button" class="tiny button"  value="+" onclick="mostrarTexto(this)" />    
<span id="TextoEspecial_infoGralActor_escolaridadId" class="Escondido twelve columns">
</span>-->

<label for="UltimaOcupacion">Notas Última Ocupación</label>
<div id="notasUltimaOcupacion"></div>
<label for="UltimaOcupacion">Última Ocupación</label>
<select id="infoGralActor_ocupacionesCatalogo_ultimaOcupacionId" name="infoGralActor_ocupacionesCatalogo_ultimaOcupacionId">                        
    <option></option>
    <?php if(isset($datosActor['infoGralActor']['ocupacionesCatalogo_ultimaOcupacionId'])){
        foreach($catalogos['ocupacionesCatalogo'] as $key => $item): ?> <!--muestra los estados civiles-->
            <?php if($item['tipoActorId'] == 1){ ?>
                    <option onclick="notasCatalogos('<?=$item['notas']; ?>','notasUltimaOcupacion')" value="<?=$item['ocupacionId']?>" <?=($datosActor['infoGralActor']['ocupacionesCatalogo_ultimaOcupacionId'] == $item['ocupacionId']) ? 'selected="selected"' : '' ; ?> > <?=$item['descripcion']?></option>
                 <?php } ?>
        <?php endforeach; } 
        else { ?>
            <?php foreach($catalogos['ocupacionesCatalogo'] as $key => $item):?> <!--muestra los estados civiles-->
                <?php if($item['tipoActorId'] == 1){ ?>
                    <option onclick="notasCatalogos('<?=$item['notas']; ?>','notasUltimaOcupacion')" value="<?=$item['ocupacionId']; ?>"><?=$item['descripcion']; ?></option>
                <?php } ?>
    <?php endforeach; } ?>
</select>

</span>
<!--<input id="BotonmasinfoGralActor_ocupacionesCatalogo_ultimaOcupacionid" type="button" class="tiny button"  value="+" onclick="mostrarTexto(this)" />    
<span id="TextoEspecial_infoGralActor_ocupacionesCatalogo_ultimaOcupacionid" class="Escondido twelve columns">
</span> -->

</div>


</fieldset><!--Termina Detalles-->
<fieldset>	
<legend>Información Migratoria</legend>

<div class="twelve columns">
<fieldset>		
    <legend>Lugar de origen</legend>

    <div class="four columns">		

    <label for="pais">País</label>
    <div class="twelve columns" id="datosDeNacimiento_paisesCatalogo_paisIdSelect">
        <select id="datosDeNacimiento_paisesCatalogo_paisId" name="datosDeNacimiento_paisesCatalogo_paisId">
        <option></option>
        <?php if(isset($datosActor['datosDeNacimiento']['paisesCatalogo_paisId'])){
        foreach($catalogos['paisesCatalogo'] as $key => $item): ?> <!--muestra los estados civiles-->
        <option  value="<?=$item['paisId']?>" <?=($datosActor['datosDeNacimiento']['paisesCatalogo_paisId'] == $item['paisId']) ? 'selected="selected"' : '' ; ?> > <?=$item['nombre']?></option>
        <?php endforeach; } else { ?>
        <?php foreach($catalogos['paisesCatalogo'] as $pais):?> <!--muestra los estados civiles-->
            <option value="<?=$pais['paisId']; ?>"><?=$pais['nombre']; ?></option>
        <?php endforeach; } ?>
        </select>
    </div>
    <!--<input id="BotonmasdatosDeNacimiento_paisesCatalogo_paisId" type="button" class="tiny button"  value="+" onclick="mostrarTexto(this)" />    
    <span id="TextoEspecial_datosDeNacimiento_paisesCatalogo_paisId" class="Escondido twelve columns">
    </span>-->

    </div>

    <div class="four columns">
        <label for="estado">Estado</label>
        <div id="datosDeNacimiento_estadosCatalogo_estadoIdSelect" class="twelve columns" >
            <select name="datosDeNacimiento_estadosCatalogo_estadoId">
            <option></option>
            <?php if(isset($datosActor['datosDeNacimiento']['estadosCatalogo_estadoId'])){
            foreach($catalogos['estadosCatalogo'] as $item): ?> <!--muestra los estados civiles-->
            <option  value="<?=$item['estadoId']?>" <?=($datosActor['datosDeNacimiento']['estadosCatalogo_estadoId'] == $item['estadoId']) ? 'selected="selected"' : '' ; ?> > <?=$item['nombre']?></option>
            <?php endforeach; } else { ?>
            <?php foreach($catalogos['estadosCatalogo'] as $estado):?><!--muestra los estados civiles-->
            <option value="<?=$estado['estadoId']; ?>"><?=$estado['nombre']; ?></option>
            <?php endforeach; } ?>
            </select>
        </div>
        <!--<input id="BotonmasdatosDeNacimiento_paisesCatalogo_paisId" type="button" class="tiny button"  value="+" onclick="mostrarTexto(this)" />    
        <span id="TextoEspecial_datosDeNacimiento_paisesCatalogo_paisId" class="Escondido twelve columns">
        </span>-->
    </div>

    <div class="four columns">
        <div id="datosDeNacimiento_municipiosCatalogo_municipioIdSelect" class="twelve columns">
            <label for="municipio">Municipio</label>
            <select id="datosDeNacimiento_municipiosCatalogo_municipioId" name="datosDeNacimiento_municipiosCatalogo_municipioId">
            <option></option>
                <?php if(isset($datosActor['datosDeNacimiento']['municipiosCatalogo_municipioId'])){ ?>
                    <?php foreach($catalogos['municipiosCatalogo'] as $key => $item):?> <!--muestra los estados civiles-->
                            <option value="<?=$item['municipioId']; ?>" <?=($datosActor['datosDeNacimiento']['municipiosCatalogo_municipioId'] == $item['municipioId']) ? 'selected="selected"' : '' ; ?>><?=$item['nombre']; ?></option>
                    <?php endforeach; ?>
                <?php } else { ?>
                    <?php foreach($catalogos['municipiosCatalogo'] as $key => $item):?> <!--muestra los estados civiles-->
                        <option value="<?=$item['municipioId']; ?>"><?=$item['nombre']; ?></option>
                    <?php endforeach; ?>
                <?php } ?>
            </select>
        </div>
        <!--<input id="BotonmasdatosDeNacimiento_municipiosCatalogo_municipioId" type="button" class="tiny button"  value="+" onclick="mostrarTexto(this)" />   
        <span id="TextoEspecial_datosDeNacimiento_municipiosCatalogo_municipioId" class="Escondido twelve columns">
        </span>-->
    </div>

</fieldset>	<!--Termina lugar de origen-->									
</div>

<div class="twelve columns espacioSuperior">
</div>
    <div class="six columns">

        <label for="paistrans">País de tránsito</label>
        <div id="infoMigratoria_paisTransitoIdSelect" class="twelve columns">
            <select name="infoMigratoria_paisTransitoId" id="infoMigratoria_paisTransitoId">
            <option></option>
            <?php if(isset($datosActor['infoMigratoria']['paisTransitoId'])){
            foreach($catalogos['paisesCatalogo'] as $key => $item): ?> <!--muestra los estados civiles-->
            <option  value="<?=$item['paisId']?>" <?=($datosActor['infoMigratoria']['paisTransitoId'] == $item['paisId']) ? 'selected="selected"' : '' ; ?> > <?=$item['nombre']?></option>
            <?php endforeach; } else { ?>
            <?php foreach($catalogos['paisesCatalogo'] as $pais):?> <!--muestra los estados civiles-->
                <option value="<?=$pais['paisId']; ?>"><?=$pais['nombre']; ?></option>
            <?php endforeach; } ?>
            </select>
            </div>
        <!--<input id="BotonmasinfoMigratoria_paisTransitoId" type="button" class="tiny button"  value="+" onclick="mostrarTexto(this)" />  
        <span id="TextoEspecial_infoMigratoria_paisTransitoId" class="Escondido twelve columns">
        </span>-->

        <!---motivo dl viaje -- -->


        <label for="intcrucepaistran">Intentos de cruce por el país de tránsito</label>
        <div id="infoMigratoria_intCruceTransitoSelect" class="twelve columns">
            <select name="infoMigratoria_intCruceTransito" id="infoMigratoria_intCruceTransito" >                       
            <option></option>
            <?php if(isset($datosActor['infoMigratoria']['intCruceTransito'])){
            for($intentos = 0; $intentos <= 100; $intentos++):?> <!--muestra todas las edades de 1 a 100-->
            <option value="<?=$intentos; ?>" <?=($datosActor['infoMigratoria']['intCruceTransito'] == $intentos) ? 'selected="selected"' : '' ; ?>> <?=$intentos; ?></option>
            <?php endfor;
            } else {
            for($intentos = 0; $intentos <= 100; $intentos++):?> <!--muestra todas las edades de 1 a 100-->
            <option value="<?=$intentos; ?>"> <?=$intentos; ?></option>
            <?php endfor;
            } ?>
            </select>
        </div>
        <!--<input id="BotonmasinfoMigratoria_intCruceTransito" type="button" class="tiny button"  value="+" onclick="mostrarTexto(this)" />    
        <span id="TextoEspecial_infoMigratoria_intCruceTransito" class="Escondido twelve columns">
        </span>-->
        <label for="expulpaistrans">Expulsiones del país de tránsito</label>
        <select name="infoMigratoria_expCruceTransito">                     
            <option > </option>
            <?php if(isset($datosActor['infoMigratoria']['expCruceTransito'])){
            for($intentos = 0; $intentos <= 100; $intentos++):?> <!--muestra todas las edades de 1 a 100-->
            <option value="<?=$intentos; ?>" <?=($datosActor['infoMigratoria']['expCruceTransito'] == $intentos) ? 'selected="selected"' : '' ; ?>> <?=$intentos; ?></option>
            <?php endfor;
            } else {
            for($intentos = 0; $intentos <= 100; $intentos++):?> <!--muestra todas las edades de 1 a 100-->
            <option value="<?=$intentos; ?>"> <?=$intentos; ?></option>
            <?php endfor;
            } ?>
        </select>

        <label for="motivoViaje">Motivo del viaje</label>

        <input name="infoMigratoria_motivoViaje" id="infoMigratoria_motivoViaje" type="text">
        </span>
        <!--<input id="BotonmasinfoMigratoria_motivoViaje" type="button" class="tiny button"  value="+" onclick="mostrarTexto(this)" /> 
        <span id="TextoEspecial_infoMigratoria_motivoViaje" class="Escondido twelve columns">
        </span>-->

        <label for="realizaViaje">Realiza el viaje</label>
        <input type="radio" name="infoMigratoria_realizaViaje" checked="checked" value="Solo" /> No acompañado
        <input type="radio" name="infoMigratoria_realizaViaje" value="Acompanado" /> Acompañado
    </div>

    <div class="six columns">

        <label for="paisdest">País destino</label>
            <select name="infoMigratoria_paisDestinoId" id="infoMigratoria_paisDestinoId">
            <option></option>
            <?php if(isset($datosActor['infoMigratoria']['paisDestinoId'])){
            foreach($catalogos['paisesCatalogo'] as $key => $item): ?> <!--muestra los estados civiles-->
            <option  value="<?=$item['paisId']?>" <?=($datosActor['infoMigratoria']['paisDestinoId'] == $item['paisId']) ? 'selected="selected"' : '' ; ?> > <?=$item['nombre']?></option>
            <?php endforeach; } else { ?>
            <?php foreach($catalogos['paisesCatalogo'] as $pais):?> <!--muestra los estados civiles-->
                <option value="<?=$pais['paisId']; ?>"><?=$pais['nombre']; ?></option>
            <?php endforeach; } ?>
            </select>
        <!--<input id="BotonmasinfoMigratoria_paisDestinoId" type="button" class="tiny button"  value="+" onclick="mostrarTexto(this)" />   
        <span id="TextoEspecial_infoMigratoria_paisDestinoId" class="Escondido twelve columns">	</span>-->


        <label for="intcrucespaisdets">Intentos de cruce al país destino</label>
            <select name="infoMigratoria_intCruceDestino" id="infoMigratoria_intCruceDestino" >
                <?php if(isset($datosActor['infoMigratoria']['intCruceDestino'])){
                for($intentos = 0; $intentos <= 100; $intentos++):?> <!--muestra todas las edades de 1 a 100-->
                <option value="<?=$intentos; ?>" <?=($datosActor['infoMigratoria']['intCruceDestino'] == $intentos) ? 'selected="selected"' : '' ; ?>> <?=$intentos; ?></option>
                <?php endfor;
                } else {
                for($intentos = 0; $intentos <= 100; $intentos++):?> <!--muestra todas las edades de 1 a 100-->
                <option value="<?=$intentos; ?>"> <?=$intentos; ?></option>
                <?php endfor;
                } ?>
            </select>

        <label for="expulpaisdest">Expulsiones del país de destino</label>
        <div id="infoMigratoria_expCruceDestinoSelect" class="twelve columns">
            <select name="infoMigratoria_expCruceDestino" id="infoMigratoria_expCruceDestino">                      
            <option></option>
            <?php if(isset($datosActor['infoMigratoria']['expCruceDestino'])){
            for($intentos = 0; $intentos <= 100; $intentos++):?> <!--muestra todas las edades de 1 a 100-->
            <option value="<?=$intentos; ?>" <?=($datosActor['infoMigratoria']['expCruceDestino'] == $intentos) ? 'selected="selected"' : '' ; ?>> <?=$intentos; ?></option>
            <?php endfor;
            } else {
            for($intentos = 0; $intentos <= 100; $intentos++):?> <!--muestra todas las edades de 1 a 100-->
            <option value="<?=$intentos; ?>"> <?=$intentos; ?></option>
            <?php endfor;
            } ?>
            </select>
        </div>
        <!--<input id="BotonmasinfoMigratoria_expCruceDestino" type="button" class="tiny button"  value="+" onclick="mostrarTexto(this)" /> 
        <span id="TextoEspecial_infoMigratoria_expCruceDestino" class="Escondido twelve columns">
        </span>-->

    <label for="tipoEstancia">Tipo de estancia</label>
    <select name="infoMigratoria_tipoEstanciaId" id="infoMigratoria_tipoEstanciaId">
        <option></option>
        <?php if(isset($datosActor['infoMigratoria']['tipoEstanciaId'])){ ?>
            <option value="1" <?=($datosActor['infoMigratoria']['tipoEstanciaId'] == 1) ? 'selected="selected"' : '' ; ?>>Estancia Corta</option>
            <option value="2" <?=($datosActor['infoMigratoria']['tipoEstanciaId'] == 2) ? 'selected="selected"' : '' ; ?>>Estancia Larga</option>
        <?php } else { ?>
            <option value="1" >Estancia Corta</option>
            <option value="2" >Estancia Larga</option>
         <?php } ?>
    </select>
    <!--<input id="BotonmasinfoMigratoria_tipoEstanciaId" type="button" class="tiny button"  value="+" onclick="mostrarTexto(this)" />	
    <span id="TextoEspecial_infoMigratoria_tipoEstanciaId" class="Escondido twelve columns">
    </span>-->

    </div>

</fieldset><!--Termina datos de nacimiento-->

<fieldset>
    <legend>Comentarios</legend>
    <div class="twelve columns">
        <textarea  placeholder="Escribir algun comentario"  rows="10" cols="100" name="infoMigratoria_comentarios" id="infoMigratoria_comentarios" wrap="hard" >
            <?= (isset($datosActor['infoMigratoria']['comentarios'])) ? $datosActor['infoMigratoria']['comentarios'] : "" ;?>
        </textarea>
    </div>
</fieldset>
    <div class="row espacioInferior espacioSuperior">
        <div class="nine columns">
            <input class="medium button" type="submit" value="Guardar" />
        </div>
        <div  class="three columns" >
            <input class="medium button" type="reset" value="Cancelar" onclick="pagInicial()" />
        </div>
    </div>
</div>

</div>
</form> 