
$(document).ready(function() {
	
}); 



function nueva_relacion_a_a(actorId,ventana,actorRelacionado){
    var windowSizeArray = [ "width=770,height=535,scrollbars=yes" ];
    window.open(base+'index.php/actores_c/agregar_relacion_actor/'+actorId+'/1/'+ventana+'/'+actorRelacionado, 'Relacion entre actores individuales', windowSizeArray);
}
function nueva_relacion_a_Col(actorId,ventana,actorRelacionado){
    var windowSizeArray = [ "width=770,height=535,scrollbars=yes" ];
    window.open(base+'index.php/actores_c/agregar_relacion_actor/'+actorId+'/2/'+ventana+'/'+actorRelacionado, 'Relacion entre actores individuales', windowSizeArray);
}

function nuevaDireccion(actorId,indice){
    var windowSizeArray = [ "width=770,height=535,scrollbars=yes" ];
    window.open(base+'index.php/actores_c/direccion/'+actorId+'/'+indice, 'Nueva direccion', windowSizeArray);
}


$(function() {
	$( "#fechaDeNacimientoIndividual" ).datepicker({ dateFormat: "yy-mm-dd",
	changeYear: true });
	 });
$('#myDropdown').ddslick({
    onSelected: function(selectedData){
        //callback function: do something with selectedData;
    }  
    
  
});

