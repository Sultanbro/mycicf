<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FullConstructor extends Model
{
    protected $table = 'full_quotation_constructor';

    public function product(){
        return $this->hasOne('App\ExpressProduct','product_isn','product_isn');
    }
}
