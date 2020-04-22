<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\TravelPackage;
class DetailController extends Controller
{
    public function getDetail(Request $request, $slug) {
    	$item = TravelPackage::with(['galleries'])
    			-> where('slug',$slug)
    			->firstOrFail();

    	return response()->json($item, 200);
    	
    }
}
