<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    protected $fillable = [
        'user_id', 
        'customer_id', 
        'customer_name', 
        'customer_contact', 
        'total', 
        'total_qty'
    ];


    public function detail()
    {
        return $this->hasMany('App\CheckoutDetail');
    }
}
