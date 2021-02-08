<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocMethodDescription extends Model
{
    public function category() {
        return $this->belongsTo(DocMethodCategory::class);
    }
}
