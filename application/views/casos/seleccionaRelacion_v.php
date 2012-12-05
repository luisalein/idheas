<html>
<head>
	<title><?= $head ?></title>
</head>
<body>
	<h3>Actore colectivos relacionados</h3>
    <table>
        <thead>
            <tr>
                <th>Nombre(s)</th>
                <th>Sigla(s)</th>
                <th>Tipo de relación</th>
                <th>Accion(es)</th>
            </tr>
        </thead>
        <tbody>
			<?php if ($actoresRelacionados != '0' ) { ?>
    			<?php foreach ($actoresRelacionados as $relacionados) { 
    					if ((isset($relacionados['tipoActorId'])) && ($relacionados['tipoActorId'] == 3)) { ?>
		        			<tr>
		                        <td><?=(isset($relacionados['actorId'])) ? $catalogos['listaTodosActores'][$relacionados['actorId']]['nombre'] : ''; ?></td>
		                        <td><?=(isset($relacionados['actorId'])) ? $catalogos['listaTodosActores'][$relacionados['actorId']]['apellidosSiglas'] : ''; ?></td>
		                        <td><?=(isset($relacionados['tipoRelacionId'])) ? $catalogos['relacionActoresCatalogo'][$relacionados['tipoRelacionId']]['Nivel2'] : ''; ?></td>
                                <?php if ($dato==2) {?>
                                <td><input type="button" class="tiny button" value="Relacionar" onclick="seleccionarRelacionColectivo('<?=(isset($relacionados['actorId'])) ? $catalogos['listaTodosActores'][$relacionados['actorId']]['nombre'] : ''; ?>','<?=(isset($relacionados['actorId'])) ? $catalogos['listaTodosActores'][$relacionados['actorId']]['apellidosSiglas'] : ''; ?>','<?=(isset($relacionados['tipoRelacionId'])) ? $catalogos['relacionActoresCatalogo'][$relacionados['tipoRelacionId']]['Nivel2'] : ''; ?>','<?=(isset($relacionados['actorRelacionadoId'])) ? $relacionados['actorRelacionadoId'] : ''; ?>','<?=(isset($relacionados['foto'])) ? base_url().$relacionados['foto'] : ''; ?>', '1' )"></td>
                                <?php } else{ ?>
		                        <td><input type="button" class="tiny button" value="Relacionar" onclick="seleccionarRelacionColectivo('<?=(isset($relacionados['actorId'])) ? $catalogos['listaTodosActores'][$relacionados['actorId']]['nombre'] : ''; ?>','<?=(isset($relacionados['actorId'])) ? $catalogos['listaTodosActores'][$relacionados['actorId']]['apellidosSiglas'] : ''; ?>','<?=(isset($relacionados['tipoRelacionId'])) ? $catalogos['relacionActoresCatalogo'][$relacionados['tipoRelacionId']]['Nivel2'] : ''; ?>','<?=(isset($relacionados['actorRelacionadoId'])) ? $relacionados['actorRelacionadoId'] : ''; ?>','<?=(isset($relacionados['foto'])) ? base_url().$relacionados['foto'] : ''; ?>','2')"></td>
                                <?php } ?>
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