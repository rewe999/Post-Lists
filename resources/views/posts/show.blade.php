@extends('app')
@section('content')
    <h1 class="text-center">Add new Post</h1>
    <form method="POST" action="{{route('post.edit',$post->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @if($post->avatar)
            <img src="{{Request::getSchemeAndHttpHost()}}/storage/{{ $post->avatar  }}" class="EditAvatar mx-auto d-block" alt="img">
        @endif
        <div class="mb-3">
            <label for="inputAvatar" class="form-label">Avatar</label>
            <input type="file" class="form-control" id="inputAvatar" name="avatar" value="{{$post->avatar}}">
        </div>
        <div class="mb-3">
            <label for="inputName" class="form-label">Name</label>
            <input type="text" class="form-control" id="inputName" name="name" required value="{{$post->name}}">
        </div>
        <div class="mb-3">
            <label for="inputPrice" class="form-label">Price</label>
            <input type="number" class="form-control" id="inputPrice" name="price" required value="{{$post->price}}">
        </div>
        <div class="mb-3">
            <label for="inputDesc" class="form-label">Description</label>
            <textarea class="form-control" id="inputDesc" name="desc" required>{{$post->desc}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary m-auto">Edit</button>
    </form>

@endsection
