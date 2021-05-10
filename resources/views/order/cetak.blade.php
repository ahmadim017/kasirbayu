<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Invoice</title>
</head>
<style>
 
</style>
<body>
    <div class="container">
        <table width="100%">
            <tr>
                <td width="80" height="70" align="center"><img src="{{ ('logo/cm.jpg') }}" width="100px"></td>
                <td><center><font size="5"><b> CV.CAHAYA MANDIRI</b></font><br>
                    <font size = "2"><b> Menyediakan Alat Tulis Kantor,Alat Tulis Sekolah, Perlengkapan Komputer, Office Furniture,Dll</b></font><br>
                   </center> 
                </td>
                <td width="80" height="70" align="center"><h1><b>INVOICE</b></h1></td>
            </tr>
        </table><br>

        <table width="100%" border="0">
            <tr>
                <td colspan="3"><hr></td>
            </tr>
            <tr>
              <td width="65">NOMOR INVOICE </td>
              <td width="65">TANGGAL PENAGIHAN </td>
              <td width="65">BATAS AKHIR PEMBAYARAN</td>
            </tr>
            <tr>
              <td>{{$pesanan->noinvoice}}</td>
              <td>{{date("Y",strtotime($pesanan->tglpenagihan))}}</td>
              <td>{{date("Y",strtotime($pesanan->tglpembayaran))}}</td>
            </tr>
            <tr>
                <td colspan="3"><hr></td>
            </tr>
          </table><br><br>

        
    <table width="100%" border="0">
        <tr>
          <td width="43%"><b>DITAGIHKAN KEPADA</b></td>
          <td width="35%">&nbsp;</td>
          <td width="43%"><b>DITAGIHKAN OLEH</b></td>
        </tr>
        <tr>
          <td>{{$pesanan->pemesan}}</td>
          <td>&nbsp;</td>
          <td> Dara Apriana</td>
        </tr>
        <tr>
          <td>{{$pesanan->kantor}}</td>
          <td>&nbsp;</td>
          <td>CV.Cahaya Mandiri </td>
        </tr>
        <tr>
          <td>{{$pesanan->alamat}}</td>
          <td>&nbsp;</td>
          <td>Jalan Suka Maju Gn.Seteleng 76141 </td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table><br>
        

        <table class="table" border="1" width="100%" cellspacing="0" cellpadding="2">
            <thead>
              <tr>
                <th scope="col" bgcolor="#999999">No.</th>
                <th scope="col" bgcolor="#999999">Nama Barang</th>
                <th scope="col" bgcolor="#999999">Volume</th>
                <th scope="col" bgcolor="#999999">Satuan</th>
                <th scope="col" bgcolor="#999999">Harga Satuan</th>
                <th scope="col" bgcolor="#999999">Total Harga</th>
              </tr>
            </thead>
            <tbody>
              <?php $total = 0?>
              <?php $pajak = 0?>
              <?php $totals = 0?>
               @foreach ($order as $o)
              <tr>
                  <td>{{$loop->iteration}}</td>
                   <td>{{$o->namabarang}}</td>
                   <td>{{$o->volume}}</td>
                   <td>{{$o->satuan}}</td>
                   <td>Rp.{{number_format($o->hargasatuan)}}</td>
                   <td>Rp.{{number_format($o->totalharga)}}</td>
              </tr>
              <?php $total += $o->totalharga?>
              @endforeach
              <?php $pajak = $total * 0.1 ?>
              <?php $totals = $total + $pajak ?>
              <tr>
                <td colspan="5">Total Harga</td>
                <td>Rp.{{number_format($total)}}</td>
              </tr>
              <tr>
                <td colspan="5">Pajak 10%</td>
                <td>Rp.{{number_format($pajak)}}</td>
              </tr>
              <tr>
                <td colspan="5" bgcolor="#999999">Total Keseluruhan</td>
                <td bgcolor="#999999">Rp.{{number_format($totals)}}</td>
              </tr>
            </tbody>
          </table><br><br>

            
            
          <table width="100%" border="0">
            <tr>
              <td width="64">&nbsp;</td>
              <td width="19">&nbsp;</td>
              <td width="58"><div align="center">Hormat Kami,</div></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td><div align="center"><b>CV CAHAYA MANDIRI</b></div></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td><div align="center"></div></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td><div align="center"></div></td>
            </tr>
            <tr>
              <td>&nbsp;</td>
              <td>&nbsp;</td>
              <td><div align="center"><b>Dara Apriana</b></div></td>
            </tr>
          </table>
    </div>
        
</body>
</html>