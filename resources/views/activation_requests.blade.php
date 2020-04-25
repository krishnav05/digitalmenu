@extends('voyager::master')


@section('content')
	
	<div>
		<center><h2>Businesses To Be Activated</h2></center>
		@foreach($business_details as $key)
		Business Name 	:{{$key->business_name}}<br>
		Contact Person 	:{{$key->contact_person}}<br>
		Contact Number	:{{$key->contact_number}}<br>
		Contact Email	:{{$key->contact_email}}<br>
		PAN Number		:{{$key->pan_number}}<br>
		PAN Document	:{{$key->pan_pdf}}<br>
		GST Number		:{{$key->gst_number}}<br>
		GST Document	:{{$key->gst_pdf}}<br>
		CIN Number		:{{$key->cin_number}}<br>
		CIN Document	:{{$key->cin_pdf}}<br>
		City			:{{$key->city}}<br>
		Country Code 	:{{$key->country_code}}<br>
		Pin Code 		:{{$key->location_pincode}}<br>

		STATUS:Disabled
		<button>enable</button><button>disable</button><br>
		@endforeach
	</div>

@endsection