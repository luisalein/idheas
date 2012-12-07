<!-------------------Comienza la parte de detalles del lugar------------------------------------>
<html>

	<head>
	<?=$head?>
	</head>
	
<body>
		
	<!-----------------Comienza la parte de Intervención---------------------------->
	<form action='<?=base_url(); ?>index.php/casosVentanas_c/guardarDatosVentanas/4' method="post" accept-charset="utf-8">

		<input type="hidden"  id="nameSeleccionado"  value="intervenciones_interventorId"><!--Este campo me da el name al que hay modificar el value al agregar acto(SIRVE PARA AGREGAR intervenciones)-->

		<input type="hidden" name="intervenciones_interventorId" id="intervenciones_interventorId" value="<?= (isset($intervenciones['interventorId'])) ? $intervenciones['interventorId'] : " " ;?>" >
		
		<input type="hidden" name="intervenciones_casos_casoId" id="intervenciones_casos_casoId" value="<?= $casoId;?>" >
		
		<input type="hidden"  id="ValoresBotonCancelar" value="<?= (isset($intervenciones['interventorId'])&&($intervenciones['interventorId']!=0)) ? $intervenciones['interventorId']."*".$catalogos['listaTodosActores'][$intervenciones['interventorId']]['nombre']." ".$catalogos['listaTodosActores'][$intervenciones['interventorId']]['apellidosSiglas']."*".$catalogos['listaTodosActores'][$intervenciones['interventorId']]['foto'] : "" ;  ?>"><!--Este campo da los valores en caso de que se cancele la ventana agregar actor-->

		<input type="hidden" name="intervenciones_receptorId" id="intervenciones_receptorId" value="<?= (isset($intervenciones['receptorId'])) ? $intervenciones['receptorId'] : " " ;?>" >
		
		<input type="hidden"  id="nameSeleccionado2"  value="intervenciones_receptorId"><!--Este campo me da el name al que hay modificar el value al agregar acto(SIRVE PARA AGREGAR intervenciones)-->

		<input type="hidden" name="intervenciones_tipoRelacionReceptor" id="intervenciones_tipoRelacionReceptor" value="<?= (isset($intervenciones['tipoRelacionReceptor'])) ? $intervenciones['tipoRelacionReceptor'] : " " ;?>" >

		<input type="hidden" value="intervenciones_tipoRelacionReceptor" id="nameDeLaRelacion2" >

		<input type="hidden" name="intervenciones_tipoRelacionInterventor" id="intervenciones_tipoRelacionInterventor"  value="<?= (isset($intervenciones['tipoRelacionInterventor'])) ? $intervenciones['tipoRelacionInterventor'] : " " ;?>">
		
		<input type="hidden" name="intervenciones_intervencionNId" id="intervenciones_intervencionNId"  value="<?= (isset($intervenciones['intervencionNId'])) ? $intervenciones['intervencionNId'] : " " ;?>">
		
		<input type="hidden" name="intervenciones_tipoIntervencionId" id="intervenciones_tipoIntervencionId"  value="<?= (isset($intervenciones['tipoIntervencionId'])) ? $intervenciones['tipoIntervencionId'] : " " ;?>">

		<input type="hidden" value="intervenciones_tipoRelacionInterventor" id="nameDeLaRelacion" >
		
		<input type="hidden" value="<?= (isset($intervenciones['interventorId'])) ? 1 : 0 ;?>" name="editar" id="editar" >

	
		<div id="pestania" data-collapse>
			<h2 class="open twelve columns">Intervención</h2><!--título de la sub-pestaña-->  
			<div>
				
					
				<br /><br />		
					<fieldset>
						<input type="hidden" value="<?=$casoId; ?>" name="lugares_casos_casoId" id="lugares_casos_casoId" />
						  <legend>Información general</legend>
							
							<div class="twelve columns">
									<label for="tipoIntervencion">Tipo de intervención</label>
									
			<div class="caja CatalogotipoIntervencion">
				<ol>
					<?php foreach($catalogos['tipoIntervencionN1Catalogo'] as  $nivel1) { ?> 
							<li >
								<div id="base<?=$nivel1['tipoIntervencionN1Id']?>" class="cambiarColorPerpetrador ExpanderFlecha flecha" value="subnivel" style="padding-left:15px;" onclick="tipoIntervencion('<?=$nivel1['tipoIntervencionN1Id']?>','<?=$nivel1['descripcion']?>','nivel1','base<?=$nivel1['tipoIntervencionN1Id']?>',this)"> <?=$nivel1['descripcion']?>
								</div>
								<ul style="padding-left:15px;" id='nivel1<?=$nivel1['tipoIntervencionN1Id']?>' class="Escondido" >
									<li > 
										<?php foreach($catalogos['tipoIntervencionN2Catalogo'] as  $nivel2){?> 
											<?php if ( $nivel2['tipoIntervencionN1Catalogo_tipoIntervencionN1Id'] == $nivel1['tipoIntervencionN1Id'] ) { ?>
												<div style="padding-left:15px;" onclick="tipoIntervencion('<?=$nivel2['tipoIntervencionN2Id']?>','<?=$nivel2['descripcion']?>','nivel2','basea<?=$nivel2['tipoIntervencionN2Id']?>',this)" id="basea<?=$nivel2['tipoIntervencionN2Id']?>" 
													class="cambiarColorPerpetrador <?php foreach($catalogos['tipoIntervencionN3Catalogo'] as  $nivel3){
																if ( $nivel3['tipoIntervencionN2Catalogo_tipoIntervencionN2Id'] == $nivel2['tipoIntervencionN2Id'] ) { 
																		echo'ExpanderFlecha flecha"';
																		echo'value="subnivel'; 
																		break;} }?>" >
													<?=$nivel2['descripcion']?>
												</div>	
													<ul style="padding-left:15px;"  id='nivel2<?=$nivel2['tipoIntervencionN2Id']?>' class="Escondido" >
														<li > 
															<?php foreach($catalogos['tipoIntervencionN3Catalogo'] as  $nivel3){?> 
																<?php if ( $nivel3['tipoIntervencionN2Catalogo_tipoIntervencionN2Id'] == $nivel2['tipoIntervencionN2Id'] ) { ?>
																	<div style="padding-left:15px;"  onclick="tipoIntervencion('<?=$nivel3['tipoIntervencionN3Id']?>','<?=$nivel3['descripcion']?>', 'nivel3','baseb<?=$nivel3['tipoIntervencionN3Id']?>',this)" id="baseb<?=$nivel3['tipoIntervencionN3Id']?>" 
																			class="cambiarColorPerpetrador <?php foreach($catalogos['tipoIntervencionN4Catalogo'] as  $nivel4){
																							if ( $nivel4['tipoIntervencionN3Catalogo_tipoIntervencionN3Id'] == $nivel3['tipoIntervencionN3Id'] ) { 
																								echo'ExpanderFlecha flecha"';
																								echo'value="subnivel'; 
																								;break; } } ?>" >
																		<?=$nivel3['descripcion']?>
																	</div>	
																			<ul style="padding-left:15px;" id='nivel3<?=$nivel3['tipoIntervencionN3Id']?>' class="Escondido">
																				<?php foreach($catalogos['tipoIntervencionN4Catalogo'] as  $nivel4){?> 
																					<?php if ( $nivel4['tipoIntervencionN3Catalogo_tipoIntervencionN3Id'] == $nivel3['tipoIntervencionN3Id'] ) { ?>
																						<li class="cambiarColorPerpetrador" onclick="tipoIntervencion('<?=$nivel4['tipoIntervencionN4Id']?>','<?=$nivel4['descripcion']?>','nivel4',this)"> <?=$nivel4['descripcion']?></li>	
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


								</div>
							
							<div class="twelve columns">
							<div class="six columns">	
								<p>
									<label for="fecha">Fecha: </label>
									<input type="text" id="datepickerIntervencion"name="intervenciones_fecha" <?= (isset($intervenciones['fecha'])) ? 'value="'.$intervenciones['fecha'].'"' : "" ;?> placeholder="AAAA-MM-DD" />

								</p>
							</div>
							</div>
								<div class="twelve columns">
									<label for="tipoIntervencion">Impacto</label>									
									<textarea id="intervenciones_impacto" class="twelve columns" style="height: 150px" name="intervenciones_impacto" value="" wrap="hard"  ><?= (isset($intervenciones['impacto'])) ? $intervenciones['impacto'] : ' ' ;?> </textarea>
								</div>

								<div class="twelve columns">
									<label for="tipoRespuesta">En respuesta</label>
									<textarea id="intervenciones_respuesta" class="twelve columns" style="height: 150px" name="intervenciones_respuesta" value="" wrap="hard"  ><?= (isset($intervenciones['respuesta'])) ? $intervenciones['respuesta'] : ' ' ;?></textarea>
								</div>
							<?php echo br(2);?>	

					</fieldset>
					
								<?php echo br(1);?>	
							<div class="twelve columns">
								<div class="six columns">
									
									<fieldset>
										  <legend>Interventor </legend>
										  	<div class="twelve columns">
											<label for="Interventor">Persona</label>
											<div id="vistaActorRelacionado">

								                <?php if(isset($intervenciones['interventorId'])){ ?>    
								                <div class="three columns" >
								                <img style="width:150px !important; height:150px !important;" src="<?= (isset($catalogos['listaTodosActores'][$intervenciones['interventorId']]['foto'])) ? base_url().$catalogos['listaTodosActores'][$intervenciones['interventorId']]['foto'] : " " ; ?>" />
												</div>
												<div class="nine columns"><h5><?=(isset($catalogos['listaTodosActores'][$intervenciones['interventorId']]['nombre'])) ? $catalogos['listaTodosActores'][$intervenciones['interventorId']]['nombre']." "	 : " " ; ?><?= (isset($catalogos['listaTodosActores'][$intervenciones['interventorId']]['apellidosSiglas'])) ? $catalogos['listaTodosActores'][$intervenciones['interventorId']]['apellidosSiglas'] : "" ;?>
												</h5></div> 
								                <?php }?>

											</div>
											<input type="button" class="small button" onclick="seleccionarActorseleccionarActorIndColDatos('1')" value="Seleccionar actor"><br>
											<input type="button" class="small button" value="Eliminar actor" onclick="eliminaActor()">
											</div>
								<div id="pestania" data-collapse>
									<h2>Actor Colectivo</h2>
									<div class="twelve columns">
										<div id="vistaActorRelacionadoPerpetrador">
											<div id="vistaPintaRelaciones">
													<?php if (isset($intervenciones['receptorId'])) { ?>
									                <div class="three columns" >
									                <img style="width:130px !important; height:150px !important;" src="<?= (isset($catalogos['listaTodosActores'][$catalogos['relacionesActoresCatalogo'][$intervenciones['tipoRelacionReceptor']]['actorRelacionadoId']]['foto'])) ? base_url().$catalogos['listaTodosActores'][$catalogos['relacionesActoresCatalogo'][$intervenciones['tipoRelacionReceptor']]['actorRelacionadoId']]['foto'] : " " ; ?>" />
													</div>
																																				
													<div class="nine columns"> 
														<h5><?=(isset($catalogos['listaTodosActores'][$catalogos['relacionesActoresCatalogo'][$intervenciones['tipoRelacionReceptor']]['actorRelacionadoId']]['nombre'])) ? $catalogos['listaTodosActores'][$catalogos['relacionesActoresCatalogo'][$intervenciones['tipoRelacionReceptor']]['actorRelacionadoId']]['nombre']	 : " " ; ?>
														<?=(isset($catalogos['listaTodosActores'][$catalogos['relacionesActoresCatalogo'][$intervenciones['tipoRelacionReceptor']]['actorRelacionadoId']]['apellidosSiglas'])) ? $catalogos['listaTodosActores'][$catalogos['relacionesActoresCatalogo'][$intervenciones['tipoRelacionReceptor']]['actorRelacionadoId']]['apellidosSiglas']	 : " " ; ?></h5> <br> 
													<h5>Tipo de relacion</h5>
														<?=(isset($catalogos['relacionesActoresCatalogo'][$intervenciones['tipoRelacionReceptor']]['tipoRelacionId'])) ? $catalogos['relacionActoresCatalogo'][$catalogos['relacionesActoresCatalogo'][$intervenciones['tipoRelacionReceptor']]['tipoRelacionId']]['Nivel2']	 : " " ; ?></h5> <br> 

													</div> 
													<?php }?> 
											</div>
										</div>
											<input type="button" value="Eliminar" onclick="eliminarRelacionVista('vistaPintaRelacionesReceptor','intervencioneses_actorRelacionadoId')" class="tiny button">	
									</div>
								</div>

	
											
									</fieldset>

								</div>
								

								<div class="six columns">
									<fieldset>
										  <legend>Receptor </legend>
											<label for="receptor">Persona</label>
											<div id="vistaActorRelacionadoReceptor">
												<?php if (isset($intervenciones['receptorId'])) { ?>
								                <div class="three columns" >
								                <img style="width:150px !important; height:150px !important;" src="<?= (isset($catalogos['listaTodosActores'][$intervenciones['receptorId']]['foto'])) ? base_url().$catalogos['listaTodosActores'][$intervenciones['receptorId']]['foto'] : " " ; ?>" />
												</div>
												<div class="nine columns"><h5><?=(isset($catalogos['listaTodosActores'][$intervenciones['receptorId']]['nombre'])) ? $catalogos['listaTodosActores'][$intervenciones['receptorId']]['nombre']." "	 : " " ; ?><?= (isset($catalogos['listaTodosActores'][$intervenciones['receptorId']]['apellidosSiglas'])) ? $catalogos['listaTodosActores'][$intervenciones['receptorId']]['apellidosSiglas'] : "" ;?>
												</h5>

												</div> 
												<?php }?> 
											</div>											
											<input type="button" class="small button" onclick="seleccionarActorseleccionarActorIndColDatos('2')" value="Seleccionar actor"><br>
											<input type="button" class="small button" value="Eliminar actor" onclick="eliminaActor()">
										
								<div id="pestania" data-collapse>
									<h2>Actor Colectivo</h2>
									<div class="twelve columns">
										<div id="vistaActorRelacionadoPerpetrador2">
											<div id="vistaPintaRelacionesReceptor">
													<?php if (isset($intervenciones['tipoRelacionInterventor'])) { ?>
									                <div class="three columns" >
									                <img style="width:130px !important; height:150px !important;" src="<?= (isset($catalogos['listaTodosActores'][$catalogos['relacionesActoresCatalogo'][$intervenciones['tipoRelacionInterventor']]['actorRelacionadoId']]['foto'])) ? base_url().$catalogos['listaTodosActores'][$catalogos['relacionesActoresCatalogo'][$intervenciones['tipoRelacionInterventor']]['actorRelacionadoId']]['foto'] : " " ; ?>" />
													</div>
																																				
													<div class="nine columns"> 
														<h5><?=(isset($catalogos['listaTodosActores'][$catalogos['relacionesActoresCatalogo'][$intervenciones['tipoRelacionInterventor']]['actorRelacionadoId']]['nombre'])) ? $catalogos['listaTodosActores'][$catalogos['relacionesActoresCatalogo'][$intervenciones['tipoRelacionInterventor']]['actorRelacionadoId']]['nombre']	 : " " ; ?>
														<?=(isset($catalogos['listaTodosActores'][$catalogos['relacionesActoresCatalogo'][$intervenciones['tipoRelacionInterventor']]['actorRelacionadoId']]['apellidosSiglas'])) ? $catalogos['listaTodosActores'][$catalogos['relacionesActoresCatalogo'][$intervenciones['tipoRelacionInterventor']]['actorRelacionadoId']]['apellidosSiglas']	 : " " ; ?></h5> <br> 
													<h5>Tipo de relacion</h5>
														<?=(isset($catalogos['relacionesActoresCatalogo'][$intervenciones['tipoRelacionInterventor']]['tipoRelacionId'])) ? $catalogos['relacionActoresCatalogo'][$catalogos['relacionesActoresCatalogo'][$intervenciones['tipoRelacionInterventor']]['tipoRelacionId']]['Nivel2']	 : " " ; ?></h5> <br> 

													</div> 
													<?php }?> 
											</div>
										</div>
											<input type="button" value="Eliminar" onclick="eliminarRelacionVista('vistaPintaRelacionesReceptor','intervencioneses_actorRelacionadoId')" class="tiny button">	
									</div>
								</div>



											
									</fieldset>
								</div>
								<?php echo br(2);?>	
							</div>
					
					
					
					<div id="subPestanias" data-collapse>
						<h2 class="twelve columns">Personas por las que se interviene</h2>
							<div >
								  <span>Agregar</span>
				  
							</div>	  
					</div><!--fin acordeon descripción-->
			
			<input class="medium button" type="submit" value="Guardar"/>
			<input class="medium button" value="Cancelar" onclick="cerrarVentana()" />
			</div>
			
		</div><!--fin acordeon información general-->
	</form>
	<!-----------------------Termina la parte de Intervención---------------------->

</body>
</html>
