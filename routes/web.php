<?php

use App\Mail\UserEmail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('posts');
});

Route::middleware(['auth'])->group(function (){
    Route::get('/posts','PostController@index')->name('post.index');
    Route::get('/posts/{id}','PostController@show')->name("post.show");
    Route::get('/post/create','PostController@create')->name("post.create");
    Route::delete('/posts/{id}','PostController@destroy')->name("post.delete");
    Route::post('/posts/create','PostController@store')->name("post.store");
    Route::put('/posts/{id}/edit','PostController@edit')->name("post.edit");
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/send-mail', function (){
    $mail = [
      'title' => 'Mail title',
      'body' => 'content of mail',
    ];
    Mail::to(env('MAIL_FROM_ADDRESS'))->send(new UserEmail($mail));
    echo 'Send Mail';
});
