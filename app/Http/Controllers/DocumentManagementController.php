<?php

namespace App\Http\Controllers;

use App\Dicti;
use App\Helpers\Helper;
use App\Library\Services\Kias;
use App\Library\Services\KiasServiceInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\SiteController;
use DB;
use mysql_xdevapi\Result;
use App\Branch;
use function GuzzleHttp\default_ca_bundle;

class DocumentManagementController extends Controller
{
    /** @var KiasServiceInterface $kiasService */
    private $kiasService;

    /** @var bool */
    public $success = true;

    /** @var null */
    public $error = null;

    public function __construct(KiasServiceInterface $kias)
    {
        $this->kiasService = $kias;
    }

    public function index()
    {
        return view('document.management.index');
    }

    public function showMySZ(Request $request, KiasServiceInterface $kias)
    {
        $error = "";
        $today = date('d.m.Y');
        $dateBeg = date("d.m.Y", strtotime("-15 days"));
        $documents = $kias->getMySZ(auth()->user()->ISN, $dateBeg, $today, '2516'); //2516 - в работе
//        dd($documents);
        if($documents->error){
            $success = false;
            $error .= (string)$documents->error->text;
            $result = [
                'success' => $success,
                'error' => (string)$error
            ];
            return response()->json($result)->withCallback($request->input('callback'));
        }
        $items = [];
        if(isset($documents->SZ->row)) {
            foreach ($documents->SZ->row as $iten) {
                    $items[] = $iten;
            }
        }
        if(isset($documents->Zayav->row)){
            foreach($documents->Zayav->row as $iten) {
                    $items[] = $iten;
            }
        }
        $itens = array_slice($items, -10, 10);
        $responseData = [
            'itens' => $itens,
            'success' => true,
        ];
        return response()->json($responseData);
    }

    public function show(Request $request, KiasServiceInterface $kias)
    {
//        dd($request->button);
        $today = date('d.m.Y');
//        dd($today);

        $show = $kias->request('User_CicGetDocRowAttr', [
            'CLASSISN' => $request->isn ? $request->isn : '',
            'DOCISN' => $request->docisn ? $request->docisn : '',
        ]);
//        dd($show);
        $result = [];
        $contragent = [
            'fullname' => empty((string)$show->Doc->row->SUBJNAME) ? 'Контрагент' : $show->Doc->row->SUBJNAME,
            'value' => empty((string)$show->Doc->row->SUBJNAME) ? '' : get_object_vars($show->Doc->row->SUBJNAME)[0],
            'subjIsn' => $show->Doc->row->SUBJISN ? '' : get_object_vars($show->Doc->row->SUBJISN)[0],
        ];
        foreach($show->DocParams->row as $item) {
            array_push($result, [
                'attrisn' => (string)$item->ATTRISN,
                'remark' => (string)$item->REMARK,
                'val' => (string)$item->VAL,
                'value' => (string)$item->VALUE,
                'fullname' => (string)$item->FULLNAME,
            ]);
        }
        $resDop = [];
        $result1 = [];
        foreach($result as $res){
            if($res['fullname'] === 'Адресат' || $res['fullname'] === 'Исполнитель'){
                $result1[] = $res;
            } else {
                $resDop[] = $res;
            }
        }
        $docrows = [];
        if(isset($show->DocRow->row)){
            foreach($show->DocRow->row as $docrow){
                $docrows[] = [
                    'orderno' => empty($docrow->orderno) ? null : get_object_vars($docrow->orderno)[0],
                    'fieldname' => empty($docrow->fieldname) ? null : get_object_vars($docrow->fieldname)[0],
                    'code' => empty($docrow->code) ? null : get_object_vars($docrow->code)[0],
                    'classisn' => empty($docrow->classisn) ? null : get_object_vars($docrow->classisn)[0],
                    'rowisn' => empty($docrow->rowisn) ? null : get_object_vars($docrow->rowisn)[0],
                    'val' => empty($docrow->val) ? null : get_object_vars($docrow->val)[0],
                    'value' => empty(get_object_vars($docrow->value)) ? null : get_object_vars($docrow->value)[0],
                    'value_name' => empty(get_object_vars($docrow->value_name)) ? null : empty(get_object_vars($docrow->value_name)),
                ];
            }
        }
        if(isset($show->DocParam->row)){
            $docParam = [
                'showbutton1' => get_object_vars($show->DocParam->row->showbutton1) ? get_object_vars($show->DocParam->row->showbutton1)[0] : null,
                'button1caption' => get_object_vars($show->DocParam->row->button1caption) ? get_object_vars($show->DocParam->row->button1caption)[0] : null,
                'showbutton2' => get_object_vars($show->DocParam->row->showbutton2) ? get_object_vars($show->DocParam->row->showbutton2)[0] : null,
                'button2caption' => get_object_vars($show->DocParam->row->button2caption) ? get_object_vars($show->DocParam->row->button2caption)[0] : null,
                'showbutton3' => get_object_vars($show->DocParam->row->showbutton3) ? get_object_vars($show->DocParam->row->showbutton3)[0] : null,
                'button3caption' => get_object_vars($show->DocParam->row->button3caption) ? get_object_vars($show->DocParam->row->button3caption)[0] : null,
                'showSubject' => get_object_vars($show->DocParam->row->showsubject) ? get_object_vars($show->DocParam->row->showsubject)[0] : null,
                'showRemark' => get_object_vars($show->DocParam->row->showremark) ? get_object_vars($show->DocParam->row->showremark)[0] : null,
                'showRemark2' => get_object_vars($show->DocParam->row->showremark2) ? get_object_vars($show->DocParam->row->showremark2)[0] : null,
                'showTable' => get_object_vars($show->DocParam->row->showtable) ? get_object_vars($show->DocParam->row->showtable)[0] : null,
            ];
        }
        $results = array_merge([
            'classisn' => get_object_vars($show->Doc->row->CLASSISN)[0],
            'parentClass' => get_object_vars($show->Parentclass)[0],
            'emplisn' => get_object_vars($show->Doc->row->EMPLISN)[0],
            'emplName' => get_object_vars($show->Doc->row->EMPLNAME)[0],
            'docdate' => isset($itens->docdate) ? get_object_vars($itens->docdate) : $today,
            'className' => get_object_vars($show->Doc->row->CLASSNAME)[0],
            'id' => get_object_vars($show->Doc->row->ID) ? get_object_vars($show->Doc->row->ID)[0] : '',
            'showRemark' => $show->Doc->row->REMARK ? get_object_vars($show->Doc->row->REMARK) : '',
            'showRemark2' => $show->Doc->row->REMARK2 ? get_object_vars($show->Doc->row->REMARK2) : '',
            'status' => get_object_vars($show->Doc->row->STATUSNAME) ? get_object_vars($show->Doc->row->STATUSNAME)[0] : '',
            'stage' => get_object_vars($show->Doc->row->STAGENAME) ? get_object_vars($show->Doc->row->STAGENAME) : '',
        ], [
            'result' => $result
        ], [
            'resDop' => $resDop
        ], [
            'result1' => $result1
        ], [
            'docrows' => $docrows
        ], [
            'contragent' => $contragent,
        ], [
            'docParam' => $docParam
            ]
        );
        if(!empty(get_object_vars($show->Doc->row->ID)[0])){
//            dd(get_object_vars($show->Doc->row->ID)[0]);
//            dd($results['id']);
            $resDoc = [
                'id' => $results['id'],
                'success' => true,
            ];
            return response()->json($resDoc);
        }else{
            return view('document.management.show', compact('results'));
        }
    }

