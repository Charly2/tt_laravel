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

Route::get('/validadocumentos/','VerificaDocumentosController@index')->name('validadocumentos.index');
Route::get('/validadocumentos/cancelados','VerificaDocumentosController@cancelados')->name('validadocumentos.cancelados');
Route::get('/validadocumentos/aprobados','VerificaDocumentosController@aprobados')->name('validadocumentos.aprobados');
Route::get('/validadocumentos/valida/{id}','VerificaDocumentosController@valida')->name('validadocumentos.valida');
Route::post('/validadocumentos/valida/{id}','VerificaDocumentosController@validapost')->name('validadocumentos.validapost');
Route::post('/validadocumentos/rechaza/{id}','VerificaDocumentosController@rechaza')->name('verivalidadocumentosfica.rechaza');
Route::get('/validadocumentos/ver/{id}','VerificaDocumentosController@valida')->name('validadocumentos.ver');


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
Route::get('/inscripciones/{id}','InscripcionesController@show');

Route::get('/inscripciones_cendi','InscripcionesControllerCendi@index');
Route::get('/inscripciones_cendi/{id}','InscripcionesControllerCendi@show');
Route::get('/inscripciones_cendi/print/{id}','InscripcionesControllerCendi@print');


Route::get('/procesoinscripcion','ProcesoController@index');
Route::get('/procesoinscripcion/inicio','ProcesoController@inicia');
Route::get('/procesoinscripcion/menor','ProcesoController@menor');
Route::post('/procesoinscripcion/menor','ProcesoController@menorpost');
Route::get('/procesoinscripcion/conyuge','ProcesoController@conyuge');
Route::post('/procesoinscripcion/conyuge','ProcesoController@conyugepost');
Route::get('/procesoinscripcion/conyuge_direccion','ProcesoController@conyuge_direccion');
Route::post('/procesoinscripcion/conyuge_direccion','ProcesoController@conyuge_direccion_post');
Route::get('/procesoinscripcion/persona_auth','ProcesoController@persona_auth');
Route::post('/procesoinscripcion/persona_auth','ProcesoController@persona_auth_post');
Route::get('/procesoinscripcion/persona_auth_direccion','ProcesoController@persona_auth_direccion');
Route::post('/procesoinscripcion/persona_auth_direccion','ProcesoController@persona_auth_direccion_post');
Route::get('/procesoinscripcion/documentos','ProcesoController@documentos');
Route::post('/procesoinscripcion/documentos','ProcesoController@documentos_post');
Route::get('/procesoinscripcion/cendi','ProcesoController@cendi');
Route::post('/procesoinscripcion/cendi','ProcesoController@cendi_post');


Route::get('/procesovalidacion',function (){
    return view('avisos.index');
});


Route::get('/entrevistas','Entrevistas@index');
Route::get('/entrevista_llena/{id}', 'Entrevistas@llena')->name('entrevista.llena');
Route::get('/entrevista_llena/print/{id}', 'Entrevistas@print')->name('entrevista.print');
Route::post('/entrevista_llena_post', 'Entrevistas@llena_post')->name('entrevista.llena_post');



Route::get('/files/verificapreregistro/{filename}','FilesController@verificapreregistro')->name('files.verificapreregistro');
Route::get('/files/documentosTrabajador/{id}/{filename}','FilesController@documentosTrabajador')->name('files.documentosTrabajador');



Auth::routes();


Route::get('/asigna_uno', 'AsignacionController@index')->name('asigna_uno');
Route::get('/asigna_uno/{id}', 'AsignacionController@show')->name('show');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');
