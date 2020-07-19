<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'user_id', 
        'product_name', 
        'product_model_no', 
        'product_description', 
        'product_price', 
        'brand', 
        'category_id', 
        'in_stock'
    ];
}
