<?php

use App\Tarifa;
use Illuminate\Database\Seeder;

class TarifaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tarifa = new Tarifa;
        $tarifa->valor = 1500;
        $tarifa->descripcion = "Este es un valor";
        $tarifa->save();
    }
}
