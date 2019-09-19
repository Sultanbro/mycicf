<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Library\Services\KiasServiceInterface;
use App\Providers\KiasServiceProvider;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{
    public function getIndex()
    {
        if(Auth::check())
        {
            return redirect('/dossier');
        }
        else
        {
            return view('login');
        }
    }

    public function postLogin(KiasServiceInterface $kias, Request $request)
    {
        $success = true;
        $error = '';
        $username = $request->username;
        $password = $request->password;
        $response = $kias->authenticate($username, hash('sha512', $password));
        if($response->error)
        {
            $success = false;
            $error = 'Неверный логин или пароль';
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
            try
            {
                $user->save();
                Auth::login($user);
            }
            catch (\Exception $ex)
            {
                $success = false;
                $error = $ex->getMessage();
            }
        }
        else
        {
            $success = false;
            $error = 'Undefined';
        }
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

    public function postEmplInfo(KiasServiceInterface $kias, Request $request)
    {
        $success = true;
        $error = '';
        $response = $kias->getEmplInfo($request->isn, date('d.m.Y', strtotime($request->datebeg)), date('d.m.Y', strtotime($request->dateend)));
        if ($response->error)
        {
            $success = false;
            $error = (string)$response->error->text;
            $result = array(
                'success' => $success,
                'error' => $error,
            );

            return response()->json($result)->withCallback($request->input('callback'));
        }
        $carier = $vacation = $admins = $sick = $thanks = $mission = null;
        if($success && $response->CARIER->row[0]->datebeg != 0)
        {
            $carier = array();
            foreach ($response->CARIER->row as $row){
                array_push($carier, [
                    'Dept' => (string)$row->Dept,
                    'DateBeg' => (string)$row->datebeg,
                    'DateEnd' => (string)$row->dateend,
                    'DutyName' => (string)$row->fullname
                ]);
            }
        }

        if($success && $response->VACATION->row[0]->datebeg != 0)
        {
            $vacation = array();
            foreach ($response->VACATION->row as $row){
                array_push($vacation, [
                    'Fullname' => (string)$row->fullname,
                    'Period' => (string)$row->period,
                    'Duration' => (string)$row->duration,
                    'DateBeg' => (string)$row->datebeg,
                    'DateEnd' => (string)$row->dateend,
                ]);
            }
        }

        if($success && $response->SICK->row[0]->duration != 0)
        {
            $sick = array();
            foreach ($response->SICK->row as $row){
                array_push($sick, [
                    'Duration' => (string)$row->duration,
                    'Period' => (string)$row->period,
                    'Remark' => (string)$row->remark,
                ]);
            }
        }

        if($success && $response->ADMINS->row[0]->duration != 0)
        {
            $admins = array();
            foreach ($response->ADMINS->row as $row){
                array_push($admins, [
                    'Duration' => (string)$row->duration,
                    'Period' => (string)$row->period,
                    'Remark' => (string)$row->remark,
                ]);
            }
        }

        if($success && $response->THANKS->row[0]->docdate!= 0)
        {
            $thanks= array();
            foreach ($response->THANKS->row as $row){
                array_push($thanks, [
                    'FullName' => (string)$row->fullname,
                    'DocDate' => (string)$row->docdate,
                    'ExtraPay' => (string)$row->extrapay,
                    'Remark' => (string)$row->remark,
                ]);
            }
        }

        if($success && $response->MISSION->row[0]->period!= 0)
        {
            $mission = array();
            foreach ($response->MISSION->row as $row){
                array_push($mission, [
                    'City' => (string)$row->CityName,
                    'Period' => (string)$row->period,
                    'Remark' => (string)$row->remark,
                ]);
            }
        }

        $result = [
            'CARIER' => $carier,
            'VACATION' => $vacation,
            'ADMINS' => $admins,
            'SICK' => $sick,
            'THANKS' => $thanks,
            'MISSION' => $mission,
        ];

        $result = array(
            'success' => $success,
            'error' => $error,
            'result' => $result,
        );

        return response()->json($result)->withCallback($request->input('callback'));
    }

    public function postSimpleInfo(KiasServiceInterface $kias, Request $request)
    {
        $success = true;
        $error = '';
        $response = $kias->getEmplInfo(Auth::user()->ISN, date('1.m.Y'), date('d.m.Y', strtotime('today')));
        if ($response->error)
        {
            $success = false;
            $error = (string)$response->error->text;
            $result = array(
                'success' => $success,
                'error' => $error,
            );

            return response()->json($result)->withCallback($request->input('callback'));
        }
        $image = 0;
        if(isset($response->image->refisn)){
            $image = $kias->getAttachmentData($response->image->refisn,$response->image->isn, 'J');
            $image = (string)$image->FILEDATA;
        }

        $result = [
            'response' => $response,
            'image' => $image
        ];

        $result = array(
            'success' => $success,
            'error' => $error,
            'result' => $result,
        );

        return response()->json($result)->withCallback($request->input('callback'));
    }

    public function getTesters(){
        return array(
            3921599 => 3921599
        );
    }

    public function postBranchData(Request $request){
        $headDept = Auth::user()->level ?? Auth::user()->ISN;
        $headData = Branch::where('kias_id', $headDept)->first();
        $result = [];
        if(count($headData->childs)){
            array_push($result, [
                'id' => $headData->kias_id,
                'label' => $headData->fullname,
                'children' => $this->getChild($headData->kias_id),
            ]);
        }else{
            array_push($result, [
                'id' => $headData->kias_id,
                'label' => $headData->fullname,
            ]);
        }
        $responseData = [
            'result' => $result,
            'value' => Auth::user()->ISN,
        ];
        return response()->json($responseData)->withCallback($request->input('callback'));
    }

    public function getChild($parent_id){
        $result = [];
        $data = Branch::where('kias_parent_id', $parent_id)->get();
        foreach($data as $branchData){
            if(count($branchData->childs)){
                array_push($result, [
                    'id' => $branchData->kias_id,
                    'label' => $branchData->fullname,
                    'children' => $this->getChild($branchData->kias_id),
                ]);
            }else{
                array_push($result, [
                    'id' => $branchData->kias_id,
                    'label' => $branchData->fullname,
                ]);
            }
        }
        return $result;
    }

    public function dossier(){
        return view('dossier');
    }
}
