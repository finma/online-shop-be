@extends('admin.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Categories</h1>
  </div>

  <a href="/categories/create" class="btn btn-primary"><span data-feather="plus-square"></span> Create New Category</a>

  <div class="table-responsive mt-3 col-lg-8">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Category</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($categories as $category)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $category->name }}</td>
            <td>
              <a href="/categories/{{ $category->slug }}/edit" class="btn btn-warning text-decoration-none"><span data-feather="edit"></span> Edit</a>
              <form action="/categories/{{ $category->slug }}" method="POST" class="d-inline" onclick="confirm('Are you sure?')">
                @method('delete')
                @csrf
                <button type="submit"class="btn btn-danger border-0 ">
                  <span data-feather="trash-2"></span> Delete
                </button>
              </form>
            </td>
          </tr>  
        @endforeach
      </tbody>
    </table>
  </div>
    
@endsection
