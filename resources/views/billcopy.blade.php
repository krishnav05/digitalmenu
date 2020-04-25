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
  <body class="thank-bg">
    
  <div class="container mt-5 pt-5">
    <div class="row mt-5 pt-5 thank-bg-text">
      <div class="col-sm-12 mt-5 pt-5 text-center">
        <h5> Send a copy of the bill<br>to your email </h5>
        <p class="small"> A copy of the bill might come in handy </p>
      </div>
      <div class="col-sm-12 text-center">
        <form id="input-email-form">
          <input type="text" name="email" placeholder="Email" class="copy-to-email col-sm-4">
          <div class="col mt-4">
              <input type="button" id="sendmail" name="" value="SEND" class="btn btn-primary col-sm-4">
            </div>
            <div class="row mt-4 mb-3">
              <a href="thanksfeedback" class="m-auto text-center golden-text">SKIP</a>
            </div>
        </form>
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
    <script type="text/javascript">
      $('#sendmail').on('click', function (e) {
            e.preventDefault();
            var temp = '#input-email-form';
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            const arr = $(temp).serializeArray(); // get the array
            const tdata = arr.reduce((acc, {name, value}) => ({...acc, [name]: value}),{}); // form the object
            $.ajax({
                type: "POST",
                url: 'sendmail',
                data: {_token: CSRF_TOKEN,data: tdata},
                dataType: 'JSON',
                success: function (data) {
                    // console.log(data);
                      if(data.type == 'success'){
                        window.location = 'thanksfeedback';
                      }
                      else{
                        alert('Retry');
                      }
                }
            });
    });
    </script>
 
  </body>
</html>