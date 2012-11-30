<!-------------------Comienza la parte de detalles del lugar------------------------------------>
<html>

	<head>
	<?=$head?>
	</head>
	
<body>
		
	<!-----------------Comienza la parte de Intervención---------------------------->
	<form action='<?=base_url(); ?>index.php/casosVentanas_c/guardarDatosVentanas/4' method="post" accept-charset="utf-8">

		<input type="hidden"  id="nameSeleccionado"  value="intervenciones_interventorId"><!--Este campo me da el name al que hay modificar el value al agregar acto(SIRVE PARA AGREGAR PERPETRADOR)-->

		<input type="hidden"  id="ValoresBotonCancelar" value="<?= (isset($intervenciones['interventorId'])&&($intervenciones['interventorId']!=0)) ? $intervenciones['interventorId']."*".$catalogos['listaTodosActores'][$intervenciones['interventorId']]['nombre']." ".$catalogos['listaTodosActores'][$intervenciones['interventorId']]['apellidosSiglas']."*".$catalogos['listaTodosActores'][$intervenciones['interventorId']]['foto'] : "" ;  ?>"><!--Este campo da los valores en caso de que se cancele la ventana agregar actor-->

		<input type="hidden" name="intervenciones_interventorId" id="intervenciones_interventorId" value="<?= (isset($intervenciones['interventorId'])) ? $intervenciones['interventorId'] : " " ;?>" >

		<input type="hidden"  id="nameSeleccionado2"  value="intervenciones_receptorId"><!--Este campo me da el name al que hay modificar el value al agregar acto(SIRVE PARA AGREGAR PERPETRADOR)-->

		<input type="hidden" name="intervenciones_receptorId" id="intervenciones_receptorId" value="<?= (isset($intervenciones['receptorId'])) ? $intervenciones['receptorId'] : " " ;?>" >

		<div id="pestania" data-collapse>
			<h2 class="open twelve columns">Intervención</h2><!--título de la sub-pestaña-->  
			<div>
				
					
				<br /><br />		
					<fieldset>
						<input type="hidden" value="<?=$casoId; ?>" name="lugares_casos_casoId" id="lugares_casos_casoId" />
						  <legend>Información general</legend>
							
							<div class="twelve columns">
								<p>
									<label for="tipoIntervencion">Tipo de intervención</label>
									<select id="tipoIntervencion" name="intervenciones_tipoIntervencionId">
									<?php foreach($lugares['paisesCatalogo'] as $key => $item):?> 
									<option value="<?=$item['paisId']; ?>"><?=$item['nombre']; ?></option>
									<?php endforeach;?>
									</select>
								</p>
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
											<div id="vistaActorRelacionado"></div>
											<input type="button" class="small button" onclick="seleccionarActorseleccionarActorIndColDatos('1')" value="Seleccionar actor">
											<input type="button" class="small button" value="Eliminar actor" onclick="eliminaActor()">
											</div>

											<div id="subpestanias" data-collapse>
												<h2 class="twelve columns">Actor colectivo</h2><!--título de la sub-pestaña-->  
												<div class="twelve columns">
													<div><b>Tipo de relación</b></div>
													<div id="vistaPintaRelaciones">	</div>	
												</div>	
											</div>	
											
									</fieldset>

								</div>
								

								<div class="six columns">
									<fieldset>
										  <legend>Receptor </legend>
											<label for="receptor">Persona</label>
											<div id="vistaActorRelacionadoReceptor"></div>											
											<input type="button" class="small button" onclick="seleccionarActorseleccionarActorIndColDatos('2')" value="Seleccionar actor">
											<input type="button" class="small button" value="Eliminar actor" onclick="eliminaActor()">
										
											<div id="subpestanias" data-collapse>
												<h2 class="twelve columns">Actor colectivo</h2><!--título de la sub-pestaña-->  
												<div>
													<div><b>Tipo de relación</b></div>
													<div id="vistaPintaRelacionesReceptor">	</div>	
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
