
document.getElementById("paciente_id").addEventListener("change",function(e) {
 id_paciente = $('#paciente_id').val();


 if(id_paciente > 0){ 
  console.log(id_paciente);
  $.getJSON({url: "/adminX/pacientes/select_sesion/"+id_paciente  , success: function(result){
 
    var disable = (result.disable_codigo_transaccion === 'true'); // convierte el string en boolean
    if(disable){ // no tiene obra social
      $('#codigo_transaccion').prop('placeholder','N/A');
      $('#sesiones_disponibles').html('');
      
    }else{

        var disponibles_anuales = result.disponibles_anuales ;
        var disponibles_autorizadas = result.disponibles_autorizadas ;
        var  info_anuales = disponibles_anuales ;
        var info_autorizadas = disponibles_autorizadas ;
        
        if(disponibles_anuales < 0){
            info_anuales = '<span style="color: red">'+info_anuales * -1 + ' excedidas' + '</span>' ; 
        }

        if(disponibles_autorizadas < 0){
            info_autorizadas = '<span style="color: red">'+info_autorizadas * -1 + ' excedidas' + '</span>' ; 
        }

      $('#codigo_transaccion').prop('placeholder','Asginado por obra social al comunicar la sesión');
    $('#sesiones_disponibles').html('<dt>Sesiones disponibles</dt><dd>Anuales: '+info_anuales+ '<br>Autorizadas: ' + info_autorizadas) ;

    }
  

  }
 
    } 
  )
  }else{
    $("#codigo_transaccion").prop('disabled',true);
    $("#sesiones_disponibles").html('');
  }
})
