<?php

use Illuminate\Support\Facades\App;
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

Route::get('/', 'Articles@displayData' );

Route::get('/category/{code}', function (){

    $code = Route::current()->code;
    return App::call('App\Http\Controllers\Articles@fetchCategory' ,['code' => $code]);
});

Route::get('/author/{name}', function (){

    $name = Route::current()->name;
    return App::call('App\Http\Controllers\Articles@fetchAuthor' ,['id' => $name]);
});

Route::get('/article/{id}', function (){

    $id = Route::current()->id;
    return App::call('App\Http\Controllers\Articles@fetchArticle' ,['id' => $id]);
});
