@extends('layouts.main')

@section('content')
<div class="py-2">
    <div class="text-right m-1">
        <button type="button" type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-success btn-lg mb-2"><i class="fas fa-plus"></i> Tambah</button>
    </div>
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Brand</h5>
        </div>
        <form action="{{ route('Pemasok.store') }}" method="POST">

            @csrf
        <div class="modal-body">
          <label for="" class="form-label">Nama Pemasok :</label>
          <input required type="text" name="nama_pemasok" class="form-control" placeholder="Pemasok...">
          <label for="" class="form-label">No Hp :</label>
          <input required type="number" min=0 class="form-control" name="no_hp" placeholder="No HP...">
          <label for="" class="form-label">email :</label>
          <input required type="email" class="form-control" name="email" placeholder="Email...">
          <label for="" class="form-label">Alamat :</label>
          <textarea name="alamat" id="" cols="30" rows="10" class="form-control"></textarea>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
    </form>
      </div>
    </div>
  </div>
  
  @if ($message = Session::get('success'))
  <div class="alert alert-success">
      <p>{{ $message }}</p>
  </div>
@endif
@if ($message = Session::get('gagal'))
<div class="alert alert-danger">
    <p>{{ $message }}</p>
</div>
@endif
    <table class="table table-warning rounded">
        <thead>
            <th>NO</th>
            <th>Nama </th>
            <th>No Hp</th>
            <th>Email</th>
            <th>Alamat</th>
            <th colspan="2">Opsi</th>
        </thead>
        <?php $no = 1; ?>
        @foreach ($Pemasok as $b)
        <tbody>
            <td>{{ $no++ }}</td>
            <td>{{ $b->nama_pemasok }}</td>
            <td>{{ $b->no_hp }}</td>
            <td>{{ $b->email }}</td>
            <td>{{ $b->alamat }}</td>
            <td>
                <form action="{{ route('Pemasok.destroy', $b->id) }}" method="POST">   
                    <a href="{{ route('Pemasok.edit',$b->id) }}" class="btn btn-warning"><img src="{{ asset('../icon/pen-fill.svg') }}" alt=""></a>

                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are You Sure??')"><img src="{{ asset('../icon/trash-fill.svg') }}" alt=""></button>
                </form>
            </td>
        </tbody>
        @endforeach
    </table>
</div>
@endsection