<div>
   <section class="logos">
  <div class="container">
    <div class="row">
      @foreach($logos as $value)
      <div class="col-lg-2 col-md-4 col-sm-4 col-6 wow fadeInUp" data-wow-delay="0s">
        <figure> <img src="{{ asset('assets/user/images')}}/{{ $value->image }}" alt="{{ $value->name }}">
          @if ($value->logoUrl == '#')
               <a href="{{ $value->logoUrl }}"><h6>{{ $value->name }}</h6></a>
          @else
                <a href="https://pyramidbuilders.co.ke/our-projects/{{ $value->logoUrl }}"><h6>{{ $value->name }}</h6></a>
          @endif
        </figure>
      </div>
      @endforeach
      <!-- end col-2 -->
    </div>
    <!-- end row --> 
  </div>
  <!-- end container --> 
</section>
</div>
