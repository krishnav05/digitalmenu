<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ItemDetailPage;
use App\CategoryItem;
use App\Category;
use App\ItemDetail;
use App\ItemAddon;
use Session;
use App\Kitchen;
use DB;
use App\BusinessTobeRegistered;
use Illuminate\Support\Str;


class FoodItemDetailController extends Controller
{
    //

    public function details($country,$slug,$item_id)
    {	
        //check for valid url
        $ifexist = BusinessTobeRegistered::where(Str::lower('country_code'),Str::lower($country))->where(Str::lower('slug'),Str::lower($slug))->where('enable','1')->first();

        if($ifexist == null)
        {
            return abort(404);
        }
        //show tables belonging to the restraunt
        $business_id = BusinessTobeRegistered::where(Str::lower('country_code'),Str::lower($country))->where(Str::lower('slug'),Str::lower($slug))->where('enable','1')->pluck('id');

    	$item_detail = ItemDetailPage::where('business_id',$business_id[0])->where('item_id',$item_id)->get();

    	$category_items = CategoryItem::where('business_id',$business_id[0])->where('item_id',$item_id)->get();
    	$get_category_id = CategoryItem::where('business_id',$business_id[0])->where('item_id',$item_id)->pluck('category_id');
    	$category_name = Category::where('business_id',$business_id[0])->where('category_id',$get_category_id[0])->pluck('category_name');
    	$category_names = Category::where('business_id',$business_id[0])->get();
    	$item_details = ItemDetail::where('business_id',$business_id[0])->get();
    	$item_addons = ItemAddon::where('business_id',$business_id[0])->get();
    	$table_number = Session::get('table');
    	$kitchen_status = Kitchen::where('business_id',$business_id[0])->where('table_number',$table_number)->where('confirm_status',null)->get();
    	foreach ($category_items as $key) {
				# code...
    		$key['item_quantity'] = '';
    		foreach ($kitchen_status as $keys) {
					# code...
    			if ($key['item_id'] == $keys['item_id']) {
						# code...
    				$key['item_quantity'] = $keys['item_quantity'];
    			}
    		}

    	}
    	$flag = 0;
    	$prev_item = null;
    	$next_item = null;
    	$findids = CategoryItem::where('business_id',$business_id[0])->get();
    	foreach ($findids as $key) {
    		# code...
    		if($key['item_id'] == $item_id){
    			$flag = 1;
    			continue;
    		}
    		if($flag == 1){
    			$next_item = $key;
    			break;
    		}
    	}
    	foreach ($findids as $key) {
    		# code...
    		if($key['item_id'] == $item_id){
    			break;
    		}
    		else{
    			$prev_item = $key;
    		}
    	}


    	$total_items = DB::table("kitchen")->where('business_id',$business_id[0])->where("table_number","=",$table_number)->where('confirm_status',null)->get()->sum("item_quantity");


    	return view('/fooditemdetail',['item_detail' => $item_detail,'category_names'	=> $category_names,'category_name'	=> $category_name, 'category_items' => $category_items, 'item_details' => $item_details, 'item_addons' => $item_addons,'kitchen_status' => $kitchen_status,'total_items' => $total_items,'prev_item' => $prev_item, 'next_item' => $next_item]);
    }
}
