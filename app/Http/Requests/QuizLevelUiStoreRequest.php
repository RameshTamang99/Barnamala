<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuizLevelUiStoreRequest extends FormRequest
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
            'background_image' =>'mimes:jpeg,jpg,png|image',
            'back_button_image' =>'mimes:jpeg,jpg,png|image',
            'sajilo_level_button_image' =>'mimes:jpeg,jpg,png|image',
            'madhyama_level_button_image' =>'mimes:jpeg,jpg,png|image',
            'gaaro_level_button_image' =>'mimes:jpeg,jpg,png|image',
            'avatar_image' =>'mimes:jpeg,jpg,png|image'
        ];
    }
}
