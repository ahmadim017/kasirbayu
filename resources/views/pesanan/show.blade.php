<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
           Detail Pesanan
        </h2>
    </x-slot>
    <body>
    <div class="card shadow-sm">
        <div class="card-header font-weight-bold text-white bg-secondary mb-3">
            Detail Pesanan
          </div>
        <div class="card-body border-right border-bottom p-3 h-100">
            <table class="table">
                <tr>
                    <th class="bg-light" width="200">Nama Pemesan</th>
                    <td colspan="3"><strong>{{$pesanan->pemesan}}</strong></td>
                </tr>
                <tr>
                <th class="bg-light">Kantor/Instansi/Perusahaan</th>
            <td><strong>{{$pesanan->kantor}}</strong></td>
            </tr>
                <tr>
                    <th class="bg-light">Alamat</th>
                <td><strong>{{$pesanan->alamat}}</strong></td>
                </tr>
                <tr>
                    <th class="bg-light">Tanggal Penagihan</th>
                <td><strong>{{date("d-M-Y",strtotime($pesanan->tglpenagihan))}}</strong></td>
                </tr>
                <tr>
                    <th class="bg-light">Tanggal Penagihan</th>
                <td><strong>{{date("d-M-Y",strtotime($pesanan->tglpembayaran))}}</strong></td>
                </tr>
                <tr>
                    <th class="bg-light">Daftar Barang</th>
                <td><div class="breadcrumb">
                    Daftar Barang
              </div>
              <table  class="table">
                  <thead>
                      <tr>
                          <th>Nama Barang</th>
                          <th>Volume</th>
                          <th>Satuan</th>
                          <th>Harga Satuan</th>
                      </tr>
                  </thead>
                  <tbody>
                    <?php $total = 0?>
                    @foreach ($order as $o)
                          <tr>
                            <td>{{$o->namabarang}}</td>
                            <td>{{$o->volume}}</td>
                            <td>{{$o->satuan}}</td>
                            <td>Rp.{{number_format($o->hargasatuan)}}</td> 
                          </tr>
                          <?php $total += $o->totalharga?>
                      @endforeach
                      <tr>
                        <td colspan="3" class="table-secondary">TOTAL</td>
                        <td class="table-secondary">Rp.{{number_format($total)}}</td>
                      </tr>
                    </tbody>
                  </tbody>
              </table></td>
                </tr>
            </table>
        
  
  <a href="{{route('pesanan.edit',[$pesanan->id])}}" class="btn btn-primary btn-sm">Edit</a> 
                <form onsubmit="return confirm('Apakah Anda Yakin Ingin Menghapus?')" action="{{route('pesanan.destroy',[$pesanan->id])}}" class="d-inline" method="POST">
                @csrf
                @method('Delete')
                <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                </form>
  
  <a href="{{route('pesanan.index')}}" class="btn btn-primary btn-sm"><i class="fa fa-arrow-circle-left fa-fw fa-sm"></i>Kembali</a>
    </div>
</div>
</body>


</x-app-layout>