function notasCatalogos(notas,escribeNotas,id){
	if(notas!=""){
		 boton='<input type="button" value="i" onclick="botonNotas('+notas+')" class="tiny button"/>';
		 if(id!=""){
		 	$('#'+escribeNotas).html(notas); 
		 } else{
		 	$('#'+escribeNotas).html(boton); 
		 }
	}
}

function botonNotas(notas){
	alert(notas);
}
