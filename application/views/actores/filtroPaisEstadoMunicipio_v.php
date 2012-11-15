 <div class="four columns">		

	        <label for="pais">País</label>
	        <div class="twelve columns" id="datosDeNacimiento_paisesCatalogo_paisIdSelect">
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
	        </div>
	        <!--<input id="BotonmasdatosDeNacimiento_paisesCatalogo_paisId" type="button" class="tiny button"  value="+" onclick="mostrarTexto(this)" />    
	        <span id="TextoEspecial_datosDeNacimiento_paisesCatalogo_paisId" class="Escondido twelve columns">
	        </span>-->

        </div>

        <div class="four columns">
            <label for="estado">Estado</label>
            <div id="datosDeNacimiento_estadosCatalogo_estadoIdSelect" class="twelve columns" >
                <select id="datosDeNacimiento_estadosCatalogo_estadoId" name="datosDeNacimiento_estadosCatalogo_estadoId"  onchange="changeTest(2)">						
	               
                </select>
            </div>
            <!--<input id="BotonmasdatosDeNacimiento_paisesCatalogo_paisId" type="button" class="tiny button"  value="+" onclick="mostrarTexto(this)" />    
            <span id="TextoEspecial_datosDeNacimiento_paisesCatalogo_paisId" class="Escondido twelve columns">
            </span>-->
        </div>

        <div class="four columns">
            <div id="datosDeNacimiento_municipiosCatalogo_municipioIdSelect" class="twelve columns">
                <label for="municipio">Municipio</label>
               <select id="datosDeNacimiento_municipiosCatalogo_municipioId" name="datosDeNacimiento_municipiosCatalogo_municipioId">						
                   
                </select>
            </div>
            <!--<input id="BotonmasdatosDeNacimiento_municipiosCatalogo_municipioId" type="button" class="tiny button"  value="+" onclick="mostrarTexto(this)" />   
            <span id="TextoEspecial_datosDeNacimiento_municipiosCatalogo_municipioId" class="Escondido twelve columns">
            </span>-->
        </div>