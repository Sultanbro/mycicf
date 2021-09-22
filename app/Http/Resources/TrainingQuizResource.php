<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TrainingQuizResource extends JsonResource
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
            'training_quiz_id' => $this->id,
            'training_program_id' => $this->training_program_id,
            'count_question' => $this->count_question,
            'try' => $this->try,
            'created' => $this->created_at,
            'quiz' => new QuizResource(data_get($this, 'quiz')),
        ];
    }
}
