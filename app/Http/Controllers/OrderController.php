<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\pesanan;
use Carbon\Carbon;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $pesanan = pesanan::find($id);
        return view('order.create',['pesanan' => $pesanan]);
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
            "namabarang" => "required",
            "volume" => "required",
            "satuan" => "required",
            "hargasatuan" => "required",
            "totalharga" => "required"
        ])->validated();

        $order = new order;
        $order->id_pesanan =$request->get('id_pesanan');
        $order->noinvoice = $request->get('noinvoice');
        $order->namabarang = $request->get('namabarang');
        $order->volume = $request->get('volume');
        $order->satuan = $request->get('satuan');
        $order->hargasatuan = $request->get('hargasatuan');
        $order->totalharga = $request->get('totalharga');
        $order->save();
        return redirect()->route('pesanan.tambah',[$order->id_pesanan])->with('status','Berhasil menambah barang');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = order::find($id);
        $order->delete();
        return redirect()->route('pesanan.tambah',[$order->id_pesanan])->with('Status','Berhasil dihapus');
    }

    public function cetakpdf($id)
    {
        $pesanan = pesanan::find($id);
        $p = $pesanan->id;
        $order = order::where('id_pesanan','LIKE',"%$p%")->get();
        $pdf = PDF::loadView('order.cetak',['pesanan' => $pesanan , 'order' => $order]);
        //return $pdf->stream();
        return $pdf->download('invoice.pdf');
    }
}
