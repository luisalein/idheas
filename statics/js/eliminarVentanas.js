function eliminarLugar(idLugar,idCaso){
	document.location.href = base+'index.php/casosVentanas_c/eliminarLugar/'+idLugar+'/'+idCaso;
}
function eliminarFicha(fichaId,idCaso){
	
	document.location.href = base+'index.php/casosVentanas_c/eliminarFicha/'+fichaId+'/'+idCaso;
}

function eliminarRegistro(idRegistro,idCaso){
	document.location.href = base+'index.php/casosVentanas_c/eliminarRegistro/'+idRegistro+'/'+idCaso;
}

function eliminarDerechoAfectado(derechoId, idCaso){
	document.location.href = base+'index.php/casosVentanas_c/eliminarDerechoAfectado/'+derechoId+'/'+idCaso;
}

function eliminarRelacionCasos(relacionId,idCaso){
	document.location.href = base+'index.php/casosVentanas_c/eliminaRelacionCasos/'+relacionId+'/'+idCaso;
}

