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
/**
 * ADMIN PANEL
 * add local url to .env BACKEND_DOMAIN
 */
Route::group(['domain' => env('BACKEND_DOMAIN', 'my-admin.cic.kz')], function () {
    Route::get('/','Admin\SiteController@showLoginForm');
    Route::post('/login','Admin\SiteController@checkLogin');
    Route::group(['middleware' => ['checkAuth','checkSession','checkAdminAuth']], function (){
        Route::get('index', 'Admin\SiteController@index');
        Route::get('/logout', function (){
            Auth::logout();
            return redirect('/');
        });
        Route::post('/getBranchData', 'SiteController@postBranchData');
        Route::post('/getMonthLabels', 'SiteController@getMonthLabel');
        Route::post('/getCompanyList', 'ParseController@getCompanyListAxios');
        Route::post('/getProductList', 'ParseController@getProductListAxios');

        Route::group(['middleware' => 'superAdmin'], function () {
            Route::get('/role/dictionary', 'Admin\RoleController@dictiView')->name('role.dicti.list');
            Route::post('/role/getList', 'Admin\RoleController@getDictiList');
            Route::get('/role/permission', 'Admin\RoleController@permissionView')->name('role.permission.list');
            Route::post('/role/getUserList', 'Admin\RoleController@getPermittedUsers');
            Route::get('/role/newUser', 'Admin\RoleController@newUserView');
            Route::post('/role/getRoles', 'Admin\RoleController@getRoles');
            Route::post('/role/setNewUser', 'Admin\RoleController@newUser');
        });

        Route::group(['middleware' => 'parseAdmin'], function () {
            Route::get('parse/add', 'ParseController@index')->name('parse.upload');
            Route::post('parse/upload', 'ParseController@upload');
            Route::post('parse/getDocTypes', 'ParseController@getDocTypes');

            Route::get('parse/add/company', 'ParseController@getAddCompany')->name('parse.add.company');
            Route::post('parse/add/company', 'ParseController@postAddCompany');
            Route::get('parse/add/product', 'ParseController@getAddProduct')->name('parse.add.product');
            Route::post('parse/add/product', 'ParseController@postAddProduct');
            Route::get('parse/edit/company', 'ParseController@getEditCompany')->name('parse.edit.company');
            Route::post('parse/edit/company', 'ParseController@postEditCompany');
            Route::get('parse/edit/product', 'ParseController@getEditProduct')->name('parse.edit.product');
            Route::post('parse/edit/product', 'ParseController@postEditProduct');
            Route::get('parse/load/data', 'ParseController@getLoadView')->name('parse.load.data');
            Route::post('parse/delete/data', 'ParseController@postDeleteData');
            Route::post('parse/get/data', 'ParseController@getLoadedData');
        });

        Route::group(['middleware' => 'okAdmin'], function (){
            Route::get('/centcoins/list', 'Admin\CentcoinsController@getListView')->name('centcoins.list');
            Route::get('/centcoins/replenish', 'Admin\CentcoinsController@getReplenishView')->name('centcoins.replenish');
            Route::get('/centcoins/spend', 'Admin\CentcoinsController@getSpendView')->name('centcoins.spend');
            Route::get('/centcoins/history', 'Admin\CentcoinsController@getHistoryView')->name('centcoins.history');

            Route::post('/centcoins/userList', 'Admin\CentcoinsController@getUserList');
            Route::post('/centcoins/historyList', 'Admin\CentcoinsController@getHistoryList');
            Route::post('/centcoins/addCoins', 'Admin\CentcoinsController@addCoins');
            Route::post('/centcoins/spendCoins', 'Admin\CentcoinsController@spendCoins');

        });

        Route::group(['middleware' => 'wndAdmin'], function () {
            Route::get('wnd/org_structure', 'Admin\DocumentationController@orgStructure')->name('wnd.org');
            Route::post('wnd/save_struct', 'Admin\DocumentationController@saveStructure');

            Route::get('wnd/svg', 'Admin\DocumentationController@loadSvg')->name('wnd.svg');
            Route::post('wnd/save_svg', 'Admin\DocumentationController@saveSvg');

            Route::get('wnd/word', 'Admin\DocumentationController@loadWord')->name('wnd.word');
            Route::post('wnd/save_word', 'Admin\DocumentationController@saveWord');

            Route::get('wnd/image', 'Admin\DocumentationController@loadImage')->name('wnd.image');
            Route::post('wnd/save_image', 'Admin\DocumentationController@saveImage');

            Route::get('wnd/menu', 'Admin\DocumentationController@menu')->name('wnd.menu');
            Route::post('wnd/save_menu', 'Admin\DocumentationController@saveMenu');
            Route::post('wnd/list_menu', 'Admin\DocumentationController@listMenu');

            Route::get('wnd/svg/list', 'Admin\DocumentationController@svgList')->name('wnd.svg.list');
            Route::post('wnd/get/svgList', 'Admin\DocumentationController@getSvgList');

            Route::get('wnd/word/list', 'Admin\DocumentationController@wordList')->name('wnd.word.list');
            Route::post('wnd/get/wordList', 'Admin\DocumentationController@getWordList');

            Route::get('wnd/menu/list', 'Admin\DocumentationController@menuList')->name('wnd.menu.list');
            Route::post('wnd/get/menuList', 'Admin\DocumentationController@getMenuList');
        });
    });
});

