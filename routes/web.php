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
    Route::post('/emplInfo', 'SiteController@postEmplInfo');
    Route::post('/simpleInfo', 'SiteController@postSimpleInfo');
    Route::post('/getBranchData', 'SiteController@postBranchData');

    Route::get('dossier', 'SiteController@dossier')->middleware(['checkAuth', 'checkSession']);
});

Route::get('/logout', function (){
    Auth::logout();
    return redirect('/');
});

Route::get('/centcoins', 'CentcoinsController@getView');

Route::post('/getOperationsList', 'CentcoinsController@getOperationsList');

Route::post('/getCentcoins', 'CentcoinsController@getCentcoins');

Route::post('/addPost', 'NewsController@addPost');

Route::get('/news', 'NewsController@getView');

Route::post('/getPosts', 'NewsController@getPosts');

Route::post('/deletePost', 'NewsController@deletePost');
Route::post('/setPinned', 'NewsController@setPinned');
Route::post('/unsetPinned', 'NewsController@unsetPinned');

Route::post('/likePost', 'NewsController@likePost');

Route::post('/editPost', 'NewsController@editPost');
