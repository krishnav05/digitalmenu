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
  <body class="billing-bg">

   <div class="container">
       <div class="row pt-4">
            <div class="col-sm-6 text-left">
                <a href="selectoption" class="next-prev-menu-item"> 
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                  <g id="ic_left-carrot" transform="translate(67 1099) rotate(180)">
                    <g id="Rectangle_105" data-name="Rectangle 105" transform="translate(51 1083)" fill="#fff" stroke="#A8A596" stroke-width="1" opacity="0">
                      <rect width="16" height="16" stroke="none"/>
                      <rect x="0.5" y="0.5" width="15" height="15" fill="none"/>
                    </g>
                    <path id="Path_2760" data-name="Path 2760" d="M-836.148,11088.659l6.072,6.071-6.072,6.072" transform="translate(892.648 -10004.159)" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"/>
                  </g>
                </svg>
                Go Back
              </a>
            </div>
          <div class="col-sm-6 text-right">
               
          </div>
          
       </div>
       <div id="saveimage">
       <div class="row mt-5">
         <div class="col-sm-12 text-center">
           <img src="{{ asset('assets/img/ic-billing-details.svg') }}" class="">
         </div>
         <div class="col-sm-12 text-center mt-3">
           <h1>Billing Details</h1>
         </div>
       </div>
     
        <div class="table-responsive mt-5">
        <table class="table table-borderless billing-details-tbl">
          <thead>
            <tr>
              <th scope="col">Items</th>
              <th scope="col">Price</th>
            </tr>
          </thead>
          <tbody>
            @foreach($kitchen_customize as $k_key)
            @foreach($kitchen as $key)
            @if($k_key->order_id == $key->id)
            @foreach($category_items as $citems)
            @if($key['item_id'] == $citems['item_id'])
            <tr id="bill{{$k_key['id']}}">
              <td scope="row">
                <img src="{{ asset('assets/img/ic-'.$citems['item_vegetarian'].'.svg')}}" class="veg-badge mr-1 d-inline">
                <h4 class="d-inline">{{$citems['item_name']}}</h4> <span class="golden-text"> x {{$k_key['quantity']}} </span> <br>
                <span class="small addons-bill-des">Addons: 
                  @foreach($kitchen_addons as $item_addon)
                    @if($item_addon->order_id == $k_key->id)
                      @if($item_addon->addon_name !== 'note')
                        {{$item_addon->addon_name}},
                      @endif
                    @endif
                  @endforeach
                  @foreach($kitchen_addons as $item_addon)
                  @if($item_addon->order_id == $k_key->id)
                    @if($item_addon->addon_name == 'note')
                      @if($item_addon->addon_value !== null)
                        Notes: {{$item_addon->addon_value}}
                      @endif
                    @endif
                  @endif
                @endforeach

                </span>
              </td>
              <td> ₹ {{$citems['item_price']}}</td>
            </tr>
            @endif
            @endforeach
            @endif
            @endforeach
            @endforeach
            <tr style="border-top: 1px solid rgba(0, 0, 0, 0.3);">
              <td scope="row">
                <h5>Item Total </h5>
              </td>
              <td id="kitchen_total"> ₹ {{$kitchen_total}}</td>
            </tr>
            <!-- <tr>
              <td scope="row" >
                <h5>Discounts </h5>
              </td>
              <td> ₹ -50</td>
            </tr> -->
            <tr>
              <td scope="row">
                <h5>Taxes (SGST + CGST) </h5>
              </td>
              <td id="gst"> ₹ {{$gst}}</td>
            </tr>
            <tr style="border-bottom: 1px solid rgba(0, 0, 0, 0.3);">
              <td scope="row">
                <h5 id="target">Service Charge </h5>
              </td>
              <td id="service_charge"> ₹ {{$service_charge}}</td>
            </tr>
            <tr>
              <td scope="row">
                <h5>Total Amount</h5>
              </td>
              <td class="item-price" id="total_bill"> ₹ {{$total_bill}}</td>
            </tr>
           
          </tbody>
        </table>

      </div>
    </div>
       <div class="row mt-1">
         <input type="submit" name="" value="CONFIRM BILL" class="btn btn-primary col mt-5" data-toggle="modal" data-target="#confirm-billing-opt">
       </div>

   <div class="modal fade m-0 pin-popup" tabindex="-1" role="dialog" id="confirmbill">
      <div class="modal-dialog" role="document">
        <div class="modal-content animate-bottom">
          <div class="modal-header">
            
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <h5 class="text-center mt-5 col-sm-12">Enter ID to confirm</h5>
           <form>
              <div class="form-group enter-pin mt-5 text-center">
                <input class="form-control" type="text">
                <input class="form-control" type="text">
                <input class="form-control" type="text">
                <input class="form-control" type="text">
              </div> 
              <input type="submit" name="" value="CONFIRM TABLE" class="btn btn-primary col "> 
            </form>
          </div>
          
        </div>
      </div>
    </div>

    <div class="modal fade m-0 pin-popup" tabindex="-1" role="dialog" id="select-billing-opt">
      <div class="modal-dialog" role="document">
        <div class="modal-content animate-bottom">
          <div class="modal-header bot-bd">
            <h5> Billing Options </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body pl-0 pr-0 pt-0">
            <ul>
              <li> Service Charge  
                <label class="switch float-right">
                  <input type="checkbox" checked>
                  <span class="slider-toggle round">
                    <b>ON</b>
                  </span>
                </label>
              </li>
              <li> Tips 
                  <label class="switch float-right">
                  <input id="tip-select" type="checkbox" checked>
                  <span class="slider-toggle round">
                    <b>ON</b>
                  </span>
                </label>
              </li>
              <li class="remove-itm-billing"> <a href="" id="remove" data-target="#remove-items-bill" data-toggle="modal" class="d-block">Remove Items from billing  <img src="{{asset('assets/img/ic-right-carrot.svg')}}" class="float-right"> </a></li>
              <li class="add-itm-billing">  <a href="itemmenu" class="d-block"> Add items to billing  <img src="{{asset('assets/img/ic-right-carrot.svg')}}" class="float-right"> </a></li>
            </ul>
          </div>
          <input id="select_save" type="submit" name="" value="SAVE CHANGES" class="btn btn-primary col-sm-11 ml-auto mr-auto mb-3">
        </div>

      </div>
    </div>

    <div class="modal fade m-0 pin-popup" tabindex="-1" role="dialog"  data-toggle="modal" id="remove-items-bill">
      <div class="modal-dialog" role="document">
        <div class="modal-content animate-bottom">
          <div class="modal-header bot-bd">
            <h5 class="remove-itm-billing"> Remove Items from billing </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body pl-0 pr-0 pt-0">
            @foreach($kitchen_customize as $k_key)
            @foreach($kitchen as $key)
            @if($k_key->order_id == $key->id)
            @foreach($category_items as $citems)
            @if($key['item_id'] == $citems['item_id'])
            <div class="row pt-2 m-auto bd-bot">
              <div class="col-sm-7 pl-5">
                  <h2 class="change-txt-size txt-balck"><img src="{{asset('assets/img/ic-'.$citems['item_vegetarian'].'.svg')}}" class="veg-badge mr-1 d-inline "> {{$citems['item_name']}} <span class="golden-text">x {{$k_key['quantity']}}</span> </h2>
                 <p class="menu-item-short-desc change-txt-size mb-1 pl-4"> Addons: 
                  @foreach($kitchen_addons as $item_addon)
                    @if($item_addon->order_id == $k_key->id)
                      @if($item_addon->addon_name !== 'note')
                        {{$item_addon->addon_name}},
                      @endif
                    @endif
                  @endforeach
                          </p>
                 <p class="menu-item-short-desc change-txt-size mb-1 pl-4">
                @foreach($kitchen_addons as $item_addon)
                  @if($item_addon->order_id == $k_key->id)
                    @if($item_addon->addon_name == 'note')
                      @if($item_addon->addon_value !== null)
                        Notes: {{$item_addon->addon_value}}
                      @endif
                    @endif
                  @endif
                @endforeach
                    </p>
              </div>
              <div class="col-sm-2 item-price">
                  {{$citems['item_price']}}
              </div> 
              <div class="col-sm-1 pt-2">
                  <img src="{{asset('assets/img/ic-remove.svg')}}"  id="{{$k_key['id']}}" class="bill_remove_item">
              </div>  
            </div>
            @endif
            @endforeach
            @endif
            @endforeach
            @endforeach
          </div>
          <input id="save_remove" type="submit" name="" value="SAVE CHANGES" class="btn btn-primary col-sm-11 ml-auto mr-auto mb-3">
        </div>

      </div>
    </div>

    <div class="modal fade m-0 pin-popup" tabindex="-1" role="dialog" id="confirm-billing-opt">
      <div class="modal-dialog" role="document">
        <div class="modal-content animate-bottom">
          <div class="modal-header bot-bd">
            <h5> Payment Options </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body pl-0 pr-0 pt-0">
            <ul class="payment-opts">
              <li> 
                <a href="" class="d-block"> Credit / Debit Card <img src="{{asset('assets/img/ic-right-carrot.svg')}}" class="float-right carrot-tick"> <img src="{{asset('assets/img/ic-card-payment.svg')}}" class="float-right">   </a>
              </li>
              <li>
                <a href="" class="d-block"> Paytm <img src="{{asset('assets/img/ic-right-carrot.svg')}}" class="float-right carrot-tick"> <img src="{{asset('assets/img/ic-paytm.svg')}}" class="float-right">  </a> 
              </li>
              <li>
                  <a href="" class="d-block"> UPI <img src="{{asset('assets/img/ic-right-carrot.svg')}}" class="float-right carrot-tick"> <img src="{{asset('assets/img/ic-upi.svg')}}" class="float-right">  </a>
              </li>
              <li>
                  <a href="" class="d-block"> Net Banking  <img src="{{asset('assets/img/ic-right-carrot.svg')}}" class="float-right carrot-tick"> </a>
              </li>
              <li>
                  <a href="" class="d-block"> Cash <img src="{{asset('assets/img/ic-right-carrot.svg')}}" class="float-right carrot-tick"> <img src="{{asset('assets/img/ic-cash.svg')}}" class="float-right ic-cash">  </a>
              </li>
            </ul>
          </div>
          <input type="button" name="" value="SAVE CHANGES" class="btn btn-primary col-sm-11 ml-auto mr-auto mb-3" onclick="test_function();">
        </div>

      </div>
    </div>


    <!-- check pin -->
    <div class="modal fade m-0 pin-popup" tabindex="-1" role="dialog" id="exampleModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form id="input-pin-here">
        {!! csrf_field() !!} 
       <h5 class="text-center mt-5 col-sm-12">Enter ID to confirm</h5>
          <div class="form-group enter-pin mt-5 text-center">
          a:  <input class="form-control" type="text" maxlength="1" name="pin1" pattern="[0-9]*" inputmode="numeric">
          b:  <input class="form-control" type="text" maxlength="1" name="pin2" pattern="[0-9]*" inputmode="numeric">
          c:  <input class="form-control" type="text" maxlength="1" name="pin3" pattern="[0-9]*" inputmode="numeric">
          d:  <input class="form-control" type="text" maxlength="1" name="pin4" pattern="[0-9]*" inputmode="numeric">
          </div> 
          <div id="pin-status" style="color: red; text-align: center;"></div>
          <input id="checkpin" type="button" name="" value="CONFIRM TABLE" class="btn btn-primary col mt-5"> 
        </form>
      </div>
      
    </div>
  </div>
