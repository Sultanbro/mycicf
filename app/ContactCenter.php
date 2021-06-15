<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactCenter extends Model
{
    public function labels(){
        return $this->hasMany(ContactCenterLabel::class, 'parent_id', 'id');
    }

    public function getLabels(){
        $result = [];
        foreach ($this->labels as $label) {
            $result[] = [
                'text' => $label->text,
                'original' => $label->text,
                'deleted' => false,
                'id' => $label->id
            ];
        }
        return $result;
    }
}
