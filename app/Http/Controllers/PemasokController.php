<?php

namespace App\Http\Controllers;

use App\Models\Pemasok;
use Illuminate\Http\Request;

class PemasokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Pemasok = Pemasok::all();

        return view('Pemasok.index', compact('Pemasok'));
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

        $cek = Pemasok::where('nama_pemasok', $r->nama_pemasok)->first();
        switch ($cek) {
            case FALSE:
                Pemasok::create([
                    'nama_pemasok' => $r->nama_pemasok,
                    'no_hp' => $r->no_hp,
                    'email' => $r->email,
                    'alamat' => $r->alamat,
                ]);

                return redirect()->route('Pemasok.index')->with('success', 'Berhasil DItambahkan');
                break;
            
            default:
            return redirect()->route('Pemasok.index')->with('success', 'Pemasok Tersebut Sudah ada');
                break;
        }
        

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pemasok  $pemasok
     * @return \Illuminate\Http\Response
     */
    public function show(Pemasok $pemasok)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pemasok  $pemasok
     * @return \Illuminate\Http\Response
     */
    public function edit(Pemasok $Pemasok)
    {
        return view('Pemasok.edit', compact('Pemasok'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pemasok  $pemasok
     * @return \Illuminate\Http\Response
     */
    public function update(Request $r, Pemasok $pemasok)
    {
        $r->validate([
            'nama_pemasok' => 'required',
            'no_hp' => 'required',
            'email' => 'required',
            'alamat' =>'required'
        ]);
        $pemasok->update($r->all());
        return redirect()->route('Pemasok.index')->with('Update Succesfully !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pemasok  $pemasok
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pemasok $Pemasok)
    {
        
        $cek = $Pemasok->delete();
        if ($cek) {
            return redirect()->route('Pemasok.index')->with('success', 'Berhasil Dihapus');
        }else {
            return redirect()->route('Pemasok.index')->with('gagal', 'Gagal Dihapus');
        }
       
    }
}
