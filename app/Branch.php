<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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

    protected $attributes = [
        'fullname' => null,
        'kias_id' => null,
        'kias_parent_id' => null,
        'has_child' => 0,
        'verified' => 0,
    ];

}
