<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

/**
 * Class Branch
 * @property $fullname string
 * @property $kias_id int
 * @property $kias_parent_id int
 * @property $has_child int
 * @property $verified int
 * @property $duty string
 * @package App
 */
class Branch extends Model
{
    protected $table = 'branches';

    public function childs() {
        return $this->hasMany('App\Branch','kias_parent_id','kias_id') ;
    }

    public function getUserName($isn){
        return $isn === 0 ? "ADMIN" : (self::where('kias_id', $isn)->first()->fullname ?? "DELETED");
    }

    public static function getParentId($ISN){
        return self::where('kias_id', $ISN)->first()->kias_parent_id;
    }

    protected $attributes = [
        'fullname' => null,
        'kias_id' => null,
        'kias_parent_id' => null,
        'has_child' => 0,
        'verified' => 0,
    ];

    public static function checkImageExists($ISN){
        return Storage::disk('local')->exists("public/images/employee/$ISN.png");
    }
}
