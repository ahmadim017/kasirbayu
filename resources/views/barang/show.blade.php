<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
           Detail Barang
        </h2>
    </x-slot>
    <body>
    <div class="card shadow-sm">
        <div class="card-header font-weight-bold text-white bg-secondary mb-3">
            Detail Barang
          </div>
        <div class="card-body border-right border-bottom p-3 h-100">
            <table class="table">
                <tr>
                    <th class="bg-light" width="200">Nama Barang</th>
                    <td colspan="3"><strong>{{$barang->namabarang}}</strong></td>
                </tr>
                <tr>
                <th class="bg-light">Satuan</th>
            <td><strong>{{$barang->satuan}}</strong></td>
            </tr>
                <tr>
                    <th class="bg-light">Stock Barang</th>
                <td><strong>{{$barang->stokbarang}}</strong></td>
                </tr>
                <tr>
                    <th class="bg-light">Harga Satuan</th>
                <td><strong>Rp.{{number_format($barang->hargabarang)}}</strong></td>
                </tr>
                <tr>
                    <th class="bg-light">Keterangan</th>
                <td><strong>{{$barang->keterangan}}</strong></td>
                </tr>
            </table>
        
  
  <a href="{{route('barang.edit',[$barang->id])}}" class="btn btn-primary btn-sm">Edit</a> 
                <form onsubmit="return confirm('Apakah Anda Yakin Ingin Menghapus?')" action="{{route('barang.destroy',[$barang->id])}}" class="d-inline" method="POST">
                @csrf
                @method('Delete')
                <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                </form>
  
  <a href="{{route('barang.index')}}" class="btn btn-primary btn-sm"><i class="fa fa-arrow-circle-left fa-fw fa-sm"></i>Kembali</a>
    </div>
</div>
</body>


</x-app-layout>