    public function bonus(Request $request, KiasServiceInterface $kias)
    {
        $bonus = $kias->request('User_CicGetUserList', [
            'number' => 1,
        ]);
        dd($bonus);
    }

    public function listEmployee(Request $request,  KiasServiceInterface $kias)
    {
        $id = $request->id;

        return view('document.management.list', compact('id'));
    }

    public function getDocument(Request $request, KiasServiceInterface $kias)
    {
//        $dicti = [];
//        $dicti['officeNotes'] = (new SiteController())->getDictiList(800701);
//        $dicti['HRD'] = (new SiteController())->getDictiList(1760341);
//        $dicti['chancellery'] = (new SiteController())->getDictiList(1760331);
//        $dicti['statements'] = (new SiteController())->getDictiList(1007381);
//        $dicti['admDayApp'] = (new SiteController())->getDictiList(820621);
//        dd($dicti);
        $isns = ['800701', '1760341', '1760331', '1007381'];
//        $isns = ['800691', '777441'];
        $result = [];
        foreach($isns as $isn) {
            $headData = Dicti::where('isn', $isn)->first();
            array_push($result, [
                'isn' => $headData['isn'],
                'fullname' => $headData['fullname'],
                'parent_isn' => $headData['parent_isn'],
                'children' => $this->getSearchChild($headData),
            ]);
        }
        $responseData = [
          'result' => $result,
          'success' => true,
        ];
        return response()->json($responseData);
    }

    public function getSearchChild($headData){
        $result = [];

        $data = Dicti::where('parent_isn', $headData['isn'])->get();

        foreach($data as $branchData){
                array_push($result, [
                    'isn' => $branchData['isn'],
                    'fullname' => $branchData['fullname'],
                    'parent_isn' => $headData['isn'],
                ]);
            }
        return $result;
    }

    public function getUserInfo(Request $request){
        $users = Branch::where('has_child',0)->get();
        $result = [];
        foreach($users as $user){
            $user['dept'] = isset($user->getParent->fullname) ? $user->getParent->fullname : '';
            $result[$user->kias_id] = $user;
        }
        return response()->json([
            'usersInfo' => $result
        ]);
    }

    public function getMissingProduct(Request $request){
        $result = [];
            $headProduct = Dicti::where('parent_isn', 13)->where('n_kids', 1)->get();
            foreach($headProduct as $product)
            array_push($result, [
                'id' => $product['isn'],
                'label' => $product['fullname'],
                'parent_isn' => $product['parent_isn'],
                'children' => $this->getSearchChildProduct($product),
            ]);
        $missingProducts = [
            'result' => $result,
            'success' => true,
        ];
        return response()->json($missingProducts);
    }

