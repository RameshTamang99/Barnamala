<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NoWifiUiStoreRequest extends FormRequest
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

            'model_image' => 'image|mimes:jpeg,jpg,png',
            'reconnect_btn_image' => 'image|mimes:jpeg,jpg,png',
        ];
    }
}
