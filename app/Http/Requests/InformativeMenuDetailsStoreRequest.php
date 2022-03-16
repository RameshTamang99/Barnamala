<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InformativeMenuDetailsStoreRequest extends FormRequest
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
            'menu_id' => 'required|exists:informative_menus,menu_id',
            'imd_name' => 'required',
            'imd_image' => 'mimes:jpeg,jpg,png|image',
            'imd_audio' => 'mimes:mp3,wav,m4a',
            'imd_video' => 'mimes:mp4,mov,ogg',
            'imd_background_image' => 'mimes:jpeg,jpg,png|image',
        ];
    }
}
