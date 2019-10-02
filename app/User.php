<?php

namespace App;

use App\Library\Services\Kias;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

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
}
