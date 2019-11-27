<?php

namespace App\Http\Controllers;

use App\Library\Services\KiasServiceInterface;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public $keys = [
        'Rentability' => 'рентабельность',
        'ExecutionPlan' => 'исполнение плана',
        'CostPrice' => 'себестоимсоть',
        'NetClaim' => 'убыточность',
        'EmplDZ6' => 'дз текущая',
        'EmplDZ180' => 'дз свыше 180 дней',
        'PriorityClass' => 'приоритетные классы',
        'Prolongation' => 'пролонгация',
        'NewClient' => 'новые клиенты',
        'DirectSales' => 'доля прямых продаж',
        'VtsShare' => 'доля ОГПО физлиц',
        'CalcShare' => '% перехода сделки в договор',
//        '' => 'рейтинг исп.срока и обучения',
        'AppraisalStaff' => 'оценка персонала',
        'AverageDaily' => 'среднедневное кол-во договоров',
        'CrossShare' => 'кросс-продажи, %',
        'Loyality' => 'лоялность',
//        '' => 'итоговая оценка'
    ];

    public function getRatingList(Request $request, KiasServiceInterface $kias) {
        $success = true;
        $error = '';
        $isn = $request->isn;
        $begin = $request->begin;
        $response = $kias->getEmplRating($isn, $begin);
        $rating = [];

        if($response->error) {
            return response()
                ->json([
                    'success' => false,
                    'error' => (string)$response->error->text
                ])
                ->withCallback(
                    $request->input(
                        'callback'
                    )
                );
        }

//        dd($response);
//        dd($response->Rate);

        foreach($response->Rate as $key => $value) {
            array_push($rating, [
                'criteria' => $this->keys[$key],
                'mark' => $response->Rate->row->$key,
                'assessment' => $response->RateMean->row->$key
            ]);
        }

        return response()
            ->json([
                'success' => true,
                'error' => '',
                'rating' => $rating,
            ])
            ->withCallback($request->input(
                'callback'
            ));
        }

    public function index() {
        return view('rating');
    }
}
