<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            Daftar Barang
        </h2>
    </x-slot>
    <body>
    <div class="card shadow-sm">
        <div class="card-header font-weight-bold text-white bg-secondary mb-3">
            Tambah Data Barang
          </div>
        <div class="card-body border-right border-bottom p-3 h-100">
            <form action="{{route('barang.store')}}" class="bg-white shadow-sm p-3" method="POST">
                @csrf
                <div class="mb-3 col-8">
                    <label for="" class="form-label font-weight-bold">Nama Barang</label>
                    <input type="text" name="namabarang" class="form-control" required>
                </div>
                <div class="mb-3 col-6">
                    <label for="" class="form-label font-weight-bold">Satuan</label>
                    <input type="text" name="satuan" class="form-control" required>
                </div>
                <div class="mb-3 col-4">
                    <label for="" class="form-label font-weight-bold">Stock Barang</label>
                    <input type="number" name="stokbarang" class="form-control" required>
                </div>
                <div class="mb-3 col-4">
                    <label for="" class="form-label font-weight-bold">Harga Satuan</label>
                    <input type="number" name="hargabarang" class="form-control" required>
                </div>
                <div class="mb-3 col-8">
                    <label for="" class="form-label font-weight-bold">Keterangan</label>
                    <textarea name="keterangan" class="form-control"></textarea>
                </div>
                <div class="col">
                    <input type="submit" value="Simpan" class="btn btn-secondary btn-sm">
                    <a href="{{route('barang.index')}}" class="btn btn-secondary btn-sm">Kembali</a>
                </div>
            </form>
            
        </div>
    </div>
    </body>

   
</x-app-layout>