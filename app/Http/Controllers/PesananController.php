<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pesanan = pesanan::all();
        return view('pesanan.index',['pesanan' => $pesanan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pesanan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = validator::make($request->all(),[
            "noinvoice" => "required",
            "pemesan" => "required",
            "kantor" => "required",
            "alamat" => "required",
            "tglpenagihan" => "required",
            "tglpembayaran" => "required"
        ])->validated();

        $pesanan = new pesanan;
        $pesanan->noinvoice = $request->get('noinvoice');
        $pesanan->pemesan = $request->get('pemesan');
        $pesanan->kantor = $request->get('kantor');
        $pesanan->alamat = $request->get('alamat');
        $pesanan->tglpenagihan = $request->get('tglpenagihan');
        $pesanan->tglpembayaran = $request->get('tglpembayaran');
        $pesanan->save();

        return redirect()->route('pesanan.index')->with('status','data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pesanan  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pesanan = pesanan::find($id);
        $p = $pesanan->id;
        $order = order::where('id_pesanan','LIKE',"%$p%")->get();
        return view('pesanan.show',['pesanan' => $pesanan, 'order' => $order]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pesanan  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function edit(pesanan $pesanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pesanan  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pesanan $pesanan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pesanan  $pesanan
     * @return \Illuminate\Http\Response
     */
    public function destroy(pesanan $pesanan)
    {
        //
    }

    public function tambahBarang($id)
    {
        $pesanan = pesanan::find($id);
        $p = $pesanan->id;
        $order = order::where('id_pesanan','LIKE',"%$p%")->get();
        return view('pesanan.tambah',['pesanan' => $pesanan, 'order' => $order]);
    }
}
