<?php

use App\Events\FormSubmitted;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/pusher', function () {
    return view('pusher.index');
});

Route::get('/sender', function () {
    return view('pusher.sender');
});

Route::post('/sender', function () {
    $text = request()->text;

    event(new FormSubmitted($text));
    Session::flash('success', 'Udało się');
    return redirect('/sender');
});

Route::get('/posts','PostController@index')->name('post.index');
Route::get('/posts/{id}','PostController@show')->name("post.show");
Route::get('/post/create','PostController@create')->name("post.create");
Route::delete('/posts/{id}','PostController@destroy')->name("post.delete");
Route::post('/posts/create','PostController@store')->name("post.store");
Route::put('/posts/{id}/edit','PostController@edit')->name("post.edit");
