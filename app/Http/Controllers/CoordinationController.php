<?php


namespace App\Http\Controllers;
use App\Library\Services\KiasServiceInterface;
use App\Library\Services\CoordinationService;
use Illuminate\Http\Request;
use App\Library\Services\CoordinationServiceInterface;
/**
 * @var CoordinationService
 */

class CoordinationController extends Controller
{
    private $coordinationServiceInterface;

    public function __construct(CoordinationServiceInterface $coordinationServiceInterface)
    {
        $this->coordinationServiceInterface = $coordinationServiceInterface;
    }

    public function index(){
        return view('coordination');
    }

    public function getCoordinationList(Request $request, KiasServiceInterface $kias)
    {
        $param = $request->get('param');
        return $this->coordinationServiceInterface->coordinationList($param, $kias);
    }


    public function getCoordinationInfo(Request $request, KiasServiceInterface $kias)
    {
        $param = $request->get('param');
        return $this->coordinationServiceInterface->coordinationInfo($param, $kias);
    }


    public function getDocRowList(Request $request, KiasServiceInterface $kias)
    {
        $param = $request->get('param');
        return $this->coordinationServiceInterface->docRowList($param, $kias);
    }


    public function getAttachments(Request $request, KiasServiceInterface $kias)
    {
        $param = $request->get('param');
        return $this->coordinationServiceInterface->attachmentsService($request, $kias);
    }


    public function getAgreedCoordination(Request $request, KiasServiceInterface $kias)
    {
        $param = $request->get('param');
        return $this->coordinationServiceInterface->agreedCoordination($request, $kias);
    }


    public function setCoordination(Request $request)
    {
        $param = $request->get('param');
        return $this->coordinationServiceInterface->coordinationService($request);
    }


    public function saveAttachment(Request $request, KiasServiceInterface $kias)
    {
        $param = $request->get('param');
        return $this->coordinationServiceInterface->saveAttachmentService($request, $kias);
    }


    public function sendNotify(Request $request)
    {
        $param = $request->get('param');
        return $this->coordinationServiceInterface->sendNotifyService($request);
    }


    public function closeDecade(Request $request)
    {
        $param = $request->get('param');
        return $this->coordinationServiceInterface->closeDecadeService($request);
    }


    public function checkNotificationSended($isn, $no, $type)
    {
        $param = ([
            'isn'=>$isn,
            'no'=>$no,
            'type'=>$type
        ]);
        return $this->coordinationServiceInterface->checkNotificationSended($param);
    }


    public function serviceCenterNotify(Request $request)
    {
        $param = $request->get('param');
        return $this->coordinationServiceInterface->serviceCenterNotify($param);
    }

}
