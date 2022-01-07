<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LuluController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // only, except atau langsung tulis nama middleware untuk di implementasikan di semua method
        $this->middleware('admin', ['only' =>[
            'about'
        ]]);
        
    }

    public function getKey ()
    {
        return \Illuminate\Support\Str::random(32);
    }

    public function mbasssProfile ()
    {
        return "Mbasss profile with naming";
    }
    
    public function profile ()
    {
        return "profile with middleware";
    }

    // middleware nya pada function construct
    public function about ()
    {   
        return "About with middleware in controller";
    }

    // Using despedency Injection
    public function getData (Request $request)
    {
        if ($request->is('foo/bar')){
            return 'Success';
        } else {
            return 'Fail';
        }
    }

    // REQUEST
    // Get Input using Request
    public function userProfile (Request $request)
    {
        // show singe data
        // return $request->name;

        // Show all as array data
        // $user = [
        //     'id' => $request->id,
        //     'name' => $request->name,
        //     'username' => $request->username,
        //     'email' => $request->email,
        //     'password' => $request->password
        // ];
        // return $user;

        // show aLL using simple way
        // return $request->all();

        // show if no data send using default value 
        // return $request->input('name', 'Default Name');

        // condition 
        // has, filled, except
        if($request->has(['name', 'username'])){
            return "Correct Data";
        } else {
            return "Wrong Data";
        }
    }
}
