<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estacionamiento extends Model
{
  protected $table = "estacionamiento" ;
  protected $dates = ['fecha' , 'hora_salida' , 'hora_entrada'];
  protected $filiable = ['fecha' , 'patente'  , 'precio_total' ];
}
