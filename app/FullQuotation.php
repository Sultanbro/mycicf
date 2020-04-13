<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FullQuotation extends Model
{
    protected $fillable = ['product_isn','user_isn','object_card','participants','attributes','contract_number','contract_begin_date','contract_end_date'];
}
