<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class HomeScreenUi extends Model
{
    use HasFactory, Notifiable;

        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'background_image',
        'quiz_icon_image',
        'literature_icon_image',
        'barnamaala_icon_image',
        'informatives_icon_image',
        'profile_icon_image',
        'sound_on_icon_image',
        'sound_off_icon_image',
        'close_icon_image',
        'close_model_image',
        'close_button_image',
        'dont_close_button_image',
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