    public function getSearchChildProduct($product){
        $result = [];
        $child = Dicti::where('parent_isn', $product['isn'])->get();
//        dd($child);
        foreach($child as $branchData){
            array_push($result, [
                'id' => $branchData['isn'],
                'label' => $branchData['fullname'],
                'parent_isn' => $product['isn'],
            ]);
        }
        return $result;
    }

    public function getUnitGroup(Request $request){
        $result = [];
        $headProduct = Dicti::where('parent_isn', 702941)->where('n_kids', 1)->get();
//            dd($headProduct);
        foreach($headProduct as $product)
            array_push($result, [
                'id' => $product['isn'],
                'label' => $product['fullname'],
                'parent_isn' => $product['parent_isn'],
                'children' => $this->getSearchChildUnit($product),
            ]);
        $missingProducts = [
            'result' => $result,
            'success' => true,
        ];
        return response()->json($missingProducts);
    }

    public function getSearchChildUnit($product){
        $result = [];
        $child = Dicti::where('parent_isn', $product['isn'])->get();
        foreach($child as $branchData){
            array_push($result, [
                'id' => $branchData['isn'],
                'label' => $branchData['fullname'],
                'parent_isn' => $product['isn'],
            ]);
        }
        return $result;
    }

    public function getProductType(Request $request){
        $result = [];
        $headProduct = Dicti::where('parent_isn', 1994)->where('n_kids', 1)->get();
        foreach($headProduct as $type)
            array_push($result, [
                'id' => $type['isn'],
                'label' => $type['fullname'],
                'parent_isn' => $type['parent_isn'],
                'children' => $this->getProductChildType($type),
            ]);
        $missingProducts = [
            'result' => $result,
            'success' => true,
        ];
        return response()->json($missingProducts);
    }

    public function getProductChildType($type){
        $result = [];
        $child = Dicti::where('parent_isn', $type['isn'])->get();
//        dd($child);
        foreach($child as $branchData){
            array_push($result, [
                'id' => $branchData['isn'],
                'label' => $branchData['fullname'],
                'parent_isn' => $type['isn'],
            ]);
        }
        return $result;
    }

    public function getCostType(Request $request){
        $types = Dicti::where('parent_isn',222517)->get();
        $result = [];
        $result2 = [];
        $result3 = [];
        foreach($types as $costType){
            if($costType['n_kids'] === 1){
                array_push($result, [
                    'id' => $costType['isn'],
                    'label' => $costType['fullname'],
                    'parent_isn' => $costType['parent_isn'],
                    'children' => $this->getSearchChildUnit($costType),
                ]);
            }
            if($costType['n_kids'] === 0){
                array_push($result, [
                    'id' => $costType['isn'],
                    'label' => $costType['fullname'],
                    'parent_isn' => $costType['parent_isn'],
                ]);
            }
        }
        array_push($result3, $result, $result2);
//        dd($result3);
        $costTypes = [
            'result' => $result,
            'success' => true,
        ];
        return response()->json($costTypes);
    }

    public function getSearchChildCost($costType){
        $result = [];
        $child = Dicti::where('parent_isn', $costType['isn'])->get();
        foreach($child as $branchData){
            array_push($result, [
                'id' => $branchData['isn'],
                'label' => $branchData['fullname'],
                'parent_isn' => $costType['isn'],
            ]);
        }
        return $result;
    }

    public function getProxyType(Request $request){
        $proxys = Dicti::where('parent_isn',804341)->get();
        $result = [];
        foreach($proxys as $proxy){
            $proxy['isn'] = $proxy->isn;
            $proxy['fullname'] = $proxy->fullname;
            $proxy['parent_isn'] = $proxy->parent_isn;
            $result[] = [$proxy['isn'],$proxy['fullname'],$proxy['parent_isn']];
        }
        return response()->json([
            'proxyTypes' => $result
        ]);
    }

    public function getStage(Request $request){
        $stages = Dicti::where('parent_isn',223373)->get();
        $result = [];
        foreach($stages as $stage){
            $stage['isn'] = $stage->isn;
            $stage['fullname'] = $stage->fullname;
            $stage['parent_isn'] = $stage->parent_isn;
            $result[] = [$stage['isn'],$stage['fullname'],$stage['parent_isn']];
        }
        return response()->json([
            'stages' => $result
        ]);
    }

    public function getKNP(Request $request){
        $knps = Dicti::where('parent_isn',222565)->get();
        $result = [];
        foreach($knps as $knp){
            $knp['isn'] = $knp->isn;
            $knp['fullname'] = $knp->fullname;
            $knp['parent_isn'] = $knp->parent_isn;
            $result[] = [$knp['isn'],$knp['fullname'],$knp['parent_isn']];
        }
        return response()->json([
            'knps' => $result
        ]);
    }


    public function getKBK(Request $request){
        $kbks = Dicti::where('parent_isn',222555)->get();
        $result = [];
        foreach($kbks as $kbk){
            $kbk['isn'] = $kbk->isn;
            $kbk['fullname'] = $kbk->fullname;
            $kbk['parent_isn'] = $kbk->parent_isn;
            $result[] = [$kbk['isn'],$kbk['fullname'],$kbk['parent_isn']];
        }
        return response()->json([
            'kbks' => $result
        ]);
    }

