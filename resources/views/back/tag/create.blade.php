@extends('layouts.master')

@section('title', 'Add a tag')


@section('content_header')
<div class="row">
    <div class="col s12">
		<h2 class="left">@yield('title')</h2>
		<a class="waves-effect waves-light btn right red-site" href="{{ route('tag.store') }}">
			<i class="material-icons left">list</i>Return to the tags's list
		</a>
	</div>
</div>
@endsection


@section('content')

<div class="row">
    <div class="col s12">
		<div class="row">

    		@include('partials.flash-errors')

		    <form class="col s12" method="post" action="{{ url('admin/tag/') }}">
    		  {{ csrf_field() }} {{-- token pour protéger votre formulaire CSRF --}}
		      <div class="row">
		        <div class="input-field col s6">
		          <input id="tag_name" name="name" type="text" class="validate" value="{{old('name')}}">
		          <label for="tag_name">Name</label>
         			@include('partials.flash-error-field', ['field' => 'name'])
		        </div>
		      </div>

		      <div class="row">
		        <div class="input-field col s12">
					<button class="btn waves-effect waves-light" type="submit">Add this tag
						<i class="material-icons right">send</i>
					</button>
				</div>
		      </div>
		      </div>
		    </form>
		  </div>
	</div>
</div>

@endsection








