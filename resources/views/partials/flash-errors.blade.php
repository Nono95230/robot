@section('flash-errors')

 	@if (count($errors) > 0)

		<div id="card-alert" class="card alert red">
		  <div class="card-content white-text">
		    <p><i class="mdi-alert-error"></i> <strong>WARNING : </strong>Une erreur est survenue dans le formulaire</p>
		    <ul style="">
        		@foreach($errors->all() as $message)
		    		<li>{{$message}}</li>
        		@endforeach
		    </ul>
		  </div>
		  <button type="button" class="close white-text alert-close" data-dismiss="alert" aria-label="Close">
		    <span aria-hidden="true">×</span>
		  </button>
		</div>
	@endif
	
@show
