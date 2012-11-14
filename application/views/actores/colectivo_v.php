<div class="two columns">
	<?php if(isset($datosActor['actores'])){?>
    <img src="<?=base_url().$datosActor['actores']['foto']; ?>" />
    <br />
    <?=$datosActor['actores']['nombre'].' '.$datosActor['actores']['apellidosSiglas']; ?>
    <?php }?>
</div>

<div class="ten columns">
	        <fieldset> <!--Información general-->
              <legend>Información general</legend>
            <div class="six columns">
             
                <label><b>Nombre:  </b> </label>
                <span id="nombre"><?=(isset($datosActor['actores']['nombre'])) ? $datosActor['actores']['nombre'] : ''; ?></span>
             
                <label><b>Siglas: </b> </label> 
                <span id="apellidosSiglas"><?=(isset($datosActor['actores']['apellidosSiglas'])) ? $datosActor['actores']['apellidosSiglas'] : ''; ?></span>
             
             
            </div> 
            
            <div class="six columns">
                
                <label><b>Tipo de actor colectivo:  </b> </label> 
                <span id="tipoActorColectivoId"><?=(isset($datosActor['infoGralActores']['tipoActorColectivoId'])&&($datosActor['infoGralActores']['tipoActorColectivoId']>0)) ? $catalogos['tipoActorColectivo'][$datosActor['infoGralActores']['tipoActorColectivoId']]['descripcion'] : ''; ?></span>
             
                <label><b>Actividad: </b> </label> 
                <span id="actividad"><?=(isset($datosActor['infoGralActores']['actividad'])) ? $datosActor['infoGralActores']['actividad'] : ''; ?></span>
            
            </div>
        </fieldset> <!--Termina información general-->
        
        <?php echo br(3);?>
        
        <fieldset> <!--Dirección-->
              <legend>Dirección</legend>
            <div class="six columns">
             
                <label><b>Ubicación:   </b> </label> 
                <span id="direccion"><?=(isset($datosActor['direccionActor']['direccion'])) ? $datosActor['direccionActor']['direccion'] : ''; ?></span>
             
                <label><b>País:  </b> </label> 
                <span id="paisesCatalogo_paisId"><?=(isset($datosActor['direccionActor']['paisesCatalogo_paisId'])) ?  $catalogos['paisesCatalogo'][$datosActor['direccionActor']['paisesCatalogo_paisId']]['nombre'] : ''; ?></span>
             
                <label><b>Estado:  </b> </label> 
                <span id="estadosCatalogo_estadoId"><?=(isset($datosActor['direccionActor']['estadosCatalogo_estadoId'])) ? $catalogos['estadosCatalogo'][$datosActor['direccionActor']['estadosCatalogo_estadoId']]['nombre'] : ''; ?></span>
             
            </div> 
            
            
            <div class="six columns">
                
                <label><b>Municipio: </b> </label>
                <span id="municipiosCatalogo_municipioId"><?=(isset($datosActor['direccionActor']['municipiosCatalogo_municipioId'])) ? $catalogos['municipiosCatalogo'][$datosActor['direccionActor']['municipiosCatalogo_municipioId']]['nombre'] : ''; ?></span>
             
                <label><b>Código postal:  </b> </label>
                <span id="actores_codigoPostal"><?=(isset($datosActor['actores']['codigoPostal'])) ? $datosActor['actores']['codigoPostal'] : ''; ?></span>

            </div>
        </fieldset> <!--Termina información general-->
        <br/><br/><br/>
        
        
        <fieldset> <!--Dirección-->
              <legend>Información de contacto</legend>
            <div class="six columns">
             
                <label><b>Teléfono:   </b> </label>
                <span id="telefono"><?=(isset($datosActor['infoContacto']['telefono'])) ? $datosActor['infoContacto']['telefono'] : ''; ?></span>
              
                <label><b>Fax:  </b> </label>
                <span id="fax"><?=(isset($datosActor['infoContacto']['fax'])) ? $datosActor['infoContacto']['fax'] : ''; ?></span>
             
             
            </div> 
            
            
            <div class="six columns">
                
                <label><b>Correo electrónico:  </b> </label>
                <span id="correoE"><?=(isset($datosActor['infoContacto']['correoE'])) ? $datosActor['infoContacto']['correoE'] : ''; ?></span>
             

                <label><b>Página web:  </b> </label>
                <span id="paginaWeb"><?=(isset($datosActor['infoGralActores']['paginaWeb'])) ? $datosActor['infoGralActores']['paginaWeb'] : ''; ?></span>
            
            </div>
        </fieldset> <!--Termina información general-->











<fieldset>
    <legend>Relacion entre actores </legend>

    <?php if (isset($datosActor['actores']['actorId'])) {
        $idActor=$datosActor['actores']['actorId'];
        $clase="";
    }else{
        $idActor=0;
        $clase="Escondido";
    } ?>

