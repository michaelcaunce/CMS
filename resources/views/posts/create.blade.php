@extends('layouts.app')

@section('content')

<div class="card card-default">
  <div class="card-header">
    <h2>Create Post</h2>
  </div>
  <div class="card-body">
    @if($errors->any())
      <div class="alert alert-danger">
        <ul class="list-group">
          @foreach($errors->all() as $error)
            <li class="list-group-item text-danger">
              {{ $error }}
            </li>
          @endforeach
        </ul>
      </div>
    @endif
    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
      @csrf

      <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" class="form-control" id="title">
      </div>

      <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" rows="5" cols="5" class="form-control" id="description"></textarea>
      </div>

      <div class="form-group">
        <label for="content">Content</label>
        <textarea name="content" rows="5" cols="5" class="form-control" id="content"></textarea>
      </div>

      <div class="form-group">
        <label for="image">Upload Image</label>
        <input type="file" name="image" class="form-control" id="image">
      </div>
      
      <div class="form-group">
        <!-- Use isset to check to see if the variable has an ID. If yes, display the button Update Category,
          else, display Add Category button -->
        <button type="submit" class="btn btn-success">Create Post</button>
      </div>
    </form>
  </div>
</div>
@endsection
