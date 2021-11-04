@extends('admin.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Pembayaran</h1>
  </div>

  <a href="/payments/create" class="btn btn-primary"><span data-feather="plus-square"></span> Tambah Pembayaran</a>

  <div class="table-responsive mt-3 col-lg-8">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama</th>
          <th scope="col">Nama Bank</th>
          <th scope="col">Tipe Pembayaran</th>
          <th scope="col">No Rekening</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($payments as $payment)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $payment->name }}</td>
            <td>{{ $payment->bank_name }}</td>
            <td>{{ $payment->type }}</td>
            <td>{{ $payment->no_rekening }}</td>
            <td>
              <a href="/payments/{{ $payment->slug }}/edit" class="btn btn-warning text-decoration-none"><span data-feather="edit"></span> Edit</a>
              <form action="/payments/{{ $payment->slug }}" method="POST" class="d-inline" onclick="confirm('Are you sure?')">
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
