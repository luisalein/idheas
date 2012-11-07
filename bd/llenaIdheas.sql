#actores***********************


INSERT INTO `idheasIkari`.`actores`

(`nombre`,

`apellidosSiglas`,

`tipoActorId`,

`foto`,

`codigoPostal`)

VALUES

('Jan','Perez',1,'','1515'),('Jon','Perez',2,'','15150'),('Jorge','Perez',3,'','15150');


INSERT INTO `idheasIkari`.`estadoCivil`

(`descripcion`,

`notas`)

VALUES

('estadocivil1','notas'),('estadocivil2','notas'),('estadocivil3','notas');






#InfogeneralActor++++++++++++++++++++++++++++++++++++++++++


INSERT INTO `idheasIkari`.`infoGralActor`

(`generoId`,

`edad`,

`nacionalidadId`,

`hijos`,

`escolaridadId`,

`espaniol`,

`actores_actorId`,

`estadoCivil_estadoCivilId`,

`ocupacionesCatalogo_ultimaOcupacionId`,

`gruposIndigenas_grupoIndigenaId`)

VALUES

(1,24,1,2,1,'Si',1,1,1,1),(1,34,2,2,2,'Si',1,1,1,1);






#InfoGralActores************************************************

INSERT INTO `idheasIkari`.`infoGralActores`

(

`actividad`,

`paginaWeb`,

`actores_actorId`)

VALUES

('Maneja','www.agencia.com',1),('Vende','www.tianguis.com',2);





#DireccionActor************************************************+++


INSERT INTO `idheasIkari`.`direccionActor`

(`direccionId`,

`direccion`,

`tipoDireccionId`,

`actores_actorId`,

`paisesCatalogo_paisId`,

`estadosCatalogo_estadoId`,

`municipiosCatalogo_municipioId`)

VALUES

(1,'allá muy lejos',1,1,1,1,1),(2,'Muy cerca de allá',1,1,1,1,1);


#InfoContacto*****************************************************


INSERT INTO `idheasIkari`.`infoContacto`

(`telefono`,

`telefonoMovil`,

`correoE`,

`fax`,

`actores_actorId`)

VALUES

('125646','545468465','email@huy.com','115156',1),('125646','545468465','email2@huy.com','115156',2);


#infoMigratoria***********************************************


INSERT INTO `idheasIkari`.`infoMigratoria`

(`actores_actorId`,

`paisTransitoId`,

`paisDestinoId`,

`intCruceDestino`,

`intCruceTransito`,

`expCruceDestino`,

`expCruceTransito`,

`motivoViaje`,

`tipoEstanciaId`,

`realizaViaje`,

`comentarios`)

VALUES

(1,1,1,2,3,4,5,'vacaciones',1,'Acompanado','comentarios'),(2,1,1,2,3,4,5,'Negocios',1,'Solo','comentarios');


#alias**********************************************************


INSERT INTO `idheasIkari`.`alias`

(`alias`,

`actores_actorId`)

VALUES

('pato',1),('Gato',2);


#datosDeNacimiento************************************************


INSERT INTO `idheasIkari`.`datosDeNacimiento`

(`fechaNacimiento`,

`actores_actorId`,

`paisesCatalogo_paisId`,

`estadosCatalogo_estadoId`,

`municipiosCatalogo_municipioId`)

VALUES

('1987-07-24',1,1,1,1),('1987-07-24',2,1,1,1);




#Insertar casos*********************


INSERT INTO `idheasIkari`.`casos`

(`nombre`,

`personasAfectadas`,

`fechaInicial`,

`fechaTermino`)

VALUES

('caso1',1,'1987-07-26','1987-07-28'),('caso2',1,'1987-07-26','1987-07-28');


#Idioma**********************************


INSERT INTO `idheasIkari`.`idiomaCatalogo`

(`descripcion`)

VALUES

('Español'),('Ingles');




#Fichas***********************************


INSERT INTO `idheasIkari`.`fichas`

(`titulo`,

`fecha`,

`comentarios`,

`casos_casoId`)

VALUES

('Ficha1','1987-07-24','comentarios ficha1',1),('Ficha2','1987-07-24','comentarios ficha2',2);


#Infocaso***************************************


INSERT INTO `idheasIkari`.`infoCaso`

(`casos_casoId`,

`descripcion`,

`resumen`,

`observaciones`)

VALUES

(1,'descripción infocaso 1','Resumen infocaso1','observaciones infocaso1'),(2,'descripción infocaso 2','Resumen infocaso2','observaciones infocaso2');


#Lugares*******************************

INSERT INTO `idheasIkari`.`lugares`

(`casos_casoId`,

`paisesCatalogo_paisId`,

`estadosCatalogo_estadoId`,

`municipiosCatalogo_municipioId`)

VALUES

(1,1,1,1),(2,2,2,1);


#Derecho afectado*************************


INSERT INTO `idheasIkari`.`derechoAfectado`

(`derechoAfectadoCasoId`,

`fechaInicial`,

`fechaTermino`,

`noVictimas`,

`derechoAfectadoNivel`,

`derechoAfectadoId`)

VALUES

(1,'1987-07-24','1987-07-24',1,1,1),(2,'1987-07-24','1987-07-24',3,2,2);


#Actos********************************+


INSERT INTO `idheasIkari`.`actos`

(`casos_casoId`,

`actoViolatorioId`,

`actoViolatorioNivel`,

`derechoAfectado_derechoAfectadoCasoId`)

VALUES

