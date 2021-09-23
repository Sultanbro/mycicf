<?php

use \App\Http\Controllers\Api\QuizController;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

    Route::resource('quiz', 'Api\QuizController');
    Route::get('question/right/{id}', 'Api\QuizController@oneQuestionRightAnswers');
    Route::get('question/{id}', 'Api\QuizController@oneQuestionAnswers');
    Route::get('question/count/{id}', 'Api\QuizController@getQuestionCount');
    Route::put('one/quiz/{id}', 'Api\QuizController@quizParametrsUpdate');
    Route::put('question/material/{id}', 'Api\QuizController@saveMaterialByQuestion');
    Route::delete('question/material/{id}', 'Api\QuizController@deleteMaterial');
    Route::delete('question/{id}', 'Api\QuizController@deleteQuestionAnswers');
    Route::resource('for_kias', 'Api\QuizForKiasController');
    Route::resource('material', 'Api\EducationalMaterialController');
    Route::resource('training_program', 'Api\TrainingProgramController');
    Route::delete('training_program/material/{id}', 'Api\TrainingProgramController@deleteMaterial');
    Route::delete('training_program/quiz/{id}', 'Api\TrainingProgramController@deleteQuiz');
    Route::resource('announcement', 'Api\AnnouncementController');
    Route::resource('assign/training', 'Api\AssignTrainingController');
    Route::resource('undergo', 'Api\UndergoTrainingController');
    Route::resource('conduct', 'Api\ConductTrainingController');
    Route::post('/getFullBranch', 'Api\BranchController@getFullBranch');

