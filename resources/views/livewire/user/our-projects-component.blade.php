<div>
    <header class="page-header" data-background="{{ asset('assets/user/images/slide03.jpg')}}" data-stellar-background-ratio="1.15">
	<div class="container">
		{{-- <h1>Aboutus</h1> --}}
	</div>
	<!-- end container -->
</header>
<section class="blog">
  <div class="container">
    <div class="row">
			@foreach ($projects as $project )
        <div class="col-lg-4 overlay-container">
			<div class="content">
				<a href="{{ route('projects.detail',['slug'=>$project->slug]) }}" target="_self">
				<div class="content-overlay"></div>
				<div class="img-overlay "></div>
				<img class="content-image" src="{{ asset('assets/user/images')}}/{{ $project->image }}">
				<div class="overtext">
				<h3 class="content-titles">{{ $project->name }}</h3>
				 @if ($project->disable == 'inactive')
				 @else
				<a href="{{ route('projects.detail',['slug'=>$project->slug]) }}" class="content-link">View project <i class="fas fa-caret-right"></i></a>
				@endif
				</div>
				<div class="content-details fadeIn-bottom">
					<h3 class="content-title">{{ $project->name }}</h3>
					<p class="content-text">{{ Str::limit($project->desc, 700) }}</p>
				</div>
				</a>
			</div>
        </div>
		@endforeach
    	<!-- end post -->
    	<!-- end col-4 -->
    </div>
    <!-- end row -->
  </div>
  <!-- end container --> 
</section>
</div>
