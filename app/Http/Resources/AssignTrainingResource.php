<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AssignTrainingResource extends JsonResource
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
            'user_info' => new UserInfoResource(data_get($this, 'user')),
            'training_program' => data_get($this, 'training'),
            'date_start' => $this->date_start,
            'date_end' => $this->date_end,
            'status' => $this->status,
        ];
    }
}
