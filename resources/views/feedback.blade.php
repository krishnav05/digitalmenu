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
  <body class="feedback-bg">
    
  <div class="container pt-5 mt-5">
    <div class="row pt-5 mt-5">
      
      <div id="carouselExampleSlidesOnly" class="carousel slide  col-sm-12" data-ride="carousel">
      <div class="carousel-inner">
        
        <div class="carousel-item active" data-interval="false">
          <h2 class=""> How did you like the Food? </h2>
          <a href="#" class="col-sm-4" id="excellent"> <img src="{{asset('assets/img/ic-excellent.svg')}}" class=""> </a>
          <a href="#" class="col-sm-4" id="good"> <img src="{{asset('assets/img/ic-good.svg')}}" class=""> </a>
          <a href="#" class="col-sm-4" id="bad_food"> <img src="{{asset('assets/img/ic-bad.svg')}}" class=""> </a>
        </div>
        
        <div class="carousel-item" data-interval="false">
          <h2 class="col-sm-12 "> Which Item did you not like? </h2>
          <a href="#" class="col-sm-12 item-not-like text-left align-items-center"> <img src="{{asset('assets/img/tikka.jpg')}}" class="item-not-like-pic"> Bahawalpur Ganne Ka Ras </a>
          <a href="#" class="col-sm-12 item-not-like text-left align-items-center"> <img src="{{asset('assets/img/tikka.jpg')}}" class="item-not-like-pic"> Paneer Tikka </a>
          <a href="#" class="col-sm-12 item-not-like text-left align-items-center"> <img src="{{asset('assets/img/tikka.jpg')}}" class="item-not-like-pic"> Steamed Rice </a>
        </div>
        
         <div class="carousel-item" data-interval="false">
          <h2 class="col-sm-12 "> How did you like the Service? </h2>
          <a href="#" class="col-sm-4"> <img src="{{asset('assets/img/ic-excellent.svg')}}" class=""> </a>
          <a href="#" class="col-sm-4"> <img src="{{asset('assets/img/ic-good.svg')}}" class=""> </a>
          <a href="#" class="col-sm-4"> <img src="{{asset('assets/img/ic-bad.svg')}}" class=""> </a>
        </div>

        <div class="carousel-item" data-interval="false">
          <h2 class="col-sm-12 "> How would you rate the staff behaviour? </h2>
          <a href="#" class="col-sm-4"> <img src="{{asset('assets/img/ic-cheerfully.svg')}}" class=""> </a>
          <a href="#" class="col-sm-4"> <img src="{{asset('assets/img/ic-barely.svg')}}" class=""> </a>
          <a href="#" class="col-sm-4"> <img src="{{asset('assets/img/ic-no-greet.svg')}}" class=""> </a>
        </div>
        
        <div class="carousel-item" data-interval="false">
          <h2 class="col-sm-12 "> How would you rate speed of service? </h2>
          <a href="#" class="col-sm-4"> <img src="{{asset('assets/img/ic-very-fast.svg')}}" class="mt-3"> </a>
          <a href="#" class="col-sm-4"> <img src="{{asset('assets/img/ic-fast.svg')}}" class="mt-3"> </a>
          <a href="#" class="col-sm-4"> <img src="{{asset('assets/img/ic-slow.svg')}}" class="mt-3"> </a>
        </div>
        
        <div class="carousel-item" data-interval="false">
          <h2 class="col-sm-12 "> How would you rate the cleanliness? </h2>
          <a href="#" class="col-sm-4"> <img src="{{asset('assets/img/ic-excellent.svg')}}" class=""> </a>
          <a href="#" class="col-sm-4"> <img src="{{asset('assets/img/ic-good.svg')}}" class=""> </a>
          <a href="#" class="col-sm-4"> <img src="{{asset('assets/img/ic-bad.svg')}}" class=""> </a>
        </div>

        <div class="carousel-item" data-interval="false">
          <h2 class="col-sm-12 "> How was your overall dining experience? </h2>
          <a href="#" class="col-sm-4"> <img src="{{asset('assets/img/ic-excellent.svg')}}" class=""> </a>
          <a href="#" class="col-sm-4"> <img src="{{asset('assets/img/ic-good.svg')}}" class=""> </a>
          <a href="#" class="col-sm-4"> <img src="{{asset('assets/img/ic-bad.svg')}}" class=""> </a>
        </div>

        <div class="carousel-item" data-interval="false">
          <img src="{{asset('assets/img/ic-gray-smile.svg')}}">
          <h2 class="col-sm-12 mt-5"> Thank You<br>for your invaluable feedback! </h2>
        </div> 
      
      </div>
    </div>


    </div>
  </div>
  <div class="container fixed-bottom">
    <div class="row">
      <div class="col-sm-12 text-center">
        <img src="{{asset('assets/img/ic-feedback-hotels.svg')}}">
      </div>
    </div>
    <div class="row">
      <div class="col-sm-12 text-center cutom-exp-p mt-3">
        CUSTOMER EXPERIENCE PORTAL
      </div>
    </div>
  </div>

   

    

              


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
   <!--  <script type="text/javascript" src="assets/js/custom-menu.js"></script> -->
    <script type="text/javascript">
      $(document).ready(function(){
          //alert('foo');
          $('#carouselExampleSlidesOnly').carousel({interval: false}); 
          
          $(".carousel-item a").click(function(){
          		if(this.id == "bad_food"){
          		              $("#carouselExampleSlidesOnly").carousel('next');
          		          }
          		          else if(this.id == 'good' || this.id == 'excellent'){
          		          	$(this).parent('div').next('div').remove();
          		          	$("#carouselExampleSlidesOnly").carousel('next');
          		          }
          		          else{
          		          	$("#carouselExampleSlidesOnly").carousel('next');
          		          }
          });

      });
    </script>   
 
  </body>
</html>