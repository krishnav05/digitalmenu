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
  <body class="select-table">
    
  <div class="container-fluid select-table-header pb-4">
    <div class="container mt-5 pt-5">
       <div class="row">
          <h1 class="text-center col-sm-12"> Select a Table </h1>
          <h4 class="text-center small col-sm-12">Slide to select a table</h4>
          <div class="text-center col-sm-12" id="table-select-value"> </div>
          <div class="col-sm-12 text-center">
             <input type="range" min="1" max="40" value="0" class="slider" id="table-range" step="1">
          </div>
          <h4 class="text-center small col-sm-12 mt-4">Sort tables by</h4>
          <div class="col-sm-12 text-center mt-2 table-sort">
             <a href="{{Request::url()}}" class="btn btn-outline-secondary @if(session()->has('message')) @else active @endif m-2">All</a>
             <a href="{{Request::url()}}/sort/empty" class="btn btn-outline-secondary empty-tbl m-2 @if(session('message') == 'empty') active @endif">Empty</a>
             <a href="{{Request::url()}}/sort/occupied" class="btn btn-outline-secondary occupied-tbl m-2 @if(session('message') == 'occupied') active @endif">Occupied</a>
          </div>
       </div>
       
   </div>
  </div>
  @if (session('error'))
  <div class="alert alert-danger">
   <center>{{ session('error') }}</center> 
 </div>
 @endif
  <div class="container mt-5">
    <div class="row display-all-restro-table">
          

          @if(session()->has('message'))
            @if(session('message') == 'empty')
              @foreach($total_tables as $key)
              @if($key['table_status'] == 'Empty')
          <a href="" id="{{$key['table_no']}}" class="tbl-status-display pop-show @if($key['table_status'] == 'Occupied') active @endif"
             data-toggle="modal" data-target="#exampleModal" data-table-id="{{$key['table_no']}}" data-table-status="{{$key['table_status']}}"> <h2 class="table-number">{{$key['table_no']}}</h2>  <span class="@if($key['table_status'] == 'Occupied') occupied-tbl @else empty-tbl @endif small">{{$key['table_status']}}</span></a>
             @endif
          @endforeach
          @foreach($total_tables as $key)
              @if($key['table_status'] !== 'Empty')
          <a href="" id="{{$key['table_no']}}" class="tbl-status-display pop-show @if($key['table_status'] == 'Occupied') active @endif"
             data-toggle="modal" data-target="#exampleModal" data-table-id="{{$key['table_no']}}" data-table-status="{{$key['table_status']}}"> <h2 class="table-number">{{$key['table_no']}}</h2>  <span class="@if($key['table_status'] == 'Occupied') occupied-tbl @else empty-tbl @endif small">{{$key['table_status']}}</span></a>
             @endif
          @endforeach
            @else
            @foreach($total_tables as $key)
              @if($key['table_status'] !== 'Empty')
          <a href="" id="{{$key['table_no']}}" class="tbl-status-display pop-show @if($key['table_status'] == 'Occupied') active @endif"
             data-toggle="modal" data-target="#exampleModal" data-table-id="{{$key['table_no']}}" data-table-status="{{$key['table_status']}}"> <h2 class="table-number">{{$key['table_no']}}</h2>  <span class="@if($key['table_status'] == 'Occupied') occupied-tbl @else empty-tbl @endif small">{{$key['table_status']}}</span></a>
             @endif
          @endforeach
          @foreach($total_tables as $key)
              @if($key['table_status'] == 'Empty')
          <a href="" id="{{$key['table_no']}}" class="tbl-status-display pop-show @if($key['table_status'] == 'Occupied') active @endif"
             data-toggle="modal" data-target="#exampleModal" data-table-id="{{$key['table_no']}}" data-table-status="{{$key['table_status']}}"> <h2 class="table-number">{{$key['table_no']}}</h2>  <span class="@if($key['table_status'] == 'Occupied') occupied-tbl @else empty-tbl @endif small">{{$key['table_status']}}</span></a>
             @endif
          @endforeach
            @endif
          @else
          @foreach($total_tables as $key)
          <a href="" id="{{$key['table_no']}}" class="tbl-status-display pop-show @if($key['table_status'] == 'Occupied') active @endif"
             data-toggle="modal" data-target="#exampleModal" data-table-id="{{$key['table_no']}}" data-table-status="{{$key['table_status']}}"> <h2 class="table-number">{{$key['table_no']}}</h2>  <span class="@if($key['table_status'] == 'Occupied') occupied-tbl @else empty-tbl @endif small">{{$key['table_status']}}</span></a>
          @endforeach
          @endif
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
        <div class="row display-all-restro-table">
          <a href="#" class="tbl-status-display m-auto" id="pop-up-link-id"> <h2 class="table-number"><input type="text" id="pop-up-table-id" name="tableId" value="" readonly /></h2>  <input class="small pop-up-fieldvalue" id="pop-up-table-status" name="status" style="width: 100%;" value="" readonly /></a>
       </div>  
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
    <!-- enter server pin -->
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
          url: '{{Request::url()}}/selectoption',
          type: 'POST',
          /* send the csrf-token and the input to the controller */
          data: {_token: CSRF_TOKEN,totaldata: data},
          dataType: 'JSON',
          /* remind that 'data' is the response of the AjaxController */
          success: function (data) {
            if(data.status == 'success'){
              window.location = '{{Request::url()}}/'+data.url;
            }
            else if(data.status == 'wrong pin'){
              $('#pin-status').html(data.message);
              $('.form-control').addClass('border-color');
              $('.form-control').val('');
            }
          }
        });
      });
    </script>
  </body>
</html>