    public function getCreationSources(Request $request){
        $creationSources = Dicti::where('parent_isn',221389)->get();
        $result = [];
        foreach($creationSources as $creationSource){
            $creationSource['isn'] = $creationSource->isn;
            $creationSource['fullname'] = $creationSource->fullname;
            $creationSource['parent_isn'] = $creationSource->parent_isn;
            $result[] = [$creationSource['isn'],$creationSource['fullname'],$creationSource['parent_isn']];
        }
        return response()->json([
            'creationSources' => $result
        ]);
    }

    public function getDailyMc(Request $request){
        $MC = Dicti::where('parent_isn',1042681)->get();
        $result = [];

        foreach($MC as $daily){
            $daily['isn'] = $daily->isn;
            $daily['fullname'] = $daily->fullname;
            $daily['parent_isn'] = $daily->parent_isn;
            $result[] = [$daily['isn'],$daily['fullname'],$daily['parent_isn']];
        }
        return response()->json([
            'dailyMC' => $result
        ]);
    }

    public function getDuty(Request $request){
        $dutys = Dicti::where('parent_isn',2147381)->get();
        $result = [];

        foreach($dutys as $duty){
            $duty['isn'] = $duty->isn;
            $duty['fullname'] = $duty->fullname;
            $duty['parent_isn'] = $duty->parent_isn;
            $result[] = [$duty['isn'],$duty['fullname'],$duty['parent_isn']];
        }
        return response()->json([
            'duties' => $result
        ]);
    }

    public function getHelpTo(Request $request){
        $helps = Dicti::where('parent_isn',1737181)->get();
        $result = [];

        foreach($helps as $help){
            $help['isn'] = $help->isn;
            $help['fullname'] = $help->fullname;
            $help['parent_isn'] = $help->parent_isn;
            $result[] = [$help['isn'],$help['fullname'],$help['parent_isn']];
        }
        return response()->json([
            'helpTo' => $result
        ]);
    }

    public function getCounterpartyType(Request $request){
        $types = Dicti::where('parent_isn',25)->get();
        $result = [];

        foreach($types as $type){
            $type['isn'] = $type->isn;
            $type['fullname'] = $type->fullname;
            $type['parent_isn'] = $type->parent_isn;
            $result[] = [$type['isn'],$type['fullname'],$type['parent_isn']];
        }
        return response()->json([
            'counterpartyType' => $result
        ]);
    }

    public function getSzTopic(Request $request){
        $topics = Dicti::where('parent_isn',1326291)->get();
        $result = [];

        foreach($topics as $topic){
            $topic['isn'] = $topic->isn;
            $topic['fullname'] = $topic->fullname;
            $topic['parent_isn'] = $topic->parent_isn;
            $result[] = [$topic['isn'],$topic['fullname'],$topic['parent_isn']];
        }
        return response()->json([
            'topicSZ' => $result
        ]);
    }

    public function getPaymentForm(Request $request){
        $payments = Dicti::where('parent_isn',39)->get();
        $result = [];

        foreach($payments as $payment){
            $payment['isn'] = $payment->isn;
            $payment['fullname'] = $payment->fullname;
            $payment['parent_isn'] = $payment->parent_isn;
            $result[] = [$payment['isn'],$payment['fullname'],$payment['parent_isn']];
        }
        return response()->json([
            'paymentForms' => $result
        ]);
    }

    public function getPaymentOrder(Request $request){
        $payments = Dicti::where('parent_isn',2999)->get();
        $result = [];

        foreach($payments as $order){
            $order['isn'] = $order->isn;
            $order['fullname'] = $order->fullname;
            $order['parent_isn'] = $order->parent_isn;
            $result[] = [$order['isn'],$order['fullname'],$order['parent_isn']];
        }
        return response()->json([
            'paymentOrders' => $result
        ]);
    }

    public function getStagePassage(Request $request){
        $stages = Dicti::where('parent_isn',221659)->get();
        $result = [];

        foreach($stages as $stage){
            $stage['isn'] = $stage->isn;
            $stage['fullname'] = $stage->fullname;
            $stage['parent_isn'] = $stage->parent_isn;
            $result[] = [$stage['isn'],$stage['fullname'],$stage['parent_isn']];
        }
        return response()->json([
            'stagePassages' => $result
        ]);
    }

    public function getServicesFor(Request $request){
        $payments = Dicti::where('parent_isn',2087201)->get();
        $result = [];

        foreach($payments as $service){
            $service['isn'] = $service->isn;
            $service['fullname'] = $service->fullname;
            $service['parent_isn'] = $service->parent_isn;
            $result[] = [$service['isn'],$service['fullname'],$service['parent_isn']];
        }
        return response()->json([
            'servicesFor' => $result
        ]);
    }

    public function getReason(Request $request){
        $res = Dicti::where('parent_isn',1113561)->get();
        $result = [];

        foreach($res as $reason){
            $reason['isn'] = $reason->isn;
            $reason['fullname'] = $reason->fullname;
            $reason['parent_isn'] = $reason->parent_isn;
            $result[] = [$reason['isn'],$reason['fullname'],$reason['parent_isn']];
        }
        return response()->json([
            'reasons' => $result
        ]);
    }

