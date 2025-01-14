<?php

use Illuminate\Support\Facades\Route;
use App\Models\Staff;
use App\Models\Photo;

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
    $staff = Staff::findOrFail(1);
    $staff->photos()->create(['name'=>'another.jpg']);
});

Route::get('/read', function(){
    $staff = Staff::findOrFail(1);

    foreach($staff->photos as $photo) {
        echo $photo->name . '<br>';
    }
});

Route::get('/update', function() {
    $staff = Staff::findOrFail(1);

    $photo = $staff->photos()->whereId(1)->first();
    $photo->name = "Update example.jpg";
    $photo->save();
});

Route::get('/delete', function() {
    $staff = Staff::findOrFail(1);

    // $staff->photos()->whereName('example.jpg')->delete();
    $staff->photos()->whereId(1)->delete();
});

Route::get('/assign', function() {
    $staff = Staff::findOrFail(1);

    $photo = Photo::findOrFail(3);

    $staff->photos()->save($photo); // you can assign image to user
});

Route::get('/unassign', function() {
    $staff = Staff::findOrFail(1);

    $staff->photos()->whereId(3)->update(['imageable_id'=> 0, 'imageable_type' => '']); // you can unassign image from user
});