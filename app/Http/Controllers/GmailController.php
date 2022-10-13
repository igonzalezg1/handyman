<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GmailController extends Controller
{
    public function index(){
		
		 $fecha = date("d/m/y");

      //  phpinfo();
        set_time_limit(4000); 
 
 // Connect to gmail
 $imapPath = '{imap.gmail.com:993/imap/ssl}INBOX';
 $username = 'tickets25595@gmail.com';
 $password = 'ferrel24*';
  
 // try to connect 
 $inbox = imap_open($imapPath,$username,$password) or die('Cannot connect to Gmail: ' . imap_last_error());
  
  
 // search and get unseen emails, function will return email ids
  //$emails = imap_search($inbox, 'SUBJECT "Ticket" ON "'.$fecha.'" ' );
		$emails = imap_search($inbox, 'SUBJECT "Ticket" SINCE "1/06/2022" ' );
  
 $output = '';
		
	
 foreach($emails as $mail) {
  
  $headerInfo = imap_headerinfo($inbox,$mail);
	 
	 
  
	if (strpos($headerInfo->subject, 'Resuelto') !== false) {
   // echo 'true';
    continue;
	
	}else{
		  $output .= $headerInfo->subject.'<br/>';

        $body = imap_qprint(imap_body($inbox,$mail));
		 $cuerpo = mb_split("\s{2,}", $body) ;
		
	
		
		
		//echo $headerInfo->subject;
	 
	
     
	// $i = count($cuerpo).'<br>';
		
		for($i = 1; $i < 20; $i++){
			
			//return $cuerpo[$i].'<br>';
			
		//return $cuerpo;
			 if(!empty($cuerpo)){
			
	
		
		if(strpos($cuerpo[$i], 'Categoría: MANTENIMIENTO.PREVENTIVO.IGUALA SISTEMA DE FILTRACION') !== false){
			
			
			for($j = 1; $j < 20; $j++){
				
				if(strpos($cuerpo[$j], 'Ticket: ') !== false ){
					
				 	  $ticket = $cuerpo[$j];
					  $ticket = explode(': ', $ticket);
					  $ticket = $ticket[1];
				
					//return $cuerpo;
				
			    	
				}
				if(strpos($cuerpo[$j], 'Tienda:') !== false ){
				
					
				      	$tienda = $cuerpo[$j];
					 $nombre_tienda = $cuerpo[$j+1];
					
					
				}
				if(strpos($cuerpo[$j], 'TIENDA:') !== false ){
				
					
				      	$tienda = $cuerpo[$j];
					
					    $tienda = explode(': ', $tienda);
					  $tienda = $tienda[1];
						
					   $t_cc = explode(', ', $tienda);
				       $t_cc = $t_cc[0];
				
				}
				if(strpos($cuerpo[$j], 'FRECUENCIA:') !== false ){
				
					
					$frecuencia = $cuerpo[$j];
				
				}
				if(strpos($cuerpo[$j], 'COSTO:') !== false ){
				
					
					$costo = $cuerpo[$j];
					    $costo = explode(': ', $costo);
					    $costo = $costo[1];
					
				}
				
				
				if(strpos($cuerpo[$j], 'Prioridad: ') !== false ){
					
					$prioridad = $cuerpo[$j];
					$prioridad = explode(': ', $prioridad);
					$prioridad = $prioridad[1];
					
				}
				if(strpos($cuerpo[$j], 'Categoría: ') !== false ){
					
					$categoria = $cuerpo[$j];
					$categoria = explode(': ', $categoria);
					$categoria = $categoria[1];
					
				}
				if(strpos($cuerpo[$j], 'Fecha de Apertura: ') !== false ){
					
					$fecha = $cuerpo[$j];
					$fecha = explode(': ', $fecha);
					$fecha = $fecha[1];
					
				}
				
				
				
			
			}
			
			//aqui va codigo a ejecutar
			if(isset($ticket)){
			echo  $ticket;
			echo '<br>';
			echo $nombre_tienda;
			echo '<br>';
			echo   $t_cc;
			echo '<br>';
			echo    $costo;
			echo '<br>';
			echo	$prioridad;
			echo '<br>';
			echo $categoria;
			echo '<br>';
			echo $fecha;
			echo '<br>';
				
			$existencia = DB::table('tickets')
				->select('accion')
				->where('accion', '=', $ticket)
				->get();
				
		if(isset($existencia[0]->accion)){
			echo 'no se inserta ' .$ticket;
		}else{
			
			$sucursal = DB::table('sucursales_m')
			->select('zona')
			->where('tienda', 'like', $t_cc)
			->get();
			
		DB::table('tickets')->insert([
			'empresa' => 'Mutiserle',
			'sucursal' => $sucursal[0]->zona,
			'area' => $nombre_tienda,
			
			'accion' => $ticket,
			'estatus' => 'Abierto',
			'created_at' => $fecha,
			'updated_at' => $fecha,
			'categoria'	 => $categoria,
			'prioridad' => $prioridad,
			'costo'=> $costo
		]); 

		
			}
		
			}
		//return $cuerpo;	
		
	 echo '<br>';
			echo '<br>';
			
		}
				 
				
			
			 }
	}
		
		
			
		
		
		
  //$emailStructure = imap_fetchstructure($inbox,$mail);
  
		
		
			}

		
		//  echo $output;
			
		}
		
		// colse the connection
		imap_expunge($inbox);
		imap_close($inbox);


		

    }


	public function check(){

		$consultas = DB::connection('mysql2')->table('tb_respuesta')
						->select('respuesta')
						->where('respuesta', 'like', '%STBX%')	
						->where('fecha', 'like', '2021-10%')
						->get();

						foreach ($consultas as $consulta ) {
							    $dato = explode("| ",$consulta->respuesta);
							    $sucursal = $dato[1];	

								DB::table('sucursales_m')
									->where('tienda', 'like', '%'.$sucursal)
									->update([
										'check_mensual' => 1
									]);

						}

	}
}
