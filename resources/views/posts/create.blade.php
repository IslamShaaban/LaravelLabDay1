@extends('layouts.app')

@section('title')Create Page @endsection

@section('content')
<form method="POST" action="{{route('posts.store')}}">
    @csrf
    <div class="form-group">
      <label for="title">Title</label>
      <input type="text" name = "title" class="form-control" id="title" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
      <label for="description">Description</label>
      <textarea class="form-control" name = "description" id="description"> </textarea>
    </div>
    <div class="form-group">
      <label  for="post_creator">Post Creator</label>
      <select name="posted_by" class="form-control" id="post_creator">
        @foreach ($users as $user)
          <option value="{{$user->id}}">{{$user->name}}</option>
        @endforeach
      </select>
    </div>
    <button type="submit" class="btn btn-success">Create Post</button>
  </form>

@endsection