<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use function foo\func;

class Order extends Model
{
    protected $fillable = [
        'name', 'email', 'address', 'total', 'message', 'payment_id', 'status'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_details')->withTimestamps();
    }
}
