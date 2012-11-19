 <div class="six columns">		
	        <label for="pais">País</label>
	        <div id="datosDeNacimiento_paisesCatalogo_paisIdSelect">
	        	<?php if($tipo == 1 || $tipo == 2):?>
		            <select id="datosDeNacimiento_paisesCatalogo_paisId" name="datosDeNacimiento_paisesCatalogo_paisId" onchange="changeTest(1)">						
		                    <option></option>
		                    <?php if(isset($datosActor['datosDeNacimiento']['paisesCatalogo_paisId'])){
		                        foreach($catalogos['paisesCatalogo'] as $key => $item): ?> <!--muestra los estados civiles-->
		                    <option  value="<?=$item['paisId']?>" <?=($datosActor['datosDeNacimiento']['paisesCatalogo_paisId'] == $item['paisId']) ? 'selected="selected"' : '' ; ?> > <?=$item['nombre']?></option>
		                    <?php endforeach; } else { ?>
		                        <?php foreach($catalogos['paisesCatalogo'] as $pais):?> <!--muestra los estados civiles-->
		                        <option value="<?=$pais['paisId']; ?>"><?=$pais['nombre']; ?></option>
		                    <?php endforeach; } ?>
		             </select>
		         <?php endif;?>
		         <?php if($tipo==3 ):?>
			         	<select id="direccionActor_paisesCatalogo_paisId" name="direccionActor_paisesCatalogo_paisId" onchange="changeTest(1)">						
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
	             <?php endif;?>
	        </div>
	        <!--<input id="BotonmasdatosDeNacimiento_paisesCatalogo_paisId" type="button" class="tiny button"  value="+" onclick="mostrarTexto(this)" />    
	        <span id="TextoEspecial_datosDeNacimiento_paisesCatalogo_paisId" class="Escondido twelve columns">
	        </span>-->

        </div>

        <div class="six columns">
            <label for="estado">Estado</label>
            <?php if($tipo == 1 || $tipo == 2):?>
	            <div id="datosDeNacimiento_estadosCatalogo_estadoIdSelect"  >
	                <select id="datosDeNacimiento_estadosCatalogo_estadoId" disabled="disabled" name="datosDeNacimiento_estadosCatalogo_estadoId"  onchange="changeTest(2)">						
		               
	                </select>
	            </div>
            <?php endif;?>
		    <?php if($tipo==3):?>
            	<div id="datosDeNacimiento_estadosCatalogo_estadoIdSelect" >
	                <select id="direccionActor_estadosCatalogo_estadoId"  disabled="disabled" name="direccionActor_estadosCatalogo_estadoId"  onchange="changeTest(2)">						
		               
	                </select>
	            </div>
            <?php endif;?>
            <!--<input id="BotonmasdatosDeNacimiento_paisesCatalogo_paisId" type="button" class="tiny button"  value="+" onclick="mostrarTexto(this)" />    
            <span id="TextoEspecial_datosDeNacimiento_paisesCatalogo_paisId" class="Escondido twelve columns">
            </span>-->
        </div>

        <div class="six columns">
            
                <label for="municipio">Municipio</label>
                <?php if($tipo == 1 || $tipo == 2):?>
	               <select id="datosDeNacimiento_municipiosCatalogo_municipioId" disabled="disabled"  name="datosDeNacimiento_municipiosCatalogo_municipioId">						
	                   
	                </select>
	             <?php endif;?>
		         <?php if($tipo==3):?>
	             	<select id="direccionActor_municipiosCatalogo_municipioId" disabled="disabled" name="direccionActor_municipiosCatalogo_municipioId">						
	                   
	                </select>
                 <?php endif;?>
            <!--<input id="BotonmasdatosDeNacimiento_municipiosCatalogo_municipioId" type="button" class="tiny button"  value="+" onclick="mostrarTexto(this)" />   
            <span id="TextoEspecial_datosDeNacimiento_municipiosCatalogo_municipioId" class="Escondido twelve columns">
            </span>-->
        </div>