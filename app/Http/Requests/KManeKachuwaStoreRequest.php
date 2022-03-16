<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KManeKachuwaStoreRequest extends FormRequest
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
            'byanjan_id' => 'required|exists:byanjans,id',
            'kmk_name' => 'required',
            'kmk_image' => 'required|mimes:jpeg,jpg,png|image',
            'kmk_audio' => 'required|mimes:mp3,wav,m4a'
        ];
    }
}
