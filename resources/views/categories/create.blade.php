@extends('layouts.app')

@section('content')

<div class="card card-default">
  <div class="card-header">
    <!-- Use isset to check to see if the variable has an ID.
      If yes, display the H2 Edit Category, else, display Create Category -->
    <h2>{{ isset($category) ? 'Edit Category' : 'Create Category' }}</h2>
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
    <!-- Use isset to check to see if the variable has an ID. If yes, return the route for categories.update,
      else, return the route for categories.store (Update vs Create)-->
    <form action="{{ isset($category) ? route('categories.update', $category->id) : route('categories.store') }}" method="POST">
      @csrf
      <!-- Use isset to check to see if the variable has an ID.
        If yes, declare the forms method to be PUT -->
      @if(isset($category))
        @method('PUT')
      @endif
      <div class="form-group">
        <label for="name">Name</label>
        <!-- Use isset to check to see if the variable has an ID. If yes, display the value of the category,
          else, display empty input fields -->
        <input type="text" id="name" name="name" value="{{ isset($category) ? $category-> name : '' }}" class="form-control">
      </div>
      <div class="form-group">
        <!-- Use isset to check to see if the variable has an ID. If yes, display the button Update Category,
          else, display Add Category button -->
        <button class="btn btn-success">{{ isset($category) ? 'Update Category' : 'Add Category' }}</button>
      </div>
    </form>

  </div>

</div>

@endsection
