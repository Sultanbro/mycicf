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
}