    public function getTopicEconomicActivity(Request $request){
        $res = Dicti::where('parent_isn',1872641)->get();
        $result = [];

        foreach($res as $economic){
            $economic['isn'] = $economic->isn;
            $economic['fullname'] = $economic->fullname;
            $economic['parent_isn'] = $economic->parent_isn;
            $result[] = [$economic['isn'],$economic['fullname'],$economic['parent_isn']];
        }
        return response()->json([
            'economicActivity' => $result
        ]);
    }

    public function getVehicleModel(Request $request){
        $res = Dicti::where('parent_isn',2004861)->get();
        $result = [];

        foreach($res as $vehicle){
            $vehicle['isn'] = $vehicle->isn;
            $vehicle['fullname'] = $vehicle->fullname;
            $vehicle['parent_isn'] = $vehicle->parent_isn;
            $result[] = [$vehicle['isn'],$vehicle['fullname'],$vehicle['parent_isn']];
        }
        return response()->json([
            'vehicleModel' => $result
        ]);
    }

    public function getCarStateNumber(Request $request){
        $cars = Dicti::where('parent_isn',2004901)->get();
        $result = [];

        foreach($cars as $car){
            $car['isn'] = $car->isn;
            $car['fullname'] = $car->fullname;
            $vehicle['parent_isn'] = $car->parent_isn;
            $result[] = [$car['isn'],$car['fullname'],$car['parent_isn']];
        }
        return response()->json([
            'stateNumbers' => $result
        ]);
    }

    public function getViolationComposition(Request $request){
        $violations = Dicti::where('parent_isn',2004731)->get();
        $result = [];

        foreach($violations as $violation){
            $violation['isn'] = $violation->isn;
            $violation['fullname'] = $violation->fullname;
            $violation['parent_isn'] = $violation->parent_isn;
            $result[] = [$violation['isn'],$violation['fullname'],$violation['parent_isn']];
        }
        return response()->json([
            'violationComposition' => $result
        ]);
    }

    public function getAutoColor(Request $request){
        $colors = Dicti::where('parent_isn',2028)->get();
        $result = [];

        foreach($colors as $color){
            $color['isn'] = $color->isn;
            $color['fullname'] = $color->fullname;
            $color['parent_isn'] = $color->parent_isn;
            $result[] = [$color['isn'],$color['fullname'],$color['parent_isn']];
        }
        return response()->json([
            'autoColors' => $result
        ]);
    }

    public function getReasonDeprivation(Request $request){
        $res = Dicti::where('parent_isn',1446391)->get();
        $result = [];

        foreach($res as $reason){
            $reason['isn'] = $reason->isn;
            $reason['fullname'] = $reason->fullname;
            $reason['parent_isn'] = $reason->parent_isn;
            $result[] = [$reason['isn'],$reason['fullname'],$reason['parent_isn']];
        }
        return response()->json([
            'reasonDeprivation' => $result
        ]);
    }

    public function getTypeSzAhd(Request $request){
        $res = Dicti::where('parent_isn',812801)->get();
        $result = [];

        foreach($res as $reason){
            $reason['isn'] = $reason->isn;
            $reason['fullname'] = $reason->fullname;
            $reason['parent_isn'] = $reason->parent_isn;
            $result[] = [$reason['isn'],$reason['fullname'],$reason['parent_isn']];
        }
        return response()->json([
            'typeAhd' => $result
        ]);
    }

    public function getTypeSzMain(Request $request){
        $res = Dicti::where('parent_isn',1872651)->get();
        $result = [];

        foreach($res as $reason){
            $reason['isn'] = $reason->isn;
            $reason['fullname'] = $reason->fullname;
            $reason['parent_isn'] = $reason->parent_isn;
            $result[] = [$reason['isn'],$reason['fullname'],$reason['parent_isn']];
        }
        return response()->json([
            'typeMain' => $result
        ]);
    }

    public function getDelegateAuthority(Request $request){
        $res = Dicti::where('parent_isn',997421)->get();
        $result = [];

        foreach($res as $authority){
            $authority['isn'] = $authority->isn;
            $authority['fullname'] = $authority->fullname;
            $authority['parent_isn'] = $authority->parent_isn;
            $result[] = [$authority['isn'],$authority['fullname'],$authority['parent_isn']];
        }
        return response()->json([
            'authorities' => $result
        ]);
    }

    public function getRelational(Request $request){
        $relations = Dicti::where('parent_isn',50)->get();
        $result = [];

        foreach($relations as $relation){
            $relation['isn'] = $relation->isn;
            $relation['fullname'] = $relation->fullname;
            $relation['parent_isn'] = $relation->parent_isn;
            $result[] = [$relation['isn'],$relation['fullname'],$relation['parent_isn']];
        }
        return response()->json([
            'relationTo' => $result
        ]);
    }

    public function getCountriesList(Request $request){
        $countries = Dicti::where('parent_isn',9434)->get();
        $result = [];

        foreach($countries as $country){
            $country['isn'] = $country->isn;
            $country['fullname'] = $country->fullname;
            $country['parent_isn'] = $country->parent_isn;
            $result[] = [$country['isn'],$country['fullname'],$country['parent_isn']];
        }
        return response()->json([
            'countriesList' => $result
        ]);
    }

