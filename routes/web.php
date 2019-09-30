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

Route::get('/', 'SiteController@getIndex');
Route::post('/login', 'SiteController@postLogin');

Route::group(['middleware' => ['checkAuth', 'checkSession']], function () {
    Route::post('/simpleInfo', 'SiteController@postSimpleInfo');
    Route::post('/getBranchData', 'SiteController@postBranchData');

    //DOSSIER
    Route::post('/emplInfo', 'SiteController@postEmplInfo');
    Route::get('/dossier', 'SiteController@dossier');

    //COORIDNATION
    Route::get('/coordination', 'CoordinationController@index');
    Route::post('/getCoordinationList', 'CoordinationController@getCoordinationList');

    //DOCUMENTATION
    Route::get('/documentation/', 'DocumentationController@index');
    Route::get('/documentation/{url}', 'DocumentationController@getByUrl');
    Route::post('/documentation/save', 'DocumentationController@save');
    Route::post('/documentation/search', 'DocumentationController@search');
});

Route::get('/logout', function (){
    Auth::logout();
    return redirect('/');
});


