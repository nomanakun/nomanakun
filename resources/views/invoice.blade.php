<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Invoice {{$data['noinvoice']}}</title>
    <link rel="stylesheet" href="{{ asset('invoice/style.css') }}" media="all" />
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="{{asset('invoice/logo.png')}}">
      </div>
      <h1>INVOICE {{$data['noinvoice']}}</h1>
      <div id="company" class="clearfix">
        <div>Yeonamchin Kshop</div>
        <div>Jl mulu jadian kaga<br /> AZ 85004, US</div>
        <div>(602) 519-0450</div>
        <div>yeonamchin@gmail.com</div>
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
            <th class="service">SERVICE</th>
            <th class="desc">DESCRIPTION</th>
            <th>HARGA</th>
            <th>QTY</th>
            <th>TOTAL</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($data['barang'] as $b)
          <tr>
            <td class="service"></td>
            <td class="desc">{{$b['namabarang']}}</td>
            <td class="unit">{{$b['harga']}}</td>
            <td class="qty">{{$b['qty']}}</td>
            <td class="total">{{$b['total']}}</td>
          </tr>
          @endforeach
          <tr>
            <td class="service"></td>
            <td class="desc"></td>
            <td class="unit"></td>
            <td class="qty"><b>GrandTotal</b></td>
            <td class="total">{{$data['grandtotal']}}</td>
          </tr>
        </tbody>
      </table>
      <div id="notices">
        <div>NOTICE:</div>
        <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
      </div>
    </main>
    <footer>
      Invoice was created on a computer and is valid without the signature and seal.
    </footer>
  </body>
</html>