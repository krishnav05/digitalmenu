<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HelperTableManager;
use Session;
use App\Kitchen;
use App\BusinessTobeRegistered;
use Illuminate\Support\Str;

class OrderSentKitchen extends Controller
{   
    //
    public function checkpin($country,$slug,Request $request)
    {   
        //check for valid url
        $ifexist = BusinessTobeRegistered::where(Str::lower('country_code'),Str::lower($country))->where(Str::lower('slug'),Str::lower($slug))->where('enable','1')->first();

        if($ifexist == null)
        {
            return abort(404);
        }

        $data = $request->totaldata;
    	$pin = $data['pin1'].$data['pin2'].$data['pin3'].$data['pin4'];
    	$table_number = Session::get('table');

        $business_id = BusinessTobeRegistered::where(Str::lower('country_code'),Str::lower($country))->where(Str::lower('slug'),Str::lower($slug))->where('enable','1')->pluck('id');

        $ifexist = HelperTableManager::where('business_id',$business_id[0])->where('helper_code',$pin)->where('table_number',$table_number)->first();
        if($ifexist == null)
            {
                // return redirect()->back()->with('error','wrong pin');
                return response()->json(['status'=>'wrong pin','message'=>'You have entered wrong pin']);
            }
            else
                { 
                Kitchen::where('business_id',$business_id[0])->where('table_number',$table_number)->update(['confirm_status' => 'yes']);
            // return view('ordersentkitchen');
                return response()->json(['status'=>'success','url'=>'ordersentkitchen']);
        }
    }
}
