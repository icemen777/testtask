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

Route::get ('/', ['uses'=>'ProductsController@home', 'as'=>'home']);


Route::get ('/product/{id}', ['uses'=>'ProductsController@ProductPage', 'as'=>'productPage']);

Route::get ("/products", ['uses'=>'ProductsController@sorter', 'as'=>'products']);






Route::get ("/cart", ['uses'=>'CartController@index', 'as'=>'YourCart']);

Route::get ("/clear_cart", ['uses'=>'CartController@ClearCart', 'as'=>'ClearCart']);

Route::post ("/cart/toggle/add", ['uses'=>'CartController@Add', 'as'=>'AddToCart']);
Route::post ("/cart/toggle/del", ['uses'=>'CartController@Del', 'as'=>'DelInCart']);





//На всякий случай, чтобы меню в шапке не пустовало)
Route::get ('/contacts', ['uses'=>'ProductsController@index', 'as'=>'contact']);
