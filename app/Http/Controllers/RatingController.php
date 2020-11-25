<?php

namespace App\Http\Controllers;

use App\Library\Services\KiasServiceInterface;
use App\RatingList;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public $keys = [
//        'Category' => 'категория',
//        'DeptName' => 'подразделение',
//        'DutyName' => 'должность',
        'Rentability' => 'рентабельность',
        'ExecutionPlan' => 'исполнение плана',
        'CostPrice' => 'себестоимость',
        'NetClaim' => 'убыточность',
        'EmplDZ6' => 'дз текущая',
        'EmplDZ180' => 'дз свыше 180 дней',
        'PriorityClass' => 'приоритетные классы',
        'Prolongation' => 'пролонгация',
        'NewClient' => 'новые клиенты',
        'DirectSales' => 'доля прямых продаж',
        'VtsShare' => 'доля ОГПО физлиц',
        'CalcShare' => '% перехода сделки в договор',
        'JurShare' => 'доля юр. лица %',
        'LearningGrade' => 'оценка по обучению',
        'AppraisalStaff' => 'оценка персонала',
        'AverageDaily' => 'среднедневное кол-во договоров',
        'CrossShare' => 'кросс-продажи, %',
        'Loyality' => 'лояльность',
    ];

    public $tooltips = [
//        'Category' => 'категория',
//        'DeptName' => 'подразделение',
//        'DutyName' => 'должность',
        'Rentability' => 'соотношение дохода от продаж к доходу по страховой деятельности',
        'ExecutionPlan' => 'среднее исполнение плана за последние 6 месяцев',
        'CostPrice' => 'ав + зп + прочие прямые расходы (без учета мотивации) / доходы по страховой деятельности',
        'NetClaim' => 'выплаты нетто /доходы по страховой деятельности',
        'EmplDZ6' => 'ДЗ по договорам за отчетный период ',
        'EmplDZ180' => 'ДЗ по договорам свыше 180 дней',
        'PriorityClass' => 'Кол-во приоритетных классов в портфеле по сборам за отчетный период. Приоритетные классы -Имущество, Каско, ДМС, Грузы',
        'Prolongation' => '% пролонгированных договоров по добровольным видам, сравнение с прошлым годом аналогичного периода, за исключением договоров МСТ и договоров с нерезидентами',
        'NewClient' => 'показатель роста  новых клиентов в портфеле за последние 6 месяцев, сравнение производится с прошлым годом аналогичного периода',
        'DirectSales' => 'доля прямых продаж в портфеле от количества всех договоров(% высчитывается от кол-ва)',
        'VtsShare' => 'доля договоров ОСГПО ВТС с физ. лицами без учета договоров с нерезидентами в портфеле(% высчитывается от кол-ва)',
        'CalcShare' => 'Доля выпущенных договоров от числа отправленных заявок в ДА',
        'JurShare' => 'Доля договоров с юр.лицами в  портфеле(% высчитывается от суммы премий по договорам страхования)',
        'LearningGrade' => 'согласно оценке ОК',
        'AppraisalStaff' => 'согласно оценке ОК, группы',
        'AverageDaily' => '% превышения среднего значения среднего количества договоров МКС/МКП без учета ОГПО физ лиц',
        'CrossShare' => 'Заключение договоров с одним клиентом более чем по одному классу страхования',
        'Loyality' => 'количество проработанных лет',
    ];

    public function getRatingList(Request $request, KiasServiceInterface $kias) {
        $success = false;
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
        $category = null;
        $deptName = null;
        $dutyName = null;
        $meanShare = null;
        foreach((array)$response->Rate->row as $key => $value) {
            if($key == 'EmplRate') {
                $emplRate = (string)$value;
            }
            else if($key == 'Category') {
                $category = (string)$value;
            }
            else if($key == 'DeptName') {
                $deptName = (string)$value;
            }
            else if($key == 'DutyName') {
                $dutyName = (string)$value;
            }
            else if($key == 'MeanShare'){
                $meanShare = (int)$value;
            }
            else {
                array_push($rating, [
                    'criteria' => (string)$this->keys[$key],
                    'mark' => (string)$response->Rate->row->$key,
                    'assessment' => (string)$response->RateMean->row->$key,
                    'tooltip' => (string)$this->tooltips[$key]
                ]);
            }
        }

        return response()
            ->json([
                'success' => true,
                'error' => '',
                'rating' => $rating,
                'emplRate' => $emplRate,
                'category' => $category,
                'deptName' => $deptName,
                'dutyName' => $dutyName,
                'meanShare' => $meanShare
            ])
            ->withCallback($request->input(
                'callback'
            ));
        }

    public function index() {
        return view('rating');
    }

    public function getTopRatingList(Request $request) {
        $rating_date = $request->rating_date;

        $rating_date = date('Y-m-t', strtotime($rating_date));

        $rating = RatingList::where('rating_date', $rating_date)->get(['employee', 'employee_isn', 'department', 'rate_mark', 'rate_mean', 'rating_date']);

        $rate_a = array();
        $rate_b = array();
        $rate_c = array();
        $rate_d = array();

        foreach ($rating as $rate) {
            if($rate->rate_mark == 'A' || $rate->rate_mark == 'A-') {
                array_push($rate_a, [
                    'employee'      => $rate->employee,
                    'employee_isn'  => $rate->employee_isn,
                    'department'    => $rate->department,
                    'rate_mark'     => $rate->rate_mark,
                    'rate_mean'     => $rate->rate_mean,
                    'rating_date'   => date('Y-m', strtotime($rate->rating_date))
                ]);
            }
            elseif($rate->rate_mark == 'B' || $rate->rate_mark == 'B+' || $rate->rate_mark == 'B-') {
                array_push($rate_b, [
                    'employee'      => $rate->employee,
                    'employee_isn'  => $rate->employee_isn,
                    'department'    => $rate->department,
                    'rate_mark'     => $rate->rate_mark,
                    'rate_mean'     => $rate->rate_mean,
                    'rating_date'   => date('Y-m', strtotime($rate->rating_date))
                ]);
            }
            elseif($rate->rate_mark == 'C') {
                array_push($rate_c, [
                    'employee'      => $rate->employee,
                    'employee_isn'  => $rate->employee_isn,
                    'department'    => $rate->department,
                    'rate_mark'     => $rate->rate_mark,
                    'rate_mean'     => $rate->rate_mean,
                    'rating_date'   => date('Y-m', strtotime($rate->rating_date))
                ]);
            }
            else {
                array_push($rate_d, [
                    'employee'      => $rate->employee,
                    'employee_isn'  => $rate->employee_isn,
                    'department'    => $rate->department,
                    'rate_mark'     => $rate->rate_mark,
                    'rate_mean'     => $rate->rate_mean,
                    'rating_date'   => date('Y-m', strtotime($rate->rating_date))
                ]);
            }
        }

        $rating_list = array(
            'rating_list' => array(
                'A' => $rate_a,
                'B' => $rate_b,
                'C' => $rate_c,
                'D' => $rate_d
            ),
            'success' => true,
        );

        return response()->json($rating_list);
    }
}
