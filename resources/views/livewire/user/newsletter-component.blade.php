<div>
     <div class="container">
    <div class="row">
   <div class="col-lg-6 sidebar">
        @if (\Session::has('success'))
            <div class="alert alert-success">
              <p>{{ \Session::get('success') }}</p>
            </div><br />
          @endif
          @if (\Session::has('failure'))
            <div class="alert alert-danger">
              <p>{{ \Session::get('failure') }}</p>
            </div><br />
          @endif
        <div class="widget">
    				<form  wire:submit.prevent="store">
              <p>Join our mailing list</p>
    					<input type="text" placeholder="Enter your email">
    					<button type="submit"><i class="fas fa-envelope-open"></i></button>
    				</form>
    			</div>
      </div>
    </div>
     </div>
</div>