    public function getCalculationType(Request $request){
        $types = Dicti::where('parent_isn',11360)->get();
        $result = [];

        foreach($types as $type){
            $type['isn'] = $type->isn;
            $type['fullname'] = $type->fullname;
            $type['parent_isn'] = $type->parent_isn;
            $result[] = [$type['isn'],$type['fullname'],$type['parent_isn']];
        }
        return response()->json([
            'calculationTypes' => $result
        ]);
    }

    public function saveDocument(Request $request, KiasServiceInterface $kias)
    {
//        dd($request);
        $error = "";
        $request->result = [];
        foreach ($request->results["result1"] as $result1){
            $request->result[] = $result1;
        }
        foreach ($request->results["resDop"] as $result2){
            $request->result[] = $result2;
        }
        if(!empty($request->result)){
            foreach($request->result as $item){
                if(isset($item['attrisn'])){
                    if(!isset($item['remark'])){
                        $item['remark'] = null;
                    }
                    if(!isset($item['val'])){
                        $item['val'] = null;
                    }
                    if(!isset($item['value'])){
                        $item['value'] = null;
                    }
                    $row[] = [
                        'ATTRISN' => $item['attrisn'],
                        'REMARK' => $item['remark'],
                        'VAL' => $item['val'], //Значение
                        'VALUE' => $item['value'], //Значение атрибута
                    ];
                }
            }
        } else {
            $row = [];
        }
        $docrows = [];
        if(isset($request->results["docrows"])){
            foreach($request->results["docrows"] as $docrow) {
                $docrows[] = [
                    $docrow['val'] => $docrow['value'] ?? null,
                ];
            }
        }
        $isn = '0'; //update isn='$isn' delete='0'
        $delete = '0'; //delete isn='$isn' delete='1'
        $docs = ['isn' => $isn, 'delete' => $delete];
        for($i=0; $i<count($docrows); $i++){
            $docs = array_merge($docs, $docrows[$i]);
        }
        $status1 = [
            'В работе' => '2516', 'На подписи' => '2522', 'Подписан' => '2518', 'Оплачен' => '2517', 'Аннулирован' => '2515',
        ];
//        dd($request->docIsn);
        $wer = [$request->docIsn ? $request->docIsn : '', $request->results["classisn"], $request->results["emplisn"], $request->results["docdate"], $request->results["contragent"]['subjIsn'] ? $request->results["contragent"]['subjIsn'] : '', $row, $docs];
        if(!isset($request->results["status"])){
            $document = $kias->userCicSaveDocument($request->docIsn ? $request->docIsn : '', $request->results["classisn"], $request->results["status"] ? $status1[$request->results["status"]] : '', $request->results["emplisn"], $request->results["docdate"], $request->results["contragent"]['subjIsn'] ? $request->results["contragent"]['subjIsn'] : '', $request->results['showRemark'],$request->results['showRemark2'], $row, $docs);
//            dd($document);
            if(!empty($document->DocISN)){
                $docIsn = get_object_vars($document)['DocISN'];
            }else{
                if($document->error){
                    $success = false;
                    $error .= (string)$document->error->text;
                    $result = [
                        'success' => $success,
                        'error' => (string)$error
                    ];
                    return response()->json($result)->withCallback($request->input('callback'));
                };
            }
            return response()->json([
                'request' => $request,
                'DocISN' => $docIsn,
                'success' => true,
            ]);
        } else {
            $document = $kias->userCicSaveDocument($request->docIsn ? $request->docIsn : '', $request->results["classisn"],$request->results["status"] ? $status1[$request->results["status"]] : '',  $request->results["emplisn"], $request->results["docdate"], $request->results["contragent"]['subjIsn'] ? $request->results["contragent"]['subjIsn'] : '', $request->results['showRemark'], '',$row, $docs);
            if(!empty($document->DocISN)){
                $docIsn = get_object_vars($document)['DocISN'];
            }else{
                if($document->error){
                    $success = false;
                    $error .= (string)$document->error->text;
                    $result = [
                        'success' => $success,
                        'error' => (string)$error
                    ];
                    return response()->json($result)->withCallback($request->input('callback'));
                }
            }
                return response()->json([
                    'DocISN' => $docIsn,
                    'stage' => 'В работе',
                    'success' => true,
                ]);
            }
    }
    public function buttonClick(Request $request, KiasServiceInterface $kias)
    {
        $error = "";
        $docIsn = $request->docIsn;
//        dd($docIsn);
        $button = $request->button;
        if(isset($request->docIsn)){
            $buttonClick = $kias->buttonClick($docIsn, $button);
            if($buttonClick->error){
                $success = false;
                $error .= (string)$buttonClick->error->fulltext;
                $result = [
                    'success' => $success,
                    'error' => (string)$error
                ];
                return response()->json($result)->withCallback($request->input('callback'));
            }
            if(isset($buttonClick->DOCISN)){
                $listDocIsn = get_object_vars($buttonClick->DOCISN)[0];
            } else {
                $listDocIsn = '';
            }
            return response()->json([
                'DOCISN' => $listDocIsn,
                'success' => true,
            ]);
        } else{
            $docIsn = $request->docIsn ? '' : $request->docIsn;
            $buttonClick = $kias->buttonClick($docIsn, $button);
            return response()->json([
                'DOCISN' => '',
                'success' => true,
            ]);
        }
    }

