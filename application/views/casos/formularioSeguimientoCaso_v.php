
<!-------------------Comienza la parte de seguimiento del caso------------------------------------>
<html>
	<head>
		<?=$head?>
	</head>
	
<body>
<form method="post"  action='<?=base_url(); ?>index.php/casosVentanas_c/guardarDatosVentanas/2' accept-charset="utf-8">


<input type="hidden" value="<?=$casoId; ?>" name="fichas_casos_casoId" id="fichas_casos_casoId" />

	<div id="formularioDetallerLugar">
		<div id="pestania" data-collapse >
			<h2 class="open">Detalle de la información de seguimiento del caso</h2><!--título de la sub-pestaña-->  
				<div>
					<div class="twelve columns">
						<div class="six columns">
							<p>
								<label for="clave">Clave</label>
								<input type="text" readonly="readonly" value='<?=(isset($ficha['fichaId'])) ? $ficha['fichaId'] : "Por asignar" ;?>' />
							</p>
						</div>
						<div class="six columns">
							<p>
								<label for="claveTitulo">Título</label>
								<input type="text" id="fichas_titulo" name="fichas_titulo" value="<?=(isset($ficha['titulo'])) ? $ficha['titulo'] : " " ;?>" size="60"  />

							</p>
						</div>
					</div>


			<div class="twelve columns">
				<div class="six columns">
					<label for="edad">Fecha de recepción</label>
					<select onclick="fichadeRecepcion(value)">
								<option  value="1" <?=(isset($ficha['fecha'])) ? 'checked="checked"' : " " ;?>  >fecha exacta</option>
								<option  value="2">fecha aproximada</option>
								<option  value="3">Se desconce el día</option>
								<option  value="4">Se desconce el día y el mes</option>
					</select>
					</div>
					
					<div class="six columns">
					<?php echo br(1);?>	
						<p <?=(isset($ficha['fecha'])) ? "" : 'class="Escondido"' ;?> id="fichaExactaVR">
							<input <?=(isset($ficha['fecha'])) ? 'value="'.$ficha['fecha'].'"' : " " ;?> type="text" id="fichaExactaR"  placeholder="AAAA-MM-DD" value=""/>

						</p>

						<p class="Escondido" id="fichaAproxVR">
							<input type="text" id="fichaAproxR"  value="" placeholder="AAAA-MM-DD" />

						</p>

						<p class="Escondido" id="fichaSinDiaVR">
							<input type="text" id="fichaSinDiaR" value="" placeholder="AAAA-MM-00" />

						</p >

						<p class="Escondido" id="fichaSinDiaSinMesVR">
							<input type="text" id="fichaSinDiaSinMesR" value="" placeholder="AAAA-00-00" />

						</p>
					</div>
				</div> <!---termina opciones de fechaInicial-->


			
			<div class="twelve columns">
					<?php echo br(2);?>	
						<label for="comentFichas">Comentarios</label>
						<textarea id="fichas_Comentarios" style="width: 690px; height: 200px" name="fichas_Comentarios" wrap="hard"  value=""><?=(isset($ficha['comentarios'])) ? $ficha['comentarios'] : " " ; ?> </textarea>
			
			</div>	
			
			<?php if (isset($ficha['fichaId']) ) { ?>
				
			<div id="pestania" data-collapse >
				<h2 class="open">Registros</h2><!--título de la sub-pestaña-->  
				<div>
					   <form action="upload_file.php" method="post" enctype="multipart/form-data">
					      <input name="archivo" type="file" size="35" />
					      <input name="enviar" type="submit" value="Upload File" />
					      <input type="hidden" id="fichaId" name="fichaId" value="<?php $ficha['fichaId'] ?>"/>
					      <input name="action" type="hidden" value="uploadPdf" />    
					   </form>
				</div>
			</div>
				
				
			<?php } ?>
		</div>
	
		</div>
			<input class="medium button" type="submit" value="Guardar"  />
			<input class="medium button" value="Cancelar" onclick="cerrarVentana()" />
	 </div>
</form>
	<!-------------------Termina la parte de seguimiento del caso-------------------------------------->
</body>	
</html>
