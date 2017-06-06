@section('flash-message')

	@if($flash = session('message'))

		@if( $flash[0] === 'success')
			<div id="card-alert" class="card alert green">
		      <div class="card-content white-text">
		        <p><i class="mdi-navigation-check"></i> {{ $flash[1] }}</p>
		      </div>
		      <button type="button" class="close white-text alert-close" data-dismiss="alert" aria-label="Close">
		        <span aria-hidden="true">×</span>
		      </button>
		    </div>
		@else
			<div id="card-alert" class="card alert red">
		      <div class="card-content white-text">
		        <p><i class="mdi-alert-error"></i> <strong>WARNING : </strong>{{ $flash[1] }}</p>
		      </div>
		      <button type="button" class="close white-text alert-close" data-dismiss="alert" aria-label="Close">
		        <span aria-hidden="true">×</span>
		      </button>
		    </div>
		@endif

	@endif

@show
