<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\produk;
use Illuminate\Support\Facades\Validator;


class ProdukController extends Controller
{
    public function show()
    {
        return Produk::all();
    }
    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),
        [
            'id_produk' => 'required',
            'nama_produk' => 'required',
            'harga' => 'required'
        ]
        );

        if($validator->fails()) {
            return Response()->json($validator->error());
        }

        $simpan = Produk::create([
            'id_produk' => $request -> id_produk,
            'nama_produk' => $request -> nama_produk,
            'harga' => $request -> harga
        ]);

        if($simpan) {
            return Response()->json(['status=>1']);
        }
        else {
            return Response()->json(['status=>0']);
        }
    }
}
