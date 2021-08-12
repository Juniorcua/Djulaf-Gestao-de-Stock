<?php

use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

Auth::routes();



#===================Caixa Routes===============
Route::group([
    'middleware' => [
        'auth', 'auth.caixa'
    ]
], function () {
    Route::get('/home', 'HomeController@index')->name('home');


});
#==================={End Caixa Routes}===============

#====================Admin Routes ====================
Route::group([
    'middleware' => [
        'auth', 'auth.admin'
    ]
], function () {



});
#==================={End Admin Routes}===============


#============SuperAdmin Routes =======================
Route::group([
    'middleware' => [
        'auth', 'auth.superadmin'
    ]
], function () {



});

#==================={End SuperAdmin Routes}===============

Route::get('/cliente/create','ClienteController@create');
Route::get('/cliente/show/{cliente?}','ClienteController@show');
Route::get('/vasilhame/create','vasilhameController@create');
Route::post('/cliente/save','ClienteController@save');
Route::post('/cliente/update/{cliente}','ClienteController@update');
Route::get('/cliente/delete/{cliente}/{status}','ClienteController@destroy');
Route::get('/clienteshow/delete/{cliente}/{status}','ClienteController@destroyshow');

//campo fornecedores
Route::get('/index','FornecedorController@index');

//Campo das categorias
Route::get('/categoria/create','CategoriaController@create');
Route::get('/categoria/show/{categoria?}','CategoriaController@show');
Route::post('/categoria/save','CategoriaController@save');
Route::post('/categoria/update/{categoria}','CategoriaController@update');
Route::get('/categoria/delete/{categoria}/{status}','CategoriaController@destroy');
Route::get('/categoriashow/delete/{categoria}/{status}','CategoriaController@destroyshow');

//Campo dos medicamentos
Route::get('/medicamento/create','medicamentoController@create');
Route::get('/medicamento/show/{medicamento?}','MedicamentoController@show');
Route::post('/medicamentos/show/{medicamento?}','MedicamentoController@show');
Route::post('/medicamento/save','MedicamentoController@save');
Route::post('/medicamento/update/{medicamento}','MedicamentoController@update');
Route::get('/medicamento/delete/{medicamento}/{status}','MedicamentoController@destroy');
Route::get('/medicamentocreate/delete/{medicamento}/{status}','MedicamentoController@destroycreate');

//Campo das farmacias
Route::get('/farmacia/create','farmaciaController@create');
Route::get('/farmacia/perfil/{id}','farmaciaController@perfil');
Route::get('/farmacia/show/{farmacia?}','farmaciaController@show');
Route::post('/farmacia/show/{farmacia?}','farmaciaController@show');
Route::post('/farmacia/save','farmaciaController@save');
Route::post('/farmacia/update/{farmacia}','farmaciaController@update');
Route::post('/farmacia/updatePerfil/{farmacia}','farmaciaController@updateFM');
Route::get('/farmacia/delete/{farmacia}/{status}','farmaciaController@destroy');

//Campo das provincias
Route::get('/provincia/create','ProvinciaController@create');
Route::get('/provincia/show/{provinvia?}','ProvinciaController@show');
Route::post('/provincia/save','ProvinciaController@save');
Route::post('/provincia/edit/{provincia}','ProvinciaController@edit');
Route::get('/provincia/delete/{provincia}/{status}','ProvinciaController@destroy');
Route::get('/provinciashow/delete/{provincia}/{status}','ProvinciaController@destroyshow');

//Campo Tipopagamento
Route::get('/tipoPagamento/create','TipoPagamentoController@create');
Route::get('/tipoPagamento/show/{tipoPagamento?}','TipoPagamentoController@show');
Route::post('/tipoPagamento/save','TipoPagamentoController@save');
Route::post('/tipoPagamento/edit/{tipoPagamento}','TipoPagamentoController@edit');
Route::get('/tipoPagamento/delete/{tipoPagamento}','TipoPagamentoController@destroy');

//Campo fornecedor
Route::get('/fornecedor/create','FornecedorController@create');
Route::get('/fornecedor/show/{fornecedor?}','FornecedorController@show');
Route::post('/fornecedor/save','FornecedorController@save');
Route::post('/fornecedor/edit/{fornecedor}','FornecedorController@edit');
Route::get('/fornecedor/delete/{fornecedor}/{status}','FornecedorController@destroy');
Route::get('/fornecedorshow/delete/{fornecedor}/{status}','FornecedorController@destroyshow');

//Campo do distrito
Route::get('/distrito/create','DistritoController@create');
Route::get('/distrito/show/{distrito?}','DistritoController@show');
Route::post('/distrito/show/{distrito?}','DistritoController@show');
Route::post('/distrito/save','DistritoController@save');
Route::post('/distrito/update/{distrito}','DistritoController@update');
Route::get('/distrito/delete/{distrito}/{status}','DistritoController@destroy');
Route::get('/distritoshow/delete/{distrito}/{status}','DistritoController@destroyshow');

//Campo do disponiblidade
Route::get('/dispo/show/{faramacia_id}','DisponibilidadeController@show');
Route::get('/dispo/store/{faramacia_id}','DisponibilidadeController@save');
// Route::post('/distrito/save','DisponibilidadeController@save');
Route::post('/distrito/update/{distrito}','DisponibilidadeController@update');



//Campo user locate
Route::get('/auth/locate','LocateController@create');
Route::post('/auth/save','LocateController@save');
Route::get('/auth/delete/{locate}','LocateController@destroy');





//campo perfil usuario
Route::get('/usuario/perfil','perfilController@create');
// Route::get('/usuario/perfil/{id}','farmaciaController@perfil');
// Route::get('/usuario/show/{farmacia?}','farmaciaController@show');


//campo horario
Route::get('/horario/create','HorarioController@create');
// Route::get('/horario/perfil/{id}','farmaciaController@perfil');
// Route::get('/horario/show/{farmacia?}','farmaciaController@show');


//campo perfil faramacia
Route::get('/fhome/create','FHomeController@create');
// Route::get('/horario/perfil/{id}','farmaciaController@perfil');
// Route::get('/horario/show/{farmacia?}','farmaciaController@show');



// Route::get('/medicamento/show/{medicamento?}','MedicamentoController@show');
// Route::post('/medicamentos/show/{medicamento?}','MedicamentoController@show');
// Route::post('/medicamento/save','MedicamentoController@save');
// Route::post('/medicamento/update/{medicamento}','MedicamentoController@update');
