<div id="vista" class="seven columns">
	<?=$head;?>
	<div class="twelve columns"><!--Lista de Actores-->  
	<form  method="post" accept-charset="utf-8" id="formEditarActor">
        <div class="twelve columns">
        	<input id="<?=$is_active; ?>_nombre" type="text"  name="<?=$is_active; ?>_nombre"  value="<?php if(isset($cadena)) echo $cadena;?>"
        	placeholder="<?=($is_active == 'actores') ? 'Por nombre o apellido' : 'Por nombre del caso' ; ?>" class="seven columns" />
        </div>        
    </form> 
    	<br>
   <?php if($is_active == 'casos'): ?>  
   	    <div style="float: right; padding: 0px 15px 0px 0px;">
			<img class="cursor" src="<?=base_url(); ?>statics/media/img/system/clear.png" id="clearButton" onclick="returnRelacionCasos()">
		</div>
    	<div style="float: right; padding: 0px 15px 0px 0px;">
         	<img class="cursor" src="<?=base_url(); ?>statics/media/img/system/search.png"  id="searchButton" onclick="searchCaso()">
        </div>
   <?php endif;?>	 
  
    <?=br(2);?>
    <div class="twelve columns">
        <h1><div class="six columns">Nombre</div></h1>
    </div>
    <!------------Lista ind-------------------->
    <?php $total=0;?>
    <div  id="listaActorIndiv" class="PruebaScorll">
        <?php if(isset($listado) && $listado != null){
            	if ($listado!="Aún no tienes casos en la base de datos") {
	                foreach($listado as $index => $caso): ?>
	                <?php if(isset($caso['casoId'])): ?>
		                <?php $total=$total+1;?>
		                 <div class="twelve columns noSeleccionado" id="caja<?=$caso['casoId']; ?>" onclick="casoSeleccionado('<?=$caso['casoId']?>','<?=$caso['nombre']?>','<?=$caso['fechaInicial']?>','<?=$caso['fechaTermino']?>')" style="cursor: pointer;">
				             <?=$caso['nombre']; ?>
				        </div>
				        <hr />
		               <?php endif?>   
	            	<?php endforeach;
            	}else{
            		echo($listado);
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