    public function getOrSetDocs(Request $request, KiasServiceInterface $kias){
        $error = "";
        $status1 = [
            'В работе' => '2516', 'На подписи' => '2522', 'Подписан' => '2518', 'Оплачен' => '2517', 'Аннулирован' => '2515',
        ];
        $docs = $kias->getOrSetDocs($request->docIsn, 1, $request->results["status"]);
//        dd($docs);
            if($docs->error){
                $success = false;
                $error .= (string)$docs->error->text;
                $result = [
                    'success' => $success,
                    'error' => (string)$error
                ];
                return response()->json($result)->withCallback($request->input('callback'));
            }
        $status2 = [
            '2516' => 'В работе', '2522' => 'На подписи', '2518' => 'Подписан', '2517' => 'Оплачен', '2515' => 'Аннулирован',
        ];
        $stage = ['221661' => 'В работе', '221662' => 'На подписи', '221664' => 'Подписан', '824701' => 'На согласовании у адресата', '805151' => 'На согласовании у адресата',
            '805141' => 'На согласовании', '850371' => 'На согласовании ()', '805161' => 'Исполнена', '2515' => 'Аннулирован'];
        if(isset($docs->Status)){
            $status = $status2[get_object_vars($docs)['Status']];
        }
        $stage = $stage[get_object_vars($docs)['Stage']];
        return response()->json([
            'status' => $status,
            'stage' => $stage,
            'success' => true,
        ]);
    }

    public function changeDocCoordination(Request $request, KiasServiceInterface $kias) {
        $success = true;
        $error = "";
//        if(isset($request->coordinationSubjISN)){
            for($i=0; $i < count($request->coordinationSubjISN); $i++) {
//                dd($request->coordinator);
                if($request->coordinationSubjISN[$i] === null && $request->coordinator[$i] !== null){
                    $row[$i] = [
                        'EMPLISN' => $request->coordinator[$i],
                        'COMMAND' => 'D',
                        'EMPLISN1' => $request->coordinator[$i],
                    ];
                }
                elseif(count($request->coordinationSubjISN) > count($request->coordinator) || !isset($request->coordinator[$i])){
                    $row[$i] = [
                        'EMPLISN' => $request->coordinationSubjISN[$i],
                        'COMMAND' => 'I',
                        'EMPLISN1' => '',
                    ];
                }
                elseif($request->coordinationSubjISN[$i] !== $request->coordinator[$i]){
                    $row[$i] = [
                        'EMPLISN' => $request->coordinator[$i],
                        'COMMAND' => 'U',
                        'EMPLISN1' => $request->coordinationSubjISN[$i],
                    ];
                }
            }
            $changeCoordination = $kias->userCicChangeDocCoordination($row);
            if($changeCoordination->error){
                $success = false;
                $error .= (string)$changeCoordination->error->text;
                $result = [
                    'success' => $success,
                    'error' => (string)$error
                ];
                return response()->json($result)->withCallback($request->input('callback'));
            }
            return response()->json([
                'result' => $changeCoordination,
                'success' => true,
            ]);
    }

