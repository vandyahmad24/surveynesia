<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="{{asset('backend/assets/js/core/jqueryku.js')}}"></script>

    <title>Active User Surveynesia</title>
    <style type="text/css">
      #wrapper {
  font-family: Lato;
  font-size: 1.5rem;
  text-align: center;
  box-sizing: border-box;
  color: #333;
  margin-top: 30px;
  
  #dialog {
    border: solid 1px #ccc;
    margin: 10px auto;
    padding: 20px 30px;
    display: inline-block;
    box-shadow: 0 0 4px #ccc;
    background-color: #FAF8F8;
    overflow: hidden;
    position: relative;
    max-width: 450px;
    
    h3 {
      margin: 0 0 10px;
      padding: 0;
      line-height: 1.25;
    }
    
    span {
      font-size: 90%;
    }
    
    #form {
      max-width: 240px;
      margin: 25px auto 0;
      
      input {
        margin: 0 5px;
        text-align: center;
        line-height: 80px;
        font-size: 50px;
        border: solid 1px #ccc;
        box-shadow: 0 0 5px #ccc inset;
        outline: none;
        width: 20%;
        transition: all .2s ease-in-out;
        border-radius: 3px;
        
        &:focus {
          border-color: purple;
          box-shadow: 0 0 5px purple inset;
        }
        
        &::selection {
          background: transparent;
        }
      }
      
      button {
        margin:  30px 0 50px;
        width: 100%;
        padding: 6px;
        background-color: #B85FC6;
        border: none;
        text-transform: uppercase;
      }
    }
    
    button {
      &.close {
        border: solid 2px;
        border-radius: 30px;
        line-height: 19px;
        font-size: 120%;
        width: 22px;
        position: absolute;
        right: 5px;
        top: 5px;
      }           
    }
    
    div {
      position: relative;
      z-index: 1;
    }
    
    img {
      position: absolute;
      bottom: -70px;
      right: -63px;
    }
  }
}
    </style>
  </head>
  <body>
    <nav class="navbar navbar-dark bg-primary">
      <a href="#" class="logo">
          <img src="{{asset('logo_samping.png')}}" alt="navbar brand" class="navbar-brand" width="200px">
        </a>
    </nav>
    <div class="container">
     <div id="wrapper">
        <div id="dialog">
          <h3>Selamat Datang {{Auth::user()->name}}, Kami Baru saja mengirimkan <br> 4 - Kode Aktivasi melalui email anda: <span class="text-success"> {{Auth::user()->email}} </span></h3>
          <p class="text-center"> Mohon Tunggu 1-5 Menit <br> Jika anda tidak menemukan email dari Surveynesia di kotak masuk mohon periksa di folder spam.</p>
          <form id="form_send" method="post" action="{{route('verifikasi-otp')}}">
          <div>
            @csrf
            <input type="text" name="verifikasi[]" maxLength="1" size="1" min="0" max="9" pattern="[0-9]{1}" />
            <input type="text" name="verifikasi[]" maxLength="1" size="1" min="0" max="9" pattern="[0-9]{1}" />
            <input type="text" name="verifikasi[]" maxLength="1" size="1" min="0" max="9" pattern="[0-9]{1}" />
            <input type="text" name="verifikasi[]" maxLength="1" size="1" min="0" max="9" pattern="[0-9]{1}" />
            <button type="submit" id="" class="btn btn-primary btn-embossed">Verifikasi</button>
            </form>
            <br>

             @if (session('status'))
                    <div class="alert alert-success mt-4">
                        {{ session('status') }}
                    </div>
                @endif

             @if (session('gagal'))
                    <div class="alert alert-danger mt-4">
                        {{ session('gagal') }}
                    </div>
                @endif
           
          </div>
          
          <div id="send-ulang">
            Tidak Menerima Kode?<br />
            <a href="{{route('resend-email')}}">Kirim ulang</a><br/>
          </div>
          <div id="show" class="mt-4"></div>
          
        </div>
      </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script type="text/javascript">
      $(function() {
  'use strict';

  var body = $('body');

  function goToNextInput(e) {
    var key = e.which,
      t = $(e.target),
      sib = t.next('input');

    if (key != 9 && (key < 48 || key > 57)) {
      e.preventDefault();
      return false;
    }

    if (key === 9) {
      return true;
    }

    if (!sib || !sib.length) {
      sib = body.find('input').eq(0);
    }
    sib.select().focus();
  }

  function onKeyDown(e) {
    var key = e.which;

    if (key === 9 || (key >= 48 && key <= 57)) {
      return true;
    }

    e.preventDefault();
    return false;
  }
  
  function onFocus(e) {
    $(e.target).select();
  }

  body.on('keyup', 'input', goToNextInput);
  body.on('keydown', 'input', onKeyDown);
  body.on('click', 'input', onFocus);

})

$("#send-ulang").on("click",function(){
  $(this).remove();
  $("#show").html("<h4>Kami Sedang Mengrim Email Mohon tunggu</h4>")
});



    </script>
  </body>
</html>