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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', function(){
    return 'Pantalla principal';
});
Route::get( 'login', function(){
    return 'Login usuario';
} );
Route::get( 'logout', function(){
    return 'Logout usuario';
} );
Route::get( 'catalog', function(){
    return 'Listado peliculas';
} );
Route::get( 'catalog/show/{id}', function($id){
    return "Vista detalle pelicula $id";
} );
Route::get( 'catalog/create', function(){
    return "Alñadir pelicula";
} );
Route::get( 'catalog/edir/{id}', function($id){
    return "Modificar pelicula $id";
} );