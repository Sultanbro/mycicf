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
        $result = $this->coordinationService->coordinationList($request->get('isn'));
        return response()->json($result)->withCallback($request->input('callback'));
    }


    public function getCoordinationInfo(Request $request)
    {
        $result = $this->coordinationService->coordinationInfo($request->get('docIsn'));
        return response()->json($result)->withCallback($request->input('callback'));
    }


    public function getDocRowList(Request $request)
    {
        $result = $this->coordinationService->docRowList($request->get('params'));
        return response()->json($result)->withCallback($request->input('callback'));

    }


    public function getAttachments(Request $request)
    {
        $result = $this->coordinationService->attachmentsService($request->get('docIsn'));
        return response()->json($result)->withCallback($request->input('callback'));
    }


    public function getAgreedCoordination(Request $request)
    {
        $result = $this->coordinationService->agreedCoordination($request->get('ISN'));
        return response()->json($result)->withCallback($request->input('callback'));
    }


    public function setCoordination(Request $request)
    {
        $result = $this->coordinationService->coordinationService($request->get('params'));
        return response()->json($result)->withCallback($request->input('callback'));
    }


    public function saveAttachment(Request $request)
    {
        $result = $this->coordinationService->saveAttachmentService($request->get('params'));
        return response()->json($result)->withCallback($request->input('callback'));
    }


    public function sendNotify(Request $request)
    {
        $result = $this->coordinationService->sendNotifyService($request->get('params'));
        return response()->json($result)->withCallback($request->input('callback'));
    }


    public function closeDecade(Request $request)
    {
        $result = $this->coordinationService->closeDecadeService($request->get('params'));
        return response()->json($result)->withCallback($request->input('callback'));
    }


    public function checkNotificationSended($params)
    {
        return $this->coordinationService->checkNotificationSended($params);
    }


    public function serviceCenterNotify(Request $request)
    {
        $result = $this->coordinationService->serviceCenterNotify($request->get('data'));
        return response()->json($result)->withCallback($request->input('callback'));
    }

}
