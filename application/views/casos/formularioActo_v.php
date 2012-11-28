<!-------------------Comienza la parte de Derechos afectado------------------------------------>
<html>

	<head>
	<?=$head?>
	</head>
	
<body>
<form action='<?=base_url(); ?>index.php/casosVentanas_c/guardarDatosVentanas/3' method="post" accept-charset="utf-8" id="menuForm" name="menuForm">
<!-------------------------Comienza la parte de Acto---------------------------->
<div id="formularioCasoActo">
	<div id="pestania" data-collapse>
		<h2 class="open" >Acto</h2><!--título de la sub-pestaña---->  
		<div>	
			<fieldset>
				  <legend>Información general</legend>
				<input type="hidden" name="editar" id="editar" value="<?= (isset($derechoAfectado)) ? '1' : '0' ; ?>"/>
                <input type="hidden" value="<?=$casoId; ?>" name="lugares_casos_casoId" id="lugares_casos_casoId" />
                <input type="hidden" value="" name="derechoAfectado_derechoAfectadoId" id="derechoAfectado" />
                <input type="hidden" value="" name="derechoAfectado_derechoAfectadoNivel" id="derechoAfectadoNivel" />
                <input type="hidden" value="" name="actos_actoViolatorioId" id="actoViolatorioId" />
                <input type="hidden" value="" name="actos_actoViolatorioNivel" id="actoViolatorioNivel" />
                <input type="hidden" value="5" name="5" id="tipoActorAE" />
                        <label for="derecho">Derecho afectado</label>
                        <div id="textoDerechoAfectado"></div>
                        <label for="derecho">Notas</label>
                        <div id="notasDerechoAfectado"></div>
                        <br /><br />
				         <div  id="listaActorIndiv" class="cajaDerchosActos">
	                        <ul>
								<?php foreach($derechosAfectados['derechosAfectadosN1Catalogos'] as $derechoAfectado):?> 
									<li  class="listas" >
										<div class="ExpanderFlecha flecha hand" value="subnivel" onclick="nombrederechoAfectado('<?=$derechoAfectado['derechoAfectadoN1Id'];?>','<?=$derechoAfectado['descripcion'];?>','<?=$derechoAfectado['notas'];?>',this)" >
											<?php echo $derechoAfectado['descripcion'];?>
										</div>
										<ul class="Escondido" id="<?=$derechoAfectado['derechoAfectadoN1Id'];?>DAN1" >
										
										<?php foreach($derechosAfectados['derechosAfectadosN2Catalogos'] as $derechoAfectadoN2):?>
											<?php if($derechoAfectadoN2['derechosAfectadosN1Catalogo_derechoAfectadoN1Id'] == $derechoAfectado['derechoAfectadoN1Id']):?>
												<?php foreach($catalogos['derechosAfectadosN3Catalogo'] as $c1){
														if($c1['derechosAfectadosN2Catalogo_derechoAfectadoN2Id']==$derechoAfectadoN2['derechoAfectadoN2Id']){
															$sub = 'subnivel';
															$expander = 'ExpanderFlecha flecha hand';
														}
													}?>
												
												<li  class="listas">
													<div class="<?php if(isset($expander)) echo $expander;?>" value="<?php if(isset($sub)) echo $sub;?>" onclick="nombrederechoAfectadosub1('<?=$derechoAfectado['derechoAfectadoN1Id'];?>','<?=$derechoAfectadoN2['derechoAfectadoN2Id'];?>','<?=$derechoAfectadoN2['descripcion'];?>','<?=$derechoAfectadoN2['notas'];?>')">
														<?php echo $derechoAfectadoN2['descripcion'];?>
													</div>
													<?php $expander='';
														$sub = ''; ?>
				
													<ul class="Escondido"  id="<?=$derechoAfectadoN2['derechoAfectadoN2Id'];?>DAN2" >
										
														<?php foreach($derechosAfectados['derechosAfectadosN3Catalogos'] as $derechoAfectadoN3):?>
															<?php if($derechoAfectadoN3['derechosAfectadosN2Catalogo_derechoAfectadoN2Id'] == $derechoAfectadoN2['derechoAfectadoN2Id']):?>
																
																<?foreach($catalogos['derechosAfectadosN4Catalogo'] as $c2){
																		if($c2['derechosAfectadosN3Catalogo_derechoAfectadoN3Id']==$derechoAfectadoN3['derechoAfectadoN3Id']){
																			$sub = 'subnivel';
																			$expander = 'ExpanderFlecha flecha hand';
																		}
																	}?>
																
																<li  class="listas">
																	<div class="<?php if(isset($expander)) echo $expander;?>" value="<?php if(isset($sub)) echo $sub;?>" onclick="nombrederechoAfectadosub2('<?=$derechoAfectado['derechoAfectadoN1Id'];?>','<?=$derechoAfectadoN2['derechoAfectadoN2Id'];?>','<?=$derechoAfectadoN3['derechoAfectadoN3Id'];?>','<?=$derechoAfectadoN3['descripcion'];?>','<?=$derechoAfectadoN3['notas'];?>')">
																		<?php echo $derechoAfectadoN3['descripcion'];?>
																	</div>
																	<?php $expander='';
																		$sub = ''; ?>
																		<ul class="Escondido" id="<?=$derechoAfectadoN3['derechoAfectadoN3Id'];?>DAN3" >
															
																			<?php foreach($derechosAfectados['derechosAfectadosN4Catalogos'] as $derechoAfectadoN4):?>
																				<?php if($derechoAfectadoN4['derechosAfectadosN3Catalogo_derechoAfectadoN3Id'] == $derechoAfectadoN3['derechoAfectadoN3Id']):?>
																					<li  class="listas" >
																						<div  onclick="nombrederechoAfectadosub3('<?=$derechoAfectado['derechoAfectadoN1Id'];?>','<?=$derechoAfectadoN2['derechoAfectadoN2Id'];?>','<?=$derechoAfectadoN3['derechoAfectadoN3Id'];?>','<?=$derechoAfectadoN4['derechoAfectadoN4Id'];?>','<?=$derechoAfectadoN4['descripcion'];?>','<?=$derechoAfectadoN4['notas'];?>')">
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
                        
                        <?echo "<pre>"; print_r($derechoAfectado);?>
                        	
                        	
                        	
                        	
                        	
                        <label for="Acto">Acto</label>
                        <div id="textoDerechoAfectadoN2"></div>
                        <label for="Acto">Notas Acto</label>
                        <div id="notasActoId"></div>
				         <br /><br />
							<div  id="listaActos" class="cajaDerchosActos">	
				                       
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
								<p class="<?php if(isset($fInicial)) echo ''; else echo 'Escondido';?>" id="fechaExactaVAct">
									<input type="text" id="fechaExactaAct" value="<?php if(isset($fInicial)) echo $fInicial;?>" placeholder="AAAA-MM-DD" />

								</p>

								<p class="Escondido" id="fechaAproxVAct">
									<input type="text" id="fechaAproxAct"  placeholder="AAAA-MM-DD" />

								</p>

								<p class="Escondido" id="fechaSinDiaVAct">
									<input type="text" id="fechaSinDiaAct"  placeholder="AAAA-MM-00" />

								</p >

								<p class="Escondido" id="fechaSinDiaSinMesVAct">
									<input type="text" id="fechaSinDiaSinMesAct" placeholder="AAAA-00-00" />

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
							<p class="<?php if(isset($fTermino)) echo ''; else echo 'Escondido';?>" id="fechaExactaVAct2">
								<input type="text" id="fechaExactaAct2" value="<?php if(isset($fTermino)) echo $fTermino;?>"  placeholder="AAAA-MM-DD" />

							</p>

							<p class="Escondido" id="fechaAproxVAct2">
								<input type="text" id="fechaAproxAct2"   placeholder="AAAA-MM-DD" />

							</p>

							<p class="Escondido" id="fechaSinDiaVAct2">
								<input type="text" id="fechaSinDiaAct2"  placeholder="AAAA-MM-00" />

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
							<input type="number"  name="derechoAfectado_noVictimas" placeholder="0" value="<?php if(isset($victimas)) echo $victimas;?>"/>


					</div>
				  
					<div class="six columns">
						<?=$filtroPais;?>
					</div>
				  
			</fieldset>
			<br/>
			<input class="medium button" type="button" value="Agregar víctima" onclick="ventanaVictimas('<?=$casoId;?>',0,0)"/>
			<br/>
			<br/>
			<input class="medium button" type="submit" value="Guardar" style="padding: 10px 15px 11px 15px; "/>
			<input class="medium button" type="button" value="Cancelar" onclick="cerrarVentana()" />
		</div>
	</div><!--fin acordeon información general-->
</div>
<!-----------------------Termina la parte de Acto------------------------------>
</form>
</body>
</html>

