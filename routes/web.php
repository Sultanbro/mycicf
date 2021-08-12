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
Route::get('/sandbox/test', 'SandboxController@test');
Route::get('/sandbox/react', 'SandboxController@react');
Route::get('/sandbox/react2', 'SandboxController@react2');
Route::get('/sandbox/error', 'SandboxController@error');
Route::get('/sandbox/avarkom', 'SandboxController@avarkom');
Route::get('/sandbox/removeDicti', 'SandboxController@removeDicti');
Route::get('/inspection/storage', 'PreInsuranceInspectionController@storage')->name('inspection.storage');

Route::get('/sendNotification', 'NotificationController@sendNotify');
Route::post('/api/pwreset', 'ApiController@resetPassword');

Route::group(['domain' => env('BACKEND_DOMAIN', 'my-admin.cic.kz')], function () {
    Route::get('/dima', 'Admin\SiteController@dimaAdmin');
    Route::get('/', 'Admin\SiteController@showLoginForm');
    Route::post('/login', 'Admin\SiteController@checkLogin')->name('login');
    Route::post('/login', 'Admin\SiteController@checkLogin')->name('dusk.login');
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
            Route::get('/centcoins/report', 'Admin\CentcoinsController@getReport')->name('centcoins.report');


            Route::post('/centcoins/userList', 'Admin\CentcoinsController@getUserList');
            Route::post('/centcoins/historyList', 'Admin\CentcoinsController@getHistoryList');
            Route::post('/centcoins/addCoins', 'Admin\CentcoinsController@addCoins');
            Route::post('/centcoins/spendCoins', 'Admin\CentcoinsController@spendCoins');
            Route::post('/centcoins/spendCoinAll', 'Admin\CentcoinsController@spendCoinAll');
            Route::post('/centcoins/spendCoinData', 'Admin\CentcoinsController@spendCoinData');
            Route::post('/centcoins/addItem', 'Admin\CentcoinsController@addItem');
            Route::post('/centcoins/apply', 'Admin\CentcoinsController@getApply');
            Route::post('/apply/accept', 'Admin\CentcoinsController@getStatusAccept');
            Route::post('/apply/denied', 'Admin\CentcoinsController@getStatusDenied');
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

        Route::group(['middleware' => 'productsAdmin'], function(){
            Route::get('calc/express/create', 'ProductsController@createExpress')->name('create.express');
            Route::get('calc/express/edit/{id}', 'ProductsController@createEdit')->name('edit.express');
            Route::post('calc/express/create', 'ProductsController@setExpressData');
            Route::get('calc/express/list', 'ProductsController@listExpress')->name('list.express');
            Route::post('calc/express/list', 'ProductsController@getExpressList');

            Route::get('calc/full/create', 'ProductsController@createFullQuotation')->name('create.full');
            Route::post('calc/full/create', 'ProductsController@createFullProduct');
            Route::get('calc/full/list', 'ProductsController@listFullQuotation')->name('list.full');
            Route::post('calc/full/list', 'ProductsController@getFullQuotationList');
            Route::get('calc/full-constructor/{id}', 'ProductsController@getFullConstructor')->name('constructor.full');
            Route::post('calc/full-constructor', 'ProductsController@setFullConstructor');
            Route::post('calc/getDicti', 'ProductsController@getDicti');
            Route::post('/updateProductsDicti','ProductsController@updateProductsDicti');
        });

        Route::group(['middleware' => 'kurators'], function() {
            Route::get('/statistics/kurators', 'Admin\KuratorController@kuratorView')->name('statistics.kurator.list');
            Route::post('/statistics/getKuratorsList', 'Admin\KuratorController@getKuratorUsers');
            Route::get('/statistics/newUser', 'Admin\KuratorController@newUserView');
            Route::post('/statistics/getKurators', 'Admin\KuratorController@getKurators');
            Route::post('/statistics/setNewUser', 'Admin\KuratorController@newUser');
            Route::get('/statistics/delete/{kurators}', 'Admin\KuratorController@deleteById');
        });

        Route::group(['middleware' => 'ratingPermission'], function() {
            Route::get('/rating/kurators', 'Admin\RatingPermissionController@index')->name('rating.kurator.list');
            Route::post('/rating/getKuratorsList', 'Admin\RatingPermissionController@getKuratorUsers');
            Route::get('/rating/newUser', 'Admin\RatingPermissionController@newUserView');
            Route::post('/rating/getKurators', 'Admin\RatingPermissionController@getKurators');
            Route::post('/rating/setNewUser', 'Admin\RatingPermissionController@newUser');
            Route::get('/rating/delete/{kurators}', 'Admin\RatingPermissionController@deleteById');
        });

        Route::group(['middleware' => 'productsinfoAdmin'], function () {
            Route::get('producstinfo/org_structure', 'Admin\ProductsInfoController@orgStructure')->name('productsinfo.org');
            Route::post('productsinfo/save_struct', 'Admin\ProductsInfoController@saveStructure');

            Route::get('productsinfo/svg', 'Admin\ProductsInfoController@loadSvg')->name('productsinfo.svg');
            Route::post('productsinfo/save_svg', 'Admin\ProductsInfoController@saveSvg');

            Route::get('productsinfo/word', 'Admin\ProductsInfoController@loadWord')->name('productsinfo.word');
            Route::post('productsinfo/save_word', 'Admin\ProductsInfoController@saveWord');

            Route::get('productsinfo/image', 'Admin\ProductsInfoController@loadImage')->name('productsinfo.image');
            Route::post('productsinfo/save_image', 'Admin\ProductsInfoController@saveImage');

            Route::get('productsinfo/menu', 'Admin\ProductsInfoController@menu')->name('productsinfo.menu');
            Route::post('productsinfo/save_menu', 'Admin\ProductsInfoController@saveMenu');
            Route::post('productsinfo/list_menu', 'Admin\ProductsInfoController@listMenu');

            Route::get('productsinfo/svg/list', 'Admin\ProductsInfoController@svgList')->name('productsinfo.svg.list');
            Route::post('productsinfo/get/svgList', 'Admin\ProductsInfoController@getSvgList');
            Route::post('productsinfo/delete/svg', 'Admin\ProductsInfoController@deleteSvg');

            Route::get('productsinfo/word/list', 'Admin\ProductsInfoController@wordList')->name('productsinfo.word.list');
            Route::get('productsinfo/description/list', 'Admin\ProductsInfoController@descriptionList')->name('productsinfo.description.list');
            Route::post('productsinfo/get/descriptionList', 'Admin\ProductsInfoController@getDescriptionList');
            Route::post('productsinfo/delete/word', 'Admin\ProductsInfoController@deleteWord');

            Route::get('productsinfo/menu/list', 'Admin\ProductsInfoController@menuList')->name('productsinfo.menu.list');
            Route::post('productsinfo/get/menuList', 'Admin\ProductsInfoController@getMenuList');
            Route::post('/productsinfo/delete/menu', 'Admin\ProductsInfoController@deleteMenu');
            Route::post('/productsinfo/getEditMenu', 'Admin\ProductsInfoController@getEditMenu');
            Route::post('/productsinfo/deleteItem', 'Admin\ProductsInfoController@deleteItem');

            Route::get('productsinfo/pdf', 'Admin\ProductsInfoController@loadPdf')->name('productsinfo.pdf');
            Route::post('productsinfo/save_pdf', 'Admin\ProductsInfoController@savePdf');
            Route::post('/productsinfo/save_file', 'Admin\ProductsInfoController@saveFile');
            Route::post('/productsinfo/saveDescription', 'Admin\ProductsInfoController@saveDescription');
        });
    });
});

