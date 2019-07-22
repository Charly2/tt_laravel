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


Route::get('/','HomeController@index')->name('index.index');
Route::get('/requisitos','HomeController@requisitos')->name('index.requisitos');
Route::get('/preregistro','HomeController@preregistro')->name('index.preregistro');
Route::post('/preregistro','HomeController@save')->name('index.preregistro_post');






