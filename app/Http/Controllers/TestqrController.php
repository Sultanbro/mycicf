<?php

namespace App\Http\Controllers;

use App\Library\Services\Kias;
use Illuminate\Http\Request;
use App\Library\Services\KiasServiceInterface;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use function Psy\debug;

class TestqrController extends Controller
{
    public function getQR(Request $request)
    {
        $kias = new Kias();
        Log:debug($request->all());
        $success = true;
        $username = $request->username;
        $password = $request->password;
        $qr = $request->qr;
        $result = '';
        $response = $kias->authenticate($username, hash('sha512', $password));
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
