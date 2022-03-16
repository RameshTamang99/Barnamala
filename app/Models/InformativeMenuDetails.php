<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class InformativeMenuDetails extends Model
{
    use HasFactory, Notifiable,SoftDeletes;

    protected $table="informative_menu_details";

    public function informative_menus()
    {
        return $this->belongsTo(InformativeMenu::class);
    }

        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'menu_id',
        'imd_name',
        'imd_image',
        'imd_audio',
        'imd_video',
        'imd_description',
        'imd_order',
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
