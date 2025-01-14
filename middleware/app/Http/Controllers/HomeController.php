<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{   
    public function __construct(){
        $this->middleware(middleware: 'auth');
    }

    public function index(Request $request)
    {

        // $request->session()->put('Teo', 'Augaa');
        // //or without the $request using globa
        // session(['Teo'=> 'Augaa']);

        
        
        // session(['Teo2'=> 'Augaaaa']);
        
        // return session('Teo2');

        // $request->session()->forget('Teo2');
        // $request->session()->flush();


        // $request->session()->flash('message','This is a message');



        // return $request->session()->all();
        return $request->session()->get('message');

    }
}