/**
 * FRONTEND APP
 * add local url to .env FRONTEND_DOMAIN
 */
Route::group(['domain' => env('FRONTEND_DOMAIN', 'my.cic.kz')], function () {
    Route::get('/', 'SiteController@getIndex')->name('index');
    Route::post('/login', 'SiteController@postLogin')->name('login');
    Route::get('getModerators', 'SiteController@getModerators');
    Route::post('/getBirthdays', 'SiteController@getBirthdays')->name('getBirthdays');
    Route::get('/getBirthdays2', 'SiteController@getBirthdays2')->name('getBirthdays2');

    Route::get('eds/od', 'EdsController@edsOD');
    Route::get('eds/po', 'EdsController@edsPO');
    Route::get('eds/pr' , 'EdsController@edsPR');
    Route::post('/signqr', 'EdsController@signQr');
    Route::post('/setQr', 'EdsController@setQr');
    Route::post('/setQrPo', 'EdsController@setQrPo');

    Route::group(['middleware' => ['checkAuth', 'checkSession']], function () {
        Route::get('/getAttachment/{ISN}/{REFISN}/{PICTTYPE}', 'SiteController@getAttachment');
        Route::group(['middleware' => 'duty'], function () {
            Route::get('test/eds', 'EdsController@testEds');
            Route::post('/save_document', 'EdsController@saveDocument');
            Route::post('/get_or_set_doc', 'EdsController@getOrSetDoc');
            Route::post('/save_fail_status', 'EdsController@saveFailStatus');
            Route::get('/getEDS', 'EdsController@getEdsTokenForSign');
            Route::post('/eds-by-isn', 'EdsController@edsByIsn')->name('eds-by-isn');
            Route::post('/save_eds_info', 'EdsController@saveEdsInfo');
            Route::post('/coordinationSaveAttachment', 'CoordinationController@saveAttachment');
            Route::post('/getEorderDocs', 'CoordinationController@getEorderDocs');
            Route::post('/simpleInfo', 'SiteController@postSimpleInfo');
            Route::post('/getBranchData', 'SiteController@postBranchData');
            Route::get('/getPrintableDocument/{ISN}/{TEMPLATE}/{CLASS}', 'SiteController@getPrintableDocument');
            Route::post('/get-printable-order-document', 'EdsController@getPrintableOrderDocument');
            Route::post('/getMonthLabels', 'SiteController@getMonthLabel');
            //DOSSIER
            Route::post('/emplInfo', 'SiteController@postEmplInfo');
            Route::get('/dossier', 'SiteController@dossier')->name('dossier');
            //DOCUMENTATION ADMIN MIDDLEWARE
            Route::get('/documentation/a', 'DocumentationController@index')->name('documentation');
            Route::post('/documentation/save', 'DocumentationController@save');
            Route::get('/documentation/svg', 'DocumentationController@admin')->name('admin/documentation');
            //DOCUMENTATION
            Route::get('/documentation/{url}', 'DocumentationController@getByUrl');
            Route::post('/documentation/search', 'DocumentationController@search');
            //PARSE
            /*Route::get('parse/company', 'ParseController@getCompanyTopSum')->name('parse/company');*/
            //NEW PARSE
            Route::get('parse', 'ParseController@DataCompany')->name('parse');
            Route::get('parse/company/icompany', 'ParseController@getCompanyTopSum');
            Route::get('parse/company/product', 'ParseController@getClassTopSum');
            Route::post('parse/company/opu', 'ParseController@getOpuNewSum');
            Route::post('parse/company/balance', 'ParseController@getBalanceNewSum');

            Route::get('parse/product', 'ParseController@getClassTopSum')->name('parse/class');
            Route::get('parse/finance', 'ParseController@getFinancialIndicators')->name('parse/finance');
            /*Route::get('parse', 'ParseController@redirectToCompany')->name('parse');*/
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
        //PRODUCTS-INFO
        Route::get('/productsinfo', 'ProductsInfoController@index')->name('productsinfo');
        Route::post('/productsinfo/save', 'ProductsInfoController@save');
        Route::get('/productsinfo/svg', 'ProductsInfoController@admin')->name('admin/productsinfo');
        Route::get('productsinfo/{url}', 'ProductsInfoController@getByUrl');
        Route::post('/productsinfo/search', 'ProductsInfoController@search');

        Route::get('/productsinfo', 'ProductsInfoController@getView')->name('productsinfo');
        Route::post('/getItemList', 'ProductsInfoController@getItemsList');
        Route::post('/productsinfo/showNameDocuments', 'ProductsInfoController@showNameDocuments');
        Route::post('/productsinfo/showFullText', 'ProductsInfoController@showFullText');
        Route::post('/productsinfo/searchName', 'ProductsInfoController@searchName');

        //PARSE

        Route::get('parse/oracle','ParseOracleController@getOracleData');

        /*Route::get('parse/', 'ParseController@getCompanyTopSum')->name('parse');*/
        Route::get('parse/product', 'ParseController@getClassTopSum')->name('parse/class');
        Route::get('parse/finance', 'ParseController@getFinancialIndicators')->name('parse/finance');
        /*Route::get('parse', 'ParseController@redirectToCompany')->name('parse');*/

/*            Route::get('parse/table-opu', 'ParseController@getOpuTable')->name('parse/table-opu');  // opu
            Route::get('parse/table-indicators', 'ParseController@getIndicatorsTable')->name('parse/table-indicators');*/
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

//        Route::group(['middleware' => 'cors'], function() {
//            Route::get('/getVersion', 'Controller@getVersion');
//        });
        //NEWS
        Route::get('/booking', 'BookingController@index')->name('booking');
        Route::post('/booking/set', 'BookingController@set');
        Route::post('/booking/remove', 'BookingController@delete');

        Route::group([
            'prefix' => '/news',
            'as'     => 'news',
        ], function () {
// TODO Постепенно перенести сюда все роуты связанные с этой группой
            Route::get('/beta', 'News\\PostsController@getViewBeta')->name('.index');

            Route::get('/', 'News\\PostsController@getView')->name('.index');
            Route::post('/getPosts', 'NewsController@getPosts')->name('.getPosts');
            Route::post('/addPost', 'News\\PostsController@addPost')->name('.addPost'); // TODO use grouping
            Route::post('/addPost/beta', 'News\\PostsController@addPost2')->name('.addPost-beta'); // TODO use grouping
            Route::post('/likePost', 'News\\PostsController@likePost')->name('.likePost');
            Route::post('/getLikes', 'News\\PostsController@getPostLikes')->name('.getLikes');
            Route::post('/news-birthday', 'NewsController@birthday');
            Route::post('/editPost', 'NewsController@editPost')->middleware('checkPostAccess');
            Route::post('/vote', 'News\\PostsController@vote')->name('.votePost');
            Route::post('/getDateValidRanges', 'News\\PostsController@getDateValidRanges')->name('.getDateValidRanges');

            Route::group([
                'prefix'     => 'my',
                'as'         => '.my',
                'middleware' => ['checkPostAccess']
            ], function () {
                Route::post('/deletePost', 'News\\MyPostsController@deletePost')->name('.deletePost')->middleware('checkPostAccess');
                Route::post('/editPost', 'News\\MyPostsController@editPost')->name('.editPost')->middleware('checkPostAccess');
                Route::post('/setPinned', 'News\\MyPostsController@setPinned')->name('.setPinned')->middleware('checkPostAccess');
                Route::post('/unsetPinned', 'News\\MyPostsController@unsetPinned')->name('.unsetPinned')->middleware('checkPostAccess');
            });

            Route::group([
                'prefix' => '/comments',
                'as' => '.comments',
            ], function () {
                Route::post('/addComment', 'News\\Comments\\PostCommentsController@addComment')->name('.add');
                Route::post('/deleteComment', 'News\\Comments\\PostCommentsController@deleteComment')->name('.delete');
                Route::post('/editComment', 'News\\Comments\\PostCommentsController@editComment')->name('.edit');
            });

            Route::group([
                'prefix' => '/pin',
                'as' => '.pin',
            ], function () {
                Route::post('/setPinned', 'NewsController@setPinned')->middleware('checkPostAccess');
                Route::post('/unsetPinned', 'NewsController@unsetPinned')->middleware('checkPostAccess');
            });

        });

        Route::post('/setPinned', 'News\\MyPostsController@setPinned')->middleware('checkPostAccess');

        Route::post('/setSenateVote', 'NewsController@senateVote');
//        //RATING
//        Route::get('/rating', 'RatingController@index')->name('rating');
//        Route::post('/getRatingList', 'RatingController@getRatingList');
            //COLLEAGUES
            Route::get('/colleagues', 'ColleaguesController@index')->name('colleagues');
            Route::post('/colleagues/search', 'ColleaguesController@search');
            Route::get('/colleagues/{ISN}', 'ColleaguesController@redirectToDossier');
            Route::get('/colleagues/{ISN}/dossier', 'ColleaguesController@showPageByIsn');
            Route::get('/colleagues/{ISN}/rating', 'ColleaguesController@showRatingByIsn');
            Route::get('/colleagues/{ISN}/motivation', 'ColleaguesController@showMotivationByIsn');
            Route::get('/colleagues/{ISN}/report', 'ColleaguesController@showReportByIsn');
            Route::get('/colleagues/{ISN}/centcoins', 'ColleaguesController@showCentcoinsByIsn');
            Route::get('/colleagues/{ISN}/statistics', 'StatisticsController@showReportByIsn');
            Route::post('/addScore', 'ScoreController@addScore');

            //UNTITLED
            Route::get('/name', 'NameController@getView')->name('documentation');
            Route::post('/getItemsList', 'NameController@getItemsList');
            Route::post('/getItemsFirst', 'NameController@getItemsFirst');

            Route::get('/report', 'ReportController@index')->name('report');
            Route::post('/getReport', 'ReportController@getReport');

            //STATISTIC-DA
            Route::get('/statistics', 'StatisticsController@index')->name('statistics');
            Route::post('/getStatisticsReport', 'StatisticsController@getReport');
            Route::post('/getProdData', 'StatisticsController@getProdData');
            Route::post('/getProducts', 'StatisticsController@getProducts');
            Route::post('/getBranchProdData', 'StatisticsController@postBranchProdData');
            Route::post('/getSearchBranch', 'SiteController@getBranchSearch');
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

            Route::get('/motivation', 'MotivationController@motivation')->name('motivation');
            Route::post('/getMotivationList', 'MotivationController@getMotivationList');

            Route::get('/express', 'ProductsController@expressList');
            //Route::get('/express/calc/{ID}', 'ProductsController@express');
            Route::get('/express/calc/{ID}/{quotationId}', 'ProductsController@express')->name('express_front');
            Route::post('/express/updateDocumentStatus', 'ProductsController@updateDocumentStatus');
            Route::post('/getExpressAttributes', 'ProductsController@getExpressAttributes');
            Route::get('/express/quotations/{productISN}', 'ProductsController@expressQuotationList')->name('express_quotations_list');
            Route::post('/full/updateFullStatus', 'ProductsController@updateFullStatus');
            Route::get('/full', 'ProductsController@fullList');
            Route::get('/full/quotations/{productISN}', 'ProductsController@fullQuotationList')->name('full_quotations_list');
            Route::get('/full/calc/{ID}/{quotationId}', 'ProductsController@fullCreateEdit')->name('full_front');
            Route::post('/full/sendToInspection', 'ProductsController@sendToInspection');
            Route::post('/full/create', 'ProductsController@fullCreate');
            Route::post('/full/getFullObjects', 'ProductsController@getFullObjects');
            Route::post('/full/getFullData', 'ProductsController@getFullData');
            Route::post('/full/send-docs', 'ProductsController@sendDocs');
            Route::post('/full/create-agr', 'ProductsController@createAgr');
            Route::post('/full/getPrintableFormList', 'ProductsController@getPrintableFormList');
            Route::get('/full/getPrintableForm', 'ProductsController@getPrintableForm');
            Route::post('/full/getFullBranch', 'SiteController@getFullBranch');

            Route::post('/getDictiList', 'SiteController@getDicti');
            Route::post('/getDictiListFromBase', 'SiteController@getDictiFromBase');
            Route::post('/searchSubject', 'SiteController@searchSubject');
            Route::post('/setSubject', 'SiteController@setSubject');
            Route::post('/calc/saveSubject', 'SiteController@saveSubject');
            Route::post('/express/calculate', 'ProductsController@expressCalc');
            Route::post('/express/createAgrByAgrcalc', 'ProductsController@CreateAgrByAgrcalc');
            Route::post('/full/calculate', 'ProductsController@fullCalc');

            Route::post('/getVehicle', 'VehicleController@getVehicle');
            Route::post('/saveVehicle', 'VehicleController@saveVehicle');

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

            //Dev page route
            Route::get('development/{name}', 'NewsController@dev')->name('development');

            Route::get('boss-news', 'NewsController@index')->name('boss-news');
            Route::post('boss-news/getBossPosts', 'NewsController@getBossPosts');

            //My results page
            Route::get('rating', 'RatingController@ratingIndex')->name('rating');
            Route::post('getTopRatingList', 'RatingController@getTopRatingList');
            // Route::post('/rating/getBranchData', 'RatingPermissionController@getBranchData');

            Route::get('my-results', 'RatingController@myresultsIndex')->name('my-results');
            Route::get('my-results/rating/{ISN}/{rating_date}', 'RatingController@myResultsIndex');
            Route::post('my-results/getRating', 'RatingController@getRating');

        });
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

        Route::post('/getUsersData', 'SiteController@getUserData')->name('getUsersData');
        Route::post('/getColleagueData', 'SiteController@getColleagueData');

        Route::get('/motivation', 'MotivationController@motivation')->name('motivation');
        Route::post('/getMotivationList', 'MotivationController@getMotivationList');

        Route::get('/express', 'ProductsController@expressList');
        //Route::get('/express/calc/{ID}', 'ProductsController@express');
        Route::get('/express/calc/{ID}/{quotationId}', 'ProductsController@express')->name('express_front');
        Route::post('/express/updateDocumentStatus', 'ProductsController@updateDocumentStatus');
        Route::post('/getExpressAttributes', 'ProductsController@getExpressAttributes');
        Route::get('/express/quotations/{productISN}', 'ProductsController@expressQuotationList')->name('express_quotations_list');
        Route::post('/full/updateFullStatus', 'ProductsController@updateFullStatus');
        Route::get('/full', 'ProductsController@fullList');
        Route::get('/full/quotations/{productISN}', 'ProductsController@fullQuotationList')->name('full_quotations_list');
        Route::get('/full/calc/{ID}/{quotationId}', 'ProductsController@fullCreateEdit')->name('full_front');
        Route::post('/full/sendToInspection', 'ProductsController@sendToInspection');
        Route::post('/full/create', 'ProductsController@fullCreate');
        Route::post('/full/getFullObjects', 'ProductsController@getFullObjects');
        Route::post('/full/getFullData', 'ProductsController@getFullData');
        Route::post('/full/send-docs', 'ProductsController@sendDocs');
        Route::post('/full/create-agr', 'ProductsController@createAgr');
        Route::post('/full/getPrintableFormList','ProductsController@getPrintableFormList');
        Route::get('/full/getPrintableForm','ProductsController@getPrintableForm');
        Route::post('/full/getFullBranch','SiteController@getFullBranch');

        Route::post('/getDictiList', 'SiteController@getDicti');
        Route::post('/getDictiListFromBase', 'SiteController@getDictiFromBase');
        Route::post('/searchSubject', 'SiteController@searchSubject');
        Route::post('/setSubject', 'SiteController@setSubject');
        Route::post('/calc/saveSubject', 'SiteController@saveSubject');
        Route::post('/express/calculate', 'ProductsController@expressCalc');
        Route::post('/express/createAgrByAgrcalc', 'ProductsController@CreateAgrByAgrcalc');
        Route::post('/full/calculate', 'ProductsController@fullCalc');

        Route::post('/getVehicle', 'VehicleController@getVehicle');
        Route::post('/saveVehicle','VehicleController@saveVehicle');

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

        //Dev page route
        Route::get('development/{name}', 'NewsController@dev')->name('development');

        Route::get('boss-news', 'NewsController@index')->name('boss-news');
        Route::post('boss-news/getBossPosts', 'NewsController@getBossPosts');

        //My results page
        Route::get('rating', 'RatingController@ratingIndex')->name('rating');
        Route::post('getTopRatingList', 'RatingController@getTopRatingList');
        // Route::post('/rating/getBranchData', 'RatingPermissionController@getBranchData');

        Route::get('my-results', 'RatingController@myresultsIndex')->name('my-results');
        Route::get('my-results/rating/{ISN}/{rating_date}', 'RatingController@myResultsIndex');
        Route::post('my-results/getRating', 'RatingController@getRating');
        //COORIDNATION
        Route::get('/coordination', 'CoordinationController@index')->name('coordination');
        Route::post('/getCoordinationList', 'CoordinationController@getCoordinationList')->name('coordination.getList');
        Route::post('/getCoordinationInfo', 'CoordinationController@getCoordinationInfo');
        Route::post('/setCoordination', 'CoordinationController@setCoordination');
        Route::post('/getDocRowList', 'CoordinationController@getDocRowList');
        Route::post('/getAttachmentList', 'CoordinationController@getAttachments');
        Route::post('/getAgreedCoordination', 'CoordinationController@getAgreedCoordination');
    });

    Route::post('api/booking/get', 'ApiController@getBookingData');
    Route::post('api/booking/delete', 'ApiController@deleteBookingData');
    Route::post('api/booking/add', 'ApiController@addBookingData');
    Route::post('api/booking/officeList', 'ApiController@getBookingOfficeList');
});

