
	
	@if($errors->has($field)) 
		<div class="card alert red">
		  <div class="card-content white-text">
		    <p>{{$errors->first($field)}}</p>
		  </div>
		  <button type="button" class="close white-text alert-close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">×</span>
		  </button>
		</div>
	@endif

