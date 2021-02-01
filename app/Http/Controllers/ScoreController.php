<?php

namespace App\Http\Controllers;

use App\Score;
use Illuminate\Http\Request;

class ScoreController extends Controller
{
    public function addScore(Request $request)
    {
        $data = $request->all();
        if(!Auth::check()) {
            return [
                'error'   => 'Пожалуста авторизуйтесь заново',
                'success' => false
            ];
        }

        //$likedOrDisliked = Score::where('scored_user_isn', $data['scored_user_isn'])

        // Модель
        $score = new Score();
        $score->user_isn = $data['user_isn'];
        $score->type = $data['type'];
        $score->scored_user_isn = $data['scored_user_isn'];

        if(!$score->save()) {
            return [
                'error'   => 'Запись не сохранилась',
                'success' => false
            ];
        }
    }
}
