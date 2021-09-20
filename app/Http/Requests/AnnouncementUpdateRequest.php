<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnnouncementUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'thema' => 'required',
            'user_id' => 'required',
            'description' => 'required',
            'date_time' => 'required',
            'online' => 'required',
            'type' => 'required',
            'site' => 'required',
            'space' => 'required',
        ];
    }
}
