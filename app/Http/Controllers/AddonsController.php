<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddonsController extends Controller
{
    //
    public function get(Request $request)
    {
    	return response()->json(['response' => 'This is get method']);	
    }
}
