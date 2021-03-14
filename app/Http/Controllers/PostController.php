<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Post;
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
        $posts = Post::latest()->paginate(3);
        return view('posts.index', ['posts' => $posts]);
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
        $post = Post::findOrFail($id);
        return view('posts.show', ['post' => $post]);
    }

    public function edit($id, PostRequest $request)
    {
        $this->postRepository->edit($id, $request);

        return redirect('/posts');
    }


    public function destroy(int $id): RedirectResponse
    {
        $this->postRepository->destroy($id);
        return redirect('/posts')->with(['ok' => "Udało sie usunąć kurwa"]);
    }
}
