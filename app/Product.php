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

    public function countFarivote($id)
    {
        return $this->favorites()->wherePivot('product_id', $id)->count();
    }

    public function getIsFarivotesAttribute()
    {
        return $this->countFarivote($this->attributes['id']);
    }

    public function checkFarivote($id)
    {
        $users_id =  $this->favorites()->pluck('user_id');
        foreach ($users_id as $user_id)
        {
            if ($user_id == $id)
            {
                return true;
            }
        }
        return false;
    }

    public function getReviewCountAttribute()
    {
        return $this->reviews()->count();
    }

    public function getDistinctReviewCountAttribute()
    {
        return $this->reviews()->distinct('email')->count();
    }

    public function getAvgStarReviewAttribute()
    {
        return number_format($this->reviews()->avg('rate'), 2);
    }

    public function cate()
    {
        return $this->belongsTo(Category::class);
    }

    public function favorites()
    {
        return $this->belongsToMany(Product::class, 'favorites');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
