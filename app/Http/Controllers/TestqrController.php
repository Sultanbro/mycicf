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
        $success = true;
        $username = $request->username;
        $password = $request->password;
        $qr = $request->qr;

        $response = $kias->authenticate($username, hash('sha512', $password));
        dd($response);
        if($response->error)
        {
            $success = false;
            $error = 'Ошибка авторизации';
        }
        if($success && $response)
        {
            $result = $kias->request('User_CicCreateAVOTbyQR',[
                'SubjISN' => $response->ISN,
                'QR'=> $qr,
                'Sid'=>$response->Sid
            ]);
        }

        return response()->json($result)->withCallback($request->input('callback'));

    }
}

// на входе логин пароль и qr

// на выходе qr и сессион_id , если все норм получаю SubjISN
