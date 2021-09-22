<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AssignTraining extends Model
{
    protected $fillable = [
        'kias_id',
        'training_programs_id',
        'date_start',
        'date_end',
        'status',
    ];

    public function kias()
    {
        return $this->hasOne(Branch::class, 'kias_id', 'kias_id');
    }

    public function training()
    {
        return $this->hasManyThrough( TrainingProgram::class,AssignTrainingsProgram::class,'assign_training_id', 'id', 'id', 'training_programs_id');
    }
}
