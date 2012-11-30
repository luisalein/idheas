/******************Ventanas Nuevo*************************/

function ventanaDetalleLugar(casoId, indice){
	  var windowSizeArray = [ "width=800,height=200" ];
		window.open(base+'index.php/casosVentanas_c/ventanaLugares/'+casoId+'/'+indice+'/', 'Detalles Lugar', windowSizeArray);
	};

function ventanaFicha(casoId, indice){
	  var windowSizeArray = [ "width=770,height=700,scrollbars=yes" ];
	window.open(base+'index.php/casosVentanas_c/seguimientoCaso/'+casoId+'/'+indice+'/', 'Seguimiento del caso', windowSizeArray);
	};


function ventanaDerAfectados(casoId, indice){
	  var windowSizeArray = [ "width=770,height=700,scrollbars=yes" ];
	window.open(base+'index.php/casosVentanas_c/derechosAfectados/'+casoId+'/'+indice+'/', 'Derechos Afectados/'+casoId, windowSizeArray);
	};

function ventanaInterevenciones(casoId, indice){
	  var windowSizeArray = [ "width=770,height=700,scrollbars=yes" ];
	window.open(base+'index.php/casosVentanas_c/intervenciones/'+casoId+'/'+indice+'/', 'Intervenciones', windowSizeArray);
	};


function ventanaFuenteDoc(casoId, actorId,indice){
	  var windowSizeArray = [ "width=770,height=700,scrollbars=yes" ];
	window.open(base+'index.php/casosVentanas_c/fuentesDeInformacion/'+casoId+'/'+actorId+'/'+indice+'/', 'Fuente documental', windowSizeArray);
	};


function ventanaFuentePersonal(casoId,actorId, indice){
	  var windowSizeArray = [ "width=770,height=700,scrollbars=yes" ];
	window.open(base+'index.php/casosVentanas_c/fuentesDeInformacionPersonal/'+casoId+'/'+actorId+'/'+indice+'/', 'Fuente Personal', windowSizeArray);
	};


function ventanaRelacionCasos(casoId, indice){
	  var windowSizeArray = [ "width=770,height=700,scrollbars=yes" ];
	window.open(base+'index.php/casosVentanas_c/relacionCasos/'+casoId+'/'+indice+'/', 'Relacion casos', windowSizeArray);
	};

function ventanaVictimas(casoId){
	  var windowSizeArray = [ "width=900,height=700,scrollbars=yes" ];
	window.open(base+'index.php/casos_c/mostrarVictimas/'+casoId+'/0/0', 'Ventana victimas', windowSizeArray);
	};

function ventanaPerpetradores(casoId,victimaId,perpetradorId){
	  var windowSizeArray = [ "width=950,height=700,scrollbars=yes" ];
	window.open(base+'index.php/casos_c/mostrarPerpetrador/'+casoId+'/'+victimaId+'/'+perpetradorId, 'Ventana perpetradores', windowSizeArray);
	};

/******************************************/

/* Fechas para fuente documental */
	$(function() {
		$( "#fechaPubli" ).datepicker({ dateFormat: "yy-mm-dd",
		changeYear: true });
		 });
		 
	$(function() {
		$( "#fechaAcceso" ).datepicker({ dateFormat: "yy-mm-dd",
		changeYear: true });
		 });

////Fechas para Seguimiento del caso
	$(function() {
		$( "#fichaExacta" ).datepicker({ dateFormat: "yy-mm-dd",
		changeYear: true });
		 });
    

	$(function() {
		$( "#fichaAprox" ).datepicker({ dateFormat: "yy-mm-dd"});
		 });
    
/***Script para cambiar el año y el mes****/
	$(function() {
		$( "#fichaSinDia" ).datepicker({ dateFormat: "yy-mm-00"});
		});

/***Funcion para cambiar el año****/
	$(function() {
		$( "#fichaSinDiaSinMes" ).datepicker({ dateFormat: "yy-00-00"});
		});
		

/////////fECHA FICHA INICIAL SEGUIMIENTO DE CASOS

	$(function() {
		$( "#fichaExactaR" ).datepicker({ dateFormat: "yy-mm-dd",
		changeYear: true });
		 });
    

	$(function() {
		$( "#fichaAproxR" ).datepicker({ dateFormat: "yy-mm-dd"});
		 });
    
