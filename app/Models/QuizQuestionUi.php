<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class QuizQuestionUi extends Model
{
    use HasFactory, Notifiable;

        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'background_image',
        'header_image',
        'score_card_image',
        'time_card_image',
        'question_card_image',
        'plus_one_image',
        'winner_model_image',
        'lost_model_image',
        'play_again_button_image',
        'go_to_home_button_image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        // 'email_verified_at' => 'datetime',
    ];
}
