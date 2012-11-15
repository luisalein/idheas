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
		 
			<h6>Nombre:   </h6>
			<label id="nombre"><?=(isset($datosActor['actores']['nombre'])) ? $datosActor['actores']['nombre'] : ''; ?></label>
		 
			<h6>Apellidos:  </h6>
			<label id="apellidosSiglas"><?=(isset($datosActor['actores']['apellidosSiglas'])) ? $datosActor['actores']['apellidosSiglas'] : ''; ?></label>
		 
			<h6>Alias:   </h6>
			<label id="alias"><?=(isset($datosActor['alias']['alias'])) ? $datosActor['alias']['alias'] : ''; ?></label>
		  
		  
		</div>
		  
		<div class="six columns">
		  
			<div class="six columns">
				<h6>Género:   </h6>
	        <label id="generoId"><?php if(isset($datosActor['infoGralActor']['generoId'])){
	            if (($datosActor['infoGralActor']['generoId']== 1) ) {
	                print_r('Hombre');
	            } else {
	                print_r('Mujer');
	            }
	        }  ?></label>
			
			</div>
		
			<div class="six columns">
				<h6>Edad:   </h6>
				<label id="edad"><?=(isset($datosActor['infoGralActor']['edad'])) ? $datosActor['infoGralActor']['edad'] : ''; ?></label>
			</div>
		 
			<h6>Estado Civil:   </h6>
			<label id="estadoCivil_estadoCivilId"><?=(isset($datosActor['infoGralActor']['estadoCivil_estadoCivilId'])) ? $catalogos['estadosCivilesCatalogo'][$datosActor['infoGralActor']['estadoCivil_estadoCivilId']]['descripcion'] : ''; ?></label>
		 
			<h6>Nacionalidad:   </h6>
			<label id="nacionalidadId"><?=(isset($datosActor['infoGralActor']['nacionalidadId'])) ? $catalogos['nacionalidadesCatalogo'][$datosActor['infoGralActor']['nacionalidadId']]['nombre'] : ''; ?></label>
		
		</div> 
	</fieldset>	<!--Termina información general-->
	
	<fieldset> <!--Detalles-->
		<legend>Detalles:   </legend>
		<div class="six columns">
	
			 <div class="six columns">
					<h6>Hijos:   </h6>
					<label id="hijos" ><?=(isset($datosActor['infoGralActor']['hijos'])) ? $datosActor['infoGralActor']['hijos'] : ''; ?></label>
			 </div>
			  
			 <div class="six columns">									
				<h6>¿Habla español?:   </h6>
				<label id="espaniol"><?=(isset($datosActor['infoGralActor']['espaniol'])) ? $datosActor['infoGralActor']['espaniol'] : ''; ?></label>
			 </div>
	
			<h6>Grupo Indígena:   </h6>
	        <label id="gruposIndigenas_grupoIndigenaId"><?=(isset($datosActor['infoGralActor']['gruposIndigenas_grupoIndigenaId'])) ? $catalogos['gruposIndigenasCatalogo'][$datosActor['infoGralActor']['gruposIndigenas_grupoIndigenaId']]['descripcion'] : ''; ?></label>
	
		</div>
	
		<div class="six columns">
		  
			<h6>Nivel de Escolaridad:   </h6>
			<label id="escolaridadId"><?=(isset($datosActor['infoGralActor']['escolaridadId'])) ? $datosActor['infoGralActor']['escolaridadId'] : ''; ?></label>	
			
			<h6>Última Ocupación:   </h6>
	        <label id="ocupacionesCatalogo_ultimaOcupacionId"><?=(isset($datosActor['infoGralActor']['ocupacionesCatalogo_ultimaOcupacionId'])) ? $catalogos['ocupacionesCatalogo'][$datosActor['infoGralActor']['ocupacionesCatalogo_ultimaOcupacionId']]['descripcion'] : ''; ?></label>
				 
		</div>	
	</fieldset><!--Termina Detalles-->
	
	<fieldset>	
		  <legend>Información Migratoria</legend>
	
		<div class="twelve columns">
			<fieldset>		
				<legend>Lugar de origen</legend>
	
				<div class="four columns">		
					<h6 >País: </h6>
					<div id="paisesCatalogo_paisId"><?=(isset($datosActor['datosDeNacimiento']['paisesCatalogo_paisId'])) ? $catalogos['paisesCatalogo'][$datosActor['datosDeNacimiento']['paisesCatalogo_paisId']]['nombre'] : ''; ?></div>
				</div>
				
				<div class="four columns">
					<h6>Estado: </h6>
					<div id="estadosCatalogo_estadoId"><?=(isset($datosActor['datosDeNacimiento']['estadosCatalogo_estadoId'])) ? $catalogos['estadosCatalogo'][$datosActor['datosDeNacimiento']['estadosCatalogo_estadoId']]['nombre'] : ''; ?></div>
				</div>
				
				<div class="four columns">							
					<h6>Municipio: </h6>
					<div id="municipiosCatalogos_municipiosId" ><?=(isset($datosActor['datosDeNacimiento']['municipiosCatalogo_municipioId'])) ? $catalogos['municipiosCatalogo'][$datosActor['datosDeNacimiento']['municipiosCatalogo_municipioId']]['nombre'] : ''; ?></div>
				</div>
	
			</fieldset>	<!--Termina lugar de origen-->
		</div>							
	
		<div clas="twelve columns">
			<div class="six columns">
		            <h6>País de tránsito: </h6>
		                <div id="paisTransitoId"><?=(isset($datosActor['infoMigratoria']['paisTransitoId'])) ? $catalogos['paisesCatalogo'][$datosActor['infoMigratoria']['paisTransitoId']]['nombre'] : ''; ?></div>
		
		            <h6>Intentos de cruce por el país de tránsito: </h6>
		                <div id="infoMigratoria_IntCrucesTransitoV" ><?=(isset($datosActor['infoMigratoria']['intCruceTransito'])) ? $datosActor['infoMigratoria']['intCruceTransito'] : ''; ?></div>
	
			        <h6>Expulsiones del país de tránsito: </h6>
		            <div id="expCruceTransito"> <?=(isset($datosActor['infoMigratoria']['expCruceTransito'])) ? $datosActor['infoMigratoria']['expCruceTransito'] : ''; ?></div>
	
					<h6>Realiza el viaje:</h6>
						<div id="realizaViaje" ><?=(isset($datosActor['infoMigratoria']['realizaViaje'])) ? $datosActor['infoMigratoria']['realizaViaje'] : ''; ?></div>
			
					<h6>Tipo de estancia:</h6>
			            <label id="Estancia"><?php if(isset($datosActor['infoMigratoria']['tipoEstanciaId'])){
			                    if ($datosActor['infoMigratoria']['tipoEstanciaId'] == 1 ) {
			                        print_r('Corta estancia');
			                    } else {
			                        print_r('Larga estancia');
			                    }
			                }  ?></label>
			</div>

			<div class="six columns">
		                                                        
		            <h6>País destino: </h6>
		                <div id="paisDestinoId"><?=(isset($datosActor['infoMigratoria']['paisDestinoId'])) ? $catalogos['paisesCatalogo'][$datosActor['infoMigratoria']['paisDestinoId']]['nombre'] : ''; ?></div>
		
		        <h6>Intentos de cruce al país destino: </h6>
		            <div id="intCrucesDest" ><?=(isset($datosActor['infoMigratoria']['intCruceDestino'])) ? $datosActor['infoMigratoria']['intCruceDestino'] : ''; ?></div>
		
		        <h6>Expulsiones del país de destino: </h6>
	                <div id="expCruceDestino"><?=(isset($datosActor['infoMigratoria']['expCruceDestino'])) ? $datosActor['infoMigratoria']['expCruceDestino'] : ''; ?></div>
	
				<h6>Motivo del viaje: </h6>
					<div id="motivoViaje"><?=(isset($datosActor['infoMigratoria']['motivoViaje'])) ? $datosActor['infoMigratoria']['motivoViaje'] : ''; ?></div>
		
		
		
			</div>
		</div>

		<div class="twelve columns espacioInferior">
			<fieldset>
		            <legend>Comentarios:</legend>
		            <div class="twelve columns">
			            <div class="panel">
			            	<div id="comentarios" ><?=(isset($datosActor['infoMigratoria']['comentarios'])) ? $datosActor['infoMigratoria']['comentarios'] : ''; ?></div>
			            </div>
		            </div>
		    </fieldset>
	    </div>
		
	</fieldset><!--Termina datos de nacimiento-->
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
                		<?php if (isset($datosActor['direccionActor'])) {
                			foreach ($datosActor['direccionActor'] as $key => $direccion) {?>
	                			<tr>
			                        <td><?=(isset($direccion['tipoDireccionId'])) ? $catalogos['tipoDireccion'][$direccion['tipoDireccionId']]['descripcion'] : ''; ?></td>
			                        <td><?=(isset($direccion['direccion'])) ? $direccion['direccion'] : ''; ?></td>
			                        <td><?=(isset($direccion['codigoPostal'])) ? $direccion['codigoPostal'] : ''; ?></td>
			                        <td><?=(isset($direccion['paisesCatalogo_paisId'])) ? $catalogos['paisesCatalogo'][$direccion['paisesCatalogo_paisId']]['nombre'] : ''; ?></td>
			                        <td><?=(isset($direccion['estadosCatalogo_estadoId'])) ? $catalogos['estadosCatalogo'][$direccion['estadosCatalogo_estadoId']]['nombre'] : ''; ?></td>
			                        <td><?=(isset($direccion['municipiosCatalogo_municipioId'])) ? $catalogos['municipiosCatalogo'][$direccion['municipiosCatalogo_municipioId']]['nombre'] : ''; ?></td>                        
			                        <td><input type="button" class="tiny button"  value="Editar" onclick="nuevaDireccion()"/>
			                        	<form method="post" action="<?=base_url(); ?>index.php/actores_c/eliminarDireccion/<?=$direccion['direccionId']."/".$datosActor['actores']['actorId']."/".$datosActor['actores']['tipoActorId']; ?>" >
					                     <input type="submit" value="Elminar" class="tiny button" />
					                 </form>
			                        </td>
	                    		</tr>
	            			<?php }?>
	            		<?php }?>
	                </tbody>
	            </table>
		        <?php if (isset($datosActor)) {?>
					<input type="button" class="small button"  value="Agregar dirección" onclick="nuevaDireccion()">
		        <?php } ?>
	        </div>
	    </div>
	</fieldset>
	
	<fieldset>
	    <legend>Relacion entre actores </legend>
	
	    <?php if (isset($datosActor['actores']['actorId'])) {
	        $idActor=$datosActor['actores']['actorId'];
	        $clase="";
	    }else{
	        $idActor=0;
	        $clase="Escondido";
	    } ?>
	        <h4>Actores individuales o transmigrantes</h4>
	        <!--Comienza relacion con otros actores-->
	
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
	        <div id="pestania" data-collapse>
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