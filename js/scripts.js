$( document ).ready(function(){
    $(".button-collapse").sideNav();
  $('.timepicker').pickatime({
    default: 'now', // Set default time: 'now', '1:30AM', '16:30'
    fromnow: 0,       // set default time to * milliseconds from now (using with default = 'now')
    twelvehour: false, // Use AM/PM or 24-hour format
    donetext: 'OK', // text for done-button
    cleartext: 'Clear', // text for clear-button
    canceltext: 'Cancel', // Text for cancel-button
    autoclose: false, // automatic close timepicker
    ampmclickable: true, // make AM PM clickable
    aftershow: function(){} //Function for after opening timepicker
});
});





/*SCRIPTS PARA ACTIVATORS ADD*/
function writeActivator() {
    var duracion = $("#duracion_riego").val();
    var hora = $("#hora_riego").val();
    var estado=0;
    if($("#estado").is(':checked')){
        estado=1;
    }
    var salidas=[];
    for(var i = 1; i <= 8;i++){
        if($("#salida"+i).is(':checked')){
            salidas.push(i);
        }  
    }

    var newAlarmKey = firebase.database().ref().child('Alarms').push().key;
    
    firebase.database().ref('Alarms/'+newAlarmKey).set({
    duracion: duracion,
    hora: hora,
    estado : estado,
    salidas:salidas
    });
    
  return true;
}

/*SCRIPTS PARA ACTIVATORS UPDATE al momento se sobreescribe*/
function updateActivator(key) {
    var duracion = $("#duracion_riego").val();
    var hora = $("#hora_riego").val();
    var estado=0;
    if($("#estado").is(':checked')){
        estado=1;
    }
    var salidas=[];
    for(var i = 1; i <= 8;i++){
        if($("#salida"+i).is(':checked')){
            salidas.push(i);
        }  
    }

    
    firebase.database().ref('Alarms/'+key).set({
    duracion: duracion,
    hora: hora,
    estado : estado,
    salidas:salidas
    });
  return true;
}



//funcion que se encarga de cargar los datos para la función actualizar
function loadDataUpdate(key) {
    firebase.database().ref('/Alarms/'+key).once('value').then(function(snapshot) {
        var datos=snapshot.val();
        $("#duracion_riego").val(datos.duracion);
        $("#hora_riego").val(datos.hora);
        var estado=datos.estado;
        console.log(estado);

        if(estado){
            $('#estado').attr('checked', true);
        }else{
            $('#estado').attr('checked', false);
        }

        var salidas=datos.salidas;
        salidas.forEach(function(element) {
            $('#salida'+element).attr('checked', true); 
        });
    $("#activarHora").addClass("active");
    $("#activarDuracion").addClass("active"); 
    });
}

function loadDataView() {
    /*SCRIPTS PARA ACTIVATOR*/
    //ACTIVADOR VISTA
    firebase.database().ref('/Alarms').once('value').then(function(snapshot) {
        snapshot.forEach(function(elementOb) {
            var key = elementOb.key;
            var element = elementOb.val();
            var salidas = element.salidas;
            var salidaString='';
            salidas.forEach(function(salida) {
                salidaString+=" "+salida+" , ";
            });
            salidaString=salidaString.substr(0,salidaString.length-2);
              $('#tableActivators').find("#tableBodyActivators").append( "<tr><td>"+element.estado+"</td><td>"+element.hora+"</td><td>"+element.duracion+"</td><td>"+salidaString+"</td><td><a type='button' href='activator_update.php?activatorId="+key+"' class='btn btn-primary btn-md'>editar</button></td></tr>" );
        });
    });  
}