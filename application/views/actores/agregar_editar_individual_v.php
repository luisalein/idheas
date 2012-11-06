<form action="<?=$action; ?>" method="post" enctype="multipart/form-data">
    <div class="three columns">
                <?php if(isset($datosActor['actores']['foto'])){ ?>    

                <input type="hidden" value="<?=$actorId; ?>" name="actores_actorId" />
                <img class="twelve columns" src="<?=base_url().$datosActor['actores']['foto']; ?>" />
                <?php }?>


                <label>Foto </label>
                <input name="archivo" type="file" size="10" />
                <input type="hidden" <?php (isset($datosActor['actores']['foto'])) ? 'value="'.$datosActor['actores']['foto'].'"' : "" ;?> name="actores_foto" />
               
    </div>

    <div class="nine columns">
            <?php if(isset($actorId)){ ?>
                <input type="hidden" value="<?=$actorId; ?>" name="actores_actorId" />
            <?php } ?>
            <input type="hidden" value="1" name="actores_tipoActorId" />

                <fieldset>
                    <legend>Información general</legend>
                    <!----Primer mitad de información general---->
                    <div class="six columns">
                        <label for="actores_nombre">Nombre</label>
                        <input autofocus type="text" id="actores_nombre" name="actores_nombre"  <?=(isset($datosActor['actores']['nombre']) ? 'value="'.$datosActor['actores']['nombre'].'"' : ''); ?> required />
                        <label for="actores_apellidosSiglas">Apellidos</label>
                        <input type="text" id="actores_apellidosSiglas" name="actores_apellidosSiglas" <?=(isset($datosActor['actores']['nombre']) ? 'value="'.$datosActor['actores']['apellidosSiglas'].'"' : ''); ?> required />
                        <label for="alias_alias">Alias</label>
                        <input type="text" id="alias_alias" name="alias_alias" <?=(isset($datosActor['alias']['alias']) ? 'value="'.$datosActor['alias']['alias'].'"' : ''); ?> />
                    </div>
                    <!----Termina primer mitad de información general---->
                    <!----Segunda mitad de información general---->
                    <div class="six columns">
                        <label for="infoGralActor_generoId" >Género</label>
                        <?php if(isset($datosActor['infoGralActor']['generoId'])) { ?>
                            <input type="radio" id="infoGralActor_generoid" name="infoGralActor_generoId" <?php if($datosActor['infoGralActor']['generoId'] == 1){ echo 'checked="checked"'; }?> value="1" />Hombre
                            <input type="radio" id="infoGralActor_generoid" name="infoGralActor_generoId" <?php if($datosActor['infoGralActor']['generoId'] == 2){ echo 'checked="checked"'; }?> value="2" />Mujer
                        <?php } else { ?>
                            <input type="radio" id="infoGralActor_generoid" name="infoGralActor_generoId"  value="1" />Hombre
                            <input type="radio" id="infoGralActor_generoid" name="infoGralActor_generoId"  value="2" />Mujer
                        <?php } ?>
                        <label for="edad">Edad</label>
                        <select id="infoGralActor_edad" name="infoGralActor_edad">
                            <option></option>
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
                        <label for="estadoCivil">Estado Civil</label>
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
                        <label for="nacionalidad">Nacionalidad</label>
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
                    </div>
                    <!----Segunda mitad de información general---->
                </fieldset>
                  <!--Termina información general-->
            <br/>
            <fieldset>
                <legend>Detalles</legend>
                <div class="six columns"><!----Primer mitad de detalles---->
                <div class="six columns">
                <label for="hijos">Hijos</label>
                <select id="infoGralActor_hijos" name="infoGralActor_hijos">
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
                </div>
                <div class="six columns">
                <label for="genero">¿Habla español?</label>
                <?php if(isset($datosActor['inofGralActor']['espaniol'])){ ?>
                    <input type="radio" id="infoGralActor_espaniol" name="infoGralActor_espaniol" <?=($datosActor['infoGralActor']['espaniol'] == 'Si') ? 'checked="checked"' : ''; ?> value="Si" />Si
                    <input type="radio" id="infoGralActor_espaniol" name="infoGralActor_espaniol" <?=($datosActor['infoGralActor']['espaniol'] == 'No') ? 'checked="checked"' : ''; ?> value="No" />No
                <?php } else { ?>
                    <input type="radio" id="infoGralActor_espaniol" name="infoGralActor_espaniol" checked="checked" value="Si" />Si
                    <input type="radio" id="infoGralActor_espaniol" name="infoGralActor_espaniol" value="No" />No
                <?php } ?>
                </div>
                <label for="grupoIndigena">Grupo Indígena</label>
                <select id="infoGralActor_gruposIndigenas_grupoIndigenaId" name="infoGralActor_gruposIndigenas_grupoIndigenaId">
                <option></option>
                <?php if(isset($datosActor['infoGralActor']['gruposIndigenas_grupoIndigenaId'])){
                foreach($catalogos['gruposIndigenasCatalogo'] as $key => $item): ?> <!--muestra los estados civiles-->
                <option  value="<?=$item['grupoIndigenaId']?>" <?=($datosActor['infoGralActor']['gruposIndigenas_grupoIndigenaId'] == $item['grupoIndigenaId']) ? 'selected="selected"' : '' ; ?> > <?=$item['descripcion']?></option>
                <?php endforeach; } else { ?>
                <?php foreach($catalogos['gruposIndigenasCatalogo'] as $key => $item):?> <!--muestra los estados civiles-->
                <option  value="<?=$item['grupoIndigenaId']; ?>"><?=$item['descripcion']; ?></option>
                <?php endforeach; } ?>
                </select>
                <input id="BotonmasinfoGralActor_gruposIndigenas_grupoIndigenaId" type="button" class="tiny button"  value="+" onclick="mostrarTexto(this)" />
                </div><!----Termina primer mitad de detalles---->
                <div class="six columns"><!----Segunda mitad de detalles---->


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

                <input id="BotonmasinfoGralActor_escolaridadId" type="button" class="tiny button"  value="+" onclick="mostrarTexto(this)" />	

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

                <input id="BotonmasinfoGralActor_OcupacionesCatalogo_UltimaOcupacionId" type="button" class="tiny button"  value="+" onclick="mostrarTexto(this)" />	
                
                <label for="UltimaOcupacion">Notas Última Ocupación</label>
                <div id="notasUltimaOcupacion"></div>
                </div>	<!----Termina segunda mitad de detalles---->

            </fieldset><!--Termina Detalles-->


            <fieldset><!----Datos de Nacimiento ---->
                <legend>Datos de Nacimiento</legend>
                <div class="six columns"><!----Primer mitad de datos de Nacimiento ---->
                <label for="pais">País</label>
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

                <input id="BotonmasdatosDeNacimiento_paisesCatalogo_paisId" type="button" class="tiny button"  value="+" onclick="mostrarTexto(this)" />	
                <label for="estado">Estado</label>
                <select id="datosDeNacimiento_estadosCatalogo_estadoId" name="datosDeNacimiento_estadosCatalogo_estadoId">						
                <option></option>
                <?php if(isset($datosActor['datosDeNacimiento']['estadosCatalogo_estadoId'])){
                foreach($catalogos['estadosCatalogo'] as $item): ?> <!--muestra los estados civiles-->
                <option  value="<?=$item['estadoId']?>" <?=($datosActor['datosDeNacimiento']['estadosCatalogo_estadoId'] == $item['estadoId']) ? 'selected="selected"' : '' ; ?> > <?=$item['nombre']?></option>
                <?php endforeach; } else { ?>
                <?php foreach($catalogos['estadosCatalogo'] as $estado):?><!--muestra los estados civiles-->
                <option value="<?=$estado['estadoId']; ?>"><?=$estado['nombre']; ?></option>
                <?php endforeach; } ?>
                </select>
                <input id="BotonmasinfoGralActor_OcupacionesCatalogo_UltimaOcupacionId" type="button" class="tiny button"  value="+" onclick="mostrarTexto(this)" />	
                </div><!----Termina primer mitad de datos de Nacimiento ---->
                <div class="six columns"><!----Segunda mitad de datos de Nacimiento ---->
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
                <input id="BotonmasdatosDeNacimiento_municipiosCatalogo_municipioId" type="button" class="tiny button"  value="+" onclick="mostrarTexto(this)" />	
                <label for="fechaNacimiento">Fecha de nacimiento</label>
                <input type="text" id="fechaDeNacimientoIndividual" name="datosDeNacimiento_fechaNacimiento" <?=(isset($datosActor['datosDeNacimiento']['fechaNacimiento']) ? 'value="'.$datosActor['datosDeNacimiento']['fechaNacimiento'].'"' : ''); ?> placeholder="AAAA-MM-DD" />
                </div>  <!----Termina segunda mitad de datos de Nacimiento ---->
            </fieldset><!--Termina datos de nacimiento-->

            <fieldset><!--Información de contacto-->
                <legend>Información de contacto</legend>
                <div class="six columns"> <!--Primer mitad de información de contacto-->
                <label for="telefono">Teléfono</label>
                <input type="text" id="infoContacto_telefono" name="infoContacto_telefono"  <?=(isset($datosActor['infoContacto']['telefono']) ? 'value="'.$datosActor['infoContacto']['telefono'].'"' : ''); ?>  />
                <label for="infoContacto_telefonoMovil">Teléfono móvil</label>
                <input type="text" id="infoContacto_telefonoMovil" name="infoContacto_telefonoMovil" <?=(isset($datosActor['infoContacto']['telefonoMovil']) ? 'value="'.$datosActor['infoContacto']['telefonoMovil'].'"' : ''); ?> />
                </div><!--Termina primer mitad de la nformación de contacto--->
                <div class="six columns"><!--Segunda mitad de nformación de contacto---->
                <label for="infoContacto_correoE">Correo electrónico</label>
                <input type="email" id="infoContacto_correoE" name="infoContacto_correoE"  <?=(isset($datosActor['infoContacto']['correoE']) ? 'value="'.$datosActor['infoContacto']['correoE'].'"' : ''); ?> />
                </div>  <!--Segunda mitad de nformación de contacto---->
            </fieldset><!--Termina información del contacto-->

            <fieldset>
                <legend>Dirección</legend>
                <div class="six columns">
                <label for="direccionActor_tipoDireccionId">Tipo de dirección</label>
                <select  id="direccionActor_tipoDireccionId" name="direccionActor_tipoDireccionId">			
                <option></option>
                <?php if(isset($datosActor['direccionActor']['tipoDireccionId'])){
                foreach($catalogos['tipoDireccion'] as $item):?> <!--muestra todas las edades de 1 a 100-->
                <option value="<?=$item['tipoDireccionId']; ?>" <?=($datosActor['direccionActor']['tipoDireccionId'] == $item['tipoDireccionId']) ? 'selected="selected"' : '' ; ?>> <?=$item['descripcion']; ?></option>
                <?php endforeach;
                } else {
                foreach($catalogos['tipoDireccion'] as $item):?> <!--muestra todas las edades de 1 a 100-->
                <option value="<?=$item['tipoDireccionId']; ?>"> <?=$item['descripcion']; ?></option>
                <?php endforeach;
                } ?>
                </select>
                <input id="BotonmasdireccionActor_tipoDireccionId" type="button" class="tiny button"  value="+" onclick="mostrarTexto(this)" />	
                <label for="direccionActor_direccion">Ubicación</label>
                <input type="text" id="direccionActor_direccion" name="direccionActor_direccion"  <?=(isset($datosActor['direccionActor']['direccion']) ? 'value="'.$datosActor['direccionActor']['direccion'].'"' : ''); ?> />
                <label for="actores_codigoPostal">Código Postal</label>
                <input type="text" id="actores_codigoPostal" name="actores_codigoPostal"  <?=(isset($datosActor['actores']['codigoPostal']) ? 'value="'.$datosActor['actores']['codigoPostal'].'"' : ''); ?> />
                </div>
                <div class="six columns">
                                                                   
                <label for="paisdir">País</label>
                <select id="direccionActor_paisesCatalogo_paisId" name="direccionActor_paisesCatalogo_paisId">						
                    <option></option>
                    <?php if(isset($datosActor['direccionActor']['paisesCatalogo_paisId'])){
                        foreach($catalogos['paisesCatalogo'] as $key => $item): ?> <!--muestra los estados civiles-->
                        <option  value="<?=$item['paisId']?>" <?=($datosActor['direccionActor']['paisesCatalogo_paisId'] == $item['paisId']) ? 'selected="selected"' : '' ; ?> > <?=$item['nombre']?></option>
                    <?php endforeach; } else { ?>
                        <?php foreach($catalogos['paisesCatalogo'] as $key => $item):?> <!--muestra los estados civiles-->
                        <option value="<?=$item['paisId']; ?>"><?=$item['nombre']; ?></option>
                    <?php endforeach; } ?>
                </select>

                <input id="BotonmasdireccionActor_paisesCatalogo_paisId" type="button" class="tiny button"  value="+" onclick="mostrarTexto(this)" />
                <label for="estadodir">Estado</label>

                <select id="direccionActor_estadosCatalogo_estadoId" name="direccionActor_estadosCatalogo_estadoId">						
                <option></option>
                <?php if(isset($datosActor['direccionActor']['estadosCatalogo_estadoId'])){
                foreach($catalogos['estadosCatalogo'] as $item): ?> <!--muestra los estados civiles-->
                <option  value="<?=$item['estadoId']?>" <?=($datosActor['direccionActor']['estadosCatalogo_estadoId'] == $item['estadoId']) ? 'selected="selected"' : '' ; ?> > <?=$item['nombre']?></option>
                <?php endforeach; } else { ?>
                <?php foreach($catalogos['estadosCatalogo'] as $key => $item):?> <!--muestra los estados civiles-->
                <option value="<?=$item['estadoId']; ?>"><?=$item['nombre']; ?></option>
                <?php endforeach; } ?>
                </select>	
                <input id="BotonmasdireccionActor_paisesCatalogo_paisId" type="button" class="tiny button"  value="+" onclick="mostrarTexto(this)" />

                <label for="municipiodir">Municipio</label>
                <select id="direccionActor_municipiosCatalogo_municipioId" name="direccionActor_municipiosCatalogo_municipioId">						
                    <?php if(isset($datosActor['direccionActor']['municipiosCatalogo_municipioId'])){
                    foreach($catalogos['municipiosCatalogo'] as $key => $item): ?> <!--muestra los estados civiles-->
                        <option  value="<?=$item['municipioId']?>" <?=($datosActor['direccionActor']['municipiosCatalogo_municipioId'] == $item['municipioId']) ? 'selected="selected"' : '' ; ?> > <?=$item['nombre']?></option>
                        <?php endforeach; } else { ?>
                        <option></option>
                    <?php foreach($catalogos['municipiosCatalogo'] as $key => $item):?> <!--muestra los estados civiles-->
                        <option value="<?=$item['municipioId']; ?>"><?=$item['nombre']; ?></option>
                    <?php endforeach; } ?>
                </select>
                <input id="BotonmasdireccionActor_municipiosCatalogo_municipioId" type="button" class="tiny button"  value="+" onclick="mostrarTexto(this)" />	
            </fieldset><!--Termina datos dirección-->

                <input class="tiny button" type="submit" value="Guardar" />
    </div>
</form>
