<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocMethodCategory extends Model
{
    public function documents() {
        return $this->hasMany(DocMethodDescription::class);
    }

    public function getCategories() {
        $category_api = $this::where('category', 'api')->get(['id', 'title', 'category'])->toArray();
        $category_kias = $this::where('category', 'kias')->get(['id', 'title', 'category'])->toArray();

        $categories = array(
            'api'   => $category_api,
            'kias'  => $category_kias
        );

        if($categories) {
            return $categories;
        }
        else
            return [];
    }
}
