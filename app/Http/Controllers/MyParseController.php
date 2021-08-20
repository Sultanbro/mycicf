<?php

namespace App\Http\Controllers;

use App\InsuranceClasses;
use App\InsuranceCompany;
use App\InsuranceProduct;
use App\ParseBalance;
use App\ParseFinance;
use App\ParseInfo;
use App\ParseOpu;
use App\ParsePayout;
use App\ParsePremium;
use App\ParseStandart;
use App\Permissions;
use App\PreviousName;
use App\PreviousProductName;

use App\Imports\UsersImport;

use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use function Couchbase\defaultEncoder;
use function Deployer\get;

class MyParseController extends Controller
{
//DOC TYPES
    public const FINANCE = 1;           //Фин показатели
    public const PREMIUM = 2;           //Отчет по премиям
    public const PAYMENTS = 3;          //Отчет по выплатам
    public const STANDART = 4;          //Отчет по нормативам
    public const OPU = 5;               //ОПУ
    public const BALANCE = 6;           //Баланс
    //CLASS OF INSURANCE
    public const COMPULSORY = 1;        //Обязательное
    public const INDIVIDUAL = 2;        //Личное
    public const PROPERTY = 3;          //Имущественное
    //PRODUCT
    public const MST_ID = 3;

    public $percentColumns = [
        'own_ret' => 'own_ret',
        'lost_perc' => 'lost_perc',
        'av_perc' => 'av_perc',
        'fot_dsd' => 'fot_dsd',
    ];

    public function __construct()
    {
    }

