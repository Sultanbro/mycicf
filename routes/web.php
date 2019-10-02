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

Route::get('/', 'SiteController@getIndex')->name('index');
Route::post('/login', 'SiteController@postLogin');

Route::group(['middleware' => ['checkAuth', 'checkSession']], function () {
    Route::post('/simpleInfo', 'SiteController@postSimpleInfo');
    Route::post('/getBranchData', 'SiteController@postBranchData');

    //DOSSIER
    Route::post('/emplInfo', 'SiteController@postEmplInfo');
    Route::get('/dossier', 'SiteController@dossier')->name('dossier');

    //COORIDNATION
    Route::get('/coordination', 'CoordinationController@index')->name('coordination');
    Route::post('/getCoordinationList', 'CoordinationController@getCoordinationList');

    //DOCUMENTATION
    Route::get('/documentation/{url}', 'DocumentationController@getByUrl');
    Route::post('/documentation/search', 'DocumentationController@search');
    //DOCUMENTATION ADMIN MIDDLEWARE
    Route::get('/documentation/', 'DocumentationController@index')->name('admin/documentation');
    Route::post('/documentation/save', 'DocumentationController@save');
});

Route::get('/logout', function (){
    Auth::logout();
    return redirect('/');
});


