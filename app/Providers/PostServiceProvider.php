<?php

namespace App\Providers;

use App\Http\Controllers\PostController;
use Illuminate\Support\ServiceProvider;
use PostRepository;
use App\Interfaces\PostRepositoryInterface;

class PostServiceProvider extends ServiceProvider
{

    public function register():void
    {
        $this->app->singleton(PostRepositoryInterface::class,PostRepository::class);

    }

    public function boot()
    {
        //
    }
}
