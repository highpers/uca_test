<meta name="csrf-token" content="{{ csrf_token() }}">
<div id="modalConfirm" class="fondoModalConfirm">
  ¿Confirmás el borrado {{ $labelPregunta }}?
  <div><br>
    <span id="urlOriginal" style="display:none">{{$urlBase}}borrar/</span>
    <span id="confirmModalBorrar" style="cursor:pointer">Sí</span> &nbsp; &nbsp; &nbsp; <span id="cancelConfirmBorrar">No</span>
  </div>

</div>


<script>
// Get the parent DIV, add click listener...


document.getElementById("{{$idListeners}}").addEventListener("click",function(e) {
	// e.target was the clicked element
// console.log('acsa2');
  if (e.target && e.target.getAttribute('name') == 'borrar') {
    
// console.log('{{$urlBase}}');
 // si se clickea de nuevo en borrar un registro anulamos el listener que se creó antes
    document.getElementById("{{$idListeners}}").addEventListener("click",function(e) {
      if (e.target && e.target.getAttribute('name') == 'borrar') { 
        removeBorrarListener(); 
      }  
    }  
    );
  
    // listener para volver a ocultar el modal si se cancela el borrado ('No')
    document.getElementById("cancelConfirmBorrar").addEventListener("click",function(e) {
         document.getElementById('modalConfirm').style.display = 'none';
     }) ;


    // document.getElementById("confirmModalBorrar").removeEventListener("click", borrar ,true);

    
    var item_id = e.target.getAttribute('id').substring(8) ;
    

    // var url_original = document.getElementById("urlOriginal").innerHTML;

    // document.getElementById("confirmModalBorrar").href = url_original + item_id
     
   
    $("#confirmModalBorrar").on('click', function () { // forma correcta para que funcione en móviles también
      borrarItem();
    });

    // document.getElementById("confirmModalBorrar").addEventListener("click",borrarItem) ;
  
  function borrarItem(){ 
   // alert('{{$urlBase}}'+item_id); 
      $.ajax({
    // url: url_original+item_id,
    url : '{{$urlBase}}'+item_id ,
    type: 'POST',  
    data: {
        _method:"DELETE" ,
        "_token": $("meta[name='csrf-token']").attr("content")
    },
    success: function(result) {
      
       location.href="{{$urlRedirect}}";
        // document.getElementById('modalConfirm').style.display = 'none';
    }
    } ) ;

    };  


    document.getElementById('modalConfirm').style.display = 'block';


  }
     else if(e.target && e.target.getAttribute('name') == 'editar'){

        var item_id = e.target.getAttribute('id').substring(5) ;
        $('#tit_agregar').html('Editar');
        $('#form_edit').attr('action', '{{$urlBase}}'+item_id);
        // document.getElementById('form_edit').action = "{{$urlBase}}"+item_id
        
        $.ajax({url: "{{$urlBase}}edit/"+item_id  , success: function(result){
          
                $("#texto").val(result);
               
               // document.getElementById('form_edit').method = "put"
                
              } 
            });
           
       $('#texto').focus() ;  
 };
  function removeBorrarListener(){
       
    document.getElementById("confirmModalBorrar").removeEventListener("click", borrarItem);

  }
} )

$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})

</script>
