$(function() {
	$( "#fechaDeNacimientoIndividual" ).datepicker({ dateFormat: "yy-mm-dd",
	changeYear: true });
	 });

function nueva_relacion_a_a(actorId,ventana,actorRelacionado){
    var windowSizeArray = [ "width=770,height=535,scrollbars=yes,scrollbars=yes" ];
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

function eliminarFoto(){
    document.getElementById('espacioFoto').innerHTML = ('');
    document.getElementById('actores_foto').value="foto";

}
function cancelarCambioContrasenia(){
	document.location.href = base+'index.php/contrasenia_c/mostrar_cambioPass';
}

function cambiarPass(){
	
	var oldPass= $('#oldPass').val();
	var newPass1= $('#newPass1').val();
	var newPass2= $('#newPass2').val();
	if(oldPass==''){
		alert('Se requiere la contraseña actual');
	}
	if(newPass1==''){
		alert('Se requiere la nueva contraseña');
	}
	if(newPass2==''){
		alert('Repite tu nueva contraseña');
	}
	
	if(oldPass != '' && newPass1 != '' && newPass2 != ''){
		
		var url = base+'index.php/contrasenia_c/cambiarPass';
    
	    var data = 'oldPass='+oldPass+'&newPass1='+newPass1+'&newPass2='+newPass2;
	
	    $.ajax({
	    
	        url: url,
	    
	        data: data,
	        
	        type: 'POST',
	                
	        success: function(data){
	            
	            alert(data);
	            document.location.href = base+'index.php/contrasenia_c/mostrar_cambioPass/';
	        },
	        
	        error: function(){
	        
	           alert("no se pudo cambiar la contraseña");
	        }
	    
	    });
    
	}
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