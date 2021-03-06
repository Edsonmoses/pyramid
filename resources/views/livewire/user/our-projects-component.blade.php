<div>
    <header class="page-header" data-background="{{ asset('assets/user/images/slide03.jpg')}}" data-stellar-background-ratio="1.15">
	<div class="container">
		{{-- <h1>Aboutus</h1> --}}
	</div>
	<!-- end container -->
</header>
<section class="blog" style="padding: 0px 0px 150px 0px !important">
  <div class="container">
		<ul class="nav nav-pills mb-3 ml-3" id="pills-tab" role="tablist">
		<li class="nav-item">
			<a class="nav-link active" id="pills-all-tab" data-toggle="pill" href="#pills-all" role="tab" aria-controls="pills-all" aria-selected="true">All</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" id="pills-nowselling-tab" data-toggle="pill" href="#pills-nowselling" role="tab" aria-controls="pills-nowselling" aria-selected="false">Now Selling</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" id="pills-completed-tab" data-toggle="pill" href="#pills-completed" role="tab" aria-controls="pills-completed" aria-selected="false">Completed</a>
		</li>
		</ul>
		<div class="tab-content" id="pills-tabContent">
		 <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab">
			 <div class="row">
						@foreach ($projects as $project )
							<div class="col-lg-4 overlay-container">
								<div class="content">
									@if ($project->disable == 'inactive')
										@else
										<a href="{{ route('projects.detail',['slug'=>$project->slug]) }}" class="content-link">
										@endif
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
										@if ($project->disable == 'inactive')
										@else
										<a href="{{ route('projects.detail',['slug'=>$project->slug]) }}" class="content-link">View project <i class="fas fa-caret-right"></i></a>
										@endif
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
		<div class="tab-pane fade" id="pills-nowselling" role="tabpanel" aria-labelledby="pills-nowselling-tab">
			 <div class="row">
						@foreach ($projects as $project )
						  @if ($project->status == 'nowselling')
							<div class="col-lg-4 overlay-container">
								<div class="content">
									@if ($project->disable == 'inactive')
										@else
										<a href="{{ route('projects.detail',['slug'=>$project->slug]) }}" class="content-link">
										@endif
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
										@if ($project->disable == 'inactive')
										@else
										<a href="{{ route('projects.detail',['slug'=>$project->slug]) }}" class="content-link">View project <i class="fas fa-caret-right"></i></a>
										@endif
									</div>
									</a>
								</div>
							</div>
					   @endif
					@endforeach
					<!-- end post -->
					<!-- end col-4 -->
				</div>
				<!-- end row -->
		</div>
		<div class="tab-pane fade" id="pills-completed" role="tabpanel" aria-labelledby="pills-completed-tab">
			 <div class="row">
						@foreach ($projects as $project )
							@if ($project->status == 'completed')
								<div class="col-lg-4 overlay-container">
									<div class="content">
										@if ($project->disable == 'inactive')
										@else
										<a href="{{ route('projects.detail',['slug'=>$project->slug]) }}" class="content-link">
										@endif
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
											<p class="content-text">{{ Str::limit($project->desc, 500,'') }}</p>
											@if ($project->disable == 'inactive')
											@else
											<a href="{{ route('projects.detail',['slug'=>$project->slug]) }}" class="content-link">View project <i class="fas fa-caret-right"></i></a>
											@endif
										</div>
										</a>
									</div>
								</div>
							@endif
					@endforeach
					<!-- end post -->
					<!-- end col-4 -->
				</div>
				<!-- end row -->
		</div>
		</div>
<!--tabs-->
  </div>
  <!-- end container --> 
</section>
</div>
  <script>
const phrases = document.querySelectorAll('.content-titles');
for (const phrase of phrases) {
  const words = phrase.innerHTML.split(' ');
  words[1] = `<span class="overtextColor">${words[1]}</span>`; // this would return the second word
  phrase.innerHTML = words.join(' ');
}
</script>