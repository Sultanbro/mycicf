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
        $initSystem = $kias->initSystem($username, $password);    //$username,$password
        $result = '';
        if($initSystem->error){
            $success = false;
            $error = 'Ошибка авторизации';
        } else {
            $result = $kias->request('User_CicCreateAVOTbyQR', [
                'SubjISN' => (int)$initSystem->UserDetails->ISN,
                'QR' => $qr,
                'Sid' => (string)$initSystem->Sid
            ]);
        }
        return response()->json($result)->withCallback($request->input('callback'));
    }
}
