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

    public function getCoordinationList(Request $request, KiasServiceInterface $kias)
    {
        return CoordinationService::coordinationList($request, $kias);
    }

    public function getCoordinationInfo(Request $request, KiasServiceInterface $kias)
    {
        return CoordinationService::coordinationInfo($request, $kias);
    }

    public function getDocRowList(Request $request, KiasServiceInterface $kias)
    {
        return CoordinationService::DocRowList($request, $kias);
    }

    public function getAttachments(Request $request, KiasServiceInterface $kias)
    {
        return CoordinationService::AttachmentsService($request, $kias);
    }

    public function getAgreedCoordination(Request $request, KiasServiceInterface $kias)
    {
        return CoordinationService::AgreedCoordination($request, $kias);
    }

     public function setCoordination(Request $request)
    {
        return CoordinationService::coordinationService($request);
    }

        public function saveAttachment(Request $request, KiasServiceInterface $kias)
    {
        return CoordinationService::saveAttachmentService($request, $kias);
    }

     public function sendNotify(Request $request)
    {
        return CoordinationService::sendNotifyService($request);
    }

    public function closeDecade(Request $request)
    {
        return CoordinationService::closeDecadeService($request);
    }

    public function checkNotificationSended($isn, $no, $type)
    {
        return CoordinationService::checkNotificationSended($isn, $no, $type);
    }

    public function serviceCenterNotify(Request $request)
    {
        return CoordinationService::serviceCenterNotify($request);
    }
}
