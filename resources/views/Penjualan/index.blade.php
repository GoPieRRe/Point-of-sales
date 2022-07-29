@extends('layouts.main')

@section('content')

  @if ($message = Session::get('success'))
  <div class="alert alert-success">
      <p>{{ $message }}</p>
  </div>
@endif
@if ($msg = Session::get('Gagal'))
<div class="alert alert-danger">
    <p>{{ $msg }}</p>
</div>
@endif
<button class="btn btn-danger rounded m-2 float-right">Hapus History</button>
    <table class="table table-dark table-striped opacity-25">
        <h1 class="fw-bold">History</h1>
        <thead>
            <th>NO</th>
            <th>Nama Pembeli</th>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>jenis</th>
            <th>Tanggal Penjualan</th>
            <th>Total Harga</th>
            {{-- <th colspan="2">Opsi</th> --}}
        </thead>
        <?php $no = 1; ?>
        @foreach ($Penjualan as $b)
        <tbody>
            <td>{{ $no++ }}</td>
            <td>{{ $b->nama_pembeli }}</td>
            <td>{{ $b->nama_barang }}</td>
            <td>{{ $b->harga }}</td>
            <td>{{ $b->stok }}</td>
            <td>{{ $b->jenis }}</td>
            <td>{{ $b->tgl_penjualan }}</td>
            <td>{{ $b->harga * $b->stok }}</td>
        </tbody>
        @endforeach
    </table>
</div>
@endsection