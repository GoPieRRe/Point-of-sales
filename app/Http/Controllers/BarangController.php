<?php

namespace App\Http\Controllers;

use App\Models\{Barang,Pemasok, Penjualan, Pembelian};
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Barang $Barang, Penjualan $penjualan, Pembelian $Pembelian)
    {
        $Barang = Barang::all();
        $pt = Pemasok::all();
        return view('Barang.index',compact('Barang', 'pt',));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('Barang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        $cek = Barang::where('nama_barang' ,$r->nama_barang)->where('pemasok', $r->pemasok)->first();
        // dd($cek);
        switch ($cek) {
            case false:
                Barang::create([
                    'nama_barang' => $r->nama_barang,
                    'harga' => $r->harga,
                    'stok' => $r->stok,
                    'jenis' => $r->jenis,
                    'harga_jual' => $r->harga_jual,
                    'pemasok' => $r->pemasok
                ]);
                return redirect()->route('Barang.index')->with('success','Barang Berhasil Disimpan');
                        
                break;
                
            default:
                return redirect()->back()->with('success','Barang Sudah Ada!');
                break;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $Barang)
    {
        return view('Barang.edit',compact('Barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang $barang)
    {
        $request->validate([
            'nama_barang' => 'required',
            'harga_jual' => 'required',
            'stok' => 'required',
            'jenis' => 'required'
        ]);

        $barang->update($request->all());
        return redirect()->route('Barang.index')->with('success','Barang Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $Barang)
    {
        $cek = $Barang->delete();
        if ($cek) {
        return redirect()->route('Barang.index')->with('success', 'Berhasil Dihapus');
        }else {
        return redirect()->route('Barang.index')->with('gagal', 'Gagal Dihapus');
        }
    }
}
