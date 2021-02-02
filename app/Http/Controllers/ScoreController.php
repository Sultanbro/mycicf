<?php

namespace App\Http\Controllers;

use App\Score;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        $scored_user_isn = Auth::user()->ISN;

        $user_score = Score::where('scored_user_isn', $scored_user_isn)
            ->where('user_isn', $data['user_isn'])
            ->where('type', $data['type']);

        if(sizeof($user_score->get()) === 0) {
            // Модель
            $score = new Score();
            $score->user_isn = $data['user_isn'];
            $score->type = $data['type'];
            $score->scored_user_isn = $scored_user_isn;

            if(!$score->save()) {
                return [
                    'error'   => 'Запись не сохранилась',
                    'success' => false
                ];
            }
        }
        else {
            $user_score->delete();
        }

        broadcast(new Score([
            'type' => $data['type']
        ]));

        return response()->json([
            'success' => true,
        ]);
    }
}
