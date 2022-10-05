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
                    'kode' => $request->kode[$i],
                    'tambahan' => $request->tambahan[$i],
                ];
            }

            $jml = count($barang);
            $i = 0;
            $grandtotal = 0;
            while ($jml > 0)
            {
                $barang[$i]['total'] = $this->totalHarga($barang[$i]['qty'],$barang[$i]['harga'],$barang[$i]['tambahan']);
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
                'grandtotal' => $grandtotal,
                'terbilang' => ucwords($this->terbilang($grandtotal)),
            ];

            return view('invoice',compact('data'));
        }
    }

    function totalHarga($a,$b,$c)
    {
        $total = $a * $b + $c;
        return strval($total);
    }

    function penyebut($nilai) {
		$nilai = abs($nilai);
		$huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
		$temp = "";
		if ($nilai < 12) {
			$temp = " ". $huruf[$nilai];
		} else if ($nilai <20) {
			$temp = $this->penyebut($nilai - 10). " belas";
		} else if ($nilai < 100) {
			$temp = $this->penyebut($nilai/10)." puluh". $this->penyebut($nilai % 10);
		} else if ($nilai < 200) {
			$temp = " seratus" . $this->penyebut($nilai - 100);
		} else if ($nilai < 1000) {
			$temp = $this->penyebut($nilai/100) . " ratus" . $this->penyebut($nilai % 100);
		} else if ($nilai < 2000) {
			$temp = " seribu" . $this->penyebut($nilai - 1000);
		} else if ($nilai < 1000000) {
			$temp = $this->penyebut($nilai/1000) . " ribu" . $this->penyebut($nilai % 1000);
		} else if ($nilai < 1000000000) {
			$temp = $this->penyebut($nilai/1000000) . " juta" . $this->penyebut($nilai % 1000000);
		} else if ($nilai < 1000000000000) {
			$temp = $this->penyebut($nilai/1000000000) . " milyar" . $this->penyebut(fmod($nilai,1000000000));
		} else if ($nilai < 1000000000000000) {
			$temp = $this->penyebut($nilai/1000000000000) . " trilyun" . $this->penyebut(fmod($nilai,1000000000000));
		}     
		return $temp;
	}

	function terbilang($nilai) {
		if($nilai<0) {
			$hasil = "minus ". trim($this->penyebut($nilai));
		} else {
			$hasil = trim($this->penyebut($nilai));
		}     		
		return $hasil;
	}
}
