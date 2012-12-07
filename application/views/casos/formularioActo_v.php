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
				<input type="hidden" name="editar" id="editar" value="<?= (isset($derechoAfectado['derechoAfectadoCasoId'])) ? '1' : '0' ; ?>"/>
                <input type="hidden" value="<?=$casoId; ?>" name="lugares_casos_casoId" id="lugares_casos_casoId" />
                <input type="hidden" value="<?php if(isset($acto)) echo $acto['actoId']?>" name="actos_actoId" id="actos_actoId" />
                <input type="hidden" value="<?php if(isset($derechoAfectado)) echo $derechoAfectado['derechoAfectadoCasoId']?>" name="derechoAfectado_derechoAfectadoCasoId" id="derechoAfectado_derechoAfectadoCasoId" />
                <input type="hidden" value="5" name="5" id="tipoActorAE" />
				<?php if (isset($derechoAfectado['derechoAfectadoCasoId'])) { 
						$botonVictimas=1;
				 } ?>
                	<?php if(isset($derechoAfectado['derechoAfectadoNivel'])):?>
                		<?php foreach($derechosAfectados['derechosAfectadosN'.$derechoAfectado['derechoAfectadoNivel'].'Catalogos'] as $derecho){
                			if($derecho['derechoAfectadoN'.$derechoAfectado['derechoAfectadoNivel'].'Id']==$derechoAfectado['derechoAfectadoId']){
                				 echo '<label for="derecho">Derecho afectado</label>
			                        <div id="textoDerechoAfectado">'.$derecho['descripcion'].'</div>
			                        <label for="derecho">Notas</label>
			                        <div id="notasDerechoAfectado">'.$derecho['notas'].'</div>
			                        <input type="hidden" value="'.$derechoAfectado['derechoAfectadoId'].'" name="derechoAfectado_derechoAfectadoId" id="derechoAfectado" />
                					<input type="hidden" value="'.$derechoAfectado['derechoAfectadoNivel'].'" name="derechoAfectado_derechoAfectadoNivel" id="derechoAfectadoNivel" />
                			    ';
							}
							
                		} ?>
                   <?php else:?>
                   	<input type="hidden" value="" name="derechoAfectado_derechoAfectadoId" id="derechoAfectado" />
               		 <input type="hidden" value="" name="derechoAfectado_derechoAfectadoNivel" id="derechoAfectadoNivel" />
               		  <label for="derecho">Derecho afectado</label>
			         <div id="textoDerechoAfectado"></div>
			         <label for="derecho">Notas</label>
			         <div id="notasDerechoAfectado"></div>
                   <?php endif;?>
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
                        <?php if(isset($acto['actoViolatorioNivel'])):?>
                			<?php foreach($actos['actosN'.$acto['actoViolatorioNivel'].'Catalogo'] as $catalogo){
                				if($acto['actoViolatorioNivel']==1){
                					if($catalogo['actoId']==$acto['actoViolatorioId']){
		                				 echo '<label for="Acto">Acto</label>
					                        <div id="textoDerechoAfectadoN2">'.$catalogo['descripcion'].'</div>
					                        <label for="Acto">Notas Acto</label>
					                        <div id="notasActoId">'.$catalogo['notas'].'</div>
					                        <input type="hidden" value="'.$acto['actoViolatorioId'].'" name="actos_actoViolatorioId" id="actos_actoViolatorioId" />
		                					<input type="hidden" value="'.$acto['actoViolatorioNivel'].'" name="actos_actoViolatorioNivel" id="actoViolatorioNivel" />
		                			    ';
									}
                				}else{
                					if($catalogo['actoN'.$acto['actoViolatorioNivel'].'Id']==$acto['actoViolatorioId']){
		                				 echo '<label for="Acto">Acto</label>
					                        <div id="textoDerechoAfectadoN2">'.$catalogo['descripcion'].'</div>
					                        <label for="Acto">Notas Acto</label>
					                        <div id="notasActoId">'.$catalogo['notas'].'</div>
					                        <input type="hidden" value="'.$acto['actoViolatorioId'].'" name="actos_actoViolatorioId" id="actos_actoViolatorioId" />
		                					<input type="hidden" value="'.$acto['actoViolatorioNivel'].'" name="actos_actoViolatorioNivel" id="actoViolatorioNivel" />
		                			    ';
									}
                				}
	                			
								
	                		} ?>
	                   <?php else:?>
		               		 <input type="hidden" value="" name="actos_actoViolatorioId" id="actoViolatorioId" />
		                    <input type="hidden" value="" name="actos_actoViolatorioNivel" id="actoViolatorioNivel" />
		                   	<label for="Acto">Acto</label>
	                        <div id="textoDerechoAfectadoN2"></div>
	                        <label for="Acto">Notas Acto</label>
	                        <div id="notasActoId"></div>
	                   <?php endif;?>
                        
                        
				        	 <br /><br />
							<div  id="listaActos" class="cajaDerchosActos">	
				                       
							</div>
							<br /><br />
			
		            <div class="twelve columns">
							<div class="six columns">
								<label for="edad">Fecha de inicio</label>
									<select onclick="fechaInicialCasosActos(value)">
												<option></option>
												<option  value="1" checked="checked" >fecha exacta</option>
												<option  value="2">fecha aproximada</option>
												<option  value="3">Se desconce el día</option>
												<option  value="4">Se desconce el día y el mes</option>
									</select>
								</div>
				
							<div class="six columns">
								<br />
								<p class="<?php if(isset($fInicial)) echo ''; else echo 'Escondido';?>" id="fechaExactaVAct">
									<input type="text" id="fechaExactaAct" onclick="fechaInicialCasosActos(1)" value="<?php if(isset($fInicial)) echo $fInicial;?>" placeholder="AAAA-MM-DD" />

								</p>

								<p class="Escondido" id="fechaAproxVAct">
									<input type="text" id="fechaAproxAct" onclick="fechaInicialCasosActos(2)"  placeholder="AAAA-MM-DD" />

								</p>

								<p class="Escondido" id="fechaSinDiaVAct">
									<input type="text" id="fechaSinDiaAct" onclick="fechaInicialCasosActos(3)"  placeholder="AAAA-MM-00" />

								</p >

								<p class="Escondido" id="fechaSinDiaSinMesVAct">
									<input type="text" id="fechaSinDiaSinMesAct" onclick="fechaInicialCasosActos(4)"  placeholder="AAAA-00-00" />

								</p>
							</div>
						</div> <!---termina opciones de fechaInicial-->

					<div class="twelve columns">
							<label for="edad">Fecha de término</label>
						<div class="six columns">
							<select onclick="fechaTerminalCasosActos(value)">
										<option></option>
										<option  value="1" checked="checked" >fecha exacta</option>
										<option  value="2">fecha aproximada</option>
										<option  value="3">Se desconce el día</option>
										<option  value="4">Se desconce el día y el mes</option>
							</select>
						</div>
						<div class="six columns">
							<p class="<?php if(isset($fTermino)) echo ''; else echo 'Escondido';?>" id="fechaExactaVAct2">
								<input type="text" id="fechaExactaAct2" onclick="fechaTerminalCasosActos(1)" value="<?php if(isset($fTermino)) echo $fTermino;?>"  placeholder="AAAA-MM-DD" />

							</p>

							<p class="Escondido" id="fechaAproxVAct2">
								<input type="text" id="fechaAproxAct2" onclick="fechaTerminalCasosActos(2)"  placeholder="AAAA-MM-DD" />

							</p>

							<p class="Escondido" id="fechaSinDiaVAct2">
								<input type="text" id="fechaSinDiaAct2" onclick="fechaTerminalCasosActos(3)"  placeholder="AAAA-MM-00" />

							</p >

							<p class="Escondido" id="fechaSinDiaSinMesVAct2">
								<input type="text" id="fechaSinDiaSinMesAct2" onclick="fechaTerminalCasosActos(4|	)" placeholder="AAAA-00-00" />

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
			<?php if (isset($botonVictimas)) { ?>
				<input class="medium button" type="button" value="Agregar víctima" onclick="ventanaVictimas('<?=$casoId;?>',0,0)"/>
			<?php } ?>
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

