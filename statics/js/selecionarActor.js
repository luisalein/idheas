function seleccionarActorColectivo(){
      var windowSizeArray = [ "width=775,height=800" ];
    Actor=window.open(base+'index.php/actores_c/seleccionarColectivo', 'seleccionar Actor', windowSizeArray);
    };

function seleccionarActorIndividual(){
      var windowSizeArray = [ "width=775,height=800" ];
    Actor=window.open(base+'index.php/actores_c/seleccionarIndividual', 'seleccionar Actor', windowSizeArray);
    };

function seleccionarActor(){
      var windowSizeArray = [ "width=775,height=800" ];
    Actor=window.open(base+'index.php/actores_c/seleccionarActores', 'seleccionar Actor', windowSizeArray);
    };


function Seleccionar(title){  
    var n=title.split("*");
    var nameSeleccionado= window.opener.document.getElementById('nameSeleccionado').value
    window.opener.document.getElementById(nameSeleccionado).value = n[0];
    window.opener.document.getElementById('vistaActorRelacionado').innerHTML = ('<img class="three columns"  src="'+base+n[2]+'" /><b><h4>'+n[1]+'</h4></b>');
}    

function cerrarVentana(){
  window.close();
};

function cerrarVentanaCancelar(){
    var datosIniciales= window.opener.document.getElementById('ValoresBotonCancelar').value;
    var informacion=datosIniciales.split("*");
    var nameSeleccionado= window.opener.document.getElementById('nameSeleccionado').value
    window.opener.document.getElementById(nameSeleccionado).value = informacion[0];
    window.opener.document.getElementById('vistaActorRelacionado').innerHTML = ('<img class="three columns"  src="'+base+informacion[2]+'" /><b><h4>'+informacion[1]+'</h4></b>');
  window.close();
};