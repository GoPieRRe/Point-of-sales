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
        <form action="{{ route('Merek.store') }}" method="POST">

            @csrf
        <div class="modal-body">
          <label for="" class="form-label">Nama Barang :</label>
          <input required type="text" name="nama_merek" class="form-control" placeholder="Nama Barang">
          <label for="" class="form-label">Jenis</label>
          <select name="jenis" id="" class="form-control" required>
            <option value="">-- Pilih --</option>
            <option value="{{ __('Makanan') }}">{{ __('Makanan') }}</option>
            <option value="{{ __('Minuman') }}">{{ __('Minuman') }}</option>
            <option value="{{ __('Perabotan') }}">{{ __('Perabotan') }}</option>
          </select>
          <label for="" class="form-label">Pemasok</label>
          <select name="pemasok" id="" class="form-control" required>
            <option value="">-- Pilih --</option>
            @foreach ($Pt as $m)
            <option value="{{ $m->nama_pemasok }}">{{ $m->nama_pemasok }}</option>
            @endforeach
          </select>
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
    <table class="table table-warning rounded">
        <thead>
            <th>NO</th>
            <th>Nama Brands</th>
            <th>Jenis Brands</th>
            <th>Pemasok</th>
            <th colspan="2">Opsi</th>
        </thead>
        <?php $no = 1; ?>
        @foreach ($Brands as $b)
        <tbody>
            <td>{{ $no++ }}</td>
            <td>{{ $b->nama_merek }}</td>
            <td>{{ $b->jenis }}</td>
            <td>{{ $b->pemasok }}</td>
            <td>
                <form action="{{ route('Merek.destroy', $b->id) }}" method="POST">   
                    <a href="{{ route('Merek.edit',$b->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i></a>

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