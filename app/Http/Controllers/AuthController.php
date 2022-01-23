<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function register (Request $request)
    {
        $validateData = $this->validate($request, [
            'name'      => 'required|max:255',
            'username'  => 'required|min:5|max:15|unique:users',
            'email'     => 'required|email|unique:users',
            'password'  => 'required|min:5|max:25'
        ]);

        $validateData['password'] = Hash::make($validateData['password']); 
        
        $register = User::create($validateData);

        if($register){
            return response()->json([
                'success'   => true,
                'message'   => 'Register Success',
                'data'      => $register
            ], 201);
        } else {
            return response()->json([
                'success'   => false,
                'Message'   => 'Register Failed',
                'data'      => ''
            ], 404);
        }
    }

    public function login (Request $request)
    {
        $email      = $request->input('email');
        $password   = $request->input('password');

        $user = User::where('email', $email)->first();

        if(Hash::check($password, $user->password)){
            $apiToken = base64_encode(Str::random(40));

            $user->update(['api_token' => $apiToken]);

            return response()->json([
                'success'   => true,
                'message'   => 'Login Sucess',
                'data'      => $user
            ], 201);
        } else {
            return response()->json([
                'success'   => false,
                'message'   => 'Login Fail',
                'data'      => ''
            ], 404);
        }
    }
}
