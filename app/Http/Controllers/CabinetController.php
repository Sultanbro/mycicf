<?php

namespace App\Http\Controllers;
use App\Library\Services\KiasServiceInterface;
use Illuminate\Http\Request;

class CabinetController extends Controller
{
    public $keys = [
        'Category' => 'категория',
        'DeptName' => 'подразделение',
        'DutyName' => 'должность',
        'Rentability' => 'рентабельность',
        'ExecutionPlan' => 'исполнение плана',
        'CostPrice' => 'себестоимость',
        'NetClaim' => 'убыточность',
        'EmplDZ6' => 'дз текущая',
        'PriorityClass' => 'приоритетные классы',
        'Prolongation' => 'пролонгация',
        'NewClient' => 'новые клиенты',
        'DirectSales' => 'доля прямых продаж',
//        'CalcShare' => '% перехода сделки в договор',
       'CrossShare' => 'кросс-продажи, %'
    ];

   public $tooltips = [
        'Category' => 'категория',
        'DeptName' => 'подразделение',
        'DutyName' => 'должность',
       'Rentability' => 'соотношение дохода от продаж к доходу по страховой деятельности',
        'ExecutionPlan' => 'среднее исполнение плана за последние 6 месяцев',
        'CostPrice' => 'ав + зп + прочие прямые расходы (без учета мотивации) / доходы по страховой деятельности',
        'NetClaim' => 'выплаты нетто /доходы по страховой деятельности',
        'EmplDZ6' => 'ДЗ по договорам за отчетный период ',
        //'EmplDZ180' => 'ДЗ по договорам свыше 180 дней',
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
//            $end = $request->end;
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
                    if(isset($this->keys[$key])) {
                        array_push($rating, [
                            'criteria' => (string)$this->keys[$key],
                            'mark' => (string)$response->Rate->row->$key,
                            'assessment' => (string)$response->RateMean->row->$key,
                            'tooltip' => (string)$this->tooltips[$key]
                        ]);
                    }
                    //print $key.'='$value;
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
        return view('cabinet');
    }
    public function getReport(Request $request, KiasServiceInterface $kias){
        $ISN = $request->isn;
        /*
         * 1446265
         * 1446171
         * 1446285
         */
        $dateBeg = date('d.m.Y', strtotime($request->dateBeg));
        $dateEnd = date('d.m.Y', strtotime($request->dateEnd));
        $response = $kias->GetInfoUser($dateBeg, $dateEnd, $ISN);
        if($response->error) {
            return response()
                ->json([
                    'success' => false,
                    'error' => $response->error->text,
                ]);
        }
        return response()
            ->json([
                'success' => true,
                'info' => $response
            ]);
    }

//    public function getInf(Request $request, KiasServiceInterface $kias){
//        $isn = $request->isn;
//        $begin = date("1-m-Y");
//        $end = date("d-m-Y");
//    }
}

