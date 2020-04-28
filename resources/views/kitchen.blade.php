<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="robots" content="noindex, nofollow" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/menu-style.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Oxygen|Playfair+Display&display=swap" rel="stylesheet"> 
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('assets/img/apple-touch-icon-ipad-retina-display.png') }}" /> 
    <title>Digital Menu</title>
  </head>
  <body class="kitchen-bg">
    

   <div class="container">
       <div class="row pt-4">
            <div class="col-sm-6 text-left">
                <a href="itemmenu" class="next-prev-menu-item"> 
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                  <g id="ic_left-carrot" transform="translate(67 1099) rotate(180)">
                    <g id="Rectangle_105" data-name="Rectangle 105" transform="translate(51 1083)" fill="#fff" stroke="#A8A596" stroke-width="1" opacity="0">
                      <rect width="16" height="16" stroke="none"/>
                      <rect x="0.5" y="0.5" width="15" height="15" fill="none"/>
                    </g>
                    <path id="Path_2760" data-name="Path 2760" d="M-836.148,11088.659l6.072,6.071-6.072,6.072" transform="translate(892.648 -10004.159)" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
                  </g>
                </svg>
                Menu
              </a>
            </div>
          <div class="col-sm-6 text-right">
               
          </div>
          
       </div>
       @if($total_items == 0)
       <div class="row mt-5">
         <div class="col-sm-12 text-center">
           <img src="{{asset('assets/img/ic-kitchen.svg')}}" class="">
         </div>
         <div class="col-sm-12 text-center mt-3">
           <h1>The Kitchen Is Empty</h1>
         </div>
       </div>
       <div class="container mt-5 pt-3">
         <div class="row mt-5">
           <div class="col-sm-12 text-center"> <img src="{{asset('assets/img/ic-kitchen-empty.png')}}"> </div>
         </div>
       </div>
     
        
       <div class="row mt-5">
         <input type="submit" name="" value="GO TO MENU" class="btn btn-primary col mt-5" onclick="window.location.href = 'itemmenu';">
        
       </div>
       @else
       <div class="row mt-5">
         <div class="col-sm-12 text-center">
           <img src="{{asset('assets/img/ic-kitchen.svg')}}" class="">
         </div>
         <div class="col-sm-12 text-center mt-3">
           <h1>Kitchen</h1>
         </div>
       </div>
     
        <div class="table-responsive mt-5">
          <table class="table table-borderless">
            <thead>
              <tr class="text-center">
                <th scope="col text-center">S.NO.</th>
                <th scope="col text-center">ITEM</th>
                <th scope="col">PRICE</th>
              </tr>
              @foreach($kitchen_customize as $k_key)
              @foreach($kitchen as $key)
              @if($k_key->order_id == $key->id)
              @foreach($category_items as $citems)
              @if($citems->item_id == $key->item_id)
              <tr>
                <td class="text-center"> {{$count++}} </td>
                <td>
                  <img src="{{asset('assets/img/fooditems/'.$citems->image)}}" class="menu-item-img float-left d-inline m-3 mb-5" width="60" height="60">
                   <h2 class="change-txt-size"><img src="{{asset('assets/img/ic-'.$citems->item_vegetarian.'.svg')}}" class="veg-badge mr-1 d-inline"> <a>{{$citems->item_name}}</a></h2>
              
             <p class="item-contains change-txt-size"> 
              @foreach($addons as $item_addon)
                @if($item_addon->order_id == $k_key->id)
                  @if($item_addon->addon_name !== 'note')
                    {{$item_addon->addon_name}},
                  @endif
                @endif
              @endforeach
              @foreach($addons as $item_addon)
                @if($item_addon->order_id == $k_key->id)
                  @if($item_addon->addon_name == 'note')
                    @if($item_addon->addon_value !== null)
                      Notes: {{$item_addon->addon_value}}
                    @endif
                  @endif
                @endif
              @endforeach


            
              
             </p>
             <p class="mb-0"> <a href="" class="customize" data-toggle="modal" data-target="#n{{$k_key->id}}">Customize <img src="{{asset('assets/img/ic-customize.svg')}}" class="d-inline"> </a> </p>
             <div class="row kitchne-add-to">
                <div class="col-sm-12 pl-0">
                            <div class="input-group kitchen-margin" style="display: block;margin-left: 108px;">
                               
                                    <button class="btn btn-light btn-sm float-left kitchen-minus" id="{{$k_key->id}}"><img src="{{asset('assets/img/ic-minus.svg')}}" class="d-inline"></button>
                                
                                <input type="number" id="qty_input" class="add-plus-min float-left" value="{{$k_key->quantity}}" min="0" disabled>
                                
                                    <button class="btn btn-light btn-sm float-left kitchen-plus" id="{{$k_key->id}}"><img src="{{asset('assets/img/ic-plus.svg')}}" class="d-inline"></button>
                                
                            </div>
                </div>
                           
             </div>
                
                </td>
                <td class="item-price text-center"> {{$citems->item_price  }} </td>
              </tr>
              @endif
              @endforeach
              @endif
              @endforeach
              @endforeach
            </thead>
            
          </table>
        </div>  
       <div class="row mt-5">
         <input type="button" id="alertnotify" name="" value="CONFIRM ORDER" class="btn btn-primary col mt-5">
        
       </div>
       @endif
       <div class="row mt-3 text-center">
          <p class="col text-center">
           Please call the server to get your order confirmed <a href="#"><img src="{{asset('assets/img/ic-call-server-2.svg')}}" class="d-inline"></a>
         </p>
       </div>

   </div>
  
   <!-- modal for empty table  -->
  <div class="modal fade m-0 pin-popup" tabindex="-1" role="dialog" id="exampleModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form id="form-pin-check">
        {!! csrf_field() !!} 
       <h5 class="text-center mt-5 col-sm-12">Enter ID to confirm</h5>
          <div class="form-group enter-pin mt-5 text-center">
          a:  <input class="form-control" type="text" maxlength="1" name="pin1" pattern="[0-9]*" inputmode="numeric">
          b:  <input class="form-control" type="text" maxlength="1" name="pin2" pattern="[0-9]*" inputmode="numeric">
          c:  <input class="form-control" type="text" maxlength="1" name="pin3" pattern="[0-9]*" inputmode="numeric">
          d:  <input class="form-control" type="text" maxlength="1" name="pin4" pattern="[0-9]*" inputmode="numeric">
          </div>
          <div id="pin-status" style="color: red; text-align: center;"></div>  
          <input type="button" id="checkpin" name="" value="CONFIRM TABLE" class="btn btn-primary col mt-5"> 
        </form>
      </div>
      
    </div>
  </div>
