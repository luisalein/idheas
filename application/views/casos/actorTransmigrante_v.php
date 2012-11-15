<!DOCTYPE >
<html>
	<head>
		<?=$head?>
	</head>
	
	<body>
		<br />
		<dl class="tabs">
		  <dd class="<?=($pestana == 'individual') ? 'active' : '' ; ?>"><a href="<?=base_url(); ?>index.php/actores_c/seleccionarIndividual">Individual</a></dd>
		  <dd class="<?=($pestana == 'trans') ? 'active' : '' ; ?>"><a href="<?=base_url(); ?>index.php/actores_c/cargarTransmigrante">Transmigrante</a></dd>
		</dl>
		<div id="individual">
	
			<ul class="tabs-content">
			  <li class="active" id="indivdualTab">
	
			  	<div class="twelve columns">
			  		<div class="ten columns">
			  			<input id="actores_nombre" type="text"  name="actores_nombre"  placeholder="Buscar por nombre o apellido" />
			  		</div>
			  		<div style="float: left; padding: 0px 15px 0px 0px;">
			  			<img class="cursor" src="<?=base_url(); ?>statics/media/img/system/search.png"  id="searchButton" onclick="filtroRadio(5)">
	    			</div>
					<div id="pestania" data-collapse >
						<h2 class="open">Filtros</h2><!--título de la sub-pestaña--> 
						<form name="frmR"> 
							<div>
								<input type="radio" name="filtroR" onclick="filtroRadio(1)" value="1" id=""/>Víctima
								<input type="radio" name="filtroR" onclick="filtroRadio(2)" value="2" id=""/>Perpetrador
								<input type="radio" name="filtroR" onclick="filtroRadio(3)" value="3" id=""/>Receptor
								<input type="radio" name="filtroR" onclick="filtroRadio(4)" value="4" id=""/>Interventor
								<input type="radio" name="filtroR" onclick="filtroRadio(8)" value="8" id=""/>Sin filtro
								<input type="hidden" name="1" id="tipoActor" />
								<input type="hidden" name="4" id="tipoVentana" />
							</div>	
						</form>		  	
					</div>	
	
				</div>
	
	
				<br />
				<div class="twelve columns seleccionarActorScorll" id="ventana1Filtro">				    	
					<?php if(isset($actoresTransmigrantes)):?>
				    	<?php foreach ($actoresTransmigrantes as $individual) {?>
	
						    <div class="twelve columns lista" id="<?= $individual['actorId']?>" onclick="Seleccionar('<?= $individual['actorId']."*".$individual['nombre']." ".$individual['apellidosSiglas']."*".$individual['foto'] ?>')"> 
						    		<img class="three columns imagenFoto" src="<?=base_url().$individual['foto'] ?> " />
						    		<b class="nine columns"> <?php print_r($individual['nombre']." ".$individual['apellidosSiglas']) ?></b>
							</div >
	
				    	<?php } ?>
				    <?php endif;?>
				</div >
	
				
			  </li>
			  
			</ul>
		</div>
		
		
	<input type="button"  class="button" value="Aceptar" onclick="cerrarVentana()"/>
	<input type="button"  class="button" value="Cancelar" onclick="cerrarVentanaCancelar()"/>
	</body>
</html>