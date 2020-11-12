<?php

namespace App\Http\Controllers;

use App\Library\Services\KiasServiceInterface;
use Illuminate\Http\Request;

class CabinetController extends Controller
{
    public $keys = array(
//        'Category' => 'Категория',
//        'DeptName' => 'Подразделение',
//        'DutyName' => 'Должность',
        'Rentability' => 'Рентабельность, %',
        'ExecutionPlan' => 'Исполнение плана, %',
        'CostPrice' => 'Себестоимость, %',
        'NetClaim' => 'Убыточность, %',
        'EmplDZ6' => 'ДЗ текущая, %',
        'PriorityClass' => 'Приоритетные классы',
        'Prolongation' => 'Пролонгация, %',
        'NewClient' => 'Новые клиенты',
        'DirectSales' => 'Доля прямых продаж, %',
//        'CalcShare' => '% перехода сделки в договор',
        'CrossShare' => 'Кросс-продажи, %'
    );

    public $tooltips = array(
//        'Category' => 'Категория',
//        'DeptName' => 'Подразделение',
//        'DutyName' => 'Должность',
        'Rentability' => 'Соотношение дохода от продаж к доходу по страховой деятельности',
        'ExecutionPlan' => 'Среднее исполнение плана за последние 6 месяцев',
        'CostPrice' => 'АВ + ЗП + прочие прямые расходы (без учета мотивации) / доходы по страховой деятельности',
        'NetClaim' => 'Выплаты нетто /доходы по страховой деятельности',
        'EmplDZ6' => 'ДЗ по договорам за отчетный период ',
        //'EmplDZ180' => 'ДЗ по договорам свыше 180 дней',
        'PriorityClass' => 'Кол-во приоритетных классов в портфеле по сборам за отчетный период. Приоритетные классы -Имущество, Каско, ДМС, Грузы',
        'Prolongation' => '% пролонгированных договоров по добровольным видам, сравнение с прошлым годом аналогичного периода, за исключением договоров МСТ и договоров с нерезидентами',
        'NewClient' => 'Показатель роста  новых клиентов в портфеле за последние 6 месяцев, сравнение производится с прошлым годом аналогичного периода',
        'DirectSales' => 'Доля прямых продаж в портфеле от количества всех договоров(% высчитывается от кол-ва)',
        'VtsShare' => 'Доля договоров ОСГПО ВТС с физ. лицами без учета договоров с нерезидентами в портфеле(% высчитывается от кол-ва)',
        'CalcShare' => 'Доля выпущенных договоров от числа отправленных заявок в ДА',
        'JurShare' => 'Доля договоров с юр.лицами в  портфеле(% высчитывается от суммы премий по договорам страхования)',
        'LearningGrade' => 'Согласно оценке ОК',
        'AppraisalStaff' => 'Согласно оценке ОК, группы',
        'AverageDaily' => '% превышения среднего значения среднего количества договоров МКС/МКП без учета ОГПО физ лиц',
        'CrossShare' => 'Заключение договоров с одним клиентом более чем по одному классу страхования',
        'Loyality' => 'Количество проработанных лет',
    );

    public function index()
    {
        return view('my-results');
    }

