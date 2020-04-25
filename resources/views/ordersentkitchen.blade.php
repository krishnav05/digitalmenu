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
  </head>
  <body class="order-sent-kitchen">
    
    <div class="row kitchen-inbox">
      <div class="col-sm-6 m-auto sent-to-kitchen text-center p-5 ">
        <div id="kitchen-ani"></div>
        <h1 class="mt-2"> The order has been sent to kitchen! </h1>
      </div>
    </div>
    <div class="row mt-3">
      <div class="col-sm-6 m-auto sent-to-kitchen text-center p-3">
        <div class="row">
          <div class="col-sm-6">
          <a href="itemmenu"> <img src="{{asset('assets/img/ic-kitchen-back.svg')}}"> </a>
        </div>
        <div class="col-sm-6">
          <a href="./"> <img src="{{asset('assets/img/ic-start-page.svg')}}"> </a>
        </div>
        </div>
      </div>
    </div>



  


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{ asset('assets/js/custom-menu.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/lottie.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/data.js') }}"></script>
    
  </body>
</html>