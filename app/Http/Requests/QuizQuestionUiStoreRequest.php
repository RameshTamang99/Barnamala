<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuizQuestionUiStoreRequest extends FormRequest
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
            'header_image' =>'mimes:jpeg,jpg,png|image',
            'score_card_image' =>'mimes:jpeg,jpg,png|image',
            'time_card_image' =>'mimes:jpeg,jpg,png|image',
            'question_card_image' =>'mimes:jpeg,jpg,png|image',
            'answer_card_image' =>'mimes:jpeg,jpg,png|image',
            'plus_one_image' =>'mimes:jpeg,jpg,png|image',
            'winner_model_image' =>'mimes:jpeg,jpg,png|image',
            'lost_model_image' =>'mimes:jpeg,jpg,png|image',
            'play_again_button_image' =>'mimes:jpeg,jpg,png|image',
            'go_to_home_button_image' =>'mimes:jpeg,jpg,png|image'
        ];
    }
}
