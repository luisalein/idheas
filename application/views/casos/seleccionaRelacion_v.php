<html>
<head>
	<title><?= $head ?></title>
</head>
<body>
    <!-- <pre><?= print_r($actoresRelacionados)?></pre> -->
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
                                <?php  switch ($dato) {
                                    case '2': ?>
                                        <td><input type="button" class="tiny button" value="Relacionar" onclick="seleccionarRelacionColectivo('<?=(isset($relacionados['actorId'])) ? $catalogos['listaTodosActores'][$relacionados['actorId']]['nombre'] : ''; ?>','<?=(isset($relacionados['actorId'])) ? $catalogos['listaTodosActores'][$relacionados['actorId']]['apellidosSiglas'] : ''; ?>','<?=(isset($relacionados['tipoRelacionId'])) ? $catalogos['relacionActoresCatalogo'][$relacionados['tipoRelacionId']]['Nivel2'] : ''; ?>','<?=(isset($relacionados['relacionActoresId'])) ? $relacionados['relacionActoresId'] : ''; ?>','<?=(isset($relacionados['foto'])) ? base_url().$relacionados['foto'] : ''; ?>', '2' )"></td>
                                        <?php break;
                                    case '3': ?>
                                        <td><input type="button" class="tiny button" value="Relacionar" onclick="seleccionarRelacionColectivo('<?=(isset($relacionados['actorId'])) ? $catalogos['listaTodosActores'][$relacionados['actorId']]['nombre'] : ''; ?>','<?=(isset($relacionados['actorId'])) ? $catalogos['listaTodosActores'][$relacionados['actorId']]['apellidosSiglas'] : ''; ?>','<?=(isset($relacionados['tipoRelacionId'])) ? $catalogos['relacionActoresCatalogo'][$relacionados['tipoRelacionId']]['Nivel2'] : ''; ?>','<?=(isset($relacionados['relacionActoresId'])) ? $relacionados['relacionActoresId'] : ''; ?>','<?=(isset($relacionados['foto'])) ? base_url().$relacionados['foto'] : ''; ?>', '3' )"></td>
                                        <?php break;
                                    case '4': ?>
                                        <td><input type="button" class="tiny button" value="Relacionar" onclick="seleccionarRelacionColectivo('<?=(isset($relacionados['actorId'])) ? $catalogos['listaTodosActores'][$relacionados['actorId']]['nombre'] : ''; ?>','<?=(isset($relacionados['actorId'])) ? $catalogos['listaTodosActores'][$relacionados['actorId']]['apellidosSiglas'] : ''; ?>','<?=(isset($relacionados['tipoRelacionId'])) ? $catalogos['relacionActoresCatalogo'][$relacionados['tipoRelacionId']]['Nivel2'] : ''; ?>','<?=(isset($relacionados['relacionActoresId'])) ? $relacionados['relacionActoresId'] : ''; ?>','<?=(isset($relacionados['foto'])) ? base_url().$relacionados['foto'] : ''; ?>', '4' )"></td>
                                        <?php break;
                                    case '5': ?>
                                        <td><input type="button" class="tiny button" value="Relacionar" onclick="seleccionarRelacionColectivo('<?=(isset($relacionados['actorId'])) ? $catalogos['listaTodosActores'][$relacionados['actorId']]['nombre'] : ''; ?>','<?=(isset($relacionados['actorId'])) ? $catalogos['listaTodosActores'][$relacionados['actorId']]['apellidosSiglas'] : ''; ?>','<?=(isset($relacionados['tipoRelacionId'])) ? $catalogos['relacionActoresCatalogo'][$relacionados['tipoRelacionId']]['Nivel2'] : ''; ?>','<?=(isset($relacionados['relacionActoresId'])) ? $relacionados['relacionActoresId'] : ''; ?>','<?=(isset($relacionados['foto'])) ? base_url().$relacionados['foto'] : ''; ?>', '5' )"></td>
                                        <?php break;
                                    case '6': ?>
                                        <td><input type="button" class="tiny button" value="Relacionar" onclick="seleccionarRelacionColectivo('<?=(isset($relacionados['actorId'])) ? $catalogos['listaTodosActores'][$relacionados['actorId']]['nombre'] : ''; ?>','<?=(isset($relacionados['actorId'])) ? $catalogos['listaTodosActores'][$relacionados['actorId']]['apellidosSiglas'] : ''; ?>','<?=(isset($relacionados['tipoRelacionId'])) ? $catalogos['relacionActoresCatalogo'][$relacionados['tipoRelacionId']]['Nivel2'] : ''; ?>','<?=(isset($relacionados['relacionActoresId'])) ? $relacionados['relacionActoresId'] : ''; ?>','<?=(isset($relacionados['foto'])) ? base_url().$relacionados['foto'] : ''; ?>', '6' )"></td>
                                        <?php break;

                                    default: ?>
		                              <td><input type="button" class="tiny button" value="Relacionar" onclick="seleccionarRelacionColectivo('<?=(isset($relacionados['actorId'])) ? $catalogos['listaTodosActores'][$relacionados['actorId']]['nombre'] : ''; ?>','<?=(isset($relacionados['actorId'])) ? $catalogos['listaTodosActores'][$relacionados['actorId']]['apellidosSiglas'] : ''; ?>','<?=(isset($relacionados['tipoRelacionId'])) ? $catalogos['relacionActoresCatalogo'][$relacionados['tipoRelacionId']]['Nivel2'] : ''; ?>','<?=(isset($relacionados['relacionActoresId'])) ? $relacionados['relacionActoresId'] : ''; ?>','<?=(isset($relacionados['foto'])) ? base_url().$relacionados['foto'] : ''; ?>','1')"></td>
                                        <?php break;
                                    }
                                ?>
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