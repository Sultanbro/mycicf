<?php

namespace App\Http\Controllers;

use App\Branch;
use App\KolesaMarks;
use App\KolesaModel;
use App\KolesaPrices;
use App\Library\Services\Kias;
use App\Library\Services\KiasServiceInterface;
use App\Permissions;
use App\Providers\KiasServiceProvider;
use App\Score;
use App\User;
use App\Dicti;
use App\Region;
use App\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;

class SiteController extends Controller
{
    public function getIndex()
    {
        if(Auth::check())
        {
            return redirect(route('news.index'));
        }

        return view('login');
    }

    public function postLogin(KiasServiceInterface $kias, Request $request)
    {
        $success = true;
        $error = '';
        $username = $request->username;
        $password = $request->password;
        $response = $kias->authenticate($username, hash('sha512', $password));

        if($response->error)
        {
            $success = false;
            $error = (string)$response->error->text;
        }

        if($success && $response->UserDetails)
        {
            $userDetails = $response->UserDetails;
            if(($user = User::where('ISN', $userDetails->ISN)->first()) === null)
            {
                $user = new User();
                $user->ISN = $userDetails->ISN;
            }
            $kias->_sId = $response->Sid;
            $user->username = $username;
            $user->password_hash = hash('sha512', $password);
            $user->level = $this->getUpperLevel($user->ISN, $kias);
            $user->short_name = $userDetails->ShortName;
            $user->full_name = $userDetails->FullName;
            $user->session_id = $response->Sid;
            $user->dept_isn = $userDetails->DeptISN;
            try
            {
                $user->save();
                Auth::login($user);
            }
            catch (\Exception $ex)
            {
                $success = false;
                $error = "Ошибка при сохранении пользователя : ".$ex->getMessage();
            }
        }

        $response = array(
            'success' => $success,
            'error' => $error,
        );
        return response()->json($response)->withCallback($request->input('callback'));
    }

    public function getUpperLevel($ISN, KiasServiceInterface $kias)
    {
        if (in_array($ISN, $this->getTesters()))
        {
            return 1000;
        }

        $response = $kias->getUpperLevel($ISN);
        return $response->ISN ?? $ISN;

    }

    public function postEmplInfo(KiasServiceInterface $kias, Request $request)
    {
        $success = true;
        $error = '';
        $response = $kias->getEmplInfo($request->isn, date('d.m.Y', strtotime($request->datebeg)), date('d.m.Y', strtotime($request->dateend)));
        if ($response->error)
        {
            $success = false;
            $error = (string)$response->error->text;
            $result = array(
                'success' => $success,
                'error' => $error,
            );

            return response()->json($result)->withCallback($request->input('callback'));
        }
        $days = (string)($response->MyDays ?? 0);
        $carier = $vacation = $admins = $sick = $thanks = $mission = null;
        if($success && $response->CARIER->row[0]->datebeg != 0)
        {
            $carier = array();
            foreach ($response->CARIER->row as $row){
                $carier[] = [
                    'Dept' => (string)$row->Dept,
                    'DateBeg' => (string)$row->datebeg,
                    'DateEnd' => (string)$row->dateend,
                    'DutyName' => (string)$row->fullname
                ];
            }
        }

        if($success && isset($response->VACATION->row[0]->period) && $response->VACATION->row[0]->period !== 0)
        {
            $vacation = array();
            foreach ($response->VACATION->row as $row){
                $vacation[] = [
                    'Fullname' => (string)$row->fullname,
                    'Period' => (string)$row->period,
                    'Duration' => (string)$row->duration,
                    'Date' => (string)$row->periodvac,
                    'Rest' => (string)$row->rest,
                ];
            }
        }

        if($success && $response->SICK->row[0]->duration != 0)
        {
            $sick = array();
            foreach ($response->SICK->row as $row){
                $sick[] = [
                    'Duration' => (string)$row->duration,
                    'Period' => (string)$row->period,
                    'Remark' => (string)$row->remark,
                ];
            }
        }

        if($success && $response->ADMINS->row[0]->duration != 0)
        {
            $admins = array();
            foreach ($response->ADMINS->row as $row){
                $admins[] = [
                    'Duration' => (string)$row->duration,
                    'Period' => (string)$row->period,
                    'Remark' => (string)$row->remark,
                ];
            }
        }

        if($success && $response->THANKS->row[0]->docdate!= 0)
        {
            $thanks= array();
            foreach ($response->THANKS->row as $row){
                $thanks[] = [
                    'FullName' => (string)$row->fullname,
                    'DocDate' => (string)$row->docdate,
                    'ExtraPay' => (string)$row->extrapay,
                    'Remark' => (string)$row->remark,
                ];
            }
        }

        if($success && $response->MISSION->row[0]->period!= 0)
        {
            $mission = array();
            foreach ($response->MISSION->row as $row){
                $mission[] = [
                    'City' => (string)$row->CityName,
                    'Period' => (string)$row->period,
                    'Remark' => (string)$row->remark,
                ];
            }
        }

        $result = [
            'CARIER' => $carier,
            'VACATION' => $vacation,
            'ADMINS' => $admins,
            'SICK' => $sick,
            'THANKS' => $thanks,
            'MISSION' => $mission,
            'DAYS' => $days
        ];

        $result = array(
            'success' => $success,
            'error' => $error,
            'result' => $result,
        );

        return response()->json($result)->withCallback($request->input('callback'));
    }

