<div id="vista">
	<div class="twelve columns"><!--Lista de Actores-->  
	<form  method="post" accept-charset="utf-8" id="formEditarActor">
        <div class="twelve columns">
        	<input id="<?=$is_active; ?>_nombre" type="text"  name="<?=$is_active; ?>_nombre" 
        	placeholder="<?=($is_active == 'actores') ? 'Por nombre o apellido' : 'Por nombre del caso' ; ?>" class="seven columns" />
        </div>        
    </form> 
    	<br>
   <?php if($is_active == 'casos'): ?>  
   	    <div style="float: right; padding: 0px 15px 0px 0px;">
			<img class="cursor" src="<?=base_url(); ?>statics/media/img/system/clear.png" id="clearButton" onclick="returnCasos()">
		</div>
    	<div style="float: right; padding: 0px 15px 0px 0px;">
         	<img class="cursor" src="<?=base_url(); ?>statics/media/img/system/search.png"  id="searchButton" onclick="searchCaso()">
        </div>
   <?php endif;?>	 
   
   <?php if($is_active == 'actores'): ?>     	
		<div style="float: right; padding: 0px 15px 0px 0px;">
			<img class="cursor" src="<?=base_url(); ?>statics/media/img/system/clear.png" id="clearButton" onclick="returnActores()">
		</div>
    	<div style="float: right; padding: 0px 15px 0px 0px;">
         	<img class="cursor" src="<?=base_url(); ?>statics/media/img/system/search.png"  id="searchButton" onclick="filtroRadio()">
        </div>
        
  
    <div id="pestania" data-collapse>					
				<h2>Filtros</h2><!--título de la pestaña-->  
				<div>
					<form name="frmR">
						<div>
							<input type="radio" name="filtroR" value="1" onclick="filtroRadio()" >Víctima</input>
							<input type="radio" name="filtroR" value="2" onclick="filtroRadio()">Perpetrador</input>
						</div>
						<div>
							<input type="radio" name="filtroR" value="3" onclick="filtroRadio()">Interventor</input>
						    <input type="radio" name="filtroR" value="4" onclick="filtroRadio()">Receptor</input>
						</div>
						<div>
							<input type="hidden" name="<?=$is_actor_type; ?>" id="tipoActor" ></input>
							<input type="radio" name="filtroR" value="0" onclick="filtroRadio()">Sin filtro</input>
						</div>
					</form>
				</div>	
    </div>
   <?php endif;?>
    
    <div class="twelve columns">
    	<?php if($is_active == 'actores') echo ' <h1><div class="six columns">Foto</div></h1>'?>
       
        <h1><div class="six columns">Nombre</div></h1>
    </div>
    <!------------Lista ind-------------------->
    <?php $total=0;?>
    <div  id="listaActorIndiv" class="PruebaScorll">
        <?php if(isset($listado) && $listado != null){
        	
             if($is_active == 'actores'){
                foreach($listado as $actor): ?>
	                <?php $total=$total+1?>
	                <?php if(isset($actorId) && $actorId== $actor['actorId']): ?>
	                	 <div class="twelve columns" id="caja<?=$actor['actorId']; ?>" onclick="cargarActor(<?=$actor['actorId']; ?>,<?=$is_actor_type; ?>)" style="cursor: pointer;background:#ccc;">
		                    <img class="five columns" style="width:100px !important; height:70px !important;" src="<?=base_url().$actor['foto']; ?>" />
		                    <p style="color:#0080FF;"><?=$actor['nombre'].' '.$actor['apellidosSiglas']; ?></p>
			             </div>
			             <hr />	  
	                <?php else:?>
	                	 <div class="twelve columns" id="caja<?=$actor['actorId']; ?>" onclick="cargarActor(<?=$actor['actorId']; ?>,<?=$is_actor_type; ?>)" style="cursor: pointer;">		        
		                    <img class="five columns" style="width:100px !important; height:70px !important;" src="<?=base_url().$actor['foto']; ?>" />
		                    <p style="color:#0080FF;"><?=$actor['nombre'].' '.$actor['apellidosSiglas']; ?></p>
			             </div>
			             <hr />	                	
	                <?php endif?>
	               
            	<?php endforeach;
            } else if($listado['mensaje'] == 'ok') {
                foreach($listado as $index => $caso): ?>
                <?php $total=$total+1;?>
                 <?php if($casoId == $caso['casoId']): ?>
		                <div class="twelve columns" id="caja<?=$caso['casoId']; ?>" onclick="cargarCaso(<?=$caso['casoId']; ?>)" style="cursor: pointer;background:#ccc;">
		                   <?=$caso['nombre']; ?>
		                </div>
		                <hr />
                 <?php else:?>
                 		 <div class="twelve columns" id="caja<?=$caso['casoId']; ?>" onclick="cargarCaso(<?=$caso['casoId']; ?>)" style="cursor: pointer;">
		                   <?=$caso['nombre']; ?>
		                </div>
		                <hr />
                 <?php endif?>
            <?php endforeach;
			$total=$total-1;
            }
        } ?>
    </div><!--Termina lista de los actores-->
    
    <div id="numeroRegistros">
    	
    	<?php if ($total==1) {
    		print_r($total); ?>
			registro encontrado
		<?php } else {
			print_r($total); ?>
				registros encontrados
		<?php } ?> 
    </div>
    
</div>
</div>
