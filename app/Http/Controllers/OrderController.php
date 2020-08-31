<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\order;
use Illuminate\Support\Facades\Validator;


class OrderController extends Controller
{
    public function show()
    {
        $data_order = Order::join('produk', 'produk.id_produk', 'order.id_produk')
                            ->join('customers', 'customers.id_customers', 'order.id_customers')->get();
                            return Response()->json($data_order);
    }
    public function detail($id)
    {
        if(Order::where('id', $id)->exists()) {
            $data_order = Order::join('produk', 'produk.id_produk', 'order.id_produk')
            ->join('customers', 'customers.id_customers', 'order.id_customers')
            ->where('id_order', '=', $id)
            ->get();
        }
    }
    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),
        [
            'id_order' => 'required',
            'id_customers' => 'required',
            'id_produk' => 'required',
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
            'id_produk' => $request -> id_produk,
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
