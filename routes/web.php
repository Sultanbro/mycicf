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
    Route::get('/getAttachment/{ISN}/{REFISN}/{PICTTYPE}', 'SiteController@getAttachment');
    //DOSSIER
    Route::post('/emplInfo', 'SiteController@postEmplInfo');
    Route::get('/dossier', 'SiteController@dossier')->name('dossier');

    //COORIDNATION
    Route::get('/coordination', 'CoordinationController@index')->name('coordination');
    Route::post('/getCoordinationList', 'CoordinationController@getCoordinationList');
    Route::post('/getCoordinationInfo', 'CoordinationController@getCoordinationInfo');
    Route::post('/setCoordination', 'CoordinationController@setCoordination');
    Route::post('/getAttachmentList', 'CoordinationController@getAttachments');

    //DOCUMENTATION
    Route::get('/documentation/{url}', 'DocumentationController@getByUrl');
    Route::post('/documentation/search', 'DocumentationController@search');
    //DOCUMENTATION ADMIN MIDDLEWARE
    Route::get('/documentation/', 'DocumentationController@index')->name('documentation');
    Route::post('/documentation/save', 'DocumentationController@save');
    Route::get('/documentation/svg', 'DocumentationController@admin')->name('admin/documentation');
    //PARSE
    Route::get('parse/company', 'ParseController@getCompanyTopSum')->name('parse/company');
    Route::get('parse/product', 'ParseController@getClassTopSum')->name('parse/class');
    Route::get('parse/finance', 'ParseController@getFinancialIndicators')->name('parse/finance');
    Route::get('parse', function (){
        return redirect(route('parse/company'));
    })->name('parse');
    Route::group(['middleware' => 'parseAdmin'], function () {
        Route::get('parse/company_name', 'ParseController@company');
        Route::post('parse/add_name', 'ParseController@addname');

        Route::get('parse/add', 'ParseController@index');
        Route::post('parse/upload', 'ParseController@upload');

        Route::get('parse/add/company', 'ParseController@getAddCompany');
        Route::post('parse/add/company', 'ParseController@postAddCompany');
        Route::get('parse/add/product', 'ParseController@getAddProduct');
        Route::post('parse/add/product', 'ParseController@postAddProduct');
        Route::get('parse/edit/company', 'ParseController@getEditCompany');
        Route::post('parse/edit/company', 'ParseController@postEditCompany');
        Route::get('parse/edit/product', 'ParseController@getEditProduct');
        Route::post('parse/edit/product', 'ParseController@postEditProduct');
        Route::get('parse/load/data', 'ParseController@getLoadedData');
        Route::post('parse/delete/data', 'ParseController@postDeleteData');
    });

    Route::get('/centcoins', 'CentcoinsController@getView')->name('centcoins');
    Route::post('/getOperationsList', 'CentcoinsController@getOperationsList');
    Route::post('/getCentcoins', 'CentcoinsController@getCentcoins');

    Route::get('/news', 'NewsController@getView')->name('news');
    Route::post('/addPost', 'NewsController@addPost');
    Route::post('/getPosts', 'NewsController@getPosts');
    Route::post('/deletePost', 'NewsController@deletePost');
    Route::post('/setPinned', 'NewsController@setPinned');
    Route::post('/unsetPinned', 'NewsController@unsetPinned');
    Route::post('/likePost', 'NewsController@likePost');
    Route::post('/editPost', 'NewsController@editPost');

    Route::get('/logout', function (){
        Auth::logout();
        return redirect(route('index'));
    });
});

Route::get('m', 'SiteController@getMusic');