    public function postSimpleInfo(KiasServiceInterface $kias, Request $request)
    {
        $success = true;
        $error = '';
        $response = $kias->getEmplInfo(Auth::user()->ISN, date('01.m.Y'), date('d.m.Y', strtotime('today')));
        if ($response->error)
        {
            $success = false;
            $error = (string)$response->error->text;
            $result = array(
                'success' => $success,
                'error' => $error,
            );

            return response()->json($result)->withCallback($request->input('callback'));
        }

        $result = [
            'response' => $response,
        ];

        $result = array(
            'success' => $success,
            'error' => $error,
            'result' => $result,
        );

        return response()->json($result)->withCallback($request->input('callback'));
    }

    /**
     * TODO Вынести в сервис
     *
     * @return int[]
     */
    public function getTesters()
    {
        return array(
            3921599 => 3921599,
            3600338 => 3600338,
            1445765 => 1445765,
            1445988 => 1445988,
            3611435 => 3611435,
            4334911 => 4334911,
            1490780 => 1490780,
            5012 => 5012,
            266263 => 266263,
            3560197 => 3560197,
            3130949 => 3130949,
            1445721 => 1445721,
            235472 => 235472, // Эльдар Советович
            5011 => 5011,
            4275866 => 4275866,
            766502 => 766502,
            3534147 => 3534147,
            801271 => 801271,
            4555970 => 4555970,
            1287408 => 1287408
        );
    }

    public function getFullBranch(Request $request){
        ini_set('xdebug.max_nesting_level', 500);
        $headData = Branch::where('kias_id', 50)->first();
        $result = [];
        if(count($headData->childs)){
            $result[] = [
                'id' => $headData->kias_id,
                'label' => $headData->fullname,
                'children' => $this->getChild($headData->kias_id),
            ];
        }else{
            $result[] = [
                'id' => $headData->kias_id,
                'label' => $headData->fullname,
            ];
        }
        $responseData = [
            'result' => $result,
            'value' => Auth::user()->ISN,
        ];
        return response()->json($responseData)->withCallback($request->input('callback'));
    }

    public function postBranchData(Request $request)
    {
        $headDept = Auth::user()->level ?? Auth::user()->ISN;
        $headData = Branch::where('kias_id', $headDept)->first();
        $result = [];
        if(count($headData->childs)){
            $result[] = [
                'id' => $headData->kias_id,
                'label' => $headData->fullname,
                'children' => $this->getChild($headData->kias_id),
            ];
        }else{
            $result[] = [
                'id' => $headData->kias_id,
                'label' => $headData->fullname,
            ];
        }
        $responseData = [
            'result' => $result,
            'value' => Auth::user()->ISN,
        ];
        return response()->json($responseData)->withCallback($request->input('callback'));
    }

