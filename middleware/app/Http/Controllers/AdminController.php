<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct() {
        $this->middleware('IsAdmin');    
    }

    public static function index() {
        // return view('admin.index');
        return "you are an administrator";
    }
}