    public function dateTypes(){
        return [
            'month',
            'year',
            'quarter',
            'rise'
        ];
    }
/*    public static function getNameByClassId($class_id){
        return self::getNameWithClassId()[$class_id];
    }*/
    public function getNameWithClassId(){
        return [
            self::COMPULSORY => 'Обязательное',
            self::PROPERTY => 'Имущественное',
            self::INDIVIDUAL => 'Личное',
        ];
    }
    public function getClassTopSum(){
        $label_first = '';
        $label_second = '';
        $default = $this->getDefaultDates(self::PREMIUM);
        $dateType = $_GET['dateType'] ?? 'rise';
        $firstPeriod = $_GET['first_period'] ?? $default['first_period'];
        $secondPeriod = $_GET['second_period'] ?? $default['second_period'];
        $firstYear = $_GET['first_year'] ?? $default['first_year'];
        $secondYear = $_GET['second_year'] ?? $default['second_year'];
        $_GET['firstPeriod'] = $firstPeriod;
        $_GET['secondPeriod'] = $secondPeriod;
        $_GET['firstYear'] = $firstYear;
        $_GET['secondYear'] = $secondYear;
        $_GET['dateType'] = $dateType;
        $companyId = $_GET['companyId'] ?? 0;
        $discount = $_GET['disc'] ?? 0;
        $discount = 1-($discount/100);
        $premium_first = [];
        $premium_second= [];
        $payout_first = [];
        $payout_second = [];
        $insurance_classes[1] = [];
        $insurance_classes[2] = [];
        $insurance_classes[3] = [];
        foreach (InsuranceProduct::all() as $item){
            $premium_first[$item->id] = 0;
            $premium_second[$item->id] = 0;
            $payout_first[$item->id] = 0;
            $payout_second[$item->id] = 0;
        }
        foreach (InsuranceClasses::all() as $item){
            array_push($insurance_classes[$item->class_id],$item->product_id);
        }
        $label = $companyId == 0 ? 'Рынок' : $this->getCompanyListWithId()[$companyId];
        if(in_array($dateType, $this->dateTypes())){
            if($dateType == 'month')
            {
                $label_first = $this->getMonthLabel()[$firstPeriod].' '.$firstYear;
                $label_second = $this->getMonthLabel()[$secondPeriod].' '.$secondYear;
                if($companyId == 0){
                    $dataPrem = ParsePremium::where('year', '=', $firstYear)
                        ->where('month', '=', $firstPeriod)
                        ->get();
                    $dataPay = ParsePayout::where('year', '=', $firstYear)
                        ->where('month', '=', $firstPeriod)
                        ->get();
                    $dataPremSec = ParsePremium::where('year', '=', $secondYear)
                        ->where('month', '=', $secondPeriod)
                        ->get();
                    $dataPaySec = ParsePayout::where('year', '=', $secondYear)
                        ->where('month', '=', $secondPeriod)
                        ->get();
                }
                else{
                    $dataPrem = ParsePremium::where('year', '=', $firstYear)
                        ->where('month', '=', $firstPeriod)
                        ->where('company_id', '=', $companyId)
                        ->get();
                    $dataPay = ParsePayout::where('year', '=', $firstYear)
                        ->where('month', '=', $firstPeriod)
                        ->where('company_id', '=', $companyId)
                        ->get();
                    $dataPremSec = ParsePremium::where('year', '=', $secondYear)
                        ->where('month', '=', $secondPeriod)
                        ->where('company_id', '=', $companyId)
                        ->get();
                    $dataPaySec = ParsePayout::where('year', '=', $secondYear)
                        ->where('month', '=', $secondPeriod)
                        ->where('company_id', '=', $companyId)
                        ->get();
                }
                foreach ($dataPrem as $item){
                    $premium_first[$item->product_id] += $item->product_id == 24 ? $item->sum*$discount : $item->sum;
                }
                foreach ($dataPay as $item){
                    $payout_first[$item->product_id] += $item->sum;
                }
                foreach ($dataPremSec as $item){
                    $premium_second[$item->product_id] += $item->product_id == 24 ? $item->sum*$discount : $item->sum;
                }
                foreach ($dataPaySec as $item){
                    $payout_second[$item->product_id] += $item->sum;
                }
            }
            elseif($dateType == 'year')
            {
                $label_first = $firstYear;
                $label_second = $secondYear;
                if($companyId == 0){
                    $dataPrem = ParsePremium::where('year', '=', $firstYear)
                        ->get();
                    $dataPay = ParsePayout::where('year', '=', $firstYear)
                        ->get();
                    $dataPremSec = ParsePremium::where('year', '=', $secondYear)
                        ->get();
                    $dataPaySec = ParsePayout::where('year', '=', $secondYear)
                        ->get();
                }else{
                    $dataPrem = ParsePremium::where('year', '=', $firstYear)
                        ->where('company_id', '=', $companyId)
                        ->get();
                    $dataPay = ParsePayout::where('year', '=', $firstYear)
                        ->where('company_id', '=', $companyId)
                        ->get();
                    $dataPremSec = ParsePremium::where('year', '=', $secondYear)
                        ->where('company_id', '=', $companyId)
                        ->get();
                    $dataPaySec = ParsePayout::where('year', '=', $secondYear)
                        ->where('company_id', '=', $companyId)
                        ->get();
                }
                foreach ($dataPrem as $item){
                    $premium_first[$item->product_id] += $item->product_id == 24 ? $item->sum*$discount : $item->sum;
                }
                foreach ($dataPay as $item){
                    $payout_first[$item->product_id] += $item->sum;
                }
                foreach ($dataPremSec as $item){
                    $premium_second[$item->product_id] += $item->product_id == 24 ? $item->sum*$discount : $item->sum;
                }
                foreach ($dataPaySec as $item){
                    $payout_second[$item->product_id] += $item->sum;
                }
            }
            elseif($dateType == 'quarter')
            {
                $label_first = $firstPeriod.'кв. '.$firstYear;
                $label_second = $secondPeriod.'кв. '.$secondYear;
                for ($i = 1; $i<=3; $i++){
                    if($companyId == 0){
                        $dataPrem = ParsePremium::where('year', '=', $firstYear)
                            ->where('month', '=', ($firstPeriod-1)*3+$i)
                            ->get();
                        $dataPay = ParsePayout::where('year', '=', $firstYear)
                            ->where('month', '=', ($firstPeriod-1)*3+$i)
                            ->get();
                        $dataPremSec = ParsePremium::where('year', '=', $secondYear)
                            ->where('month', '=', ($secondPeriod-1)*3+$i)
                            ->get();
                        $dataPaySec = ParsePayout::where('year', '=', $secondYear)
                            ->where('month', '=', ($secondPeriod-1)*3+$i)
                            ->get();
                    }else{
                        $dataPrem = ParsePremium::where('year', '=', $firstYear)
                            ->where('month', '=', ($firstPeriod-1)*3+$i)
                            ->where('company_id', '=', $companyId)
                            ->get();
                        $dataPay = ParsePayout::where('year', '=', $firstYear)
                            ->where('month', '=', ($firstPeriod-1)*3+$i)
                            ->where('company_id', '=', $companyId)
                            ->get();
                        $dataPremSec = ParsePremium::where('year', '=', $secondYear)
                            ->where('month', '=', ($secondPeriod-1)*3+$i)
                            ->where('company_id', '=', $companyId)
                            ->get();
                        $dataPaySec = ParsePayout::where('year', '=', $secondYear)
                            ->where('month', '=', ($secondPeriod-1)*3+$i)
                            ->where('company_id', '=', $companyId)
                            ->get();
                    }
                    foreach ($dataPrem as $item){
                        $premium_first[$item->product_id] += $item->product_id == 24 ? $item->sum*$discount : $item->sum;
                    }
                    foreach ($dataPay as $item){
                        $payout_first[$item->product_id] += $item->sum;
                    }
                    foreach ($dataPremSec as $item){
                        $premium_second[$item->product_id] += $item->product_id == 24 ? $item->sum*$discount : $item->sum;
                    }
                    foreach ($dataPaySec as $item){
                        $payout_second[$item->product_id] += $item->sum;
                    }
                }
            }
            else {
                $label_first = $this->getMonthLabel()[$firstPeriod] . ' ' . $firstYear;
                $label_second = $this->getMonthLabel()[$secondPeriod] . ' ' . $secondYear;
                if ($companyId == 0) {
                    for ($monthFirst = 1; $monthFirst <= $firstPeriod; $monthFirst++) {
                        $dataPrem = ParsePremium::where('year', '=', $firstYear)
                            ->where('month', '=', $monthFirst)
                            ->get();
                        $dataPay = ParsePayout::where('year', '=', $firstYear)
                            ->where('month', '=', $monthFirst)
                            ->get();
                        foreach ($dataPrem as $item) {
                            $premium_first[$item->product_id] += $item->product_id == 24 ? $item->sum * $discount : $item->sum;
                        }
                        foreach ($dataPay as $item) {
                            $payout_first[$item->product_id] += $item->sum;
                        }
                    }
                    for ($monthSecond = 1; $monthSecond <= $secondPeriod; $monthSecond++) {
                        $dataPremSec = ParsePremium::where('year', '=', $secondYear)
                            ->where('month', '=', $monthSecond)
                            ->get();
                        $dataPaySec = ParsePayout::where('year', '=', $secondYear)
                            ->where('month', '=', $monthSecond)
                            ->get();

                        foreach ($dataPremSec as $item) {
                            $premium_second[$item->product_id] += $item->product_id == 24 ? $item->sum * $discount : $item->sum;
                        }
                        foreach ($dataPaySec as $item) {
                            $payout_second[$item->product_id] += $item->sum;
                        }
                    }
                } else {
                    for ($monthFirst = 1; $monthFirst <= $firstPeriod; $monthFirst++) {
                        $dataPrem = ParsePremium::where('year', '=', $firstYear)
                            ->where('month', '=', $monthFirst)
                            ->where('company_id', '=', $companyId)
                            ->get();
                        $dataPay = ParsePayout::where('year', '=', $firstYear)
                            ->where('month', '=', $monthFirst)
                            ->where('company_id', '=', $companyId)
                            ->get();
                        foreach ($dataPrem as $item) {
                            $premium_first[$item->product_id] += $item->product_id == 24 ? $item->sum * $discount : $item->sum;
                        }
                        foreach ($dataPay as $item) {
                            $payout_first[$item->product_id] += $item->sum;
                        }
                    }
                    for ($monthSecond = 1; $monthSecond <= $secondPeriod; $monthSecond++) {
                        $dataPremSec = ParsePremium::where('year', '=', $secondYear)
                            ->where('month', '=', $monthSecond)
                            ->where('company_id', '=', $companyId)
                            ->get();
                        $dataPaySec = ParsePayout::where('year', '=', $secondYear)
                            ->where('month', '=', $monthSecond)
                            ->where('company_id', '=', $companyId)
                            ->get();
                        foreach ($dataPremSec as $item) {
                            $premium_second[$item->product_id] += $item->product_id == 24 ? $item->sum * $discount : $item->sum;
                        }
                        foreach ($dataPaySec as $item) {
                            $payout_second[$item->product_id] += $item->sum;
                        }
                    }
                }
            }
        }
        $class_sum=[];
        arsort($premium_first);
        foreach ($insurance_classes as $id => $class){
            $first_premium = 0;
            $second_premium = 0;
            $first_payout = 0;
            $second_payout = 0;
            foreach ($insurance_classes[$id] as $item){
                if($item != 3) :
                    $first_premium += (integer)$premium_first[$item];
                    $second_premium += (integer)$premium_second[$item];
                    $first_payout += (integer)$payout_first[$item];
                    $second_payout += (integer)$payout_second[$item];
                endif;
            }
            $class_sum[$id]['premium_first'] = $first_premium;
            $class_sum[$id]['payout_first'] = $first_payout;
            $class_sum[$id]['premium_second'] = $second_premium;
            $class_sum[$id]['payout_second'] = $second_payout;
        }

        return response()->json([
            'success' => true,
            'data' => [
                'premium_first' => $premium_first,
                'premium_second' => $premium_second,
                'payout_first' => $payout_first,
                'payout_second' => $payout_second,
                'productList' => $this->getProductListWithId(),
                'insuranceClassList' => $insurance_classes,
                'class_sum' => $class_sum,
                'label' => $label,
                'label_first' => $label_first,
                'label_second' => $label_second,
                'month' => $this->getMonthLabels(),
                'quarter' => $this->getQuarterLabels(),
                'insuranceClass'=> $this->getNameWithClassId(),
            ]
        ]);
    }

