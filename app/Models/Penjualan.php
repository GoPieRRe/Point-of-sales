<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{ 
    use HasFactory;

    public $table = 'penjualan';

    protected $fillable = ['id_barang', 
                            'nama_pembeli', 
                            'nama_barang' ,
                            'harga',
                            'stok',
                            'jenis',
                            'tgl_penjualan'];
}
