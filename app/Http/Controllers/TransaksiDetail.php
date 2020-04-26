<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
class TransaksiDetail extends Controller
{
    public function getTransaksiDetail(Request $request) {

        $id = substr($request->url(), 43 );
        $transaksiDetail = Transaction::with(['details','travel_package','user'])
                            ->where('id', $id)
                            ->get();
        return response()->json($transaksiDetail, 200);

    }
}
