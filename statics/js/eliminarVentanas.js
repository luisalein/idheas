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

function mostrarCasos(){
	var windowSizeArray = [ "width=800,height=200" ];
	window.open(base+'index.php/casosVentanas_c/mostrarCasos', 'Seleccionar Caso', windowSizeArray);
}

function casoSeleccionado(idCaso, nombreCaso, fechaInicial, fechaTermino){
	
	//alert(idCaso+ nombreCaso+fechaInicial+fechaTermino);
	var cadena ='<td>'+nombreCaso+'</td>'+'<td>'+fechaInicial+'</td>'+'<td>'+fechaTermino+'</td><input type="hidden" name="relacionCasos_casoIdB" value="'+idCaso+'"/>';
	
	window.opener.document.getElementById('datosCasoRelacionado').innerHTML = cadena;
	
}


function ventanaRelacionCasos(casoId, indice){
	var windowSizeArray = [ "width=400,height=500" ];
	window.open(base+'index.php/casosVentanas_c/relacionCasos/'+casoId+'/'+indice+'/', 'Relación entre casos', windowSizeArray);
}
