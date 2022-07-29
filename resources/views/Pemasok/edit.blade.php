@extends('layouts.main')

@section('content')
    <div class="m-2">
        <form action="{{ route('Pemasok.update', $Pemasok->id) }}" method="post">
            @csrf
            @method('PUT')

            <div class="form-input card-body">
                <label for="edit" class="form-label">Nama Pemasok</label>
                <input type="text" placeholder="Nama Barang" class="form-control" required name="nama_pemasok" value="{{ $Pemasok->nama_pemasok }}">
                <label for="edit" class="form-label">No HP</label>
                <input type="number" min=0 placeholder="Stok Barang" class="form-control" required name="no_hp" value="{{ $Pemasok->no_hp }}">
                <label for="edit" class="form-label">Email</label>
                <input type="text" placeholder="Harga Barang" class="form-control" required name="harga_jual" value="{{$Pemasok->email }}">
                <label for="edit" class="form-label">Alamat</label>
                <textarea name="alamat" id="" cols="30" rows="10" class="form-control">{{ $Pemasok->alamat }}</textarea>
            </div>
            <div class="form-input text-center">
                <a href="{{ route('Barang.index') }}" class="btn btn-danger">Back !</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
@endsection