<?php

use Illuminate\Database\Seeder;
use App\Estacionamiento;
use Carbon\Carbon;

class EstacionamientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $carbon = new Carbon();
        $fechahoy = $carbon::now();
        $estacionamiento = new Estacionamiento;
        $estacionamiento->fecha = $carbon::now('America/Santiago');
        $estacionamiento->patente = "ABC123";
        $estacionamiento->hora_salida = $fechahoy->addHour(1);
        $estacionamiento->hora_entrada = $carbon->subHour(1);
        $estacionamiento->precio_total = "4000";
        $estacionamiento->tarifa_id ="1";
        $estacionamiento->save();
    }
}
