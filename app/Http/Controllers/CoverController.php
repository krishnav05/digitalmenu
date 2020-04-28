<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BusinessTobeRegistered;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Input;
use Session;


class CoverController extends Controller
{
    //
    public function cover($country,$slug,Request $request){
    	//check for valid url
    	$ifexist = BusinessTobeRegistered::where(Str::lower('country_code'),Str::lower($country))->where(Str::lower('slug'),Str::lower($slug))->where('enable','1')->first();

    	if($ifexist == null)
    	{
    		return abort(404);
    	}
        if ($request->has('q')) {
    //
            Session::put('table', $request->input('q'));
            Session::put('qrc','1');
}

    	return view('cover');
    }
}
