<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BusinessTobeRegistered;

class ManageAdminController extends Controller
{
    //
    public function fetch()
    {
    	$businesses_not_registered = BusinessTobeRegistered::where('enable','0')->count();

    	return view('manage',['businesses_not_registered' => $businesses_not_registered]);
    }

    public function activation_details_fetch()
    {	
    	$business_details = BusinessTobeRegistered::where('enable','0')->get();
    	
    	return view('activation_requests',['business_details' => $business_details]);
    }
}
