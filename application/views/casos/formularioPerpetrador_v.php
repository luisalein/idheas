<html>	
	<head>
		<?=$head?>
	</head>

	<body>
		<form>

			<input type="hidden"  id="nameSeleccionado"  value="perpetradores_perpetradorId"><!--Este campo me da el name al que hay modificar el value al agregar acto(SIRVE PARA AGREGAR PERPETRADOR)-->

			<input type="hidden"  id="ValoresBotonCancelar" value="<?= (isset($perpetrador['perpetradorId'])&&($perpetrador['perpetradorId']!=0)) ? $perpetrador['perpetradorId']."*".$catalogos['listaTodosActores'][$perpetrador['perpetradorId']]['nombre']." ".$catalogos['listaTodosActores'][$perpetrador['perpetradorId']]['apellidosSiglas']."*".$catalogos['listaTodosActores'][$perpetrador['perpetradorId']]['foto'] : "" ;  ?>"><!--Este campo da los valores en caso de que se cancele la ventana agregar actor-->

			<input type="hidden" name="perpetradores_perpetradorId" id="perpetradores_perpetradorId" value="<?= (isset($perpetrador['perpetradorId'])) ? $perpetrador['perpetradorId'] : " " ;?>" >

			<input type="hidden" name="perpetradores_tipoPerpetradorId" value="<?= (isset($perpetrador['tipoPerpetradorId'])) ? $perpetrador['tipoPerpetradorId'] : " " ;?>" id="perpetradores_tipoPerpetradorId" >

			<input type="hidden" name="perpetradores_tipoPerpetradorNivel" value="<?= (isset($perpetrador['tipoPerpetradorNivel'])) ? $perpetrador['tipoPerpetradorNivel'] : " " ;?>" id="perpetradores_tipoPerpetradorNivel" >

			<input type="hidden" name="perpetradores_gradoInvolucramientoid" value="<?= (isset($perpetrador['gradoInvolucramientoid'])) ? $perpetrador['gradoInvolucramientoid'] : " " ;?>" id="perpetradores_gradoInvolucramientoid" >

			<input type="hidden" name="perpetradores_nivelInvolugramientoId" value="<?= (isset($perpetrador['nivelInvolugramientoId'])) ? $perpetrador['nivelInvolugramientoId'] : " " ;?>" id="perpetradores_nivelInvolugramientoId" >
			
			<input type="hidden" name="perpetradores_tipoLugarId" value="<?= (isset($perpetrador['tipoLugarId'])) ? $perpetrador['tipoLugarId'] : " " ;?>" id="perpetradores_tipoLugarId" >
			
			<input type="hidden" name="perpetradores_actorRelacionadoId" value="<?= (isset($perpetrador['actorRelacionadoId'])) ? $perpetrador['actorRelacionadoId'] : " " ;?>" id="perpetradores_actorRelacionadoId" >

			<fieldset>
				<legend>Información general</legend>
					<!-- <pre><?= print_r($perpetrador)?></pre>
					<pre><?= print_r($catalogos['listaTodosActores'][$perpetrador['perpetradorId']]['nombre'])?></pre> -->
				<label>Perpetrador</label>

					<div id="vistaActorRelacionado"  >

		                <?php if(isset($perpetrador['perpetradorId'])){ ?>    
		                <div class="three columns" >
		                <img style="width:120px !important; height:150px !important;" src="<?= (isset($catalogos['listaTodosActores'][$perpetrador['perpetradorId']]['foto'])) ? base_url().$catalogos['listaTodosActores'][$perpetrador['perpetradorId']]['foto'] : " " ; ?>" />
						</div>
						<div class="nine columns"><h5><?=(isset($catalogos['listaTodosActores'][$perpetrador['perpetradorId']]['nombre'])) ? $catalogos['listaTodosActores'][$perpetrador['perpetradorId']]['nombre']." "	 : " " ; ?><?= (isset($catalogos['listaTodosActores'][$perpetrador['perpetradorId']]['apellidosSiglas'])) ? $catalogos['listaTodosActores'][$perpetrador['perpetradorId']]['apellidosSiglas'] : "" ;?>
						</h5></div> 
		                <?php }?>

					</div>

					<input type="button" class="small button" onclick="seleccionarActorseleccionarActorIndColDatos('1')" value="Seleccionar actor">
					<input type="button" class="small button" value="Eliminar actor" onclick="eliminaActor()">
			</fieldset>

			<label>Notas</label>
			<div id="notasPerpetrador"></div>
			<label>Tipo de perpetrador</label>
			<div id="tipoPerpetrador"></div>

			<div class="caja CatalogoTipoPerpetrador">
				<ol>
					<?php foreach($catalogos['tipoPerpetradorN1Catalogo'] as  $nivel1) { ?> 
							<li >
								<div id="base<?=$nivel1['tipoPerpetradorN1Id']?>" class="cambiarColorPerpetrador ExpanderFlecha flecha" value="subnivel" style="padding-left:15px;" onclick="tipoPerpetrador('<?=$nivel1['tipoPerpetradorN1Id']?>','<?=$nivel1['notas']?>','<?=$nivel1['descripcion']?>','nivel1','base<?=$nivel1['tipoPerpetradorN1Id']?>',this)"> <?=$nivel1['descripcion']?>
								</div>
								<ul style="padding-left:15px;" id='nivel1<?=$nivel1['tipoPerpetradorN1Id']?>' class="Escondido" >
									<li > 
										<?php foreach($catalogos['tipoPerpetradorN2Catalogo'] as  $nivel2){?> 
											<?php if ( $nivel2['tipoPerpetradorN1Catalogo_tipoPerpetradorN1Id'] == $nivel1['tipoPerpetradorN1Id'] ) { ?>
												<div style="padding-left:15px;" onclick="tipoPerpetrador('<?=$nivel2['tipoPerpetradorN2Id']?>','<?=$nivel2['notas']?>','<?=$nivel2['descripcion']?>','nivel2','basea<?=$nivel2['tipoPerpetradorN2Id']?>',this)" id="basea<?=$nivel2['tipoPerpetradorN2Id']?>" 
													class="cambiarColorPerpetrador <?php foreach($catalogos['tipoPerpetradorN3Catalogo'] as  $nivel3){
																if ( $nivel3['tipoPerpetradorN2Catalogo_tipoPerpetradorN2Id'] == $nivel2['tipoPerpetradorN2Id'] ) { 
																		echo'ExpanderFlecha flecha"';
																		echo'value="subnivel'; 
																		break;} }?>" >
													<?=$nivel2['descripcion']?>
												</div>	
													<ul style="padding-left:15px;"  id='nivel2<?=$nivel2['tipoPerpetradorN2Id']?>' class="Escondido" >
														<li > 
															<?php foreach($catalogos['tipoPerpetradorN3Catalogo'] as  $nivel3){?> 
																<?php if ( $nivel3['tipoPerpetradorN2Catalogo_tipoPerpetradorN2Id'] == $nivel2['tipoPerpetradorN2Id'] ) { ?>
																	<div style="padding-left:15px;"  onclick="tipoPerpetrador('<?=$nivel3['tipoPerpetradorN3Id']?>','<?=$nivel3['notas']?>','<?=$nivel3['descripcion']?>', 'nivel3','baseb<?=$nivel3['tipoPerpetradorN3Id']?>',this)" id="baseb<?=$nivel3['tipoPerpetradorN3Id']?>" 
																			class="cambiarColorPerpetrador <?php foreach($catalogos['tipoPerpetradorN4Catalogo'] as  $nivel4){
																							if ( $nivel4['tipoPerpetradorN3Catalogo_tipoPerpetradorN3Id'] == $nivel3['tipoPerpetradorN3Id'] ) { 
																								echo'ExpanderFlecha flecha"';
																								echo'value="subnivel'; 
																								;break; } } ?>" >
																		<?=$nivel3['descripcion']?>
																	</div>	
																			<ul style="padding-left:15px;" id='nivel3<?=$nivel3['tipoPerpetradorN3Id']?>' class="Escondido">
																				<?php foreach($catalogos['tipoPerpetradorN4Catalogo'] as  $nivel4){?> 
																					<?php if ( $nivel4['tipoPerpetradorN3Catalogo_tipoPerpetradorN3Id'] == $nivel3['tipoPerpetradorN3Id'] ) { ?>
																						<li class="cambiarColorPerpetrador" onclick="tipoPerpetrador('<?=$nivel4['tipoPerpetradorN4Id']?>','<?=$nivel4['notas']?>','<?=$nivel4['descripcion']?>','nivel4',this)"> <?=$nivel4['descripcion']?></li>	
																					<?php }
																				} ?>
																			</ul>
																<?php }
															} ?>
														</li>
													</ul>
											<?php }
										} ?>
									</li>
								</ul>
							</li>	
					<?php };?>	
				</ol>
			</div>

			<div class="twelve columns espacioSuperior espacioInferior">
				<label>Status del perpetrador</label>
					<select name="estatusPerpetradorCatalogo_estatusPerpetradorId">
						<option></option>
						<?php if (isset($perpetrador['estatusPerpetradorCatalogo_estatusPerpetradorId'])) {
							foreach ($catalogos['estatusPerpetradorCatalogo'] as $estatusPerpetrador ) { ?>
							<option <?=($estatusPerpetrador['estatusPerpetradorId']==$perpetrador['estatusPerpetradorCatalogo_estatusPerpetradorId']) ? 'selected=selected' : "" ;?> onclick="notasCatalogos('<?= $estatusPerpetrador['notas']?>','estatusPerpetradorCatalogo_estatusPerpetradorId','2')" value="<?= $estatusPerpetrador['estatusPerpetradorId']?>" ><?= $estatusPerpetrador['descripcion']?></option>
						<?php }
						} else {?>
							<option onclick="notasCatalogos('<?= $estatusPerpetrador['notas']?>','estatusPerpetradorCatalogo_estatusPerpetradorId','2')" value="<?= $estatusPerpetrador['estatusPerpetradorId']?>" ><?= $estatusPerpetrador['descripcion']?></option>
						<?php } ?>

					</select>
					<div id="notasestatusPerpetradorCatalogo_estatusPerpetradorId"> </div>
			</div>

			<label>Notas</label>
			<div id="notasgradoDeInvolucramiento"></div>
			<label>Grado de involucramiento</label>
			<div id="gradoDeInvolucramiento"></div>

			<div class="caja CatalogoTipoPerpetrador">
				<ul>
					<?php foreach ($catalogos['gradoInvolucramientoN1Catalogo'] as $gradoN1) {?>
					<li>
						<div style="padding-left:15px;" onclick="involucramientoPerpetradores('<?= $gradoN1['notas'] ?>','<?= $gradoN1['descripcion'] ?>','<?= $gradoN1['gradoInvolucramientoN1Id']?>','1',this)"
								class="colorTipoPerpetrador <?php foreach ($catalogos['gradoInvolucramientoN2Catalogo'] as $gradoN2) {
									if ($gradoN2['gradoInvolucramientoN1Catalogo_gradoInvolucramientoN1Id']==$gradoN1['gradoInvolucramientoN1Id']) {
												echo'ExpanderFlecha flecha"';
												echo'value="subnivel'; break;
											} }?>" >
							<?= $gradoN1['descripcion']?>
						</div>
						<div style="padding-left:15px;" id="subNivelInvolucramiento<?= $gradoN1['gradoInvolucramientoN1Id']?>" class="Escondido" >
							<?php foreach ($catalogos['gradoInvolucramientoN2Catalogo'] as $gradoN2) {
								if ($gradoN2['gradoInvolucramientoN1Catalogo_gradoInvolucramientoN1Id']==$gradoN1['gradoInvolucramientoN1Id']) {?>
									<div id="tipoPerpetrador<?= $gradoN2['gradoInvolucramientoN2Id'] ?>" onclick="involucramientoPerpetradores('<?= $gradoN2['notas'] ?>','<?= $gradoN2['descripcion'] ?>','<?= $gradoN2['gradoInvolucramientoN2Id']?>','2',this)" class="colorTipoPerpetrador">
										<?= $gradoN2['descripcion'] ?>
									</div>
								<?php }
							}?>
						</div>
					</li>
					<?php }?>
				</ul>
			</div>

			<div id="subpestanias" data-collapse>
				<h2>Actor Colectivo</h2>
				<div class=]"twelve columns">
					Actualmente relacionado con:
					<div id="vistaPintaRelaciones">
						<?php if (isset($perpetrador['actorRelacionadoId'])) { ?>
		                <div class="three columns" >
		                <img style="width:120px !important; height:150px !important;" src="<?= (isset($catalogos['listaTodosActores'][$perpetrador['actorRelacionadoId']]['foto'])) ? base_url().$catalogos['listaTodosActores'][$perpetrador['actorRelacionadoId']]['foto'] : " " ; ?>" />
						</div>
						<div class="nine columns"><h5><?=(isset($catalogos['listaTodosActores'][$perpetrador['actorRelacionadoId']]['nombre'])) ? $catalogos['listaTodosActores'][$perpetrador['actorRelacionadoId']]['nombre']." "	 : " " ; ?><?= (isset($catalogos['listaTodosActores'][$perpetrador['actorRelacionadoId']]['apellidosSiglas'])) ? $catalogos['listaTodosActores'][$perpetrador['actorRelacionadoId']]['apellidosSiglas'] : "" ;?>
						</h5></div> <input type="button" value="Eliminar" onclick="eliminarRelacionVista('vistaPintaRelaciones','perpetradores_actorRelacionadoId')" class="tiny button">
						<?php }?> 
					</div>	
				</div>
			</div>


			<label>Notas</label>
			<div id="notastipoLugarActo"></div>
			<label>Lugar de Acto</label>
			<div id="tipoLugarActo"></div>
			<div class="caja CatalogoTipoPerpetrador">

				<ul>
					<?php foreach ($catalogos['tipoLugarN1Catalogo'] as $lugarN1) {?>
					<li> 
						<div id="lugarN1<?= $lugarN1['tipoLugarId']?>" style="padding-left:15px;" onclick="tipoLugarNotas('<?= $lugarN1['notas']?>','<?= $lugarN1['descripcion']?>','<?= $lugarN1['tipoLugarId']?>',this)" 
							class="colorTipoLugar <?php foreach ($catalogos['tipoLugarN2Catalogo'] as $lugarN2) {
									if ($lugarN2['tipoLugarN1Catalogo_tipoLugarId']==$lugarN1['tipoLugarId']) {
										echo'ExpanderFlecha flecha"';
										echo'value="subnivel'; break;
									 } } ?>">
							<?= $lugarN1['descripcion']?>
						 </div> 
						<ul id="subnivel<?= $lugarN1['tipoLugarId']?>" class="Escondido">
							<?php foreach ($catalogos['tipoLugarN2Catalogo'] as $lugarN2) {
								if ($lugarN2['tipoLugarN1Catalogo_tipoLugarId']==$lugarN1['tipoLugarId']) { ?>
								<li> 
									<div id="lugarN2<?= $lugarN2['tipoLugarN2Id']?>" style="padding-left:15px;" onclick="tipoLugarNotas('<?= $lugarN2['notas']?>','<?= $lugarN2['descripcion']?>','<?= $lugarN2['tipoLugarN2Id']?>',this)"
										class="colorTipoLugar <?php foreach ($catalogos['tipoLugarN3Catalogo'] as $lugarN3) {
												if ($lugarN3['tipoLugarN2Catalogo_tipoLugarN2Id']==$lugarN2['tipoLugarN2Id']) { 
													echo'ExpanderFlecha flecha"';
													echo'value="subnivel'; break;
												}}?> ">
									<?= $lugarN2['descripcion']?> 
									</div>
									<ul id="subnivel<?= $lugarN2['tipoLugarN2Id']?>" class="Escondido" >
										<?php foreach ($catalogos['tipoLugarN3Catalogo'] as $lugarN3) {
										if ($lugarN3['tipoLugarN2Catalogo_tipoLugarN2Id']==$lugarN2['tipoLugarN2Id']) { ?>
											<li>
												<div id="lugarN3<?= $lugarN3['tipoLugarN3Id']?>" style="padding-left:15px;" onclick="tipoLugarNotas('<?= $lugarN3['notas']?>','<?= $lugarN3['descripcion']?>','<?= $lugarN3['tipoLugarN3Id']?>',this)"
													class="colorTipoLugar">
													<?= $lugarN3['descripcion']?>
												</div> 
											</li>
										<?php } } ?>
									</ul>
								</li>
							<?php } } ?>
						</ul>
					</li>
					<?php }?>
				</ul>
			</div>


			<input type="submit" value="Guardar" class="tiny button">
			<input type="button" value="Cancelar" onclick="ventanaVictimas('1')" class="tiny button">

		</form>
	</body>
</html>	
