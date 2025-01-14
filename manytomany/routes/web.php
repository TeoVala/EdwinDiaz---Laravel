<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Role;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create', function (){
    $user = User::findOrFail(1);

    $role = new Role(['name'=>'Author']); //Create role 

    $user->roles()->save($role); // Assign user to role
});

Route::get('/read', function() {
    $user = User::findOrFail(1);

    foreach($user->roles as $role) {
        echo $role->name;
    }
});

Route::get('/update', function(){

    $user = User::findOrFail(1);

    if ($user->has('roles')) {
        foreach($user->roles as $role) {
            if ($role->name == 'Administrator') {
                $role->name = 'subscriber';
                $role->save();
            }
        }
    }
});

Route::get('/delete', function() {
    $user = User::findOrFail(1);

    
    // $user->roles()->delete(); // deletes all roles from the roles table that are attached to the user
    
    foreach($user->roles as $role) {
        // dd($role);

        $role -> where('id', 1)->delete();
    }
    
});

Route::get('/attach', function() {
    $user = User::findOrFail(1);

    $user->roles()->attach(2); // Attach the user role
});

Route::get('/detach', function() {
    $user = User::findOrFail(1);

    // $user->roles()->detach(); // removes all roles from the user
    // $user->roles()->detach(2); // Attach the user role
});

Route::get('/sync', function() {
    $user = User::findOrFail(1);

    $user->roles()->sync([3,5]); // it'll pass all the roles in the array and remove any existing roles in the role_user table
});