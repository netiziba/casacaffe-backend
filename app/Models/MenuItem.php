<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    protected $fillable = [
        'category_id', 'name', 'description', 'price',
        'image_url', 'sub_category', 'sort_order',
    ];

    protected $casts = [
        'sort_order' => 'integer',
    ];

    public function category()
    {
        return $this->belongsTo(MenuCategory::class, 'category_id');
    }
}
