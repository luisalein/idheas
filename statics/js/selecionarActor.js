function seleccionarActorColectivo(){
      var windowSizeArray = [ "width=775,height=800" ];
    Actor=window.open(base+'index.php/actores_c/seleccionarColectivo', 'seleccionar Actor', windowSizeArray);
    };

function seleccionarActorseleccionarActorIndColDatos(dato){
      var windowSizeArray = [ "width=775,height=800" ];
    Actor=window.open(base+'index.php/casos_c/seleccionarIndividualConDatos/'+dato, 'seleccionar Actor', windowSizeArray);
    };

function seleccionarActorIndividual(){
      var windowSizeArray = [ "width=775,height=800" ];
    Actor=window.open(base+'index.php/actores_c/seleccionarIndividual', 'seleccionar Actor', windowSizeArray);
    };

function seleccionarActor(){
      var windowSizeArray = [ "width=775,height=800" ];
    Actor=window.open(base+'index.php/actores_c/seleccionarActores', 'seleccionar Actor', windowSizeArray);
    };


function ventanaColectivoRelacionados(actorId){ 
      var windowSizeArray = [ "width=950,height=700,scrollbars=yes" ];
    window.open(base+'index.php/casos_c/traeRelaciones/'+actorId, 'Actores relacionados', windowSizeArray);
    };

function Seleccionar(title){  
    var n=title.split("*");
    $('.lista').css('background-color','#fff')
    $('#'+n[0]).css('background-color','#ccc');
    var nameSeleccionado= window.opener.document.getElementById('nameSeleccionado').value;
    window.opener.document.getElementById(nameSeleccionado).value = n[0];
    window.opener.document.getElementById('vistaActorRelacionado').innerHTML = ('<div class="three columns"><img style="width:120px !important; height:150px !important;" src="'+base+n[2]+'" /></div><b><h4>'+n[1]+'</h4></b>');
}    

function SeleccionarYTreaeRelaciones(title){  
    var n=title.split("*");
    $('.lista').css('background-color','#fff')
    $('#'+n[0]).css('background-color','#ccc');
    var nameSeleccionado= window.opener.document.getElementById('nameSeleccionado').value;
    window.opener.document.getElementById(nameSeleccionado).value = n[0];
    notas="ventanaColectivoRelacionados('"+n[0]+"')";
    window.opener.document.getElementById('vistaActorRelacionado').innerHTML = ('<div class="three columns"><img style="width:120px !important; height:150px !important;" src="'+base+n[2]+'" /></div><b><h4>'+n[1]+'</h4></b>');
    window.opener.document.getElementById('vistaPintaRelaciones').innerHTML = ('<input type="button" class="tiny button" value="Seleccionar relación" onclick="'+notas+'" />');
}    


function seleccionarRelacionColectivo(nombre, Siglas, TipoRelacion,IdRelacion){  
    var nameSeleccionado= window.opener.document.getElementById('nameDeLaRelacion').value;
    alert(nameSeleccionado);
    window.opener.document.getElementById(nameSeleccionado).value = IdRelacion;
    window.opener.document.getElementById('vistaActorRelacionadoPerpetrador').innerHTML = ('<div class="three columns"><img style="width:120px !important; height:150px !important;" src="" /></div><b><h4>'+nombre+' '+Siglas+'<br>Tipo de relacion<br>'+TipoRelacion+'</h4></b>');
}    


function SeleccionarYTreaeRelacionesrceptor(title){  
    var n=title.split("*");
    $('.lista').css('background-color','#fff')
    $('#'+n[0]).css('background-color','#ccc');
    var nameSeleccionado= window.opener.document.getElementById('nameSeleccionado2').value;
    window.opener.document.getElementById(nameSeleccionado).value = n[0];
    notas="ventanaColectivoRelacionados('"+n[0]+"')";
    window.opener.document.getElementById('vistaActorRelacionadoReceptor').innerHTML = ('<div class="three columns"><img style="width:120px !important; height:150px !important;" src="'+base+n[2]+'" /></div><b><h4>'+n[1]+'</h4></b>');
    window.opener.document.getElementById('vistaPintaRelacionesReceptor').innerHTML = ('<input type="button" class="tiny button" value="Seleccionar relación" onclick="'+notas+'" />');
} 


function cerrarVentana(){
  window.close();
};

function cerrarVentanaCancelar(){
    var datosIniciales= window.opener.document.getElementById('ValoresBotonCancelar').value;
    if (datosIniciales!= "") {
    var informacion=datosIniciales.split("*");
    var nameSeleccionado= window.opener.document.getElementById('nameSeleccionado').value
    window.opener.document.getElementById(nameSeleccionado).value = informacion[0];
    window.opener.document.getElementById('vistaActorRelacionado').innerHTML = ('<div class="three columns"><img style="width:120px !important; height:150px !important;" src="'+base+informacion[2]+'" /></div><b><h4>'+informacion[1]+'</h4></b>');
    } else{
    var nameSeleccionado= window.opener.document.getElementById('nameSeleccionado').value
    window.opener.document.getElementById(nameSeleccionado).value='';
    window.opener.document.getElementById('vistaActorRelacionado').innerHTML = ('');
    };
  window.close();
};

function eliminaActor(){
    var nameSeleccionado= document.getElementById('nameSeleccionado').value;
    document.getElementById(nameSeleccionado).value =0;
    document.getElementById('vistaActorRelacionado').innerHTML=(" ");
};