<?php

namespace App\Http\Controllers;

use App\Models\{Pembelian,Barang,Pemasok};
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Pembelian = Pembelian::all();
        $barang = Barang::all();
        return view('Pembelian.index', compact('Pembelian','barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        
        $brg = Barang::where('nama_barang', $r->nama_barang)->first();
        $pms = Pemasok::where('nama_pemasok' ,$r->pemasok)->first();
        Pembelian::create([
            'id_barang' => $brg->id,
            'pemasok' => $brg->pemasok,
            'nama_barang' => $brg->nama_barang,
            'harga' => $r->harga,
            'stok' => $r->stok,
            'jenis' => $brg->jenis,
            'tgl_pembelian' => Carbon::now(),
        ]);

        
        $brg->stok += $r->stok;
        $brg->harga = $r->harga; 
        $brg->save();
        // $stok = Barang::find($r->stok)->where('barang.id', $id);

        // DB::table('barang')->newquery('UPDATE barang SET stok=$stok + $r->stok'); 

        return redirect()->route('Barang.index')->with('success', 'Berhasil Membeli');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pembelian  $Pembelian
     * @return \Illuminate\Http\Response
     */
    public function show(Pembelian $Pembelian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pembelian  $Pembelian
     * @return \Illuminate\Http\Response
     */
    public function edit(Pembelian $Pembelian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pembelian  $Pembelian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pembelian $Pembelian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pembelian  $Pembelian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pembelian $Pembelian)
    {
        $cek = $Pembelian->delete();
        if ($cek) {
        return redirect()->route('Pembelian.index')->with('success', 'Berhasil Dihapus');
        }else {
            return redirect()->route('Pembelian.index')->with('Gagal', 'Gagal Dihapus');
        }
    }
}
