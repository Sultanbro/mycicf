<?php

namespace App\Http\Resources;

use App\QuizQuestion;
use Illuminate\Http\Resources\Json\JsonResource;

class QuizСontentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        if (!isset($this->id)) {
            return ['Нет такого теста'];
        }
        return [
            'quiz_id' => $this->id,
            'name' => $this->name,
            'passing_score' => $this->passing_score,
            'time' => $this->time,
            'description' => $this->description,
            'questions_answers' => QuestionAnswerResource::collection($this->quizQuestions),
        ];
    }
}
