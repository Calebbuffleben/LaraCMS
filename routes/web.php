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

/* Route::group(['prefix' => 'painel'], function(){
	Route::get('/painel', 'Painel\PainelController@index');
}); */


Route::get('/home', 'Site\HomeController@index')->name('home');
Route::get('/', 'Site\HomeController@index')->name('home');

Auth::routes();

//Dashboard
Route::get('/dashboard', 'Dashboard\PainelController@index');

//Posts
Route::get('/posts', 'Dashboard\PostController@index');
Route::get('/post/add', 'Dashboard\PostController@add');
Route::post('/post/store', 'Dashboard\PostController@store');
Route::get('/post/edit/{id}', 'Dashboard\PostController@edit');
Route::put('/posts/update/{id}', 'Dashboard\PostController@update');
Route::post('/posts/update/{id}', 'Dashboard\PostController@update');
Route::delete('/post/delete/{id}', 'Dashboard\PostController@destroy');
//Route::get('/roles-permissions', 'HomeController@rolesPermissions');

//Permissions
Route::get('/permissions', 'Dashboard\PermissionController@index');
Route::get('/permission/roles/{id}', 'Dashboard\PermissionController@roles');
Route::delete('/permission/detach/{id}', 'Dashboard\PermissionController@detach');


//Roles
Route::get('/roles', 'Dashboard\RoleController@index');
Route::get('/role/permissions/{id}', 'Dashboard\RoleController@permissions');
Route::get('/role/create', 'Dashboard\RoleController@create');
Route::post('/role/store', 'Dashboard\RoleController@store');
Route::get('/role/edit/{id}', 'Dashboard\RoleController@edit');
Route::put('/role/update/{id}', 'Dashboard\RoleController@update');
Route::post('/role/update/{id}', 'Dashboard\RoleController@update');
Route::delete('/role/delete/{id}', 'Dashboard\RoleController@destroy');
Route::delete('/role/detach/{id}', 'Dashboard\RoleController@detach');

//Users
Route::get('/users', 'Dashboard\UserController@index');
Route::get('/user/roles/{id}', 'Dashboard\UserController@roles');
Route::get('/user/create', 'Dashboard\UserController@create');
Route::post('/user/store', 'Dashboard\UserController@store');
Route::get('/user/edit/{id}', 'Dashboard\UserController@edit');
Route::put('/user/update/{id}', 'Dashboard\UserController@update');
Route::post('/user/update/{id}', 'Dashboard\UserController@update');
Route::delete('/user/delete/{id}', 'Dashboard\UserController@destroy');
