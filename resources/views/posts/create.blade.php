@extends('layouts.app')
@section('content')
    <h1 class="text-center">Add new Post</h1>
    @if($errors)
       <h1 class="badge-danger">{{$errors->first()}}</h1>
    @endif
    <form method="POST" action="{{route('post.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="inputAvatar" class="form-label">Avatar</label>
            <input type="file" class="form-control" id="inputAvatar" name="avatar">
        </div>
        <div class="mb-3">
            <label for="inputName" class="form-label">Name</label>
            <input type="text" class="form-control" id="inputName" name="name" value="{{old('name')}}" required>
        </div>
        <div class="mb-3">
            <label for="inputPrice" class="form-label">Price</label>
            <input type="number" class="form-control" id="inputPrice" name="price" value="{{old('price')}}" required>
        </div>
        <div class="mb-3">
            <label for="inputDesc" class="form-label">Description</label>
            <textarea class="form-control" id="inputDesc" name="desc" required>{{old('desc')}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary m-auto">Submit</button>
    </form>
@endsection
