<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="format-detection" content="telephone=no">
<meta name="theme-color" content="#282828"/>
<title>Pyramid Builders | Real Estate & Luxury Homes</title>
<meta name="author" content="Themezinho">
<meta name="description" content="Homepark | Real Estate & Luxury Homes">
<meta name="keywords" content="Pyramid Builders, realestate, flat, apartment, benefits, facility, consultation, home, house, studio, pool, animation, transportation">

<!-- SOCIAL MEDIA META -->
<meta property="og:description" content="Homepark | Real Estate & Luxury Homes">
<meta property="og:image" content="http://www.themezinho.net/homepark/preview.png">
<meta property="og:site_name" content="Pyramid Builders">
<meta property="og:title" content="Pyramid Builders">
<meta property="og:type" content="website">
<meta property="og:url" content="http://www.themezinho.net/homepark">

<!-- TWITTER META -->
<meta name="twitter:card" content="summary">
<meta name="twitter:site" content="@homepark">
<meta name="twitter:creator" content="@homepark">
<meta name="twitter:title" content="homepark">
<meta name="twitter:description" content="Homepark | Real Estate & Luxury Homes">
<meta name="twitter:image" content="http://www.themezinho.net/homepark/preview.png">

<!-- FAVICON FILES -->
<link href="{{ asset('assets/user/ico/apple-touch-icon-144-precomposed.png')}}" rel="apple-touch-icon" sizes="144x144">
<link href="{{ asset('assets/user/ico/apple-touch-icon-114-precomposed.png')}}" rel="apple-touch-icon" sizes="114x114">
<link href="{{ asset('assets/user/ico/apple-touch-icon-72-precomposed.png')}}" rel="apple-touch-icon" sizes="72x72">
<link href="{{ asset('assets/user/ico/apple-touch-icon-57-precomposed.png')}}" rel="apple-touch-icon">
<link href="{{ asset('assets/user/ico/favicon.jpg" rel="shortcut icon')}}">

<!-- CSS FILES -->
<link rel="stylesheet" href="{{ asset('assets/user/css/fontawesome.min.css')}}">
<link rel="stylesheet" href="{{ asset('assets/user/css/animate.min.css')}}">
<link rel="stylesheet" href="{{ asset('assets/user/css/fancybox.min.css')}}">
<link rel="stylesheet" href="{{ asset('assets/user/css/odometer.min.css')}}">
<link rel="stylesheet" href="{{ asset('assets/user/css/swiper.min.css')}}">
<link rel="stylesheet" href="{{ asset('assets/user/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{ asset('assets/user/css/style.css')}}">
@livewireStyles
</head>
<body>
<div class="preloader">
  <div class="layer"></div>
  <!-- end layer -->
  <div class="inner">
    <figure><img src="{{ asset('assets/user/images/preloader.gif')}}" alt="Image"></figure>
    <p><span class="text-rotater" data-text="Pyramid Builders | Elements | Loading">Loading</span></p>
  </div>
  <!-- end inner --> 
</div>
<!-- end prelaoder -->
<div class="transition-overlay">
  <div class="layer"></div>
</div>
<!-- end transition-overlay -->
<div class="side-navigation">
  <!-- end menu -->
  <div class="side-content">
    <figure> <img src="{{ asset('assets/user/images/logo-light.png')}}" alt="Image"> </figure>
     <div class="menu">
    <ul>
     <li><a href="/about-us">About</a></li>
       <!-- <li><a href="/now-selling">Now Selling</a></li>-->
        <li><a href="/our-projects">Projects</a></li>
        <li><a href="/contact-us">Contact</a></li>
    </ul>
  </div>
    <p>By aiming to take the life quality to an upper level with the whole realized Projects, Homepark continues to be the address of luxury.</p>
    <h6>+254 722 981 125 <br/>+254 720 150 988</h6>
    <p><a href="#">hello@pyramidbuilders.co.ke</a></p>
    <ul class="social-media">
      <!--<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
      <li><a href="#"><i class="fab fa-twitter"></i></a></li>
      <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
      <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>-->
      <li><a href="#"><i class="fab fa-youtube"></i></a></li>
    </ul>
    <small>© {{ now()->year }} Pyramid Builders | Real Estate & Luxury Homes</small> </div>
  <!-- end side-content --> 
