@extends('admin.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Products</h1>
  </div>

  <a href="/products/create" class="btn btn-primary"><span data-feather="plus-square"></span> Create New Product</a>

  <div class="table-responsive mt-3">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Product Name</th>
          <th scope="col">Category</th>
          <th scope="col">Stock</th>
          <th scope="col">Price</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($products as $product)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->category->name }}</td>
            <td>{{ $product->stock }}</td>
            <td>{{ $product->price }}</td>
            <td>
              <a href="/products/{{ $product->slug }}" class="btn btn-info text-decoration-none"><span data-feather="eye"></span> Detail</a>
              <a href="/products/{{ $product->slug }}/edit" class="btn btn-warning text-decoration-none"><span data-feather="edit"></span> Edit</a>
              <form action="/products/{{ $product->slug }}" method="POST" class="d-inline" onclick="confirm('Are you sure?')">
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
