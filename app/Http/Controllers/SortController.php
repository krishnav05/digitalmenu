<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BusinessTobeRegistered;
use Illuminate\Support\Str;

class SortController extends Controller
{
    //
    public function sort($country,$slug,$sort)
    {	
    	//check for valid url
    	$ifexist = BusinessTobeRegistered::where(Str::lower('country_code'),Str::lower($country))->where(Str::lower('slug'),Str::lower($slug))->where('enable','1')->first();

    	if($ifexist == null)
    	{
    		return abort(404);
    	}
    	return redirect()->back()->with('message',$sort);
    }
}
