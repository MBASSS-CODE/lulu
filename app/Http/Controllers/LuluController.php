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
}
