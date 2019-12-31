<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    protected $fillable = [
        'name', 'email', 'password', 'role_id'
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function processFavirotes($product_id)
    {
        $products_id = $this->favorites()->pluck('product_id');
        foreach ($products_id as $id)
        {
            if ($id == $product_id)
            {
                return $this->favorites()->detach($product_id);
            }
        }
        return $this->favorites()->attach($product_id);
    }

    public function role()
    {
        return $this->hasOne(Role::class);
    }

    public function favorites()
    {
        return $this->belongsToMany(Product::class, 'favorites')->withTimestamps();
    }
}
