<?php


namespace App\Http\Controllers;
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
        $result = $this->coordinationService->coordinationList($request);
        return response()->json($result)->withCallback($request->input('callback'));
    }


    public function getCoordinationInfo(Request $request)
    {
        $result = $this->coordinationService->coordinationInfo($request);
        return response()->json($result)->withCallback($request->input('callback'));
    }


    public function getDocRowList(Request $request)
    {
        $result = $this->coordinationService->docRowList($request);
        return response()->json($result)->withCallback($request->input('callback'));
    }


    public function getAttachments(Request $request)
    {
        $result = $this->coordinationService->attachmentsService($request);
        return response()->json($result)->withCallback($request->input('callback'));
    }


    public function getAgreedCoordination(Request $request)
    {
        $result = $this->coordinationService->agreedCoordination($request);
        return response()->json($result)->withCallback($request->input('callback'));
    }


    public function setCoordination(Request $request)
    {
        $result = $this->coordinationService->coordinationService($request);
        return response()->json($result)->withCallback($request->input('callback'));
    }


    public function saveAttachment(Request $request)
    {
        $result = $this->coordinationService->saveAttachmentService($request);
        return response()->json($result)->withCallback($request->input('callback'));
    }


    public function sendNotify(Request $request)
    {
        $result = $this->coordinationService->sendNotifyService($request);
        return response()->json($result)->withCallback($request->input('callback'));
    }


    public function closeDecade(Request $request)
    {
        $result = $this->coordinationService->closeDecadeService($request);
        return response()->json($result)->withCallback($request->input('callback'));
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
        $result = $this->coordinationService->serviceCenterNotify($request);
        return response()->json($result)->withCallback($request->input('callback'));
    }

}