/***Script para cambiar el año y el mes****/
	$(function() {
		$( "#fichaSinDiaR" ).datepicker({ dateFormat: "yy-mm-00"});
		});

/***Funcion para cambiar el año****/
	$(function() {
		$( "#fichaSinDiaSinMesR" ).datepicker({ dateFormat: "yy-00-00"});
		});


  ///Función que agrega name a lafecha seleccionada en Seguimiento del caso
  function fichadeRecepcion(a){
		  if(a=="1"){
			$('#fichaAproxR').attr('name', ' ');
			$('#fichaSinDiaR').attr('name', ' ');
			$('#fichaSinDiaSinMesR').attr('name', ' ');
			$('#fichaExactaR').attr('name', 'fichas_fecha');
			$("#fichaAproxVR").hide();
			$("#fichaSinDiaVR").hide();
			$("#fichaSinDiaSinMesVR").hide();
			$("#fichaExactaVR").show("slow");
		  }
		  else if (a=="2"){
			$("#fichaSinDiaSinMesVR").hide();
			$("#fichaSinDiaVR").hide();
			$("#fichaExactaVR").hide();
			$("#fichaAproxVR").show("slow");
			$('#fichaSinDiaR').attr('name', ' ');
			$('#fichaSinDiaSinMesR').attr('name', ' ');
			$('#fichaExactaR').attr('name', ' ');
			$('#fichaAproxR').attr('name', 'fichas_fecha');
		  }
		  else if (a=="3"){
			$("#fichaAproxVR").hide();
			$("#fichaSinDiaSinMesVR").hide();
			$("#fichaExactaVR").hide();
			$("#fichaSinDiaVR").show("slow");
			$('#fichaSinDiaSinMesR').attr('name', ' ');
			$('#fichaExactaR').attr('name', ' ');
			$('#fichaAproxR').attr('name', ' ');
			$('#fichaSinDiaR').attr('name', 'fichas_fecha');
		  }
		  else if (a=="4"){;
			$("#fichaAproxVR").hide();
			$("#fichaSinDiaVR").hide();
			$("#fichaExactaVR").hide();
			$("#fichaSinDiaSinMesVR").show("slow");
			$('#fichaExactaR').attr('name', ' ');
			$('#fichaAproxR').attr('name', ' ');
			$('#fichaSinDiaR').attr('name', '');
			$('#fichaSinDiaSinMesR').attr('name', 'fichas_fecha');
		  }
	  
	  }
 


  ///Función que agrega name a lafecha seleccionada en caso
  function fichadeRecepcionInicial(a){
		  if(a=="1"){
			$('#fichaAprox').attr('name', ' ');
			$('#fichaSinDia').attr('name', ' ');
			$('#fichaSinDiaSinMes').attr('name', ' ');
			$('#fichaExacta').attr('name', 'casos_fechaInicial');
			$("#fichaAproxV").hide();
			$("#fichaSinDiaV").hide();
			$("#fichaSinDiaSinMesV").hide();
			$("#fichaExactaV").show("slow");
		  }
		  else if (a=="2"){
			$("#fichaSinDiaSinMesV").hide();
			$("#fichaSinDiaV").hide();
			$("#fichaExactaV").hide();
			$("#fichaAproxV").show("slow");
			$('#fichaSinDia').attr('name', ' ');
			$('#fichaSinDiaSinMes').attr('name', ' ');
			$('#fichaExacta').attr('name', ' ');
			$('#fichaAprox').attr('name', 'casos_fechaInicial');
		  }
		  else if (a=="3"){
			$("#fichaAproxV").hide();
			$("#fichaSinDiaSinMesV").hide();
			$("#fichaExactaV").hide();
			$("#fichaSinDiaV").show("slow");
			$('#fichaSinDiaSinMes').attr('name', ' ');
			$('#fichaExacta').attr('name', ' ');
			$('#fichaAprox').attr('name', ' ');
			$('#fichaSinDia').attr('name', 'casos_fechaInicial');
		  }
		  else if (a=="4"){;
			$("#fichaAproxV").hide();
			$("#fichaSinDiaV").hide();
			$("#fichaExactaV").hide();
			$("#fichaSinDiaSinMesV").show("slow");
			$('#fichaExacta').attr('name', ' ');
			$('#fichaAprox').attr('name', ' ');
			$('#fichaSinDia').attr('name', '');
			$('#fichaSinDiaSinMes').attr('name', 'casos_fechaInicial');
		  }
	  
	  }



