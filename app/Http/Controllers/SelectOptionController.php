<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper;
use App\HelperTableManager;
use Session;
use App\DiningTable;
use App\BusinessTobeRegistered;
use Illuminate\Support\Str;

class SelectOptionController extends Controller
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

        $business_id = BusinessTobeRegistered::where(Str::lower('country_code'),Str::lower($country))->where(Str::lower('slug'),Str::lower($slug))->where('enable','1')->pluck('id');

        if ($data['status'] == 'Occupied')
        {
            $pin = $data['pin1'].$data['pin2'].$data['pin3'].$data['pin4'];
            $ifexist = Helper::where('helper_code',$pin)->where('business_id',$business_id[0])->first();
            if($ifexist == null)
            {
                // return redirect()->back()->with('error','wrong pin');
                return response()->json(['status'=>'wrong pin','message'=>'You have entered wrong pin']);
            }
            else
                {   $tablemanager = new HelperTableManager;
                    $tablemanager->helper_code = $pin;
                    $tablemanager->table_number = $data['tableId'];
                    $tablemanager->business_id = $business_id[0];
                    $tablemanager->save();

                    Session::put('table', $data['tableId']);

            // return view('selectoption');
                    return response()->json(['status'=>'success','url'=>'selectoption']);
        } 
        }
        else
        {
            $pin = $data['pin1'].$data['pin2'].$data['pin3'].$data['pin4'];
            $ifexist = Helper::where('helper_code',$pin)->where('business_id',$business_id[0])->first();
            if($ifexist == null)
            {
                return response()->json(['status'=>'wrong pin','message'=>'You have entered wrong pin']);
            }
            else
                {   $tablemanager = new HelperTableManager;
                    $tablemanager->helper_code = $pin;
                    $tablemanager->table_number = $data['tableId'];
                    $tablemanager->business_id = $business_id[0];
                    $tablemanager->save();

                    Session::put('table', $data['tableId']);
                    DiningTable::where('business_id',$business_id[0])->where('table_no',$data['tableId'])->update(array('table_status' => 'Occupied' ));
            return response()->json(['status'=>'success','url'=>'cover']);
        } 
            
        }
    	
    }

    public function generate_check($country,$slug,Request $request)
    {   
        //check for valid url
        $ifexist = BusinessTobeRegistered::where(Str::lower('country_code'),Str::lower($country))->where(Str::lower('slug'),Str::lower($slug))->where('enable','1')->first();

        if($ifexist == null)
        {
            return abort(404);
        }

        $business_id = BusinessTobeRegistered::where(Str::lower('country_code'),Str::lower($country))->where(Str::lower('slug'),Str::lower($slug))->where('enable','1')->pluck('id');
        $data = $request->totaldata;
        $pin = $data['pin1'].$data['pin2'].$data['pin3'].$data['pin4'];
        $table_number = Session::get('table');
        $ifexist = HelperTableManager::where('business_id',$business_id[0])->where('helper_code',$pin)->where('table_number',$table_number)->first();
        if($ifexist == null)
            {
                // return redirect()->back()->with('error','wrong pin');
                return response()->json(['status'=>'wrong pin','message'=>'You have entered wrong pin']);
            }
            else
                { 
            // return redirect('billinganimation');
                    return response()->json(['status'=>'success','url'=>'billinganimation']);
        }
    }

    public function check_bill_pin($country,$slug,Request $request)
    {   
        //check for valid url
        $ifexist = BusinessTobeRegistered::where(Str::lower('country_code'),Str::lower($country))->where(Str::lower('slug'),Str::lower($slug))->where('enable','1')->first();

        if($ifexist == null)
        {
            return abort(404);
        }
        
        $business_id = BusinessTobeRegistered::where(Str::lower('country_code'),Str::lower($country))->where(Str::lower('slug'),Str::lower($slug))->where('enable','1')->pluck('id');

        $pin = $request->totaldata['pin1'].$request->totaldata['pin2'].$request->totaldata['pin3'].$request->totaldata['pin4'];
        $table_number = Session::get('table');
        $ifexist = HelperTableManager::where('business_id',$business_id[0])->where('helper_code',$pin)->where('table_number',$table_number)->first();
        if($ifexist == null)
        {
            return response()->json(['pin_status'=>'wrong pin','message'=>'You have entered wrong pin']);
        }
        else
        { 
            $response = array(
                'pin_status' => 'correct',
            );
            return response()->json($response);
        }
    }
}
