<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('/loguin', 'UserController@authenticate')->name('users.authenticate');
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/usuarios', 'UserController@index')->name('users.index');

Route::get('/usuarios/{user}', 'UserController@show')
	->where('user', '[0-9]+')->name('users.show');

// Route::get('usuarios/{id}', 'UserController@show')
// 	->where('id','[0-9]+')
// 	->name('users.show');

Route::get('/', 'UserController@create')->name('users.create'); //apunta al formulario para crear usuario

Route::group(['middleware' => ['jwt.verify'],'prefix'=>'v1'], function(){
	Route::get('/usuarios/{user}/editar', 'UserController@edit')->name('users.edit');
	Route::delete('/usuarios/{user}', 'UserController@destroy')->name('users.destroy');
	Route::post('/usuarios/crear', 'UserController@store');
	Route::put('/usuarios/{user}', 'UserController@update')->name('users.update');
});

// Route::get('/usuarios/{user}/editar', 'UserController@edit')->name('users.edit');
// 	Route::delete('/usuarios/{user}', 'UserController@destroy')->name('users.destroy');
// 	Route::post('/usuarios/crear', 'UserController@store');
// 	Route::put('/usuarios/{user}', 'UserController@update')->name('users.update');
