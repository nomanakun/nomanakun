<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Invoice {{$data['noinvoice']}}</title>
    <link rel="stylesheet" href="{{ asset('invoice/style.css') }}" media="all" />
  </head>
  <body>
    <header class="clearfix">
      <!-- <div id="logo">
        <img src="{{asset('invoice/logo.png')}}">
      </div> -->
      <h1>INVOICE {{$data['noinvoice']}}</h1>
      <div id="company" class="clearfix">
        <div>YEONAMCHIN.KSHOP</div>
        <div>Jl H. Som<br /> Tangerang Selatan</div>
        <div>yeonamchin.kshop@gmail.com</div>
      </div>
      <div id="project">
        <div><span>PEMBELI</span> {{$data['nama']}}</div>
        <div><span>ADDRESS</span> {{$data['alamat']}}</div>
        <div><span>NO</span> {{$data['no']}}</div>
        <div><span>DATE</span> {{$data['tgl']}}</div>
      </div>
    </header>
    <main>
      <table>
        <thead>
          <tr>
            <th class="service">NO</th>
            <th>KODE BARANG</th>
            <th class="desc">DESCRIPTION</th>
            <th>HARGA</th>
            <th>QTY</th>
            <th>BIAYA TAMBAHAN</th>
            <th>TOTAL</th>
          </tr>
        </thead>
        <tbody>
        <?php $i=1;?>
          @foreach ($data['barang'] as $b)
          <tr>
            <td class="service"><?php echo $i;?></td>
            <td class="kode">{{$b['kode']}}</td>
            <td class="desc">{{$b['namabarang']}}</td>
            <td class="unit">{{number_format($b['harga'], 2)}}</td>
            <td class="qty">{{$b['qty']}}</td>
            <td class="tambahan">{{number_format($b['tambahan'], 2)}}</td>
            <td class="total">{{number_format($b['total'], 2)}}</td>
          </tr>
          <?php $i++;?>
          @endforeach
          <tr>
            <td class="service"></td>
            <td class="desc"></td>
            <td class="unit"></td>
            <td></td>
            <td></td>
            <td class="qty"><b>GrandTotal</b></td>
            <td class="total">{{number_format($data['grandtotal'], 2)}}</td>
          </tr>
        </tbody>
      </table>
      <div id="notices">
        <div>Terbilang:</div>
        <div class="notice">{{$data['terbilang']}} Rupiah.</div>
      </div>
    </main>
    <footer>
      Invoice was created on a computer and is valid without the signature and seal.
    </footer>
  </body>
</html>