/****************formulario de  derechos afectados**********************/




/*//Funciones colapsibles//*/
/*************************************************************/
function  nombrederechoAfectado(valor, descripcion,  notas,e){
	var algo="#"+valor+"DAN1";
	$('#textoDerechoAfectado').html(descripcion);
	$('#notasDerechoAfectado').html(notas); 
	$('#textoDerechoAfectado').attr('name', ' ');
	$('#derechoAfectado').attr('value', valor); 
	$('#derechoAfectadoNivel').attr('value', 1); 
	$(algo).toggleClass("Escondido");
	subnivel= $(e).attr('value');
	    if (subnivel == "subnivel"){
				$(e).toggleClass('ExpanderFlecha');
		};
	traerActos(valor1);
};

function nombrederechoAfectadosub1(valor1, valor2,descripcion2, notas){
	var nombre="#"+valor2+"DAN2";
	$('#notasDerechoAfectado').html(notas); 
	$('#textoDerechoAfectado').html(descripcion2); 
	$('#textoDerechoAfectado').attr('name', ' ');
	$('#derechoAfectado').attr('value', valor2);
	$('#derechoAfectadoNivel').attr('value', 2); 
	$(nombre).toggleClass("Escondido");
	traerActos(valor1,valor2);
};
	

function nombrederechoAfectadosub2(valor1, valor2, valor3,descripcion3, notas){
	var nombre="#"+valor3+"DAN3";
	$('#notasDerechoAfectado').html(notas); 
	$('#textoDerechoAfectado').html(descripcion3); 
	$('#textoDerechoAfectado').attr('name', ' ');
	$('#derechoAfectado').attr('value', valor3);
	$('#derechoAfectadoNivel').attr('value', 3); 
	$(nombre).toggleClass("Escondido");
	traerActos(valor1,valor2,valor3);
};


function nombrederechoAfectadosub3(valor1,valor2,valor3,valor4,descripcion4,notas){
	$('#notasDerechoAfectado').html(notas); 
	$('#textoDerechoAfectado').html(descripcion4); 
	$('#textoDerechoAfectado').attr('name', ' ');
	$('#derechoAfectado').attr('value', valor4);
	$('#derechoAfectadoNivel').attr('value', 4); 
	traerActos(valor1,valor2,valor3,valor4);
};

function traerActos(id1,id2,id3,id4){
	
	//alert("nivel "+nivel+'id: '+valor+"antecesor: "+antecesor);
	
	var url = base+'index.php/casosVentanas_c/traerActos';
	
	if(id1 != 'undefined')
		var data = 'id1='+id1;
	if(id2 != 'undefined')
		var data = 'id1='+id1+'&id2='+id2;
	if(id3 != 'undefined')
		var data = 'id1='+id1+'&id2='+id2+'&id3='+id3;
	if(id4 != 'undefined')
		var data = 'id1='+id1+'&id2='+id2+'&id3='+id3+'&id4='+id4;			
		
	$.ajax({
	    
	        url: url,
	    
	        data: data,
	        
	        type: 'POST',
	                
	        success: function(data){ 
	               
	          $('#listaActos').html(data);  
	            
	        },
	        
	        error: function(){
	        
	           alert("no se pudo traer actos");
	        }
	    
	    });
}

/*//Funciones colapsibles derechos afectados//*/
/*************************************************************/
function  nombrarActo(descripcion, valor,notas,nivel,e){
	var activar="#"+valor+"act"+nivel;
	$('#textoDerechoAfectadoN2').html(descripcion); 
	$('#notasActoId').html(notas); 
	$('#textoDerechoAfectadoN2').attr('name', ' ');
	$('#actoViolatorioId').attr('value', valor); 
	$('#actoViolatorioNivel').attr('value', nivel); 
	$(activar).toggleClass("Escondido");
	subnivel= $(e).attr('value');
	    if (subnivel == "subnivel"){
				$(e).toggleClass('ExpanderFlecha');
		};
};


	$(function() {
		$( "#fechaExactaAct" ).datepicker({ dateFormat: "yy-mm-dd",
		changeYear: true });
		 });
    

	$(function() {
		$( "#fechaAproxAct" ).datepicker({ dateFormat: "yy-mm-dd"});
		 });
    
