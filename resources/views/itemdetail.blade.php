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
  <body>
    

   <div class="container">
       <div class="row pt-4">
            <div class="col-sm-6 text-left">
                <a href="#" class="next-prev-menu-item"> 
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                  <g id="ic_left-carrot" transform="translate(67 1099) rotate(180)">
                    <g id="Rectangle_105" data-name="Rectangle 105" transform="translate(51 1083)" fill="#fff" stroke="#A8A596" stroke-width="1" opacity="0">
                      <rect width="16" height="16" stroke="none"/>
                      <rect x="0.5" y="0.5" width="15" height="15" fill="none"/>
                    </g>
                    <path id="Path_2760" data-name="Path 2760" d="M-836.148,11088.659l6.072,6.071-6.072,6.072" transform="translate(892.648 -10004.159)" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
                  </g>
                </svg>
                Aap Ki Khidmat Mein
              </a>
            </div>
          <div class="col-sm-6 text-right">
                <a href="" class="next-prev-menu-item">Panner Tikka 
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                    <g id="ic_right-carrot" transform="translate(-51 -1083)">
                      <g id="Rectangle_105" data-name="Rectangle 105" transform="translate(51 1083)" fill="#fff" stroke="#A8A596" stroke-width="1" opacity="0">
                        <rect width="16" height="16" stroke="none"/>
                        <rect x="0.5" y="0.5" width="15" height="15" fill="none"/>
                      </g>
                      <path id="Path_2760" data-name="Path 2760" d="M-836.148,11088.659l6.072,6.071-6.072,6.072" transform="translate(892.648 -10004.159)" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
                    </g>
                  </svg>
                </a>
          </div>
          
       </div>
       <div class="row mt-4">
          <div class="col-sm-10">
            <h1 class="pt-0"> Paneer Tikka </h1>
            <h5 class="small detail-page-tags"> North Indian | Snacks </h5>
          </div>
          <div class="col-sm-2">
               <button type="button" class="btn btn-outline-primary add-item-btn btn-sm w-auto mt-2"> <img src="{{asset('assets/img/ic-plus.svg')}}" class="d-inline"> ADD</button>
                  <div class="input-group mt-2">
                     
                          <button class="btn btn-light btn-sm float-left" id="minus-btn"><img src="{{asset('assets/img/ic-minus.svg')}}" class="d-inline"></button>
                      
                          <input type="number" id="qty_input" class="add-plus-min float-left" value="0" min="0">
                      
                          <button class="btn btn-light btn-sm float-left" id="plus-btn"><img src="{{asset('assets/img/ic-plus.svg')}}" class="d-inline"></button>
                      
                  </div>
          </div>
       </div>
       <div class="row mt-3">
         <div class="col-sm-12 hero">
           <img src="{{asset('assets/img/menu-item-detail-pic.jpg')}}" class="img-fluid" alt="Detial Picture">
         </div>
       </div>
   </div>
   <div class="container-fluid detail-hilights-bd mb-5 pb-5">
     <div class="container">
        <div class="row mt-5 detail-hilights">
         <div class="col-sm-3">
           <h1> 
            <span class="col-sm-12 biggest"> 338 </span>
            <span class="col-sm-12 calories"> Calories </span>
           </h1>
         </div>
         <div class="col-sm-3">
           <h1>
             <span class="col-sm-12 medium">Gluten Free </span>
             <span class="col-sm-12 small"> High Fibre, Protein </span>
           </h1>
         </div>
         <div class="col-sm-3">
           <h1>
             <span class="col-sm-12 medium"> Low Carbs </span>
             <span class="col-sm-12 small"> Low Fat and Sugar </span>
           </h1>
         </div>
         <div class="col-sm-3">
           <h3 class="p-2 prep-box">
             <div class="col-sm-12"> <img src="{{asset('assets/img/prep-time.svg')}}"> </div>
             <span class="col-sm-12"> Time of Prepration </span>
             <span class="col-sm-12 prep-time"> 34 </span>
           </h3>
         </div>
       </div>
     </div>
   </div>

   <div class="container-fluid ingredients-box mb-5 pb-5">
      <div class="container ingredients-items">
        <h2> Ingredients </h2>
        <div class="row">
            <div class="col">
              <img src="{{asset('assets/img/ic-ginger.svg')}}"> <br>
              Ginger
            </div>
            <div class="col">
              <img src="{{asset('assets/img/ic-chilli.svg')}}"> <br>
              Chilli
            </div>
            <div class="col">
              <img src="{{asset('assets/img/ic-panner.svg')}}"> <br>
              Paneer
            </div>
            <div class="col">
              <img src="{{asset('assets/img/ic-oil.svg')}}"> <br>
              Olive Oil
            </div>
            <div class="col">
              <img src="{{asset('assets/img/ic-methi.svg')}}"> <br>
              Dry Fenugreek
              Leaves(Methi)
            </div>
        </div>
      </div>
   </div>
     <div class="container-fluid ingredients-box mb-5 pb-5">
      <div class="container ingredients-items">
        <h2> Prepration </h2>
        <div class="row dish-desc">
            <div class="embed-responsive embed-responsive-16by9 mt-3">
              <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/Sc2TD8Hvop8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <p class="mt-4"> How to make Paneer Tikka at home? Watch MasterChef Sanjeev Kapoor explain in hindi the recipe & cooking method of Paneer Tikka Sounfiana Dry (Grilled Chunks of Cottage Cheese)

Paneer tikka is an Indian dish made from chunks of paneer marinated in spices and grilled in a tandoor. It is a vegetarian alternative to chicken tikka. It is one of best paneer recipes that can be served as starter or as an accompaniment. </p>
            <ul>
<li> Ginger, Peeled - 1 Inch Piece </li>
<li> Garlic, Peeled - 4 To 6 Cloves </li>
<li> Green Capsicums - 2 to 3 Medium </li>
<li> Lucknowi Fennel (Saunf) - 2 Tea Spoon </li>
<li> Green Cardamoms (Elaichi) - 4 To 5 </li>
<li> Lemon - 1/2</li>
<li> Gram Flour (Besan) - 2 Table Spoon </li>
<li> Turmeric Powder (Haldi) - 1 Tea Spoon </li>
<li> White Pepper Powder - 1/2 Tea Spoon </li>
<li> Chaat Masala - 1 1/2 Tea Spoon </li>
<li> Fresh Cream - 1 Cup</li>
<li> Saffron - A Few Strands </li>
<li> Butter - 1 Table Spoon </li>
<li> Salt - To Taste</li>
</ul>
        </div>
      </div>
   </div>

   <div class="container-fluid ingredients-box mb-5 pb-5">
      <div class="container ingredients-items">
        <h2> From The Chef </h2>
        <div class="row dish-desc">
            <div class="embed-responsive embed-responsive-16by9 mt-3">
              <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/Sc2TD8Hvop8" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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
    
  </body>
</html>