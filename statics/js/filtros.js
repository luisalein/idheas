$(document).ready(function() {
    
    $('#eliminarActor').click(function() {
		
		var name =  $('#eliminarActor').attr('name');
		
		var cadena = name.split('&');
		
		var id = cadena[0];
		
		var tipo = cadena[1];
		
		eliminarActor(id,tipo);
				
    });
    
    $('#eliminarCaso').click(function() {
		
		var idCaso =  $('#eliminarCaso').attr('name');
		
		eliminarCaso(idCaso);
				
    });
    
    
    
});

function returnActores(){
		document.location.href = base+'index.php/actores_c/mostrar_actor/0/1';
}

function returnCasos(){
		document.location.href = base+'index.php/casos_c/mostrar_caso';
}

function searchCaso(){
	
		$('#numeroRegistros').html('');
		
		var nombre = $('#'+active+'_nombre').val();
	
		var url = base+'index.php/casos_c/buscarCasos';
	
		var data = 'cadena='+nombre;
		
			$.ajax({
	    
	        url: url,
	    
	        data: data,
	        
	        type: 'POST',
	                
	        success: function(data){ 
	               
	          $('#listaActorIndiv').html(data);  
	            
	        },
	        
	        error: function(){
	        
	           alert("no se pudo");
	        }
	    
	    });
}


function cargarActor(actor,tipo){
	
	var nombre = $('#'+active+'_nombre').val();
			
	var filtro = getRadioButtonSelectedValue(document.frmR.filtroR);
	if(nombre == ''){
		nombre = '0';
	}
	if(filtro == null){		
	
		filtro=0;
				
	}
	
	document.location.href = base+'index.php/actores_c/mostrar_actor/'+actor+'/'+tipo+'/'+nombre+'/'+filtro;
	
}

function cargarCaso(casoId){
	
	var nombre = $('#'+active+'_nombre').val();
	
	if(nombre == ''){
		nombre = '0';
	}
	
    document.location.href = base+'index.php/casos_c/mostrar_caso/'+casoId+'/'+nombre;

}
function desplegarActores(nombre, filtro, tipoActor){

	if(nombre != '' || filtro != 0){
		
		var url = base+'index.php/actores_c/filtrarActor';
	
		var data = 'cadena='+nombre+'&tipoFiltro='+filtro+'&tipoActor='+tipoActor;
		
			$.ajax({
	    
	        url: url,
	    
	        data: data,
	        
	        type: 'POST',
	                
	        success: function(data){ 
	        	
	        	$('#listaActorIndiv').html(data);  
	            
	        },
	        
	        error: function(){
	        
	           alert("no se pudo");
	        }
	    
	    });
		
	}else{
		
		document.location.href = base+'index.php/actores_c/mostrar_actor/0/1';
		
	}
	
	
}

function filtroRadio(filtro){
	
	$('#numeroRegistros').html('');
	
	if(filtro==5){
		
		var filtro = getRadioButtonSelectedValue(document.frmR.filtroR);
		
	}
	
	
	var ventana = $('#tipoVentana').attr('name');				
			
	var tipoActor = $('#tipoActor').attr('name');		
			
	if(filtro == null && nombre==''){		
	
		alert('Introduce un filtro válido de búsqueda')
	}
	if(filtro == null){		
	
		filtro=0;
				
	}
	
	if(ventana == 0){
		
		var nombre = $('#'+active+'_nombre').val();
		
		desplegarActores(nombre, filtro, tipoActor);
	}else{
		
		var nombre = $('#actores_nombre').val();
		//alert(ventana+filtro+tipoActor+nombre);
		desplegarActoresVentana(nombre, filtro, tipoActor,ventana);
	}
		
	
	
}
function desplegarActoresVentana(nombre, filtro, tipoActor,ventana){
	
	if(nombre != '' || filtro != 0){
		
		var url = base+'index.php/actores_c/filtrarActorVentana';
	
		var data = 'cadena='+nombre+'&tipoFiltro='+filtro+'&tipoActor='+tipoActor+'&ventana='+ventana;
		
			$.ajax({
	    
	        url: url,
	    
	        data: data,
	        
	        type: 'POST',
	                
	        success: function(data){ 
	        	if(ventana == 1){
	        		$('#ventana1Filtro').html(data);  
	        	}
	        	if(ventana == 2){
	        		$('#ventana2Filtro').html(data);  
	        	}
	        	if(ventana == 3){
	        		$('#ventana3Filtro').html(data);  
	        	}
	        	
	            
	        },
	        
	        error: function(){
	        
	           alert("no se pudo");
	        }
	    
	    });
		
	}else{
		
		document.location.href = base+'index.php/actores_c/mostrar_actor/0/1';
		
	}
	
}

function getRadioButtonSelectedValue(ctrl)
{
    for(i=0;i<ctrl.length;i++)
        if(ctrl[i].checked) return ctrl[i].value;
}

function eliminarActor(id,tipoActor){
	
	var url = base+'index.php/actores_c/eliminar_actor';
	
	var data = 'actorId='+id+'&tipoActor='+tipoActor;

	$.ajax({
    
        url: url,
    
        data: data,
        
        type: 'POST',
                
        success: function(data){
        	
             alert(data);    
              
             document.location.href = base+'index.php/actores_c/mostrar_actor/0/1';
        },
        
        error: function(){
        
           alert("no se pudo");
        }
    
    });
	
}

function eliminarCaso(idCaso){
	
	var url = base+'index.php/casos_c/eliminarCaso';
	
	var data = 'idCaso='+idCaso;
	
	$.ajax({
    
        url: url,
    
        data: data,
        
        type: 'POST',
                
        success: function(data){
        	
             alert(data);    
              
             document.location.href = base+'index.php/casos_c/mostrar_caso';
        },
        
        error: function(){
        
           alert("no se pudo");
        }
    
    });
}



