<div id="listaCasos" name="listaCasos"><!--Lista de Actores---->

	<ul class="button-group">
		<li><a href="<?php echo base_url(); ?>index.php/casos_c/mostrar_formulario"> <input type="button" class="small button"  value="Agregar Caso"  /> </a></li>
		<li><input type="button" class="small button" value="Eliminar Caso" onclick="esconderCasos()" /> </li>
    </ul>

			<?php echo form_open('form_c/menu'); ?> 
			<!--buscador de la lista de casos---->
			<div class="eight columns">
					<input id="casosABuscar" type="text"  name="casosABuscar" placeholder="Nombre del casos" />
			</div>
				
			<div class="four columns">
					<input  type="button" class="tiny button" value="Buscar" title="Buscar" />
			</div><!--termina buscador de la lista de actores---->
			</form>	
			
			<?php echo br(2);?>	
			<div class="twelve columns">Nombre</div>
			<?php echo br(2);?>	

<!--*************Lista de casos*************-->
				<div  id="listaCasos" class="PruebaScorll">
		
					<?php if(isset($catalogos['listaDeCasos']) == 'Aún no tienes casos en la base de datos'):?>
                    <?php foreach($catalogos['listaDeCasos']  as $item):?> 
			<div class="twelve columns" >
                            <a href="<?=base_url(); ?>index.php/casos_c/mostrar_caso/<?=$item['casoId']; ?>"><?=$item['nombre']; ?></a>
			</div>
							
					<?php endforeach;?>
					<?php endif;?> 
	</div>
			
	
		
	</div> 
