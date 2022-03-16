<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class LiteratureCategory extends Model
{
    use HasFactory, Notifiable,SoftDeletes;

    protected $table="literature_categories";

    public function literature_category_details()
    {
        return $this->hasMany(LiteratureCategoryDetails::class);
    }

        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'status',
        'category_id',
        'icon_image',
        'bg_image_details',
        'back_button_details',
        'card_button_details',
        'order',
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
