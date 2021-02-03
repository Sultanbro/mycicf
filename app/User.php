<?php

namespace App;

use App\Library\Services\Kias;
use App\Library\Services\KiasServiceInterface;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

/**
 * Class User
 * @package App
 * @property integer $ISN
 * @property string $username
 * @property string $password_hash
 * @property integer $level
 * @property string $short_name
 * @property string $full_name
 * @property string $session_id
 * @property integer $dept_isn
 */
class User extends Authenticatable
{
    const SENATE_ISN = 999999999;
    const READING_CLUB_ISN = 999999998;
    const DIRECTOR_LABEL = "Председатель Правления";
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function getCoordinationCount(){
//        'User_CicCountEmplCoordination';     EmplISN
        try{
            $session = null;
            if(Auth::check()){
                $session = Auth::user()->session_id;
            }
            $kias = app(KiasServiceInterface::class);
            $kias->init($session);
            $count = (string)$kias->getCoordinationCount(Auth::user()->ISN)->MyCoord;
            return $count;
        }catch (\Exception $ex){
            return 0;
        }
    }

    public function branch(){
        return $this->hasOne('App\Branch', 'kias_id', 'ISN');
    }

    public function checkSession(){
        $kias = new Kias();
        $response = $kias->request('User_CicHelloSvc', []);
        if(!$response->error){
            return false;
        }
        return true;
    }

    public function reAuthenticate(){
        $kias = new Kias();
        $kias->init(null);
        $response = $kias->authenticate(Auth::user()->username, Auth::user()->password_hash);
        if($response->error){
            Auth::logout();
            return false;
        }
        $User = Auth::user();
        $User->session_id = $response->Sid;
        $User->save();
        return true;
    }

    public static function checkIsDirector(){
        return Auth::user()->branch->duty == self::DIRECTOR_LABEL ? 'true' : 'false';
    }

    public function getFullName($user_isn){
        if($user_isn === User::SENATE_ISN){
            return 'Сенат';
        }else if($user_isn === User::READING_CLUB_ISN){
            return 'Читательский клуб';
        }
        $model = Branch::where('kias_id', $user_isn)->first();
        return $model === null ? 'DELETED' : $model->fullname;
    }

    public function getUserData(KiasServiceInterface $kias){
        $response = $kias->getEmplInfo(Auth::user()->ISN, date('01.m.Y'), date('d.m.Y', strtotime('today')));
        $users_data = [
            'Duty' => (string)$response->Duty == "0" ? 'Не указано' : (string)$response->Duty,
            'Name' => (string)$response->Name == "0" ? Auth::user()->full_name : (string)$response->Name,
            'Birthday' => (string)$response->Birthday == "0" ? '' : (string)$response->Birthday,
            'Married' => (string)$response->Married == "0" ? '' : (string)$response->Married,
            'Education' => (string)$response->Edu == "0" ? '' : (string)$response->Edu,
            'Rating' => (string)$response->Rating == "0" ? '' : (string)$response->Rating,
            'City' => (string)$response->City == "0" ? '' : (string)$response->City,
            'Avarcom' => (string)$response->Avarcom,
            'MyDZ' => (string)$response->MyDZ,
        ];
        return $users_data;
    }

    public static function isSuperAdmin(){
        return (new Permissions())->checkUser([Permissions::ROLE_SUPERADMIN]);
    }

    public static function isParseAdmin(){
        return (new Permissions())->checkUser([Permissions::ROLE_PARSE]);
    }

    public static function isOtdeKadrovAdmin(){
        return (new Permissions())->checkUser([Permissions::ROLE_OTDELKADROV]);
    }

    public static function isWNDAdmin(){
        return (new Permissions())->checkUser([Permissions::ROLE_WND]);
    }

    public static function isSenateAdmin(){
        return (new Permissions())->checkUser([Permissions::ROLE_SENATE]);
    }

    public static function isReadingClubAdmin(){
        return (new Permissions())->checkUser([Permissions::ROLE_READING_CLUB]);
    }

    public static function isProductsAdmin(){
        return (new Permissions())->checkUser([Permissions::ROLE_PRODUCTS]);
    }

    public static function isKurators(){
        return (new Kurators())->checkUser([kurators::ROLE_KURATORS]);
    }

    public static function getMotivationDepartments(){
        return [
            "1445780", "1445781", "1445783", "1445783", "4100260",
            "4100283", "4100326", "4100328", "4100332", "4100334",
            "3629955", "3991836", "3991842", "1445786", "1445822",
            "1445735", "1445814", "1445818", "1445820", "1445821",
            "1445825", "1445827", "1445828", "1445833", "1445834",
            "1445801", "1445802", "1445805", "1497575", "3367227",
            "3436143", "1445823", "1445797", "1445798", "1445799",
            "1445789", "1445790", "1445791", "1445792", "1445793",
            "1445824", "1445826", "3492324", "3492327", "4380822",
            "3994433", "3994439", "3436136", "3994444",


            "1445780", "1445781", "1445783", "1445783", "4100260",
            "4100283", "4100326", "4100328", "4100332", "4100334",
            "3629955", "3991836", "3991842", "1445786", "2000",
            "1445735", "1445814", "1445818", "1445820", "1445821",
            "1445822", "1445823", "1445825", "1445827", "1445828",
            "1445833", "1445834", "1445797", "1445798", "1445799",
            "1445801", "1445802", "1445805", "1497575", "3367227",
            "3436143", "1445789", "1445790", "1445791", "1445792",
            "1445793", "1445824", "1445826", "3492324", "3492327",
            "4380822", "3994433", "3994439", "3436136", "3994444"

        ];
    }

    public function checkMotivationPermission($ISN){
        if(in_array(Auth::user()->level, [50,1000]) || Auth::user()->dept_isn === 3436136){
            return true;
        }
        if(Auth::user()->level == Auth::user()->ISN){
            return false;
        }
        $permitted = $this->getChildElements(Auth::user()->level);
        return in_array($ISN, $permitted);
    }

    public function getChildElements($level){
        $result = [];
        $data = Branch::where('kias_parent_id', $level)->get();
        foreach ($data as $value){
            if(count($value->childs)){
                array_merge($result, $this->getChildElements($value->kias_id));
            }else{
                array_push($result, $value->kias_id);
            }
        }
        return $result;
    }

    public static function getCentcoinExcepts(){
        return array(
            'Председатель Правления',
            'Заместитель Председателя Правления по финансам',
            'Заместитель Председателя Правления',
            'Советник Председателя Правления',
            'Управляющий директор - член Правления',
            'Управляющий Директор',
            'Главный Бухгалтер',
            'Комплаенс-Контролер',
            'Риск-Менеджер',
            'Директор Департамента',
        );
    }
}