<div id="pestania" data-collapse>
        <h2 class="flecha">Actores individuales o transmigrantes</h2> <!--Comienza relacion con otros actores-->
        <div>
        <div id="subPestanias" data-collapse>   
            <h2 class="flecha">Relacion con otros actores </h2>
            <div>
            <table>
                <thead>
                    <tr>
                        <th>Persona</th>
                        <th>Tipo de relación</th>
                        <th>Persona Relacionada</th>
                        <th>Fecha de incio</th>
                        <th>Fecha de témino</th>
                        <th>Acción(es)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(isset($datosActor['relacionActores'])){
                        foreach($datosActor['relacionActores'] as $relacion){
                        if ($relacion['tipoRelacionIndividualColectivoId']==1) {
                            ?><tr>
                                <td><?=$datosActor['actores']['nombre'].' '.$datosActor['actores']['apellidosSiglas']; ?></td>
                                <td><?=$catalogos['relacionActoresCatalogo'][$relacion['tipoRelacionId']]['nombre']; ?></td>
                                <?php if ($relacion['actorRelacionadoId']>0) {
                                   $nombreRelacionado=$catalogos['listaTodosActores'][$relacion['actorRelacionadoId']]['nombre'].' '.$catalogos['listaTodosActores'][$relacion['actorRelacionadoId']]['apellidosSiglas']; 
                                }
                                else{
                                   $nombreRelacionado="No hay actor relacionado";
                                }?>
                                <td><?=$nombreRelacionado?></td>
                                <td><?=$relacion['fechaInicial']; ?></td>
                                <td><?=$relacion['fechaTermino']; ?></td>
                                <td><input type="button" class="tiny button"  value="Editar" onclick="nueva_relacion_a_a('<?=$idActor ?>' , 1 , '<?=$relacion['relacionActoresId']; ?>')" /></td>
                            </tr>
                        <?php }
                        }
                    } ?>
                </tbody>
            </table>

            <input type="button" class="tiny button <?=$clase?>"  value="Nuevo" onclick="nueva_relacion_a_a(<?=$idActor ?>,0,1)" />
        </div>
        </div>
        </div>
</div>
        <!--Comienza citado como persona relacionada-->
        <div id="pestania"  data-collapse>
            <h2 class="flecha">Citado como persona relacionada</h2>
            <div>
            <table>
                <thead>
                    <tr>
                        <th>Persona</th>
                        <th>Tipo de relación</th>
                        <th>Persona Relacionada</th>
                        <th>Fecha de incio</th>
                        <th>Fecha de témino</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(isset($citaActor['citas'])){
                        foreach($citaActor['citas'] as $citas){ ?>
                            <tr>
                                <td><?=$datosActor['actores']['nombre'].' '.$datosActor['actores']['apellidosSiglas']; ?></td>
                                <td><?=$catalogos['relacionActoresCatalogo'][$citas['datosCitas']['tipoRelacionId']]['nombre']; ?></td>
                                <td><?=$catalogos['listaTodosActores'][$citas['datosCitas']['actores_actorId']]['nombre']." ".$catalogos['listaTodosActores'][$citas['datosCitas']['actores_actorId']]['apellidosSiglas']?></td>
                                <td><?=$citas['datosCitas']['fechaInicial']; ?></td>
                                <td><?=$citas['datosCitas']['fechaTermino']; ?></td>
                            </tr><?php
                        }
                    } ?>
                </tbody>
            </table>
            </div>
        </div>
        <!--Termina citado como persona relacionada-->
        <!--Comienza actores colectivos---->
        <div id="pestania" data-collapse>
            <h2 class="flecha">Actores colectivos </h2>
            <div>
            <table>
                <thead>
                    <tr>
                        <th>Persona</th>
                        <th>Tipo de relación</th>
                        <th>Actor colectivo relacionado </th>
                        <th>Fecha de incio</th>
                        <th>Fecha de témino</th>
                        <th>Acción(es)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(isset($datosActor['relacionActores'])){
                        foreach($datosActor['relacionActores'] as $relacion){
                        if ($relacion['tipoRelacionIndividualColectivoId']==2) {
                            ?><tr>
                                <td><?=$datosActor['actores']['nombre'].' '.$datosActor['actores']['apellidosSiglas']; ?></td>
                                <td><?=$catalogos['relacionActoresCatalogo'][$relacion['tipoRelacionId']]['nombre']; ?></td>
                                <?php if ($relacion['actorRelacionadoId']>0) {
                                   $nombreRelacionado=$catalogos['listaTodosActores'][$relacion['actorRelacionadoId']]['nombre'].' '.$catalogos['listaTodosActores'][$relacion['actorRelacionadoId']]['apellidosSiglas']; 
                                }
                                else{
                                   $nombreRelacionado="No hay actor relacionado";
                                }?>
                                <td><?=$nombreRelacionado?></td>
                                <td><?=$relacion['fechaInicial']; ?></td>
                                <td><?=$relacion['fechaTermino']; ?></td>
                                <td><input type="button" class="tiny button"  value="Editar" onclick="nueva_relacion_a_Col('<?=$idActor ?>' ,1, '<?=$relacion['relacionActoresId']; ?>')" /></td>
                            </tr><?php
                        }
                        }
                    } ?>
                </tbody>
            </table>
            <input type="button" class="tiny button <?=$clase?>"  value="Nuevo" onclick="nueva_relacion_a_Col(<?=$idActor; ?>,0,0)" />
        </div>
    </div>
        <!--Termina actores colectivos-->
</fieldset>

</div>