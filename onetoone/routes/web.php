<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Address;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/insert', function() {
        
    $user = User::findOrFail(1);

    $address = new Address(['name'=>'1209 Houstonaaa av NYAA NY 12345']);

    $user->address()->save($address);
});

Route::get('/update', function() {
    
    // $address = Address::where('user_id', '=', 1);
    // $address = Address::where('user_id', 1);

    // $address = Address::whereUserId(1)->get(); // returns a collection

    $address = Address::whereUserId(1)->first();
    
    $address->name = "4353 Updated Av Alaska";

    $address->save();
});

Route::get('/read', function() {
    $user = User::findOrFail(1);
    echo $user->address->name;

});

Route::get('/delete', function() {
    $user = User::findOrFail(1);

    $user->address()->delete();
});