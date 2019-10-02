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
 * @package App
 */
class Branch extends Model
{
    protected $table = 'branches';

    public function childs() {
        return $this->hasMany('App\Branch','kias_parent_id','kias_id') ;
    }

    protected $attributes = [
        'fullname' => null,
        'kias_id' => null,
        'kias_parent_id' => null,
        'has_child' => 0,
        'verified' => 0,
    ];

}
