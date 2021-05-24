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
/*
Route::get('/', function () {
    return view('login');
});
*/
Route::get('/', 'UserController@login');
//Route::get('pelada/list', 'PeladaController@listFunc')->name('listFunc');
Route::get('pelada/new', 'PeladaController@new')->name('new');

Route::get('pelada/listFilter', 'PeladaController@buscaPelada')->name('buscaPeladas');
Route::post('user/loading', 'UserController@loading')->name('loading');
Route::get('user/new', 'UserController@create' )->name('display_register');
Route::post('user/auth', 'UserController@authenticate' )->name('auth_user');
Route::post('user/new', 'UserController@register' )->name('save_user');

