<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
    public function orderDetail()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
