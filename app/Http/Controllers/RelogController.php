<?php

namespace App\Http\Controllers;

use App\Library\Services\Kias;
use App\Library\Services\KiasServiceInterface;
use App\Relog;
use App\RelogUrl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class RelogController extends Controller
{
    public function saveRelogImages(Request $request) {

        DB::beginTransaction();
        try {
            $data = $request->all();

            $relog_model = new Relog();
            $relog_model->doc_no = $data['externalId'];
            $relog_model->in_process = 0;
            $relog_model->status = Relog::STATUS_PENDING;
            $relog_model->save();

            $relog_urls = new RelogUrl();
            $relog_urls->doc_id = $relog_model->id;
            $relog_urls->url = $data['url'];
            $relog_urls->save();

            $success = true;

        } catch(Exception $e) {
            $success = false;
            $error_message = $e->getMessage();
        }
        if($success) {
            DB::commit();
            return [
                "success" => $success,
                "code" => "200"
            ];
        }
        else {
            DB::rollBack();
            return [
                "success" => false,
                "code" => "419"
            ];
        }
    }
}
