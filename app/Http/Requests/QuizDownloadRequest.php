<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuizDownloadRequest extends FormRequest
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
            'file' => 'required',
            'quiz' => [
                'name' => 'required',
                'passing_score' => 'required',
                'time' => 'required',
                'description' => 'required',
            ]
        ];
    }

//    public function messages()
//    {
//        return [
//            'file.required' => 'Загрузите файл',
//            'file.in:doc,xlsx,xls' => 'Формат файла должен быть в формате Excel',
//        ];
//    }
}
