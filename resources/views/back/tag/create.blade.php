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
		        	{!! Form::inputMacro('text', 'name', 'tag_name', old('name')) !!}
         			@include('partials.flash-error-field', ['field' => 'name'])
		        </div>
		      </div>

		      <div class="row">
		        <div class="input-field col s12">
					{!! Form::submitMacro('add', 'tag') !!}
				</div>
		      </div>
		      </div>
		    </form>
		  </div>
	</div>
</div>

@endsection








