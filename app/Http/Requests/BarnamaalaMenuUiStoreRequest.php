<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BarnamaalaMenuUiStoreRequest extends FormRequest
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
            'byanjan_menu_button_image' =>'mimes:jpeg,jpg,png|image',
            'ka_mane_kachuwa_menu_button_image' =>'mimes:jpeg,jpg,png|image',
            'barakhari_menu_button_image' =>'mimes:jpeg,jpg,png|image',
            'swor_menu_button_image' =>'mimes:jpeg,jpg,png|image',
            'sankhya_menu_button_image' =>'mimes:jpeg,jpg,png|image'
        ];
    }
}
