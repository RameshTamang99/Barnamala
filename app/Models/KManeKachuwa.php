<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class KManeKachuwa extends Model
{
    use HasFactory, Notifiable,SoftDeletes;

    protected $table="k_mane_kachuwas";

    public function byanjan()
    {
        return $this->belongsTo(byanjan::class);
    }

        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'byanjan_id',
        'kmk_name',
        'kmk_image',
        'kmk_audio',
        'kmk_order'
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
