@extends('admin.layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Transaksi</h1>
  </div>

  <div class="table-responsive mt-3 col-lg-12">
    <table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama Produk</th>
          <th scope="col">Kategori</th>
          <th scope="col">Total Item</th>
          <th scope="col">Total Harga</th>
          <th scope="col">Customer</th>
          <th scope="col">Status</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($transactions as $transaction)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $transaction->product->name }}</td>
            <td>{{ $transaction->product->category->name }}</ td>
            <td>{{ $transaction->total_item }}</td>
            <td>{{ $transaction->total_price }}</td>
            <td>{{ $transaction->customer->name }}</td>
            <td>
              @if ($transaction->status === 'pending')
                  <div class="badge bg-warning">Pending</div>
              @elseif ($transaction->status === 'success')
                  <div class="badge bg-success">Success</div>
              @else 
                  <div class="badge bg-danger">Failed</div>
              @endif
            </td>
            <td>
              <form action="/transactions/{{ $transaction->id }}/reject" method="POST" class="d-inline" onclick="confirm('Reject?')">
                @csrf
                <button type="submit"class="btn btn-danger border-0 " 
                @if ($transaction->status !== 'pending')
                  disabled
                @endif >
                  <span data-feather="x"></span> Reject
                </button>
              </form>
              <form action="/transactions/{{ $transaction->id }}/accept" method="POST" class="d-inline" onclick="confirm('Accept?')">
                @csrf
                <button type="submit"class="btn btn-success border-0 " 
                @if ($transaction->status !== 'pending')
                  disabled
                @endif >
                  <span data-feather="check"></span> Accept
                </button>
              </form>
            </td>
          </tr>  
        @endforeach
      </tbody>
    </table>
  </div>
    
@endsection
