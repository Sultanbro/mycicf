<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AnnouncementsResource extends JsonResource
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
            'thema' => $this->thema,
            'user_id' => $this->user_id,
            'description' => $this->description,
            'date_time' => $this->date_time,
            'space' => $this->space,
            'site' => $this->site,
            'type' => $this->type,
            'created' => $this->created_at,
        ];
    }
}
