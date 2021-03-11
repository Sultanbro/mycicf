<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    use SoftDeletes;
    protected $table = 'booking';
//    public static function get(){
//        $ts = time();
//        $start = (date('w', $ts) == 0) ? $ts : strtotime('last sunday', $ts);
//        $start_date = date('Y-m-d', $start);
//        $end_date = date('Y-m-d', strtotime('next friday', $start));
//
//        return Booking::where('begDate', $start)->where('endDate', $end_date);
//    }

    public function createData()
    {
        $result = [];
        $result["to"] = $this->formatDate($this->to);
        $result["from"] = $this->formatDate($this->from);
        $result["data"] = [
            "id" => null,
            "title" => $this->title,
            "author" => $this->author,
            "office" => $this->office,
            "description" => $this->title
        ];
        $this->data = json_encode($result);
    }

    public function formatDate($date){
        $dateString = (string)$date;
        $dateString = substr_replace($dateString, 'T', 10, 1);
        $dateString.="+06:00";
        return $dateString;
    }
}
