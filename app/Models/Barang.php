<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    public $table = 'barang';
    
    protected $fillable = ['nama_barang', 'harga', 'stok','jenis','harga_jual' ,'pemasok'];
}
