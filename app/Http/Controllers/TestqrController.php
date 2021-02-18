<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Library\Services\KiasServiceInterface;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class TestqrController extends Controller
{
    public function getQR(KiasServiceInterface $kias, Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        $qr = $request->qr;

        $response = $kias->authenticate($username, hash('sha512', $password));

        if($response->error)
        {
            $success = false;
            $error = 'Ошибка авторизации';
        }
        if($success && $response)
        {
            $isn = User::where('ISN', $response->ISN);
            $session = User::where('ISN', $response->Sid);
        }

        $result = $kias->request('User_CicCreateAVOTbyQR',[
            'SubjISN' => $isn,
            'QR'=> $qr,
            'Sid'=>$session
        ]);

        return response()->json($result)->withCallback($request->input('callback'));
    }
}

// на входе логин пароль и qr

// на выходе qr и сессион_id , если все норм получаю SubjISN
