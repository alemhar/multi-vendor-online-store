<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Product;
use App\UserDetail;
use App\Checkout;
use App\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewOrder;
use App\Http\Resources\Product as ProductResource;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function shop($public_id)
    {
        $userDetail = UserDetail::where('public_id', $public_id)->get()->first(); 
        $user_id = $userDetail->user_id;
        $user = User::where('id', $user_id)->get()->first();

        $user_info = ['store_name' => $user->name, 'public_id' => $public_id];
        
        return view('shop', compact('data', 'user_info') );
    }

    public function public_list($public_id)
    {
        $userDetail = UserDetail::where('public_id', $public_id)->get()->first(); 
        
        $user_id = $userDetail->user_id;
        
        $products = Product::where('user_id', $user_id)->latest()->paginate(5);

        return ProductResource::collection($products);

        
    }

    public function checkout(Request $request)
    {

        
            
        $user_id = $request['user_id'];
        $customer_id = $request['customer_id'];
        
        $customer_name = $request['customer_name'];
        $customer_contact = $request['customer_contact_no'];
        $total = $request['total'];
        $total_qty = $request['total_qty'];

        $products = $request['products'];
        $customer = ['name' => $customer_name, 'contact' => $customer_contact, 'total' => $total, 'total_qty' => $total_qty];
        
        $user = User::where('id', $user_id)->get()->first();
        $to = $user->email;

        $checkout = [ 
            'user_id' => $user_id, 
            'customer_id' => $customer_id, 
            'customer_name' => $customer_name, 
            'customer_contact' => $customer_contact, 
            'total' => $total, 
            'total_qty' => $total_qty
        ];
        $newCheckout = Checkout::create($checkout);
        $newCheckout->detail()->createMany($products);

        Mail::to($to)->send(new NewOrder($customer, $products));
       
        return $request;

        
    }
    public function getseller($public_id)
    {
        $userDetail = UserDetail::where('public_id', $public_id)->get()->first(); 
        return $userDetail;
        
    }

}
