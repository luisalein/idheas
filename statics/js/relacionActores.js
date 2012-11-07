
function personaRelacionada(idPersona){
    $('.cambiarColor').css('background-color', '#fff');
    $('#personaRelacionada'+idPersona).css('background-color', '#efefef');
	$('#actorRelacionadoId').attr('value', idPersona);
};

function personaRelacionadaColectivo(idPersona){
    $('.cambiarColor').css('background-color', '#fff');
    $('#personaRelacionadaCol'+idPersona).css('background-color', '#efefef');
	$('#relacionActores_tipoRelacionInd').attr('value', idPersona);
};

function tipoRelacion(tipoRelacion,notas,nombre){
	$('#tipoRelTexto').html("Tipo de relación<br/>"+nombre); 
	$('#tipoRelNotas').html("Notas<br/>"+notas); 
    $('.cambiarColorRelacion').css('background-color', '#efefef');
    $('#'+tipoRelacion).css('background-color', '#ddd');
	$('#tipoRelacionId').attr('value', tipoRelacion); 
	$('#relacionActual').html(" "); 
};

function desplegar(nombre){
	$("#"+nombre).toggleClass("Escondido");

}

    
  /********************************/
  ///Función que agrega name a lafecha seleccionada en la relacion actor ind-Colect
  function fechaInicialCasosRIC(a){
		  if(a=="1"){
			$('#fechaAproxRIC').attr('name', ' ');
			$('#fechaSinDiaRIC').attr('name', ' ');
			$('#fechaSinDiaSinMesRIC').attr('name', ' ');
			$('#fechaExactaRIC').attr('name', 'fechaInicial');
			$("#fechaAproxVRIC").hide();
			$("#fechaSinDiaVRIC").hide();
			$("#fechaSinDiaSinMesVRIC").hide();
			$("#fechaExactaVRIC").show("slow");
		  }
		  else if (a=="2"){
			$("#fechaSinDiaSinMesVRIC").hide();
			$("#fechaSinDiaVRIC").hide();
			$("#fechaExactaVRIC").hide();
			$("#fechaAproxVRIC").show("slow");
			$('#fechaSinDiaRIC').attr('name', ' ');
			$('#fechaSinDiaSinMesRIC').attr('name', ' ');
			$('#fechaExactaRIC').attr('name', ' ');
			$('#fechaAproxRIC').attr('name', 'fechaInicial');
		  }
		  else if (a=="3"){
			$("#fechaAproxVRIC").hide();
			$("#fechaSinDiaSinMesVRIC").hide();
			$("#fechaExactaVRIC").hide();
			$("#fechaSinDiaVRIC").show("slow");
			$('#fechaSinDiaSinMesRIC').attr('name', ' ');
			$('#fechaExactaRIC').attr('name', ' ');
			$('#fechaAproxRIC').attr('name', ' ');
			$('#fechaSinDiaRIC').attr('name', 'fechaInicial');
		  }
		  else if (a=="4"){;
			$("#fechaAproxVRIC").hide();
			$("#fechaSinDiaVRIC").hide();
			$("#fechaExactaVRIC").hide();
			$("#fechaSinDiaSinMesVRIC").show("slow");
			$('#fechaExactaRIC').attr('name', ' ');
			$('#fechaAproxRIC').attr('name', ' ');
			$('#fechaSinDiaRIC').attr('name', '');
			$('#fechaSinDiaSinMesRIC').attr('name', 'fechaInicial');
		  }
	  
	  }
     

    
  /********************************/
  ///Función que agrega name a lafecha seleccionada en la relacion actor ind-Colect
  function fechaTerminalCasosRIC(a){
		  if(a=="1"){
			$('#fechaAprox2RIC').attr('name', ' ');
			$('#fechaSinDia2RIC').attr('name', ' ');
			$('#fechaSinDiaSinMes2RIC').attr('name', ' ');
			$('#fechaExacta2RIC').attr('name', 'fechaTermino');
			$("#fechaAproxV2RIC").hide();
			$("#fechaSinDiaV2RIC").hide();
			$("#fechaSinDiaSinMesV2RIC").hide();
			$("#fechaExactaV2RIC").show("slow");
		  }
		  else if (a=="2"){
			$("#fechaSinDiaSinMesV2RIC").hide();
			$("#fechaSinDiaV2RIC").hide();
			$("#fechaExactaV2RIC").hide();
			$("#fechaAproxV2RIC").show("slow");
			$('#fechaSinDia2RIC').attr('name', ' ');
			$('#fechaSinDiaSinMes2RIC').attr('name', ' ');
			$('#fechaExacta2RIC').attr('name', ' ');
			$('#fechaAprox2RIC').attr('name', 'fechaTermino');
		  }
		  else if (a=="3"){
			$("#fechaAproxV2RIC").hide();
			$("#fechaSinDiaSinMesV2RIC").hide();
			$("#fechaExactaV2RIC").hide();
			$("#fechaSinDiaV2RIC").show("slow");
			$('#fechaSinDiaSinMes2RIC').attr('name', ' ');
			$('#fechaExacta2RIC').attr('name', ' ');
			$('#fechaAprox2RIC').attr('name', ' ');
			$('#fechaSinDia2RIC').attr('name', 'fechaTermino');
		  }
		  else if (a=="4"){;
			$("#fechaAproxV2RIC").hide();
			$("#fechaSinDiaV2RIC").hide();
			$("#fechaExactaV2RIC").hide();
			$("#fechaSinDiaSinMesV2RIC").show("slow");
			$('#fechaExacta2RIC').attr('name', ' ');
			$('#fechaAprox2RIC').attr('name', ' ');
			$('#fechaSinDia2RIC').attr('name', '');
			$('#fechaSinDiaSinMes2RIC').attr('name', 'fechaTermino');
		  }
	  
	  }

