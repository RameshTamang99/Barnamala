<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SworStoreRequest extends FormRequest
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
            'swor_name' => 'required',
            'swor_audio' => 'required|mimes:mp3,wav,m4a',
        ];
    }
}
