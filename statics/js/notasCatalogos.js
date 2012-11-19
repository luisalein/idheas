function notasCatalogos(notas,escribeNotas){
	if(notas!=""){
		 boton='<input type="button" value="i" onclick="botonNotas("'+notas+'")" class="tiny button"/>';
		$('#'+escribeNotas).html(boton); 
	}
}

function botonNotas(notas){
	alert(notas);
}
