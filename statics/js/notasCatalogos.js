function notasCatalogos(notas,escribeNotas,id){
	if(notas!=""){
		 if(id==""){
		 	$('#'+escribeNotas).html(notas); 
		 } 
		 else{
		 	notas="botonNotas('"+notas+"')";
		 	$('#notas'+escribeNotas).html('<input type="button" value="i" class="tiny button" onclick="'+notas+'" />');

		 }	
	}
	else{
		$('#notas'+escribeNotas).html(" "); 
	}
}

function botonNotas(notas){
    var windowSizeArray = [ "width=350,height=150" ];
    OpenWindow=window.open(base+'index.php/casosVentanas_c/notas', 'notas del catálogo', windowSizeArray);;
	OpenWindow.document.write("<title>Notas</title>")
	OpenWindow.document.write("<body>")
	OpenWindow.document.write("<script>function cerrarVentana(){window.close();	};</script>");
	OpenWindow.document.write('<h6>'+notas+'</h6>')
	OpenWindow.document.write('<center><input type="button" value="Cerrar" onclick="cerrarVentana()" /></center>')
	OpenWindow.document.write("</body>")
}
