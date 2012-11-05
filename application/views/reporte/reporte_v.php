<form>
	<fieldset>
	<div class="twelve columns">
		<label for="nombre">Nombre del casos</label>
		<input type="text" id="nombreDelCasos" name="actores_nombre"  required />
	</div>	
	<input class="medium button" type="submit" value="Guardar" />
	<br /></fieldset><br />

</form>

<form>
		<fieldset>
	<div class="twelve columns">
	<div class="six columns">
		<label for="fechaInicia">Desde la fecha</label>
		<input type="text" id="desdeFechaReporte" name="desdeFechaReporte" placeholder="AAAA-MM-DD" />
	</div>		
	<div class="six columns">
		<label for="fechaTermina">Hasta la fecha</label>
		<input type="text" id="hastaFechaReporte" name="hastaFechaReporte" placeholder="AAAA-MM-DD" />
	</div>
	</div>
		<input class="medium button" type="submit" value="Guardar" />

	<br /></fieldset><br />

</form>

<form>
<fieldset>
	<legend>   </legend>
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
																	<div  onclick="nombrederechoAfectadosub3('<?=$derechoAfectadoN4['descripcion'];?>','<?=$derechoAfectadoN3['derechoAfectadoN3Id'];?>','<?=$derechoAfectadoN4['notas'];?>')">
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
											<div  onclick="nombreactosub1('<?=$actoN2['descripcion'];?>','<?=$actoN2['actoN2Id'];?>')" >
											<?php echo $actoN2['descripcion'];?>
											</div>	
											<ul class="Escondido"  id="<?=$actoN2['actoN2Id'];?>act2" >
								
												<?php foreach($actos['actosN3Catalogo'] as $actoN3):?>
													<?php if($actoN3['actosN2Catalogo_actoN2Id'] == $actoN2['actoN2Id']):?>
														<li >
															<div  onclick="nombreactosub2('<?=$actoN3['descripcion'];?>','<?=$actoN3['actoN3Id'];?>')">
															<?php echo $actoN3['descripcion'];?>
															</div>
															
																<ul class="Escondido" id="<?=$actoN3['actoN3Id'];?>act3" >
													
																	<?php foreach($actos['actosN4Catalogo'] as $actoN4):?>
																		<?php if($actoN4['actosN3Catalogo_actoN3Id'] == $actoN3['actoN3Id']):?>
																			<li class=" pestaniaCasos" >
																				<div  onclick="nombreactosub3('<?=$actoN4['descripcion'];?>','<?=$actoN3['actoN3Id'];?>')">
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
		<br />
	<input class="medium button" type="submit" value="Guardar" />
<br /></fieldset><br />
</form>