</div>

<!-- modal for customization -->
@foreach($kitchen_customize as $k_key)
@foreach($kitchen as $idata)
@if($k_key->order_id == $idata->id)
@foreach($category_items as $citems)
@if($citems->item_id == $idata->item_id)
<div class="modal fade m-0 pin-popup pstyle" tabindex="-1" role="dialog" id="n{{$k_key->id}}">
  <div class="modal-dialog" role="document">
    <form id="form{{$k_key->id}}">
    <div class="modal-content animate-bottom">
      <div class="modal-header">
        <h5><img src="{{asset('assets/img/ic-'.$citems->item_vegetarian.'.svg')}}" class="veg-badge mr-1 d-inline"> {{$citems->item_name}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body pt-0 pb-0">
        <div class="container">
          <div class="row">
            <div class="col-sm-6 devider-rit">
              <h4 class="mt-3">Add Ons</h4>
              <h5>Salts</h5>
              <table class="table table-borderless">
                @foreach($original_addons as $addons)
                @if($idata->item_id == $addons->item_id)
                <tr>
                  <td>
                    <img src="{{asset('assets/img/ic-veg.svg')}}" class="veg-badge mr-1 d-inline"> <input class="d-inline" type="checkbox" id="defaultCheck1" name="{{$addons['addon_name']}}"> {{$addons['addon_name']}}  
                  </td>
                  <td class="item-price">
                    ₹ {{$addons['addon_price']}}
                  </td>
                </tr>
                @endif
                @endforeach
              </table>
            </div>
            <div class="col-sm-6">
              <h4 class="mt-3">Notes for the Chef</h4>
              <textarea class="form-control mt-4" id="exampleFormControlTextarea1" rows="10" placeholder="Tell the chef how you want the
              dish to be prepared" name="note"></textarea>
            </div>
          </div>
        </div>   
      </div>
      <div class="modal-footer">
        <button class="kitchencustomize btn btn-primary col" id="{{$k_key->id}}" type="button">ADD TO KITCHEN</button>       
      </div>
    </div>
  </form>
  </div>
</div>
@endif
@endforeach
@endif
@endforeach
@endforeach


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script> -->
    <script
        src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{ asset('assets/js/custom-menu.js') }}"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('input').keyup(function(event){
          if($(this).val().length==$(this).attr("maxlength") && event.keyCode !== 8){
            $(this).next().focus();
          }
        });
      $('input').keydown(function(event){
        if(event.keyCode == 8){
          event.preventDefault();
          if($(this).val().length==1){
            $(this).val('');
          }
          else{
            $(this).prev().focus().val('');
          }
        }
      });
      });

