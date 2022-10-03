<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class invoice extends Controller
{
    public function index()
    {
        return view('form');
    }

    public function invoice()
    {
        return view('invoice');
    }

    public function proses(Request $request)
    {
        $noinvoice = $request->noinvoice;
        $tgl = $request->tgl;
        $nama = $request->namapembeli;
        $no = $request->nopembeli;
        $alamat = $request->alamat;

        if($request->namabarang !=null)
        {
            for($i=0;$i < count($request->namabarang);$i++)
            {
                $barang[$i] = [
                    'namabarang' => $request->namabarang[$i],
                    'qty' => $request->qty[$i],
                    'harga' => $request->harga[$i],
                ];
            }

            $jml = count($barang);
            $i = 0;
            $grandtotal = 0;
            while ($jml > 0)
            {
                $barang[$i]['total'] = $this->totalHarga($barang[$i]['qty'],$barang[$i]['harga']);
                $grandtotal = $grandtotal + $barang[$i]['total'];
                $i++;
                $jml--;
            }

            $data = [
                'noinvoice' => $noinvoice,
                'tgl' => $tgl,
                'nama' => $nama,
                'no' => $no,
                'alamat' => $alamat,
                'barang' => $barang,
                'grandtotal' => $grandtotal
            ];

            return view('invoice',compact('data'));
        }
    }

    function totalHarga($a,$b)
    {
        $total = $a * $b;
        return strval($total);
    }
}
