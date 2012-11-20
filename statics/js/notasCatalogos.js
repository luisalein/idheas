function notasCatalogos(notas,escribeNotas,id){
	if(notas!=""){
		 if(id==""){
		 	$('#'+escribeNotas).html(notas); 
		 } else{
		 	notas="botonNotas('"+notas+"')";
		 	$('#notas'+escribeNotas).html('<input type="button" value="i" class="tiny button" onclick="'+notas+'" />');

		 }
	}
}

function botonNotas(notas){
	alert(notas);
}
