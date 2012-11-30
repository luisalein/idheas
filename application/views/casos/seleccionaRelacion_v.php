<html>
<head>
	<title><?= $head ?></title>
</head>
<body>
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
		                        <td><input type="button" class="tiny button" value="Relacionar" onclick="seleccionarRelacionColectivo('<?=(isset($relacionados['actorId'])) ? $catalogos['listaTodosActores'][$relacionados['actorId']]['nombre'] : ''; ?>','<?=(isset($relacionados['actorId'])) ? $catalogos['listaTodosActores'][$relacionados['actorId']]['apellidosSiglas'] : ''; ?>')"></td>
		            		</tr>
        			<?php }
        			} ?>
			<?php } ?>
        </tbody>
    </table>
    

    <div class="twelve columns">
	    <div class="six columns">
	    	<input type="button" class="tiny button" value="Cerrar" onclick="cerrarVentana()">
	    </div>
	    <div class="six columns">
    		<input type="button" class="tiny button "  value="Nuevo" onclick="nueva_relacion_a_Col(<?=$idActor; ?>,0,0)" />
	    </div>
    </div>
	

</body>
</html>