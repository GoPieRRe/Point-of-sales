<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/solid.css') }}">
    <link rel="stylesheet" href="{{ asset('css/svg-with-js.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('css/reguler.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap-icons.css') }}">

    <script src="{{ asset('js/dt.js') }}"></script>
   

    {{-- Data table --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
{{-- end --}}
    
    <script src="https://kit.fontawesome.com/d56bc83d4f.js" crossorigin="anonymous"></script>
</head>
<body>
<nav class="navbar navbar-expand-sm bg-success navbar-success sticky-top">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        <a href="/" class="navbar-brand text-dark fw-bold"> Point Of Sales</a>
        <ul class="navbar-nav">
            {{-- <li class="nav-item">
                <a href="{{ route('Merek.index') }}" class="nav-link">Brands</a>
            </li> --}}
            <li class="nav-item">
                <a href="{{ route('Barang.index') }}" class="text-light nav-link"><img src="{{ asset('icon') }}" alt=""> List Barang</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('Pemasok.index') }}" class="text-light nav-link"><img src="{{ asset('icon') }}" alt=""> List Pemasok</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('Pembelian.index') }}" class="text-light nav-link"><img src="{{ asset('icon') }}" alt=""> List Pembelian</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('Penjualan.index') }}" class="text-light nav-link"><img src="{{ asset('icon') }}" alt=""> List Penjualan</a>
            </li>
        </ul>
    </div>
    
</nav>
<div class="container">
    @yield('content')
</div>
<script src="{{ asset('js/bootstrap.js') }}"></script>
<script src="{{ asset('js/bootstrap.bundle.js') }}"></script>
<script src="{{ asset('js/fontawesome.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>