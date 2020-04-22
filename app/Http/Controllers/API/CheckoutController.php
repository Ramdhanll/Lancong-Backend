<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\TravelPackage;
use App\Transaction;
use App\TransactionDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Carbon;



class CheckoutController extends Controller
{
    public function checkout_process (Request $request, $token) {
    	$id = $request->id;
		$response = Http::withHeaders([
							    'Authorization' => 'Bearer ' . $token,
							])->get('http://api.lancong.test/api/user');

		$user = $response->json();
		$travel_packages = TravelPackage::findOrFail($request->id);
		// return $travel_packages;
		foreach ($travel_packages as $value) {
			$price = $value->price;
		}

		// return $price;

		$transaction    = Transaction::create([
            'travel_packages_id'    => (int)$id,
            'users_id'              => $user['id'],
            'additional_visa'       => 0,
            'transaction_total'     => $price,
            'transaction_status'    => 'IN_CART'
        ]);

        TransactionDetail::create([
            'transactions_id'   => $transaction->id,
            'username'          => $user['name'],
            'nationality'       => 'IND',
            'is_visa'           =>  false,
            'doe_passport'      =>  Carbon::now()->addYears(5)
        ]);

        return response()->json('Successfully', 200);

    	// return $travel_packages;

    }
}