/**
 * FRONTEND APP
 * add local url to .env FRONTEND_DOMAIN
 */
Route::group(['domain' => env('FRONTEND_DOMAIN', 'my.cic.kz')], function () {
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

        //DOCUMENTATION ADMIN MIDDLEWARE
        Route::get('/documentation/', 'DocumentationController@index')->name('documentation');
        Route::post('/documentation/save', 'DocumentationController@save');
        Route::get('/documentation/svg', 'DocumentationController@admin')->name('admin/documentation');

        //DOCUMENTATION
        Route::get('/documentation/{url}', 'DocumentationController@getByUrl');
        Route::post('/documentation/search', 'DocumentationController@search');
        //PARSE
        Route::get('parse/company', 'ParseController@getCompanyTopSum')->name('parse/company');
        Route::get('parse/product', 'ParseController@getClassTopSum')->name('parse/class');
        Route::get('parse/finance', 'ParseController@getFinancialIndicators')->name('parse/finance');
        Route::get('parse', function (){
            return redirect(route('parse/company'));
        })->name('parse');

    Route::get('/centcoins', 'CentcoinsController@getView')->name('centcoins');
    Route::get('/spendCentcoins', 'CentcoinsController@spendCentcoinsView');
    Route::post('/getOperationsList', 'CentcoinsController@getOperationsList');
    Route::post('/getCentcoins', 'CentcoinsController@getCentcoins');
    Route::post('/getItemsStorage', 'CentcoinsController@getItemsStorage');
    Route::post('/buyItem', 'CentcoinsController@buyItem');

    Route::get('/news', 'NewsController@getView')->name('news');
    Route::post('/addPost', 'NewsController@addPost');
    Route::post('/getPosts', 'NewsController@getPosts');
    Route::post('/deletePost', 'NewsController@deletePost');
    Route::post('/setPinned', 'NewsController@setPinned');
    Route::post('/unsetPinned', 'NewsController@unsetPinned');
    Route::post('/likePost', 'NewsController@likePost');
    Route::post('/editPost', 'NewsController@editPost');
    Route::post('/addComment', 'NewsController@addComment');

    //UNTITLED
    Route::get('/name', 'NameController@getView')->name('name');
    Route::post('/getItemsList', 'NameController@getItemsList');

    Route::get('/logout', function (){
        Auth::logout();
        return redirect(route('index'));
    });

        Route::post('/getUsersData', 'SiteController@getUserData');


//        Route::get('/motivation', 'SiteController@motivation');
    });
});

//RELOG
Route::post('/relog/saveRelogImages', 'RelogController@saveRelogImages');