    public function getRatingList(Request $request, KiasServiceInterface $kias)
    {
        $user_isn = $request->user_isn;
        $begin_date = $request->begin_date;

        try {
            $result = $kias->getEmplRating($user_isn, $begin_date);

            if($result->error) throw new \Exception((string)$result->error->fulltext, 419);
            else if(!isset($result->Rate->row)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Данный пользователь не является продавцом, либо по нему нету данных',
                    'code'    => 400
                ]);
            }
        }
        catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
                'code'    => $e->getCode()
            ]);
        }

        $rating = [];

        $emplRate = null;
        $category = null;
        $deptName = null;
        $dutyName = null;
        $meanShare = null;
        $x_axis = array();
        $y_axis = array();

        foreach ((array)$result->Rate->row as $key => $value) {
            if (isset($this->keys[$key]))
            {
                array_push($rating, [
                    'criteria'   => (string)$this->keys[$key],
                    'mark'       => (string)$result->Rate->row->$key,
                    'benchmark'  => (string)$this->calcBenchmark($key, (string)$result->Rate->row->$key),
                    'assessment' => (string)$result->RateMean->row->$key,
                    'tooltip'    => (string)$this->tooltips[$key],
                ]);
            }
        }
        foreach ($result->Rate->row as $row) {
            $result_date = date('Y-m', strtotime((string)$row->DocDate));
            if($result_date === $begin_date)
            {
                $emplRate = (string)$row->EmplRate;
                $category = (string)$row->Category;
                $deptName = (string)$row->DeptName;
                $dutyName = (string)$row->DutyName;
                $meanShare = (string)$row->MeanShare;
            }
            array_push($x_axis, (string)$row->DocDate);
            array_push($y_axis, (string)$row->MeanShare);
        }

        usort($x_axis, array($this, "sortByDate"));

        $response = array(
            'success'    => true,
            'rating'     => $rating,
            'emplRate'   => $emplRate,
            'category'   => $category,
            'deptName'   => $deptName,
            'emplDuty'   => $dutyName,
            'meanShare'  => $meanShare,
            'xAxis'      => $x_axis,
            'yAxis'      => $y_axis,
            'emplISN'    => (string)$result->EMPLISN,
            'emplName'   => (string)$result->EMPLNAME
        );

        return response()->json($response);
    }

    public function getReport(Request $request, KiasServiceInterface $kias)
    {
        $ISN = $request->isn;
        /*
         * 1446265
         * 1446171
         * 1446285
         */
        $dateBeg = date('d.m.Y', strtotime($request->dateBeg));
        $dateEnd = date('d.m.Y', strtotime($request->dateEnd));

        $response = $kias->GetInfoUser($dateBeg, $dateEnd, $ISN);

        if ($response->error) {
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

    protected function calcBenchmark($mark_type, $mark) {
        switch ($mark_type) {
            case 'Rentability':
                if($mark < 29) return $benchmark = 30;
                else if($mark < 39) return $benchmark = 40;
                else if($mark < 69) return $benchmark = 70;
                else if($mark < 89) return $benchmark = 90;
                else return $benchmark = '';
            case 'ExecutionPlan':
                if($mark < 59) return $benchmark = 60;
                else if($mark < 69) return $benchmark = 70;
                else if($mark < 89) return $benchmark = 90;
                else if($mark < 100) return $benchmark = '100+';
                else return $benchmark = '';
            case 'CostPrice':
                if($mark > 31) return $benchmark = 29;
                else if($mark < 30) return $benchmark = 16;
                else if($mark < 20) return $benchmark = 11;
                else if($mark < 15) return $benchmark = '10-';
                else return $benchmark = '';
            case 'NetClaim':
                if($mark > 31) return $benchmark = 29;
                else if($mark < 30) return $benchmark = 16;
                else if($mark < 20) return $benchmark = 11;
                else if($mark < 15) return $benchmark = '10-';
                else return $benchmark = '';
            case 'EmplDZ6':
                if($mark > 12) return $benchmark = 11;
                else if($mark < 11) return $benchmark = 9;
                else if($mark < 9) return $benchmark = 7;
                else if($mark < 7) return $benchmark = '5-';
                else return $benchmark = '';
            case 'PriorityClass':
                if($mark < 1) return $benchmark = 1;
                else if($mark < 2) return $benchmark = 3;
                else if($mark < 3) return $benchmark = 4;
                else return $benchmark = '';
            case 'Prolongation':
                if($mark < 30) return $benchmark = 31;
                else if($mark < 50) return $benchmark = 51;
                else if($mark < 60) return $benchmark = 61;
                else if($mark < 79) return $benchmark = '80+';
                else return $benchmark = '';
            case 'NewClient':
                if($mark < 19) return $benchmark = 20;
                else if($mark < 29) return $benchmark = 30;
                else if($mark < 39) return $benchmark = 40;
                else if($mark < 49) return $benchmark = '50+';
                else return $benchmark = '';
            case 'DirectSales':
                if($mark < 10) return $benchmark = 11;
                else if($mark < 29) return $benchmark = 30;
                else if($mark < 49) return $benchmark = 50;
                else if($mark < 79) return $benchmark = '80+';
                else return $benchmark = '';
            case 'CrossShare':
                if($mark < 10) return $benchmark = 11;
                else if($mark < 20) return $benchmark = 21;
                else if($mark < 39) return $benchmark = 40;
                else if($mark < 59) return $benchmark = '60+';
                else return $benchmark = '';
            default: return '';
        }
    }

    protected function sortByDate($a, $b) {
        return strtotime($a) - strtotime($b);
    }
}


