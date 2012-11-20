<input type="hidden" id="tipoActorAE"  name="1"/>
<form action="<?=$action; ?>" method="post" enctype="multipart/form-data" id="menuForm" name="menuForm">

    <div class="three columns">
                <?php if(isset($datosActor['actores']['foto'])){ ?>    

                <input type="hidden" value="<?=$actorId; ?>" name="actores_actorId" />
                <img class="twelve columns" src="<?=base_url().$datosActor['actores']['foto']; ?>" />
                <?php }?>


                <label>Foto </label>
                <input name="archivo" type="file" size="10" accept="image/*"/>
                <input type="hidden" class="foto" <?= (isset($datosActor['actores']['foto'])) ? 'value="'.$datosActor['actores']['foto'].'"' : 'value=""' ;?> name="actores_foto" />
               
    </div>

    <div class="nine columns">
            <?php if(isset($actorId)){ ?>
                <input type="hidden" value="<?=$actorId; ?>" id="actores_actorId" name="actores_actorId" />
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
                        <input type="text" id="alias_alias" name="alias_alias" value="<?=(isset($datosActor['alias']['alias']) ? $datosActor['alias']['alias'] : ''); ?>" />
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

                    <div class="twelve columns">

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

                        <label for="genero">¿Habla español?</label>
                        <?php if(isset($datosActor['inofGralActor']['espaniol'])){ ?>
                            <input type="radio" id="infoGralActor_espaniol" name="infoGralActor_espaniol" <?=($datosActor['infoGralActor']['espaniol'] == 'Si') ? 'checked="checked"' : ''; ?> value="Si" />Si
                            <input type="radio" id="infoGralActor_espaniol" name="infoGralActor_espaniol" <?=($datosActor['infoGralActor']['espaniol'] == 'No') ? 'checked="checked"' : ''; ?> value="No" />No
                        <?php } else { ?>
                            <input type="radio" id="infoGralActor_espaniol" name="infoGralActor_espaniol" checked="checked" value="Si" />Si
                            <input type="radio" id="infoGralActor_espaniol" name="infoGralActor_espaniol" value="No" />No
                        <?php } ?>
                        
                        <label for="grupoIndigena">Grupo Indígena</label>
                        <select id="infoGralActor_gruposIndigenas_grupoIndigenaId" name="infoGralActor_gruposIndigenas_grupoIndigenaId">
                            <option></option>
                            <?php if(isset($datosActor['infoGralActor']['gruposIndigenas_grupoIndigenaId'])){
                            foreach($catalogos['gruposIndigenasCatalogo'] as $key => $item): ?> <!--muestra los estados civiles-->
                            <option value="<?=$item['grupoIndigenaId']?>" onclick="notasCatalogos('<?=$item['notas']; ?>','infoGralActor_gruposIndigenas_grupoIndigenaId','1')" <?=($datosActor['infoGralActor']['gruposIndigenas_grupoIndigenaId'] == $item['grupoIndigenaId']) ? 'selected="selected"' : '' ; ?> > <?=$item['descripcion']?></option>
                            <?php endforeach; } else { ?>
                            <?php foreach($catalogos['gruposIndigenasCatalogo'] as $key => $item):?> <!--muestra los estados civiles-->
                            <option  onclick="notasCatalogos('<?=$item['notas']; ?>','infoGralActor_gruposIndigenas_grupoIndigenaId','1')" value="<?=$item['grupoIndigenaId']; ?>"><?=$item['descripcion']; ?></option>
                            <?php endforeach; } ?>
                        </select>
                        <div id="notasinfoGralActor_gruposIndigenas_grupoIndigenaId"> </div>
                    </div>
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

                <label for="UltimaOcupacion">Última Ocupación</label>
                <select id="infoGralActor_ocupacionesCatalogo_ultimaOcupacionId" name="infoGralActor_ocupacionesCatalogo_ultimaOcupacionId" >						
                    <option></option>
                    <?php if(isset($datosActor['infoGralActor']['ocupacionesCatalogo_ultimaOcupacionId'])){
                        foreach($catalogos['ocupacionesCatalogo'] as $key => $item): ?> <!--muestra los estados civiles-->
                            <?php if($item['tipoActorId'] == 1){ ?>
                                    <option onclick="notasCatalogos('<?=$item['notas']; ?>','infoGralActor_ocupacionesCatalogo_ultimaOcupacionId','1')" value="<?=$item['ocupacionId']?>" <?=($datosActor['infoGralActor']['ocupacionesCatalogo_ultimaOcupacionId'] == $item['ocupacionId']) ? 'selected="selected"' : '' ; ?> > <?=$item['descripcion']?></option>
                                 <?php } ?>
                        <?php endforeach; } 
                        else { ?>
                            <?php foreach($catalogos['ocupacionesCatalogo'] as $key => $item):?> <!--muestra los estados civiles-->
                                <?php if($item['tipoActorId'] == 1){ ?>
                                    <option onclick="notasCatalogos('<?=$item['notas']; ?>','infoGralActor_ocupacionesCatalogo_ultimaOcupacionId','1')" value="<?=$item['ocupacionId']; ?>"><?=$item['descripcion']; ?></option>
                                <?php } ?>
                    <?php endforeach; } ?>
                </select><span id="notasinfoGralActor_ocupacionesCatalogo_ultimaOcupacionId"></span>
                
                </div>	<!----Termina segunda mitad de detalles---->

            </fieldset><!--Termina Detalles-->


            <fieldset><!----Datos de Nacimiento ---->
                <legend>Datos de Nacimiento</legend>
               
                	<div class="twelve columns">
					   
					        <legend>Lugar de origen</legend>
					
					        <!--Llamada a los filtros-->
							<?=$filtroPais;?>								
				    
	                	 <div class="six columns">
			                <label for="fechaNacimiento">Fecha de nacimiento</label>
			                <input type="text" id="fechaDeNacimientoIndividual" name="datosDeNacimiento_fechaNacimiento" <?=(isset($datosActor['datosDeNacimiento']['fechaNacimiento']) ? 'value="'.$datosActor['datosDeNacimiento']['fechaNacimiento'].'"' : ''); ?> placeholder="AAAA-MM-DD" />
	               		
	               		</div>
               		</div>
            </fieldset><!--Termina datos de nacimiento-->

            <fieldset><!--Información de contacto-->
                <legend>Información de contacto</legend>
                <div class="six columns"> <!--Primer mitad de información de contacto-->
                <label for="telefono">Teléfono</label>
                <input type="text" id="infoContacto_telefono" pattern="[0-9]+" name="infoContacto_telefono"  <?=(isset($datosActor['infoContacto']['telefono']) ? 'value="'.$datosActor['infoContacto']['telefono'].'"' : ''); ?>  />
                <label for="infoContacto_telefonoMovil">Teléfono móvil</label>
                <input type="text" id="infoContacto_telefonoMovil" name="infoContacto_telefonoMovil" <?=(isset($datosActor['infoContacto']['telefonoMovil']) ? 'value="'.$datosActor['infoContacto']['telefonoMovil'].'"' : ''); ?> />
                </div><!--Termina primer mitad de la nformación de contacto--->
                <div class="six columns"><!--Segunda mitad de nformación de contacto---->
                <label for="infoContacto_correoE">Correo electrónico</label>
                <input type="email" id="infoContacto_correoE" name="infoContacto_correoE"  <?=(isset($datosActor['infoContacto']['correoE']) ? 'value="'.$datosActor['infoContacto']['correoE'].'"' : ''); ?> />
                </div>  <!--Segunda mitad de nformación de contacto---->
            </fieldset><!--Termina información del contacto-->
            
            <div>

            <?php if (isset($datosActor['direccionActor'])) {?>
                <fieldset><!--Dirección-->
                <legend>Dirección</legend>
                    <div id="pestania" data-collapse>
                        <h2 class="open">Dirección(es) </h2>
                        <div>
                            <table>
                                <thead>
                                    <tr>
                                        <th>Tipo de dirección</th>
                                        <th>Ubicación</th>
                                        <th>Código Postal</th>
                                        <th>País</th>
                                        <th>Estado</th>
                                        <th>Municipio</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                       <?php if (isset($datosActor['direccionActor'])) {
                                        foreach ($datosActor['direccionActor'] as $key => $direccion) {
                                            if (isset($direccion['tipoDireccionId'])) {
                                                ?>
                                        <tr>
                                                <td><?=(isset($direccion['tipoDireccionId'])) ? $catalogos['tipoDireccion'][$direccion['tipoDireccionId']]['descripcion'] : ''; ?></td>
                                                <td><?=(isset($direccion['direccion'])) ? $direccion['direccion'] : ''; ?></td>
                                                <td><?=(isset($direccion['codigoPostal'])) ? $direccion['codigoPostal'] : ''; ?></td>
                                                <td><?=(isset($direccion['paisesCatalogo_paisId'])) ? $catalogos['paisesCatalogo'][$direccion['paisesCatalogo_paisId']]['nombre'] : ''; ?></td>
                                                <td><?=(isset($direccion['estadosCatalogo_estadoId'])) ? $catalogos['estadosCatalogo'][$direccion['estadosCatalogo_estadoId']]['nombre'] : ''; ?></td>
                                                <td><?=(isset($direccion['municipiosCatalogo_municipioId'])) ? $catalogos['municipiosCatalogo'][$direccion['municipiosCatalogo_municipioId']]['nombre'] : ''; ?></td>                        
                                                <td><input type="button" class="tiny button"  value="Editar" onclick="nuevaDireccion('<?=$actorId?>','<?=$direccion['direccionId']?>')"/>
                                                    <input type="button" value="Elminar" class="tiny button" onclick="eliminarDireccionActor('<?=$direccion['direccionId']?>','<?=$actorId?>','2')"/>
                                                </td>
                                        </tr>
                                        <?php }
                                    }
                                    }?>
                                </tbody>
                            </table>
                                <input type="button" class="small button"  value="Agregar dirección" onclick="nuevaDireccion('<?=$actorId?>','0')">
                        </div>
                    </div>
                </fieldset>
            <?php } else{?>

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
                        <input type="number" pattern="[0-9]+" id="direccionActor_codigoPostal" name="direccionActor_codigoPostal"  <?=(isset($datosActor['codigoPostal']) ? 'value="'.$datosActor['codigoPostal'].'"' : ''); ?> />
                </div>
				<input type="hidden" id="filtrodir" name="3"/>
                <div class="six columns">
                       <?=$filtroDireccion;?>                                            
                   
                  
                </fieldset><!--Termina datos dirección-->
                <?php }?>
       		 </div>
		</div>
        
        <div class="row espacioInferior espacioSuperior">
            <div class="nine columns">
                <input class="medium button" type="submit" value="Guardar" />
            </div>
            <div  class="three columns" >
                <input class="medium button" type="reset" value="Cancelar" onclick="pagInicial()" />
            </div>
        </div>
    </div>
</form>
