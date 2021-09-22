<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ConductTrainingResource extends JsonResource
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
            'theme' => $this->theme,
            'description' => $this->description,
            'date' => $this->date,
            'connection' => $this->connection,
            'created' => $this->created_at,
            'user_info' => new UserInfoResource(data_get($this, 'user')),
        ];
    }
}
