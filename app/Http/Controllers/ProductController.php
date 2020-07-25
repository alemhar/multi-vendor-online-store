<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Product;
use App\UserDetail;
use App\User;

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
        
        //$userDetail = UserDetail::where('public_id', $public_id)->get()->first(); 
        
        //$user_id = $userDetail->user_id;
        
        //$products = Product::where('user_id', $user_id)->latest()->paginate(5);

        return $request;

        
    }

}
