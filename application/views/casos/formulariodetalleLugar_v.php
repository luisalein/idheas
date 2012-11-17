<!-------------------Comienza la parte de detalles del lugar------------------------------------>
<html>

	<head>
    <?=$head; ?>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#lugares_paisesCatalogo_paisId').ddslick();
        });
    </script>
	</head>
	
<body>
<form action='<?=base_url(); ?>index.php/casosVentanas_c/guardarDatosVentanas/1' method="post" accept-charset="utf-8"  id="menuForm" name="menuForm" >
		   <input type="hidden" id="tipoActorAE"  name="4"/>
	       <input type="hidden" value="<?=$casoId; ?>" name="lugares_casos_casoId" id="lugares_casos_casoId" />
	       <input type="hidden" <?=(isset($lugar['lugarId']) ? 'value="'.$lugar['lugarId'].'"'.' '.'name="lugares_lugarId"' : ''); ?>  id="lugares_lugarId" />
		   <input type="hidden" id='editar' name="editar" value="0" />
	       <div class="twelve columns">
	       		<div class="six columns">		
		        	<label for="pais">País</label>
		       		<select id="lugares_paisesCatalogo_paisId" name="lugares_paisesCatalogo_paisId" onchange="changeTest(1)">						
				         <option></option>
				          <?php foreach($catalogos['paisesCatalogo'] as $pais):?> <!--muestra los estados civiles-->
				                        <option value="<?=$pais['paisId']; ?>"><?=$pais['nombre']; ?></option>
				          <?php endforeach; ?>
				     </select>
				 </div>    
				 <div class="six columns">
				 	<label for="estado">Estado</label>
				     <select id="lugares_estadosCatalogo_estadoId" name="lugares_estadosCatalogo_estadoId"  onchange="changeTest(2)">						
			               
		             </select>
	             </div> 
	             <div class="six columns">
	             	<label for="municipio">Municipio</label>
		             <select id="lugares_municipiosCatalogo_municipioId" name="lugares_municipiosCatalogo_municipioId">						
		                   
		             </select>
		         </div>    
			</div>
			<div>

			<?php echo br(4);?>		
			<input class="small button" type="submit" value="Guardar"/>
			<input class="small button" value="Cancelar" onclick="cerrarVentana()" />
			</div>
		</div>
</div>
</body>
</html>

