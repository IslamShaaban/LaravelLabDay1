@extends('layouts.app')

@section('title')Index Page @endsection

@section('content')

<a href="{{route('posts.create')}}" class="btn btn-success" style="margin-bottom: 20px;">Create Post</a>

<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Slug</th>
        <th scope="col">Posted By</th>
        <th scope="col">Created At</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>
    <tbody>
    @foreach($posts as $post)
      <tr>
        <th scope="row">{{ $post->id }}</th>
        <td>{{ $post->title }}</td>
        <td>{{$post->slug}}</td>
        <td>{{ $post->user ? $post->user->name : 'user not found' }}</td>
        <td>{{ \Carbon\Carbon::parse($post->created_at, 'd/m/Y')->isoFormat('ddd Do \of MMMM YYYY')}}</td>
        <td>
          <a href="{{ route('posts.show',['post' => $post->id]) }}" data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-info" style="margin-bottom: 20px;">View</a>
              <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Post Info</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <p>Title: {{$post->title}}</p>
                      <p>Description: {{$post->description}}</p>
                    </div>
                     <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">User Info</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                       <p>User ID: {{$post->posted_by}}</p>
                      <p>User Name: {{$post->user->name}}</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>

          <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal2" data-whatever="@getbootstrap" style="margin-bottom: 20px;">Edit</button>
          <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Edit Post</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                 <form method="POST" action="{{route('posts.update',['post' => $post->id])}}">
                  @csrf
                  @method("PUT")
                  <div class="modal-body">
                    <div class="form-group">
                      <label for="recipient-name" class="col-form-label">Title:</label>
                      <input type="text" class="form-control" name="title" value ={{$post->title}} id="recipient-name">
                    </div>
                    <div class="form-group">
                      <label for="message-text" class="col-form-label">Description:</label>
                      <textarea class="form-control" name="description" id="message-text">{{$post->description}}</textarea>
                    </div>
                    <div class="form-group">
                      <label for="message-text" class="col-form-label">User Name:</label>
                      <select name="posted_by" class="form-control" id="post_creator">
                        @foreach (App\Models\User::all() as $user)
                          <option value="{{$user->id}}">{{$user->name}}</option>
                        @endforeach
                      </select>
                    </div>
                  
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  
                  <button type="submit" class="btn btn-success">Save Changes</button>
                </div>
              </div>
              </form>
            </div>
          </div>
          
          <a href="{{ route('posts.show',['post' => $post->id]) }}" data-toggle="modal" data-target="#exampleModalCenter1" class="btn btn-danger" style="margin-bottom: 20px;">Delete</a>
          <div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle">Delete Post</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Do you Want to Delete This Post?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <form method="POST" action = "{{route('posts.delete',['post' => $post->id])}}">
                    @csrf
                    @method("DELETE")
                    <button type="submit" class="btn btn-danger">Delete</a>
                  </form>
                </div>
                </div>
              </div>
            </div>
          </div>
        </td>
      </tr>
    @endforeach
    </tbody>
</table>
{{$posts->links("pagination::bootstrap-4")}}
@endsection