<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginScreenUiStoreRequest extends FormRequest
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
            'header_text_image' =>'mimes:jpeg,jpg,png|image',
            'login_button_image' =>'mimes:jpeg,jpg,png|image',
            'fb_button_image' =>'mimes:jpeg,jpg,png|image',
            'google_button_image' =>'mimes:jpeg,jpg,png|image',
            'password_forget_button_image' =>'mimes:jpeg,jpg,png|image',
            'new_account_button_image' =>'mimes:jpeg,jpg,png|image',
        ];
    }
}
