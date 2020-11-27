<?php

namespace App\Http\Controllers;

use App\Library\Services\KiasServiceInterface;
use App\RatingList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RatingController extends Controller
{
    public $keys = array(
        'rentability'    => 'Рентабельность, %',
        'execution_plan' => 'Исполнение плана, %',
        'cost_price'     => 'Себестоимость, %',
        'net_claim'      => 'Убыточность, %',
        'ar_current'     => 'ДЗ текущая, %',
        'priority_class' => 'Приоритетные классы',
        'prolongation'   => 'Пролонгация, %',
        'new_clients'    => 'Новые клиенты',
        'direct_sales'   => 'Доля прямых продаж, %',
        'calc_share'     => '% перехода сделки в договор',
        'cross_share'    => 'Кросс-продажи, %'
    );

    public $tooltips = array(
        'rentability'    => 'Соотношение дохода от продаж к доходу по страховой деятельности',
        'execution_plan' => 'Среднее исполнение плана за последние 6 месяцев',
        'cost_price'     => 'АВ + ЗП + прочие прямые расходы (без учета мотивации) / доходы по страховой деятельности',
        'net_claim'      => 'Выплаты нетто /доходы по страховой деятельности',
        'ar_current'     => 'ДЗ по договорам за отчетный период ',
        'priority_class' => 'Кол-во приоритетных классов в портфеле по сборам за отчетный период. Приоритетные классы -Имущество, Каско, ДМС, Грузы',
        'prolongation'   => '% пролонгированных договоров по добровольным видам, сравнение с прошлым годом аналогичного периода, за исключением договоров МСТ и договоров с нерезидентами',
        'new_clients'    => 'Показатель роста  новых клиентов в портфеле за последние 6 месяцев, сравнение производится с прошлым годом аналогичного периода',
        'direct_sales'   => 'Доля прямых продаж в портфеле от количества всех договоров(% высчитывается от кол-ва)',
        'calc_share'     => 'Доля выпущенных договоров от числа отправленных заявок в ДА',
        'cross_share'    => 'Заключение договоров с одним клиентом более чем по одному классу страхования',
    );

    public function getRating(Request $request) {
        $rating_date = $request->rating_date;
        $rating_date = date('Y-m-t', strtotime($rating_date));
        $employee_isn = $request->employee_isn;

        $rating = RatingList::where('employee_isn', $employee_isn)->orderBy('rating_date')->get()->toArray();

        if($rating) {
            $employee_info = array(
                'fullname'   => $rating[sizeof($rating) - 1]['employee'],
                'isn'        => $rating[sizeof($rating) - 1]['employee_isn'],
                'duty'       => $rating[sizeof($rating) - 1]['duty'],
                'department' => $rating[sizeof($rating) - 1]['department'],
                'rate_mark'  => $rating[sizeof($rating) - 1]['rate_mark'],
                'rate_mean'  => $rating[sizeof($rating) - 1]['rate_mean']
            );

            $x_axis = array();
            $y_axis = array();

            $employee_rate = array();
            foreach ($rating as $rate) {
                foreach ($rate as $key => $value) {
                    if (isset($this->keys[$key]) && $rate['rating_date'] === $rating_date)
                    {
                        array_push($employee_rate, [
                            'criteria'   => $this->keys[$key],
                            'mark'       => $rate[$key],
                            'benchmark'  => $this->calcBenchmark($key, $rate[$key]),
                            'assessment' => $rate[$key],
                            'tooltip'    => $this->tooltips[$key],
                        ]);
                    }
                }
                array_push($x_axis, $rate['rating_date']);
                array_push($y_axis, $rate['rate_mean']);
            }

            $chart_data = array(
                'x_axis' => $x_axis,
                'y_axis' => $y_axis,
            );

            $response = array(
                'employee_info' => $employee_info,
                'employee_rate' => $employee_rate,
                'chart_data'    => $chart_data,
                'success'       => true,
            );

            return response()->json($response);
        }
        else {
            return response()->json([
                'success' => false,
                'message' => 'Данный пользователь не является продавцом, либо по нему нету данных',
                'code'    => 400
            ]);
        }

    }

//    public function index() {
//        return view('rating');
//    }

    public function index(Request $request)
    {
        if(isset($request->ISN)) {
            return view('my-results')->with('employee_isn', $request->ISN)->with('rating_date', (string)$request->rating_date);
        }
        else {
            return view('my-results');
        }
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
            if($rate->rate_mark == 'A' || $rate->rate_mark == 'A-' || $rate->rate_mark == 'A+') {
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

//        $rate_avg = DB::table('rating_list')
//            ->select(DB::raw("(SELECT ROUND(AVG(rate_mean))
//                                     FROM rating_list
//                                     WHERE rate_mark = 'A' OR rate_mark = 'A-' OR rate_mark = 'A+') as avg_a"),
//                     DB::raw("(SELECT ROUND(AVG(rate_mean))
//                                     FROM rating_list
//                                     WHERE rate_mark = 'B' OR rate_mark = 'B-' OR rate_mark = 'B+') as avg_b"),
//                     DB::raw("(SELECT ROUND(AVG(rate_mean))
//                                     FROM rating_list
//                                     WHERE rate_mark = 'C') as avg_c"),
//                     DB::raw("(SELECT ROUND(AVG(rate_mean))
//                                     FROM rating_list
//                                     WHERE rate_mark = 'D') as avg_d")
//            )->first();
//
//        dd($rate_avg);


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

    protected function calcBenchmark($mark_type, $mark) {
        switch ($mark_type) {
            case 'rentability':
                if($mark < 29) return $benchmark = 30;
                else if($mark < 39) return $benchmark = 40;
                else if($mark < 69) return $benchmark = 70;
                else if($mark < 89) return $benchmark = 90;
                else return $benchmark = '';
            case 'execution_plan':
                if($mark < 59) return $benchmark = 60;
                else if($mark < 69) return $benchmark = 70;
                else if($mark < 89) return $benchmark = 90;
                else if($mark < 100) return $benchmark = '100+';
                else return $benchmark = '';
            case 'cost_price':
                if($mark > 31) return $benchmark = 29;
                else if($mark < 30) return $benchmark = 16;
                else if($mark < 20) return $benchmark = 11;
                else if($mark < 15) return $benchmark = '10-';
                else return $benchmark = '';
            case 'net_claim':
                if($mark > 31) return $benchmark = 29;
                else if($mark < 30) return $benchmark = 16;
                else if($mark < 20) return $benchmark = 11;
                else if($mark < 15) return $benchmark = '10-';
                else return $benchmark = '';
            case 'ar_current':
                if($mark > 12) return $benchmark = 11;
                else if($mark < 11) return $benchmark = 9;
                else if($mark < 9) return $benchmark = 7;
                else if($mark < 7) return $benchmark = '5-';
                else return $benchmark = '';
            case 'priority_class':
                if($mark < 1) return $benchmark = 1;
                else if($mark < 2) return $benchmark = 3;
                else if($mark < 3) return $benchmark = 4;
                else return $benchmark = '';
            case 'prolongation':
                if($mark < 30) return $benchmark = 31;
                else if($mark < 50) return $benchmark = 51;
                else if($mark < 60) return $benchmark = 61;
                else if($mark < 79) return $benchmark = '80+';
                else return $benchmark = '';
            case 'new_clients':
                if($mark < 19) return $benchmark = 20;
                else if($mark < 29) return $benchmark = 30;
                else if($mark < 39) return $benchmark = 40;
                else if($mark < 49) return $benchmark = '50+';
                else return $benchmark = '';
            case 'direct_sales':
                if($mark < 10) return $benchmark = 11;
                else if($mark < 29) return $benchmark = 30;
                else if($mark < 49) return $benchmark = 50;
                else if($mark < 79) return $benchmark = '80+';
                else return $benchmark = '';
            case 'cross_share':
                if($mark < 10) return $benchmark = 11;
                else if($mark < 20) return $benchmark = 21;
                else if($mark < 39) return $benchmark = 40;
                else if($mark < 59) return $benchmark = '60+';
                else return $benchmark = '';
            default: return '';
        }
    }
}
