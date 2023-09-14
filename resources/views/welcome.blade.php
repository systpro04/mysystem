<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SYSTEM APPLICATION</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
  <link rel="stylesheet" href="{{asset('css/loader.css')}}">
  
</head>

<body>
  
  <!-- Header -->
  <section id="header">
    <div class="header container">
      
      <div class="nav-bar">
        <div class="brand">
          <a href="#hero">
            <h1>SYSTEM </h1>
          </a>
        </div>
        <div class="nav-list">
          <div class="hamburger">
            <div class="bar"></div>
          </div>
          @if (Route::has('login'))
          <ul>
            @auth
            <li><a href="{{route('home')}}" data-after="Home">HOME</a></li>
            @else
            <li><a href="{{route('login')}}" data-after="Home">LOGIN</a></li>
            <li><a href="{{route('register')}}" data-after="Service">REGISTER</a></li>
            @endauth
          </ul>
          @endif
        </div>
      </div>
    </div>
  </section>
  <!-- End Header -->


  <!-- Hero Section  -->
  <section id="hero">
    <div class="hero container">
      <div>
        <h1>Hello, <span></span></h1>
        
        <h1>Welcome<span></span></h1>
        <a href="{{route('login')}}" type="button" class="cta">GET STARTED</a>
      </div>



      <div class="loader">
        <span style="--i: 1"></span>
        <span style="--i: 2"></span>
        <span style="--i: 3"></span>
        <span style="--i: 4"></span>
        <span style="--i: 5"></span>
        <span style="--i: 6"></span>
        <span style="--i: 7"></span>
        <span style="--i: 8"></span>
        <span style="--i: 9"></span>
        <span style="--i: 10"></span>
      </div>
    </div>
  </section>

</body>
<script src="{{asset('js/welcome.js')}}"></script>
</html>


