<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>CRM V1 Demo</title>

  <!-- Bootstrap core CSS -->
  <link href="{{ URL::asset('asset/frontend/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Merriweather:300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
  <link href="{{ URL::asset('asset/frontend/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template -->
  <link href="{{ URL::asset('asset/frontend/css/coming-soon.min.css') }}" rel="stylesheet">

</head>

<body>

  <div class="overlay"></div>
  <video id="myVideo" playsinline="playsinline" autoplay="autoplay" loop="loop" controls>
    <source src="{{ URL::asset('asset/frontend/mp4/bg.mp4') }}" type="video/mp4">
  </video>
<script>
var vid = document.getElementById("myVideo");

function enableMute() { 
    vid.muted = true;
    document.getElementById("myDIV").style.display = "none";


}
</script>

  <div class="masthead">
    <div class="masthead-bg"></div>
    <div class="container h-100">
      <div class="row h-100">
        <div class="col-12 my-auto">
          <div class="masthead-content text-white py-5 py-md-0">
            <h1 class="mb-3">{{ __('frontend.v2comingsoon') }}</h1>
            <p class="mb-5">{{ __('frontend.frontdesc') }}</p>
            <div class="input-group input-group-newsletter">
                <button class="btn btn-primary btn-block" type="button"><a  style="color: white;" href="/login">{{ __('frontend.login') }}</a></button>
              <p>{{ __('frontend.logininfo') }}</p>
            </div>
<div id="myDIV"><button onclick="enableMute()" style="color: red;" class="btn" type="button">{{ __('frontend.mutesound') }}</button></div>
          </div>
        </div>
      </div>
    </div>

  </div>

  <div class="social-icons">

    <ul class="list-unstyled text-center mb-0">
      <li class="list-unstyled-item">
        <a href="https://twitter.com/vedatbozkurt" target="_blank">
          <i class="fab fa-twitter"></i>
        </a>
      </li>
    </ul>

  </div>


  <!-- Bootstrap core JavaScript -->
  <script src="{{ URL::asset('asset/frontend/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ URL::asset('asset/frontend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

  <!-- Custom scripts for this template -->
  <script src="{{ URL::asset('asset/frontend/js/coming-soon.min.js') }}"></script>

</body>

</html>
