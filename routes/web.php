<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



//GRUPO DE RUTAS UNIDAS A U N MIDDLEWARE.
Route::middleware(['auth'])->group(function () {
    //Roles
    Route::post('roles/store','RoleController@store')->name('roles.store')
    ->middleware('permission:roles.create');
    Route::get('roles', 'RoleController@index')->name('roles.index')
        ->middleware('permission:roles.index');
    Route::get('roles/create', 'RoleController@create')->name('roles.create')
        ->middleware('permission:roles.create');
    Route::get('roles/{role}', 'RoleController@update')->name('roles.update')
        ->middleware('permission:roles.edit');
    Route::get('roles/{role}', 'RoleController@show')->name('roles.show')
        ->middleware('permission:roles.show');
    Route::delete('roles/{role}', 'RoleController@destroy')->name('roles.destroy')
        ->middleware('permission:roles.destroy');
    Route::get('roles/{role}/edit', 'RoleController@edit')->name('roles.edit')
        ->middleware('permission:roles.edit');


    // PARA COMPROBAR POR ROL
    //PARA COMPROBAR CON PERMISOS SE UTILIZA @CAN en el FRONT.
    Route::get('encuestas', 'EncuestaController@index')->name('encuestas.index')
        ->middleware('has.role:directivo');
});

