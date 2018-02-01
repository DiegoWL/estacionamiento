<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Estacionamiento;
class Tarifa extends Model
{
    protected $table = "tarifa";


    public function Estacionamiento(){
        return $this->hasMany(Estacionamiento::class);
    }
}
