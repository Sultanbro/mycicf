<?php

namespace App;

use App\Library\Services\KiasServiceInterface;
use Illuminate\Database\Eloquent\Model;
use App\Branch;

class Recruiting extends Model
{
    /**
     * @param $isn
     * @param $kiasService KiasServiceInterface
     */
    public function getBranchNameByIsn($isn, $kiasService){
        $res = $kiasService->getDictiData($isn);
        $fullname = $isn;
        foreach ($res->ROWSET->row as $row){
            if((string)$row->ISN === (string)$isn){
                $fullname = $row->FULLNAME;
                break;
            }
        }
        return $fullname;
    }

    public function getBranchName($isn){
        $res = Branch::where('kias_id',$isn)->first();
        $fullname = $res ? $res->fullname : $isn;
        return $fullname;
    }
    public function getChiefsDicti($isn){
        $res = Dicti::where('isn',$isn)->first();
        $fullname = $res ? $res->fullname : $isn;
        return $fullname;
    }
}
