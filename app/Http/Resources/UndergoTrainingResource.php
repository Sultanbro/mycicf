<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UndergoTrainingResource extends JsonResource
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
            'useful' => $this->useful,
            'comment' => $this->comment,
            'connection' => $this->connection,
            'created' => $this->created_at,
            'user_info' => new UserInfoResource(data_get($this, 'user')),
        ];
    }
}
