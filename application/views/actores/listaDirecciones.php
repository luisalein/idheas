 <fieldset><!--Dirección-->
	                <legend>Dirección</legend>
	                    <div id="pestania" data-collapse>
	                        <h2 class="open">Dirección(es) </h2>
	                        <div>
	                            <table>
	                                <thead>
	                                    <tr>
	                                        <th>Tipo de dirección</th>
	                                        <th>Ubicación</th>
	                                        <th>Código Postal</th>
	                                        <th>País</th>
	                                        <th>Estado</th>
	                                        <th>Municipio</th>
	                                        <th>Acciones</th>
	                                    </tr>
	                                </thead>
	                                <tbody>
	                                       <?php if (isset($datosActor['direccionActor'])) {
	                                        foreach ($datosActor['direccionActor'] as $key => $direccion) {
	                                            if (isset($direccion['tipoDireccionId'])) {
	                                                ?>
	                                        <tr>
	                                                <td><?=(isset($direccion['tipoDireccionId'])) ? $catalogos['tipoDireccion'][$direccion['tipoDireccionId']]['descripcion'] : ''; ?></td>
	                                                <td><?=(isset($direccion['direccion'])) ? $direccion['direccion'] : ''; ?></td>
	                                                <td><?=(isset($direccion['codigoPostal'])) ? $direccion['codigoPostal'] : ''; ?></td>
	                                                <td><?=(isset($direccion['paisesCatalogo_paisId'])) ? $catalogos['paisesCatalogo'][$direccion['paisesCatalogo_paisId']]['nombre'] : ''; ?></td>
	                                                <td><?=(isset($direccion['estadosCatalogo_estadoId'])) ? $catalogos['estadosCatalogo'][$direccion['estadosCatalogo_estadoId']]['nombre'] : ''; ?></td>
	                                                <td><?=(isset($direccion['municipiosCatalogo_municipioId'])) ? $catalogos['municipiosCatalogo'][$direccion['municipiosCatalogo_municipioId']]['nombre'] : ''; ?></td>                        
	                                                <td><input type="button" class="tiny button"  value="Editar" onclick="nuevaDireccion('<?=$actorId?>','<?=$direccion['direccionId']?>')"/>
	                                                    <input type="button" value="Elminar" class="tiny button" onclick="eliminarDireccionActor('<?=$direccion['direccionId']?>','<?=$actorId?>','2')"/>
	                                                </td>
	                                        </tr>
	                                        <?php }
	                                    }
	                                    }?>
	                                </tbody>
	                            </table>
	                                <input type="button" class="small button"  value="Agregar dirección" onclick="nuevaDireccion('<?=$actorId?>','0')">
	                        </div>
	                    </div>
	                </fieldset>