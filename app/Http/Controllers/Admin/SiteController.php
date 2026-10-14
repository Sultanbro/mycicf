<?php

namespace App\Http\Controllers\Admin;

use App\Library\Services\KiasServiceInterface;
use App\Permissions;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{
    public function showLoginForm(){
        if(Auth::check()){
            return redirect('/index');
        }else {
            return view('login');
        }
    }

    public function checkLogin(KiasServiceInterface $kias, Request $request){
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
//        if($success){
//            (new Permissions())->hasPermission($user);
//        }
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
        else
        {
            $response = $kias->getUpperLevel($ISN);
            return $response->ISN ?? $ISN;
        }
    }

    public function getTesters()
    {
        return array(
            3921599 => 3921599,
            3600338 => 3600338,
        );
    }

    public function index(){
        return view('index');
    }
}
