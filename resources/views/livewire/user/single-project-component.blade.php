<div>
    <header class="page-header" data-background="{{ asset('assets/user/images')}}/{{ $project->image }}" data-stellar-background-ratio="1.15">
	<div class="container">
		{{-- <h1>Aboutus</h1> --}}
	</div>
	<!-- end container -->
</header>

<!-- end page-header -->
<section class="about-content mb-5">
	<div class="container">
		<div class="row ">
       {{-- <div class="col-md-12 text-align-left mb-5 text-blue">
            <h3 style="font-size: 1.3em"><strong>{{ $project->title }}</strong> </h3>
        </div>--}}
        <!-- end col-12 -->
        @if ($project->slug == 'tende-ridge')
       <div class="col-md-3 col-sm-12 text-align-center leftCont">
         <h6 style="color: #C8773D !important; border-right: 1px solid #C8773D !important;">6</h6>
        <p>CONTEMPORARY DESIGNED TOWNHOUSES <span></span></p>
       
       </div>
       <!-- end col-3 -->
       <div class="col-md-3 col-sm-12 text-align-center leftCont">
        <h6 style="color: #C8773D !important; border-right: 1px solid #C8773D !important;">5</h6>
        <p>BEDROOMS <br/>ALL ENSUITE<br/><span>GUESTROOM INCLUDED</span> </p>
       </div>
       <!-- end col-3 -->
       <div class="col-md-3 col-sm-12 text-align-center leftCont">
        <h6 style="color: #C8773D !important; border-right: 1px solid #C8773D !important;">1</h6>
        <p>SELF<br/>CONTAINED <br/>DSQs</p>
       </div>
       <!-- end col-3 -->
       <div class="col-md-3 col-sm-12 col-sm-12 text-align-center leftCont">
        <h6 style="color: #C8773D !important; border-right: 1px solid #C8773D !important;">1</h6>
        <p>EXCLUSIVE<br/> GATED LOCATION <br/><span>KANJATA ROAD, LAVINGTON</span></p>
        
       </div>
       @else
        <div class="col-md-3 col-sm-12 text-align-center leftCont">
         <h6>9</h6>
        <p>MASTERFULLY DESIGNED TOWNHOUSES <span>MEDITERRANEAN STYLE</span></p>
       
       </div>
       <!-- end col-3 -->
       <div class="col-md-3 col-sm-12 text-align-center leftCont">
        <h6>5</h6>
        <p>BEDROOMS <br/>ALL ENSUITE<br/><span>GUESTROOM INCLUDED</span> </p>
       </div>
       <!-- end col-3 -->
       <div class="col-md-3 col-sm-12 text-align-center leftCont">
        <h6>2</h6>
        <p>SELF<br/> CONTAINED <br/>DSQs</p>
       </div>
       <!-- end col-3 -->
       <div class="col-md-3 col-sm-12 text-align-center leftCont">
        <h6>1</h6>
        <p>EXCLUSIVE<br/> GATED LOCATION <br/><span>MAJI MAZURI ROAD</span></p>
        
       </div>
       @endif
       <!-- end col-3 -->
		</div>
		<!-- end row -->
    	<!-- gallery section -->
         <div class="pgallery row mt-5">
           @php $i = 1 ;
         @endphp
         @foreach (explode(",",$project->gallery) as $image)
        
            <div class="pgallery-list @if (!empty($image))@if($i==2) col-md-6 col-xs-12 grt @endif @if($i == 3) col-md-6 col-xs-12 glt @endif @if($i == 4) col-md-4 col-xs-12 grt gmt @endif @if($i==5) col-md-4 col-xs-12 gmd gmt @endif @if($i==6) col-md-4 col-xs-12 glt gmt @endif @endif">
               @if (!empty($image))
              <div class="pimage-grid">
                <img src="{{ asset('assets/user/images')}}/{{ $image }}">
                <p style="color:black">{{$i}}</p>
              </div>
              @endif
            </div>
            @php $i++; @endphp
            @endforeach
    </div>
       <!-- gallery section -->
	</div>
	<!-- end container -->
    <!--floor plans-->
    
<header class="slider" style="background: transparent !important">
  <div class="slider-container">
    <div class="swiper-wrapper">
       @foreach (explode(",",$project->floorplan) as $image)
        @if (!empty($image))
          <div class="swiper-slide" data-background="{{ asset('assets/user/images')}}/{{ $image }}" data-stellar-background-ratio="1.15">
            <div class="container">
            </div>
            <!-- end container --> 
          </div>
        @endif
      @endforeach
      <!-- end swiper-slide -->
    </div>
    {{-- Add Pagination -->
    <div class="inner-elements">
      <div class="container">
        <div class="pagination"></div>
        <!-- end pagination -->
        <div class="button-prev">PREV</div>
        <!-- end button-prev -->
        <div class="button-next">NEXT</div>
        <!-- end button-next -->
        <div class="social-media">
          <h6>SOCIAL MEDIA</h6>
          <ul>
            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
            <li><a href="#"><i class="fab fa-google"></i></a></li>
            <li><a href="#"><i class="fab fa-youtube"></i></a></li>
          </ul>
        </div>
        <!-- end social-media --> 
      </div>
      <!-- end container --> 
    </div>--}}
    <!-- end inner-elements --> 
  </div>
  <!-- end slider-container --> 
</header>
    <!--end floor plans-->
</section>
<section class="big-image mb-5">
  <img src="{{ asset('assets/user/images')}}/{{ $project->fimage }}" alt="Image">
  <div class="container">
    <!-- end row --> 
  </div>
  <!-- end container --> 
</section>
<section class="downloads mb-5 mt-10">
  <div class="container">
   <a href="#" wire:click.prevent="export({{$project->id}})"> 
        <img src="{{ asset('assets/user/images/arrow.png')}}" alt="{{$project->name}}">
        <p>VIEW BROCHURE</p>
    </a>
    <!-- end row --> 
  </div>
  <!-- end container --> 
</section>
<!-- end about-content -->
</div>
