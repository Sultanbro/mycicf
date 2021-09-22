<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\This;

class TrainingProgram extends Model
{
    protected $fillable = [
        'name',
        'description',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function materials()
    {
//        return $this->belongsToMany('App\EducationalMaterial','training_materials', 'training_program_id', 'educational_material_id');
        return $this->hasMany(TrainingMaterial::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function quizzes()
    {
//        return $this->belongsToMany('App\Quiz', 'training_quizzes', 'training_program_id', 'quiz_id');
        return $this->hasMany(TrainingQuiz::class);
    }

}
