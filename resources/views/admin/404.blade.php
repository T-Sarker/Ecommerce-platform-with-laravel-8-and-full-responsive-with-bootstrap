<h1>Not Found</h1>

<h2>
	
	@if(Session::has('err'))
		<div class="alert alert-danger mt-3 mb-2">
          <strong><i class="mdi mdi-alert btn-icon-prepend"></i></strong> {{Session::get('err')}}
      	</div>
	@endif
</h2>