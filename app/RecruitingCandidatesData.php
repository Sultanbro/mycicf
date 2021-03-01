<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Recruiting;

class RecruitingCandidatesData extends Model
{
    public function getDocuments(){
        $file = Storage::disk('local')->files("public/candidate_data/$this->id/");
        foreach ($file as $key => $item){
            $fileName = explode('/', $item);
            $fileName = end($fileName);
            $file[$key] = [
                'link' => "/storage".substr($item,6),
                'type' => $this->getTypeOfDocument($fileName),
                'name' => $fileName,
            ];
        }
        return $file;
    }

    public function getTypeOfDocument($doc_name){
        $ext = explode('.', $doc_name);
        $ext = end($ext);
        switch ($ext){
            case 'doc' :
                return 'fa-file-word text-primary';
                break;
            case 'docx' :
                return 'fa-file-word text-primary';
                break;
            case 'dot' :
                return 'fa-file-word text-primary';
                break;
            case 'xls' :
                return 'fa-file-excel text-success';
                break;
            case 'xlsx' :
                return 'fa-file-excel text-success';
                break;
            case 'pdf' :
                return 'fa-file-pdf text-danger';
                break;
            case 'ppt' :
                return 'fa-file-powerpoint text-warning';
                break;
            case 'pptx' :
                return 'fa-file-powerpoint text-warning';
                break;
            case 'rar' :
                return 'fa-file-archive text-info';
                break;
            case 'zip' :
                return 'fa-file-archive text-info';
                break;
            default :
                return 'fa-file-o';
        }
    }
}
