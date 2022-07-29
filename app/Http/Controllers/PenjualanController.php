<?php

namespace App\Http\Controllers;

use App\Models\{Penjualan,Barang,Pemasok};
use Illuminate\Http\Request;
use Carbon\Carbon;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Penjualan = Penjualan::all();

        return view('Penjualan.index', compact('Penjualan'));
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
        
        if ($brg->stok < $r->stok) {
            return redirect()->route('Barang.index')->with('gagal', 'Stok barang tidak memadai');
        }else {
            Penjualan::create([
                'id_barang' => $brg->id,
                'nama_pembeli' => $r->pembeli,
                'nama_barang' => $brg->nama_barang,
                'harga' => $brg->harga_jual,
                'stok' => $r->stok,
                'jenis' => $brg->jenis,
                'tgl_penjualan' => Carbon::now(),
            ]);
    
            
            $brg->stok -= $r->stok;
        }
        // $brg->harga = $r->harga; 
        $brg->save();
        return redirect()->route('Barang.index')->with('success', 'Penjualan Berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function show(Penjualan $penjualan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function edit(Penjualan $penjualan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penjualan $penjualan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penjualan $penjualan)
    {
        //
    }
}
