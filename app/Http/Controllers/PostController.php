<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Repositories\PostRepository;
use Symfony\Component\HttpFoundation\RedirectResponse;

class PostController extends Controller
{
    private PostRepository $postRepository;

    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }


    public function index(): view
    {
        $user = Auth::user();
        $posts = Post::latest()->with('user')->paginate(3);
        return view('posts.index', ['posts' => $posts,'user' => $user]);
    }

    public function create(): view
    {
        return view('posts.create');
    }


    public function store(PostRequest $request)
    {
        $this->postRepository->store($request);

        return redirect('posts');
    }

    public function show($id)
    {
        $user = Auth::user();
        $post = Post::findOrFail($id);
        if(!($post->user->id == $user->id)) return redirect('posts');
        return view('posts.show', ['post' => $post,'user'=>$user]);
    }

    public function edit($id, PostRequest $request)
    {
        $this->postRepository->edit($id, $request);

        return redirect('/posts');
    }


    public function destroy(int $id): RedirectResponse
    {
        $this->postRepository->destroy($id);
        return redirect('/posts')->with(['ok' => "Udało sie usunąć"]);
    }



}
