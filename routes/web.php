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

// Роуты для Песочницы
Route::get('/sandbox/index', 'SandboxController@index');
Route::get('/sandbox/avarkom', 'SandboxController@avarkom');
Route::get('/sandbox/removeDicti', 'SandboxController@removeDicti');
Route::get('/inspection/storage', 'PreInsuranceInspectionController@storage')->name('inspection.storage');

Route::get('/sendNotification', 'NotificationController@sendNotify');

Route::group(['domain' => env('BACKEND_DOMAIN', 'my-admin.cic.kz')], function () {
    Route::get('/dima', 'Admin\SiteController@dimaAdmin');
    Route::get('/', 'Admin\SiteController@showLoginForm');
    Route::post('/login', 'Admin\SiteController@checkLogin');
    Route::group(['middleware' => ['checkAuth', 'checkSession', 'checkAdminAuth']], function () {
        Route::get('index', 'Admin\SiteController@index');
        Route::get('/logout', 'SiteController@logout');
        Route::post('/getFullBranch', 'SiteController@getFullBranch');
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
            Route::post('parse/get/companies', 'ParseController@getCompaniesList');

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
            Route::get('/parse/add/info', 'ParseController@getAddInfo')->name('parse.add.info');
            Route::post('/parse/add/info', 'ParseController@postAddInfo');
        });

        Route::group(['middleware' => 'okAdmin'], function () {
            Route::get('/centcoins/list', 'Admin\CentcoinsController@getListView')->name('centcoins.list');
            Route::get('/centcoins/replenish', 'Admin\CentcoinsController@getReplenishView')
                ->name('centcoins.replenish');
            Route::get('/centcoins/spend', 'Admin\CentcoinsController@getSpendView')->name('centcoins.spend');
            Route::get('/centcoins/history', 'Admin\CentcoinsController@getHistoryView')->name('centcoins.history');
            Route::get('/centcoins/items', 'Admin\CentcoinsController@getItemsView')->name('centcoins.items');


            Route::post('/centcoins/userList', 'Admin\CentcoinsController@getUserList');
            Route::post('/centcoins/historyList', 'Admin\CentcoinsController@getHistoryList');
            Route::post('/centcoins/addCoins', 'Admin\CentcoinsController@addCoins');
            Route::post('/centcoins/spendCoins', 'Admin\CentcoinsController@spendCoins');
            Route::post('/centcoins/addItem', 'Admin\CentcoinsController@addItem');

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
            Route::post('wnd/delete/svg', 'Admin\DocumentationController@deleteSvg');

            Route::get('wnd/word/list', 'Admin\DocumentationController@wordList')->name('wnd.word.list');
            Route::post('wnd/get/wordList', 'Admin\DocumentationController@getWordList');
            Route::post('wnd/delete/word', 'Admin\DocumentationController@deleteWord');

            Route::get('wnd/menu/list', 'Admin\DocumentationController@menuList')->name('wnd.menu.list');
            Route::post('wnd/get/menuList', 'Admin\DocumentationController@getMenuList');
            Route::post('wnd/delete/menu', 'Admin\DocumentationController@deleteMenu');

            Route::get('wnd/pdf', 'Admin\DocumentationController@loadPdf')->name('wnd.pdf');
            Route::post('wnd/save_pdf', 'Admin\DocumentationController@savePdf');
        });

        Route::group(['middleware' => 'senateAdmin'], function () {
            Route::get('senate/post/new', 'Admin\SenateController@newPost')->name('senate.post.new');
            Route::post('senate/new/post', 'Admin\SenateController@savePostData');
        });

        Route::group(['middleware' => 'readingClubAdmin'], function () {
            Route::get('rclub/post/new', 'Admin\ReadingClubController@newPost')->name('reading.post.new');
            Route::post('rclub/new/post', 'Admin\ReadingClubController@savePostData');
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
    Route::get('getModerators', 'SiteController@getModerators');
    Route::post('/getBirthdays', 'SiteController@getBirthdays');

    Route::group(['middleware' => ['checkAuth', 'checkSession']], function () {
        Route::post('/simpleInfo', 'SiteController@postSimpleInfo');
        Route::post('/getBranchData', 'SiteController@postBranchData');
        Route::get('/getAttachment/{ISN}/{REFISN}/{PICTTYPE}', 'SiteController@getAttachment');
        Route::get('/getPrintableDocument/{ISN}/{TEMPLATE}/{CLASS}', 'SiteController@getPrintableDocument');
        Route::post('/getMonthLabels', 'SiteController@getMonthLabel');
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
        Route::get('/documentation/a', 'DocumentationController@index')->name('documentation');
        Route::post('/documentation/save', 'DocumentationController@save');
        Route::get('/documentation/svg', 'DocumentationController@admin')->name('admin/documentation');
        //DOCUMENTATION
        Route::get('/documentation/{url}', 'DocumentationController@getByUrl');
        Route::post('/documentation/search', 'DocumentationController@search');
        //PARSE
        Route::get('parse/company', 'ParseController@getCompanyTopSum')->name('parse/company');
        Route::get('parse/product', 'ParseController@getClassTopSum')->name('parse/class');
        Route::get('parse/finance', 'ParseController@getFinancialIndicators')->name('parse/finance');
        Route::get('parse', 'ParseController@redirectToCompany')->name('parse');

        Route::get('parse/table-opu', 'ParseController@getOpuTable')->name('parse/table-opu');  // opu
        Route::get('parse/table-indicators', 'ParseController@getIndicatorsTable')->name('parse/table-indicators');
        Route::get('parse/table-info', 'ParseController@getInfoTable')->name('parse/table-info'); //info

        //TODO : create 3 get routes for OPU, Balance, Info. Use 3 Post routes for get data
        Route::get('/parse/getCurrentPeriods/{type}', ['uses' => 'ParseController@getCurrentPeriods']);
        Route::get('/parse/getCompanies', 'ParseController@getCompanies');
        Route::post('/parse/opu/getData', 'ParseController@getOpuTopSum');
        Route::post('/parse/balance/getData', 'ParseController@getBalanceTopSum');
        Route::post('/parse/info/getData', 'ParseController@getCompanyInfo');
        //CENTCOINS
        Route::group(['middleware' => 'centcoinExcepts'], function () {
            Route::get('/centcoins', 'CentcoinsController@getView')->name('centcoins');
            Route::get('/spendCentcoins', 'CentcoinsController@spendCentcoinsView');
            Route::post('/getOperationsList', 'CentcoinsController@getOperationsList');
            Route::post('/getCentcoins', 'CentcoinsController@getCentcoins');
            Route::post('/getItemsStorage', 'CentcoinsController@getItemsStorage');
            Route::post('/buyItem', 'CentcoinsController@buyItem');
        });

        Route::get('test/eds', 'Controller@testEds');
//        Route::group(['middleware' => 'cors'], function() {
//            Route::get('/getVersion', 'Controller@getVersion');
//        });
        Route::get('/getEDS', 'Controller@getEds');
        //NEWS
        Route::get('/news', 'NewsController@getView')->name('news');
        Route::post('/addPost', 'NewsController@addPost');
        Route::post('/news-birthday', 'NewsController@birthday');
        Route::post('/getPosts', 'NewsController@getPosts');
        Route::post('/deletePost', 'NewsController@deletePost');
        Route::post('/setPinned', 'NewsController@setPinned');
        Route::post('/unsetPinned', 'NewsController@unsetPinned');
        Route::post('/likePost', 'NewsController@likePost');
        Route::post('/editPost', 'NewsController@editPost');
        Route::post('/addComment', 'NewsController@addComment');
        Route::post('/deleteComment', 'NewsController@deleteComment');
        Route::post('/editComment', 'NewsController@editComment');
        //RATING
        Route::get('/rating', 'RatingController@index')->name('rating');
        Route::post('/getRatingList', 'RatingController@getRatingList');
        //COLLEAGUES
        Route::get('/colleagues', 'ColleaguesController@index')->name('colleagues');
        Route::post('/colleagues/search', 'ColleaguesController@search');
        Route::get('/colleagues/{ISN}', 'ColleaguesController@redirectToDossier');
        Route::get('/colleagues/{ISN}/dossier', 'ColleaguesController@showPageByIsn');
        Route::get('/colleagues/{ISN}/rating', 'ColleaguesController@showRatingByIsn');
        Route::get('/colleagues/{ISN}/motivation', 'ColleaguesController@showMotivationByIsn');
        Route::get('/colleagues/{ISN}/report', 'ColleaguesController@showReportByIsn');
        Route::get('/colleagues/{ISN}/centcoins', 'ColleaguesController@showCentcoinsByIsn');
        //UNTITLED
        Route::get('/name', 'NameController@getView')->name('documentation');
        Route::post('/getItemsList', 'NameController@getItemsList');

        Route::get('/report', 'ReportController@index')->name('report');
        Route::post('/getReport', 'ReportController@getReport');

        Route::post('/getSearchBranch', 'SiteController@getBranchSearch');

        Route::get('/logout', 'SiteController@logout');
        //MOTIVATION
        Route::get('motivation_main', 'MotivationController@motivation')->name('motivation_main');
        // MOBILE
        Route::get('mobile/login', 'ParseController@getLoginMobile')->name('mobile/login');
        Route::get('mobile/dossier', 'ParseController@getDossierMobile')->name('mobile/dossier');
        Route::get('mobile/matching', 'ParseController@getMatchingMobile')->name('mobile/matching');
        Route::get('mobile/matching-index', 'ParseController@getMatchingIndexMobile')->name('mobile/matching-index');
        Route::get('parse/parse', 'ParseController@getTest')->name('parse/parse');
        Route::get('parse/main-data', 'ParseController@getMainData')->name('parse/main-data');
        Route::get('parse/top-classes', 'ParseController@getTopClasses')->name('parse/top-classes');

        Route::post('/getUsersData', 'SiteController@getUserData');
        Route::post('/getColleagueData', 'SiteController@getColleagueData');

        Route::get('/motivation', 'MotivationController@motivation');
        Route::post('/getMotivationList', 'MotivationController@getMotivationList');

        Route::post('/setToken', 'NotificationController@setToken');
        //PreInsuranceInspection
        Route::get('insurance/inspection', 'PreInsuranceInspectionController@index')->name('insurance/inspection');
        Route::get('insurance/inspection/{isn}', 'PreInsuranceInspectionController@show')
            ->name('insurance/inspection/show');
        Route::post('getInsuranceInspectionList', 'PreInsuranceInspectionController@getInsuranceInspectionList');
        Route::post('getInsuranceInspectionInfo', 'PreInsuranceInspectionController@getInsuranceInspectionInfo');
        Route::post('setInspection', 'PreInsuranceInspectionController@setInspection');
        Route::post('upload', 'PreInsuranceInspectionController@upload');
        Route::post('updateStatus', 'PreInsuranceInspectionController@updateStatus');
        Route::post('getOperator', 'PreInsuranceInspectionController@getOperator');
    });
});
Route::group(['domain' => env('PARSE_DOMAIN', 'parse.cic.kz')], function () {
    Route::get('/', 'SiteController@parseAuth');
    Route::post('/login', 'SiteController@parseLogin');

    Route::group(['middleware' => 'parseDomainAuth'], function () {
        Route::get('parse/company', 'ParseController@getCompanyTopSum');
        Route::get('parse/product', 'ParseController@getClassTopSum');
        Route::get('parse/finance', 'ParseController@getFinancialIndicators');
        Route::get('parse', 'ParseController@redirectToCompany');
        Route::get('parse/table-fees', 'ParseController@getFees');
        Route::get('parse/table-indicators', 'ParseController@getIndicators');
        Route::get('parse/table-competitors', 'ParseController@getCompetitors');
    });
});
//RELOG
Route::post('/relog/saveRelogImages', 'RelogController@saveRelogImages');
Route::post('/car/addPrice', 'SiteController@addPrice');
Route::post('/coordination/notify', 'CoordinationController@sendNotify');
Route::post('/newpost/closedecade', 'CoordinationController@closeDecade');
Route::get('/kolesa/marks', 'SiteController@getMarks');
Route::get('/kolesa/models', 'SiteController@getModels');
Route::get('/kolesa/prices', 'SiteController@getPrices');
//Route::get('test', 'Admin\SiteController@getModelss');
Route::post('/kolesa/getPrice', 'SiteController@getPriceByData');

Route::get('test', function () {
    return view('test');
});
