<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EducationalMaterial extends Model
{
    protected $fillable = ['name',
        'link',
        'description',
        'type',];
}
