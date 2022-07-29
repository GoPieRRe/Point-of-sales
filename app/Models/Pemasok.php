<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemasok extends Model
{
    use HasFactory;

    public $table = 'pemasok';

    protected $fillable = ['nama_pemasok', 'no_hp', 'email', 'alamat'];
}
