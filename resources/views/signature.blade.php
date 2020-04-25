<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="noindex, nofollow" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/menu-style.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Oxygen|Playfair+Display&display=swap" rel="stylesheet"> 
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('assets/img/apple-touch-icon-ipad-retina-display.png') }}" /> 
    <title>Digital Menu</title>
    <style>
    .body,
.wrapper {
  /* Break the flow */
  position: absolute;
  top: 0px;

  /* Give them all the available space */
  width: 100%;
  height: 100%;

  /* Remove the margins if any */
  margin: 0;

  /* Allow them to scroll down the document */
  overflow-y: hidden;
}

.body {
  /* Sending body at the bottom of the stack */
  z-index: 1;
}

.wrapper {
  /* Making the wrapper stack above the body */
  z-index: 2;
}
</style>
  </head>
  <body class="body">
    <div class="wrapper">
  <div class="container">
    <div class="row mt-5">
       <h4 class="col-sm-12 mt-5 touch-sign"> Touch the screen with index finger to sign </h4>
    </div>
    <div class="row mt-5">
      <div class="col-sm-1"></div>
      <div class="col-sm-10 mr-auto touch-sign-area">
        <canvas id="sig-canvas" width="600" height="600">
          Get a better browser, bro.
        </canvas>
      </div>
      <div class="col-sm-1"></div>
    </div>
    <div class="row d-none">
      <div class="col-md-12">
        <button class="btn btn-primary" id="sig-submitBtn">Submit Signature</button>
        <button class="btn btn-default" id="sig-clearBtn">Clear Signature</button>
      </div>
    </div>
    <div class="row d-none">
      <div class="col-md-12">
        <textarea id="sig-dataUrl" class="form-control" rows="5">Data URL for your signature will go here!</textarea>
      </div>
    </div>
    <div class="row d-none">
      <div class="col-md-12">
        <img id="sig-image" src="" alt="Your signature will go here!"/>
      </div>
    </div>
    <div class="row fixed-bottom mb-5">
      <div class="col-sm-12 text-center">
          <input type="submit" name="" value="CONFIRM SIGNATURE" class="btn btn-primary col-sm-10 mr-auto" onclick="window.location = 'processingpayment';">
      </div>
    </div>
  </div>
   
</div>
    

              


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
   
    <script src="{{ asset('assets/js/signature.js') }}"></script>
  </body>
</html>