(1,1,1,1),(2,2,2,2);





#Victima***********************************


INSERT INTO `idheasIkari`.`victimas`

(`actorId`,

`estatusVictimaId`,

`comentarios`,

`actos_actoId`)

VALUES

(1,1,'comentarios',1),(2,2,'comentarios',2);




#Nucleo caso*******************************+


INSERT INTO `idheasIkari`.`nucleoCaso`

(`fechaInicio`,

`fechaTermino`,

`noPersonasAfectadas`,

`casos_casoId`,

`municipiosCatalogo_municipioId`,

`estadosCatalogo_estadoId`,

`paisesCatalogo_paisId`)

VALUES

('1987-07-24','1987-07-24',1,1,1,1,1),('1987-07-24','1987-07-24',1,2,1,1,1);





#intervenciones*****************************************+


INSERT INTO `idheasIkari`.`intervenciones`

(`tipoIntervencionId`,

`intervencionNId`,

`fecha`,

`impacto`,

`respuesta`,

`interventorId`,

`receptorId`,

`casos_casoId`)

VALUES

(1,1,'1987-07-24','impacto','respuesta',1,1,1),(2,2,'1987-07-24','impacto','respuesta',2,2,2);


#perpetradores***************************************************


INSERT INTO `idheasIkari`.`perpetradores`

(`perpetradorId`,

`tipoPerpetradorId`,

`tipoLugarId`,

`gradoInvolucramientoid`,

`nivelInvolugramientoId`,

`estatusPerpetradorCatalogo_estatusPerpetradorId`,

`victimas_victimaId`)

VALUES

(1,1,1,1,1,1,1),(2,2,2,2,2,2,2);


#ActosPerpetrador*************************************************


INSERT INTO `idheasIkari`.`actosPerpetrador`

(`actorId`,

`ubicacion`,

`tipoLugarId`,

`nivelTipoLugarId`,

`actoId`,

`actoNId`,

`paisesCatalogo_paisId`,

`estadosCatalogo_estadoId`,

`municipiosCatalogo_municipioId`,

`perpetradores_perpetradorVictimaId`)

VALUES

(1,'casa azul',1,1,1,1,1,1,1,1),(2,'casa azul',2,2,2,2,2,1,1,2);




#registro************************************************************


INSERT INTO `idheasIkari`.`registro`

(`nombreRegistro`,

`fichas_fichaId`)

VALUES

('registro1',1),('registro1',2);


#casos-Actores********************************************************


INSERT INTO `idheasIkari`.`casos_has_actores`

(`casos_casoId`,

`actores_actorId`)

VALUES

(1,1),(2,2);


#actosN1Catalogo_has_derechosAfactadosN1Catalogo*********************


INSERT INTO `idheasIkari`.`actosN1Catalogo_has_derechosAfactadosN1Catalogo`

(`actosN1Catalogo_actoId`,

`derechosAfactadosN1Catalogo_derechoAfectadoN1Id`)

VALUES

(1,1),(2,2),(3,3);


#FuenteinfPersonal******************************* 


INSERT INTO `idheasIkari`.`fuenteInfoPersonal`

(`actorId`,

`fecha`,

`actorReportado`,

`nivelConfiabilidadCatalogo_nivelConfiabilidadId`,

`casos_casoId`,

`tipoFuenteCatalogo_tipoFuenteId`,

`idiomaCatalogo_idiomaId`)

VALUES

(1,'1987-07-24',1,1,1,1,1),(1,'1987-07-24',1,1,1,2,1);


#fuentedocumental


INSERT INTO `idheasIkari`.`tipoFuenteDocumental`

(`fecha`,

`fechaAcceso`,

`comentarios`,

`observaciones`,

`nombre`,

`casos_casoId`,

`tipoFuenteCatalogo_tipoFuenteId`,

`idiomaCatalogo_idiomaId`,

`nivelConfiabilidadCatalogo_nivelConfiabilidadId`)

VALUES

('1987-07-24','1987-07-24','comentario','observaciones','nombre de fuente documental',

1,1,1,1

),('1987-07-24','1987-07-24','comentario','observaciones','nombre de fuente documental',

1,1,1,1

);


#relacionActores*****************


INSERT INTO `idheasIkari`.`relacionActores`

(`actorRelacionadoId`,

`tipoRelacionId`,

`tipoRelacionIndividualColectivoId`,

`fechaInicial`,

`fechaTermino`,

`comentarios`,

`actores_actorId`)

VALUES

(1,1,1,'1987-07-24','1987-07-24','comentarios',1);


#relacionCasos**************************


INSERT INTO `idheasIkari`.`relacionCasos`

(`tipoRelacionId`,

`casoIdB`,

`comentarios`,

`observaciones`,

`casos_casoId`)

VALUES

(1,1,'Comentarios','observaciones',1),(1,2,'Comentarios','observaciones',2),(2,2,'comentarios','onservaciones',1);


INSERT INTO `idheasIkari`.`actorReportado`

(`actorId`,

`intervenciones_intervencionId`)

VALUES

(1,1),(2,2);


INSERT INTO `idheasIkari`.`registro`

(`nombreRegistro`,

`ruta`,

`fichas_fichaId`)

VALUES

('registro1','/var/www/...',1),('registro2','/var/www/...',2);


INSERT INTO `idheasIkari`.`intervenidos`

(`relacionId`,

`tipoRelacionId`,

`comentarios`,

`observaciones`,

`intervenciones_intervencionId`)

VALUES

(
1,1,'com','obs',1

);