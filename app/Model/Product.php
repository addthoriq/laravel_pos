<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function orderDetail()
    {
        return $this->hasMany(OrderDetail::class, 'product_name');
    }
}
