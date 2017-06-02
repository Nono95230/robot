@section('flash-errors')

	 @if (count($errors) > 0)
	    <div class="alert alert-danger">
	        <p>Une erreure est survenue dans le formulaire</p>
	        <ul>
	            @foreach($errors->all() as $message)
	            <li>{{$message}}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif
	
@show