    public function getProductListWithId(){
        $model = InsuranceProduct::all();
        $result = [];
        foreach ($model as $item) {
            $result[$item->id] = $item->short_name;
        }
        return $result;

    }

    public function getMonthLabel(){
        return [
            '',
            'Янв',
            'Фев',
            'Мар',
            'Апр',
            'Май',
            'Июн',
            'Июл',
            'Авг',
            'Сен',
            'Окт',
            'Ноя',
            'Дек',
        ];
    }
    public function getDefaultDates($type){
        switch ($type){
            case self::PREMIUM :
                $year = ParsePremium::max('year');
                $month = ParsePremium::where('year', $year)->max('month');
                break;
            case self::PAYMENTS :
                $model = ParsePayout::all();
                break;
            case self::FINANCE :
                $year = ParseFinance::max('year');
                $month = ParseFinance::where('year', $year)->max('month');
                break;
            default :
                $year = ParsePremium::max('year');
                $month = ParsePremium::where('year', $year)->max('month');
        }
        $result = [
            'second_period' => $month,
            'first_year' => $year,
            'first_period' => $month,
            'second_year' => $year -1,
        ];

        return $result;
    }

    public function getCompanyListWithId(){
        $model = InsuranceCompany::all();
        $result = [];
        foreach ($model as $item) {
            $result[$item->id] = $item->short_name;
        }
        return $result;
    }

