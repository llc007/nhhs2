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

use Illuminate\Support\Facades\Storage;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/septimo', function () {
    return view('profeLuis/septimo');
});

Route::get('/upload/{file}', function ($file) {
    return Storage::download("public/upload/$file");
})->name('descargar');

//GRUPO DE RUTAS UNIDAS A U N MIDDLEWARE.
Route::middleware(['auth'])->group(function () {
    //Roles
//    Route::post('roles/store', 'RoleController@store')->name('roles.store')
//        ->middleware('permission:roles.create');
//    Route::get('roles', 'RoleController@index')->name('roles.index')
//        ->middleware('permission:roles.index');
//    Route::get('roles/create', 'RoleController@create')->name('roles.create')
//        ->middleware('permission:roles.create');
//    Route::get('roles/{role}', 'RoleController@update')->name('roles.update')
//        ->middleware('permission:roles.edit');
//    Route::get('roles/{role}', 'RoleController@show')->name('roles.show')
//        ->middleware('permission:roles.show');
//    Route::delete('roles/{role}', 'RoleController@destroy')->name('roles.destroy')
//        ->middleware('permission:roles.destroy');
//    Route::get('roles/{role}/edit', 'RoleController@edit')->name('roles.edit')
//        ->middleware('permission:roles.edit');
//
//    //RUTAS DE EVALUACION

    // PARA COMPROBAR POR ROL
    //PARA COMPROBAR CON PERMISOS SE UTILIZA @CAN en el FRONT.
    Route::get('evaluaciones', 'EvaluacionController@index')->name('evaluacion.index')
        ->middleware('has.role:directivo');

    Route::get('administrarevaluaciones', 'EvaluacionController@admin')->name('evaluacion.admin')
        ->middleware('has.role:directivo');

    Route::resources([
        'encuesta' => 'EvaluacionController',
    ]);

    Route::resource('preguntas', 'PreguntaController')->middleware('has.role:directivo');

    Route::resources([
        'clasificacion' => 'ClasificacionController',
    ]);


});


