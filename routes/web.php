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
Route::post('/loguin', 'UserController@authenticate')->name('users.authenticate');
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

// Route::get('/', function () {
//  return view('welcome');
// //  route('users.index');
// route('users.index',['user'=>$user->id]);
// });

Route::get('/saludo/{name}/{nickname?}', 'WelcomeUserController');//llama al metodo __invoke
