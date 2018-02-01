$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


$(document).ready(function() {
  $('.btn_salida').click(function(e) {
      let data_id = $(this).data('id');
      let data_tarifa = $(this).data('tarifa');
      console.log(data_tarifa)
      console.log(data_id)
      $.ajax({
        url: 'salida/'+data_id,
        type: 'GET'
      })
      .done(function(data) {

    //    console.log(data.tarifa[0].precio_total);
        $('#modal-content').empty();
        $('#modal-content').append(data.view);
        $('#modal').modal();

        $('#btn_actualizar').click(function(event) {
        var patenteForm = $('#vehiculo_form').serializeArray();
        var id = $(this).data('id');

          });

      })
      .fail(function() {
        console.log("error");
      })
      .always(function() {
        console.log("complete");
      });
    /* Act on the event */
  });

  $('body').on('click', '.btn_actualizar', function(event) {
    event.preventDefault();
    var forma = $('#vehiculo_form').serializeArray();
    var id = $(this).data("id");
    var hoy = $('#hoy').val();
  //  console.log(forma)
  //    console.log(patenteForm);
      $.ajax({
        url: '/salida/'+id,
        type: 'PUT',
        data: forma
      }).done(function(data) {
          alert('Salida Registrada');
          setTimeout(function(){
                $('#modal').modal('toggle');
                window.location.replace(url);
          }, 2000);
        })
        .fail(function() {
          console.log("error");
        })
        .always(function() {
          console.log("complete");
        });
  });
  $('#agregar').click(function(e) {
    $.get('/ingresar' , function(json){

          $('#modal-content').empty();
          $('#modal-content').append(json.view);
          $('#modal').modal();
          var url = window.location.href;
          /** Btn para guardar formulario**/
          $('#btn-guardar').click(function(event) {
            event.preventDefault();
            patenteForm = $('#patente_form').serializeArray();
            console.log(patenteForm)
            $.ajax({
              url: '/guardar',
              type: 'POST',
              data: patenteForm
            })
            .done(function(data) {
                alert('Auto Agregado');
                setTimeout(function(){
                    $('#modal').modal('toggle');
                    window.location.replace(url);
                }, 2000);
            })
            .fail(function() {
              console.log("error");
            })
            .always(function() {
              console.log("complete");
            });
          });

  });


      /* Act on the event */
});



});
