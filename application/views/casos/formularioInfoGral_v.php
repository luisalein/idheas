<form method="post" action="<?=$action; ?>">
<div id="formularioInfoGral">
		<div id="pestania" data-collapse>
		<h2 class="open twelve columns">Información general</h2><!--título de la sub-pestaña--->  
		<div>
			<!--Comienzan datos-->
			<div class="twelve columns">
			<div class="six columns">
				
				<p>
					<label for="nombre">Nombre: </label>
					<input type="text"  name="casos_nombre" required />
				</p>
				<p>
					<label for="personas">Personas afectadas:</label>
					<input type="number"  name="casos_personasAfectadas"  />
				</p>
						
			</div>
			<div class="twelve columns">
				<div class="six columns">
				<label for="edad">Fecha inicial</label>
					<select onclick="fechaInicialCasos(value)" name="casos_fechaInicial">
								<option></option>
								<option  value="1" checked="checked" >fecha exacta</option>
								<option  value="2">fecha aproximada</option>
								<option  value="3">Se desconce el día</option>
								<option  value="4">Se desconce el día y el mes</option>
					</select>
				</div>
				
				<div class="six columns">
					<br />
					<p class="Escondido" id="fechaExactaV">
						<input type="text" id="fechaExacta"   placeholder="AAAA-MM-DD" />

					</p>

					<p class="Escondido" id="fechaAproxV">
						<input type="text" id="fechaAprox" placeholder="AAAA-MM-DD" />

					</p>

					<p class="Escondido" id="fechaSinDiaV">
						<input type="text" id="fechaSinDia" placeholder="AAAA-MM-00" />

					</p >

					<p class="Escondido" id="fechaSinDiaSinMesV">
						<input type="text" id="fechaSinDiaSinMes" placeholder="AAAA-00-00" />

					</p>
				</div>
		</div> <!---termina opciones de fechaInicial-->
			<div class="twelve columns">
					<label for="edad">Fecha término</label>
				<div class="six columns">
					<select onclick="fechaTerminalCasos(value)" name="casos_fechaTermino" >
								<option></option>
								<option  value="1" checked="checked" >fecha exacta</option>
								<option  value="2">fecha aproximada</option>
								<option  value="3">Se desconce el día</option>
								<option  value="4">Se desconce el día y el mes</option>
					</select>
				</div>
				<div class="six columns">
					<p class="Escondido" id="fechaExactaV2">
						<input type="text" id="fechaExacta2" placeholder="AAAA-MM-DD" />

					</p>

					<p class="Escondido" id="fechaAproxV2">
						<input type="text" id="fechaAprox2"  placeholder="AAAA-MM-DD" />

					</p>

					<p class="Escondido" id="fechaSinDiaV2">
						<input type="text" id="fechaSinDia2"  placeholder="AAAA-MM-00" />

					</p >

					<p class="Escondido" id="fechaSinDiaSinMesV2">
						<input type="text" id="fechaSinDiaSinMes2" placeholder="AAAA-00-00" />

					</p>
				</div>
			</div> <!---termina opciones de fechaTermino-->
			</div>
			
				<?php echo br(2);?>	
		  	<div id="subPestanias" data-collapse>
				<h2 class="twelve columns">Descripción</h2>
					<div class="twelve columns">
						<textarea placeholder="Descripción"  rows="15" cols="100" id="infoCaso_descripcion"  wrap="hard"  name="infoCaso_descripcion"></textarea>
				   </div>	  
			</div><!--fin acordeon descripción-->
		  	
		  	<div id="subPestanias" data-collapse>
		  		<h2 class="twelve columns">Resumen</h2>
					<div class="twelve columns">
						<textarea placeholder="Resumen"  rows="20" cols="100" id="infoCaso_resumen"  wrap="hard"  name="infoCaso_resumen"></textarea>
				   </div>	  

		  	</div><!--fin acordeon observaciones-->

		  	<div id="subPestanias" data-collapse onchange="editarOpciones()" >
		  		<h2 class="twelve columns">Obsevaciones</h2>
				<div class="twelve columns">
						<textarea placeholder="Observaciones"  rows="20" cols="100" id="infoCaso_observaciones" wrap="hard"  name="infoCaso_observaciones"></textarea>
				</div>	
		  	</div><!--fin acordeon observaciones-->

		</div>
		</div><!--fin acordeon información general-->
	</div>

	<input class="small button" type="submit" onclick="mandarTexto()"/>
</form>
<!-------------------Termina primer pestaña------------------------------------->
