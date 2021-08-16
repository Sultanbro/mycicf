<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParseOpu extends Model
{
    public function company() {
        return $this->belongsTo(InsuranceCompany::class);
    }
}
