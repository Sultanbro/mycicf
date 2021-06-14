<?php
namespace App\Http\Controllers;

use App\Branch;
use App\ContactCenter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactCenterController extends Controller {

    public function index() {
        return view('contact-center.manager');
    }

    public function test(Request $request) {
        try{
            $model = new ContactCenter();
            $model->value = $request->value;
            $model->isn = $request->isn;
            $model->save();
        }catch (\Exception $ex){
            return response()->json([
                'success' => false,
                'error' => $ex->getMessage()
            ]);
        }
        return response()->json([
            'success' => true
        ]);
    }
}
