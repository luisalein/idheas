function seleccionarActorColectivo(){
      var windowSizeArray = [ "width=775,height=800,scrollbars=yes" ];
    Actor=window.open(base+'index.php/actores_c/seleccionarColectivo', 'seleccionar Actor', windowSizeArray);
    };

function seleccionarActorseleccionarActorIndColDatos(dato){
      var windowSizeArray = [ "width=775,height=800,scrollbars=yes" ];
    Actor=window.open(base+'index.php/casos_c/seleccionarIndividualConDatos/'+dato, 'seleccionar Actor', windowSizeArray);
    };

function seleccionarActorseleccionarColDatos(dato){
      var windowSizeArray = [ "width=775,height=800,scrollbars=yes" ];
    Actor=window.open(base+'index.php/casos_c/actorColectivoDatos/'+dato, 'seleccionar Actor', windowSizeArray);
    };

function seleccionarActorIndividual(){
      var windowSizeArray = [ "width=775,height=800,scrollbars=yes" ];
    Actor=window.open(base+'index.php/actores_c/seleccionarIndividual', 'seleccionar Actor', windowSizeArray);
    };

function seleccionarActor(){
      var windowSizeArray = [ "width=775,height=800,scrollbars=yes" ];
    Actor=window.open(base+'index.php/actores_c/seleccionarActores', 'seleccionar Actor', windowSizeArray);
    };


function ventanaColectivoRelacionados(actorId,dato){ 
      var windowSizeArray = [ "width=950,height=700,scrollbars=yes" ];
    window.open(base+'index.php/casos_c/traeRelaciones/'+actorId+'/'+ dato, 'Actores relacionados', windowSizeArray);
    };

function Seleccionar(title){  
    var n=title.split("*");
    $('.lista').css('background-color','#fff')
    $('#'+n[0]).css('background-color','#ccc');
    var nameSeleccionado= window.opener.document.getElementById('nameSeleccionado').value;
    window.opener.document.getElementById(nameSeleccionado).value = n[0];
    window.opener.document.getElementById('vistaActorRelacionado').innerHTML = ('<div class="three columns"><img style="width:120px !important; height:150px !important;" src="'+base+n[2]+'" /></div><b><h4>'+n[1]+'</h4></b>');
}    

function SeleccionarIntervenidos(title){  
    var n=title.split("*");
    $('.lista').css('background-color','#fff')
    $('#'+n[0]).css('background-color','#ccc');
    var nameSeleccionado= window.opener.document.getElementById('nameSeleccionado').value;
    document.getElementById(nameSeleccionado).value = n[0];
    document.getElementById('vistaActorRelacionado').innerHTML = ('<div class="three columns"><img style="width:120px !important; height:150px !important;" src="'+base+n[2]+'" /></div><b><h4>'+n[1]+'</h4></b>');
}    

function agregaIntervenidos(title){  
    var n=title.split("*");
    $('.lista').css('background-color','#fff')
    $('#'+n[0]).css('background-color','#ccc');
    var intervencionId = window.opener.document.getElementById('intervenciones_intervencionId').value;
    var casoId = window.opener.document.getElementById('intervenciones_casos_casoId').value;
    document.getElementById('intervenidos_actorIntervenidoId').value= n[0];
    document.getElementById('intervenidos_intervenciones_intervencionId').value= intervencionId;
    document.getElementById('casoId').value= casoId;
}    



function SeleccionarYTreaeRelaciones(title){  
    var n=title.split("*");
    $('.lista').css('background-color','#fff')
    $('#'+n[0]).css('background-color','#ccc');
    var nameSeleccionado= window.opener.document.getElementById('nameSeleccionado').value;
    window.opener.document.getElementById(nameSeleccionado).value = n[0];
    notas="ventanaColectivoRelacionados('"+n[0]+"','')";
    window.opener.document.getElementById('vistaActorRelacionado').innerHTML = ('<div class="three columns"><img style="width:120px !important; height:150px !important;" src="'+base+n[2]+'" /></div><b><h4>'+n[1]+'</h4></b>');
    window.opener.document.getElementById('vistaActorRelacionadoPerpetrador').innerHTML = ('<input type="button" class="tiny button" value="Seleccionar relación" onclick="'+notas+'" />');
}    

function eliminarRelacionVista(id,name,id2,name2){  
    document.getElementById(id).innerHTML = (" ");
    document.getElementById(name).value = 0;
    document.getElementById(id2).innerHTML = (" ");
    document.getElementById(name2).value = 0;
}    


