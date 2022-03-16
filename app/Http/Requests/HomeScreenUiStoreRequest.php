<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HomeScreenUiStoreRequest extends FormRequest
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
            'quiz_icon_image' =>'mimes:jpeg,jpg,png|image',
            'literature_icon_image' =>'mimes:jpeg,jpg,png|image',
            'barnamaala_icon_image' =>'mimes:jpeg,jpg,png|image',
            'informatives_icon_image' =>'mimes:jpeg,jpg,png|image',
            'profile_icon_image' =>'mimes:jpeg,jpg,png|image',
            'sound_on_icon_image' =>'mimes:jpeg,jpg,png|image',
            'sound_off_icon_image' =>'mimes:jpeg,jpg,png|image',
            'close_model_image' =>'mimes:jpeg,jpg,png|image',
            'close_button_image' =>'mimes:jpeg,jpg,png|image',
            'dont_close_button_image' =>'mimes:jpeg,jpg,png|image',
        ];
    }
}
