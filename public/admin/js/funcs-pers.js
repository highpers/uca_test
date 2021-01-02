/**
 * Habilita o no el campo honario sesión en el form de datos del paciente
 */

function switchObraSocial(){

  var paciente_id = document.getElementById('paciente_id').value ;

  var os = document.getElementById('obra_social_id').value ;
  var campo_discapacidad = document.getElementById('tipo_discapacidad_id');
  var campo_honorario = document.getElementById('honorario_sesion');
  var campo_duracion = document.getElementById('duracion_sesion');
  var campo_num_afiliado = document.getElementById('numero_afiliado');
 
  if(os > '1'){ // Asignada
    campo_honorario.placeholder = 'El fijado por la obra social' ;
    campo_honorario.value = '';
    campo_honorario.disabled = true ;
    campo_num_afiliado.disabled = false ;
    campo_discapacidad.disabled = false ;

    // tenemos que restituir el num. afiliado que traía
    if (paciente_id > 0) { // es form de edicion
      $.getJSON({  // atajo para ajax con get y json
        url: "/adminX/pacientes/datos_os/" + paciente_id, success: function (result) {
// console.log(result) ; return;
          $("#numero_afiliado").val(result.numero_afiliado);
         
        }

      }

      )
    }

  }else{ // ninguna
    document.getElementById('honorario_sesion').placeholder = '' ;
    if(paciente_id > 0){ // es form de edicion
      $.ajax({
        url: "/adminX/pacientes/honorario/" + paciente_id, success: function (result) {

          $("#honorario_sesion").val(result);
        }

      } 

      )
   
      $.ajax({
        url: "/adminX/pacientes/duracion/" + paciente_id, success: function (result) {

          $("#duracion_sesion").val(result);
        }

      }

      )

    }
    campo_honorario.placeholder = '' ;
    campo_honorario.disabled = false ;
    campo_num_afiliado.disabled = true ;
    campo_num_afiliado.value = '' ;
    campo_discapacidad.value = '1' ;
    campo_discapacidad.disabled = 'true' ;
  }

}


function borrar(modelo, id , label){

     if(confirm ('¿Confirma el borrado ' + label + '?')){

        location.href="/admin/"+modelo+"/"+id+"/borrar" ;


      }



}
/****************/
function habilitar_campos_form_paciente(){


  var os = document.getElementById('obra_social_id').value;
  var campo_discapacidad = document.getElementById('tipo_discapacidad_id');
  var campo_honorario = document.getElementById('honorario_sesion');
  var campo_duracion = document.getElementById('duracion_sesion');
  var campo_num_afiliado = document.getElementById('numero_afiliado');

  if (os > '1') { // Asignada
    campo_honorario.placeholder = 'El fijado por la obra social';
    campo_honorario.value = '';
    campo_honorario.disabled = true;
    campo_num_afiliado.disabled = false;
 
    campo_discapacidad.disabled = false;


  
  }else{
    campo_honorario.placeholder = '';
    campo_honorario.disabled = false;
    campo_num_afiliado.disabled = true;
    campo_num_afiliado.value = '';
    campo_discapacidad.value = '1';
    campo_discapacidad.disabled = 'true';

  }


}

function logout(){
  location.href = '/despedida';
  $.ajax({  
    url: '/logout' , 
    type: 'POST' ,
    data: {
      "_token": $("meta[name='csrf-token']").attr("content")
    },
    success: function (result) {
      //  console.log(result) ; return;
    ////  alert('deslogueado');

    }
  }
  ) ;

}
