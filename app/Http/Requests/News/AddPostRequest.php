<?php

namespace App\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;

class AddPostRequest extends FormRequest {
  public function rules() {
    return [
      'isn' => 'numeric',
      'poll' => 'string',
      'question' => 'string',
      'answers' => 'string',
      'postText' => 'string',

    ];
  }

  public function authorize() {
    return true;
  }
}
