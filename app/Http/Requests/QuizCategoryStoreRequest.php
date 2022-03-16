<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuizCategoryStoreRequest extends FormRequest
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
            'quiz_cat_name' => 'required',
            'quiz_cat_icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
        ];
    }
}
