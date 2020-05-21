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
use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use function Couchbase\defaultEncoder;

class ParseController extends Controller
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
            $this->middleware(function ($request, $next) {
                if(Session::get('authenticated', false)){
                    return $next($request);
                }
                if (Auth::user()->ISN !== Auth::user()->level || in_array(Auth::user()->ISN, self::getAcceptedUsers())) {
                    return $next($request);
                }
                abort(403, 'У вас нет доступа для просмотра данной страницы');
                return Redirect::back();
            });
    }

    public static function getAcceptedUsers(){
        $acceptedUsers = [];
        foreach (Permissions::whereIn('permission_id', [Permissions::ROLE_SUPERADMIN, Permissions::ROLE_PARSE])->get() as $user){
            array_push($acceptedUsers, $user->user_isn);
        }
        return $acceptedUsers;
    }

    public function company()
    {
        return view('parse/company');
    }
    public function dealerRaiting()
    {
        return view('dealerRaiting');
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
        return view('parse/index');
    }
    public function getOpuTable(Request $request){
        return view('parse/table-opu',['request' => (object)$request->all()]);
    }
    public function getInfoTable(){
        return view('parse/table-info');
    }
    public function getIndicatorsTable(Request $request){
        return view('parse/table-indicators',['request' => (object)$request->all()]);
    }
    public function upload(Request $request){
        //TODO VALIDATE
        $document_type = $request->type;
        $month = $request->month;
        $year = $request->year;
        if(in_array($document_type, [5,6])){
            $companyId = $request->company;
        }else{
            $productStart = $request->row - 1;
        }
        $model = null;
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
                $model = [];
        }
        if(sizeof($model) > 0){
            $result = [
                'success' => false,
                'error' => 'За данный период загруженные данные уже имеются',
            ];
            return response()->json($result)->withCallback($request->input('callback'));
        }
        try{
            $file = $request->file;
            $contents = $file->get();
            $extension = $file->extension();
            $filePath = "parse/{$document_type}/{$month}_{$year}.{$extension}";
            Storage::disk('local')->put("/public/{$filePath}", $contents);
        }catch (FileException $ex){
            $result = [
                'success' => false,
                'error' => $ex->getMessage(),
            ];
            return response()->json($result)->withCallback($request->input('callback'));
        }
        $filePath = "storage/{$filePath}";
        if($document_type > 6 || $document_type < 1){
            $result = [
                'success' => false,
                'error' => 'Выберите правильный тип документа',
            ];
            return response()->json($result)->withCallback($request->input('callback'));
        }
        $result = [
            'success' => true,
            'error' => '',
        ];
        echo json_encode($result);
        switch ($document_type){
            case self::FINANCE :
                $this->parseXlsFinance($filePath, $year, $month,$productStart);
                break;
            case self::PREMIUM :
                $this->parseXlsPremium($filePath, $year, $month,$productStart);
                break;
            case self::PAYMENTS :
                $this->parseXlsPayout($filePath, $year, $month,$productStart);
                break;
            case self::STANDART :
                $this->parseXlsStandart($filePath, $year, $month,$productStart);
                break;
            case self::OPU :
                $this->parseOpuData($filePath, $year, $month, $companyId);
                break;
            case self::BALANCE :
                $this->parseBalanceData($filePath, $year, $month, $companyId);
                break;
        }
    }
    public function getDocTypes(Request $request){
        $response = [
            'success' => true,
            'error' => '',
            'result' => $this->getDocumentType()
        ];

        return response()->json($response)->withCallback($request->input('callback'));
    }
    public function getDocumentType(){
        return [
            0 => 'Не выбрано',
            self::FINANCE => 'Финансовые показатели',
            self::PREMIUM => 'Премии',
            self::PAYMENTS => 'Выплаты',
            self::STANDART => 'Норматив маржи',
            self::OPU => 'ОПУ',
            self::BALANCE => 'Баланс',
        ];
    }
    public function getTypes(){
        return [
            self::FINANCE,
            self::PREMIUM,
            self::STANDART,
            self::PAYMENTS,
            self::OPU,
            self::BALANCE
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
        $model = PreviousName::where('name','=',$row)->get()[0]->company_id;
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
    public function getCompanies(){
        $model = InsuranceCompany::all();
        $result = [];
        foreach ($model as $item) {
            array_push($result, [
               'id' => $item->id,
               'name' => $item->short_name
            ]);
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
        return view('parse.top-company', [
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

        return view('parse.top-classes', [
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
    /**
     * Получить данные ОПУ по компаниям
     * @param Request $request
     */
    public function getOpuTopSum(Request $request){
        /**
         * $request->company_list
         * Отправляете с фронта список компании в массиве. Миннимум 1, максимум 3
         * массив будет содержать ID компании
         * формат [1,2,3] или [1, 2] или [1]
         */
        $companyList = $request->company_list;

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

        $opu_data = [];
        $percentSymbol = '';

        foreach ($companyList as $company) {
            $first_period = ParseOpu::where('company_id', $company)
                ->where('month', $firstPeriod)
                ->where('year', $firstYear)
                ->orderby('id', 'desc')
                ->first();

            $second_period = ParseOpu::where('company_id', $company)
                ->where('month', $secondPeriod)
                ->where('year', $secondYear)
                ->orderby('id', 'desc')
                ->first();

            $opu_result = [];

            foreach (array_keys($this->getOpuLabels()) as $key) {
                $first = 0;
                $second = 0;
                    if (in_array($key, $this->percentColumns)) {
                        $first_period_key = isset($first_period->$key) ? $first_period->$key == 0.00 ? 0 : $first_period->$key : 0;
                        $second_period_key = isset($second_period->$key) ? $second_period->$key == 0.00 ? 0 : $second_period->$key : 0;
                        $first = $first_period === null ? 0 : $first_period_key * 100;
                        $second = $second_period === null ? 0 : $second_period_key * 100;
                    } else {
                        $first = isset($first_period->$key) ? (int)$first_period->$key : 0;
                        $second = isset($second_period->$key) ? (int)$second_period->$key : 0;
                    }
                array_push($opu_result, [
                    'label' => $this->getOpuLabels()[$key],
                    'firstPeriod' => $first,
                    'secondPeriod' => $second,
                    'changes' => (string)$this->getOpuChanges($first, $second, $firstYear, $secondYear, $firstPeriod, $secondPeriod) . '%',
                ]);
            }

            array_push($opu_data, [
                "companyId" => $company,
                "opuResult" => $opu_result,
            ]);
        }

        $firstPer = DateTime::createFromFormat('!m', $firstPeriod);
        $secondPer = DateTime::createFromFormat('!m', $secondPeriod);
        $firstMonth = $firstPer->format('F');
        $secondMonth = $secondPer->format('F');
        $firstMonth = $this->getMonthsLabel($firstMonth);
        $secondMonth = $this->getMonthsLabel($secondMonth);


        $table_headers = ["Показатели", $firstMonth . " " . $firstYear, $secondMonth . " " . $secondYear, "Изменения", " ", $firstMonth . " " . $firstYear, $secondMonth . " " . $secondYear, "Изменения", " ", $firstMonth . " " . $firstYear, $secondMonth .  " " . $secondYear, "Изменения"];

        return response()->json([
            'success' => true,
            "tableHeaders" => $table_headers,
            'opuData' => $opu_data,
        ]);

//        foreach ($companyList as $company){
//            $opuData = ParseOpu::where('company_id', $company)
//                ->where('month', $firstPeriod)
//                ->where('year', $firstYear)
//                ->first();
//            $tempArray = [];
//            foreach (array_keys($this->getOpuOptions()) as $key){
//                array_push($tempArray, [
//                    $key => $opuData->$key
//                ]);
//            }
//            $firstResult[$company] = $tempArray;
//            $opuData = ParseOpu::where('company_id', $company)
//                ->where('month', $secondPeriod)
//                ->where('year', $secondYear)
//                ->first();
//            $tempArray = [];
//            foreach (array_keys($this->getOpuOptions()) as $key){
//                array_push($tempArray, [
//                    $key => $opuData->$key,
//                ]);
//            }
//            $secondResult[$company] = $tempArray;
//        }
//        return response()
//            ->json([
//                'success' => true,
//                'firstPeriodData' => $firstResult,
//                'secondPeriodData' => $secondResult,
//                'firstPeriodLabel' => $this->getMonthLabel()[$firstPeriod-1].' '.$firstYear,
//                'secondPeriodLabel' => $this->getMonthLabel()[$secondPeriod-1].' '.$secondYear,
//            ]);
    }
    public function getCurrentPeriods($type) {
        try {
            switch ($type) {
                case "OPU":
                    $first_year = ParseOpu::max('year');
                    $first_period = ParseOpu::select('month')->where('year', $first_year)->first();
                    $first_period = $first_period['month'];
                    $company_ids = ParseOpu::select('company_id')->distinct();
                    break;
                case "BALANCE":
                    $first_year = ParseBalance::max('year');
                    $first_period = ParseBalance::select('month')->where('year', $first_year)->first();
                    $first_period = $first_period['month'];
                    $company_ids = ParseBalance::select('company_id')->distinct();
                    break;
                case "INFO":
                    break;
                default:
                    break;
            }
            $second_year = $first_year - 1;
//            $second_year = $first_year;
            $second_period = $first_period;

            $months = [
                1 => "Январь",
                2 => "Февраль",
                3 => "Март",
                4 => "Апрель",
                5 => "Май",
                6 => "Июнь",
                7 => "Июль",
                8 => "Август",
                9 => "Сентябрь",
                10 => "Октябрь",
                11 => "Ноябрь",
                12 => "Декабрь"
            ];

            $periods = [
                "first_year" => $first_year,
                "first_period" => $first_period,
                "second_year" => $second_year,
                "second_period" => $second_period,
            ];
            $companies = [];
            $list = InsuranceCompany::whereIn('id', $company_ids)->get();
            foreach ($list as $comp){
                $companies[$comp->id] = $comp->short_name;
            }
//            $companies = $this->getCompanyListWithId();

            return response()->json([
                "success" => true,
                "months" => $months,
                "periods" => $periods,
                "companies" => $companies,
            ]);
        }
        catch(Exception $e) {
            $e->getMessage();
        }
    }



    private function getMonthsLabel($month_name) {
        $months = [
            "January" => "Январь",
            "February" => "Ферварь",
            "March" => "Март",
            "April" => "Апрель",
            "May" => "Май",
            "June" => "Июнь",
            "July" => "Июль",
            "August" => "Август",
            "September" => "Сентябрь",
            "October" => "Октябрь",
            "November" => "Ноябрь",
            "December" => "Декабрь",
        ];
        foreach($months as $key => $value) {
            if($month_name === $key) {
                return $value;
            }
        }
    }
    private function getOpuChanges($firstPeriod, $secondPeriod, $firstYear, $secondYear, $firstMonth, $secondMonth) {
        $result = 0;
        if($secondPeriod === 0 || $firstPeriod === 0){
            return 0;
        }
        else {
            if($firstYear > $secondYear) {
                $result = round((($firstPeriod/ $secondPeriod)-1) * 100);
            }
            if($secondYear > $firstYear) {
                $result = round((1 - ($secondPeriod / $firstPeriod)) * 100);
            }
            if($secondYear === $firstYear) {
                if($firstMonth > $secondMonth) {
                    $result = round((1 - ($firstPeriod / $secondPeriod)) * 100);
                }
                if($secondMonth > $firstMonth) {
                    $result = round((1 - ($secondPeriod / $firstPeriod)) * 100);
                }
                if($secondMonth === $firstMonth) {
                    $result = 0;
                }
            }
            return $result;
        }
    }
    /**
     * Получить данные Баланс по компаниям
     * @param Request $request
     */
    public function getBalanceTopSum(Request $request){
        /**
         * $request->company_list
         * Отправляете с фронта список компании в массиве. Миннимум 1, максимум 3
         * массив будет содержать ID компании
         * формат [1,2,3] или [1, 2] или [1]
         */
        $companyList = $request->company_list;

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

        $balance_data = [];

        foreach ($companyList as $company) {
            $first_period = ParseBalance::where('company_id', $company)
                ->where('month', $firstPeriod)
                ->where('year', $firstYear)
                ->orderby('id', 'desc')
                ->first();

            $second_period = ParseBalance::where('company_id', $company)
                ->where('month', $secondPeriod)
                ->where('year', $secondYear)
                ->orderby('id', 'desc')
                ->first();

            $balance_result = [];

            foreach (array_keys($this->getBalanceOptions()) as $key) {
                $first = $first_period === null ? 0 : (int)$first_period->$key;
                $second = $second_period === null ? 0 : (int)$second_period->$key;
                array_push($balance_result, [
                    'label' => $this->getBalanceLabels((string)$key),
                    'firstPeriod' => $first,
                    'secondPeriod' => $second,
//                    'changes' => (string)$this->getOpuChanges($first, $second) . '%',
                ]);
            }

            array_push($balance_data, [
                "companyId" => $company,
                "balanceResult" => $balance_result,
            ]);
        }

        $firstPer = DateTime::createFromFormat('!m', $firstPeriod);
        $secondPer = DateTime::createFromFormat('!m', $secondPeriod);
        $firstMonth = $firstPer->format('F');
        $secondMonth = $secondPer->format('F');
        $firstMonth = $this->getMonthsLabel($firstMonth);
        $secondMonth = $this->getMonthsLabel($secondMonth);

        $table_headers = ["Показатели", $firstMonth . " " . $firstYear, $secondMonth . " " . $secondYear, " ", $firstMonth . " " . $firstYear, $secondMonth . " " . $secondYear, " ", $firstMonth . " " . $firstYear, $secondMonth .  " " . $secondYear];

        return response()->json([
            'success' => true,
            "tableHeaders" => $table_headers,
            'balanceData' => $balance_data,
        ]);


//        foreach ($companyList as $company){
//            $opuData = ParseBalance::where('company_id', $company)
//                ->where('month', $firstPeriod)
//                ->where('year', $firstYear)
//                ->first();
//            $tempArray = [];
//            foreach (array_keys($this->getBalanceOptions()) as $key){
//                array_push($tempArray, [
//                    $key => $opuData->$key
//                ]);
//            }
//            $firstResult[$company] = $tempArray;
//            $opuData = ParseBalance::where('company_id', $company)
//                ->where('month', $secondPeriod)
//                ->where('year', $secondYear)
//                ->first();
//            $tempArray = [];
//            foreach (array_keys($this->getBalanceOptions()) as $key){
//                array_push($tempArray, [
//                    $key => $opuData->$key
//                ]);
//            }
//            $secondResult[$company] = $tempArray;
//        }
//        return response()
//            ->json([
//                'success' => true,
//                'firstPeriodData' => $firstResult,
//                'secondPeriodData' => $secondResult,
//                'firstPeriodLabel' => $this->getMonthLabel()[$firstPeriod-1].' '.$firstYear,
//                'secondPeriodLabel' => $this->getMonthLabel()[$secondPeriod-1].' '.$secondYear,
//            ]);
    }
    public function getCompanyTopInfo(Request $request) {
        $companyList = $request->company_list;

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

        $firstResult = [];
        $secondResult = [];
        foreach ($companyList as $company){
            $opuData = ParseOpu::where('company_id', $company)
                ->where('month', $firstPeriod)
                ->where('year', $firstYear)
                ->first();
            $tempArray = [];
            foreach (array_keys($this->getOpuOptions()) as $key){
                array_push($tempArray, [
                    $key => $opuData->$key
                ]);
            }
            $firstResult[$company] = $tempArray;
            $opuData = ParseOpu::where('company_id', $company)
                ->where('month', $secondPeriod)
                ->where('year', $secondYear)
                ->first();
            $tempArray = [];
            foreach (array_keys($this->getOpuOptions()) as $key){
                array_push($tempArray, [
                    $key => $opuData->$key
                ]);
            }
            $secondResult[$company] = $tempArray;
        }
        return response()
            ->json([
                'success' => true,
                'firstPeriodData' => $firstResult,
                'secondPeriodData' => $secondResult,
                'firstPeriodLabel' => $this->getMonthLabel()[$firstPeriod-1].' '.$firstYear,
                'secondPeriodLabel' => $this->getMonthLabel()[$secondPeriod-1].' '.$secondYear,
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
        $_GET['dateType'] = $dateType;
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
            elseif ($dateType == 'rise')
            {
                $label_first = $this->getMonthLabel()[$firstPeriod-1].' '.$firstYear;
                $label_second = $this->getMonthLabel()[$secondPeriod-1].' '.$secondYear;

                $firstData = ParseFinance::where('year', '=', $firstYear)
                    ->where('month', '<=', $firstPeriod)
                    ->get();
                $secondData = ParseFinance::where('year', '=', $secondYear)
                    ->where('month', '<=', $secondPeriod)
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
        return view('parse/top-finance', [
            'result' => $result,
            'companyList' => $companyList,
            'label_first' => $label_first,
            'label_second' => $label_second,
            'month' => $this->getMonthLabels(),
            'quarter' => $this->getQuarterLabels(),
            'controller' => $this
        ]);
    }
    public function getTest(){
        return view('parse/parse');
    }
    public function getMainData(){
        return view('parse/main-data');
    }
    public function getLoginMobile(){
        return view('mobile/login');
    }
    public function getDossierMobile(){
        return view('mobile/dossier');
    }
    public function getMatchingMobile(){
        return view('mobile/matching');
    }
    public function getMatchingIndexMobile(){
        return view('mobile/matching-index');
    }
    public function getTopClasses(){
        return view('parse/top-classes');
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
            'fullname' => 'required|unique:insurance_company|max:255',
            'shortname' => 'required|unique:insurance_company|max:255',
        ]);

        $model = new InsuranceCompany();
        $model->full_name = $request->fullname;
        $model->short_name = $request->shortname;
        if($model->save()){
            $previousName = new PreviousName();
            $previousName->company_id = $model->id;
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
            'fullname' => 'required|max:255',
            'shortname' => 'required|max:255',
        ]);
        $model = new InsuranceProduct();
        $model->full_name = $request->fullname;
        $model->short_name = $request->shortname;
        if($model->save()){
            $previousName = new PreviousProductName();
            $previousName->product_id = $model->id;
            $previousName->name = $request->fullname;
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
        if($request->company == ''){
            return  'Выберите компанию';
        }
        $id = $request->company;
        if($request->fullname == '' && $request->shortname == ''){
            return  'как миннимум одно из двух текстовых  полей должна быть заполнена';
        }
        $result = '';
        if($request->fullname != ''){
            $previousName = new PreviousName();
            $previousName->company_id = $id;
            $previousName->name = $request->fullname;
            $previousName->save();
            $result .= 'Добавлена полное наименование<br>';
        }

        if($request->shortname != ''){
            $model = InsuranceCompany::findOrFail($id);
            $model->short_name = $request->shortname;
            $model->save();
            $result .= 'Добавлена наименование для вывода';
        }
        return $result;
    }
    public function getEditProduct(){
        $list = $this->getProductListWithId();
        return view('parse.editProduct', compact('list'));
    }
    public function postEditProductp(Request $request){
        if($request->product == ''){
            return  'Выберите продукт';
        }
        $id = $request->product;
        if($request->fullname == '' && $request->shortname == ''){
            return  'как миннимум одно из двух текстовых  полей должна быть заполнена';
        }
        $result = '';
        if($request->fullname != ''){
            $previousName = new PreviousProductName();
            $previousName->product_id = $id;
            $previousName->name = $request->fullname;
            $previousName->save();
            $result .= 'Добавлена полное наименование<br>';
        }

        if($request->shortname != ''){
            $model = InsuranceProduct::findOrFail($id);
            $model->short_name = $request->shortname;
            $model->save();
            $result .= 'Добавлена наименование для вывода';
        }
        return $result;
    }
    public function getLoadedData(Request $request){
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

                $opu = ParseOpu::where('month', $month)
                    ->where('year', $year)
                    ->get();
                $result[$year][$month]['opu'] = sizeof($opu) < 1 ? 0 : 1;

                $balance = ParseBalance::where('month', $month)
                    ->where('year', $year)
                    ->get();
                $result[$year][$month]['balance'] = sizeof($balance) < 1 ? 0 : 1;
            }
        }
        return response()->json([
                'success' => true,
                'error' => '',
                'data' => $result
            ])
            ->withCallback(
                $request->input('callback')
            );
    }
    public function postDeleteData(Request $request){
        $month = $request->month;
        $year = $request->year;
        $type = $request->type;
        $success = true;
        $error = '';
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
                $success = false;
                $error = 'Выберите правильный тип докмуента';
        }
        return response()
            ->json([
                'success' => $success,
                'error' => $error,
            ])
            ->withCallback(
                $request->input('callback')
            );
    }
    public function getLoadView(){
        return view('parse.loadData');
    }
    public function getCompanyListAxios(Request $request){
        $result = [];
        foreach($this->getCompanyListWithId() as $id => $value){
            array_push($result, [
                'id' => $id,
                'label' => $value
            ]);
        }
        return response()
            ->json([
                'success' => true,
                'error' => '',
                'result' => $result,
            ])
            ->withCallback(
                $request->input('callback')
            );
    }
    public function getProductListAxios(Request $request){
        $result = [];
        foreach($this->getProductListWithId() as $id => $value){
            array_push($result, [
                'id' => $id,
                'label' => $value
            ]);
        }
        return response()
            ->json([
                'success' => true,
                'error' => '',
                'result' => $result,
            ])
            ->withCallback(
                $request->input('callback')
            );
    }
    public function redirectToCompany(){
        return redirect('/parse/company');
    }
    /** NEW PART */
    public function parseOpuData($filePath, $year, $month, $company_id)
    {
        $arr = Excel::toArray(new UsersImport, $filePath);
        $model = new ParseOpu();
        foreach ($this->getOpuOptions() as $key => $functionsString){
            $value = 0;
            $functions = explode(',', $functionsString);
            foreach ($functions as $function) {
                list($func, $val) = explode('(', $function);
                $val = substr_replace($val,"",-1);
                if(in_array($func, ['add', 'minus'])){
                    if(in_array($val, array_keys($this->getOpuOptions()))){
                        if($func == 'add'){
                            $value += $model->$val;
                        }else{
                            $value -= $model->$val;
                        }
                    }else{
                        $value += $this->$func($arr, $val);
                    }
                }else{
                    list($a,$b) = explode(';',$val);
                    if($model->$b == 0){
                        $value = 0;
                    }else {
                        $value += ($model->$a / $model->$b);
                    }
                }
                $model->$key = $value;
            }
        }
        $model->year=$year;
        $model->month=$month;
        $model->company_id=$company_id;
        $model->save();
    }
    public function getOpuOptions(){
        return [
            'dsd' => 'add(17),add(21),minus(64),add(22)',
            'brut_prem' => 'add(14),add(15),minus(64)',
            'own_ret' => 'division(dsd;brut_prem)',
            'net_payout' => 'add(53),add(54)',
            'lost_perc' => 'division(net_payout;dsd)',
            'av' => 'add(63)',
            'ins_expense' => 'add(net_payout),add(av)',
            'av_perc' => 'division(av;dsd)',
            'net_ins_income' => 'add(dsd),minus(ins_expense)',
            'adm_expenses'=>'add(71)',
            'fot' => 'add(73)',
            'fot_dsd' => 'division(adm_expenses;dsd)',
            'fin_result' => 'add(net_ins_income),minus(adm_expenses)',
            'reserve_changes' => 'add(18),minus(19),add(59),minus(60),add(61),minus(62)',
            'fin_changes' => 'add(fin_result),minus(reserve_changes)',
            'invest_income' => 'add(23),minus(65),minus(70)',
            'other_income' => 'add(43)',
            'other_expenses' => 'add(77)',
            'brut_income' => 'add(fin_changes),add(invest_income),add(other_income),minus(other_expenses)',
            'kpn' => 'add(82)',
            'net_income' => 'add(brut_income),minus(kpn)',
        ];
    }
    public function getOpuLabels(){
        return [
            'dsd' => 'ДСД',
            'brut_prem' => 'Брутто премии',
            'own_ret' => 'Собст. удер',
            'ins_expense' => 'Расходы по страхованию',
            'net_payout' => 'Нетто выплаты',
            'lost_perc' => 'Доля выплат от ДСД%',
            'av' => 'Агентские',
            'av_perc' => 'Доля агентских от ДСД%',
            'net_ins_income' => 'Нетто доход по страхованию',
            'adm_expenses'=>'Административные расходы',
            'fot' => 'ФОТ',
            'fot_dsd' => 'Доля адм. расходов от ДСД',
            'fin_result' => 'Финансовый результат по страхованию',
            'reserve_changes' => 'Изменение резервов',
            'fin_changes' => 'Финансовый результат с учетом резервов',
            'invest_income' => 'Доход по инвестиционной деятельности',
            'other_income' => 'Прочие доходы',
            'other_expenses' => 'Прочие расходы',
            'brut_income' => 'Прибыль до налогов',
            'kpn' => 'КПН',
            'net_income' => 'Чистая прибыль',
//            'ros' => 'ROS',
//            'roa' => 'ROA',
//            'roe' => 'ROE',
//            'cos' => 'COS',
        ];
    }

    public function parseBalanceData($filePath, $year, $month, $company_id){
        $arr = Excel::toArray(new UsersImport, $filePath);
        $model = new ParseBalance();
        foreach ($this->getBalanceOptions() as $key => $functionsString){
            $value = 0;
            $functions = explode(',', $functionsString);
            foreach ($functions as $function) {
                list($func, $val) = explode('(', $function);
                $val = substr_replace($val,"",-1);
                if(in_array($func, ['add', 'minus'])){
                    if(in_array($val, array_keys($this->getBalanceOptions()))){
                        if($func == 'add'){
                            $value += $model->$val;
                        }else{
                            $value -= $model->$val;
                        }
                    }else{
                        $value += $this->$func($arr, $val);
                    }
                }else{
                    list($a,$b) = explode(';',$val);
                    if($model->$b == 0){
                        $value = 0;
                    }else {
                        $value += ($model->$a / $model->$b);
                    }
                }
                $model->$key = $value;
            }
        }
        $model->year=$year;
        $model->month=$month;
        $model->company_id=$company_id;
        $model->save();
    }

    public function getBalanceLabels($label) {
        $balanceLabels = [
            'actives' => 'Активы',
            'cash' => 'Денежные средства',
            'deposits' => 'Вклады',
            'securities' => 'Ценные бумаги',
            'rev_repo' => 'Обратное РЕПО',
            'OS' => 'ОС',
            'NMA' => 'НМА',
            'ins_dz' => 'Страховая ДЗ',
            'other_dz' => 'Прочая ДЗ',
            'other_actives' => 'Прочие активы',
            'liability' => 'Обязательства',
            'repo' => 'РЕПО',
            'reins_calcs' => 'РЕ',
            'middleman_calcs' => 'Расчеты с посредниками',
            'invoices_to_pay' => 'Счета к уплате',
            'other_credits' => 'Прочая кредиторская задолженность',
            'other_liability' => 'Прочие обязательства',
            'reserves' => 'Резервы',
            'rnp' => 'РНП',
            'rznu' => 'РЗНУ',
            'rpnu' => 'РПНУ',
            'capital' => 'Капитал',
            'authorized_capital' => 'Уставной капитал',
            'other_rezerves' => 'Прочие резервы',
            'retained_earnings' => 'Нераспределенная прибыль',
            'current_period' => '- отчетного периода',
            'last_years' => '- предыдущих лет',
        ];

        foreach ($balanceLabels as $key => $value) {
            if($key === $label) {
                return $value;
            }
        }
    }

    public function getBalanceOptions(){
        return [
            'actives' => 'add(41)',
            'cash' => 'add(14)',
            'deposits' => 'add(15)',
            'securities' => 'add(16),add(17)',
            'rev_repo' => 'add(18)',
            'OS' => 'add(35),add(36),add(37),add(38)',
            'NMA' => 'add(39)',
            'ins_dz' => 'add(26)',
            'other_dz' => 'add(28)',
            'other_actives' => 'add(19),add(20),add(27),add(29),add(30),add(31),add(32),add(33),add(34),add(40)',
            'liability' => 'add(62)',
            'repo' => 'add(55)',
            'reins_calcs' => 'add(49)',
            'middleman_calcs' => 'add(50)',
            'invoices_to_pay' => 'add(52)',
            'other_credits' => 'add(53)',
            'other_liability' => 'add(48),add(51),add(54),add(56),add(57),add(58),add(59),add(60),add(61)',
            'reserves' => 'add(rnp),add(rznu),add(rpnu)',
            'rnp' => 'add(43),minus(21)',
            'rznu' => 'add(47),minus(25)',
            'rpnu' => 'add(46),minus(22)',
            'capital' => 'add(75)',
            'authorized_capital' => 'add(64)',
            'other_rezerves' => 'add(66),add(68),add(69),add(70)',
            'retained_earnings' => 'add(71)',
            'current_period' => 'add(74)',
            'last_years' => 'add(73)',
        ];
    }

    public function add($arr, $number){
        return $arr[0][$number-1][2] == null ? 0 : (double)$arr[0][$number-1][2];
    }
    public function minus($arr, $number){
        return $arr[0][$number-1][2] == null ? 0 : -1*($arr[0][$number-1][2]);
    }

    public function getAddInfo(){
        $list = $this->getCompanyListWithId();
        return view('parse.addInfo', compact('list'));
    }

    public function postAddInfo(Request $request){
        $company = $request->company;
        $year = $request->year;
        $month = $request->month;
        $rating = $request->fullname;
        $model = new ParseInfo();
        $model->company_id = $company;
        $model->month = $month;
        $model->year = $year;
        $model->rating = $rating;
        $model->save();
        return response()
            ->json([
               'success' => true
            ]);
    }
}

