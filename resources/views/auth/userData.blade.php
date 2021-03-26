@extends('layouts.app')
@section('content')
    <h1 class="text-center">Add new Post</h1>
    @if($errors)
        <h1 class="badge-danger">{{$errors->first()}}</h1>
    @endif
    <form method="POST" action="{{route('user.edit')}}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="inputAvatar" class="form-label">Avatar</label>
            <input type="file" class="form-control" id="inputAvatar" name="avatar">
        </div>
        <div class="mb-3">
            <label for="inputDesc" class="form-label">Description</label>
            <textarea class="form-control" id="inputDesc" name="desc" required>{{$user->description}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary m-auto">Submit</button>
    </form>
@endsection
