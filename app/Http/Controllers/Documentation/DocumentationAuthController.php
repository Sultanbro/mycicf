<?php


namespace App\Http\Controllers\Documentation;

use App\Http\Controllers\Controller;
use App\Library\Services\KiasServiceInterface;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocumentationAuthController extends Controller
{
    public function index()
    {
        if(Auth::check())
        {
            return redirect(route('documentation_main'));
        }
        else
        {
            return view('documentation.pages.login.index');
        }
    }

    public function login(KiasServiceInterface $kias, Request $request)
    {
        $success = true;
        $error_message = '';

        $username = $request->username;
        $password = $request->password;

        $response = $kias->authenticate($username, hash('sha512', $password));

        if($response->error)
        {
            $success = false;
            $error_message = (string)$response->error->text;
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
//            $user->level = $this->getUpperLevel($user->ISN, $kias);
            $user->short_name = $userDetails->ShortName;
            $user->full_name = $userDetails->FullName;
            $user->session_id = $response->Sid;
            $user->dept_isn = $userDetails->DeptISN;

            try {
                $user->save();
                Auth::login($user);
            } catch (\Exception $e) {
                $success = false;
                $error_message = "Ошибка при сохранении пользователя : " . $e->getMessage();
            }
        }

        $response = array(
            'success' => $success,
            'message' => $error_message,
        );

        return response()->json($response);
    }

    public function logout()
    {
        if(Auth::check()) Auth::logout();
        return redirect(route('documentation_auth'));
    }
}
