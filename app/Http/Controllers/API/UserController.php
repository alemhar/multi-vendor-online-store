<?php

namespace App\Http\Controllers\API;

use App\User;
use App\UserDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// import the Intervention Image Manager Class
use Intervention\Image\ImageManagerStatic as Image;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return ['message' => 'Item Listed!'];

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
        //return ['message' => 'Show: ' . $id];
        $user = User::find($id);
        $userInfo = [
            'id' => $user->id,
            'store_name'  => $user->name,
            'email' => $user->email,
            'first_name' => $user->detail->first_name,
            'middle_name' => $user->detail->middle_name,
            'last_name' => $user->detail->last_name,
            'user_address1' => $user->detail->user_address1,
            'user_address2' =>  $user->detail->user_address2,
            'user_city' =>  $user->detail->user_city,
            'user_mobile' =>  $user->detail->user_mobile,
            'user_tel' =>  $user->detail->user_tel,
            'public_id' =>  $user->detail->public_id,
            'user_type' =>  $user->detail->user_type,
            'user_logo' =>  $user->detail->user_logo,
            'created_at' =>  $user->created_at

        ];
        
        return $userInfo;
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
        //$user = User::find($id);
        $user = User::with('detail')->findOrFail($id);
        
        // Header
        $user->name = $request->input('store_name');


        // Detail
        $first_name = $request->input('first_name');
        $middle_name = $request->input('middle_name');
        $last_name = $request->input('last_name');
        $user_address1 = $request->input('user_address1');
        $user_address2 = $request->input('user_address2');
        $user_city = $request->input('user_city');
        $user_mobile = $request->input('user_mobile');
        $user_tel = $request->input('user_tel');
        $public_id = $request->input('public_id');
        $user_logo_base64 = $request->input('user_logo_base64');
        $user_logo = $request->input('user_logo');
        


        $user->save();
        
        if($user_logo_base64){
            // or $user_logo = time().'.' . explode('/', explode(':', substr($request->photo, 0, strpos($request->photo, ';')))[1])[1];

            // Delete Old Photo
            $current_user_logo = public_path('img/logo/').$user_logo;
            if(file_exists($current_user_logo)){
                @unlink($current_user_logo);
            }

            // Create and save new photo
            $file_ext = explode('/', mime_content_type($user_logo_base64))[1];
            $user_logo = $public_id . '_' . time() . '.' . $file_ext;

            // configure with favored image driver (gd by default)
            // Image::configure(array('driver' => 'imagick'));
            Image::make($user_logo_base64)->save(public_path('img/logo/').$user_logo);
        } 

        if ($user->detail === null)
        {
            $detail = new UserDetail([
                'first_name' => $first_name,
                'middle_name' => $middle_name,
                'last_name' => $last_name,
                'user_address1' => $user_address1,
                'user_address2' => $user_address2,
                'user_city' => $user_city,
                'user_mobile' => $user_mobile,
                'user_tel' => $user_tel,
                'user_logo' => $user_logo
                ]);
            $user->detail()->save($detail);
        }
        else
        {
            $user->detail->update([
                'first_name' => $first_name,
                'middle_name' => $middle_name,
                'last_name' => $last_name,
                'user_address1' => $user_address1,
                'user_address2' => $user_address2,
                'user_city' => $user_city,
                'user_mobile' => $user_mobile,
                'user_tel' => $user_tel,
                'user_logo' => $user_logo
                ]);
              
        }

        //$userInfo = UserDetail::


        return ['message' => 'Item updated!'];
        

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


    public function updateProfile(Request $request)
    {
        $user = auth('api')-user();

        if($request->user_logo_base64){
            //$name 
        }
    }
}