/***Script para cambiar el año y el mes****/
	$(function() {
		$( "#fechaSinDiaAct" ).datepicker({ dateFormat: "yy-mm-00"});
		});

/***Funcion para cambiar el año****/
	$(function() {
		$( "#fechaSinDiaSinMesAct" ).datepicker({ dateFormat: "yy-00-00"});
		});
		
/////////FECHA TERMINAL ACTOS
		
	$(function() {
		$( "#fechaExactaAct2" ).datepicker({ dateFormat: "yy-mm-dd",
		changeYear: true });
		 });
    

	$(function() {listaVictimas
		$( "#fechaAproxAct2" ).datepicker({ dateFormat: "yy-mm-dd"});
		 });
    
/***Script para cambiar el año y el mes****/
	$(function() {
		$( "#fechaSinDiaAct2" ).datepicker({ dateFormat: "yy-mm-00"});
		});

/***Funcion para cambiar el año****/
	$(function() {
		$( "#fechaSinDiaSinMesAct2" ).datepicker({ dateFormat: "yy-00-00"});
		});
		



  /********************************/
  ///Función que agrega name a lafecha seleccionada en acto
  function fechaInicialCasosActos(a){
		  if(a=="1"){
			$('#fechaAproxAct').attr('name', ' ');
			$('#fechaSinDiaAct').attr('name', ' ');
			$('#fechaSinDiaSinMesAct').attr('name', ' ');
			$('#fechaExactaAct').attr('name', 'derechoAfectado_fechaInicial');
			$("#fechaAproxVAct").hide();
			$("#fechaSinDiaVAct").hide();
			$("#fechaSinDiaSinMesVAct").hide();
			$("#fechaExactaVAct").show("slow");
		  }
		  else if (a=="2"){			
			$('#fechaSinDiaVAct').attr('name', ' ');
			$('#fechaSinDiaSinMesVAct').attr('name', ' ');
			$('#fechaExactaAct').attr('name', ' ');
			$('#fechaAproxAct').attr('name', 'derechoAfectado_fechaInicial');
			$("#fechaSinDiaSinMesVAct").hide();
			$("#fechaSinDiaVAct").hide();
			$("#fechaExactaVAct").hide();
			$("#fechaAproxVAct").show("slow");
		  }
		  else if (a=="3"){
			$("#fechaAproxVAct").hide();
			$("#fechaSinDiaSinMesVAct").hide();
			$("#fechaExactaVAct").hide();
			$("#fechaSinDiaVAct").show("slow");
			$('#fechaSinDiaSinMesVAct').attr('name', ' ');
			$('#fechaExactaVAct').attr('name', ' ');
			$('#fechaAproxVAct').attr('name', ' ');
			$('#fechaSinDiaAct').attr('name', 'derechoAfectado_fechaInicial');
		  }
		  else if (a=="4"){;
			$("#fechaAproxVAct").hide();
			$("#fechaSinDiaVAct").hide();
			$("#fechaExactaVAct").hide();
			$("#fechaSinDiaSinMesVAct").show("slow");
			$('#fechaExactaVAct').attr('name', ' ');
			$('#fechaAproxVAct').attr('name', ' ');
			$('#fechaSinDiaVAct').attr('name', '');
			$('#fechaSinDiaSinMesAct').attr('name', 'derechoAfectado_fechaInicial');
		  }
	  
	  }
     
  /********************************/
  ///Función que agrega name a lafecha seleccionada acto
  function fechaTerminalCasosActos(a){
		  if(a=="1"){
			$('#fechaAproxAct2').attr('name', ' ');
			$('#fechaSinDiaAct2').attr('name', ' ');
			$('#fechaSinDiaSinMesAct2').attr('name', ' ');
			$('#fechaExactaAct2').attr('name', 'derechoAfectado_fechaTermino');
			$("#fechaAproxVAct2").hide();
			$("#fechaSinDiaVAct2").hide();
			$("#fechaSinDiaSinMesVAct2").hide();
			$("#fechaExactaVAct2").show("slow");
		  }
		  else if (a=="2"){listaVictimas
			$("#fechaSinDiaSinMesVAct2").hide();
			$("#fechaSinDiaVAct2").hide();
			$("#fechaExactaVAct2").hide();
			$("#fechaAproxVAct2").show("slow");
			$('#fechaSinDiaAct2').attr('name', ' ');
			$('#fechaSinDiaSinMesActAct2').attr('name', ' ');
			$('#fechaExactaAct2').attr('name', ' ');
			$('#fechaAproxAct2').attr('name', 'derechoAfectado_fechaTermino');
		  }
		  else if (a=="3"){
			$("#fechaAproxVAct2").hide();
			$("#fechaSinDiaSinMesVAct2").hide();
			$("#fechaExactaVAct2").hide();
			$("#fechaSinDiaVAct2").show("slow");
			$('#fechaSinDiaSinMesAct2').attr('name', ' ');
			$('#fechaExactaAct2').attr('name', ' ');
			$('#fechaAproxAct2').attr('name', ' ');
			$('#fechaSinDiaAct2').attr('name', 'derechoAfectado_fechaTermino');
		  }
		  else if (a=="4"){;
			$("#fechaAproxVAct2").hide();
			$("#fechaSinDiaVAct2").hide();
			$("#fechaExactaVAct2").hide();
			$("#fechaSinDiaSinMesVAct2").show("slow");
			$('#fechaExactaAct2').attr('name', ' ');
			$('#fechaAproxAct2').attr('name', ' ');
			$('#fechaSinDiaAct2').attr('name', '');
			$('#fechaSinDiaSinMesAct2').attr('name', 'derechoAfectado_fechaTermino');
		  }
	  
	  }

