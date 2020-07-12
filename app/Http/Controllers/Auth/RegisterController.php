<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\UserDetail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        /*
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        */    
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $username = strstr($user->email, '@', true);
        $public_id = str_replace(array('.','_'), '',$username) . rand(1050,9999);
        UserDetail::create([
            'user_id' => $user->id,
            'first_name' => '',
            'middle_name' => '',
            'last_name' => '',
            'user_address1' => '',
            'user_address2' => '',
            'user_city' => '',
            'user_mobile' => '',
            'user_tel' => '',
            'user_facebook' => '',
            'user_twitter' => '',
            'user_instagram' => '',
            'user_rating' => 0,
            'platform_rating' => 0,
            'platform_rank' => '',
            'public_id' => $public_id
        ]);

        return $user;
    }
}
