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

			<fieldset>
				<legend>Información general</legend>
					<pre><?= print_r($perpetrador)?></pre>
					<pre><?= print_r($catalogos['listaTodosActores'][$perpetrador['perpetradorId']]['nombre'])?></pre>
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

					<input type="button" class="small button" onclick="seleccionarActorIndividual()" value="Agregar actor">
					<input type="button" class="small button" value="Eliminar actor" onclick="eliminaActor()">
			</fieldset>

			<label>Tipo de perpetrador</label>
			<div id="tipoPerpetrador"></div>
			<label>Notas</label>
			<div id="notasPerpetrador"></div>

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


			<label>Grado de involucramiento</label>
			<div id="gradoDeInvolucramiento"></div>
			<label>Notas</label>
			<div id="notasgradoDeInvolucramiento"></div>

			<div class="caja CatalogoTipoPerpetrador">
				<ul>
					<?php foreach ($catalogos['gradoInvolucramientoN1Catalogo'] as $gradoN1) {?>
					<li>
						<div style="padding-left:15px;" onclick="involucramientoPerpetradores('<?= $gradoN1['notas'] ?>','<?= $gradoN1['descripcion'] ?>','<?= $gradoN1['gradoInvolucramientoN1Id']?>')"
								class="colorPerpetrador <?php foreach ($catalogos['gradoInvolucramientoN2Catalogo'] as $gradoN2) {
									if ($gradoN2['gradoInvolucramientoN1Catalogo_gradoInvolucramientoN1Id']==$gradoN1['gradoInvolucramientoN1Id']) {
												echo'ExpanderFlecha flecha"';
												echo'value="subnivel'; break;
											} }?>" >
							<?= $gradoN1['descripcion']?>
						</div>
						<div style="padding-left:15px;" id="subNivelInvolucramiento<?= $gradoN1['gradoInvolucramientoN1Id']?>" class="Escondido" >
							<?php foreach ($catalogos['gradoInvolucramientoN2Catalogo'] as $gradoN2) {
								if ($gradoN2['gradoInvolucramientoN1Catalogo_gradoInvolucramientoN1Id']==$gradoN1['gradoInvolucramientoN1Id']) {?>
									<div onclick="involucramientoPerpetradores('<?= $gradoN2['notas'] ?>','<?= $gradoN2['descripcion'] ?>','<?= $gradoN2['gradoInvolucramientoN2Id']?>')" >
										<?= $gradoN2['descripcion'] ?>
									</div>
								<?php }
							}?>
						</div>
					</li>
					<?php }?>
				</ul>
			</div>

			<pre><?= print_r($catalogos['gradoInvolucramientoN1Catalogo'])?></pre>
			<pre><?= print_r($catalogos['gradoInvolucramientoN2Catalogo'])?></pre>

			<input type="submit" value="Guardar" class="tiny button">
		</form>
	</body>
</html>	