    public function getChild($parent_id)
    {
        $result = [];
        $data = Branch::where('kias_parent_id', $parent_id)->orderBy('has_child')->get();
        foreach($data as $branchData){
            if(count($branchData->childs)){
                $result[] = [
                    'id' => $branchData->kias_id,
                    'label' => $branchData->fullname,
                    'children' => $this->getChild($branchData->kias_id),
                ];
            }else{
                $result[] = [
                    'id' => $branchData->kias_id,
                    'label' => $branchData->fullname,
                ];
            }
        }
        return $result;
    }

    public function dossier()
    {
        return view('dossier');
    }

    public function getAttachment($ISN, $REFISN, $PICTTYPE, KiasServiceInterface $kias){
        $attachment = $kias->getAttachmentData($REFISN, $ISN, $PICTTYPE);
        if (isset($attachment->FILEDATA, $attachment->FILENAME)) {
            $decoded = base64_decode((string)$attachment->FILEDATA);

            $str = str_replace('\\', '/', (string)$attachment->FILENAME);
            $pathinfo = pathinfo($str);

            header('Content-Description: File Transfer');
            header('Charset: UTF-8');
            header('Content-Type: application/'.$pathinfo['extension']);
            header('Content-Disposition: inline; filename="'.$pathinfo['basename'].'"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            echo $decoded;
        }
    }

    public function getPrintableDocument($ISN, $TEMPLATE, $CLASS, KiasServiceInterface $kias){
        $attachment = $kias->getPrintableDocument($ISN, $TEMPLATE, $CLASS);
        if (isset($attachment->Bytes, $attachment->FileName)) {
            $decoded = base64_decode((string)$attachment->Bytes);

            $str = str_replace('\\', '/', (string)$attachment->FileName);
            $pathinfo = pathinfo($str);
            header('Content-Description: File Transfer');
            header('Charset: UTF-8');
            header('Content-Type: application/'.$pathinfo['extension']);
            header('Content-Disposition: inline; filename="'.$pathinfo['basename'].'"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            echo $decoded;
        }
    }

    public function getUserData(KiasServiceInterface $kias){
        $data = (new User)->getUserData($kias);
        $result = [
            'success' => true,
            'response' => $data,
        ];
        return $result;
    }

    public function getColleagueData(Request $request, KiasServiceInterface $kias){
        $expcept_isns = [248364];

        $response = $kias->getEmplInfo($request->isn, date('01.m.Y'), date('d.m.Y', strtotime('today')));

        if(in_array($request->isn, $expcept_isns)) {
            (string)$response->Married = 0;
        }

        $likes = Score::where('user_isn', $request->isn)->where('type','like')->get()->count();
        $dislikes = Score::where('user_isn',$request->isn)->where('type','dislike')->get()->count();

        $data = [
            'Duty' => (string)$response->Duty == "0" ? 'Не указано' : (string)$response->Duty,
            'Name' => (string)$response->Name == "0" ? (new Branch())->getUserName($request->isn) : (string)$response->Name,
            'Birthday' => (string)$response->Birthday == "0" ? 'Не указано' : (string)$response->Birthday,
            'Married' => (string)$response->Married == "0" ? 'Не указано' : (string)$response->Married,
            'Education' => (string)$response->Edu == "0" ? 'Не указано' : (string)$response->Edu,
            'Rating' => (string)$response->Rating == "0" ? '' : (string)$response->Rating,
            'City' => (string)$response->City == "0" ? '' : (string)$response->City,
            'Likes' => $likes,
            'Dislikes' => $dislikes,
            'isLiked' => (new Score())->getLikedOrDisliked(Auth::user()->ISN, $request->isn, 'like'),
            'isDisLiked' => (new Score())->getLikedOrDisliked(Auth::user()->ISN, $request->isn, 'dislike')
        ];
        $result = [
            'success' => true,
            'response' => $data,
        ];
        return $result;
    }

    public function getMonthLabel(Request $request){
        $result = [];
        foreach (parent::getMonthLabels() as $id => $value){
            $result[] = [
                'id' => $id,
                'label' => $value
            ];
        }
        $response = [
            'success' => true,
            'error' => '',
            'result' => $result,
        ];

        return response()->json($response)->withCallback($request->input('callback'));
    }

    public function addPrice(Request $request){
        $model = new KolesaPrices();
        $model->title = $request->label;
        $model->price = $request->price;
        $model->mark_id = $request->mark_id;
        $model->model_id = $request->model_id;
        $model->year = $request->year;
        $model->ofprice = $request->ofprice ?? '';
        $model->city = $request->city ?? '';
        $model->body = $request->body ?? '';
        $model->volume = $request->volume ?? '';
        $model->transmission = $request->transmission;
        $model->link = $request->link;
        $model->wheel = $request->wheel ?? '';
        $model->color = $request->color ?? '';
        $model->drive = $request->drive ?? '';
        $model->inkz = $request->inkz ?? '';
        $model->vin = $request->vin ?? '';
        $model->milage = $request->milage ?? '';
        try{
            $model->save();
            return response()
                ->json(['success' => true]);
        }catch (\Exception $ex) {
            return response()
                ->json(['success' => false]);
        }
    }

    public function logout(){
        if(Auth::check())
            Auth::logout();
        return redirect('/');
    }

    public function getBranchSearch(Request $request){
        $headData = Branch::where('kias_id', 50)
            ->where('duty','=', '0')
            ->first();
        $result = [];
        if(count($headData->childs)){
            $result[] = [
                'id' => $headData->kias_id,
                'label' => $headData->fullname,
                'children' => $this->getSearchChild($headData->kias_id),
            ];
        }else{
            $result[] = [
                'id' => $headData->kias_id,
                'label' => $headData->fullname,
            ];
        }
        $responseData = [
            'result' => $result,
            'value' => Auth::user()->ISN,
        ];
        return response()->json($responseData)->withCallback($request->input('callback'));
    }

    public function getSearchChild($parent_id){
        $result = [];
        $data = Branch::where('kias_parent_id', $parent_id)
            ->where('duty', '0')
            ->get();
        foreach($data as $branchData){
            if(count($branchData->childs)){
                $result[] = [
                    'id' => $branchData->kias_id,
                    'label' => $branchData->fullname,
                    'children' => $this->getSearchChild($branchData->kias_id),
                ];
            }else{
                $result[] = [
                    'id' => $branchData->kias_id,
                    'label' => $branchData->fullname,
                ];
            }
        }
        return $result;
    }

    public function getMarks(){
        $result = [];
        foreach (KolesaMarks::all()as $item) {
            $result[] = [
                'id' => $item->mark_id,
                'name' => $item->mark_label,
            ];
        }
        return response()->json($result);
    }

    public function getModels(){
        $result = [];
        foreach (KolesaModel::all()as $item) {
            $result[] = [
                'mark_id' => $item->parent_id,
                'id' => $item->model_id,
                'name' => $item->model_name,
            ];
        }
        return response()->json($result);
    }

    public function getPrices(){
        $result = [];
        foreach (KolesaPrices::all() as $item){
            $result[] = [
                'mark_id' => $item->mark_id,
                'model_id' => $item->model_id,
                'year' => $item->year,
                'price' => $item->price,
                'created_at' => $item->created_at,
                'updated_at' => $item->updated_at,
                'ofprice' => $item->ofprice,
                'city' => $item->city,
                'body' => $item->body,
                'volume' => $item->volume,
                'transmission' => $item->transmission,
                'wheel' => $item->wheel,
                'color' => $item->color,
                'drive' => $item->drive,
                'inkz' => $item->inkz,
                'vin' => $item->vin,
                'milage' => $item->milage,
            ];
        }
        return response()->json($result);
    }

    public function showPrices(){
        return Storage::get('public/kolesa_prices.txt');
    }

    /**
     * @param Request $request
     * $mark_id
     * $model_id
     * $year
     */
    public function getPriceByData(Request $request){
        $result = [];
        $model = KolesaPrices::where('link', $request->link)
            ->latest()
            ->first();
        if($model === null){
            return response()->json([
                'code' => 419,
                'error' => 'CarNotFoundException'
            ]);
        }
        return response()->json([
            'code' => 200,
            'price' => $model->offprice
        ]);
    }

    public function getModerators(){
        \Debugbar::startMeasure('SiteController@getModerators');
        $moderators = [];
        foreach (Permissions::whereIn('permission_id', [Permissions::ROLE_SUPERADMIN, Permissions::ROLE_MODERATOR])->get() as $users){
            $moderators[] = $users->user_isn;
        }
        \Debugbar::stopMeasure('SiteController@getModerators');
        return response()->json(['moderators' => $moderators]);
    }

    public function getBirthdays(Request $request) {
        \Debugbar::startMeasure('getBirthdays');
        $d = $request->get('d', date('d', time()));
        $m = $request->get('m', date('m', time()));
        $birthdays = Branch::whereNotNull('birthday')
            ->with('getParent')
            ->whereDay('birthday', '>=', $d)
            ->whereMonth('birthday', $m)
            ->orWhereNotNull('birthday')
            ->whereMonth('birthday', '>', $m)
            ->orderByRaw('MONTH(birthday)')
            ->orderByRaw('DAY(birthday)')
            ->limit(10)
            ->get();
        $result = [];
        $lbDate[0] = $lbDate[1] = null;
        $similarKey = null;

        foreach ($birthdays as $key => $birthday){
            $bDate = explode('.',date('d.m.Y', strtotime($birthday->birthday)));

            if($lbDate[0] == $bDate[0] && $lbDate[1] == $bDate[1]){
                $result[$similarKey]['similar'][] = [
                    "fullname"  => $birthday->fullname,
                    "ISN"       => $birthday->kias_id,
                    "birthday"  => date('d.m.Y', strtotime($birthday->birthday)),
                    "fakeImage" => ! Branch::checkImageExists($birthday->kias_id),
                    "duty"      => $birthday->duty,
                    "dept"      => isset($birthday->getParent->fullname) ? $birthday->getParent->fullname : '',
                    'similar'   => []
                ];
            } else {
                $similarKey = count($result);
                $result[] = [
                    "fullname"  => $birthday->fullname,
                    "ISN"       => $birthday->kias_id,
                    "birthday"  => date('d.m.Y', strtotime($birthday->birthday)),
                    "fakeImage" => ! Branch::checkImageExists($birthday->kias_id),
                    "duty"      => $birthday->duty,
                    "dept"      => isset($birthday->getParent->fullname) ? $birthday->getParent->fullname : '',
                    'similar'   => []
                ];
                $lbDate = explode('.',date('d.m.Y', strtotime($birthday->birthday)));
            }
        }
        \Debugbar::stopMeasure('getBirthdays');
        return response()->json(['birthdays' => $result]);
    }

    public function getBirthdays2(Request $request) {
        $d = $request->get('d', date('d', time()));
        $m = $request->get('m', date('m', time()));
        return cache()->remember(sprintf("birthdays__%s.%s", $m, $d), now()->addDay(), function () use ($d, $m) {
            return Branch::whereNotNull('birthday')
                ->select([
                    'id',
                    'birthday',
                    'kias_id',
                    'fullname'
                ])
                ->with('getParent')
                ->whereDay('birthday', '>=', $d)
                ->whereMonth('birthday', $m)
                ->orWhereNotNull('birthday')
                ->whereMonth('birthday', '>', $m)
                ->orderByRaw('MONTH(birthday)')
                ->orderByRaw('DAY(birthday)')
                ->limit(10)
                ->get()
                ->groupBy(function (Branch $branch) {
                    /**
                     * @var $birthday Carbon
                     */
                    $birthday = $branch->birthday;

                    return implode('-', [
                        str_pad($birthday->day, 2, '0', STR_PAD_LEFT),
                        str_pad($birthday->month, 2, '0', STR_PAD_LEFT),
                    ]);
                });
        });
    }

    public function getDicti(Request $request){
        $kias = new Kias();
        $kias->initSystem();
        $parent = $request->parent;
        $response = $kias->getDictiList($parent);
        $result = [];
        if(isset($response->ROWSET->row)){
            foreach ($response->ROWSET->row as $row){
                $result[] = [
                    'Value' => $row->ISN,
                    'Label' => $row->FULLNAME
                ];
            }
        }
        return response()->json([
            'result' => $result,
            'success' => true,
        ]);
    }

    public function getDictiList($parent){
        $kias = app(KiasServiceInterface::class);
        $kias->initSystem();
        $response = $kias->getDictiList($parent);
        $result = [];
        $result[] = [
            'Value' => null,
            'Label' => 'Не выбрано'
        ];
        if(isset($response->ROWSET->row)){
            foreach ($response->ROWSET->row as $row){
                if($row->N_KIDS == '1'){
                    $child_response = $kias->getDictiList((string)$row->ISN);
                    if(isset($child_response->ROWSET->row)){
                        foreach ($child_response->ROWSET->row as $child_row){
                            $result[] = [
                                'Value' => (string)$child_row->ISN,
                                'Label' => (string)$row->FULLNAME . " " . (string)$child_row->FULLNAME
                            ];
                        }
                    }else{
                        $result[] = [
                            'Value' => (string)$row->ISN,
                            'Label' => (string)$row->FULLNAME
                        ];
                    }
                }else{
                    array_push($result, [
                        'Value' => (string)$row->ISN,
                        'Label' => (string)$row->FULLNAME
                    ]);
                }
            }
        }
        return $result;
    }

    public function getDictiFromBase(Request $request){
        $parent = $request->parent;
        if($request->dictiType == 'regions' || $request->dictiType == 'cities'){
            $response = $request->dictiType == 'regions' ? Region::where('parentisn', $parent)->get() : City::where('parentisn', $parent)->get();
        } else {
            $response = Dicti::where('parent_isn', $parent)->get();
        }
        $result = [];
        if(count($response) > 0){
            foreach ($response as $row){
                $result[] = [
                    'Value' => $row->isn,
                    'Label' => isset($row->fullname) ? $row->fullname : $row->name,
                ];
            }
        }
        return response()->json([
            'result' => $result,
            'success' => true,
        ]);
    }

    public function searchSubject(Request $request, KiasServiceInterface $kias){
        $firstName = $request->firstName ?? '';
        $lastName = $request->lastName ?? '';
        $patronymic = $request->patronymic ?? '';
        $iin = $request->iin ?? '';
        $response = $kias->getSubject($firstName, $lastName, $patronymic, $iin);
        if($response->error){
            return response()->json([
                'success' => false,
                'error' => $response->error->errorText ? (string)$response->error->errorText : (string)$response->error->text,
                'not_found' => false
            ]);
        }
        if(!isset($response->ROWSET->row)){
            return response()->json([
                'success' => false,
                'error' => "Контрагент не найден",
                'not_found' => true
            ]);
        }

        if(count($response->ROWSET->row) > 1){
            $participants = [];
            foreach ($response->ROWSET->row as $row){
                $participants[] = [
                    'ISN' => (string)$row->ISN,
                    'Data' => (string)$row->ORGNAME != null ? (string)$row->ORGNAME . ' (' . (string)$row->ECONOMICNAME . ') ' . (string)$row->COUNTRYNAME : (string)$row->FIRSTNAME . ' ' . (string)$row->LASTNAME . ' ' . (string)$row->PARENTNAME . ' ' . (string)$row->BIRTHDAY . ' ' . (string)$row->COUNTRYNAME
                ];
            }
            $result = [
                'success' => true,
                'count' => count($participants),
                'participant' => $participants,
            ];
        }else{
            $result = [
                'success' => true,
                'count' => 1,
                'participant' => [
                    'extSystemKey' => (string)$response->ROWSET->row->EXTSYSTEMKEY,
                    'ISN' => (string)$response->ROWSET->row->ISN,
                    'IIN' => (string)$response->ROWSET->row->IIN,
                    'FirstName' => (string)$response->ROWSET->row->FIRSTNAME,
                    'LastName' => (string)$response->ROWSET->row->LASTNAME,
                    'Patronymic' => (string)$response->ROWSET->row->PARENTNAME,
                    'OrgName' => (string)$response->ROWSET->row->ORGNAME,
                    'Juridical' => (string)$response->ROWSET->row->JURIDICAL,
                    'docType' => (string)$response->ROWSET->row->DOCCLASSISN,   //DOCCLASSNAME,
                    //'docClassISN' => (string)$response->ROWSET->row->DOCCLASSISN,
                    'docNumber' => $this->hideMiddle((string)$response->ROWSET->row->DOCNO),
                    'docDate' => (string)$response->ROWSET->row->DOCDATE,
                    'email' => $this->obfuscate_email((string)$response->ROWSET->row->EMAIL),
                    'phone' => $this->hidePhone((string)$response->ROWSET->row->PHONE_M != '' ?(string)$response->ROWSET->row->PHONE_M : (string)$response->ROWSET->row->PHONE),
                    'birthDay' => (string)$response->ROWSET->row->BIRTHDAY,
                    'sex' => (string)$response->ROWSET->row->SEXID,
                    'okvdName' => (string)$response->ROWSET->row->OKVDNAME,
                    'economicName' => (string)$response->ROWSET->row->ECONOMICNAME
                ]
            ];
        }
        return response()->json($result);
    }

    /**
     * функция для частичного скрытия email адреса
     * @param $email
     * @return string
     */
    public static function obfuscate_email($email)
    {
        return $email;
        // todo проверить где ожидает null а не ''
        if (strlen($email) == 0) return '';
        $em   = explode("@",$email);
        $name = implode(array_slice($em, 0, count($em)-1), '@');
        $len  = floor(strlen($name)/2);

        return substr($name,0, $len) . str_repeat('*', $len) . "@" . end($em);
    }

    /**
     * ф-я дял частичного скрытия номера телефона
     * @param $phone
     * @return string
     */
    public static function hidePhone($phone){
        return $phone;
        if (strlen($phone) == 0) return '';
        if($phone[0] !== '+'){
            $phone = '+' . $phone;
            $phone[1] = '7';
        }
        $phone[5] = '*';
        $phone[6] = '*';
        $phone[7] = '*';
        return $phone;
    }

    public static function hideMiddle($value){
        return $value;
        if (strlen($value) < 3 || $value == 'НЕ УКАЗАН') return null;
        $textLength = strlen($value);
        return substr_replace($value, '***', ($textLength/2)-1, ($textLength/2)-1);
    }

    public function saveSubject(Request $request, KiasServiceInterface $kias){
        $success = false;
        $new_participant = $request->participant;
        $new_participant['SHORTNAME'] = $new_participant['LASTNAME'];
        $new_participant['JURIDICAL'] = $request->juridical;

        $response = $kias->saveSubject($new_participant);
        if(isset($response->error)){
            $success = false;
            $result = $response->error->text;
        } else {
            $result = 'Данные успешно добавлены';
            $success = true;
        }

        return response()->json([
            'success' => $success,
            'result' => $result
        ]);
    }

    public function setSubject(Request $request, KiasServiceInterface $kias){
        $success = false;
        $error = null;
        $participant = $request->participant;
        $participantData = [];
        $participantArray = $this->participantArray();
        if($participant['juridical'] == 'N'){
            $type = 'physical';
        } else {
            $type = 'juridical';
        }

        foreach($participant as $key => $part) {
            if (isset($participantArray[$type][$key])) {
                $participantData[$participantArray[$type][$key]] = $part;
            }
        }

        $participantData['SHORTNAME'] = $participantData['LASTNAME'];
        //$participantData['PHONE'] = $participantData['PHONE_M'];
        $participantData['JURIDICAL'] = $participant['juridical'];

        $response = $kias->saveSubject($participantData);   //$request->participant['extSystemKey'] == '' ? $kias->setSubject($participantData)
        if(isset($response->error)){
            $success = false;
            $error = (string)$response->error->fulltext;
        } else {
            $success = true;
        }

        return response()->json([
            'success' => $success,
            'error' => $error
        ]);
    }

    public function participantArray(){
        return array(
            'physical' => [
                'extSystemKey' => 'EXTSYSTEMKEY',
                'subjISN' => 'ISN',
                'iin' => 'IIN',
                'firstName' => 'FIRSTNAME',
                'lastName' => 'LASTNAME',
                'patronymic' => 'PARENTNAME',
                'birthDay' => 'BIRTHDAY',
                'docType' => 'DOCCLASSISN',
                'docNumber' => 'DOCNO',
                'docDate' => 'DOCDATE',
                'email' => 'EMAIL',
                'phone' => 'PHONE_M',
                'juridical' => 'JURIDICAL',
                'sex' => 'SEXID',
                //'docClassISN' => 'DOCCLASSISN'
            ],
            'juridical' => [
                'extSystemKey' => 'EXTSYSTEMKEY',
                'subjISN' => 'ISN',
                'iin' => 'IIN',
                'juridical' => 'JURIDICAL',
                'orgName' => 'ORGNAME',
        ]);
    }

    public function parseAuth(){
        if(Session::get('authenticated', false)){
            return redirect('/parse/company');
        }
        return view('auth');
    }

    public function parseLogin(Request $request){
        $username = $request->username;
        $password = $request->password;
        if($username === env('PARSE_LOGIN') && $password === env('PARSE_PASSWORD')){
            Session::put('authenticated', true);
            return redirect('/parse/company');
        }else{
            Session::flush();
            echo "Пароль введен неверно";
        }
    }

    public function testEds(){
        return view('eds');
    }

    public function getEDS(){
        $success = false;
        $curl = curl_init();
        curl_setopt_array($curl,array(
            CURLOPT_URL => "http://ncalayer.uchet.kz:8080/getSignToken",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_POSTFIELDS => "{\n\t\"company_token\":\"7006cebf-82b9-4dbf-9cca-7d35d2eaf763\"\n}",
            CURLOPT_HTTPHEADER => array("Content-Type: application/json"),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $response = json_decode($response);

        //$response = (object)['token' => 'da41ff9e-cb0f-11ea-8948-000c296105aa'];
        //$response = json_decode((string)$response);
        if(isset($response->token)){
            $success = true;
        }
        return response()->json([
            'success' => $success,
            'result' => $response
        ]);
//        $client = new Client();
//        $res = $client->get('http://ncalayer.uchet.kz:8080/getSignToken', ['json' => ['company_token'=>'7006cebf-82b9-4dbf-9cca-7d35d2eaf763']]);
//        echo $res->getBody();
//        echo $res->getStatusCode();
    }

    public function edsByIsn(Request $request,KiasServiceInterface $kias){
        $files = [];
        $ISN = isset($request->refISN) ? $request->refISN : '';
        $type = isset($request->type) ? $request->type : '';
        $format = isset($request->edsType) ? $request->edsType : '';
        $refISN = isset($request->refISN) ? $request->refISN : '';
        $refID = isset($request->refID ) ? $request->refID  : '';
        $docClass = isset($request->docClass ) ? $request->docClass  : '';

        $sigFiles = $kias->getAttachmentPath($type,$refID,$format,$docClass,$refISN,$ISN);
        if(isset($sigFiles->error)){
            return response()->json([
                'success' => false,
                'result' => (string)$sigFiles->error->text
            ]);
        } else {
            foreach ($sigFiles->ROWSET->row as $file) {
                $files[] = ['filepath' => (string)$file->FILEPATH, 'docISN' => (string)$file->ISN];
            }
        }
        $data = (new User)->getUserData($kias);
        return response()->json([
            'success' => true,
            'result' => $files,
            'iin'=>$data
        ]);
    }

    public function saveEdsInfo(Request $request,KiasServiceInterface $kias){
        $data = $request->data;
        $response = $kias->cicSaveEDS($request->refIsn,$request->isn,$data['iin'],$data['name'],'',$data['tspDate'],$data['certificateValidityPeriod'],'');

        if(isset($response->error)){
            return response()->json([
                'success' => false,
                'result' => (string)$response->error->text
            ]);
        }
        //if(isset($response->result)) {
            return response()->json([
                'success' => true
            ]);
        //}
    }
}
