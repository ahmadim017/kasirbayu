<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            Daftar Pesanan
        </h2>
    </x-slot>
    <body>
        <div class="row">
            <div class="col-md-12 text-right">
            <a href="{{route('pesanan.create')}}" class="d-none d-sm-inline-block btn btn-secondary btn-sm shadow-sm"><i class="fa fa-plus-circle fa-sm text-white-50"></i> Buat Pesanan</a>
            </div> 
        </div><br>
    <div class="card shadow-sm">
        <div class="card-header font-weight-bold text-white bg-secondary mb-3">
            Daftar Pesanan
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
                    <th scope="col">Nomor Invoice</th>
                    <th scope="col">Nama Pemesan</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Tanggal Penagihan</th>
                    <th scope="col">Tanggal Pembayaran</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($pesanan as $p)
                  <tr>
                      <td>{{$loop->iteration}}</td>
                       <td><a href="{{route('pesanan.show',[$p->id])}}">{{$p->noinvoice}}</a></td>
                       <td>{{$p->pemesan}}</td>
                       <td>{{$p->alamat}}</td>
                       <td>{{date("d-m-Y",strtotime($p->tglpenagihan))}}</td>
                       <td>{{date("d-m-Y",strtotime($p->tglpembayaran))}}</td>
                       <td><a href="{{route('pesanan.tambah',[$p->id])}}" class="btn btn-secondary btn-sm">Daftar Barang</a></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>

        </div>
    </div>
    </body>

   
</x-app-layout>