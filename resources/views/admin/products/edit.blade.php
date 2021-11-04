@extends('admin.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Update Product</h1>
  </div>

  <div class="col-lg-8 pb-5">
    <form action="/products/{{ $product->slug }}" method="POST" enctype="multipart/form-data">
      @method('put')
      @csrf
      <div class="mb-3">
        <label for="name" class="form-label">Product Name</label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $product->name) }}" id="name">
        @error('name')
          <div class="invalid-feedback">
            {{ $message }}  
          </div>   
        @enderror
      </div>
      <div class="mb-3">
        <label for="stock" class="form-label">Stock</label>
        <input type="number" name="stock" class="form-control @error('stock') is-invalid @enderror" value="{{ old('stock', $product->stock) }}" id="stock">
        @error('stock')
          <div class="invalid-feedback">
            {{ $message }}  
          </div>   
        @enderror
      </div>
      <div class="mb-3">
        <label for="price" class="form-label">Price</label>
        <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $product->price) }}" id="price">
        @error('price')
          <div class="invalid-feedback">
            {{ $message }}  
          </div>   
        @enderror
      </div>
      
        <input type="hidden" value="{{ old('slug', $product->slug)}}" name="slug" class="form-control @error('slug') is-invalid @enderror" id="slug" >

      <div class="mb-3">
        <label for="category" class="form-label ">Category</label>
        <select class="form-select" id="category" name="category_id">
          @foreach ($categories as $category)
            @if (old('category_id', $product->category_id) == $category->id)
              <option value="{{ $category->id }}" selected>{{ $category->name }}</option>  
            @else
              <option value="{{ $category->id }}" >{{ $category->name }}</option>  
            @endif
          @endforeach
        </select>
      </div>
      <div class="mb-3">
        <label for="image" class="form-label">Product Image</label>
        <input type="hidden" name="oldImage" value="{{ $product->image }}">
        @if ($product->image)
          <img src="{{ asset('storage/' . $product->image) }}" class="d-block img-fluid img-preview mb-3 col-md-5">
        @else
          <img class="d-block img-fluid img-preview mb-3 col-md-5">
        @endif
        <input class="form-control @error('image') is-invalid @enderror" name="image" type="file" id="image" onchange="readFile()">
        @error('image')
          <div class="invalid-feedback">
            {{ $message }}  
          </div>   
        @enderror
      </div>
      <div class="mb-3">
        <label for="description" class="form-label ">Description</label>
        @error('description')
          <p class="text-danger">
            {{ $message }}
          </p>
        @enderror
            
        <input id="description" type="hidden" name="description" value="{{ old('description', $product->description) }}" required>
        <trix-editor input="description"></trix-editor>
      </div>
      <a 
        href="/products" 
        class="btn btn-outline-primary"
      >
        <span data-feather="arrow-left"></span> Back to products
      </a>
      <button type="submit" class="btn btn-primary"><span data-feather="plus-square"></span> Update Product</button>
      
    </form> 
  </div>
    
  <script>
    const name = document.querySelector('#name');
    const slug = document.querySelector('#slug');
    

    name.addEventListener('change', function() {
      fetch('/products/checkSlug?name=' + name.value)
        .then(res => res.json())
        .then(data => slug.value = data.slug)
    });

    document.addEventListener('trix-file-accept', function(e) {
      e.preventDefault();
    });

    function readFile() {
      const image = document.querySelector('#image');
      const preview = document.querySelector('.img-preview');

      const reader = new FileReader();

      reader.readAsDataURL(image.files[0]);

      reader.onload = function(e) {
        preview.src = e.target.result;
      }
    }
  </script>

@endsection
