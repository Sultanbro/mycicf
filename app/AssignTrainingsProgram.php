<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssignTrainingsProgram extends Model
{
    protected $fillable = [
        'assign_training_id',
        'training_programs_id'
    ];
}
