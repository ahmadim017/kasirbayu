<script>
    function kali() {
          var txtFirstNumberValue = document.getElementById('txt1').value;
          var txtSecondNumberValue = document.getElementById('txt2').value;
          var result = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue);
          if (!isNaN(result)) {
             document.getElementById('txt3').value = result;
          }
    }
    </script>

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
            <form action="{{route('order.store')}}" class="bg-white shadow-sm p-3" method="POST">
                @csrf
                <input type="hidden" name="id_pesanan" value="{{$pesanan->id}}">
                <input type="hidden" name="noinvoice" value="{{$pesanan->noinvoice}}">
                <div class="mb-3 col-8">
                    <label for="" class="form-label font-weight-bold">Nama Barang</label>
                    <input type="text" name="namabarang" class="form-control" required>
                </div>
                <div class="mb-3 col-4">
                    <label for="" class="form-label font-weight-bold">Volume</label>
                    <input type="number" name="volume" class="form-control" id="txt1"  onkeyup="kali();" required>
                </div>
                <div class="mb-3 col-4">
                    <label for="" class="form-label font-weight-bold">Satuan</label>
                    <input type="text" name="satuan" class="form-control" required>
                </div>
                <div class="mb-3 col-4">
                    <label for="" class="form-label font-weight-bold">Harga Satuan</label>
                    <input type="number" name="hargasatuan" id="txt2"  onkeyup="kali();" class="form-control" required>
                </div>
                <div class="mb-3 col-4">
                    <label for="" class="form-label font-weight-bold">Total Harga</label>
                    <input type="number" name="totalharga"  id="txt3" class="form-control" required>
                </div>
                <div class="col">
                    <input type="submit" value="Simpan" class="btn btn-secondary btn-sm">
                    <a href="{{route('pesanan.tambah',[$pesanan->id])}}" class="btn btn-secondary btn-sm">Kembali</a>
                </div>
            </form>
            
        </div>
    </div>
    </body> 
</x-app-layout>