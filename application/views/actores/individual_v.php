<div class="two columns">
	<?php if(isset($datosActor['actores'])){?>
    <img src="<?=base_url().$datosActor['actores']['foto']; ?>" />
    <br />
    <?=$datosActor['actores']['nombre'].' '.$datosActor['actores']['apellidosSiglas']; ?>
    <?php }?>
</div>

<div class="ten columns">
	<fieldset>
	    <legend>Información general</legend>
	    <div class="four columns">
	        <h6>Nombre<h6>
	        <label id="nombre"><?=(isset($datosActor['actores']['nombre'])) ? $datosActor['actores']['nombre'] : ''; ?></label>
	        <h6>Apellidos</h6>
	        <label id="apellidosSiglas"><?=(isset($datosActor['actores']['apellidosSiglas'])) ? $datosActor['actores']['apellidosSiglas'] : ''; ?></label>
	        <h6>Alias</h6>
	        <label id="alias"><?=(isset($datosActor['alias']['alias'])) ? $datosActor['alias']['alias'] : ''; ?></label>
	    </div>
	    <div class="four columns">
	        <h6>Género</h6>
	        <label id="generoId"><?php if(isset($datosActor['infoGralActor']['generoId'])){
	            if (($datosActor['infoGralActor']['generoId']== 1) ) {
	                print_r('Hombre');
	            } else {
	                print_r('Mujer');
	            }
	        }  ?></label>
	        <h6>Estado Civil: </h6>
	        <label id="estadoCivil_estadoCivilId"><?=(isset($datosActor['infoGralActor']['estadoCivil_estadoCivilId'])) ? $catalogos['estadosCivilesCatalogo'][$datosActor['infoGralActor']['estadoCivil_estadoCivilId']]['descripcion'] : ''; ?></label>
	        <h6>Nacionalidad: </h6>
	        <label id="nacionalidadId"><?=(isset($datosActor['infoGralActor']['nacionalidadId']) && $datosActor['infoGralActor']['nacionalidadId'] != 0) ? $catalogos['nacionalidadesCatalogo'][$datosActor['infoGralActor']['nacionalidadId']]['nombre'] : ''; ?></label>
	    </div>
	    <div class="four columns">
	        <h6>Edad</h6>
	        <label id="edad"><?=(isset($datosActor['infoGralActor']['edad'])) ? $datosActor['infoGralActor']['edad'].' años' : ''; ?></label>
	    </div>
	</fieldset>
	<!--Termina información general-->
	<fieldset>
	        <legend>Detalles</legend>
	    <div class="six columns">
	        <h6>Hijos</h6>
	        <label id="hijos" ><?=(isset($datosActor['infoGralActor']['hijos'])) ? $datosActor['infoGralActor']['hijos'] : ''; ?></label>
	        <h6>¿Habla español?</h6>
	        <label id="espaniol"><?=(isset($datosActor['infoGralActor']['espaniol'])) ? $datosActor['infoGralActor']['espaniol'] : ''; ?></span>
	        <h6>Grupo Indígena</h6>
	        <label id="gruposIndigenas_grupoIndigenaId"><?=(isset($datosActor['infoGralActor']['gruposIndigenas_grupoIndigenaId'])) ? $catalogos['gruposIndigenasCatalogo'][$datosActor['infoGralActor']['gruposIndigenas_grupoIndigenaId']]['descripcion'] : ''; ?></label>
	    </div>
	    <div class="six columns">
	        <h6>Nivel de Escolaridad</h6>
	        <label id="escolaridadId"><?=(isset($datosActor['infoGralActor']['escolaridadId'])) ? $catalogos['nivelEscolaridad'][$datosActor['infoGralActor']['escolaridadId']]['descripcion'] : ''; ?></label> 
	        <h6>Última Ocupación:   </h6>
	        <label id="ocupacionesCatalogo_ultimaOcupacionId"><?=(isset($datosActor['infoGralActor']['ocupacionesCatalogo_ultimaOcupacionId'])) ? $catalogos['ocupacionesCatalogo'][$datosActor['infoGralActor']['ocupacionesCatalogo_ultimaOcupacionId']]['descripcion'] : ''; ?></label>
	    </div>
	</fieldset>
	<!--Termina Detalles-->
	<fieldset>
	    <legend>Datos de Nacimiento</legend>
	    <div class="six columns">
	        <h6>Pais</h6>
	        <label id="paisesCatalogo_paisId"><?=(isset($datosActor['datosDeNacimiento']['paisesCatalogo_paisId'])) ? $catalogos['paisesCatalogo'][$datosActor['datosDeNacimiento']['paisesCatalogo_paisId']]['nombre'] : ''; ?></label>
	        <h6>Estado</h6>
	        <label id="estadosCatalogo_estadoId"><?=(isset($datosActor['datosDeNacimiento']['estadosCatalogo_estadoId'])) ? $catalogos['estadosCatalogo'][$datosActor['datosDeNacimiento']['estadosCatalogo_estadoId']]['nombre'] : ''; ?></label>
	        <h6>Municipio</h6>
	        <label id="municipiosCatalogo_municipioId"><?=(isset($datosActor['datosDeNacimiento']['municipiosCatalogo_municipioId'])) ? $catalogos['municipiosCatalogo'][$datosActor['datosDeNacimiento']['municipiosCatalogo_municipioId']]['nombre'] : ''; ?></label>
	    </div>
	    <div class="six columns">
	        <h6>Fecha de nacimiento</h6>
	        <label id="fechaNacimiento"><?=(isset($datosActor['datosDeNacimiento']['fechaNacimiento'])) ? $datosActor['datosDeNacimiento']['fechaNacimiento'] : ''; ?></label>
	    </div>
	</fieldset>
	<!--Termina datos de nacimiento-->
	<fieldset>
	    <legend>Información de contacto</legend>
	    <div class="six columns">
	        <h6>Teléfono</h6>
	        <label id="telefono"><?=(isset($datosActor['infoContacto']['telefono'])) ? $datosActor['infoContacto']['telefono'] : ''; ?></label>
	        <h6>Teléfono móvil</h6>
	        <label id="telefonoMovil"><?=(isset($datosActor['infoContacto']['telefonoMovil'])) ? $datosActor['infoContacto']['telefonoMovil'] : ''; ?></label>
	    </div>
	    <div class="six columns">
	        <h6>Correo electrónico</h6>
	        <label id="correoE"><?=(isset($datosActor['infoContacto']['correoE'])) ? $datosActor['infoContacto']['correoE'] : ''; ?></label>
	    </div>
	</fieldset>
	<!--Termina información del contacto-->
	<fieldset>

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
                	<tr>
                        <td><?=(isset($datosActor['direccionActor']['tipoDireccionId'])) ? $datosActor['direccionActor']['tipoDireccionId'] : ''; ?></td>
                        <td><?=(isset($datosActor['direccionActor']['direccion'])) ? $datosActor['direccionActor']['direccion'] : ''; ?></td>
                        <td><?=(isset($datosActor['actores']['codigoPostal'])) ? $datosActor['actores']['codigoPostal'] : ''; ?></td>
                        <td><?=(isset($datosActor['direccionActor']['paisesCatalogo_paisId'])) ? $catalogos['paisesCatalogo'][$datosActor['direccionActor']['paisesCatalogo_paisId']]['nombre'] : ''; ?></td>
                        <td><?=(isset($datosActor['direccionActor']['estadosCatalogo_estadoId'])) ? $catalogos['estadosCatalogo'][$datosActor['direccionActor']['estadosCatalogo_estadoId']]['nombre'] : ''; ?></td>
                        <td><?=(isset($datosActor['direccionActor']['municipiosCatalogo_municipioId'])) ? $catalogos['municipiosCatalogo'][$datosActor['direccionActor']['municipiosCatalogo_municipioId']]['nombre'] : ''; ?></td>                        
                        <td><input type="button" class="tiny button"  value="Editar" /></td>
                    </tr>
                </tbody>
            </table>
		<input type="button" class="small button"  value="Agregar dirección" onclick="nuevaDireccion()">
        </div>
    </div>
	</fieldset><!--Termina datos dirección-->

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
	            <div id="subPestanias" data-collapse >
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
		                                    <td><input type="button" class="tiny button"  value="Editar" onclick="nueva_relacion_a_a('<?=$idActor ?>', 1 , '<?=$relacion['relacionActoresId']; ?>')" /></td>
		                                </tr>
		                            <?php }
		                            }
		                        } ?>
		                    </tbody>
		                </table>
			            <input type="button" class="tiny button <?=$clase?>"  value="Nuevo" onclick="nueva_relacion_a_a(<?=$idActor ?>,0,0)" />
	                </div>
	            </div>
	
	        </div>
	</div>

    <!--Comienza citado como persona relacionada-->
    <div id="pestania" data-collapse>
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
        <h2>Actores colectivos </h2>
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
                                <td><input type="button" class="tiny button"  value="Editar" onclick="nueva_relacion_a_Col('<?=$idActor ?>',1, '<?=$relacion['relacionActoresId']; ?>')" /></td>
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