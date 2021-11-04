@extends('admin.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create New Category</h1>
  </div>

  <div class="col-lg-8 pb-5">
    <form action="/categories/create" method="POST">
      @csrf
      <div class="mb-3">
        <label for="name" class="form-label">Category Name</label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" id="name"required>
        @error('name')
          <div class="invalid-feedback">
            {{ $message }}  
          </div>   
        @enderror
      </div>
      <div class="mb-3">
        <label for="slug" class="form-label">Slug</label>
        <input type="text" value="{{ old('slug')}}" name="slug" class="form-control @error('slug') is-invalid @enderror" id="slug" required>
        @error('name')
          <div class="invalid-feedback">
            {{ $message }}  
          </div>   
        @enderror
      </div>
      
      <a href="/categories" class="btn btn-outline-primary">
        <span data-feather="arrow-left"></span> Back to categories
      </a>
      <button type="submit" class="btn btn-primary"><span data-feather="plus-square"></span> Create New Category</button>
      
    </form> 
  </div>
    
  <script>
    const name = document.querySelector('#name');
    const slug = document.querySelector('#slug');
    

    name.addEventListener('change', function() {
      fetch('/categories/checkSlug?name=' + name.value)
        .then(res => res.json())
        .then(data => slug.value = data.slug)
    });
  </script>

@endsection
