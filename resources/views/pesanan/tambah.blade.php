<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            Daftar Pesanan
        </h2>
    </x-slot>
    <body>
        <table class="table table-striped">
            <tbody>
              <tr>
                  <td class="font-weight-bold text-white bg-secondary">No Invoice : {{$pesanan->id}}-{{$pesanan->noinvoice}}-{{$pesanan->pemesan}} 
                    </td>
              </tr>
            </tbody>
          </table>
        <div class="row">
            <div class="col-md-12 text-right">
            <a href="{{route('order.cetak',[$pesanan->id])}}" class=" text-right d-none d-sm-inline-block btn btn-secondary btn-sm shadow-sm">Cetak</a>
            <a href="{{route('order.buat',[$pesanan->id])}}" class="d-none d-sm-inline-block btn btn-secondary btn-sm shadow-sm"><i class="fa fa-plus-circle fa-sm text-white-50"></i> Tambah Barang</a>
          </div> 
        </div><br>
    <div class="card shadow-sm">
        <div class="card-header font-weight-bold text-white bg-secondary mb-3">
            Tambah barang
          </div>
        <div class="card-body border-right border-bottom p-3 h-100">
              @if(session('status'))
              <div class="alert alert-success">
                {{session('status')}}
              </div>
            @endif 
          
            @if(session('Status'))
              <div class="alert alert-danger">
              {{session('Status')}}
            </div>
            @endif
            
            <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Volume</th>
                    <th scope="col">Satuan</th>
                    <th scope="col">Harga Satuan</th>
                    <th scope="col">Total Harga</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $total = 0?>
                   @foreach ($order as $o)
                  <tr>
                      <td>{{$loop->iteration}}</td>
                       <td>{{$o->namabarang}}</td>
                       <td>{{$o->volume}}</td>
                       <td>{{$o->satuan}}</td>
                       <td>Rp.{{number_format($o->hargasatuan)}}</td>
                       <td>Rp.{{number_format($o->totalharga)}}</td>
                       <td><form onsubmit="return confirm('Apakah Anda Yakin Ingin Menghapus?')" class="d-inline" action="{{route('order.destroy',[$o->id])}}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="submit" value="Delete" class="btn btn-danger btn-sm">
                        </form>
                    </td>
                  </tr>
                  <?php $total += $o->totalharga?>
                  @endforeach
                  <tr>
                    <td colspan="5" class="table-dark">TOTAL</td>
                    <td class="table-dark">Rp.{{number_format($total)}}</td>
                    <td class="table-dark"></td>
                  </tr>
                </tbody>
              </table>

        </div>
    </div>
    </body>

   
</x-app-layout>