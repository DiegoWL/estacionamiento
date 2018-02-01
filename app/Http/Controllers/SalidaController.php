<?php

namespace App\Http\Controllers;
use App\Estacionamiento;
use Illuminate\Http\Request;

class SalidaController extends Controller
{
    public function index(){

      $estacionamiento = Estacionamiento::all();
      return view('salidas' , ['estacionamiento' => $estacionamiento ]);
    }
}
