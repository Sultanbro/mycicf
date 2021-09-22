<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainingMaterial extends Model
{
    protected $fillable = [
        'training_program_id',
        'educational_material_id',
    ];

    public function material()
    {
        return $this->hasOne(EducationalMaterial::class, 'id', 'educational_material_id');
    }
}
