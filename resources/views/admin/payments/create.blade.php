@extends('admin.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Metode Pembayaran</h1>
  </div>

  <div class="col-lg-8 pb-5">
    <form action="/payments/create" method="POST">
      @csrf
      <div class="mb-3">
        <label for="name" class="form-label">Nama Akun</label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" id="name"required>
        @error('name')
          <div class="invalid-feedback">
            {{ $message }}  
          </div>   
        @enderror
      </div>
      <div class="mb-3">
        <label for="bank_name" class="form-label">Nama Bank</label>
        <input type="text" name="bank_name" class="form-control @error('bank_name') is-invalid @enderror" value="{{ old('bank_name') }}" id="bank_name"required>
        @error('bank_name')
          <div class="invalid-feedback">
            {{ $message }}  
          </div>   
        @enderror
      </div>
      <div class="mb-3">
        <label for="no_rekening" class="form-label">No Rekening</label>
        <input type="number" name="no_rekening" class="form-control @error('no_rekening') is-invalid @enderror" value="{{ old('no_rekening') }}" id="no_rekening"required>
        @error('no_rekening')
          <div class="invalid-feedback">
            {{ $message }}  
          </div>   
        @enderror
      </div>
        <input type="hidden" value="{{ old('slug')}}" name="slug" class="form-control @error('slug') is-invalid @enderror" id="slug" required>
      <div class="mb-3">
        <label for="type" class="form-label">Type</label>
        <input type="text" name="type" class="form-control @error('type') is-invalid @enderror" value="{{ old('type') }}" id="type"required>
        @error('type')
          <div class="invalid-feedback">
            {{ $message }}  
          </div>   
        @enderror
      </div>
      
      <a href="/payments" class="btn btn-outline-primary">
        <span data-feather="arrow-left"></span> Kembali
      </a>
      <button type="submit" class="btn btn-primary"><span data-feather="plus-square"></span> Tambah Pembayaran</button>
      
    </form> 
  </div>
    
  <script>
    const no_rekening = document.querySelector('#no_rekening');
    const slug = document.querySelector('#slug');
    

    no_rekening.addEventListener('change', function() {
      fetch('/payments/checkSlug?no_rekening=' + no_rekening.value)
        .then(res => res.json())
        .then(data => slug.value = data.slug)
    });
  </script>

@endsection
