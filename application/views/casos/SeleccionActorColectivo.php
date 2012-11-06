<!DOCTYPE >
<html>
	<head>
		<?=$head?>
	</head>
	
	<body>
		<br />
		<dl class="tabs">
		  <dd class="active"><a href="#colectivo">Colectivos</a></dd>
		</dl>
		
		<ul class="tabs-content">
		  <!----Comienza la parte de los actores colectivos--- -->

		  <li class="active" id="colectivoTab">

		  	<div class="twelve columns">
		        <input id="nombre" type="text"  name="nombre"  placeholder="Buscar por nombre o apellido" class="four columns" />
		        <input type="button" class="tiny button" value="buscar">

				<div id="pestania" data-collapse >
					<h2 class="open">Filtros</h2><!--título de la sub-pestaña-->  
						<div>
							<input type="radio" name="filtro" onclick="filtroActor('',1)" value="1" id=""/>victima
							<input type="radio" name="filtro" onclick="filtroActor('',2)" value="2" id=""/>Perpetrador
							<input type="radio" name="filtro" onclick="filtroActor('',3)" value="3" id=""/>Receptor
							<input type="radio" name="filtro" onclick="filtroActor('',4)" value="4" id=""/>Interventor
						</div>		  	
				</div>	

			</div>


			<br />

			<div class="twelve columns seleccionarActorScorll">
			    	<?php if (isset($actoresColectivos)) {
			    	foreach ($actoresColectivos as $individual) {?>

					    <div class="twelve columns lista" onclick="Seleccionar('<?= $individual['actorId']."*".$individual['nombre']." ".$individual['apellidosSiglas']."*".$individual['foto'] ?>')"> 
					    		<img class="three columns imagenFoto" src="<?=base_url().$individual['foto'] ?> " />
					    		<b class="nine columns"> <?php print_r($individual['nombre']." ".$individual['apellidosSiglas']) ?></b>
						</div >

			    	<?php } 
			    	}?>
			</div >

			

		  </li>
		</ul>
		
	<input type="button"  class="button" value="Aceptar" onclick="cerrarVentana()"/>
	<input type="button"  class="button" value="Cancelar" onclick="cerrarVentanaCancelar()"/>
	</body>
</html>