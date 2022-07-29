@extends('layouts.main')

@section('content')
<div class="py-2">

  <!-- Modal -->
<div class="modal fade" id="xjual" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Penjualan</h5>
      </div>
      <form action="{{ route('Penjualan.store') }}" method="POST">

          @csrf
      <div class="modal-body">
          
        <label for="" class="form-label">Pembeli :</label>
        <input type="text" name="pembeli" class="form-control" placeholder="Masukkan Nama">
        <label for="" class="form-label">Nama Barang :</label>
        <select name="nama_barang" class="form-control" id="" required>
          <option value="">--PILIH--</option>
          @foreach ($Barang as $b)
          <option value="{{ $b->nama_barang }}">{{ $b->nama_barang }} => {{ $b->Pemasok }}</option>
          @endforeach
        </select>
        {{-- <label for="" class="form-label">Harga :</label> --}}
        {{-- @foreach ($cek as $p) --}}
        {{-- <input required type="number" value="{{ $cek->harga_jual }}" min=0 class="form-control" name="harga" placeholder="Harga..."> --}}
        {{-- @endforeach --}}
        <label for="" class="form-label">Banyaknya :</label>
        <input required type="number" min=0 class="form-control" name="stok" placeholder="Banyaknya...">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-dollar-sign"></i> Jual</button>
      </div>
  </form>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="x" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pembelian</h5>
      </div>
      <form action="{{ route('Pembelian.store') }}" method="POST">

          @csrf
      <div class="modal-body">
          
        {{-- <label for="" class="form-label">Pemasok :</label>
        <select name="pemasok" required id="" class="form-control">
          <option value="" >-- Pilih Pemasok</option>
          @foreach ($pt as $p)
          <option value="{{ $p->nama_pemasok }}">{{ $p->nama_pemasok }}</option>
          @endforeach
        </select> --}}
        <label for="" class="form-label">Nama Barang :</label>
        <select name="nama_barang" class="form-control" id="" required>
          <option value="">--PILIH--</option>
          @foreach ($Barang as $b)
          <option value="{{ $b->nama_barang }}">{{ $b->nama_barang }} | {{ $b->Pemasok }}</option>
          @endforeach
        </select>
        <label for="" class="form-label">Harga Beli:</label>
        <input required type="number" min=0 class="form-control" name="harga" placeholder="Harga...">
        <label for="" class="form-label">Stok :</label>
        <input required type="number" min=0 class="form-control" name="stok" placeholder="Stok...">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Tambah</button>
      </div>
  </form>
    </div>
  </div>
</div>


<div class="py-2">
    <div class="text-right m-1">
        
    </div>
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Barang</h5>
        </div>
        <form action="{{ route('Barang.store') }}" method="POST">

            @csrf
        <div class="modal-body">
          <label for="" class="form-label">Nama Barang :</label>
          <input required type="text" name="nama_barang" class="form-control" placeholder="Nama Barang">
          <label for="" class="form-label">Stok :</label>
          <input required type="number" min=1 name="stok" class="form-control" placeholder="Stok Barang">
          <label for="" class="form-label">Harga :</label>
          <input required type="number" min=0 name="harga" class="form-control" placeholder="Harga Barang">
          <label for="" class="form-label">Harga Jual:</label>
          <input required type="number" min=0 name="harga_jual" class="form-control" placeholder="Harga Barang">
          <label for="" class="form-label">Jenis :</label>
          {{-- <input required type="text" class="form-control" name="jenis" placeholder="Jenis Barang"> --}}
          <select name="jenis" id="" class="form-control" required>
            <option value="">-- Pilih Jenis --</option>
            <option value="Makanan">Makanan</option>
            <option value="Minuman">Minuman</option>
            <option value="Perabotan">Perabotan</option>
          </select>
          <label for="" class="form-label">Pemasok</label>
          <select name="pemasok" id="" class="form-control">
            <option value="">--Pilih--</option>
            @foreach ($pt as $b)
            <option value="{{ $b->nama_pemasok }}">{{ $b->nama_pemasok }}</option>
            @endforeach
          </select>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
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
  @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif
  @if ($message = Session::get('gagal'))
  <div class="alert alert-danger">
      <p>{{ $message }}</p>
  </div>
  @endif
  {{-- <select class="select" id="eventType" name="eventType">
    <option vlaue="0"></option>
    <option value="0">Wedding</option>
    <option value="0">Private Party</option>
    <option value="0">Corporate Event</option>
 </select> --}}
{{-- <div class="summary_eventType"></div> --}}
<div class="btn-group m-2">
  <button type="button" class="btn btn-lg btn-success dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
    List
  </button>
  <ul class="dropdown-menu">
    <li><button type="button" type="button" class="dropdown-item" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> Tambah Barang</button></li>
      <li><button type="button" data-toggle="modal" data-target="#x" class="dropdown-item"><img src="{{ asset('../icon/cart4.svg') }}" alt=""> Pembelian Barang</button></li>
      <li><button type="button" data-toggle="modal" data-target="#xjual" class="dropdown-item"><img src="{{ asset('../icon/cash-stack.svg') }}" alt=""> Penjualan Barang</button></li>
  </ul>
</div>
    <table class="table table-dark table-striped rounded">
        <thead>
            <th>NO</th>
            <th>Nama Barang</th>
            <th>Stok Barang</th>
            <th>Harga Beli</th>
            <th>Harga Jual</th>
            <th>Jenis Barang</th>
            <th>Pemasok</th>
            <th colspan="4">Opsi</th>
        </thead>
        <?php $no = 1; ?>
        @foreach ($Barang as $b)
        <tbody>
            <td>{{ $no++ }}</td>
            <td>{{ $b->nama_barang }}</td>
            <td>{{ $b->stok }}</td>
            <td>{{ __('Rp ') . (number_format($b->harga, 2)) }}</td>
            <td>{{ __('Rp ') . (number_format($b->harga_jual, 2)) }}</td>
            <td>{{ $b->jenis }}</td>
            <td>{{ $b->Pemasok }}</td>
            <td>
  
                    <form action="{{ route('Barang.destroy', $b->id) }}" method="post">
                      
                    @csrf
                    @method('DELETE')
                      <a href="{{ route('Barang.edit',$b->id) }}" class="btn btn-warning"><img src="{{ asset('../icon/pen-fill.svg') }}" alt=""></a>
                      <button onclick="return confirm('Ingin Menghapus {{ $b->nama_barang }}??')" class="btn btn-danger" type="submit"><img src="{{ asset('../icon/trash-fill.svg') }}" alt=""></button>
                    </form>
                  </ul>
              </div>
            </td>
        </tbody>
        @endforeach
    </table>
    <script>
      $(".txt, .select, .checkbox").each(function() {
            $(this).change(function(){
                createSummary();
            });
        });
    
    function createSummary() {
        var eventType = $("#eventType option:selected").text() 
        $(".summary_eventType").html(eventType);
    
    }
    </script>
</div>
@endsection