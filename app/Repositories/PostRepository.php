<?php

namespace App\Repositories;

use App\Events\PostCreated;
use App\Http\Requests\PostRequest;
use App\Post;
use App\Interfaces\PostRepositoryInterface;

class PostRepository implements PostRepositoryInterface
{
    public function destroy(int $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
    }

    public function edit($id, PostRequest $request)
    {
        $post = Post::findOrFail($id);

        if($request->hasFile("avatar")){
            $post->avatar = $request['avatar']->store('avatars','public');
        }
        $post->name = $request->input('name');
        $post->price = $request->input('price');
        $post->desc = $request->input('desc');
        $post->save();
    }

    public function store(PostRequest $request)
    {
        $post = new Post();
        if ($request->hasFile('avatar')){
            $path = $request['avatar']->store('avatars','public');
            $post->avatar = $path;
        }
        $post->name = $request->input('name');
        $post->price = $request->input('price');
        $post->desc = $request->input('desc');
        $post->save();

        PostCreated::dispatch($post);
    }

}

