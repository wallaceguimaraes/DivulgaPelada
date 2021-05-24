<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', 'UserController@register');
Route::post('login', 'UserController@authenticate');
Route::get('open', 'DataController@open');
Route::post('/', 'DataController@log');
Route::get('user/menu', 'UserController@openMenu')->name('openMenu');
Route::get('user/men', 'UserController@openMen')->name('openMen');
Route::post('auth/login', [DataController::class, 'login'])->name('login');
Route::post('pelada/newPelada', 'PeladaController@registerNew')->name('registerNew');
Route::post('pelada/new', 'PeladaController@register')->name('registerPelada');
Route::get('list/associate', 'UserPeladaController@associate')->name('associate');
Route::get('list/mypeladas', 'PeladaController@selecionaConv')->name('selecionaConv');
Route::get('list/users', 'UserController@displayUsers')->name('usersOn');
Route::get('list/usersSend', 'UserPeladaController@sendEnvite')->name('sendEnvite');
Route::get('list/envited', 'UserPeladaController@envited')->name('envited');
Route::get('list/listEnvite', 'UserPeladaController@listEnvite')->name('listEnvite');
Route::get('list/acceptEnvite', 'UserPeladaController@acceptEnvite')->name('acceptEnvite');
Route::get('list/deletetEnvite', 'UserPeladaController@deleteEnvite')->name('deleteEnvite');
Route::post('log', [DataController::class, 'sair'])->name('log'); 

Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('auth/me', [DataController::class, 'me']); 
    /** Encerra o acesso */
    /** Atualiza o token */
    Route::get('auth/refresh', [DataController::class, 'refresh']); 
    Route::post('user/', 'UserController@getAuthenticatedUser')->name('getAuth');
    Route::get('pelada/list', 'PeladaController@listEvent')->name('list');
    Route::get('pelada/new', 'PeladaController@create')->name('create');
    Route::get('list/users/select', 'UserPeladaController@envite')->name('envite');
    Route::get('closed', 'DataController@closed');
});