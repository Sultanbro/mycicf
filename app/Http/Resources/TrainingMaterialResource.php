<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TrainingMaterialResource extends JsonResource
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
            'training_material_id' => $this->id,
            'training_program_id' => $this->training_program_id,
            'created' => $this->created_at,
            'educational_material' => new EducationalMaterialResource(data_get($this, 'material')),
        ];
    }
}
