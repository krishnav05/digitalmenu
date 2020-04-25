<!DOCTYPE html>
<html>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="robots" content="noindex, nofollow" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Oxygen|Playfair+Display&display=swap" rel="stylesheet"> 
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('assets/img/apple-touch-icon-ipad-retina-display.png') }}" /> 
    <title>Digital Menu</title>
  </head>
<body>
	<br>
	<br>
  @if($errors->any())
  <h4>{{$errors->first()}}</h4>
  @endif
  @if(session()->has('message'))
  <div class="alert alert-success">
    {{ session()->get('message') }}
  </div>
  @endif
    <h2><center>Submit Your Business Details</center></h2>
    <br>
    <form action="upload_docs" method="POST" enctype="multipart/form-data">
      @csrf
      <label for="">Business Name</label>
      <input type="text" id="business_name" name="business_name"><br>

      <label for="">Contact Person</label>
      <input type="text" id="contact_person" name="contact_person"><br>

      <label for="">Contact Number</label>
      <input type="text" id="contact_number" name="contact_number"><br>

      <label for="">Contact Email</label>
      <input type="text" id="contact_email" name="contact_email"><br>

      <label for="">PAN Number</label>
      <input type="text" id="pan_number" name="pan_number">
      <label for="">Upload scanned PAN Card (pdf, Max size 2 MB):</label>
      <input type="file" id="pan_pdf" name="pan_pdf"><br> 

      <label for="">GST Number</label>
      <input type="text" id="gst_number" name="gst_number">
      <label for="myfile">Upload scanned GST Document (pdf, Max size 2 MB):</label>
      <input type="file" id="gst_pdf" name="gst_pdf"><br> 

      <label for="">CIN</label>
      <input type="text" id="cin_number" name="cin_number">
      <label for="myfile">Upload scanned CIN Document (pdf, Max size 2 MB):</label>
      <input type="file" id="cin_pdf" name="cin_pdf"><br> 

      <label for="">Street Address</label>
      <input type="text" id="street_address" name="street_address"><br>

      <label for="">City</label>
      <input type="text" id="city" name="city"><br>

      <label for="">Country Code</label>
      <input type="text" id="country_code" name="country_code"><br>

      <label for="">Pin Code</label>
      <input type="text" id="location_pincode" name="location_pincode"><br>

      <br>
      <center>
      <input type="submit" value="Submit">
      </center>
    </form>

</body>
</html>