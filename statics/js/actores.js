$(function() {
	$( "#fechaDeNacimientoIndividual" ).datepicker({ dateFormat: "yy-mm-dd",
	changeYear: true });
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


function eliminarDireccionActor(direccionId,actorId,tipoActor){

    var url = base+'index.php/actores_c/eliminarDireccion/'+direccionId+'/'+actorId+'/'+tipoActor ;
    
    var data = 'actorId='+actorId+'&tipoActor='+tipoActor;

    $.ajax({
    
        url: url,
    
        data: data,
        
        type: 'POST',
                
        success: function(data){
            
              
        },
        
        error: function(){
        
           alert("no se pudo eliminar dirección");
        }
    
    });
    
}