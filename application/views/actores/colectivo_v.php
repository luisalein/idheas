<div class="two columns">
	<?php if(isset($datosActor['actores'])){?>
    <img src="<?=base_url().$datosActor['actores']['foto']; ?>" class="foto"/>
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
                
                <label><b>Tipo de actor colectivo:  </b> </label> 
                <span id="tipoActorColectivoId"><?=(isset($datosActor['infoGralActores']['tipoActorColectivoId'])&&($datosActor['infoGralActores']['tipoActorColectivoId']>0)) ? $catalogos['tipoActorColectivo'][$datosActor['infoGralActores']['tipoActorColectivoId']]['descripcion'] : ''; ?></span>
                          
            </div> 
            
            <div class="six columns">
             
                <label><b>Siglas: </b> </label> 
                <span id="apellidosSiglas"><?=(isset($datosActor['actores']['apellidosSiglas'])) ? $datosActor['actores']['apellidosSiglas'] : ''; ?></span>
             
                <label><b>Actividad: </b> </label> 
                <span id="actividad"><?=(isset($datosActor['infoGralActores']['actividad'])) ? $catalogos['ocupacionesCatalogo'][$datosActor['infoGralActores']['actividad']]['descripcion'] : ''; ?></span>
            
            </div>
        </fieldset> <!--Termina información general-->
        
        <?php echo br(3);?>
        
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


        <br/><br/><br/>

        <?php if (isset($datosActor['direccionActor'])) {?>

            <?php foreach ($datosActor['direccionActor'] as $direccion){?>

            <fieldset> <!--Dirección-->
                  <legend>Dirección</legend>
                <div class="six columns">
                 
                    <label><b>Ubicación:   </b> </label> 
                    <span id="direccion"><?=(isset($direccion['direccion'])) ? $direccion['direccion'] : ''; ?></span>
                 
                    <label><b>País:  </b> </label> 
                    <span id="paisesCatalogo_paisId"><?=(isset($direccion['paisesCatalogo_paisId'])) ?  $catalogos['paisesCatalogo'][$direccion['paisesCatalogo_paisId']]['nombre'] : ''; ?></span>
                 
                    <label><b>Estado:  </b> </label> 
                    <span id="estadosCatalogo_estadoId"><?=(isset($direccion['estadosCatalogo_estadoId'])) ? $catalogos['estadosCatalogo'][$direccion['estadosCatalogo_estadoId']]['nombre'] : ''; ?></span>
                 
                </div> 
                
                
                <div class="six columns">
                    
                    <label><b>Municipio: </b> </label>
                    <span id="municipiosCatalogo_municipioId"><?=(isset($direccion['municipiosCatalogo_municipioId'])) ? $catalogos['municipiosCatalogo'][$direccion['municipiosCatalogo_municipioId']]['nombre'] : ''; ?></span>
                 
                    <label><b>Código postal:  </b> </label>
                    <span id="actores_codigoPostal"><?=(isset($direccion['codigoPostal'])) ? $direccion['codigoPostal'] : ''; ?></span>

                </div>
            </fieldset> <!--Termina información general-->

            <?php  } ?>

        <?php }
        else{?>

        <fieldset> <!--Dirección-->
              <legend>Dirección</legend>
            <div class="six columns">
             
                <label><b>Ubicación:   </b> </label> 
                <span id="direccion"><?=(isset($direccion['direccion'])) ? $direccion['direccion'] : ''; ?></span>
             
                <label><b>País:  </b> </label> 
                <span id="paisesCatalogo_paisId"><?=(isset($direccion['paisesCatalogo_paisId'])) ?  $catalogos['paisesCatalogo'][$direccion['paisesCatalogo_paisId']]['nombre'] : ''; ?></span>
             
                <label><b>Estado:  </b> </label> 
                <span id="estadosCatalogo_estadoId"><?=(isset($direccion['estadosCatalogo_estadoId'])) ? $catalogos['estadosCatalogo'][$direccion['estadosCatalogo_estadoId']]['nombre'] : ''; ?></span>
             
            </div> 
            
            
            <div class="six columns">
                
                <label><b>Municipio: </b> </label>
                <span id="municipiosCatalogo_municipioId"><?=(isset($direccion['municipiosCatalogo_municipioId'])) ? $catalogos['municipiosCatalogo'][$direccion['municipiosCatalogo_municipioId']]['nombre'] : ''; ?></span>
             
                <label><b>Código postal:  </b> </label>
                <span id="actores_codigoPostal"><?=(isset($direccion['codigoPostal'])) ? $direccion['codigoPostal'] : ''; ?></span>

            </div>
        </fieldset> <!--Termina información general-->

        <?php }?>

        <br/><br/><br/>




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
        <h2>Actores individuales o transmigrantes</h2> <!--Comienza relacion con otros actores-->
        <div>
        <div id="subPestanias" data-collapse>   
            <h2>Relacion con otros actores </h2>
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
                        if ($relacion['tipoRelacionIndividualColectivoId']==2) {
                            ?><tr>
                                <td><?=$datosActor['actores']['nombre'].' '.$datosActor['actores']['apellidosSiglas']; ?></td>
                                <td><?=$catalogos['relacionActoresCatalogo'][$relacion['tipoRelacionId']]['Nivel2']; ?></td>
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
        <!--Comienza citado como persona relacionada-->
        <div id="subPestanias"  data-collapse>
            <h2>Citado como persona relacionada</h2>
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
                                foreach($citaActor['citas'] as $citas){ 
                                    if ($citas['datosCitas']['tipoRelacionIndividualColectivoId']==2) {?>
                                        <tr>
                                            <td><?=$datosActor['actores']['nombre'].' '.$datosActor['actores']['apellidosSiglas']; ?></td>
                                            <td><?=$catalogos['relacionActoresCatalogo'][$citas['datosCitas']['tipoRelacionId']]['Nivel2']; ?></td>
                                            <td><?=$catalogos['listaTodosActores'][$citas['datosCitas']['actores_actorId']]['nombre']." ".$catalogos['listaTodosActores'][$citas['datosCitas']['actores_actorId']]['apellidosSiglas']?></td>
                                            <td><?=$citas['datosCitas']['fechaInicial']; ?></td>
                                            <td><?=$citas['datosCitas']['fechaTermino']; ?></td>
                                        </tr><?php
                                    }
                                }
                            } ?>
                            </tbody>
                        </table>
                </div>
        </div>
        <!--Termina citado como persona relacionada-->
        
        </div>
</div>
        
    
    <!--Comienza actores colectivos---->
    <div id="pestania" data-collapse>
        <h2>Actores colectivos </h2>
        <div>

            <div id="subPestanias" data-collapse >
                <h2>Relacion con otros actores </h2>
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
                                if ($relacion['tipoRelacionIndividualColectivoId']==3) {
                                    ?><tr>
                                        <td><?=$datosActor['actores']['nombre'].' '.$datosActor['actores']['apellidosSiglas']; ?></td>
                                        <td><?=$catalogos['relacionActoresCatalogo'][$relacion['tipoRelacionId']]['Nivel2']; ?></td>
                                        <?php if ($relacion['actorRelacionadoId']>0) {
                                           $nombreRelacionado=$catalogos['listaTodosActores'][$relacion['actorRelacionadoId']]['nombre'].' '.$catalogos['listaTodosActores'][$relacion['actorRelacionadoId']]['apellidosSiglas']; 
                                        }
                                        else{
                                           $nombreRelacionado="No hay actor relacionado";
                                        }?>
                                        <td><?=$nombreRelacionado?></td>
                                        <td><?=$relacion['fechaInicial']; ?></td>
                                        <td><?=$relacion['fechaTermino']; ?></td>
                                        <td><input type="button" class="tiny button"  value="Editar" onclick="nueva_relacion_a_Col('<?=$idActor ?>',1, '<?=$relacion['relacionActoresId']; ?>')" />
                                            <form method="post" action="<?=base_url(); ?>index.php/actores_c/eliminarRelacionActor/<?=$relacion['relacionActoresId']."/".$relacion['actorRelacionadoId']; ?>" >
                                                <input type="submit" value="Elminar" class="tiny button" />
                                            </form>
                                        </td>
                                    </tr><?php
                                }
                                }
                            } ?>
                        </tbody>
                    </table>
                    <input type="button" class="tiny button <?=$clase?>"  value="Nuevo" onclick="nueva_relacion_a_Col(<?=$idActor; ?>,0,0)" />
                </div>
            </div>

            <!--Comienza citado como persona relacionada colectivo-->
            <div id="subPestanias" data-collapse>
                <h2>Citado como persona relacionada</h2>
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
                            foreach($citaActor['citas'] as $citas){ 
                                if ($citas['datosCitas']['tipoRelacionIndividualColectivoId']==3) {?>
                                    <tr>
                                        <td><?=$datosActor['actores']['nombre'].' '.$datosActor['actores']['apellidosSiglas']; ?></td>
                                        <td><?=$catalogos['relacionActoresCatalogo'][$citas['datosCitas']['tipoRelacionId']]['Nivel2']; ?></td>
                                        <td><?=$catalogos['listaTodosActores'][$citas['datosCitas']['actores_actorId']]['nombre']." ".$catalogos['listaTodosActores'][$citas['datosCitas']['actores_actorId']]['apellidosSiglas']?></td>
                                        <td><?=$citas['datosCitas']['fechaInicial']; ?></td>
                                        <td><?=$citas['datosCitas']['fechaTermino']; ?></td>
                                    </tr><?php
                                }
                            }
                        } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!--Termina citado como persona relacionada colectivo-->

        </div>
    </div>
        <!--Termina actores colectivos-->
</fieldset>

</div>