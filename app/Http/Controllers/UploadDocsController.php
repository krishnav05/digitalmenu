<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\BusinessTobeRegistered;

class UploadDocsController extends Controller
{
    //
    public function upload(Request $request)
    {
    	if($request->validate([

    		'pan_pdf' => 'required|mimes:pdf|max:2048',
    		'gst_pdf' => 'required|mimes:pdf|max:2048',
    		'cin_pdf' => 'required|mimes:pdf|max:2048',
    	]))
    	{

    	}else{
    		return Redirect::back()->withErrors(['msg', 'The Message']);
    	}

    	$panName = 'pan'.time().'.'.$request->pan_pdf->extension();
    	$request->pan_pdf->move(public_path('uploads'), $panName);

    	$gstName = 'gst'.time().'.'.$request->gst_pdf->extension();
    	$request->gst_pdf->move(public_path('uploads'), $gstName);

    	$cinName = 'cin'.time().'.'.$request->cin_pdf->extension();
    	$request->cin_pdf->move(public_path('uploads'), $cinName);

        //generate slug for url , need to be unique
        $brand_slug = Str::slug($request->business_name,'-');
        $street_slug = Str::slug($request->street_address,'-');
        $unique_slug = $brand_slug.'-'.$street_slug;

    	$newbusiness = new BusinessTobeRegistered;
    	$newbusiness->business_name = $request->business_name;
    	$newbusiness->contact_person = $request->contact_person;
    	$newbusiness->contact_email = $request->contact_email;
    	$newbusiness->pan_number = $request->pan_number;
    	$newbusiness->pan_pdf = $panName;
    	$newbusiness->gst_number = $request->gst_number;
    	$newbusiness->gst_pdf = $gstName;
    	$newbusiness->cin_number = $request->cin_number;
    	$newbusiness->cin_pdf = $cinName;
    	$newbusiness->contact_number = $request->contact_number;
    	$newbusiness->city = $request->city;
    	$newbusiness->location_pincode = $request->location_pincode;
    	$newbusiness->country_code = $request->country_code;
        $newbusiness->street_address = $request->street_address;
        $newbusiness->slug = $unique_slug;
    	$newbusiness->save();
  		
    	return redirect()->back()->with('message', 'IT WORKS!');
    }
}
