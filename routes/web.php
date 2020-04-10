<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// old routes

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/','CategoryController@category_names');


Route::get('/','TableController@table');

Route::get('cover','CoverController@cover');

Route::get('itemmenu','CategoryController@category_names');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();

    Route::get('uploaditems', function(){
      return view('upload_items');
    })->middleware('admin.user');
});

Route::get('locale/{locale}', function ($locale){
    Session::put('locale', $locale);
    return redirect()->back();
});

Route::get('sort/{sort}',function($sort){
	return redirect()->back()->with('message',$sort);
});

Route::get('fooditemdetail/{item_id}','FoodItemDetailController@details');

Route::get('kitchen','KitchenController@display');

Route::post('kitchen','KitchenController@update');

Route::get('billing','BillingController@total');

Route::post('billing','BillingController@change_items');

Route::get('ordersentkitchen',function(){
	return view('ordersentkitchen');
});

Route::post('ordersentkitchen','OrderSentKitchen@checkpin');

Route::get('selectoption',function(){
	return view('selectoption');
});

Route::post('selectoption','SelectOptionController@checkpin');

Route::post('generatebill','SelectOptionController@generate_check');

Route::post('bill-pin-check','SelectOptionController@check_bill_pin');

Route::get('addons','AddonsController@get');

// customize routes
Route::post('customize','KitchenController@customize');

Route::get('feedback',function(){
	return view('feedback');
});

Route::get('signature',function(){
	return view('signature');
});
Route::get('billinganimation',function(){
	return view('billinganimation');
});
Route::get('processingpayment',function(){
	return view('processingpayment');
});
Route::get('paymentsuccessfull',function(){
	return view('paymentsuccessfull');
});
Route::get('billcopy',function(){
	return view('billcopy');
});
Route::get('thanksfeedback',function(){
	return view('thanksfeedback');
});

Route::post('saveimage', 'BillingController@save');

Route::post('sendmail','MailController@sendmail');