    public function getCompanyTopSum(Request $request){


        $label_first = '';
        $label_second = '';
        $default = $this->getDefaultDates(self::PREMIUM);
        $dateType = $_GET['dateType'] ?? 'rise';
        $firstPeriod = $_GET['first_period'] ?? $default['first_period'];
        $secondPeriod = $_GET['second_period'] ?? $default['second_period'];
        $firstYear = $_GET['first_year'] ?? $default['first_year'];
        $secondYear = $_GET['second_year'] ?? $default['second_year'];

        $_GET['firstPeriod'] = $firstPeriod;
        $_GET['secondPeriod'] = $secondPeriod;
        $_GET['firstYear'] = $firstYear;
        $_GET['secondYear'] = $secondYear;
        $_GET['dateType'] = $dateType;
        $productId = $_GET['productId'] ?? 0;
        $classId = $_GET['classId'] ?? 0;
        $discount = $_GET['disc'] ?? 0;
        $discount = 1-($discount/100);
        $premium_first = [];
        $premium_second= [];
        $payout_first = [];
        $payout_second = [];
        if($productId == 0)
        {
            $label = $classId == 0 ? 'Рынок' : self::getNameByClassId($classId);
        }
        else
        {
            $label = $this->getProductListWithId()[$productId] ?? 'Рынок';
        }
        foreach (InsuranceCompany::all() as $item){
            $premium_first[$item->id] = 0;
            $premium_second[$item->id] = 0;
            $payout_first[$item->id] = 0;
            $payout_second[$item->id] = 0;
        }
        if(in_array($dateType, $this->dateTypes())){
            if($dateType == 'month')
            {
                $label_first = $this->getMonthLabel()[$firstPeriod].' '.$firstYear;
                $label_second = $this->getMonthLabel()[$secondPeriod].' '.$secondYear;
                if($productId == 0 && $classId == 0)
                {
                    if(($firstYear > 2018 || ($firstYear == 2018 && $firstPeriod >=10))){
                        $dataPrem = ParsePremium::where('year', '=', $firstYear)
                            ->where('month', '=', $firstPeriod)
                            ->where('product_id', '<>', 3)
                            ->get();
                        $dataPay = ParsePayout::where('year', '=', $firstYear)
                            ->where('month', '=', $firstPeriod)
                            ->where('product_id', '<>', 3)
                            ->get();
                        $dataPremSec = ParsePremium::where('year', '=', $secondYear)
                            ->where('month', '=', $secondPeriod)
                            ->where('product_id', '<>', 3)
                            ->get();
                        $dataPaySec = ParsePayout::where('year', '=', $secondYear)
                            ->where('month', '=', $secondPeriod)
                            ->where('product_id', '<>', 3)
                            ->get();
                    }else{
                        $dataPrem = ParsePremium::where('year', '=', $firstYear)
                            ->where('month', '=', $firstPeriod)
                            ->get();
                        $dataPay = ParsePayout::where('year', '=', $firstYear)
                            ->where('month', '=', $firstPeriod)
                            ->get();
                        $dataPremSec = ParsePremium::where('year', '=', $secondYear)
                            ->where('month', '=', $secondPeriod)
                            ->get();
                        $dataPaySec = ParsePayout::where('year', '=', $secondYear)
                            ->where('month', '=', $secondPeriod)
                            ->get();

                    }
                    foreach ($dataPrem as $item){
                        $premium_first[$item->company_id] += $item->product_id == 24 ? $item->sum*$discount : $item->sum;
                    }
                    foreach ($dataPay as $item){
                        $payout_first[$item->company_id] += $item->sum;
                    }
                    foreach ($dataPremSec as $item){
                        $premium_second[$item->company_id] += $item->product_id == 24 ? $item->sum*$discount : $item->sum;
                    }

                    foreach ($dataPaySec as $item){
                        $payout_second[$item->company_id] += $item->sum;
                    }
                }
                elseif ($classId != 0)
                {
                    $classes = [];
                    foreach (InsuranceClasses::where('class_id', '=', $classId)->get() as $item){
                        array_push($classes, $item->product_id);
                    }
                    foreach ($classes as $class){
                        $dataPrem = ParsePremium::where('year', '=', $firstYear)
                            ->where('month', '=', $firstPeriod)
                            ->where('product_id', '=', $class)
                            ->get();
                        $dataPay = ParsePayout::where('year', '=', $firstYear)
                            ->where('month', '=', $firstPeriod)
                            ->where('product_id', '=', $class)
                            ->get();
                        $dataPremSec = ParsePremium::where('year', '=', $secondYear)
                            ->where('month', '=', $secondPeriod)
                            ->where('product_id', '=', $class)
                            ->get();
                        $dataPaySec = ParsePayout::where('year', '=', $secondYear)
                            ->where('month', '=', $secondPeriod)
                            ->where('product_id', '=', $class)
                            ->get();
                        foreach ($dataPrem as $item){
                            $premium_first[$item->company_id] += $item->product_id == 24 ? $item->sum*$discount : $item->sum;
                        }
                        foreach ($dataPay as $item){
                            $payout_first[$item->company_id] += $item->sum;
                        }
                        foreach ($dataPremSec as $item){
                            $premium_second[$item->company_id] += $item->product_id == 24 ? $item->sum*$discount : $item->sum;
                        }
                        foreach ($dataPaySec as $item){
                            $payout_second[$item->company_id] += $item->sum;
                        }
                    }
                }
                else
                {
                    $dataPrem = ParsePremium::where('year', '=', $firstYear)
                        ->where('month', '=', $firstPeriod)
                        ->where('product_id', '=', $productId)
                        ->get();
                    $dataPay = ParsePayout::where('year', '=', $firstYear)
                        ->where('month', '=', $firstPeriod)
                        ->where('product_id', '=', $productId)
                        ->get();
                    $dataPremSec = ParsePremium::where('year', '=', $secondYear)
                        ->where('month', '=', $secondPeriod)
                        ->where('product_id', '=', $productId)
                        ->get();
                    $dataPaySec = ParsePayout::where('year', '=', $secondYear)
                        ->where('month', '=', $secondPeriod)
                        ->where('product_id', '=', $productId)
                        ->get();
                    foreach ($dataPrem as $item){
                        $premium_first[$item->company_id] += $item->product_id == 24 ? $item->sum*$discount : $item->sum;
                    }
                    foreach ($dataPay as $item){
                        $payout_first[$item->company_id] += $item->sum;
                    }
                    foreach ($dataPremSec as $item){
                        $premium_second[$item->company_id] += $item->product_id == 24 ? $item->sum*$discount : $item->sum;
                    }
                    foreach ($dataPaySec as $item){
                        $payout_second[$item->company_id] += $item->sum;
                    }
                }
            }
            elseif($dateType == 'year')
            {
                $label_first = $firstYear;
                $label_second = $secondYear;
                if($productId == 0 && $classId == 0)
                {
                    if($firstYear == 2018) :
                        $dataPrem = ParsePremium::where('year', '=', $firstYear)
                            ->get();
                        $dataPay = ParsePayout::where('year', '=', $firstYear)
                            ->get();
                        $dataPremSec = ParsePremium::where('year', '=', $secondYear)
                            ->get();
                        $dataPaySec = ParsePayout::where('year', '=', $secondYear)
                            ->get();
                        foreach ($dataPrem as $item){
                            $premium_first[$item->company_id] += $item->product_id == 24 ? $item->sum*$discount : $item->sum;
                        }
                        foreach ($dataPay as $item){
                            $payout_first[$item->company_id] += $item->sum;
                        }
                        foreach ($dataPremSec as $item){
                            $premium_second[$item->company_id] += $item->product_id == 24 ? $item->sum*$discount : $item->sum;
                        }
                        foreach ($dataPaySec as $item){
                            $payout_second[$item->company_id] += $item->sum;
                        }
                    elseif($firstYear > 2018) :
                        $dataPrem = ParsePremium::where('year', '=', $firstYear)
                            ->where('product_id', '<>', 3 )
                            ->where('month', '<', 10)
                            ->get();
                        $dataPay = ParsePayout::where('year', '=', $firstYear)
                            ->where('product_id', '<>', 3 )
                            ->where('month', '<', 10)
                            ->get();
                        $dataPremSec = ParsePremium::where('year', '=', $secondYear)
                            ->where('product_id', '<>', 3 )
                            ->where('month', '<', 10)
                            ->get();
                        $dataPaySec = ParsePayout::where('year', '=', $secondYear)
                            ->where('product_id', '<>', 3 )
                            ->where('month', '<', 10)
                            ->get();
                        foreach ($dataPrem as $item){
                            $premium_first[$item->company_id] += $item->product_id == 24 ? $item->sum*$discount : $item->sum;
                        }
                        foreach ($dataPay as $item){
                            $payout_first[$item->company_id] += $item->sum;
                        }
                        foreach ($dataPremSec as $item){
                            $premium_second[$item->company_id] += $item->product_id == 24 ? $item->sum*$discount : $item->sum;
                        }
                        foreach ($dataPaySec as $item){
                            $payout_second[$item->company_id] += $item->sum;
                        }

                        $dataPrem = ParsePremium::where('year', '=', $firstYear)
                            ->where('product_id', '<>', 3 )
                            ->where('month', '>', 9)
                            ->get();
                        $dataPay = ParsePayout::where('year', '=', $firstYear)
                            ->where('product_id', '<>', 3 )
                            ->where('month', '>', 9)
                            ->get();
                        $dataPremSec = ParsePremium::where('year', '=', $secondYear)
                            ->where('product_id', '<>', 3 )
                            ->where('month', '>', 9)
                            ->get();
                        $dataPaySec = ParsePayout::where('year', '=', $secondYear)
                            ->where('product_id', '<>', 3 )
                            ->where('month', '>', 9)
                            ->get();
                        foreach ($dataPrem as $item){
                            $premium_first[$item->company_id] += $item->product_id == 24 ? $item->sum*$discount : $item->sum;
                        }
                        foreach ($dataPay as $item){
                            $payout_first[$item->company_id] += $item->sum;
                        }
                        foreach ($dataPremSec as $item){
                            $premium_second[$item->company_id] += $item->product_id == 24 ? $item->sum*$discount : $item->sum;
                        }
                        foreach ($dataPaySec as $item){
                            $payout_second[$item->company_id] += $item->sum;
                        }
                    else :
                        $dataPrem = ParsePremium::where('year', '=', $firstYear)
                            ->get();
                        $dataPay = ParsePayout::where('year', '=', $firstYear)
                            ->get();
                        $dataPremSec = ParsePremium::where('year', '=', $secondYear)
                            ->get();
                        $dataPaySec = ParsePayout::where('year', '=', $secondYear)
                            ->get();
                        foreach ($dataPrem as $item){
                            $premium_first[$item->company_id] += $item->product_id == 24 ? $item->sum*$discount : $item->sum;
                        }
                        foreach ($dataPay as $item){
                            $payout_first[$item->company_id] += $item->sum;
                        }
                        foreach ($dataPremSec as $item){
                            $premium_second[$item->company_id] += $item->product_id == 24 ? $item->sum*$discount : $item->sum;
                        }
                        foreach ($dataPaySec as $item){
                            $payout_second[$item->company_id] += $item->sum;
                        }
                    endif;

                }
                elseif ($classId != 0)
                {
                    $classes = [];
                    foreach (InsuranceClasses::where('class_id', '=', $classId)->get() as $item){
                        array_push($classes, $item->product_id);
                    }
                    foreach ($classes as $class) {
                        $dataPrem = ParsePremium::where('year', '=', $firstYear)
                            ->where('product_id', '=', $class)
                            ->get();
                        $dataPay = ParsePayout::where('year', '=', $firstYear)
                            ->where('product_id', '=', $class)
                            ->get();
                        $dataPremSec = ParsePremium::where('year', '=', $secondYear)
                            ->where('product_id', '=', $class)
                            ->get();
                        $dataPaySec = ParsePayout::where('year', '=', $secondYear)
                            ->where('product_id', '=', $class)
                            ->get();
                        foreach ($dataPrem as $item) {
                            $premium_first[$item->company_id] += $item->product_id == 24 ? $item->sum*$discount : $item->sum;
                        }
                        foreach ($dataPay as $item) {
                            $payout_first[$item->company_id] += $item->sum;
                        }
                        foreach ($dataPremSec as $item) {
                            $premium_second[$item->company_id] += $item->product_id == 24 ? $item->sum*$discount : $item->sum;
                        }
                        foreach ($dataPaySec as $item) {
                            $payout_second[$item->company_id] += $item->sum;
                        }
                    }
                }
                else
                {
                    $dataPrem = ParsePremium::where('year', '=', $firstYear)
                        ->where('product_id', '=', $productId)
                        ->get();
                    $dataPay = ParsePayout::where('year', '=', $firstYear)
                        ->where('product_id', '=', $productId)
                        ->get();
                    $dataPremSec = ParsePremium::where('year', '=', $secondYear)
                        ->where('product_id', '=', $productId)
                        ->get();
                    $dataPaySec = ParsePayout::where('year', '=', $secondYear)
                        ->where('product_id', '=', $productId)
                        ->get();
                    foreach ($dataPrem as $item){
                        $premium_first[$item->company_id] += $item->product_id == 24 ? $item->sum*$discount : $item->sum;
                    }
                    foreach ($dataPay as $item){
                        $payout_first[$item->company_id] += $item->sum;
                    }
                    foreach ($dataPremSec as $item){
                        $premium_second[$item->company_id] += $item->product_id == 24 ? $item->sum*$discount : $item->sum;
                    }
                    foreach ($dataPaySec as $item){
                        $payout_second[$item->company_id] += $item->sum;
                    }
                }
            }
            elseif($dateType == 'quarter')
            {
                $label_first = $firstPeriod.'кв. '.$firstYear;
                $label_second = $secondPeriod.'кв. '.$secondYear;
                for ($i = 1; $i<=3; $i++){
                    if($productId == 0 && $classId == 0)
                    {
                        if($firstYear == 2019 || ($firstYear == 2018 && $firstPeriod == 4)):
                            $dataPrem = ParsePremium::where('year', '=', $firstYear)
                                ->where('month', '=', ($firstPeriod-1)*3+$i)
                                ->where('product_id', '<>', 3)
                                ->get();
                            $dataPay = ParsePayout::where('year', '=', $firstYear)
                                ->where('month', '=', ($firstPeriod-1)*3+$i)
                                ->where('product_id', '<>', 3)
                                ->get();
                        else :
                            $dataPrem = ParsePremium::where('year', '=', $firstYear)
                                ->where('month', '=', ($firstPeriod-1)*3+$i)
                                ->where('product_id', '<>', 3)
                                ->get();
                            $dataPay = ParsePayout::where('year', '=', $firstYear)
                                ->where('month', '=', ($firstPeriod-1)*3+$i)
                                ->where('product_id', '<>', 3)
                                ->get();
                        endif;

                        if($secondYear == 2019 || ($secondYear == 2018 && $secondPeriod == 4)):
                            $dataPremSec = ParsePremium::where('year', '=', $secondYear)
                                ->where('month', '=', ($secondPeriod-1)*3+$i)
                                ->where('product_id', '<>', 3)
                                ->get();
                            $dataPaySec = ParsePayout::where('year', '=', $secondYear)
                                ->where('month', '=', ($secondPeriod-1)*3+$i)
                                ->where('product_id', '<>', 3)
                                ->get();
                        else :
                            $dataPremSec = ParsePremium::where('year', '=', $secondYear)
                                ->where('month', '=', ($secondPeriod-1)*3+$i)
                                ->get();
                            $dataPaySec = ParsePayout::where('year', '=', $secondYear)
                                ->where('month', '=', ($secondPeriod-1)*3+$i)
                                ->get();
                        endif;
                        foreach ($dataPrem as $item){
                            $premium_first[$item->company_id] += $item->product_id == 24 ? $item->sum*$discount : $item->sum;
                        }
                        foreach ($dataPay as $item){
                            $payout_first[$item->company_id] += $item->sum;
                        }
                        foreach ($dataPremSec as $item){
                            $premium_second[$item->company_id] += $item->product_id == 24 ? $item->sum*$discount : $item->sum;
                        }
                        foreach ($dataPaySec as $item){
                            $payout_second[$item->company_id] += $item->sum;
                        }
                    }
                    elseif($classId != 0)
                    {
                        $classes = [];
                        foreach (InsuranceClasses::where('class_id', '=', $classId)->get() as $item){
                            array_push($classes, $item->product_id);
                        }
                        foreach ($classes as $class) {
                            $dataPrem = ParsePremium::where('year', '=', $firstYear)
                                ->where('month', '=', ($firstPeriod-1)*3+$i)
                                ->where('product_id', '=', $class)
                                ->get();
                            $dataPay = ParsePayout::where('year', '=', $firstYear)
                                ->where('month', '=', ($firstPeriod-1)*3+$i)
                                ->where('product_id', '=', $class)
                                ->get();
                            $dataPremSec = ParsePremium::where('year', '=', $secondYear)
                                ->where('month', '=', ($secondPeriod-1)*3+$i)
                                ->where('product_id', '=', $class)
                                ->get();
                            $dataPaySec = ParsePayout::where('year', '=', $secondYear)
                                ->where('month', '=', ($secondPeriod-1)*3+$i)
                                ->where('product_id', '=', $class)
                                ->get();
                            foreach ($dataPrem as $item){
                                $premium_first[$item->company_id] += $item->product_id == 24 ? $item->sum*$discount : $item->sum;
                            }
                            foreach ($dataPay as $item){
                                $payout_first[$item->company_id] += $item->sum;
                            }
                            foreach ($dataPremSec as $item){
                                $premium_second[$item->company_id] += $item->product_id == 24 ? $item->sum*$discount : $item->sum;
                            }
                            foreach ($dataPaySec as $item){
                                $payout_second[$item->company_id] += $item->sum;
                            }
                        }
                    }
                    else
                    {
                        $dataPrem = ParsePremium::where('year', '=', $firstYear)
                            ->where('month', '=', ($firstPeriod-1)*3+$i)
                            ->where('product_id', '=', $productId)
                            ->get();
                        $dataPay = ParsePayout::where('year', '=', $firstYear)
                            ->where('month', '=', ($firstPeriod-1)*3+$i)
                            ->where('product_id', '=', $productId)
                            ->get();
                        $dataPremSec = ParsePremium::where('year', '=', $secondYear)
                            ->where('month', '=', ($secondPeriod-1)*3+$i)
                            ->where('product_id', '=', $productId)
                            ->get();
                        $dataPaySec = ParsePayout::where('year', '=', $secondYear)
                            ->where('month', '=', ($secondPeriod-1)*3+$i)
                            ->where('product_id', '=', $productId)
                            ->get();
                        foreach ($dataPrem as $item){
                            $premium_first[$item->company_id] += $item->product_id == 24 ? $item->sum*$discount : $item->sum;
                        }
                        foreach ($dataPay as $item){
                            $payout_first[$item->company_id] += $item->sum;
                        }
                        foreach ($dataPremSec as $item){
                            $premium_second[$item->company_id] += $item->product_id == 24 ? $item->sum*$discount : $item->sum;
                        }
                        foreach ($dataPaySec as $item){
                            $payout_second[$item->company_id] += $item->sum;
                        }
                    }
                }
            }
            else
            {
                $label_first = $this->getMonthLabel()[$firstPeriod].' '.$firstYear;
                $label_second = $this->getMonthLabel()[$secondPeriod].' '.$secondYear;
                if($productId == 0 && $classId == 0)
                {
                    for($monthFirst = 1; $monthFirst<=$firstPeriod; $monthFirst++){
                        if($firstYear > 2018 || ($firstYear == 2018 && $monthFirst >= 10)) :
                            $dataPrem = ParsePremium::where('year', '=', $firstYear)
                                ->where('product_id', '<>', 3)
                                ->where('month', '=', $monthFirst)
                                ->get();
                            $dataPay = ParsePayout::where('year', '=', $firstYear)
                                ->where('product_id', '<>', 3)
                                ->where('month', '=', $monthFirst)
                                ->get();
                            foreach ($dataPrem as $item){
                                $premium_first[$item->company_id] += $item->product_id == 24 ? $item->sum*$discount : $item->sum;
                            }
                            foreach ($dataPay as $item){
                                $payout_first[$item->company_id] += $item->sum;
                            }
                        else :
                            $dataPrem = ParsePremium::where('year', '=', $firstYear)
                                ->where('month', '=', $monthFirst)
                                ->get();
                            $dataPay = ParsePayout::where('year', '=', $firstYear)
                                ->where('month', '=', $monthFirst)
                                ->get();
                            foreach ($dataPrem as $item){
                                $premium_first[$item->company_id] += $item->product_id == 24 ? $item->sum*$discount : $item->sum;
                            }
                            foreach ($dataPay as $item){
                                $payout_first[$item->company_id] += $item->sum;
                            }
                        endif;
                    }
                    for ($monthSecond = 1; $monthSecond <= $secondPeriod; $monthSecond++){
                        if($secondYear > 2018 || ($secondYear == 2018 && $monthSecond >= 10)) :
                            $dataPrem = ParsePremium::where('year', '=', $secondYear)
                                ->where('product_id', '<>', 3)
                                ->where('month', '=', $monthSecond)
                                ->get();
                            $dataPay = ParsePayout::where('year', '=', $secondYear)
                                ->where('product_id', '<>', 3)
                                ->where('month', '=', $monthSecond)
                                ->get();
                            foreach ($dataPrem as $item){
                                $premium_second[$item->company_id] += $item->product_id == 24 ? $item->sum*$discount : $item->sum;
                            }
                            foreach ($dataPay as $item){
                                $payout_second[$item->company_id] += $item->sum;
                            }
                        else :
                            $dataPrem = ParsePremium::where('year', '=', $secondYear)
                                ->where('month', '=', $monthSecond)
                                ->get();
                            $dataPay = ParsePayout::where('year', '=', $secondYear)
                                ->where('month', '=', $monthSecond)
                                ->get();
                            foreach ($dataPrem as $item){
                                $premium_second[$item->company_id] += $item->product_id == 24 ? $item->sum*$discount : $item->sum;
                            }
                            foreach ($dataPay as $item){
                                $payout_second[$item->company_id] += $item->sum;
                            }
                        endif;
                    }
                }
                elseif ($classId != 0)
                {
                    $classes = [];
                    foreach (InsuranceClasses::where('class_id', '=', $classId)->get() as $item){
                        array_push($classes, $item->product_id);
                    }
                    foreach ($classes as $class){
                        for($monthFirst = 1; $monthFirst<=$firstPeriod; $monthFirst++) {
                            $dataPrem = ParsePremium::where('year', '=', $firstYear)
                                ->where('month', '=', $monthFirst)
                                ->where('product_id', '=', $class)
                                ->get();
                            $dataPay = ParsePayout::where('year', '=', $firstYear)
                                ->where('month', '=', $monthFirst)
                                ->where('product_id', '=', $class)
                                ->get();
                            foreach ($dataPrem as $item) {
                                $premium_first[$item->company_id] += $item->product_id == 24 ? $item->sum * $discount : $item->sum;
                            }
                            foreach ($dataPay as $item) {
                                $payout_first[$item->company_id] += $item->sum;
                            }
                        }
                        for ($monthSecond = 1; $monthSecond <= $secondPeriod; $monthSecond++){
                            $dataPremSec = ParsePremium::where('year', '=', $secondYear)
                                ->where('month', '=', $monthSecond)
                                ->where('product_id', '=', $class)
                                ->get();
                            $dataPaySec = ParsePayout::where('year', '=', $secondYear)
                                ->where('month', '=', $monthSecond)
                                ->where('product_id', '=', $class)
                                ->get();

                            foreach ($dataPremSec as $item){
                                $premium_second[$item->company_id] += $item->product_id == 24 ? $item->sum*$discount : $item->sum;
                            }
                            foreach ($dataPaySec as $item){
                                $payout_second[$item->company_id] += $item->sum;
                            }
                        }
                    }
                }
                else
                {
                    for($monthFirst = 1;$monthFirst<=$firstPeriod; $monthFirst++){
                        $dataPrem = ParsePremium::where('year', '=', $firstYear)
                            ->where('month', '=', $monthFirst)
                            ->where('product_id', '=', $productId)
                            ->get();
                        $dataPay = ParsePayout::where('year', '=', $firstYear)
                            ->where('month', '=', $monthFirst)
                            ->where('product_id', '=', $productId)
                            ->get();

                        foreach ($dataPrem as $item){
                            $premium_first[$item->company_id] += $item->product_id == 24 ? $item->sum*$discount : $item->sum;
                        }
                        foreach ($dataPay as $item){
                            $payout_first[$item->company_id] += $item->sum;
                        }
                    }
                    for($monthSecond = 1; $monthSecond<=$secondPeriod; $monthSecond++){
                        $dataPremSec = ParsePremium::where('year', '=', $secondYear)
                            ->where('month', '=', $monthSecond)
                            ->where('product_id', '=', $productId)
                            ->get();
                        $dataPaySec = ParsePayout::where('year', '=', $secondYear)
                            ->where('month', '=', $monthSecond)
                            ->where('product_id', '=', $productId)
                            ->get();
                        foreach ($dataPremSec as $item){
                            $premium_second[$item->company_id] += $item->product_id == 24 ? $item->sum*$discount : $item->sum;
                        }
                        foreach ($dataPaySec as $item){
                            $payout_second[$item->company_id] += $item->sum;
                        }
                    }
                }
            }
        }
        arsort($premium_first);
        arsort($premium_second);
        $ranking=[];
        $i = 1;

        foreach ($premium_second as $id => $sum){
            if($premium_first[$id] == 0 && $premium_second[$id] == 0 && $payout_first[$id] == 0 && $payout_second[$id] == 0){
                unset($premium_first[$id]);
                unset($premium_second[$id]);
                unset($payout_first[$id]);
                unset($payout_second[$id]);
            }else{
                $ranking[$id] = $i++;
            }
        }

        return response()->json([
            'success' => true,
            'data' => [
            'premium_first' => $premium_first,
            'premium_second' => $premium_second,
            'payout_first' => $payout_first,
            'payout_second' => $payout_second,
            'companyList' => $this->getCompanyListWithId(),
            'label' => $label,
            'ranking' => $ranking,
            'label_first' => $label_first,
            'label_second' => $label_second,
            'month' => $this->getMonthLabels(),
            'quarter' => $this->getQuarterLabels(),
            ]
        ]);
    }

