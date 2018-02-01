
  <div class="modal-header">
    <h5 class="modal-title">Salida de Vehiculo Patente: {{$tarifa[0]->patente}}</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  <div class="modal-body">
    <form id="vehiculo_form"  method="PUT" class=""  action="">
        {!! csrf_field() !!}
        <div class="form-group">
          <label for="">Hora de Ingreso: {{$tarifa[0]->hora_entrada->format('H:i:s')}}</label>
          <input type="hidden" name="hora_ingreso" value="{{$tarifa[0]->hora_entrada->format('H:i:s')}}" class="form-control" id="entrada" placeholder="" >
        </div>
        <div class="form-group">
          <label for="">Hora de Salida: {{$hoy}}</label>
          <input type="hidden"   name="hora_salida"  value="{{$hoy}}" class="form-control" id="salida" placeholder="" >
        </div>
        <div class="form-group">
          <label for="">Tiempo Estadia: {{aHoras($estadia)}}</label>
          <input type="hidden"  name="tiempo_es"  value="{{$estadia}}" class="form-control" id="estadia" placeholder="" >
        </div>
        <div class="form-group">
          <label for="">Total a Pagar: (${{$valor_tarifa}} por Minuto): ${{ conversorMoneda($valor_estadia)}}  ({{$tarifa[0]->descripcion }})</label>
          <input type="hidden" name="valor" value="{{$valor_estadia}}" class="form-control" id="valor" placeholder="">
        </div>
        {{ method_field('PUT') }}
    </form>
  </div>
  <div class="modal-footer">
     <button type="button" id="btn_actualizar" data-id="{{ $estc_id[0]->id}}" class="btn btn-primary btn_actualizar"><span><i class="fa fa-edit"  aria-hidden="true"></i></span>Registrar Salida</button>
     <button type="button" class="btn btn-danger" data-dismiss="modal"><span><i class="fas fa-times"></i></span> Cerrar</button>
  </div>
