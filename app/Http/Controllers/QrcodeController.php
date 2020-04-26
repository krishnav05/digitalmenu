<?php

namespace App\Http\Controllers;
use App\DiningTable;
use App\BusinessTobeRegistered;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

class QrcodeController extends Controller
{
    //
    public function display($country,$slug)
    {	
    	//check for valid url
    	$ifexist = BusinessTobeRegistered::where(Str::lower('country_code'),Str::lower($country))->where(Str::lower('slug'),Str::lower($slug))->where('enable','1')->first();

    	if($ifexist == null)
    	{
    		return abort(404);
    	}
    	//show tables belonging to the restraunt
    	$business_id = BusinessTobeRegistered::where(Str::lower('country_code'),Str::lower($country))->where(Str::lower('slug'),Str::lower($slug))->where('enable','1')->pluck('id');

    	$total_tables = DiningTable::where('business_id',$business_id[0])->get();

    	return view('qr_code',['total_tables' => $total_tables]);
    }
}
