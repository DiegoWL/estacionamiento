@extends('index')
@section('content')

  <h3>Registro: <button type="button" id="agregar" class="btn btn-success float-right"><span><i class="fa fa-plus-square" aria-hidden="true"></i></span> Agregar </button></h3>
<div class="row">
  <div class="table-responsive text-center">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Fecha</th>
          <th scope="col">Patente</th>
          <th scope="col">Hora Ingreso</th>
          <th scope="col">Registrar Salida</th>
        </tr>
      </thead>
      <tbody>

      @foreach ($estacionamiento as $e)
        <tr>
          <td>{{$e->fecha->format('d/m/Y') }}</td>
          <td>{{$e->patente}}</td>
          <td>{{$e->hora_entrada->format('H:i:s')}}</td>
          <td><button  data-id={{$e->id}}  type="button" class="btn btn-primary btn_salida mx-auto"><span><i class="fa fa-edit"  aria-hidden="true"></i></span></button></td>
        </tr>
      @endforeach

      </tbody>
    </table>
  </div>

</div>

@stop
