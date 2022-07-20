<header class="page-header" data-background="{{ asset('assets/user/images/slide02.jpg')}}" data-stellar-background-ratio="1.15">
	<div class="container">
		<!--<h1>About us</h1>-->
	</div>
	<!-- end container -->
</header>
<!-- end page-header -->
<section class="about-content">
	<div class="container">
		<div class="row mb-5">
        <div class="col-md-12 text-align-left mb-5">
            <h3 style="font-size: 2.3em"><strong>We strive to create lasting value through quality construction, superior design and an unparalleled commitment to customer service.</strong> </h3>
        </div>
        <!-- end col-12 -->
        @foreach($pages as $value)
       <div class="col-md-4 text-align-center page">
       <img src="{{ asset('assets/user/images')}}/{{ $value->image }}" alt="{{ $value->name }}">
       <div class="text-align-left">
        <h6>{{ $value->name }}</h6>
       	<p>{{ $value->desc }}</p>
        </div>
       </div>
       @endforeach
       <!-- end col-4 -->
		</div>
		<!-- end row -->
	</div>
	<!-- end container -->
</section>
<!-- end about-content -->