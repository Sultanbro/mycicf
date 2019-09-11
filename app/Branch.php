<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Branch
 * @param string $fullname
 * @param int $kias_id
 * @param int $kias_parent_id
 * @param int $has_child
 * @param int $verified
 * @package App
 */
class Branch extends Model
{
    protected $table = 'branches';

    public function childs() {
        return $this->hasMany('App\Branch','kias_parent_id','kias_id') ;
    }
}