/**********************Agregar caso************************/
/////////FECHA INICIAL CASOS

	$(function() {
		$( "#fechaExacta" ).datepicker({ dateFormat: "yy-mm-dd",
		changeYear: true });
		 });
    

	$(function() {
		$( "#fechaAprox" ).datepicker({ dateFormat: "yy-mm-dd"});
		 });
    
/***Script para cambiar el año y el mes****/
	$(function() {
		$( "#fechaSinDia" ).datepicker({ dateFormat: "yy-mm-00"});
		});

/***Funcion para cambiar el año****/
	$(function() {
		$( "#fechaSinDiaSinMes" ).datepicker({ dateFormat: "yy-00-00"});
		});
		
/////////FECHA TERMINAL CASOS
		
	$(function() {
		$( "#fechaExacta2" ).datepicker({ dateFormat: "yy-mm-dd",
		changeYear: true });
		 });
    

	$(function() {
		$( "#fechaAprox2" ).datepicker({ dateFormat: "yy-mm-dd"});
		 });
    
/***Script para cambiar el año y el mes****/
	$(function() {
		$( "#fechaSinDia2" ).datepicker({ dateFormat: "yy-mm-00"});
		});

/***Funcion para cambiar el año****/
	$(function() {
		$( "#fechaSinDiaSinMes2" ).datepicker({ dateFormat: "yy-00-00"});
		});


  ///Funciones que agrega name a lafecha seleccionada caso
     
  function fechaInicialCasos(a){
		  if(a=="1"){
			$('#fechaAprox').attr('name', ' ');listaVictimas
			$('#fechaSinDia').attr('name', ' ');
			$('#fechaSinDiaSinMes').attr('name', ' ');
			$('#fechaExacta').attr('name', 'casos_fechaInicial');
			$("#fechaAproxV").hide();
			$("#fechaSinDiaV").hide();
			$("#fechaSinDiaSinMesV").hide();
			$("#fechaExactaV").show("slow");
		  }
		  else if (a=="2"){
			$("#fechaSinDiaSinMesV").hide();
			$("#fechaSinDiaV").hide();
			$("#fechaExactaV").hide();
			$("#fechaAproxV").show("slow");
			$('#fechaSinDia').attr('name', ' ');
			$('#fechaSinDiaSinMes').attr('name', ' ');
			$('#fechaExacta').attr('name', ' ');
			$('#fechaAprox').attr('name', 'casos_fechaInicial');
		  }
		  else if (a=="3"){
			$("#fechaAproxV").hide();
			$("#fechaSinDiaSinMesV").hide();
			$("#fechaExactaV").hide();
			$("#fechaSinDiaV").show("slow");
			$('#fechaSinDiaSinMes').attr('name', ' ');
			$('#fechaExacta').attr('name', ' ');
			$('#fechaAprox').attr('name', ' ');
			$('#fechaSinDia').attr('name', 'casos_fechaInicial');
		  }
		  else if (a=="4"){;
			$("#fechaAproxV").hide();
			$("#fechaSinDiaV").hide();
			$("#fechaExactaV").hide();
			$("#fechaSinDiaSinMesV").show("slow");
			$('#fechaExacta').attr('name', ' ');
			$('#fechaAprox').attr('name', ' ');
			$('#fechaSinDia').attr('name', '');
			$('#fechaSinDiaSinMes').attr('name', 'casos_fechaInicial');
		  }
	  
	  }
     
  /********************************/
  ///Función que agrega name a lafecha seleccionada caso
  function fechaTerminalCasos(a){
		  if(a=="1"){
			$('#fechaAprox2').attr('name', ' ');
			$('#fechaSinDia2').attr('name', ' ');
			$('#fechaSinDiaSinMes2').attr('name', ' ');
			$('#fechaExacta2').attr('name', 'casos_fechaTermino');
			$("#fechaAproxV2").hide();
			$("#fechaSinDiaV2").hide();
			$("#fechaSinDiaSinMesV2").hide();
			$("#fechaExactaV2").show("slow");
		  }
		  else if (a=="2"){
			$("#fechaSinDiaSinMesV2").hide();
			$("#fechaSinDiaV2").hide();
			$("#fechaExactaV2").hide();
			$("#fechaAproxV2").show("slow");
			$('#fechaSinDia2').attr('name', ' ');
			$('#fechaSinDiaSinMes2').attr('name', ' ');
			$('#fechaExacta2').attr('name', ' ');
			$('#fechaAprox2').attr('name', 'casos_fechaTermino');
		  }
		  else if (a=="3"){
			$("#fechaAproxV2").hide();
			$("#fechaSinDiaSinMesV2").hide();
			$("#fechaExactaV2").hide();
			$("#fechaSinDiaV2").show("slow");
			$('#fechaSinDiaSinMes2').attr('name', ' ');
			$('#fechaExacta2').attr('name', ' ');
			$('#fechaAprox2').attr('name', ' ');
			$('#fechaSinDia2').attr('name', 'casos_fechaTermino');
		  }
		  else if (a=="4"){;
			$("#fechaAproxV2").hide();
			$("#fechaSinDiaV2").hide();
			$("#fechaExactaV2").hide();
			$("#fechaSinDiaSinMesV2").show("slow");
			$('#fechaExacta2').attr('name', ' ');
			$('#fechaAprox2').attr('name', ' ');
			$('#fechaSinDia2').attr('name', '');
			$('#fechaSinDiaSinMes2').attr('name', 'casos_fechaTermino');
		  }
	  
	  }
    
  /********************************/
 
 function listaVictimas(){
 	
 	var windowSizeArray = [ "width=770,height=700,scrollbars=yes" ];
	window.open(base+'index.php/casosVentanas_c/mostrarActores', 'Relacion casos', windowSizeArray);
 }


function mostrarCasos(){
	var windowSizeArray = [ "width=400,height=600,scrollbars=yes" ];
	window.open(base+'index.php/casosVentanas_c/mostrarCasos', 'Seleccionar Caso', windowSizeArray);
}

function casoSeleccionado(idCaso, nombreCaso, fechaInicial, fechaTermino){
	
	window.opener.document.getElementById('casoSeleccionado_seleccionado').value='1';
	
	$('.noSeleccionado').css('background','white');
	
	$('#caja'+idCaso).css('background','#ccc');
	
	var cadena ='<td>'+nombreCaso+'</td>'+'<td>'+fechaInicial+'</td>'+'<td>'+fechaTermino+'</td><input type="hidden" name="relacionCasos_casoIdB" value="'+idCaso+'"required/>';
	
	window.opener.document.getElementById('datosCasoRelacionado').innerHTML = cadena;
	
}


function ventanaRelacionCasos(casoId, indice){
	var windowSizeArray = [ "width=800,height=700" ];
	window.open(base+'index.php/casosVentanas_c/relacionCasos/'+casoId+'/'+indice+'/', 'Relación entre casos', windowSizeArray);
}

