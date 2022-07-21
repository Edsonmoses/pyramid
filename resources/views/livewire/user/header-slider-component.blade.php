<div>
   <header class="slider">
  <div class="slider-container">
    <div class="swiper-wrapper">
      @foreach($slider as $value)
      <div class="swiper-slide" data-background="{{ asset('assets/user/images')}}/{{ $value->image }}" data-stellar-background-ratio="1.15">
        <div class="container">
          <h1>{!! $value->name !!}</h1>
          <h2>{!! $value->location !!}</h2>
            <div class="item">
                <a href="/projects-detail/{{ $value->url }}">
                    <p class="label success new-label"><span class="align">{{ $value->btname }} <i class="fas fa-caret-right"></i></span></p>
                </a>
            </div>
        </div>
        <!-- end container --> 
      </div>
      @endforeach
      <!-- end swiper-slide -->
    </div>
    <!-- Add Pagination -->
    <div class="inner-elements">
      <div class="container">
        <div class="pagination"></div>
        <!-- end pagination -->
        <div class="button-prev">PREV</div>
        <!-- end button-prev -->
        <div class="button-next">NEXT</div>
        <!-- end button-next -->
        <!--<div class="social-media">
          <h6>SOCIAL MEDIA</h6>
          <ul>
            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
            <li><a href="#"><i class="fab fa-google"></i></a></li>
            <li><a href="#"><i class="fab fa-youtube"></i></a></li>
          </ul>
        </div>-->
        <!-- end social-media --> 
      </div>
      <!-- end container --> 
    </div>
    <!-- end inner-elements --> 
  </div>
  <!-- end slider-container --> 
</header>
</div>
