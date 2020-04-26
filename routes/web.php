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

//fixed with url
Route::get('/brand/{country}/{slug}','TableController@table');
//fixed with url
Route::get('/brand/{country}/{slug}/cover','CoverController@cover');
//fixed with url
Route::get('/brand/{country}/{slug}/itemmenu','CategoryController@category_names');
//leave it as it is
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();

    Route::get('manage','ManageAdminController@fetch')->middleware('admin.user');

    Route::get('activation_requests','ManageAdminController@activation_details_fetch')->middleware('admin.user');
});
//fixed with url
Route::get('/brand/{country}/{slug}/locale/{locale}','LocaleController@change_language');
//fixed with url
Route::get('/brand/{country}/{slug}/sort/{sort}','SortController@sort');
//fixed with url
Route::get('/brand/{country}/{slug}/fooditemdetail/{item_id}','FoodItemDetailController@details');
//fixed with url
Route::get('/brand/{country}/{slug}/kitchen','KitchenController@display');
//fixed with url
Route::post('/brand/{country}/{slug}/kitchen','KitchenController@update');
//fixed with url
Route::get('/brand/{country}/{slug}/billing','BillingController@total');
//fixed with url
Route::post('/brand/{country}/{slug}/billing','BillingController@change_items');

Route::get('/brand/{country}/{slug}/ordersentkitchen',function(){
	return view('ordersentkitchen');
});
//fixed with url
Route::post('/brand/{country}/{slug}/ordersentkitchen','OrderSentKitchen@checkpin');

Route::get('/brand/{country}/{slug}/selectoption',function(){
	return view('selectoption');
});
//fixed with url
Route::post('/brand/{country}/{slug}/selectoption','SelectOptionController@checkpin');
//fixed with url
Route::post('/brand/{country}/{slug}/generatebill','SelectOptionController@generate_check');
//fixed with url
Route::post('/brand/{country}/{slug}/bill-pin-check','SelectOptionController@check_bill_pin');
//unknown route , dont rember what this was used for
// Route::get('/brand/{country}/{slug}/addons','AddonsController@get');

//fixed with url
Route::post('/brand/{country}/{slug}/customize','KitchenController@customize');

Route::get('/brand/{country}/{slug}/feedback',function(){
	return view('feedback');
});

Route::get('/brand/{country}/{slug}/signature',function(){
	return view('signature');
});
Route::get('/brand/{country}/{slug}/billinganimation',function(){
	return view('billinganimation');
});
Route::get('/brand/{country}/{slug}/processingpayment',function(){
	return view('processingpayment');
});
Route::get('/brand/{country}/{slug}/paymentsuccessfull',function(){
	return view('paymentsuccessfull');
});
Route::get('/brand/{country}/{slug}/billcopy',function(){
	return view('billcopy');
});
Route::get('/brand/{country}/{slug}/thanksfeedback',function(){
	return view('thanksfeedback');
});
//fixed with url
Route::post('/brand/{country}/{slug}/saveimage', 'BillingController@save');
//fixed with url
Route::post('/brand/{country}/{slug}/sendmail','MailController@sendmail');
//no change needed
Route::get('register_business',function(){
	return view('register_business');
});
//no change needed
Route::post('upload_docs','UploadDocsController@upload');

//qr codes links
Route::get('/brand/{country}/{slug}/qrcode','QrcodeController@display');

Route::post('/brand/{country}/{slug}/alertnotification','KitchenController@notify');

Route::get('/brand/{country}/{slug}/notification','KitchenController@getnotifications');

Route::get('/brand/{country}/{slug}/offers-discounts',function(){
	return view('offers-discounts');
});