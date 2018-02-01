

  <div class="modal-header">
    <h5 class="modal-title">Agregar Vehiculo</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
    <form id="patente_form" class="" method="post"  action="">
      {!! csrf_field() !!}
        <div class="form-group">
          <label for="exampleFormControlInput1">Patente</label>
          <input type="text" class="form-control" name="patente" id="patente" placeholder="">
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Fecha de Ingreso</label>
          <input type="text"  value="{{$fecha->format('d-m-Y')}}" name="fecha_ingreso" class="form-control" id="fecha_ingreso" placeholder="">
        </div>
        <div class="form-group">
          <label for="exampleFormControlInput1">Hora de Ingreso</label>
          <input type="text"  value="{{$fecha->format('H:i:s')}}"  name="hora_ingreso"class="form-control" id="hora_ingreso" placeholder="">
        </div>
    </form>
  </div>
  <div class="modal-footer">
     <button type="button" id="btn-guardar" class="btn btn-primary btn-guardar"><i class="fa fa-pencil-alt"></i>Registrar</button>
     <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
  </div>
