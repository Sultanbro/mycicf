<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class FullQuotation extends Model
{
    protected $table = 'full_quotation';
    protected $fillable = ['product_isn','user_isn','data','object_card','participants','attributes','contract_number','contract_begin_date','contract_end_date'];

    public function product(){
        return $this->hasOne('App\FullProduct','product_isn','product_isn');
    }
}
