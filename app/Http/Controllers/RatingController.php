<?php

namespace App\Http\Controllers;

use App\Library\Services\KiasServiceInterface;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public $keys = [
        'MeanShare' => 'среднее значение по показателям',
        'Category' => 'категория',
        'DeptName' => 'подразделение',
        'DutyName' => 'должность',
        'JurShare' => 'доля юр. лица %',
        'LearningGrade' => 'оценка по обучению',
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
        'AppraisalStaff' => 'оценка персонала',
        'AverageDaily' => 'среднедневное кол-во договоров',
        'CrossShare' => 'кросс-продажи, %',
        'Loyality' => 'лоялность',
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

        $emplRate = null;
        foreach((array)$response->Rate->row as $key => $value) {
            if($key == 'EmplRate')
                $emplRate = (string)$value;
            else {
                array_push($rating, [
                    'criteria' => (string)$this->keys[$key],
                    'mark' => (string)$response->Rate->row->$key,
                    'assessment' => (string)$response->RateMean->row->$key
                ]);
            }
        }

        return response()
            ->json([
                'success' => true,
                'error' => '',
                'rating' => $rating,
                'emplRate' => $emplRate,
            ])
            ->withCallback($request->input(
                'callback'
            ));
        }

    public function index() {
        return view('rating');
    }
}
