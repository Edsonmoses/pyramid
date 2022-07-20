<div>
@foreach($property as $value)
  <section class="get-consultation" data-background="{{ asset('assets/user/images')}}/{{ $value->image }}" data-stellar-background-ratio="0.9">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-8 fadeInUp wow">
        <div class="content-box"> <b>06</b>
          <h4><span>{{ $value->name }}</span> {{ $value->nameb }}</h4>
          <h3> {{ $value->subname }}</h3>
          <p>{{ $value->desc }}</p>
          <a href="{{ $value->url }}">Read More <i class="fas fa-caret-right"></i></a> </div>
        <!-- end content-box --> 
      </div>
      <!-- end col-6 --> 
    </div>
    <!-- end row --> 
  </div>
  <!-- end container --> 
</section>
@endforeach
<!-- end get-consultation -->
</div>
