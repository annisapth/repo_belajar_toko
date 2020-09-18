<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customers;
use Illuminate\Support\Facades\Validator;


class CustomersController extends Controller
{ 
    public function destroy ($id) {
        $hapus = Customers::where('id_customers', $id)->delete();
        if($hapus) {
            return Response()->json(['status' => 1]);
        }
        else {
            return Response()->json(['status' => 0]);
        }
    }
    public function show()
    {
        return Customers::all();
    }
    public function store(Request $request)
    {
        $validator=Validator::make($request->all(),
        [
            'id_customers' => 'required',
            'nama_customers' => 'required',
            'alamat_customers' => 'required',
            'gender' => 'required'
        ]
        );
        
        if($validator->fails()) {
            return Response()->json($validator->error());
        }

        $simpan = Customers::create([
            'id_customers' => $request -> id_customers,
            'nama_customers' => $request -> nama_customers,
            'alamat_customers' => $request -> alamat_customers,
            'gender' => $request -> gender
        ]);

        if($simpan) {
            return Response()->json(['status=>1']);
        }
        else {
            return Response()->json(['status=>0']);
        }
    }
}
