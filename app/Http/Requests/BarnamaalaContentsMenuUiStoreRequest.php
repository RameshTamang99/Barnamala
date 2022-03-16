<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BarnamaalaContentsMenuUiStoreRequest extends FormRequest
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
            'list_bg_image' =>'mimes:jpeg,jpg,png|image',
            'list_back_button_image' =>'mimes:jpeg,jpg,png|image',
            'list_letter_card_image' =>'mimes:jpeg,jpg,png|image',
            'list_header_image' =>'mimes:jpeg,jpg,png|image',
            'particular_text_card_image' =>'mimes:jpeg,jpg,png|image',
            'particular_teacher_avatar_image' =>'mimes:jpeg,jpg,png|image',
            'particular_back_button_image' =>'mimes:jpeg,jpg,png|image',
            'particular_background_image' =>'mimes:jpeg,jpg,png|image',
            'particular_auto_play_icon_image' =>'mimes:jpeg,jpg,png|image',
            'type' =>'required|in:byanjan,barakhari,swor,sankhya',


        ];
    }
}
