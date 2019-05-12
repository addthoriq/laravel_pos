<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
	use SoftDeletes;
    protected $dates 	= ['deleted_at'];
    protected $fillable = ['category_id', 'name', 'price', 'status', 'created_at', 'updated_at'];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
