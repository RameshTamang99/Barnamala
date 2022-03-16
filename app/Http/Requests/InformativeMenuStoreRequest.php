<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InformativeMenuStoreRequest extends FormRequest
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
            'name' => 'required',
            'description' => 'required|max:100',
            'background' =>'required|mimes:jpeg,jpg,png|image',
            'back_icon' =>'required|mimes:jpeg,jpg,png|image',
            'card_image' =>'required|mimes:jpeg,jpg,png|image'
        ];
    }
}
