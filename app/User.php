<?php

namespace App;

use App\Library\Services\Kias;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

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
}
