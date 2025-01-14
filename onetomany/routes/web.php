<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Post;

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

Route::get('/create', function() {
    $user = User::findOrFail(1);
    $post = new Post([
        'title'=> 'My first post2',
        'body'=> 'I love Laravel,too aaa'
    ]);

    $user->posts()->save($post);
});

Route::get('/read', function(){
    $user = User::findOrFail(1);
    
    // return $user->posts; // returns collection
    foreach ($user->posts as $post) {
        echo $post->title . '<br>';
    }
});

Route::get('/update', function(){
    $user = User::findOrFail(1);

    $user->posts()->whereId(1)->update(['title' => 'updated title laravel', 'body' => 'updated body laravel hehe']);
});

Route::get('/delete', function(){
    $user = User::findOrFail(1);

    $user->posts()->where('id', 1)->delete();
});