/*****************************************************/


/////////FECHA INICIAL relacion entre actores individuales y colectivo

	$(function() {
		$( "#fechaExactaRIC" ).datepicker({ dateFormat: "yy-mm-dd",
		changeYear: true });
		 });
    

	$(function() {
		$( "#fechaAproxRIC" ).datepicker({ dateFormat: "yy-mm-dd"});
		 });
    
/***Script para cambiar el año y el mes****/
	$(function() {
		$( "#fechaSinDiaRIC" ).datepicker({ dateFormat: "yy-mm-00"});
		});

/***Funcion para cambiar el año****/
	$(function() {
		$( "#fechaSinDiaSinMesRIC" ).datepicker({ dateFormat: "yy-00-00"});
		});
		
/////////FECHA TERMINAL relacion entre actores individuales y colectivo
		
	$(function() {
		$( "#fechaExacta2RIC" ).datepicker({ dateFormat: "yy-mm-dd",
		changeYear: true });
		 });
    

	$(function() {
		$( "#fechaAprox2RIC" ).datepicker({ dateFormat: "yy-mm-dd"});
		 });
    
/***Script para cambiar el año y el mes****/
	$(function() {
		$( "#fechaSinDia2RIC" ).datepicker({ dateFormat: "yy-mm-00"});
		});

/***Funcion para cambiar el año****/
	$(function() {
		$( "#fechaSinDiaSinMes2RIC" ).datepicker({ dateFormat: "yy-00-00"});
		});
		
			
		
/*****************************************************/


/////////FECHA INICIAL relacion entre actores Individuales

	$(function() {
		$( "#fechaExactaRP" ).datepicker({ dateFormat: "yy-mm-dd",
		changeYear: true });
		 });
    

	$(function() {
		$( "#fechaAproxRP" ).datepicker({ dateFormat: "yy-mm-dd"});
		 });
    
/***Script para cambiar el año y el mes****/
	$(function() {
		$( "#fechaSinDiaRP" ).datepicker({ dateFormat: "yy-mm-00"});
		});

/***Funcion para cambiar el año****/
	$(function() {
		$( "#fechaSinDiaSinMesRP" ).datepicker({ dateFormat: "yy-00-00"});
		});
		
/////////FECHA TERMINAL relacion entre actores Individuales
		
	$(function() {
		$( "#fechaExacta2RP" ).datepicker({ dateFormat: "yy-mm-dd",
		changeYear: true });
		 });
    

	$(function() {
		$( "#fechaAprox2RP" ).datepicker({ dateFormat: "yy-mm-dd"});
		 });
    
/***Script para cambiar el año y el mes****/
	$(function() {
		$( "#fechaSinDia2RP" ).datepicker({ dateFormat: "yy-mm-00"});
		});

