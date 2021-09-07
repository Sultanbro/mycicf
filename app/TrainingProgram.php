<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainingProgram extends Model
{
    protected $fillable = [
        'name',
        'description',
    ];

    public function material()
    {
        return $this->belongsToMany('App\EducationalMaterial','training_materials', 'training_program_id', 'educational_material_id');
    }

}
