<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\BusinessTobeRegistered;
use Illuminate\Support\Str;

class LocaleController extends Controller
{
    //
    public function change_language($country,$slug,$locale){

    	//check for valid url
    	$ifexist = BusinessTobeRegistered::where(Str::lower('country_code'),Str::lower($country))->where(Str::lower('slug'),Str::lower($slug))->where('enable','1')->first();

    	if($ifexist == null)
    	{
    		return abort(404);
    	}
    	Session::put('locale', $locale);
    	return redirect()->back();
    }
}
