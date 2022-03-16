<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Quiz extends Model
{
    use HasFactory, Notifiable,SoftDeletes;

    protected $table="quizzes";

    public function quiz_category()
    {
        return $this->belongsTo(quiz_category::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'quiz_cat_code',
        'question',
        'option_1',
        'option_2',
        'option_3',
        'option_4',
        'right_option',
        'question_level',
        'quiz_order'

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        // 'password',
        // 'remember_token',
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
