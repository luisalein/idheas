 <div class="ten columns">		
	        <label for="pais">País</label>
	       
			         	<select id="direccionActor_paisesCatalogo_paisId" name="direccionActor_paisesCatalogo_paisId" onchange="changeTest2(1)">						
			                    <option></option>
			                    <?php if(isset($datosActor['direccionActor'])){
							        foreach ($datosActor['direccionActor'] as $direccion) {
			                        	foreach($catalogos['paisesCatalogo'] as $key => $item): ?> <!--muestra los estados civiles-->
			                    			<option  value="<?=$item['paisId']?>" <?=($direccion['paisesCatalogo_paisId'] == $item['paisId']) ? 'selected="selected"' : '' ; ?> > <?=$item['nombre']?></option>
			                    		<?php endforeach; 
			                    	  }
			                      } else { ?>
			                        <?php foreach($catalogos['paisesCatalogo'] as $pais):?> <!--muestra los estados civiles-->
			                        <option value="<?=$pais['paisId']; ?>"><?=$pais['nombre']; ?></option>
			                    <?php endforeach; } ?>
			             </select>
	        	
	        <!--<input id="BotonmasdatosDeNacimiento_paisesCatalogo_paisId" type="button" class="tiny button"  value="+" onclick="mostrarTexto(this)" />    
	        <span id="TextoEspecial_datosDeNacimiento_paisesCatalogo_paisId" class="Escondido twelve columns">
	        </span>-->

        </div>
 disabled="disabled" 
        <div class="ten columns">
            <label for="estado">Estado</label>
            <select id="direccionActor_estadosCatalogo_estadoId"  disabled="disabled"  name="direccionActor_estadosCatalogo_estadoId"  onchange="changeTest2(2)">						
		               
	        </select>
        </div>
		<br>
        <div class="ten columns">
            <label for="municipio">Municipio</label>
	        <select id="direccionActor_municipiosCatalogo_municipioId"  disabled="disabled"  name="direccionActor_municipiosCatalogo_municipioId">
	        	
	        </select>
        </div>