Route::group(['domain' => env('PARSE_DOMAIN', 'parse.cic.kz')], function () {
    Route::get('/', 'SiteController@parseAuth');
    Route::post('/login', 'SiteController@parseLogin');

    Route::group(['middleware' => 'parseDomainAuth'], function () {
        Route::get('parse', 'ParseController@getCompanyTopSum');
        Route::get('parse/product', 'ParseController@getClassTopSum');
        Route::get('parse/finance', 'ParseController@getFinancialIndicators');
        /*Route::get('parse', 'ParseController@redirectToCompany');*/
        Route::get('parse/table-fees', 'ParseController@getFees');
        Route::get('parse/table-indicators', 'ParseController@getIndicators');
        Route::get('parse/table-competitors', 'ParseController@getCompetitors');

    });
});
Route::post('/save_document', 'EdsController@saveDocument');
Route::post('/save_documentpr', 'EdsController@saveDocumentPR');
Route::post('/save_documentpo', 'EdsController@saveDocumentPO');
Route::post('/save_fail_status', 'EdsController@saveFailStatus');
Route::post('/save_fail_statuspr', 'EdsController@saveFailStatusPR');
Route::post('/save_fail_statuspo', 'EdsController@saveFailStatusPO');
//RELOG
Route::post('/relog/saveRelogImages', 'RelogController@saveRelogImages');
Route::post('/car/addPrice', 'SiteController@addPrice');
Route::post('/coordination/notify', 'CoordinationController@sendNotify');
Route::post('/serviceCenter/notify', 'CoordinationController@serviceCenterNotify');
Route::post('/newpost/closedecade', 'CoordinationController@closeDecade');
Route::get('/kolesa/marks', 'SiteController@getMarks');
Route::get('/kolesa/models', 'SiteController@getModels');
Route::get('/kolesa/prices', 'SiteController@getPrices');
Route::get('/kolesa/show-prices', 'SiteController@showPrices');
Route::get('/api/centcoins', 'ApiController@getInfo');
//Route::get('test', 'Admin\SiteController@getModelss');
Route::post('/kolesa/getPrice', 'SiteController@getPriceByData');
Route::post('/coordination/solution', 'ApiController@getOlData');

