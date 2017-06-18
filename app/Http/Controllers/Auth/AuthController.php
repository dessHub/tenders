<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
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
            'fname' => 'required|max:255',
            'lname' => 'required|max:255',
            'phoneno' => 'required|max:255|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'c_name' => 'required|max:255|unique:users',
            'regNo' => 'required|max:255|unique:users',
            'kra_pin' => 'required|max:255|unique:users',
            'address' => 'required|max:255',
            'town' => 'required|max:255',
            'county' => 'required|max:255',
            'org_type' => 'required|max:255',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'fname' => $data['fname'],
            'lname' => $data['lname'],
            'regNo' => $data['regNo'],
            'email' => $data['email'],
            'phoneno' => $data['phoneno'],
            'c_name' => $data['c_name'],
            'kra_pin' => $data['kra_pin'],
            'address' => $data['address'],
            'county' => $data['county'],
            'town' => $data['town'],
            'org_type' => $data['org_type'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