</div>

<!-- tip for server modal -->
<div class="modal fade m-0 pin-popup" tabindex="-1" role="dialog"  data-toggle="modal" id="tip-amount">
  <div class="modal-dialog" role="document">
    <div class="modal-content animate-bottom">
      <div class="modal-header bot-bd">
        <h5 class="remove-itm-billing"> Tipping </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body pl-0 pr-0 pt-0">
       <h5 class="text-center mt-5 col-sm-12 font-oxy txt-balck">Tip Amount</h5>
       <h5 class="text-center small txt-lit-gray font-oxy mb-3"> 7% - 10% of the total bill amount is usually a good number </h5>

       <div class="row pt-2 m-auto pb-5">
         <div class="col-sm-3 m-auto pl-0">
           <span class="input-group-text d-inline tip-rupee item-price" id="basic-addon1">₹</span><input type="text" class="form-control d-inline tip-input" placeholder="Digits Only" aria-label="Digits Only" aria-describedby="basic-addon1" pattern="[0-9]*" inputmode="numeric" maxlength="4">
         </div>
       </div>
       <div class="row mt-3">
        <input id="confirm-tip" type="submit" name="" value="CONFIRM TIP" class="btn btn-primary col-sm-3 m-auto">
      </div>
      <div class="row mt-4 mb-3">
        <a id="dont-tip" href="#" class="m-auto text-center golden-text">I DON'T WANT TO TIP</a>
      </div>
    </div>

  </div>

