<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CheckoutDetail extends Model
{
    protected $fillable = [
        'checkout_id', 
        'user_id', 
        'product_id', 
        'product_name', 
        'product_model_no', 
        'product_price', 
        'product_qty'
    ];

    public function checkout()
    {
        return $this->belongsTo('App\Checkout');
    }
}
