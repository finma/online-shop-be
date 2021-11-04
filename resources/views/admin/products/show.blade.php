@extends('admin.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Detail Product</h1>
  </div>

  <a 
    href="/products" 
    class="btn btn-primary mb-3"
  >
    <span data-feather="arrow-left"></span> Back to products
  </a>

  <div class="col-lg-8 pb-5">
      <img src="{{ asset('storage/' . $product->image) }}" alt="Preview" class="d-block img-fluid img-preview mb-3 col-md-5">
      <div class="mb-3">
        <label for="name" class="form-label">Product Name</label>
        <input readonly type="text" name="name" class="form-control bg-white" value="{{ $product->name }}" id="name">
      </div>
      <div class="mb-3">
        <label for="stock" class="form-label">Stock</label>
        <input readonly type="number" name="stock" class="form-control bg-white" value="{{ $product->stock }}" id="stock">
      </div>
      <div class="mb-3">
        <label for="price" class="form-label">Price</label>
        <input readonly type="text" name="price" class="form-control bg-white" value="{{ $product->price }}" id="price">
      </div>
      <div class="mb-3">
        <label for="category" class="form-label ">Category</label>
        <input readonly type="text" name="category" class="form-control bg-white" value="{{ $product->category->name }}" id="category">
      </div>
      <div class="mb-3">
        <label for="description" class="form-label ">Description</label>
        {!! $product->description !!}
      </div>
  </div>

@endsection
