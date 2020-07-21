<?php

namespace App\Http\Controllers\API;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\ImageManagerStatic as Image;


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

        $product_photo_base64 = $request->input('product_photo_base64');
        $user_id = $request['user_id'];
        $product_name = $request['product_name'];
        $product_model_no = $request['product_model_no'];
        $product_price = $request['product_price'];
        $brand = $request['brand'];
        $product_photo = ''; 
        $product_description = $request['product_description'];

        if($product_photo_base64){
            // Delete Old Photo
            /*
            $current_product_photo = public_path('img/logo/').$product_photo;
            if(file_exists($current_product_photo)){
                @unlink($current_product_photo);
            }
            */
            // Create and save new photo
            $file_ext = explode('/', mime_content_type($product_photo_base64))[1];
            $product_photo = $user_id . '_' . time() . '.' . $file_ext;

            // configure with favored image driver (gd by default)
            // Image::configure(array('driver' => 'imagick'));
            Image::make($product_photo_base64)->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->save(public_path('img/products/').$product_photo);
        } 

        return Product::create([
            'user_id' => $user_id,
            'product_name' => $product_name,
            'product_model_no' => $product_model_no,
            'product_price' => $product_price,
            'brand' => $brand,
            'product_photo' => $product_photo,
            'product_description' => $product_description
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
        $product = Product::findOrFail($id);

        

        $product_photo_base64 = $request['product_photo_base64'];
        $user_id = $request['user_id'];
        $product_name = $request['product_name'];
        $product_model_no = $request['product_model_no'];
        $product_price = $request['product_price'];
        $brand = $request['brand'];
        $product_photo = ''; 
        $product_description = $request['product_description'];


        if($product_photo_base64){
            // Delete Old Photo
            $current_product_photo = public_path('img/products/').$product_photo;
            if(file_exists($current_product_photo)){
                @unlink($current_product_photo);
            }
            // Create and save new photo
            $file_ext = explode('/', mime_content_type($product_photo_base64))[1];
            $product_photo = $user_id . '_' . time() . '.' . $file_ext;

            // configure with favored image driver (gd by default)
            // Image::configure(array('driver' => 'imagick'));
            Image::make($product_photo_base64)->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->save(public_path('img/products/').$product_photo);
        } 

        $product->update([
            'user_id' => $user_id,
            'product_name' => $product_name,
            'product_model_no' => $product_model_no,
            'product_price' => $product_price,
            'brand' => $brand,
            'product_photo' => $product_photo,
            'product_description' => $product_description
            ]);

        return ['message' => $product_photo];    


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
