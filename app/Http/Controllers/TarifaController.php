<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Tarifa;
use App\Estacionamiento;
class TarifaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
        //
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

      $carbon = new Carbon;


      $estc = Estacionamiento::join('tarifa', 'tarifa.id', '=', 'estacionamiento.tarifa_id')
                                ->where('estacionamiento.id','=', $id)
                                ->get();
      $estc_id = Estacionamiento::select('estacionamiento.id as id')
                                ->join('tarifa', 'tarifa.id', '=', 'estacionamiento.tarifa_id')
                                ->where('estacionamiento.id','=', $id)
                                ->get();

      $hoy = $carbon::now()->format('H:i:s');
    //  $salida = Carbon::parse($hora_S);
      $salida = $estc[0]->hora_entrada->format('H:i:s');
      $valor_tarifa = $estc[0]->valor;
      $estadia =  calcularHora($hoy , $salida);
      $valor_estadia = $valor_tarifa*$estadia;

      return  response()->json([
         'view'=>view('tarifa' ,
         ['tarifa'=> $estc , 'estc_id' => $estc_id , 'hoy' => $hoy , 'estadia' => $estadia , 'valor_estadia' => $valor_estadia , 'valor_tarifa' => $valor_tarifa])
         ->render() , 'tarifa'=> $estc , 'estadia' => $estadia ,  'valor_estadia' => $valor_estadia]);

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


         $carbon = new Carbon;
         $est_obj = new Estacionamiento;
         $est_obj = Estacionamiento::find($id);
         $hora_salida = Carbon::parse($request->hora_salida);
         $est_obj->hora_salida = $hora_salida;
         $est_obj->precio_total = $request->valor;

         $est_obj->save();

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
