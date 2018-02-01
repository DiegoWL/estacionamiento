<?php
setlocale(LC_MONETARY, 'es_CL');

use Carbon\Carbon;
  function calcularHora($E , $S){
       $E = Carbon::parse($E);
       $S =  Carbon::parse($S);
       $horas_E = $E->hour;
       $horas_S = $S->hour;
       $min_E = $E->minute;
       $min_S = $S->minute;
       $totalHoras =  $horas_E - $horas_S - 1;
       $minutos = $min_S-$min_E;
       if($minutos < 0){
         $minutos = $minutos*-1;
       }
       $total = $totalHoras*60 + $minutos;
       return $total;

    }

    function aHoras($min){
          $h = $min%60;
          $horas = round(($min/60)+1);
          $minutos = floor($h*60);
          if($h == 0){
            $text = $horas." Horas ";
          }else{
            $minutos = fmod($h,60);
            $text = $horas." Horas y ".$minutos." Minutos";
          }
          return $text;
    }
   function conversorMoneda($valor){
      return number_format($valor,1, ",", ".");
    }
 ?>
