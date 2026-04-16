<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuCategory extends Model
{
    protected $fillable = ['title', 'icon', 'has_images', 'sort_order', 'show_in_menu'];

    protected $casts = [
        'has_images'   => 'boolean',
        'sort_order'   => 'integer',
        'show_in_menu' => 'boolean',
    ];

    public function items()
    {
        return $this->hasMany(MenuItem::class, 'category_id')->orderBy('sort_order');
    }
}
