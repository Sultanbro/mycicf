<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ExpressQuotation extends Model
{
    protected $table = 'express_quotation';
    protected $fillable = ['product_isn','user_isn','data','contract_number','contract_begin_date','contract_end_date'];

    public function product(){
        return $this->hasOne('App\ExpressProduct','product_isn','product_isn');
    }
}
