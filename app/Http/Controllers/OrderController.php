<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\order;
use Illuminate\Support\Facades\Validator;


class OrderController extends Controller
{
    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),
        [
            'id_order' => 'required',
            'id_customers' => 'required',
            'kode_barang' => 'required',
            'tgl_pesan' => 'required',
            'jumlah_pesanan' => 'required'
        ]
        );
        
        if($validator->fails()) {
            return Response()->json($validator->errors());
        }

        $simpan = Order::create([
            'id_order' => $request -> id_order,
            'id_customers' => $request -> id_customers,
            'kode_barang' => $request -> kode_barang,
            'tgl_pesan' => $request -> tgl_pesan,
            'jumlah_pesanan' => $request -> jumlah_pesanan
        ]);

        if($simpan) {
            return Response()->json(['status=>1']);
        }
        else {
            return Response()->json(['status=>0']);
        }
    }
}
