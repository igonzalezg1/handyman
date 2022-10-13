<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\App as AppControllers;
use App\Http\Controllers\handyman\ReportesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login ');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/avances', [App\Http\Controllers\HomeController::class, 'avances'])->name('home.avances');
Route::get('gmail', [App\Http\Controllers\GmailController::class, 'index'])->name('gmail');
Route::get('check', [App\Http\Controllers\GmailController::class, 'check'])->name('check');
Route::get('generales', [App\Http\Controllers\GeneralesController::class, 'index'])->name('generales');
Route::get('reporte/{id}', [App\Http\Controllers\GeneralesController::class, 'reporte'])->name('reporte');
Route::get('nreporte/{id}', [App\Http\Controllers\NorteController::class, 'reporte'])->name('nreporte');
Route::get('phreporte/{id}', [App\Http\Controllers\PhController::class, 'reporte'])->name('phreporte');
Route::get('breporte/{id}', [App\Http\Controllers\BajioController::class, 'reporte'])->name('breporte');
Route::get('oreporte/{id}', [App\Http\Controllers\OccidenteController::class, 'reporte'])->name('oreporte');
Route::get('norte', [App\Http\Controllers\NorteController::class, 'index'])->name('norte');
Route::get('bajio', [App\Http\Controllers\BajioController::class, 'index'])->name('bajio');
Route::get('occidente', [App\Http\Controllers\OccidenteController::class, 'index'])->name('occidente');
Route::get('ph', [App\Http\Controllers\PhController::class, 'index'])->name('ph');
Route::get('reportenpdf/{id}', [App\Http\Controllers\NorteController::class, 'exportpdf'])->name('descargarnReporte');
Route::get('reportebpdf/{id}', [App\Http\Controllers\BajioController::class, 'exportpdf'])->name('descargarbReporte');
Route::get('reporteopdf/{id}', [App\Http\Controllers\OccidenteController::class, 'exportpdf'])->name('descargaroReporte');

Route::get('reportenfpdf/{id}', [App\Http\Controllers\NorteController::class, 'exportfpdf'])->name('descargarnfReporte');
Route::get('reportepfpdf/{id}', [App\Http\Controllers\PhController::class, 'exportfpdf'])->name('descargarpfReporte');
Route::get('reportebfpdf/{id}', [App\Http\Controllers\BajioController::class, 'exportfpdf'])->name('descargarbfReporte');
Route::get('reporteofpdf/{id}', [App\Http\Controllers\OccidenteController::class, 'exportfpdf'])->name('descargarofReporte');


//TICKETS
Route::resource('tickets', App\Http\Controllers\TicketsController::class);
Route::post('filtrafecha', [App\Http\Controllers\AjaxController::class, 'filtrafecha'])->name('filtrafecha.post');
Route::get('incompletos', [App\Http\Controllers\IncompletosController::class, 'index'])->name('incompletos');
Route::get('igualas', [App\Http\Controllers\IgualasController::class, 'index'])->name('igualas');
Route::get('historico', [App\Http\Controllers\IgualasController::class, 'historico'])->name('historico');
Route::post('igualasc', [App\Http\Controllers\IgualasController::class, 'consulta']);
Route::post('igualash', [App\Http\Controllers\IgualasController::class, 'consultah']);
Route::post('igualassave', [App\Http\Controllers\IgualasController::class, 'igualassave'])->name('igualas.save');
Route::get('actualiza', [App\Http\Controllers\IgualasController::class, 'actualiza']);
Route::post('respaldo', [App\Http\Controllers\IgualasController::class, 'respaldo'])->name('respaldo');

//Handyman
Route::group(['middleware'=> ['auth']], function(){
    Route::get('indexhandyman',[ReportesController::class, 'index'])->name('indexhandyman');
    Route::get('verreportes/{idBloque}', [ReportesController::class, 'verreportes'])->name('verreportes');
});

/**
 * Reporte de tiempos
 *
 * @author Benjamín Olvera Rosales [bolvera@empresavirtual.mx]
 */
Route::prefix('reporte-tiempos')->name('reporte-tiempos.')->group(function () {
    Route::get('/', [AppControllers\ReporteTiemposController::class, 'empresa'])->name('empresa');
    Route::get('individual/{id_usuario}', [AppControllers\ReporteTiemposController::class, 'individual'])->name('individual');
});
