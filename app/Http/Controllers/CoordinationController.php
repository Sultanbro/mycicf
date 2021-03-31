<?php


namespace App\Http\Controllers;
use App\Library\Services\KiasServiceInterface;
use App\Library\Services\CoordinationService;
use Illuminate\Http\Request;
use App\Library\Services\CoordinationServiceInterface;
/**
 * @var CoordinationServiceInterface
 */

class CoordinationController extends Controller
{
    private $coordinationService;

    public function __construct(CoordinationServiceInterface $coordinationService)
    {
        $this->coordinationService = $coordinationService;
    }

    public function index(){
        return view('coordination');
    }

    public function getCoordinationList(Request $request)
    {
        return $this->coordinationService->coordinationList($request);
    }


    public function getCoordinationInfo(Request $request)
    {
        return $this->coordinationService->coordinationInfo($request);
    }


    public function getDocRowList(Request $request)
    {
        //$param = $request->get('param');
        return $this->coordinationService->docRowList($request);
    }


    public function getAttachments(Request $request)
    {
        return $this->coordinationService->attachmentsService($request);
    }


    public function getAgreedCoordination(Request $request)
    {
        return $this->coordinationService->agreedCoordination($request);
    }


    public function setCoordination(Request $request)
    {
        return $this->coordinationService->coordinationService($request);
    }


    public function saveAttachment(Request $request)
    {
        return $this->coordinationService->saveAttachmentService($request);
    }


    public function sendNotify(Request $request)
    {
        return $this->coordinationService->sendNotifyService($request);
    }


    public function closeDecade(Request $request)
    {
        return $this->coordinationService->closeDecadeService($request);
    }


    public function checkNotificationSended($isn, $no, $type)
    {
/*        $param = ([
            'isn'=>$isn,
            'no'=>$no,
            'type'=>$type
        ]);*/
        return $this->coordinationService->checkNotificationSended($isn, $no, $type);
    }


    public function serviceCenterNotify(Request $request)
    {
        return $this->coordinationService->serviceCenterNotify($request);
    }

}
