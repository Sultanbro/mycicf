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

    public function getFullName($user_isn){
        $model = Branch::where('kias_id', $user_isn)->first();
        return $model === null ? 'DELETED' : $model->fullname;
    }

    public function getUserData(KiasServiceInterface $kias){
        $response = $kias->getEmplInfo(Auth::user()->ISN, date('01.m.Y'), date('d.m.Y', strtotime('today')));
        $users_data = [
            'Duty' => (string)$response->Duty == "0" ? '???? ??????????????' : (string)$response->Duty,
            'Name' => (string)$response->Name == "0" ? Auth::user()->full_name : (string)$response->Name,
            'Birthday' => (string)$response->Birthday == "0" ? '???? ??????????????' : (string)$response->Birthday,
            'Married' => (string)$response->Married == "0" ? '???? ??????????????' : (string)$response->Married,
            'Education' => (string)$response->Edu == "0" ? '???? ??????????????' : (string)$response->Edu,
            'Rating' => (string)$response->Rating == "0" ? '' : (string)$response->Rating,
            'City' => (string)$response->City == "0" ? '' : (string)$response->City,
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
}
