<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LiteratureCategoryDetailsStoreRequest extends FormRequest
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
            'category_id' => 'required|exists:literature_categories,category_id',
            'title_name' => 'required',
            'thumbnail_image' => 'mimes:jpeg,jpg,png|image',
            'vimeo_id' => 'mimes:mp4,mov,ogg',
        ];
    }
}
