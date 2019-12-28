<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    protected $fillable = [
        'name', 'price', 'description', 'thumbnail', 'view_count', 'cate_id'
    ];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function getPriceFormatAttribute()
    {
        return number_format($this->attributes['price'], 2, ',', '.');
    }

    public function cate()
    {
        return $this->belongsTo(Category::class);
    }
}
