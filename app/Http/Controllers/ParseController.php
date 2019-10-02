<?php

namespace App\Http\Controllers;

use App\InsuranceClasses;
use App\InsuranceCompany;
use App\InsuranceProduct;
use App\ParseFinance;
use App\ParsePayout;
use App\ParsePremium;
use App\ParseStandart;
use App\PreviousName;
use App\PreviousProductName;

use App\Imports\UsersImport;

use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class ParseController extends Controller
{
//DOC TYPES
    public const FINANCE = 1;           //Фин показатели
    public const PREMIUM = 2;           //Отчет по премиям
    public const PAYMENTS = 3;          //Отчет по выплатам
    public const STANDART = 4;          //Отчет по нормативам
    //CLASS OF INSURANCE
    public const COMPULSORY = 1;        //Обязательное
    public const INDIVIDUAL = 2;        //Личное
    public const PROPERTY = 3;          //Имущественное
    //PRODUCT
    public const MST_ID = 3;

    public function company()
    {
        return view('parse/company');
    }
    public function addname()
    {
        $full_name = Request::input('full_name');
        $short_name = Request::input('short_name');
        $model = new InsuranceCompany();
        $model->short_name = $short_name;
        $model->full_name = $full_name;
        $model->save();
    }
    public function parseXlsFinance($name, $year, $month, $startProduct){
        $arr = Excel::toArray(new UsersImport, $name);
        $month = $month == 12 ? 0 : $month;
        $attributes = [];
        foreach ($arr[$month][$startProduct] as $key=>$value) {
            if(in_array($value, $this->getFinanceList())){
                $attrName = $this->getFinanceAttrNameByLabel($value);
                $attributes[$attrName] = $key;
            }
        }
        $company = [];
        for ($i = 6; $i < count($arr[$month]); $i++){
            if(in_array($arr[$month][$i][1], $this->getCompanyListWithHistory())){
                $id = $this->getCompanyIdByName($arr[$month][$i][1]);
                $company[$id] = $i;
            }
        }

        foreach ($company as $cKey => $cId){
            $model = new ParseFinance();
            $model->company_id = $cKey;
            $model->month = $month == 0 ? 12 : $month;
            $model->year = $year;
            foreach ($attributes as $key=>$value){
                if(isset($arr[$month][$cId][$value])){
                    if(in_array($key, ['insurance_premium', 'insurance_payouts'])){
                        $model->$key = $arr[$month][$cId][$value] - $this->getFinancePremiumFromPrevious($month, $year, $cKey, $key);
                    }else{
                        $model->$key = $arr[$month][$cId][$value];
                    }
                }else{
                    $model->$key = 0;
                }
            }
            $model->save();
        }
    }
    public function parseXlsPremium($name, $year,$month, $startProduct)
    {
        $arr = Excel::toArray(new UsersImport, $name);
        $products = [];
        $month = $month == 12 ? 0 : $month;
        foreach ($arr[$month][$startProduct] as $key => $value) {       //7 строка названия продуктов
            if (in_array($value, $this->getProductListWithHistory())) {
                $id = $this->getProductIdByName($value);
                $products[$id] = $key;
            }
        }
        $company = [];
        for ($i = 9; $i < count($arr[$month]); $i++) {
            if (in_array($arr[$month][$i][1], $this->getCompanyListWithHistory())) {
                $id = $this->getCompanyIdByName($arr[$month][$i][1]);
                $company[$id] = $i;
            }
        }
        foreach ($company as $Ckey => $cId) {
            foreach ($products as $PKey => $pId) {
                $model = new ParsePremium();
                if (isset($arr[$month][$cId][$pId])) {
                    $model->company_id = $Ckey;
                    $model->product_id = $PKey;
                    $model->month = $month == 0 ? 12 : $month;
                    $model->year = $year;
                    $model->sum = $arr[$month][$cId][$pId] - $this->getPremiumFromPreviusMonth($month, $year, $Ckey, $PKey);
                    $model->save();
                } else {
                    $model->company_id = $Ckey;
                    $model->product_id = $PKey;
                    $model->month = $month == 0 ? 12 : $month;
                    $model->year = $year;
                    $model->sum = 0 - $this->getPremiumFromPreviusMonth($month, $year, $Ckey, $PKey);
                    $model->save();
                }
            }
        }
    }
    public function parseXlsPayout($name, $year,$month, $startProduct)
    {
        $arr = Excel::toArray(new UsersImport, $name);
        $month = $month == 12 ? 0 : $month;
        $products = [];
        foreach ($arr[$month][$startProduct] as $key => $value) {       //7 строка названия продуктов
            if (in_array($value, $this->getProductListWithHistory())) {
                $id = $this->getProductIdByName($value);
                $products[$id] = $key;
            }
        }
        $company = [];
        for ($i = 9; $i < count($arr[$month]); $i++) {
            if (in_array($arr[$month][$i][1], $this->getCompanyListWithHistory())) {
                $id = $this->getCompanyIdByName($arr[$month][$i][1]);
                $company[$id] = $i;
            }
        }
        foreach ($company as $Ckey => $cId) {
            foreach ($products as $PKey => $pId) {
                $model = new ParsePayout();
                if (isset($arr[$month][$cId][$pId])) {
                    $model->company_id = $Ckey;
                    $model->product_id = $PKey;
                    $model->month = $month == 0 ? 12 : $month;
                    $model->year = $year;
                    $model->sum = $arr[$month][$cId][$pId] - $this->getPayoutFromPreviusMonth($month, $year, $Ckey, $PKey);
                    $model->save();
                } else {
                    $model->company_id = $Ckey;
                    $model->product_id = $PKey;
                    $model->month = $month == 0 ? 12 : $month;
                    $model->year = $year;
                    $model->sum = 0 - $this->getPayoutFromPreviusMonth($month, $year, $Ckey , $PKey);
                    $model->save();
                }
            }
        }
    }
    public function parseXlsStandart($name, $year,$month, $startProduct){
        $arr = Excel::toArray(new UsersImport, $name);
        $month = $month == 12 ? 0 : $month;
        $attribute = null;
        foreach ($arr[$month][$startProduct] as $key => $value) {       //7 строка названия продуктов
            if ($value == 'Норматив маржи платежеспособности ') {
                $attribute = $key;
            }
        }

        if($attribute == null){
            exit;
        }
        $company = [];
        for ($i = 9; $i < count($arr[$month]); $i++){
            if(in_array($arr[$month][$i][1], $this->getCompanyListWithHistory())){
                $id = $this->getCompanyIdByName($arr[$month][$i][1]);
                $company[$id] = $i;
            }
        }
        foreach ($company as $Ckey => $cId) {
            $model = new ParseStandart();
            if (isset($arr[$month][$cId][$attribute])) {
                $model->company_id = $Ckey;
                $model->month = $month == 0 ? 12 : $month;
                $model->year = $year;
                $model->sum = $arr[$month][$cId][$attribute];
                $model->save();
            }else{
                $model->company_id = $Ckey;
                $model->month = $month == 0 ? 12 : $month;
                $model->year = $year;
                $model->sum = 0;
                $model->save();
            }
        }
    }
    public function index(){
        return view('parse/index',[
            'types' => $this->getDocumentType(),
        ]);
    }
    public function upload(){
        $document_type = $_POST['type'];
        $month = (integer)$_POST['month'];
        $year = (integer)$_POST['year'];

        switch ($document_type){
            case self::PREMIUM :
                $model = ParsePremium::where('month' , '=', $month)
                    ->where('year', '=', $year)
                    ->get();
                break;
            case self::PAYMENTS :
                $model = ParsePayout::where('month' , '=', $month)
                    ->where('year', '=', $year)
                    ->get();
                break;
            case self::FINANCE :
                $model = ParseFinance::where('month' , '=', $month)
                    ->where('year', '=', $year)
                    ->get();
                break;
            case self::STANDART :
                $model = ParseStandart::where('month' , '=', $month)
                    ->where('year', '=', $year)
                    ->get();
                break;
            default :
                echo 'Выберите правильный тип документа<br>';
                echo '<a href="'.URL::previous().'">&laquo;назад</a>';
                return;
        }

        if(sizeof($model) > 0){
            echo 'За данный период загруженные данные уже имеются<br>';
            echo '<a href="'.URL::previous().'">&laquo;назад</a>';
            return;
        }

        header('Content-Type: text/plain');
        $filepath = basename($_FILES['xls']['name']);
        $filename = (string)time();
        $filename.= '_'.$document_type.'_'.Session::get('id', '0');;

        $extension = explode(".", strtolower($filepath));
        $filename .= '.'.end($extension);
        $productStart = (integer)$_POST['productStart'] - 1;
        if(move_uploaded_file($_FILES['xls']['tmp_name'], $filename)){
            echo 'Файл загружен<br>';
        }else{
            echo 'Error';
            exit;
        }
        switch ($document_type){
            case 1 :
                echo 'Отчет будет готов через некоторое время<br>';
                $this->parseXlsFinance($filename, $year, $month,$productStart);
                break;
            case 2 :
                echo 'Отчет будет готов через некоторое время<br>';
                $this->parseXlsPremium($filename, $year, $month,$productStart);
                break;
            case 3 :
                echo 'Отчет будет готов через некоторое время<br>';
                $this->parseXlsPayout($filename, $year, $month,$productStart);
                break;
            case 4 :
                echo 'Отчет будет готов через некоторое время<br>';
                $this->parseXlsStandart($filename, $year, $month,$productStart);
                break;
            default :
                echo 'Выберите правильный тип документа<br>';
                echo '<a href="'.URL::previous().'">назад</a>';
                return;
        }
        echo 'Файл загружен';
        echo '<a href="'.URL::previous().'">назад</a>';
    }
    public function getDocumentType(){
        return [
            0 => 'Не выбрано',
            self::FINANCE => 'Финансовые показатели',
            self::PREMIUM => 'Премии',
            self::PAYMENTS => 'Выплаты',
            self::STANDART => 'Норматив маржи',
        ];
    }
    public function getTypes(){
        return [
            self::FINANCE,
            self::PREMIUM,
            self::STANDART,
            self::PAYMENTS
        ];
    }
    public function getCompanyList(){
        $model = InsuranceCompany::all();
        $result = [];
        foreach ($model as $item) {
            array_push($result,
                $item->full_name// => $item->short_name
            );
        }
        return $result;
    }
    public function getProductList(){
        $model = InsuranceProduct::all();
        $result = [];
        foreach ($model as $item) {
            array_push($result,
                $item->full_name// => $item->short_name
            );
        }
        return $result;
    }
    public function getFinanceList(){
        return [
            'Активы',
            'Страховые резервы',
            'Собственный капитал',
            'Уставный капитал',
            'Нераспределенный доход (непокрытый убыток) отчетного периода',
            'Чистая сумма страховых премий',
            'Чистые расходы по осуществлению страховых выплат',
        ];
    }
    public function getCompanyListWithHistory(){
        $model = PreviousName::all();
        $result = [];
        foreach ($model as $item){
            array_push($result, $item->name);
        }
        return $result;
    }
    public function getProductListWithHistory(){
        $model = PreviousProductName::all();
        $result= [];
        foreach ($model as $item) {
            array_push($result, $item->name);
        }
        return $result;
    }
    public function getProductIdByName($row){
        $model = PreviousProductName::where('name', '=', $row)->get()[0]->product_id;
        return $model;
    }
    public function getCompanyIdByName($row){
        $model = PreviousName::where('name','=',$row)->get()[0]->companyId;
        return $model;
    }
    public function getFinanceAttrNameByLabel($name){
        $attributes = [
            'Активы' => 'assets',
            'Страховые резервы' => 'insurance_reserves',
            'Собственный капитал' => 'equity',
            'Уставный капитал' => 'authorized_capital',
            'Нераспределенный доход (непокрытый убыток) отчетного периода' => 'retained_earnings',
            'Чистая сумма страховых премий' => 'insurance_premium',
            'Чистые расходы по осуществлению страховых выплат' => 'insurance_payouts',
        ];
        return $attributes[$name];
    }
    public function getFinanceAttrNameWithLabel(){
        $attributes = [
            'assets' => 'Активы',
            'insurance_reserves' => 'Страховые резервы',
            'equity' => 'Собственный капитал',
            'authorized_capital' => 'Уставный капитал',
            'retained_earnings' => 'Нераспределенный доход (непокрытый убыток) отчетного периода',
            'insurance_premium' => 'Чистая сумма страховых премий',
            'insurance_payouts' => 'Чистые расходы по осуществлению страховых выплат',
        ];
        return $attributes;
    }
    public function getCompanyListWithId(){
        $model = InsuranceCompany::all();
        $result = [];
        foreach ($model as $item) {
            $result[$item->id] = $item->short_name;
        }
        return $result;

    }
    public function getProductListWithId(){
        $model = InsuranceProduct::all();
        $result = [];
        foreach ($model as $item) {
            $result[$item->id] = $item->short_name;
        }
        return $result;

    }
    public function getPremiumFromPreviusMonth($month, $year, $cid, $pid){
        $month = $month == 0 ? 12 : $month;
        if($month>1){
            $sum = 0;
            for($i = 1 ; $i< $month; $i++) :
                $model = ParsePremium::where('month', '=', $i)
                    ->where('year', '=', $year)
                    ->where('company_id', '=', $cid)
                    ->where('product_id', '=', $pid)
                    ->get();
                if(isset($model[0])){
                    $sum+=$model[0]->sum;
                }
            endfor;
            return $sum;
        }else{
            return 0;
        }
    }
    public function getPayoutFromPreviusMonth($month, $year, $cid, $pid){
        $month = $month == 0 ? 12 : $month;

        if($month>1){
            $sum = 0;
            for($i = 1 ; $i< $month; $i++) :
                $model = ParsePayout::where('month', '=', $i)
                    ->where('year', '=', $year)
                    ->where('company_id', '=', $cid)
                    ->where('product_id', '=', $pid)
                    ->get();
                if(isset($model[0])){
                    $sum+=$model[0]->sum;
                }
            endfor;
            return $sum;
        }else{
            return 0;
        }
    }
    public function getFinancePremiumFromPrevious($month, $year, $cid, $attr){
        $month = $month == 0 ? 12 : $month;

        if($month>1){
            $sum = 0;
            for($i = 1 ; $i< $month; $i++) :
                $model = ParseFinance::where('month', '=', $i)
                    ->where('year', '=', $year)
                    ->where('company_id', '=', $cid)
                    ->get();
                if(isset($model[0])){
                    $sum+=$model[0]->$attr;
                }
            endfor;
            return $sum;
        }else{
            return 0;
        }
    }
    public function getFinanceAttributes(){
        return [
            'assets',
            'insurance_reserves',
            'equity',
            'authorized_capital',
            'retained_earnings',
            'insurance_premium',
            'insurance_payouts',
        ];
    }
    public static function getNameByClassId($class_id){
        return self::getNameWithClassId()[$class_id];
    }
    public static function getNameWithClassId(){
        return [
            self::COMPULSORY => 'Обязательное',
            self::PROPERTY => 'Имущественное',
            self::INDIVIDUAL => 'Личное',
        ];
    }
    public function getCompanyTopSum(){
        $label_first = '';
        $label_second = '';
        $default = $this->getDefaultDates(self::PREMIUM);
        $dateType = $_GET['dateType'] ?? 'rise';
        $firstPeriod = $_GET['firstPeriod'] ?? $default['first_period'];
        $secondPeriod = $_GET['secondPeriod'] ?? $default['second_period'];
        $firstYear = $_GET['firstYear'] ?? $default['first_year'];
        $secondYear = $_GET['secondYear'] ?? $default['second_year'];
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
                $label_first = $this->getMonthLabel()[$firstPeriod-1].' '.$firstYear;
                $label_second = $this->getMonthLabel()[$secondPeriod-1].' '.$secondYear;
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
                $label_first = $this->getMonthLabel()[$firstPeriod-1].' '.$firstYear;
                $label_second = $this->getMonthLabel()[$secondPeriod-1].' '.$secondYear;
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
        return view('parse.company', [
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
            'controller' => $this
        ]);
    }
    public function getClassTopSum(){
        $label_first = '';
        $label_second = '';
        $default = $this->getDefaultDates(self::PREMIUM);
        $dateType = $_GET['dateType'] ?? 'rise';
        $firstPeriod = $_GET['firstPeriod'] ?? $default['first_period'];
        $secondPeriod = $_GET['secondPeriod'] ?? $default['second_period'];
        $firstYear = $_GET['firstYear'] ?? $default['first_year'];
        $secondYear = $_GET['secondYear'] ?? $default['second_year'];
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
                $label_first = $this->getMonthLabel()[$firstPeriod-1].' '.$firstYear;
                $label_second = $this->getMonthLabel()[$secondPeriod-1].' '.$secondYear;
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
                $label_first = $this->getMonthLabel()[$firstPeriod - 1] . ' ' . $firstYear;
                $label_second = $this->getMonthLabel()[$secondPeriod - 1] . ' ' . $secondYear;
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

        return view('parse.product', [
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
            'controller' => $this,
        ]);
    }
    public function getFinancialIndicators(){
        $label_first = '';
        $label_second = '';
        $default = $this->getDefaultDates(self::FINANCE);
        $dateType = $_GET['dateType'] ?? 'rise';
        $firstPeriod = $_GET['firstPeriod'] ?? $default['first_period'];
        $secondPeriod = $_GET['secondPeriod'] ?? $default['second_period'];
        $firstYear = $_GET['firstYear'] ?? $default['first_year'];
        $secondYear = $_GET['secondYear'] ?? $default['second_year'];
        $_GET['firstPeriod'] = $firstPeriod;
        $_GET['secondPeriod'] = $secondPeriod;
        $_GET['firstYear'] = $firstYear;
        $_GET['secondYear'] = $secondYear;
        $_GET['dateType'] = 'month';
        $result = [];
        $companyList = $this->getCompanyListWithId();
        foreach ($this->getCompanyListWithId() as $id => $name){
            $result[$id]['assets_first'] = 0;
            $result[$id]['assets_second'] = 0;
            $result[$id]['reserves_first'] = 0;
            $result[$id]['reserves_second'] = 0;
            $result[$id]['capital_first'] = 0;
            $result[$id]['capital_second'] = 0;
            $result[$id]['premium_first'] = 0;
            $result[$id]['premium_second'] = 0;
            $result[$id]['payout_first'] = 0;
            $result[$id]['payout_second'] = 0;
        }
        if(in_array($dateType, $this->dateTypes())){
            if($dateType == 'month') {
                $label_first = $this->getMonthLabel()[$firstPeriod-1].' '.$firstYear;
                $label_second = $this->getMonthLabel()[$secondPeriod-1].' '.$secondYear;

                $firstData = ParseFinance::where('year', '=', $firstYear)
                    ->where('month', '=', $firstPeriod)
                    ->get();
                $secondData = ParseFinance::where('year', '=', $secondYear)
                    ->where('month', '=', $secondPeriod)
                    ->get();
                foreach ($firstData as $data){
                    $result[$data->company_id]['assets_first'] += $data->assets;
                    $result[$data->company_id]['reserves_first'] += $data->insurance_reserves;
                    $result[$data->company_id]['capital_first'] += $data->authorized_capital;
                    $result[$data->company_id]['premium_first'] += $data->insurance_premium;
                    $result[$data->company_id]['payout_first'] += $data->insurance_payouts;
                }
                foreach ($secondData as $data){
                    $result[$data->company_id]['assets_second'] += $data->assets;
                    $result[$data->company_id]['reserves_second'] += $data->insurance_reserves;
                    $result[$data->company_id]['capital_second'] += $data->authorized_capital;
                    $result[$data->company_id]['premium_second'] += $data->insurance_premium;
                    $result[$data->company_id]['payout_second'] += $data->insurance_payouts;
                }
            }
            elseif($dateType == 'year') {
                $label_first = $firstYear;
                $label_second = $secondYear;
                $firstData = ParseFinance::where('year', '=', $firstYear)
                    ->get();
                $secondData = ParseFinance::where('year', '=', $secondYear)
                    ->get();
                foreach ($firstData as $data){
                    $result[$data->company_id]['assets_first'] += $data->assets;
                    $result[$data->company_id]['reserves_first'] += $data->insurance_reserves;
                    $result[$data->company_id]['capital_first'] += $data->authorized_capital;
                    $result[$data->company_id]['premium_first'] += $data->insurance_premium;
                    $result[$data->company_id]['payout_first'] += $data->insurance_payouts;
                }
                foreach ($secondData as $data){
                    $result[$data->company_id]['assets_second'] += $data->assets;
                    $result[$data->company_id]['reserves_second'] += $data->insurance_reserves;
                    $result[$data->company_id]['capital_second'] += $data->authorized_capital;
                    $result[$data->company_id]['premium_second'] += $data->insurance_premium;
                    $result[$data->company_id]['payout_second'] += $data->insurance_payouts;
                }
            }
            else
            {
                $label_first = $firstPeriod.'кв. '.$firstYear;
                $label_second = $secondPeriod.'кв. '.$secondYear;
                for ($i = 1; $i<=3; $i++){
                    $firstData = ParseFinance::where('year', '=', $firstYear)
                        ->where('month', '=', ($firstPeriod-1)*3+$i)
                        ->get();
                    $secondData = ParseFinance::where('year', '=', $secondYear)
                        ->where('month', '=', ($secondPeriod-1)*3+$i)
                        ->get();
                    foreach ($firstData as $data){
                        $result[$data->company_id]['assets_first'] += $data->assets;
                        $result[$data->company_id]['reserves_first'] += $data->insurance_reserves;
                        $result[$data->company_id]['capital_first'] += $data->authorized_capital;
                        $result[$data->company_id]['premium_first'] += $data->insurance_premium;
                        $result[$data->company_id]['payout_first'] += $data->insurance_payouts;
                    }
                    foreach ($secondData as $data){
                        $result[$data->company_id]['assets_second'] += $data->assets;
                        $result[$data->company_id]['reserves_second'] += $data->insurance_reserves;
                        $result[$data->company_id]['capital_second'] += $data->authorized_capital;
                        $result[$data->company_id]['premium_second'] += $data->insurance_premium;
                        $result[$data->company_id]['payout_second'] += $data->insurance_payouts;
                    }
                }
            }
        }
        arsort($result);
        return view('parse/finance', [
            'result' => $result,
            'companyList' => $companyList,
            'label_first' => $label_first,
            'label_second' => $label_second,
            'month' => $this->getMonthLabels(),
            'quarter' => $this->getQuarterLabels(),
        ]);
    }
    public function getCompanyTopSumByPeriod($dateType='month', $firstPeriod=1, $secondPeriod=12, $firstYear=2019, $secondYear=2019, $productId=0){
        $premium = [];
        $payout = [];
        $firstPeriod = (integer)$firstPeriod;
        $secondPeriod = (integer)$secondPeriod;
        $firstYear = (integer)$firstYear;
        $secondYear = (integer)$secondYear;
        foreach (InsuranceCompany::all() as $company){
            $premium[$company->id] = 0;
            $payout[$company->id] = 0;
        }
        $discount=0;
        if(in_array($dateType, $this->dateTypes())){
            if($dateType == 'month')
            {
                if($firstYear == $secondYear)
                {
                    if($firstPeriod == $secondPeriod){
                        if($productId == 0)
                        {
                            $dataPrem = ParsePremium::where('year', '=', $firstYear)
                                ->where('month', '=', $firstPeriod)
                                ->get();
                            $dataPay = ParsePayout::where('year', '=', $firstYear)
                                ->where('month', '=', $firstPeriod)
                                ->get();
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
                        }
                        foreach ($dataPrem as $item){
                            $premium[$item->company_id] += $item->sum*$discount;
                        }
                        foreach ($dataPay as $item){
                            $payout[$item->company_id] += $item->sum*$discount;
                        }
                    }
                    elseif($firstPeriod < $secondPeriod)
                    {
                        for($begin = $firstPeriod; $begin<=$secondPeriod; $begin++){
                            if($productId == 0){
                                $dataPrem = ParsePremium::where('year', '=', $firstYear)
                                    ->where('month', '=', $begin)
                                    ->get();
                                $dataPay = ParsePayout::where('year', '=', $firstYear)
                                    ->where('month', '=', $begin)
                                    ->get();
                            }else{
                                $dataPrem = ParsePremium::where('year', '=', $firstYear)
                                    ->where('month', '=', $begin)
                                    ->where('product_id', '=', $productId)
                                    ->get();
                                $dataPay = ParsePayout::where('year', '=', $firstYear)
                                    ->where('month', '=', $begin)
                                    ->where('product_id', '=', $productId)
                                    ->get();
                            }
                            foreach ($dataPrem as $item){
                                $premium[$item->company_id] += $item->sum*$discount;
                            }
                            foreach ($dataPay as $item){
                                $payout[$item->company_id] += $item->sum*$discount;
                            }
                        }
                    }
                    else
                    {
                        echo 'Второй период должна  быть больше или равна первому';
                    }
                }
                elseif($firstYear < $secondYear){
                    for ($beginYear = $firstYear; $beginYear <= $secondYear; $beginYear++){
                        for($begin = $firstYear == $beginYear ? $firstPeriod : '1'; $begin <= $secondYear == $beginYear ? $secondPeriod : '12'; $begin++){
                            if($productId == 0){
                                $dataPrem = ParsePremium::where('year', '=', $beginYear)
                                    ->where('month', '=', $begin)
                                    ->get();
                                $dataPay = ParsePayout::where('year', '=', $beginYear)
                                    ->where('month', '=', $begin)
                                    ->get();
                            }else{
                                $dataPrem = ParsePremium::where('year', '=', $beginYear)
                                    ->where('month', '=', $begin)
                                    ->where('product_id', '=', $productId)
                                    ->get();
                                $dataPay = ParsePayout::where('year', '=', $beginYear)
                                    ->where('month', '=', $begin)
                                    ->where('product_id', '=', $productId)
                                    ->get();
                            }
                            foreach ($dataPrem as $item){
                                $premium[$item->company_id] += $item->sum*$discount;
                            }
                            foreach ($dataPay as $item){
                                $payout[$item->company_id] += $item->sum*$discount;
                            }
                        }
                    }
                }
                else
                {
                    echo 'ВТОРОЙ ПЕРИОД';
                }
            }
            elseif ($dateType == 'year')
            {
                if($firstYear== $secondYear){
                    if($productId == 0){
                        $data = ParsePremium::where('year', '=', $firstYear)->get();
                        $dataPayout = ParsePayout::where('year', '=', $firstYear)->get();
                    }else{
                        $data = ParsePremium::where('year', '=', $firstYear)
                            ->where('product_id', '=', $productId)->get();
                        $dataPayout = ParsePayout::where('year', '=', $firstYear)
                            ->where('product_id', '=', $productId)->get();
                    }
                    foreach ($data as $item){
                        $premium[$item->company_id] += $item->sum*$discount;
                    }
                    foreach ($dataPayout as $item) {
                        $payout[$item->company_id] += $item->sum*$discount;
                    }
                }
                elseif($firstYear < $secondYear )
                {
                    for ($begin = $firstYear; $begin <= $secondYear; $begin++){
                        if($productId == 0){
                            $data = ParsePremium::where('year', '=', $begin)->get();
                            $dataPayout = ParsePayout::where('year', '=', $begin)->get();
                        }else{
                            $data = ParsePremium::where('year', '=', $begin)
                                ->where('product_id', '=', $productId)->get();
                            $dataPayout = ParsePayout::where('year', '=', $begin)
                                ->where('product_id', '=', $productId)->get();
                        }
                        foreach ($data as $item){
                            $premium[$item->company_id] += $item->sum*$discount;
                        }
                        foreach ($dataPayout as $item) {
                            $payout[$item->company_id] += $item->sum*$discount;
                        }
                    }
                }
                else{
                    echo 'Второй период должна быть больше или равна первому';
                }
            }
            else{
                if($firstYear == $secondYear)
                {
                    for($begin = ($firstPeriod-1)*3+1; $begin<$secondPeriod*3; $begin++){
                        if($productId == 0){
                            $dataPrem = ParsePremium::where('year', '=', $firstYear)
                                ->where('month', '=', $begin)
                                ->get();
                            $dataPay = ParsePayout::where('year', '=', $firstYear)
                                ->where('month', '=', $begin)
                                ->get();
                        }else{
                            $dataPrem = ParsePremium::where('year', '=', $firstYear)
                                ->where('month', '=', $begin)
                                ->where('product_id', '=', $productId)
                                ->get();
                            $dataPay = ParsePayout::where('year', '=', $firstYear)
                                ->where('month', '=', $begin)
                                ->where('product_id', '=', $productId)
                                ->get();
                        }
                        foreach ($dataPrem as $item){
                            $premium[$item->company_id] += $item->sum*$discount;
                        }
                        foreach ($dataPay as $item){
                            $payout[$item->company_id] += $item->sum*$discount;
                        }
                    }
                }
                elseif($firstYear < $secondYear)
                {
                    for ($beginYear = $firstYear; $beginYear <= $secondYear; $beginYear++){
                        for($begin = $firstYear == $beginYear ? ($firstPeriod-1)*3+1 : '1'; $begin <= $secondYear == $beginYear ? ($secondPeriod*3) : '12'; $begin++){
                            if($productId == 0){
                                $dataPrem = ParsePremium::where('year', '=', $beginYear)
                                    ->where('month', '=', $begin)
                                    ->get();
                                $dataPay = ParsePayout::where('year', '=', $beginYear)
                                    ->where('month', '=', $begin)
                                    ->get();
                            }else{
                                $dataPrem = ParsePremium::where('year', '=', $beginYear)
                                    ->where('month', '=', $begin)
                                    ->where('product_id', '=', $productId)
                                    ->get();
                                $dataPay = ParsePayout::where('year', '=', $beginYear)
                                    ->where('month', '=', $begin)
                                    ->where('product_id', '=', $productId)
                                    ->get();
                            }
                            foreach ($dataPrem as $item){
                                $premium[$item->company_id] += $item->sum*$discount;
                            }
                            foreach ($dataPay as $item){
                                $payout[$item->company_id] += $item->sum*$discount;
                            }
                        }
                    }
                }
                else{
                    echo 'error';
                }
            }
        }
        else
        {
            echo 'Выберите правильный тип даты';
        }
    }
    public function getClassTopSumByPeriod($dateType='month', $firstPeriod=1, $secondPeriod=12, $firstYear=2019, $secondYear=2019, $companyId=0){
        $premium = [];
        $payout = [];
        $firstPeriod = (integer)$firstPeriod;
        $secondPeriod = (integer)$secondPeriod;
        $firstYear = (integer)$firstYear;
        $secondYear = (integer)$secondYear;
        foreach (InsuranceProduct::all() as $product){
            $premium[$product->id] = 0;
            $payout[$product->id] = 0;
        }
        $discount=0;
        if(in_array($dateType, $this->dateTypes()))
        {
            if($dateType == 'month')
            {
                if($firstYear == $secondYear)
                {
                    if($firstPeriod == $secondPeriod){
                        if($companyId == 0)
                        {
                            $dataPrem = ParsePremium::where('year', '=', $firstYear)
                                ->where('month', '=', $firstPeriod)
                                ->get();
                            $dataPay = ParsePayout::where('year', '=', $firstYear)
                                ->where('month', '=', $firstPeriod)
                                ->get();
                        }
                        else
                        {
                            $dataPrem = ParsePremium::where('year', '=', $firstYear)
                                ->where('month', '=', $firstPeriod)
                                ->where('company_id', '=', $companyId)
                                ->get();
                            $dataPay = ParsePayout::where('year', '=', $firstYear)
                                ->where('month', '=', $firstPeriod)
                                ->where('company_id', '=', $companyId)
                                ->get();
                        }
                        foreach ($dataPrem as $item){
                            $premium[$item->product_id] += $item->sum*$discount;
                        }
                        foreach ($dataPay as $item){
                            $payout[$item->product_id] += $item->sum*$discount;
                        }
                    }
                    elseif($firstPeriod < $secondPeriod)
                    {
                        for($begin = $firstPeriod; $begin<=$secondPeriod; $begin++){
                            if($companyId == 0){
                                $dataPrem = ParsePremium::where('year', '=', $firstYear)
                                    ->where('month', '=', $begin)
                                    ->get();
                                $dataPay = ParsePayout::where('year', '=', $firstYear)
                                    ->where('month', '=', $begin)
                                    ->get();
                            }else{
                                $dataPrem = ParsePremium::where('year', '=', $firstYear)
                                    ->where('month', '=', $begin)
                                    ->where('company_id', '=', $companyId)
                                    ->get();
                                $dataPay = ParsePayout::where('year', '=', $firstYear)
                                    ->where('month', '=', $begin)
                                    ->where('company_id', '=', $companyId)
                                    ->get();
                            }
                            foreach ($dataPrem as $item){
                                $premium[$item->product_id] += $item->sum*$discount;
                            }
                            foreach ($dataPay as $item){
                                $payout[$item->product_id] += $item->sum*$discount;
                            }
                        }
                    }
                    else
                    {
                        echo 'Error';
                    }
                }
                elseif($firstYear<$secondYear)
                {
                    for ($beginYear = $firstYear; $beginYear <= $secondYear; $beginYear++){
                        for($begin = $firstYear == $beginYear ? $firstPeriod : '1'; $begin <= $secondYear == $beginYear ? $secondPeriod : '12'; $begin++){
                            if($companyId == 0){
                                $dataPrem = ParsePremium::where('year', '=', $beginYear)
                                    ->where('month', '=', $begin)
                                    ->get();
                                $dataPay = ParsePayout::where('year', '=', $beginYear)
                                    ->where('month', '=', $begin)
                                    ->get();
                            }else{
                                $dataPrem = ParsePremium::where('year', '=', $beginYear)
                                    ->where('month', '=', $begin)
                                    ->where('company_id', '=', $companyId)
                                    ->get();
                                $dataPay = ParsePayout::where('year', '=', $beginYear)
                                    ->where('month', '=', $begin)
                                    ->where('company_id', '=', $companyId)
                                    ->get();
                            }
                            foreach ($dataPrem as $item){
                                $premium[$item->product_id] += $item->sum*$discount;
                            }
                            foreach ($dataPay as $item){
                                $payout[$item->product_id] += $item->sum*$discount;
                            }
                        }
                    }
                }
                else
                {
                    echo 'error';
                }
            }
            elseif($dateType == 'year')
            {
                if($firstYear== $secondYear){
                    if($companyId == 0){
                        $data = ParsePremium::where('year', '=', $firstYear)->get();
                        $dataPayout = ParsePayout::where('year', '=', $firstYear)->get();
                    }else{
                        $data = ParsePremium::where('year', '=', $firstYear)
                            ->where('company_id', '=', $companyId)->get();
                        $dataPayout = ParsePayout::where('year', '=', $firstYear)
                            ->where('company_id', '=', $companyId)->get();
                    }
                    foreach ($data as $item){
                        $premium[$item->product_id] += $item->sum*$discount;
                    }
                    foreach ($dataPayout as $item) {
                        $payout[$item->product_id] += $item->sum*$discount;
                    }
                }
                elseif($firstYear < $secondYear )
                {
                    for ($begin = $firstYear; $begin <= $secondYear; $begin++){
                        if($companyId == 0){
                            $data = ParsePremium::where('year', '=', $begin)->get();
                            $dataPayout = ParsePayout::where('year', '=', $begin)->get();
                        }else{
                            $data = ParsePremium::where('year', '=', $begin)
                                ->where('company_id', '=', $companyId)->get();
                            $dataPayout = ParsePayout::where('year', '=', $begin)
                                ->where('company_id', '=', $companyId)->get();
                        }
                        foreach ($data as $item){
                            $premium[$item->product_id] += $item->sum*$discount;
                        }
                        foreach ($dataPayout as $item) {
                            $payout[$item->product_id] += $item->sum*$discount;
                        }
                    }
                }
                else{
                    echo 'Второй период должна быть больше или равна первому';
                }
            }
            else
            {
                if($firstYear == $secondYear)
                {
                    for($begin = ($firstPeriod-1)*3+1; $begin<$secondPeriod*3; $begin++){
                        if($companyId == 0){
                            $dataPrem = ParsePremium::where('year', '=', $firstYear)
                                ->where('month', '=', $begin)
                                ->get();
                            $dataPay = ParsePayout::where('year', '=', $firstYear)
                                ->where('month', '=', $begin)
                                ->get();
                        }else{
                            $dataPrem = ParsePremium::where('year', '=', $firstYear)
                                ->where('month', '=', $begin)
                                ->where('company_id', '=', $companyId)
                                ->get();
                            $dataPay = ParsePayout::where('year', '=', $firstYear)
                                ->where('month', '=', $begin)
                                ->where('company_id', '=', $companyId)
                                ->get();
                        }
                        foreach ($dataPrem as $item){
                            $premium[$item->product_id] += $item->sum*$discount;
                        }
                        foreach ($dataPay as $item){
                            $payout[$item->product_id] += $item->sum*$discount;
                        }
                    }
                }
                elseif($firstYear < $secondYear)
                {
                    for ($beginYear = $firstYear; $beginYear <= $secondYear; $beginYear++){
                        for($begin = $firstYear == $beginYear ? ($firstPeriod-1)*3+1 : '1'; $begin <= $secondYear == $beginYear ? ($secondPeriod*3) : '12'; $begin++){
                            if($companyId == 0){
                                $dataPrem = ParsePremium::where('year', '=', $beginYear)
                                    ->where('month', '=', $begin)
                                    ->get();
                                $dataPay = ParsePayout::where('year', '=', $beginYear)
                                    ->where('month', '=', $begin)
                                    ->get();
                            }else{
                                $dataPrem = ParsePremium::where('year', '=', $beginYear)
                                    ->where('month', '=', $begin)
                                    ->where('company_id', '=', $companyId)
                                    ->get();
                                $dataPay = ParsePayout::where('year', '=', $beginYear)
                                    ->where('month', '=', $begin)
                                    ->where('company_id', '=', $companyId)
                                    ->get();
                            }
                            foreach ($dataPrem as $item){
                                $premium[$item->product_id] += $item->sum*$discount;
                            }
                            foreach ($dataPay as $item){
                                $payout[$item->product_id] += $item->sum*$discount;
                            }
                        }
                    }
                }
                else{
                    echo 'error';
                }
            }
        }
    }
    public function dateTypes(){
        return [
            'month',
            'year',
            'quarter',
            'rise'
        ];
    }
    public function getChangedVal($val1, $val2){
        if($val2 == 0){
            return '0%';
        }
        $result = (($val1*100)/$val2)-100;
        $result = round($result-0.5, 0, PHP_ROUND_HALF_DOWN);
        return $result.'%';
    }
    public function getPercentOfMarker($value, $all){
        if($all == 0){
            return 0;
        }
        $result = ($value*100)/$all;
        $result = round($result-0.5, 0, PHP_ROUND_HALF_DOWN);
        return $result.'%';
    }
    public function getPayoutChange($payout, $premium){
        if($premium == 0){
            return 0;
        }
        $result = (($payout/$premium)*100);
        $result = round($result-0.5, 0, PHP_ROUND_HALF_DOWN);
        return $result.'%';
    }
    public function getChangedValFinance($first, $second){
        if($second == 0 || $first == 0){
            return '0%';
        }else{
            $result = ($first/$second - 1)*100;
            $result = round($result-0.5, 0, PHP_ROUND_HALF_DOWN);
            return $result.'%';
        }
    }
    public function getMonthLabel(){
        return [
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
                $model = ParsePremium::all();
                break;
            case self::PAYMENTS :
                $model = ParsePayout::all();
                break;
            case self::FINANCE :
                $model = ParseFinance::all();
                break;
            default :
                $model = ParsePremium::all();
        }
        $year = 0;
        foreach ($model as $data){
            if($year < (integer)$data->year){
                $year = (integer)$data->year;
            }
        }

        $model = ParsePremium::where('year', '=', $year)->get();
        $month = 1;
        foreach ($model as $data){
            if((integer)$data->month > $month){
                $month = (integer)$data->month;
            }
        }
        $result = [
            'second_period' => $month,
            'first_year' => $year,
            'first_period' => $month,
            'second_year' => $year -1,
        ];

        return $result;
    }
    public static function getSumByCompany($premium){
        $decrement = $premium[self::MST_ID] ?? 0;
        $result = array_sum($premium) - $decrement;
        return $result;
    }
    public function getAddCompany(){
        return view('parse.addCompany');
    }
    public function postAddCompany(Request $request){
        $this->validate($request, [
            'full_name' => 'required|unique:insurance_company|max:255',
            'short_name' => 'required|unique:insurance_company|max:255',
        ]);

        $model = new InsuranceCompany();
        $model->full_name = $request->full_name;
        $model->short_name = $request->short_name;
        if($model->save()){
            $previousName = new PreviousName();
            $previousName->companyId = $model->id;
            $previousName->name = $request->full_name;
            if($previousName->save()){
                echo 'Успешно добавлена';
            }else{
                $model->delete();
                echo 'Ошибка во время добавления';
            }
        }else{
            echo 'Ошибка во время добавления';
        }
    }
    public function getAddProduct(){
        return view('parse.addProduct');
    }
    public function postAddProduct(Request $request){
        $this->validate($request, [
            'full_name' => 'required|unique:insurance_products|max:255',
            'short_name' => 'required|unique:insurance_products|max:255',
        ]);
        $model = new InsuranceProduct();
        $model->full_name = $request->full_name;
        $model->short_name = $request->short_name;
        if($model->save()){
            $previousName = new PreviousProductName();
            $previousName->product_id = $model->id;
            $previousName->name = $request->full_name;
            if($previousName->save()){
                echo 'Успешно добавлена';
            }else{
                $model->delete();
                echo 'Ошибка во время добавления';
            }
        }else{
            echo 'Ошибка во время добавления';
        }
    }
    public function getEditCompany(){
        $list = $this->getCompanyListWithId();
        return view('parse.editCompany', compact('list'));
    }
    public function postEditCompany(Request $request){
        if($request->company_id == ''){
            return  'Выберите компанию';
        }
        $id = $request->company_id;
        if($request->full_name == '' && $request->short_name == ''){
            return  'как миннимум одно из двух текстовых  полей должна быть заполнена';
        }
        $result = '';
        if($request->full_name != ''){
            $previousName = new PreviousName();
            $previousName->companyId = $id;
            $previousName->name = $request->full_name;
            $previousName->save();
            $result .= 'Добавлена полное наименование<br>';
        }

        if($request->short_name != ''){
            $model = InsuranceCompany::findOrFail($id);
            $model->short_name = $request->short_name;
            $model->save();
            $result .= 'Добавлена наименование для вывода';
        }
        return $result;
    }
    public function getEditProduct(){
        $list = $this->getProductListWithId();
        return view('parse.editProduct', compact('list'));
    }
    public function postEditProduct(Request $request){
        if($request->product_id == ''){
            return  'Выберите продукт';
        }
        $id = $request->product_id;
        if($request->full_name == '' && $request->short_name == ''){
            return  'как миннимум одно из двух текстовых  полей должна быть заполнена';
        }
        $result = '';
        if($request->full_name != ''){
            $previousName = new PreviousProductName();
            $previousName->product_id = $id;
            $previousName->name = $request->full_name;
            $previousName->save();
            $result .= 'Добавлена полное наименование<br>';
        }

        if($request->short_name != ''){
            $model = InsuranceProduct::findOrFail($id);
            $model->short_name = $request->short_name;
            $model->save();
            $result .= 'Добавлена наименование для вывода';
        }
        return $result;
    }
    public function getLoadedData(){
        $result = [];
        for($year = 2014; $year <= (integer)date("Y");$year++){
            for($month = 1; $month <= 12 ; $month++){
                $premium = ParsePremium::where('month', $month)
                    ->where('year', $year)
                    ->get();
                $result[$year][$month]['premium'] = sizeof($premium) < 1 ? 0 : 1;

                $payout = ParsePayout::where('month', $month)
                    ->where('year', $year)
                    ->get();
                $result[$year][$month]['payout'] = sizeof($payout) < 1 ? 0 : 1;

                $standart = ParseStandart::where('month', $month)
                    ->where('year', $year)
                    ->get();
                $result[$year][$month]['standart'] = sizeof($standart) < 1 ? 0 : 1;

                $finance = ParseFinance::where('month', $month)
                    ->where('year', $year)
                    ->get();
                $result[$year][$month]['finance'] = sizeof($finance) < 1 ? 0 : 1;
            }
        }
        $types = $this->getDocumentType();
        return view('parse.load',compact('result'), compact('types'));
    }
    public function postDeleteData(Request $request){
        $month = $request->month;
        $year = $request->year;
        $type = $request->type;
        dd([$month, $year, $type]);
        switch ($type){
            case self::FINANCE :
                ParseFinance::where('month', $month)
                    ->where('year', $year)
                    ->delete();
                break;
            case self::PREMIUM :
                ParsePremium::where('month', $month)
                    ->where('year', $year)
                    ->delete();
                break;
            case self::PAYOUT :
                ParsePayout::where('month', $month)
                    ->where('year', $year)
                    ->delete();
                break;
            case self::STANDART :
                ParseStandart::where('month', $month)
                    ->where('year', $year)
                    ->delete();
                break;
            default :
                return 'Выберите правильный тип докмуента';
        }
        return 'Данные за выбранный период удалены';
    }}