</div>
</div>
</div>
<!-- end tip modal -->

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
    <script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
    <script>
      $("#target").on("dblclick", function() {
        $('#exampleModal').modal('show');
      });
      $("#remove").on('click',function(){
        $('#select-billing-opt').modal('hide');
      });
      $("#save_remove").on('click',function(){
        $('#remove-items-bill').modal('hide');
        $('#select-billing-opt').modal('show');
      });
      $("#select_save").on('click',function(){
        $("#select-billing-opt").modal('hide');
      });
      $('.bill_remove_item').on('click',function(event){
        var current_element = this;
        var saveid = '#bill' + this.id;
        event.preventDefault();
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
                    /* the route pointing to the post function */
                    url: 'billing',
                    type: 'POST',
                    /* send the csrf-token and the input to the controller */
                    data: {_token: CSRF_TOKEN, id:this.id, action:'deleteitem'},
                    dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */
                    success: function (data) { 
                        // $("#kitchen_total").html(data.msg); 
                        if(data.delete_status == 'success'){
                          $(current_element).parent('div').parent('div').hide();
                          $(current_element).parent('div').parent('div').remove();
                          $('#gst').empty().append(' ₹ ' + data.gst);
                          $('#kitchen_total').empty().append(' ₹ ' + data.kitchen_total);
                          $('#service_charge').empty().append(' ₹ ' + data.service_charge);
                          $('#total_bill').empty().append(' ₹ ' + data.total_bill);
                          $(saveid).hide();
                        }
                    }
                }); 
      });

      $('#checkpin').on('click',function(){
        var temp = '#input-pin-here';
        // var id = '#'+this.id;
        const arr = $(temp).serializeArray(); // get the array
  const data = arr.reduce((acc, {name, value}) => ({...acc, [name]: value}),{}); // form the object
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
                    /* the route pointing to the post function */
                    url: 'bill-pin-check',
                    type: 'POST',
                    /* send the csrf-token and the input to the controller */
                    data: {_token: CSRF_TOKEN,totaldata: data},
                    dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */
                    success: function (data) { 
                        console.log(data.delete_status);
                        if (data.pin_status == 'correct') {
                          $('#exampleModal').modal('hide');
                          $('#select-billing-opt').modal('show');
                        }
                        else if(data.pin_status == 'wrong pin'){
                          $('#pin-status').html(data.message);
                          $('.form-control').addClass('border-color');
                          $('.form-control').val('');
                        }
                    }
                }); 
      });
      function test_function(){
        html2canvas(document.querySelector("#saveimage")).then(canvasElm => {
    // document.body.appendChild(canvasElm);
    // $("#appendhere").append(canvasElm);
          var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
          var imgData = canvasElm.toDataURL('image/jpeg');
                $.ajax({
                    url: 'saveimage',
                    type: 'POST',
                    dataType: 'JSON',
                    data: {_token: CSRF_TOKEN,base64data: imgData},
                    success: function (data) { 
                        // console.log(data);
                        window.location = 'signature';
                    }
                });
        });
        
      }

      $('#tip-select').on('click',function(event){
        event.preventDefault();
        $('#select-billing-opt').modal('hide');
        $('#tip-amount').modal('show');
      });

      $('#dont-tip').on('click',function(){
        $('#tip-amount').modal('hide');
        $('#tip-select').prop('checked',false);
        $('#select-billing-opt').modal('show');
      });

      $('#confirm-tip').on('click',function(){
        $('#tip-amount').modal('hide');
        $('#tip-select').prop('checked',true);
        $('#select-billing-opt').modal('show');
      });

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
    </script>
  </body>
</html>