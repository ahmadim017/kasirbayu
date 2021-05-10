<?php

namespace App\Http\Controllers;

use App\Models\barang;
use Illuminate\Http\Request;


class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = barang::all();
        return view('barang.index',['barang' => $barang]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('barang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $barang = new barang;
        $barang->namabarang = $request->get('namabarang');
        $barang->stokbarang = $request->get('stokbarang');
        $barang->satuan = $request->get('satuan');
        $barang->hargabarang = $request->get('hargabarang');
        $barang->keterangan = $request->get('keterangan');
        $barang->save();

        return redirect()->route('barang.index')->with('status','Data Barang Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $barang = barang::find($id);
        return view('barang.show',['barang' => $barang]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barang = barang::find($id);
        return view('barang.edit',['barang' => $barang]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $barang = barang::find($id);
        $barang->namabarang = $request->get('namabarang');
        $barang->satuan = $request->get('satuan');
        $barang->stokbarang = $request->get('stokbarang');
        $barang->hargabarang = $request->get('hargabarang');
        $barang->keterangan = $request->get('keterangan');
        $barang->save();

        return redirect()->route('barang.index')->with('status','Data Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barang = barang::find($id);
        $barang->delete();
        return redirect()->route('barang.index')->with('Status','Data Berhasil dihapus');
    }
}
