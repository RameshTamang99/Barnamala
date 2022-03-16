<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Byanjan extends Model
{

    use HasFactory, Notifiable,SoftDeletes;

    protected $table="byanjans";

    public function barakharis()
    {
        return $this->hasMany(barakhari::class);
    }

    public function k_mane_kachuwas()
    {
        return $this->hasMany(k_mane_kachuwa::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'byanjan_name',
        'byanjan_audio',
        'byanjan_order'
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