</div>
<!-- end side-navigation -->
<nav class="navbar">
  <div class="container">
    <div class="upper-side">
      <div class="logo"> <a href="/"><img src="{{ asset('assets/user/images/logo-light.png')}}" alt="Image"></a> </div>
      <!-- end logo -->
      <div class="phone-email"> <i class="fab fa-whatsapp" style="margin:0 0 0 10px; font-size:32px; float: right;"></i>
        <h4 style="float: left;">+254 (0)700 779 944<br/>
            <small><a href="#">info@pyramidbuilders.co.ke</a></small> 
        </h4>
        </div>
      <!-- end phone -->
      <div class="language2"> </div>
      <!-- end language -->
      <div class="hamburger"> <span></span> <span></span> <span></span><span></span> </div>
      <!-- end hamburger --> 
    </div>
    <!-- end upper-side -->
    <div class="menu">
      <ul style="display: none">
        <li><a href="/about-us">About</a></li>
       <!-- <li><a href="/now-selling">Now Selling</a></li>-->
        <li><a href="/our-projects">Projects</a></li>
        <li><a href="/contact-us">Contact</a></li>
      </ul>
    </div>
    <!-- end menu --> 
  </div>
  <!-- end container --> 
</nav>
<!-- end navbar -->
{{ $slot }}
<section class="footered">
       @livewire('user.newsletter-component')
  <!-- end container --> 
</section>
 <!-- end mail list --> 
<footer class="footer">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.05s"> <img src="{{ asset('assets/user/images/logo-light.png')}}" alt="Image" class="logo">
        <p>Whether you are entertaining guests or just want to spend a day in the comfortable luxury of your home, each space in our homes is designed to create lasting impressions that will be appreciated for generations.</p>
        <!-- end select-box --> 
      </div>
      <!-- end col-4 -->
      <div class="col-lg-2 col-md-6 wow fadeInUp" data-wow-delay="0.10s">
         <div class="contact-box">
          <h5>Address Infos</h5>
          <p>P.O. Box 17575, Enterprise - Rd <br/>
             00500 Nairobi, Kenya</p>
        </div>
        <!-- end contact-box --> 
      </div>
      <!-- end col-2 -->
      <div class="col-lg-2 col-md-6 wow fadeInUp" data-wow-delay="0.15s">
        <div class="contact-box">
          <h5>Offices</h5>
          <p>Pyramid Builders,1st Floor, Woodridge Center, Wood Avenue, KIlimani</p>
        </div>
        <!-- end contact-box --> 
      </div>
      <!-- end col-2 -->
      <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.20s">
        <div class="contact-box">
          <h5>CALL CENTER</h5>
          <h3>+254 722 981 125 <br/>+254 720 150 988</h3>
          <p><a href="#">info@pyramidbuilders.co.ke</a></p>
          <ul>
            <!--<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
            <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>-->
            <li><a href="#"><i class="fab fa-youtube"></i></a></li>
          </ul>
        </div>
        <!-- end contact-box --> 
      </div>
      <!-- end col-4 -->
      <div class="col-12"> <span class="copyright">© {{ now()->year }} Pyramid Developers</span> <span class="creation">Site created by <a href="#">ovakast</a></span> </div>
      <!-- end col-12 --> 
    </div>
    <!-- end row --> 
  </div>
  <!-- end container --> 
</footer>
<!-- end footer --> 

<!-- JS FILES --> 
<script src="{{ asset('assets/user/js/jquery.min.js')}}"></script> 
<script src="{{ asset('assets/user/js/popper.min.js')}}"></script> 
<script src="{{ asset('assets/user/js/bootstrap.min.js')}}"></script> 
<script src="{{ asset('assets/user/js/swiper.min.js')}}"></script> 
<script src="{{ asset('assets/user/js/fancybox.min.js')}}"></script> 
<script src="{{ asset('assets/user/js/odometer.min.js')}}"></script> 
<script src="{{ asset('assets/user/js/wow.min.js')}}"></script> 
<script src="{{ asset('assets/user/js/text-rotater.js')}}"></script> 
<script src="{{ asset('assets/user/js/jquery.stellar.js')}}"></script> 
<script src="{{ asset('assets/user/js/isotope.min.js')}}"></script> 
<script src="{{ asset('assets/user/js/scripts.js')}}"></script>
@livewireScripts
<script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v0.x.x/dist/livewire-sortable.js"></script>
</body>
</html>