// kitchen javascript
$('.kitchen-plus').on('click',function(event) {
  event.preventDefault();
  $(this).prev('input').val(function(i, oldval) {
    return ++oldval;
  });
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  $.ajax({
                    /* the route pointing to the post function */
                    url: 'kitchen',
                    type: 'POST',
                    /* send the csrf-token and the input to the controller */
                    data: {_token: CSRF_TOKEN, id:this.id, action:'kitchenadd'},
                    dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */
                    success: function (data) { 
                        // $("#kitchen_total").html(data.msg); 
                        console.log(data);
                    }
                });
});

$('.kitchen-minus').on('click',function(event) {
  event.preventDefault();
  if ($(this).next('input').val() !== '0') 
  {
    $(this).next('input').val(function(i, oldval) {
      return --oldval;
    });
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
  $.ajax({
                    /* the route pointing to the post function */
                    url: 'kitchen',
                    type: 'POST',
                    /* send the csrf-token and the input to the controller */
                    data: {_token: CSRF_TOKEN, id:this.id, action:'kitchenminus'},
                    dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */
                    success: function (data) { 
                        // $("#kitchen_total").html(data.msg);
                        if(data.delete_status == 'true'){
                          location.reload(true);
                        } 
                    }
                });
  }    
});

$('.kitchencustomize').on('click',function(event){
    var temp = '#form'+this.id;
    const arr = $(temp).serializeArray(); // get the array
  const data = arr.reduce((acc, {name, value}) => ({...acc, [name]: value}),{}); // form the object
  console.log(data);
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $.ajax({
                    /* the route pointing to the post function */
                    url: 'kitchen',
                    type: 'POST',
                    /* send the csrf-token and the input to the controller */
                    data: {_token: CSRF_TOKEN, id:this.id, action:'kitchencustomize',totaldata: data},
                    dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */
                    success: function (data) {
                        // $("#kitchen_total").html(data.msg); 
                        location.reload();
                    }
                });
    $('#n'+this.id).modal('hide');
});

//check pin
      $('#checkpin').on('click',function(event){
        event.preventDefault();
        var temp = '#form-pin-check';
        const arr = $(temp).serializeArray(); // get the array
        const data = arr.reduce((acc, {name, value}) => ({...acc, [name]: value}),{}); // form the object
        // console.log(data);
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
          /* the route pointing to the post function */
          url: 'ordersentkitchen',
          type: 'POST',
          /* send the csrf-token and the input to the controller */
          data: {_token: CSRF_TOKEN,totaldata: data},
          dataType: 'JSON',
          /* remind that 'data' is the response of the AjaxController */
          success: function (data) {
            if(data.status == 'success'){
              window.location = data.url;
            }
            else if(data.status == 'wrong pin'){
              $('#pin-status').html(data.message);
              $('.form-control').addClass('border-color');
              $('.form-control').val('');
            }
          }
        });
      });

      //update someone click to confirm order 
      $('#alertnotify').on('click',function(event){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
          /* the route pointing to the post function */
          url: 'alertnotification',
          type: 'POST',
          /* send the csrf-token and the input to the controller */
          data: {_token: CSRF_TOKEN},
          dataType: 'JSON',
          /* remind that 'data' is the response of the AjaxController */
          success: function (data) {
            if(data.status == 'no'){
              window.location = data.url;
            }
            if(data.status == 'success'){
              $('#exampleModal').modal('show');
            }
          }
        });
      });
</script>
    
  </body>
</html>