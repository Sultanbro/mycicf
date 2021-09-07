<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QuestionAnswerResource extends JsonResource
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
            return ['Нет такого вопроса'];
        }
        return [
            'question_id' => $this->id,
            'question' => $this->question,
            'answers' => QuizAnswersResource::collection(data_get($this, 'answers')),
            'material' => MaterialResource::collection(data_get($this, 'material')),
        ];
    }
}
