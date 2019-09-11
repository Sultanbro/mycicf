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

Route::get('/cabinet', function (){
    echo \Illuminate\Support\Facades\Auth::user()->short_name;
});

Route::get('test', function (){
   return view('test');
});

Route::post('/emplInfo', 'SiteController@postEmplInfo');

Route::post('/simpleInfo', 'SiteController@postSimpleInfo');

Route::get('/testview', function(){
   return view('layouts.treeview');
});

Route::post('/getBranchData', 'SiteController@postBranchData');

Route::get('/logout', function (){
    Auth::logout();
    return redirect('/');
});