    public function searchCounterparty(Request $request, KiasServiceInterface $kias) {
        $error = "";
        $result = [];
        $result1 = [];
        $type2 = [
            '2255' => 'Нештатный сотрудник', '2249' => 'Агент', '21120' => 'Ассистанс', '2250' => 'Банк', '789121' => 'Брокер',
            '800001' => 'Военкомат', '1735601' => 'Индивидуальный предприниматель', '2252' => 'Контрагент', '146320' => 'ЛПУ', '2253' => 'Медицинское учреждение',
            '1788881' => 'Сотрудник коммеска', '221079' => 'Страховщик / Перестраховщик', '225355' => 'Суд', '2260' => 'Филиалы/Подразделение', '2257' => 'Штатный содрудник',
        ];
        $searchingResult = $kias->userCicSearchSubject($request->document['iin'], $request->document['firstName'],
            $request->document['lastName'], $request->document['parentName'], $request->document['classISN'], 'N');
        if(count($searchingResult->result) === 0){
            $searchingResult = $kias->userCicSearchSubject($request->document['iin'], $request->document['firstName'],
                $request->document['lastName'], $request->document['parentName'], $request->document['classISN'], 'Y');
            if($searchingResult->error){
                $success = false;
                $error .= (string)$searchingResult->error->text;
                $result = [
                    'success' => $success,
                    'error' => (string)$error
                ];
                return response()->json($result)->withCallback($request->input('callback'));
            }
//            dd(get_object_vars( $searchingResult->ROWSET->row->ISN));
            if(empty(get_object_vars($searchingResult->ROWSET->row->ISN))){
                $subject = $searchingResult->ROWSET->row;
                $saveSubject = $kias->userCicSaveSubject($subject->IIN ? $subject->IIN : '', $subject->FIRSTNAME ? $subject->FIRSTNAME : '',
                    $subject->LASTNAME ? $subject->LASTNAME : '',$subject->PARENTNAME ? $subject->PARENTNAME : '', $subject->BIRTHDAY ? $subject->BIRTHDAY : '',
                    $subject->JURIDICAL ? $subject->JURIDICAL : '', $subject->RESIDENT ? $subject->RESIDENT  : '', $subject->SEXID ? $subject->SEXID : '',
                    $subject->COUNTRYISN ? $subject->COUNTRYISN : '');
                array_push($result, [
                    'lastName' => get_object_vars($subject->LASTNAME) ? get_object_vars($subject->LASTNAME)[0] : null,
                    'firstName' => get_object_vars($subject->FIRSTNAME) ? get_object_vars($subject->FIRSTNAME)[0] : null,
                    'parentName' => get_object_vars($subject->PARENTNAME) ? get_object_vars($subject->PARENTNAME)[0] : null,
                    'birthday' => get_object_vars($subject->BIRTHDAY) ? get_object_vars($subject->BIRTHDAY)[0] : null,
                    'iin' => get_object_vars($subject->IIN) ? get_object_vars($subject->IIN)[0] : null,
                    'classIsn' => get_object_vars($result1->CLASSISN) ? $type2[get_object_vars($result1->CLASSISN)[0]] : 'Контрагент',
                    'isn' => get_object_vars($subject->ISN) ? get_object_vars($subject->ISN)[0] : null,
                ]);
                return response()->json([
                    'result' => $result
                ]);
            }
        }
        if($searchingResult->error){
            $success = false;
            $error .= (string)$searchingResult->error->text;
            $result = [
                'success' => $success,
                'error' => (string)$error
            ];
            return response()->json($result)->withCallback($request->input('callback'));
        }
        if(count($searchingResult->ROWSET->row) > 1){
            if(count($searchingResult->ROWSET->row) >= 20) {
                for($i=0; $i<20; $i++){
                    array_push($result1, $searchingResult->ROWSET->row[$i]);
                }
            }
            elseif (count($searchingResult->ROWSET->row) < 20){
                for($i=0; $i<count($searchingResult->ROWSET->row); $i++){
                    array_push($result1, $searchingResult->ROWSET->row[$i]);
                }
            }
            for($i=0; $i<count($result1); $i++){
                array_push($result, [
                    'lastName' => get_object_vars($result1[$i]->LASTNAME) ? get_object_vars($result1[$i]->LASTNAME)[0] : null,
                    'firstName' => get_object_vars($result1[$i]->FIRSTNAME) ? get_object_vars($result1[$i]->FIRSTNAME)[0] : null,
                    'parentName' => get_object_vars($result1[$i]->PARENTNAME) ? get_object_vars($result1[$i]->PARENTNAME)[0] : null,
                    'birthday' => get_object_vars($result1[$i]->BIRTHDAY) ? get_object_vars($result1[$i]->BIRTHDAY)[0] : null,
                    'iin' => get_object_vars($result1[$i]->IIN) ? get_object_vars($result1[$i]->IIN)[0] : null,
                    'classIsn' => get_object_vars($result1[$i]->CLASSISN) ? $type2[get_object_vars($result1[$i]->CLASSISN)[0]] : null,
                    'isn' => get_object_vars($result1[$i]->ISN) ? get_object_vars($result1[$i]->ISN)[0] : null,
                ]);
            }
        } elseif (count($searchingResult->ROWSET->row) === 1){
            $result1 = $searchingResult->ROWSET->row;
            array_push($result, [
                'lastName' => get_object_vars($result1->LASTNAME) ? get_object_vars($result1->LASTNAME)[0] : null,
                'firstName' => get_object_vars($result1->FIRSTNAME) ? get_object_vars($result1->FIRSTNAME)[0] : null,
                'parentName' => get_object_vars($result1->PARENTNAME) ? get_object_vars($result1->PARENTNAME)[0] : null,
                'birthday' => get_object_vars($result1->BIRTHDAY) ? get_object_vars($result1->BIRTHDAY)[0] : null,
                'iin' => get_object_vars($result1->IIN) ? get_object_vars($result1->IIN)[0] : null,
                'classIsn' => get_object_vars($result1->CLASSISN) ? $type2[get_object_vars($result1->CLASSISN)[0]] : null,
                'isn' => get_object_vars($result1->ISN) ? get_object_vars($result1->ISN)[0] : null,
            ]);
        }
        return response()->json([
            'result' => $result
        ]);
    }

    public function agreementCalcSearch(Request $request, KiasServiceInterface $kias){ //Поиск полных котировок
        $error = "";
        $result = [];
        $searchingAgreement = $kias->AGREEMENTCALCSEARCH($request->quotes['number'], $request->quotes['dateBeg'],
            $request->quotes['dateEnd'], $request->quotes['type'], $request->quotes['dateBegAction'], $request->quotes['dateEndAction'],
            $request->quotes['subdivision'], $request->quotes['curator'], $request->quotes['insuranceProduct'], $request->quotes['status'],
            $request->quotes['creationSource'] ? $request->quotes['creationSource'] : '', '1');
//        dd($searchingAgreement);
    }
}
