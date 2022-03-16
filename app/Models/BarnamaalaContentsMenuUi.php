<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class BarnamaalaContentsMenuUi extends Model
{
    use HasFactory, Notifiable;

        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'list_bg_image',
        'list_back_button_image',
        'list_letter_card_image',
        'list_header_image',
        'particular_text_card_image',
        'particular_teacher_avatar_image',
        'particular_back_button_image',
        'particular_background_image',
        'particular_auto_play_icon_image',
        'particular_auto_play_pause_icon_image',
        'type'
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
