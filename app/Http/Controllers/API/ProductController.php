<?php

namespace App\Http\Controllers\API;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return Product::latest()->paginate(5);
        //return ['message' => 'Product Listing.'];
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
        $this->validate($request,[
            'name' => 'required|string|max:191',
            'address' => 'required|string|max:191',
            'city' => 'required|string|max:191',
            'phone' => 'required|string|max:191'

        ]);
        */

        return Product::create([
            'user_id' => $request['user_id'],
            'product_name' => $request['product_name'],
            'product_model_no' => $request['product_model_no'],
            'product_price' => $request['product_price'],
            'brand' => $request['brand'],
            'product_description' => $request['product_description']
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $product = Product::findOrFail($id);
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
        $product = Product::find($id);

        $product->delete();
        return ['message' => 'Product Deleted'];
    }
}
