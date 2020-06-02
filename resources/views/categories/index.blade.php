@extends('layouts.app')

@section('content')

<!-- Only Display the categories if there are categories created -->

<div class="d-flex justify-content-end mb-2">
  <a href="{{ route('categories.create') }}" class="btn btn-success ">Add Category</a>
</div>
  <div class="card card-default">
    <div class="card-header">
      <h2>Categories</h2>
      </div>
      <div class="card-body">
        <table class="table">
          <thead>
            <th>Name</th>
            <th></th>
          </thead>
          <tbody>
            @foreach($categories as $category)
              <tr>
                <td>{{ $category->name }}</td>
                <td>
                  <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-info btn-sm">Edit</a>
                  <!-- Delete button takes an onclick handler which is a JS function with the arguement of the categories ID -->
                  <button class="btn btn-danger btn-sm" onclick="handleDelete({{ $category->id }})">Delete</button>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>

        <!-- Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <form method="POST" action="" id="deleteCategoryForm">
              @csrf
              <!-- Method directive to make sure it's a DELETE request -->
              @method('DELETE')
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="deleteModalLabel">Delete Category</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p class="text-center text-bold">
                    Are you sure you want to delete this category?
                  </p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Go Back</button>
                  <!-- When the button is clicked, a DELETE request is sent to the server and picked up in the CategoriesController@destroy-->
                  <button type="submit" class="btn btn-danger">Yes, Delete</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
  </div>


@endsection

@section('scripts')
<!-- Define the function called in the onclick handler on the delete button -->
<script>
  // Function takes the ID
  function handleDelete(id) {
    // Find the form with the ID
    var form = document.getElementById('deleteCategoryForm')
    // Update the forms action
    form.action = '/categories/' + id
    // Find the modal using the id and show it.
    $('#deleteModal').modal('show')
  }
</script>
@endsection
