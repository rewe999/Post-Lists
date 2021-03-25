@extends('layouts.app')
@section('content')
    <div class="row">
        <button class="btn btn-success m-auto">
            <a href="{{route('post.create')}}">Add Post</a>
        </button></div>
    <table class="table m-1">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Avatar</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Description</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>
                <th scope="row">{{$post->user->id}}</th>
                <td><img src="{{Request::getSchemeAndHttpHost()}}/storage/{{ $post->avatar  }}" class="imgAvatar" alt="img"></td>
                <td>{{$post->name}}</td>
                <td>{{$post->price}}</td>
                <td>{{$post->desc}}</td>
                @if($post->user->id == $user->id)
                    <td>
                        <div class="form-check form-check-inline pl-2">
                            <form action="/posts/{{$post->id}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">X</button>
                            </form>
                            <button class="btn btn-info"><a href="{{route('post.show',$post->id)}}">Edit</a> </button>
                        </div>
                    </td>
                @endif
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="row">
        <div class="m-auto">{{ $posts->links() }}</div>
    </div>

@endsection


