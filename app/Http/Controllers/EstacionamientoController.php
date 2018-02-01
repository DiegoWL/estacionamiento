<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Estacionamiento;
use App\Tarifa;


class EstacionamientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

      $estacionamiento = Estacionamiento::all();

      return view('body' , ['estacionamiento' => $estacionamiento ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $est_obj = new Estacionamiento;
        $tarifa_obj = new Tarifa;
        $fecha = Carbon::parse($request->fecha_ingreso);
        $hoy = Carbon::now();
        $valor_tarifa = $tarifa_obj::select('valor', 'id')->get();

        //Comprobar si es fin de semana.
        if ($hoy->dayOfWeek == Carbon::SATURDAY || $hoy->dayOfWeek == Carbon::SUNDAY ) {
            $tarifa = $valor_tarifa[1]->valor;
            $id_tarifa = $valor_tarifa[1]->id;
        }else {
            $tarifa = $valor_tarifa[0]->valor;
            $id_tarifa = $valor_tarifa[0]->id;
        }


        $est_obj->patente = $request->patente;
        $est_obj->fecha = Carbon::parse($request->fecha_ingreso);
        $est_obj->hora_entrada = Carbon::parse($request->hora_ingreso);
        $est_obj->hora_salida = Carbon::parse(null);
        $est_obj->precio_total = $tarifa;
        $est_obj->tarifa_id =  $id_tarifa;
        $est_obj->save();




    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
