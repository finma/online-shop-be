@extends('admin.layouts.main')

@section('container')
<div class="container mt-3">
    <div class="row">
    <div class="col-md-3">
      <div class="card-counter primary">
        <span data-feather="users" class="icon"></span>
        <span class="count-numbers">{{ $customers }}</span>
        <span class="count-name">Customer</span>
      </div>
    </div>

    <div class="col-md-3">
      <a href="/products" >
        <div class="card-counter danger">
          <span data-feather="package" class="icon"></span>
          <span class="count-numbers">{{ $products }}</span>
          <span class="count-name">Produk</span>
        </div>
      </a>
    </div>

    <div class="col-md-3">
      <a href="/transactions">
        <div class="card-counter success">
          <span data-feather="shopping-bag" class="icon"></span>
          <span class="count-numbers">{{ $transactions }}</span>
          <span class="count-name">Transaksi</span>
        </div>
      </a>
    </div>

    <div class="col-md-3">
      <a href="/categories">
        <div class="card-counter info">
          <span data-feather="grid" class="icon"></span>
          <span class="count-numbers">{{ $categories }}</span>
          <span class="count-name">Kategori</span>
        </div>
      </a>
    </div>
  </div>
</div>

    
@endsection