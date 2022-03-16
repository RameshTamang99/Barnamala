<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class LiteratureCategoryDetails extends Model
{
    use HasFactory, Notifiable,SoftDeletes;

    protected $table="literature_category_details";

    public function literature_categories()
    {
        return $this->belongsTo(LiteratureCategory::class);
    }

        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id',
        'title_name',
        'thumbnail_image',
        'vimeo_id',
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
