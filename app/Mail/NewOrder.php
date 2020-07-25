<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewOrder extends Mailable
{
    use Queueable, SerializesModels;
    public $products;
    public $customer;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($customer, $products)
    {
        $this->products = $products;
        $this->customer = $customer;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $now = \Carbon\Carbon::now();
        $products = $this->products;  
        $customer = $this->customer;    
        return $this->subject('Order: Online Store Ko | '.$now)->view('newordermail',["products"=>$products,"customer"=>$customer]);
    }
}