function seleccionarRelacionColectivo(nombre, Siglas, TipoRelacion,IdRelacion,foto, nameOpcional){  
    switch(nameOpcional) {
        case '2':
            var nameSeleccionado = window.opener.document.getElementById('nameDeLaRelacion2').value
            var vista='vistaActorRelacionadoPerpetrador2'
        break;

        case '3':
            var vista='infoColectioContenido'
            var nameSeleccionado= window.opener.document.getElementById('nameDeLaRelacion').value;
        break;

        case '4':
        break;

        case '5':
            var vista='infoColectioContenidoReportado'
            var nameSeleccionado= window.opener.document.getElementById('nameDeLaRelacionReceptor').value;
        break;

        default:
            var nameSeleccionado= window.opener.document.getElementById('nameDeLaRelacion').value;
            var vista='vistaActorRelacionadoPerpetrador'
        break;
    }
    window.opener.document.getElementById(nameSeleccionado).value = IdRelacion;
    window.opener.document.getElementById(vista).innerHTML = ('<div class="three columns"><img style="width:120px !important; height:150px !important;" src="'+foto+'" /></div><b><h6>'+nombre+' '+Siglas+'<br>Tipo de relacion<br>'+TipoRelacion+'</h6></b>');
}    


function SeleccionarYTreaeRelacionesrceptor(title){  
    var n=title.split("*");
    $('.lista').css('background-color','#fff')
    $('#'+n[0]).css('background-color','#ccc');
    var nameSeleccionado= window.opener.document.getElementById('nameSeleccionado2').value;
    window.opener.document.getElementById(nameSeleccionado).value = n[0];
    notas="ventanaColectivoRelacionados('"+n[0]+"','2')";
    window.opener.document.getElementById('vistaActorRelacionadoReceptor').innerHTML = ('<div class="three columns"><img style="width:120px !important; height:150px !important;" src="'+base+n[2]+'" /></div><b><h4>'+n[1]+'</h4></b>');
    window.opener.document.getElementById('vistaPintaRelacionesReceptor').innerHTML = ('<div id="vistaPintaRelacionesReceptorFoto"></div><input type="button" class="tiny button" value="Seleccionar relación" onclick="'+notas+'" />');
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

//Actualizará dinámicamente los actores intervenido de una intervención
function agregarIntervenidoAjax(){
    
    var actorIntervenidoId = document.getElementById('intervenidos_actorIntervenidoId').value;
    var intervenciones_intervencionId = document.getElementById('intervenidos_intervenciones_intervencionId').value;
    var casoId = document.getElementById('casoId').value;

        var url = base+'index.php/casosVentanas_c/agregarIntervenido';
    
        var data = 'actorIntervenidoId='+actorIntervenidoId + '&intervenciones_intervencionId='+intervenciones_intervencionId+'&casoId='+casoId;

            $.ajax({
        
            url: url,
        
            data: data,
            
            type: 'POST',
                    
            success: function(data){ 
                   
            //alert(data);
            window.opener.document.getElementById('agregaIntervenidosLista').innerHTML = (data);
            
            window.close();
                
            },
            
            error: function(){
            
               alert("no es posible agregar actor");
            }
        
        });
}


//Actualizará dinámicamente los actores intervenido de una intervención
function eliminarIntervenidoAjax(idIntervenido,idCaso,idInternvencion){
    
        var url = base+'index.php/casosVentanas_c/eliminarIntervenido/'+idIntervenido+'/'+idCaso+'/'+idInternvencion;

            var data;

            $.ajax({
        
            url: url,
        
            data: data,
            
            type: 'POST',
                    
            success: function(data){ 
                   

            document.getElementById('agregaIntervenidosLista').innerHTML = (data);
            
            //window.close();
                
            },
            
            error: function(){
            
               alert("no es posible eliminar actor");
            }
        
        });
}

function agregarActorFuenteInfoPersonal(title){  
    var n=title.split("*");
    $('.lista').css('background-color','#fff')
    $('#'+n[0]).css('background-color','#ccc');
    var nameSeleccionado= window.opener.document.getElementById('nameSeleccionado').value;
    var nameSeleccionado2= window.opener.document.getElementById('nameDeLaRelacion').value;
    notas="seleccionarActorseleccionarActorIndColDatos('5')";
    notas2="eliminarRelacionVista('infoPersonalActor','fuenteInfoPersonal_actorId','infoColectioContenido','"+nameSeleccionado2+"')";
    notas3="ventanaColectivoRelacionados('"+n[0]+"','3')";
    notas4="eliminarRelacionVista('infoColectioContenido')";
    window.opener.document.getElementById(nameSeleccionado).value = n[0];
    window.opener.document.getElementById('infoPersonalActor').innerHTML = ('<div class="seven columns"><img class="foto" src="'+ base+n[2]+'" /></div><div class="five columns"><b><h4>'+n[1]+'</h4></b></div>');
    window.opener.document.getElementById('infoPersonalActorBotones').innerHTML = ('<div class="five columns" id="eliminarVistaActor"><input type="button" class="tiny button" value="Seleccionar actor" onclick="'+notas+'" /><input type="button" class="tiny button" value="Eliminar Actor" onclick="'+notas2+'" /></div>');
    window.opener.document.getElementById('infoColectioContenidoBotones').innerHTML = ('<input type="button" class="tiny button" value="Seleccionar relación" onclick="'+notas3+'" /><input type="button" class="tiny button" value="Eliminar relación" onclick="'+notas4+'" />')
    window.opener.document.getElementById('infoColectioContenido').innerHTML = (' ');
    window.opener.document.getElementById(nameSeleccionado2).value = 0;
}  


function agregarActorFuenteInfoPersonalReportado(title){  
    var n=title.split("*");
    $('.lista').css('background-color','#fff')
    $('#'+n[0]).css('background-color','#ccc');
    var nameSeleccionado= window.opener.document.getElementById('nameSeleccionadoReceptor').value;
    var nameSeleccionado2= window.opener.document.getElementById('nameDeLaRelacionReceptor').value;
    notas="seleccionarActorseleccionarActorIndColDatos('7')";
    notas2="eliminarRelacionVista('infoPersonalActorReportado','"+nameSeleccionado+"','infoColectioContenidoReportado','"+nameSeleccionado2+"')";
    notas3="ventanaColectivoRelacionados('"+n[0]+"','5')";
    notas4="eliminarRelacionVista('infoColectioContenidoReportado','fuenteInfoPersonal_actorId')";
    window.opener.document.getElementById(nameSeleccionado).value = n[0];
    window.opener.document.getElementById('infoPersonalActorReportado').innerHTML = ('<div class="seven columns"><img class="foto" src="'+ base+n[2]+'" /></div><div class="five columns"><b><h4>'+n[1]+'</h4></b></div>');
    window.opener.document.getElementById('infoPersonalActorReportadoBotones').innerHTML = ('<div class="five columns" id="eliminarVistaActor"><input type="button" class="tiny button" value="Seleccionar actor" onclick="'+notas+'" /><input type="button" class="tiny button" value="Eliminar Actor" onclick="'+notas2+'" /></div>');
    window.opener.document.getElementById('infoColectioContenidoReportadoBotones').innerHTML = ('<input type="button" class="tiny button" value="Seleccionar relación" onclick="'+notas3+'" /><input type="button" class="tiny button" value="Eliminar relación" onclick="'+notas4+'" />')
    window.opener.document.getElementById('infoColectioContenidoReportado').innerHTML = (' ');
    window.opener.document.getElementById(nameSeleccionado2).value = 0;
}  


function SeleccionarInfoGeneral(title){  
    var n=title.split("*");
    $('.lista').css('background-color','#fff')
    $('#'+n[0]).css('background-color','#ccc');
    var nameSeleccionado= window.opener.document.getElementById('nameSeleccionado').value;
    window.opener.document.getElementById(nameSeleccionado).value = n[0];
    window.opener.document.getElementById('infoPersonalActor').innerHTML = ('<div class="three columns"><img style="width:120px !important; height:150px !important;" src="'+base+n[2]+'" /></div><b><h4>'+n[1]+'</h4></b>');
}    

function SeleccionarInfoGeneralReceptor(title){  
    var n=title.split("*");
    $('.lista').css('background-color','#fff')
    $('#'+n[0]).css('background-color','#ccc');
    var nameSeleccionado= window.opener.document.getElementById('nameSeleccionadoReceptor').value;
    window.opener.document.getElementById(nameSeleccionado).value = n[0];
    window.opener.document.getElementById('infoPersonalActorReportado').innerHTML = ('<div class="three columns"><img style="width:120px !important; height:150px !important;" src="'+base+n[2]+'" /></div><b><h4>'+n[1]+'</h4></b>');
}    