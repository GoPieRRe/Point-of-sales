@extends('layouts.main')

@section('content')
    <div class="m-2">
        <form action="{{ route('Barang.update', $Barang->id) }}" method="post">
            @csrf
            @method('PUT')

            <div class="form-input card-body">
                <label for="edit" class="form-label">Nama Barang</label>
                <input type="text" placeholder="Nama Barang" class="form-control" required name="nama_barang" value="{{ $Barang->nama_barang }}">
                <label for="edit" class="form-label">Stok</label>
                <input type="number" disabled min=0 placeholder="Stok Barang" class="form-control" required name="stok" value="{{ $Barang->stok }}">
                <label for="edit" class="form-label">Harga Jual</label>
                <input type="text" placeholder="Harga Barang" class="form-control" required name="harga_jual" value="{{$Barang->harga_jual }}">
                <label for="edit" class="form-label">Jenis</label>
                <input type="text" placeholder="Jenis Barang" class="form-control" required name="jenis" value="{{ $Barang->jenis }}">
            </div>
            <div class="form-input text-center">
                <a href="{{ route('Barang.index') }}" class="btn btn-danger">Back !</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
@endsection