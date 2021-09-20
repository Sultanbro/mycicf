<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TrainingProgramOneResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'created' => $this->created_at,
            'material' => EducationalMaterialResource::collection(data_get($this, 'material')),
            'quizzes' => QuizResource::collection(data_get($this, 'quizzes')),
        ];
    }
}
