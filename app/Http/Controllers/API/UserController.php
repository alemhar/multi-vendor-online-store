<?php

namespace App\Http\Controllers\API;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

        $user->name = $request->input('store_name');
        
        
        $user->save();


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
}
