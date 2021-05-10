<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            Daftar Barang
        </h2>
    </x-slot>
    <body>
        <div class="row">
            <div class="col-md-12 text-right">
            <a href="{{route('barang.create')}}" class="d-none d-sm-inline-block btn btn-secondary btn-sm shadow-sm"><i class="fa fa-plus-circle fa-sm text-white-50"></i> Tambah Barang</a>
            </div> 
        </div><br>
    <div class="card shadow-sm">
        <div class="card-header font-weight-bold text-white bg-secondary mb-3">
            Daftar Barang
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
                    <th scope="col">Stock</th>
                    <th scope="col">Satuan</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Keterangan</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($barang as $b)
                  <tr>
                      <td>{{$loop->iteration}}</td>
                       <td><a href="{{route('barang.show',[$b->id])}}">{{$b->namabarang}}</a></td>
                       <td>{{$b->stokbarang}}</td>
                       <td>{{$b->satuan}}</td>
                       <td>{{$b->hargabarang}}</td>
                       <td>{{$b->keterangan}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>

        </div>
    </div>
    </body>

   
</x-app-layout>