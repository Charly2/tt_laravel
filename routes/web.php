<?php
use App\Persona;
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

/*Route::get('/', function () {
    return view('index.index');
});*/

use App\Notificion;
use Illuminate\Support\Facades\Mail;


Route::get('/','HomeController@index')->name('index.index');
Route::get('/requisitos','HomeController@requisitos')->name('index.requisitos');
Route::get('/preregistro','HomeController@preregistro')->name('index.preregistro');
Route::get('/preregistro_ok','HomeController@preregistrook')->name('index.preregistrook');
Route::post('/preregistro','HomeController@save')->name('index.preregistro_post');

Route::get('/verificapreregistro/','VerificaController@index')->name('verifica.index');
Route::get('/verificapreregistro/cancelados','VerificaController@cancelados')->name('verifica.cancelados');
Route::get('/verificapreregistro/aprobados','VerificaController@aprobados')->name('verifica.aprobados');
Route::get('/verificapreregistro/valida/{id}','VerificaController@valida')->name('verifica.valida');
Route::post('/verificapreregistro/valida/{id}','VerificaController@validapost')->name('verifica.validapost');
Route::post('/verificapreregistro/rechaza/{id}','VerificaController@rechaza')->name('verifica.rechaza');
Route::get('/verificapreregistro/ver/{id}','VerificaController@valida')->name('verifica.ver');


Route::get('/notificaciones/get','NotificacionesController@get_ajax');
Route::get('/notificaciones','NotificacionesController@index');


Route::get('/completeinformacion','TrabajadorController@completainfo');
Route::get('/completeinformacion_direccion','TrabajadorController@completeinformacion_direccion');
Route::get('/completeinformacion_trabajo','TrabajadorController@completeinformacion_trabajo');
Route::get('/completeinformacion_documentos','TrabajadorController@completeinformacion_documentos');
Route::post('/completeinformacion_general','TrabajadorController@completainfo_general');
Route::post('/completeinformacion_direccion','TrabajadorController@completeinformacion_direccion_post');
Route::post('/completeinformacion_trabajo','TrabajadorController@completeinformacion_trabajo_post');
Route::post('/completeinformacion_documentos','TrabajadorController@completeinformacion_documentos_post');
Route::get('/inscripciones','InscripcionesController@index');


Route::get('/procesoinscripcion','ProcesoController@index');
Route::get('/procesoinscripcion/inicio','ProcesoController@inicia');
Route::get('/procesoinscripcion/menor','ProcesoController@menor');
Route::post('/procesoinscripcion/menor','ProcesoController@menorpost');


Route::get('/prueba',function (){

});



Route::get('/files/verificapreregistro/{filename}','FilesController@verificapreregistro')->name('files.verificapreregistro');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');
