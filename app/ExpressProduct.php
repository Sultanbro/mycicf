<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExpressProduct extends Model
{
    public function constr(){
        return $this->hasOne('App\FullConstructor','product_isn','product_isn');
    }
}
