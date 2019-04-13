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

// Route::get('/', function () {
//    return view('home');
// });

//Route::get('contacto', ['as' => 'Contactos', function () {
//    return view("contactos");
//}]);

// Route::get('saludos/{nombre?}', ['as' => 'saludos', function ($nombre = 'Invitado') {
// 	$consolas = [
// 		"Play Station 4",
// 		"Xbox one",
// 		"Wii U"
// 	];
//     return view("saludo",compact('nombre','consolas'));
// }]);

 // Route::get('test',function (){
 	// $user= new App\User;
 	// $user->name='Marco';
 	// $user->email='masmctt@gmail.com';
 	// $user->password=bcrypt('123123');
 	// $user->save();

 	// $user= new App\User;
 	// $user->name='estudiante';
 	// $user->email='estudiante@gmail.com';
 	// $user->password=bcrypt('123123');
 	// $user->save();
 	// $user= new App\User;
 	// $user->name='moderador';
 	// $user->email='moderador@gmail.com';
 	// $user->password=bcrypt('123123');
 	// $user->save();

 	// $user= new App\User;
 	// $user->name='OtroAdmin';
 	// $user->email='otroadmin@gmail.com';
 	// $user->password=bcrypt('123123');
 	// $user->save();

 // 	return $user;

 // });
route::resource('division','DivisionController');
route::get('areas/{id}','DivisionController@getAreas');
Route::get('pruebas',function(){
	return view('pruebas');
});
 Route::get('role',function ()
 {
 	// return \App\Role::all();
 	return \App\Role::with('user')->get();
 });
 Route::get('/', ['as' => 'home', 'uses' => 'PagesController@home']);
Route::get('/home', ['as' => 'homes', 'uses' => 'PagesController@home']);

 Route::get('saludos/{nombre?}', ['as' => 'saludos', 'uses' => 'PagesController@saludo'])->where('nombre',"[A-Za-z]+");

 Route::resource('mensajes','MessagesController');
Route::resource('usuarios','UsersController');


 Route::get('login',['as' => 'login', 'uses' => 'Auth\LoginController@showLoginForm']);
 Route::post('login','Auth\LoginController@login');
Route::get('logout','Auth\LoginController@logout');

 // Route::get('mensajes', ['as' => 'messages.index', 'uses' => 'MessagesController@index']);
 // Route::get('mensajes/create', ['as' => 'messages.create', 'uses' => 'MessagesController@create']);
 // Route::post('mensajes',['as' => 'messages.store','uses' => 'MessagesController@store']);
 // Route::get('mensajes/{id}', ['as' => 'messages.show', 'uses' => 'MessagesController@show']);
 // Route::get('mensajes/{id}/edit', ['as' => 'messages.edit', 'uses' => 'MessagesController@edit']);
 // Route::put('mensajes/{id}', ['as' => 'messages.update', 'uses' => 'MessagesController@update']);
 // Route::delete('mensajes/{id}', ['as' => 'messages.destroy', 'uses' => 'MessagesController@destroy']);


