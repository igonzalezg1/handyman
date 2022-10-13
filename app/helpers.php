<?php
if (! function_exists('current_user')) {
    function current_user()
    {
        return auth()->user();
    }
}
if (! function_exists('filtrar_fecha')) {
    function filtrar_fecha($fecha){


        $date = substr($fecha,0,10 );
        $fecha = explode("-",$date);
        $fecha = $fecha[0].$fecha[1].$fecha[2]; 
        
        return $fecha;
    }
}    
if (! function_exists('formato_fecha')) {
    function formato_fecha($fecha){

        $fecha = substr($fecha , 0, 10);
        $date2 = new DateTime($fecha);
        $fecha = $date2->format('d-m-Y');
        
        return $fecha;
    }



}  