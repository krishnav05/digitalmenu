<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Kitchen;
use App\KitchenCustomize;
use App\CategoryItem;
use App\KitchenItemAddon;
use DB;
use App\BusinessTobeRegistered;
use Illuminate\Support\Str;

class BillingController extends Controller
{
    //
    public function total($country,$slug)
    {	
        //check for valid url
        $ifexist = BusinessTobeRegistered::where(Str::lower('country_code'),Str::lower($country))->where(Str::lower('slug'),Str::lower($slug))->where('enable','1')->first();

        if($ifexist == null)
        {
            return abort(404);
        }
        //show tables belonging to the restraunt
        $business_id = BusinessTobeRegistered::where(Str::lower('country_code'),Str::lower($country))->where(Str::lower('slug'),Str::lower($slug))->where('enable','1')->pluck('id');

    	$value = Session::get('table');
    	$kitchen = Kitchen::all()->where('business_id',$business_id[0])->where('table_number',$value);
        $kitchen_customize = KitchenCustomize::where('business_id',$business_id[0])->get();
    	$kitchen_addons = KitchenItemAddon::where('business_id',$business_id[0])->get();
    	$category_items = CategoryItem::where('business_id',$business_id[0])->get();
        $kitchen_total = 0;
        $gst = 0;
        $service_charge = 60;

        foreach ($kitchen as $key) {
            foreach ($category_items as $value) {
                if($key['item_id'] == $value['item_id']){
                    $kitchen_total += ($key['item_quantity'] * $value['item_price']);    
                }
            }
        }
        $gst = $kitchen_total*0.18;
        $total_bill = $kitchen_total + $gst + $service_charge; 
        if($kitchen_total == 0){
            $service_charge = 0;
            $total_bill = 0;
        }

    	return view('billing',['kitchen' => $kitchen, 'kitchen_addons' => $kitchen_addons, 'category_items' => $category_items,'kitchen_customize' => $kitchen_customize,'kitchen_total' => $kitchen_total,'gst' => $gst,'service_charge' => $service_charge,'total_bill' => $total_bill]);
    }

    public function change_items($country,$slug,Request $request)
    {	
        //check for valid url
        $ifexist = BusinessTobeRegistered::where(Str::lower('country_code'),Str::lower($country))->where(Str::lower('slug'),Str::lower($slug))->where('enable','1')->first();

        if($ifexist == null)
        {
            return abort(404);
        }
        //show tables belonging to the restraunt
        $business_id = BusinessTobeRegistered::where(Str::lower('country_code'),Str::lower($country))->where(Str::lower('slug'),Str::lower($slug))->where('enable','1')->pluck('id');


        $value = Session::get('table');
    	if($request->action == 'deleteitem')
    	{   $select_id = KitchenCustomize::where('business_id',$business_id[0])->where('id',$request->id)->pluck('order_id');
            KitchenCustomize::where('business_id',$business_id[0])->where('id',$request->id)->delete();
            KitchenItemAddon::where('business_id',$business_id[0])->where('order_id',$request->id)->delete();
            $sum = DB::table('kitchen_customize')->where('business_id',$business_id[0])->where('order_id',$select_id[0])->get()->sum('quantity');
            DB::table('kitchen')->where('business_id',$business_id[0])->where('id',$select_id[0])->update(['item_quantity' => $sum]);
            $check_main_item = Kitchen::where('business_id',$business_id[0])->where('table_number',$value)->where('id',$select_id[0])->pluck('item_quantity');
            if($check_main_item[0] == 0){
                DB::table('kitchen')->where('business_id',$business_id[0])->where('id',$select_id[0])->delete();
            }

            //update prices
            $kitchen = Kitchen::all()->where('business_id',$business_id[0])->where('table_number',$value);
            $category_items = CategoryItem::where('business_id',$business_id[0])->get();
            $kitchen_total = 0;
            $gst = 0;
            $service_charge = 60;
            foreach ($kitchen as $key) {
                foreach ($category_items as $value) {
                    if($key['item_id'] == $value['item_id']){
                    $kitchen_total += ($key['item_quantity'] * $value['item_price']);    
                    }
                }
            }
            $gst = $kitchen_total*0.18;
            $total_bill = $kitchen_total + $gst + $service_charge;
            if($kitchen_total == 0){
                $gst = 0;
                $service_charge = 0;
                $total_bill = 0;
            }

    	}
    	$response = array(
        'delete_status' => 'success',
        'gst' => $gst,
        'service_charge' => $service_charge,
        'kitchen_total' => $kitchen_total,
        'total_bill' => $total_bill,
      	);
      	return response()->json($response);
    }

    public function save($country,$slug,Request $request){

        //check for valid url
        $ifexist = BusinessTobeRegistered::where(Str::lower('country_code'),Str::lower($country))->where(Str::lower('slug'),Str::lower($slug))->where('enable','1')->first();

        if($ifexist == null)
        {
            return abort(404);
        }
        //show tables belonging to the restraunt
        $business_id = BusinessTobeRegistered::where(Str::lower('country_code'),Str::lower($country))->where(Str::lower('slug'),Str::lower($slug))->where('enable','1')->pluck('id');
        
    $value = Session::get('table');   
    $data = $request->base64data;
    $image = explode('base64', $data);
    file_put_contents($value.'.jpg', base64_decode($image[1]));
    $response = array(
        'status' => 'success',
        );
        return response()->json($response);
}
}
