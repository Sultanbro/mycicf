<?php


namespace App\Http\Controllers;
use App\Library\Services\KiasServiceInterface;
use App\Library\Services\CoordinationService;
use Illuminate\Http\Request;


/**
 * @var CoordinationService
 */

class CoordinationController extends Controller
{
    public function index(){
        return view('coordination');
    }

    public function getCoordinationList(Request $request, KiasServiceInterface $kias, CoordinationService $coordination)
    {
        return $coordination->coordinationList($request, $kias);
    }


    public function getCoordinationInfo(Request $request, KiasServiceInterface $kias, CoordinationService $coordination)
    {
        return $coordination->coordinationInfo($request, $kias);
    }


    public function getDocRowList(Request $request, KiasServiceInterface $kias, CoordinationService $coordination)
    {
        return $coordination->docRowList($request, $kias);
    }


    public function getAttachments(Request $request, KiasServiceInterface $kias, CoordinationService $coordination)
    {
        return $coordination->attachmentsService($request, $kias);
    }


    public function getAgreedCoordination(Request $request, KiasServiceInterface $kias, CoordinationService $coordination)
    {
        return $coordination->agreedCoordination($request, $kias);
    }


    public function setCoordination(Request $request, CoordinationService $coordination)
    {
        return $coordination->coordinationService($request);
    }


    public function saveAttachment(Request $request, KiasServiceInterface $kias, CoordinationService $coordination)
    {
        return $coordination->saveAttachmentService($request, $kias);
    }


    public function sendNotify(Request $request, CoordinationService $coordination)
    {
        return $coordination->sendNotifyService($request);
    }


    public function closeDecade(Request $request, CoordinationService $coordination)
    {
        return $coordination->closeDecadeService($request);
    }


    public function checkNotificationSended($isn, $no, $type, CoordinationService $coordination)
    {
        return $coordination->checkNotificationSended($isn, $no, $type);
    }


    public function serviceCenterNotify(Request $request, CoordinationService $coordination)
    {
        return $coordination->serviceCenterNotify($request);
    }

}