/***Funcion para cambiar el año****/
	$(function() {
		$( "#fechaSinDiaSinMes2RP" ).datepicker({ dateFormat: "yy-00-00"});
		});
		

  ///Función que agrega name a lafecha seleccionada en relacion entre actores
  function fechaInicialCasosRP(a){
		  if(a=="1"){
			$('#fechaAproxRP').attr('name', ' ');
			$('#fechaSinDiaRP').attr('name', ' ');
			$('#fechaSinDiaSinMesRP').attr('name', ' ');
			$('#fechaExactaRP').attr('name', 'fechaInicial');
			$("#fechaAproxVRP").hide();
			$("#fechaSinDiaVRP").hide();
			$("#fechaSinDiaSinMesVRP").hide();
			$("#fechaExactaVRP").show("slow");
		  }
		  else if (a=="2"){
			$("#fechaSinDiaSinMesVRP").hide();
			$("#fechaSinDiaVRP").hide();
			$("#fechaExactaVRP").hide();
			$("#fechaAproxVRP").show("slow");
			$('#fechaSinDiaRP').attr('name', ' ');
			$('#fechaSinDiaSinMesRP').attr('name', ' ');
			$('#fechaExactaRP').attr('name', ' ');
			$('#fechaAproxRP').attr('name', 'fechaInicial');
		  }
		  else if (a=="3"){
			$("#fechaAproxVRP").hide();
			$("#fechaSinDiaSinMesVRP").hide();
			$("#fechaExactaVRP").hide();
			$("#fechaSinDiaVRP").show("slow");
			$('#fechaSinDiaSinMesRP').attr('name', ' ');
			$('#fechaExactaRP').attr('name', ' ');
			$('#fechaAproxRP').attr('name', ' ');
			$('#fechaSinDiaRP').attr('name', 'fechaInicial');
		  }
		  else if (a=="4"){;
			$("#fechaAproxVRP").hide();
			$("#fechaSinDiaVRP").hide();
			$("#fechaExactaVRP").hide();
			$("#fechaSinDiaSinMesVRP").show("slow");
			$('#fechaExactaRP').attr('name', ' ');
			$('#fechaAproxRP').attr('name', ' ');
			$('#fechaSinDiaRP').attr('name', '');
			$('#fechaSinDiaSinMesRP').attr('name', 'fechaInicial');
		  }
	  
	  }
     
  /********************************/
  ///Función que agrega name a la fecha final seleccionada de relacion entre actores
  function fechaTerminalCasosRP(a){
		  if(a=="1"){
			$('#fechaAprox2RP').attr('name', ' ');
			$('#fechaSinDia2RP').attr('name', ' ');
			$('#fechaSinDiaSinMes2RP').attr('name', ' ');
			$('#fechaExacta2RP').attr('name', 'fechaTermino');
			$("#fechaAproxV2RP").hide();
			$("#fechaSinDiaV2RP").hide();
			$("#fechaSinDiaSinMesV2RP").hide();
			$("#fechaExactaV2RP").show("slow");
		  }
		  else if (a=="2"){
			$("#fechaSinDiaSinMesV2RP").hide();
			$("#fechaSinDiaV2RP").hide();
			$("#fechaExactaV2RP").hide();
			$("#fechaAproxV2RP").show("slow");
			$('#fechaSinDia2RP').attr('name', ' ');
			$('#fechaSinDiaSinMes2RP').attr('name', ' ');
			$('#fechaExacta2RP').attr('name', ' ');
			$('#fechaAprox2RP').attr('name', 'fechaTermino');
		  }
		  else if (a=="3"){
			$("#fechaAproxV2RP").hide();
			$("#fechaSinDiaSinMesV2RP").hide();
			$("#fechaExactaV2RP").hide();
			$("#fechaSinDiaV2RP").show("slow");
			$('#fechaSinDiaSinMes2RP').attr('name', ' ');
			$('#fechaExacta2RP').attr('name', ' ');
			$('#fechaAprox2RP').attr('name', ' ');
			$('#fechaSinDia2RP').attr('name', 'fechaTermino');
		  }
		  else if (a=="4"){;
			$("#fechaAproxV2RP").hide();
			$("#fechaSinDiaV2RP").hide();
			$("#fechaExactaV2RP").hide();
			$("#fechaSinDiaSinMesV2RP").show("slow");
			$('#fechaExacta2RP').attr('name', ' ');
			$('#fechaAprox2RP').attr('name', ' ');
			$('#fechaSinDia2RP').attr('name', '');
			$('#fechaSinDiaSinMes2RP').attr('name', 'fechaTermino');
		  }
	  
	  }