    public function getPercentOfMarker($value, $all){
        if($all == 0){
            return 0;
        }
        $result = ($value*100)/$all;
        $result = round($result-0.5, 0, PHP_ROUND_HALF_DOWN);
        return $result.'%';
    }

    public function getOpuNewSum(Request $request){

        /**
         * Периоды с фронта
         * $firstYear год от (INT)
         * $secondYear год до (INT)
         * $firstPeriod месяц от (INT)
         * $secondPeriod месяц до (INT)
         */
        $firstYear = $request->first_year;
        $secondYear = $request->second_year;
        $firstPeriod = $request->first_period;
        $secondPeriod = $request->second_period;

        $firstData = ParseOpu::where('month','=', $firstPeriod)->where('year','=', $firstYear)
            ->with('company')
        ->get(['company_id','dsd','net_payout','av','net_ins_income','reserve_changes','fin_changes','invest_income','other_income','kpn','net_income']);

        $secondData = ParseOpu::where('month','=', $secondPeriod)->where('year','=', $secondYear)
            ->get(['company_id','dsd','net_payout','av','net_ins_income','reserve_changes','fin_changes','invest_income','other_income','kpn','net_income']);

        return response()->json([
            'success' => true,
            'data' => [
            'firstData' => $firstData,
            'secondData' => $secondData,
            ]
        ]);

    }

    public function getBalanceNewSum(Request $request){

        /**
         * Периоды с фронта
         * $firstYear год от (INT)
         * $secondYear год до (INT)
         * $firstPeriod месяц от (INT)
         * $secondPeriod месяц до (INT)
         */
        $firstYear = $request->first_year;
        $secondYear = $request->second_year;
        $firstPeriod = $request->first_period;
        $secondPeriod = $request->second_period;

        $firstData = ParseBalance::where('month','=', $firstPeriod)->where('year','=', $firstYear)
            ->with('company')
            ->get(['company_id','cash','deposits','securities','rev_repo','ins_dz','other_dz','other_actives',
                'repo','reserves','rnp','rznu','rpnu','other_liability','retained_earnings']);

        $secondData = ParseBalance::where('month','=', $secondPeriod)->where('year','=', $secondYear)
            ->with('company')
            ->get(['company_id','cash','deposits','securities','rev_repo','ins_dz','other_dz','other_actives',
                'repo','reserves','rnp','rznu','rpnu','other_liability','retained_earnings']);

        return response()->json([
            'success' => true,
            'data' => [
            'firstData' => $firstData,
            'secondData' => $secondData,
            ]
        ]);

    }
}

