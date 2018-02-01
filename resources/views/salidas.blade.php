@extends('index')
@section('content')
<h3>Salidas Registradas: </h3>
<div class="row">
  <div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Fecha</th>
          <th scope="col">Patente</th>
          <th scope="col">Hora Ingreso</th>
          <th scope="col">Hora Salida</th>
          <th scope="col">Total pagado</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($estacionamiento as $e)
          <tr>
            <td>{{$e->fecha->format('d/m/Y') }}</td>
            <td>{{$e->patente}}</td>
            <td>{{$e->hora_entrada->format('H:i:s')}}</td>
            <td>{{$e->hora_salida->format('H:i:s')}} </td>
            <td>${{conversorMoneda($e->precio_total)}} </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

</div>

@stop
