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
    <table class="table table-warning rounded">
        <h1 class="fw-bold">History</h1>
        <thead>
            <th>NO</th>
            <th>Pemasok</th>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>jenis</th>
            <th>Tanggal Pembelian</th>
            
        </thead>
        <?php $no = 1; ?>
        @foreach ($Pembelian as $b)
        <tbody>
            <td>{{ $no++ }}</td>
            <td>{{ $b->pemasok }}</td>
            <td>{{ $b->nama_barang }}</td>
            <td>{{ $b->harga }}</td>
            <td>{{ $b->stok }}</td>
            <td>{{ $b->jenis }}</td>
            <td>{{ $b->tgl_pembelian }}</td>
        </tbody>
        @endforeach
    </table>
</div>
@endsection