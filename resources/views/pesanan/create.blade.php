<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            Pesanan
        </h2>
    </x-slot>
    <body>
    <div class="card shadow-sm">
        <div class="card-header font-weight-bold text-white bg-secondary mb-3">
            Tambah Pesanan
          </div>
        <div class="card-body border-right border-bottom p-3 h-100">
            <form action="{{route('pesanan.store')}}" class="bg-white shadow-sm p-3" method="POST">
                @csrf
                <div class="mb-3 col-8">
                    <label for="" class="form-label font-weight-bold">Nomor Invoice</label>
                    <input type="text" name="noinvoice" class="form-control" required>
                </div>
                <div class="mb-3 col-6">
                    <label for="" class="form-label font-weight-bold">Nama Pemesan</label>
                    <input type="text" name="pemesan" class="form-control" required>
                </div>
                <div class="mb-3 col-6">
                    <label for="" class="form-label font-weight-bold">Instansi/Kantor/Perusahaan</label>
                    <input type="text" name="kantor" class="form-control" required>
                </div>
                <div class="mb-3 col-8">
                    <label for="" class="form-label font-weight-bold">Alamat</label>
                    <textarea name="alamat" class="form-control"></textarea>
                </div>
                <div class="mb-3 col-4">
                    <label for="" class="form-label font-weight-bold">Tanggal Penagihan</label>
                    <input type="date" name="tglpenagihan" class="form-control" required>
                </div>
                <div class="mb-3 col-4">
                    <label for="" class="form-label font-weight-bold">Tanggal Akhir Pembayaran</label>
                    <input type="date" name="tglpembayaran" class="form-control" required>
                </div>
               
                <div class="col">
                    <input type="submit" value="Simpan" class="btn btn-secondary btn-sm">
                    <a href="{{route('pesanan.index')}}" class="btn btn-secondary btn-sm">Kembali</a>
                </div>
            </form>
            
        </div>
    </div>
    </body>  
</x-app-layout>