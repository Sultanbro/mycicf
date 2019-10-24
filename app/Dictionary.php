<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dictionary extends Model
{
    const TYPE_ROLE = 'role';

    public function getParentName(){
        return $this->parent_id === 0 ? '' : (self::findOrFail($this->parent_id)->name ?? 'Error');
    }
}
