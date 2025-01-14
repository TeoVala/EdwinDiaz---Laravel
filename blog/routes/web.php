<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\User;
use App\Models\Country;
use App\Models\Photo;
use App\Models\Tag;
use Carbon\Carbon;


Route::get('/', function () {
    return view('welcome');
});


// Route::resource('/posts','App\Http\Controllers\PostController');

// Route::get('/contact', 'App\Http\Controllers\PostController@contact');


// Route::get('post/{id}/{name}','App\Http\Controllers\PostController@show_post');

// Route::get('/insert', function () {
//     DB::insert('INSERT INTO posts(title,content) values(?, ?)', ['Laravel is awesome with edwin', 'Laravel is the best thing that has happened to PHP']);
// });

// Route::get('/read', function() {
//     $results = DB::select('SELECT * FROM posts where id=?', [1]);

//     foreach( $results as $post ) {
//         return $post->title;
//     }
// });

// Route::get('/update', function () {

//     $updated = DB::update('UPDATE posts SET title="Update title" where id = ?', [1]);

//     return $updated;
// });

// Route::get('/delete', function() {
//     $deleted = DB::delete('DELETE FROM posts WHERE id=?', [1]);

//     return $deleted;
// });


// Route::get('/all', function() {

//     $posts = Post::all();

//     foreach($posts as $post) {
//         return $post->title;
//     }

// });

// Route::get('/find', function() {

//     $post = Post::find(2);

//     return $post->title;
// });

// Route::get('/findwhere', function(){
//     $post = Post::where('id', 3)->orderBy('id', 'desc') ->take(1)->get();

//     return $post;
// });


// Route::get('/findmore', function(){
// $post = Post::findOrFail(2);

// return $post;

// $posts = Post::where('users_count', '<', 50)->firstOrFail();
// });

// Route::get('/basicinsert', function(){
//     $post = new Post;

//     $post->title = 'New Eloquent title';
//     $post->content = 'Eloquent is really cool, look at this content';
//     $post->save();
// });

// Route::get('/basicupdate', function(){
//     $post = Post::find(4);

//     $post->title = 'New Eloquent title2';
//     $post->content = 'Eloquent is really cool, look at this content2';
//     $post->save();
// });

// Route::get('/create',function(){
//     Post::create([
//         'title'=>'the create method3',
//         'content'=>"Wow I'm learning a lot with Edwin Diaz213"
//     ]);
// });

// Route::get('/update', function() {
//     Post::where('id', 2)->where('is_admin', 0)->update(['title' => 'New PHP Title', 'content' => 'I love my instructor']);
// });

// Route::get('/delete', function() {
//     $post = Post::find(4);
//     $post->delete();
// });

// Route::get('/delete2', function() {
//     Post::destroy([4,5]);

//     Post::where('is_admin', 0)->delete();
// });

// Route::get('/softdelete', function() {
//     Post::find(9)->delete();
// });

// Route::get('/readsoftdelete', function() {

//     $post = Post::withTrashed()->where('id', 3)->get();
//     return $post;

//     $post = Post::onlyTrashed()->where('id', 3)->get();
//     return $post;
// });

// Route::get('/restore', function() {
//     Post::withTrashed()->where('is_admin', 0)->restore();

// });

// Route::get('/forcedelete', function(){
//     Post::onlyTrashed()->where('is_admin', 0)->forceDelete();
// });

// Route::get('/user/{id}/post', function($id){
//     return User::find($id)->post;
// });

// Route::get('/user/{id}/posts', function($id){
//     return User::find($id)->posts;
// });

// Route::get('/post/{id}/user', function($id) {
//     return Post::find($id)->user->name;
// });

// Route::get('/posts', function() {
//     $user = User::find(1);

//     foreach($user->posts as $post) {
//        echo $post->title. "<br>";
//     }
// });

// Route::get('/user/{id}/role', function($id) {
// $user = User::find(1)->roles->firstOrFail();
// return $user->name;

// foreach($user->roles as $role) {
//     echo $role->name. "<br>";
// }    
// });

//Access the pivot table
// Route::get('user/pivot', function () {

//     $user = User::find(2);

//     foreach($user->roles as $role) {
//         echo $role->pivot->created_at;
//     }


// });

// Route::get('/user/country', function(){
//     $country = Country::find(3);

//     foreach($country->posts as $post) {
//         return $post->title;
//     }
// });


// Route::get('user/photos', function () {
//     $user = User::find(9);

//     foreach ($user->photos as $photo) {
//         return $photo;
//     }
// });

// Route::get('post/photos', function () {
//     $post = Post::find(1);

//     foreach ($post->photos as $photo) {
//         echo $photo . '<br>';
//     }
// });

// Route::get('photo/{id}', function($id){
//     $photo = Photo::findOrFail($id);

//     return $photo->imageable;
// });

// Route::get('/post/tag', function() {
//     $post = Post::find(1);

//     foreach ($post->tags as $tag) {
//         echo $tag->name . '<br>';
//     }
// });

// Route::get('/tag/{id}', function($id) {
//     $tag = Tag::find($id);
    
//     foreach ($tag->posts as $post) {
//         echo $post->title . '<br>';
//     }
// });


// CRUD APPLICATION



Route::group(['middleware'=>'web'], function() {
    Route::resource('/posts', 'App\Http\Controllers\PostController');


    Route::get('/dates', function() {
        $date = new DateTime('+1 week');

        echo $date -> format('d-m-Y');

        echo '<br>';

        echo Carbon::now()->addCenturies(2)->diffForHumans();


        echo '<br>';

        echo Carbon::now()->subMonths(5)->diffForHumans();

        echo '<br>';

        echo Carbon::now()->yesterday();

        echo '<br>';
    });

    Route::get('/getname', function(){
        $user = User::find(1);

        echo $user->name;
    });

    Route::get('/setname', function(){
        $user = User::find(1);

        $user->name = "Teddy";

        $user->save();
    });
});