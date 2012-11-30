<html>
<head>
	<title><?= $head ?></title>
</head>
<body>

	<?php if (isset($dato)) { 
		echo "<script>
			window.onunload = function(){
			   window.opener.traeColectivosRelacionados('".$dato."');
			}
		    </script>";
	} ?>

    <table>
        <thead>
            <tr>
                <th>Nombre(s)</th>
                <th>Sigla(s)</th>
                <th>Accion(es)</th>
            </tr>
        </thead>
        <tbody>
			<?php if ($actoresRelacionados != '0' ) { ?>
    			<?php foreach ($actoresRelacionados as $relacionados) { 
    					if ($relacionados['tipoActorId'] == 3) { ?>
		        			<tr>
		                        <td><?=(isset($relacionados['actorId'])) ? $catalogos['listaTodosActores'][$relacionados['actorId']]['nombre'] : ''; ?></td>
		                        <td><?=(isset($relacionados['actorId'])) ? $catalogos['listaTodosActores'][$relacionados['actorId']]['apellidosSiglas'] : ''; ?></td>
		                        <td><input type="button" class="tiny button" value="Relacionar"></td>
		            		</tr>
        			<?php }
        			} ?>
			<?php } ?>
        </tbody>
    </table>
    

    <div class="twelve columns">
	    <div class="six columns">
	    	<input type="button" class="tiny button" value="Cerrar" onclick="seleccionarColectivoConDatos(1)">
	    </div>
	    <div class="six columns">
	    </div>
    </div>
    <input type="button" class="tiny button "  value="Nuevo" onclick="nueva_relacion_a_Col(<?=$idActor; ?>,0,0)" />
	
	<!-- <pre><?= print_r($actoresRelacionados)?></pre>
	<pre><?= print_r($catalogos[' listaTodosActores'])?></pre> -->

</body>
</html>