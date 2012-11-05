<!-------------------Comienza la parte de detalles del lugar------------------------------------>
<html>

	<head>
	<?=$head?>
	</head>
	
<body>
<form action='<?=base_url(); ?>index.php/casosVentanas_c/guardarDatosVentanas/3' method="post" accept-charset="utf-8">
	
<!-------------------------Comienza la parte de Acto---------------------------->
<div id="formularioCasoActo">
	<div id="pestania" data-collapse>
		<h2 class="open" >Acto</h2><!--título de la sub-pestaña---->  
		<div>	
			<fieldset>

				  <legend>Información general</legend>
                  <input type="hidden" value="<?=$casoId; ?>" name="lugares_casos_casoId" id="lugares_casos_casoId" />
                  <input type="hidden" value="" name="derechoAfectadoId" id="derechoAfectado" />
                  <input type="hidden" value="" name="derechoAfectadoNivel" id="derechoAfectadoNivel" />
                  <input type="hidden" value="" name="actoViolatorioId" id="actoViolatorioId" />
                  <input type="hidden" value="" name="actoViolatorioNivel" id="actoViolatorioNivel" />
                        <label for="derecho">Derecho afectado</label>
                        <div id="textoDerechoAfectado"></div>
                        <label for="derecho">Notas</label>
                        <div id="notasDerechoAfectado"></div>
                        <br /><br />
				         <div  id="listaActorIndiv" class="cajaDerchosActos">
	                        <ul>
								<?php foreach($derechosAfectados['derechosAfectadosN1Catalogos'] as $derechoAfectado):?> 
									<li  id="pestaniaCasos" >
										<div onclick="nombrederechoAfectado('<?=$derechoAfectado['descripcion'];?>','<?=$derechoAfectado['derechoAfectadoN1Id'];?>','<?=$derechoAfectado['notas'];?>')" >
											<?php echo $derechoAfectado['descripcion'];?>
										</div>
										<ul class="Escondido" id="<?=$derechoAfectado['derechoAfectadoN1Id'];?>DAN1" >
										
										<?php foreach($derechosAfectados['derechosAfectadosN2Catalogos'] as $derechoAfectadoN2):?>
											<?php if($derechoAfectadoN2['derechosAfectadosN1Catalogo_derechoAfectadoN1Id'] == $derechoAfectado['derechoAfectadoN1Id']):?>
												<li class=" pestaniaCasos" >
													<div  onclick="nombrederechoAfectadosub1('<?=$derechoAfectadoN2['descripcion'];?>','<?=$derechoAfectadoN2['derechoAfectadoN2Id'];?>','<?=$derechoAfectadoN2['notas'];?>')">
													<?php echo $derechoAfectadoN2['descripcion'];?>
													</div>
													<ul class="Escondido"  id="<?=$derechoAfectadoN2['derechoAfectadoN2Id'];?>DAN2" >
										
														<?php foreach($derechosAfectados['derechosAfectadosN3Catalogos'] as $derechoAfectadoN3):?>
															<?php if($derechoAfectadoN3['derechosAfectadosN2Catalogo_derechoAfectadoN2Id'] == $derechoAfectadoN2['derechoAfectadoN2Id']):?>
																<li class=" pestaniaCasos" >
																	<div  onclick="nombrederechoAfectadosub2('<?=$derechoAfectadoN3['descripcion'];?>','<?=$derechoAfectadoN3['derechoAfectadoN3Id'];?>','<?=$derechoAfectadoN3['notas'];?>')">
																	<?php echo $derechoAfectadoN3['descripcion'];?>
																	</div>
																	
																		<ul class="Escondido" id="<?=$derechoAfectadoN3['derechoAfectadoN3Id'];?>DAN3" >
															
																			<?php foreach($derechosAfectados['derechosAfectadosN4Catalogos'] as $derechoAfectadoN4):?>
																				<?php if($derechoAfectadoN4['derechosAfectadosN3Catalogo_derechoAfectadoN3Id'] == $derechoAfectadoN3['derechoAfectadoN3Id']):?>
																					<li class=" pestaniaCasos" >
																						<div  onclick="nombrederechoAfectadosub3('<?=$derechoAfectadoN4['descripcion'];?>','<?=$derechoAfectadoN4['derechoAfectadoN4Id'];?>','<?=$derechoAfectadoN4['notas'];?>')">
																						<?php echo $derechoAfectadoN4['descripcion'];?>
																						</div>
																					</li>
																				<?php endif;?>
																			<?php endforeach;?>
																		</ul>
																	
																</li>
															<?php endif;?>
														<?php endforeach;?>
														</ul>

												</li>
											<?php endif;?>
										<?php endforeach;?>
										</ul>
									</li>
								<?php endforeach;?>
							</ul>
	  					</div>	
                        <br /><br />
                        <label for="Acto">Acto</label>
                        <div id="textoDerechoAfectadoN2"></div>
                        <label for="Acto">Notas Acto</label>
                        <div id="notasActoId"></div>
				         <br /><br />
							<div  id="listaActorIndiv" class="cajaDerchosActos">	
				                        <ul style="text-decoration:none;">
											<?php foreach($actos['actosN1Catalogo'] as $acto):?> 
												<li  id="pestaniaCasos" >
													<div onclick="nombreacto('<?=$acto['descripcion'];?>','<?=$acto['actoId'];?>')" >
														<?php echo $acto['descripcion'];?>
													</div>
													
													<ul class="Escondido" id="<?=$acto['actoId'];?>act1" >
													
													<?php foreach($actos['actosN2Catalogo'] as $actoN2):?>
														<?php if($actoN2['actosN1Catalogo_actoId'] == $acto['actoId']):?>
															<li >
																<div  onclick="nombreactosub1('<?=$actoN2['descripcion'];?>','<?=$actoN2['actoN2Id'];?>','<?=$actoN2['notas'];?>')" >
																<?php echo $actoN2['descripcion'];?>
																<?php echo $actoN2['actoN2Id'];?>
																</div>	
																<ul class="Escondido"  id="<?=$actoN2['actoN2Id'];?>act2" >
													
																	<?php foreach($actos['actosN3Catalogo'] as $actoN3):?>
																		<?php if($actoN3["actosN2Catalogo_actoN2Id"] == $actoN2['actoN2Id']):?>
																			<li >
																				<div  onclick="nombreactosub2('<?=$actoN3['descripcion'];?>','<?=$actoN3['actoN3Id'];?>','<?=$actoN3['notas'];?>')">
																				<?php echo $actoN3['descripcion'];?>
																				</div>
																				
																					<ul class="Escondido" id="<?=$actoN3['actoN3Id'];?>act3" >
																		
																						<?php foreach($actos['actosN4Catalogo'] as $actoN4):?>
																							<?php if($actoN4['actosN3Catalogo_actoN3Id'] == $actoN3['actoN3Id']):?>
																								<li class=" pestaniaCasos" >
																									<div  onclick="nombreactosub3('<?=$actoN4['descripcion'];?>','<?=$actoN3['actoN3Id'];?>','<?=$actoN4['notas'];?>')">
																									<?php echo $actoN4['descripcion'];?>
																									</div>
																								</li>
																							<?php endif;?>
																						<?php endforeach;?>
																					</ul>
																				
																			</li>
																		<?php endif;?>
																	<?php endforeach;?>
																	</ul>

															</li>
														<?php endif;?>
													<?php endforeach;?>
													</ul>
												</li>
											<?php endforeach;?>
										</ul>
							</div>
							<br /><br />
			
		            <div class="twelve columns">
							<div class="six columns">
								<label for="edad">Fecha de inicio</label>
									<select onclick="fechaInicialCasosActos(value)">
												<option  value="1" checked="checked" >fecha exacta</option>
												<option  value="2">fecha aproximada</option>
												<option  value="3">Se desconce el día</option>
												<option  value="4">Se desconce el día y el mes</option>
									</select>
								</div>
				
							<div class="six columns">
								<br />
								<p class="Escondido" id="fechaExactaVAct">
									<input type="text" id="fechaExactaAct"   placeholder="AAAA-MM-DD" />

								</p>

								<p class="Escondido" id="fechaAproxVAct">
									<input type="text" id="fechaAproxAct"   placeholder="AAAA-MM-DD" />

								</p>

								<p class="Escondido" id="fechaSinDiaVAct">
									<input type="text" id="fechaSinDiaAct"   placeholder="AAAA-MM-00" />

								</p >

								<p class="Escondido" id="fechaSinDiaSinMesVAct">
									<input type="text" id="fechaSinDiaSinMesAct"  placeholder="AAAA-00-00" />

								</p>
							</div>
						</div> <!---termina opciones de fechaInicial-->
					<div class="twelve columns">
							<label for="edad">Fecha de término</label>
						<div class="six columns">
							<select onclick="fechaTerminalCasosActos(value)">
										<option  value="1" checked="checked" >fecha exacta</option>
										<option  value="2">fecha aproximada</option>
										<option  value="3">Se desconce el día</option>
										<option  value="4">Se desconce el día y el mes</option>
							</select>
						</div>
						<div class="six columns">
							<p class="Escondido" id="fechaExactaVAct2">
								<input type="text" id="fechaExactaAct2"   placeholder="AAAA-MM-DD" />

							</p>

							<p class="Escondido" id="fechaAproxVAct2">
								<input type="text" id="fechaAproxAct2"   placeholder="AAAA-MM-DD" />

							</p>

							<p class="Escondido" id="fechaSinDiaVAct2">
								<input type="text" id="fechaSinDiaAct2"   placeholder="AAAA-MM-00" />

							</p >

							<p class="Escondido" id="fechaSinDiaSinMesVAct2">
								<input type="text" id="fechaSinDiaSinMesAct2"  placeholder="AAAA-00-00" />

							</p>
						</div>
					</div> <!---termina opciones de fechaTermino-->
				<?php echo br(1);?>	
			</fieldset>
			<?php echo br(2);?>	
			
			
			<fieldset>
				  <legend>Personas afectadas y lugar</legend>
					<div class="six columns">

							<label for="personas">Personas afectadas:</label>
							<input type="number"  name="nucleoCaso_noPersonasAfectadas" placeholder="0" />

							<label for="pais">País</label>
							<select id="nucleoCaso_paisesCatalogo_paisId" name="nucleoCaso_paisesCatalogo_paisId">
							<?php foreach($catalogos['paisesCatalogo'] as  $item):?> 
									<option value="<?=$item['paisId']; ?>"><?=$item['nombre']; ?></option>
							<?php endforeach;?>
							</select>

					</div>
				  
					<div class="six columns">

							<label for="estado">Estado</label>
							<select id="nucleoCaso_estadosCatalogo_estadoId" name="nucleoCaso_estadosCatalogo_estadoId">
								<option></option>
							<?php foreach($catalogos['estadosCatalogo'] as  $item):?> 
									<option value="<?=$item['estadoId']; ?>"><?=$item['nombre']; ?></option>
							<?php endforeach;?>
							</select>
					</div><!----Termina primer mitad de datos de Nacimiento ---->

					<div class="six columns"><!----Segunda mitad de datos de Nacimiento ---->

							<label for="municipio">Municipio</label>
							<select id="nucleoCaso_municipiosCatalogo_municipioId" name="nucleoCaso_municipiosCatalogo_municipioId">
								<option></option>
							<?php foreach($catalogos['municipiosCatalogo'] as $item):?> 
									<option value="<?=$item['municipioId']; ?>"><?=$item['nombre']; ?></option>
							<?php endforeach;?>
							</select>
					</div>
				  
			</fieldset>
			
			<input class="medium button" type="submit" />
		</div>
	</div><!--fin acordeon información general-->
</div>
<!-----------------------Termina la parte de Acto------------------------------>
</form>
</body>
</html>