Route::get('test', function () {
    return view('test');
});
Route::get('test3', function () {
    echo 'Если вы видите этот текст значит деплой через jenkins прошел успешно';
});

Route::group(['domain' => env('DOCS_DOMAIN', 'docs.cic.kz')], function () {
    Route::get('/', 'Documentation\DocumentationAuthController@index')->name('documentation_auth');
    Route::post('/login', 'Documentation\DocumentationAuthController@login');

    Route::group(['middleware' => ['checkAuth', 'checkSession']], function () {
        Route::get('/main', 'Documentation\DocumentationController@index')->name('documentation_main');
        Route::get('/main/{type}/{id}', 'Documentation\DocumentationController@index');
        Route::post('/main/create', 'Documentation\DocumentationController@create');
        Route::get('/logout', 'Documentation\DocumentationAuthController@logout');
    });
});
Route::get('/payout', 'PaymentEdsController@payout');
Route::group(['domain' => env('FRONTEND_DOMAIN', 'my.cic.kz')], function () {
    Route::get('/testqr', 'TestqrController@getQR')->name('testqr');
    Route::any('/testqr', 'TestqrController@getQR')->name('testqr');
    Route::post('/testqr', 'TestqrController@getQR')->name('testqr');

    Route::get('/qrmanagerreport', 'TestqrController@managerReportQR');
    Route::any('/qrmanagerreport', 'TestqrController@managerReportQR');
    Route::post('/qrmanagerreport', 'TestqrController@managerReportQR');
});

Route::group(['prefix' => '/dev', 'as' => 'dev'], function () {
    Route::get('code', 'Dev\CodeAnalyzeController@index')->name('.code');
    Route::get('tests', 'Dev\TestsController@index')->name('.tests');
    Route::get('routes', 'Dev\RoutesController@index')->name('.routes');
    Route::get('vendor', 'Dev\VendorController@index')->name('.vendor');
    Route::get('config', 'Dev\ConfigController@index')->name('.config');
    Route::get('git', 'Dev\GitController@index')->name('.git');
    Route::get('views', 'Dev\ViewsController@index')->name('.views');
    Route::get('docs', 'Dev\DocsController@index')->name('.docs');
    Route::get('caching', 'Dev\CachingController@index')->name('.caching');
    Route::get('kias', 'Dev\KiasController@index')->name('.kias');
});
