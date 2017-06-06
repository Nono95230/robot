@extends('layouts.master')

@section('title', 'Add a robot')


@section('content_header')
<div class="row">
    <div class="col s12">
		<h2 class="left">@yield('title')</h2>
		<a class="waves-effect waves-light btn right red-site" href="{{ route('robot.store') }}">
			<i class="material-icons left">list</i>Return to the robots's list
		</a>
	</div>
</div>
@endsection


@section('content')

<div class="row">
    <div class="col s12">
		<div class="row">

    		@include('partials.flash-errors')

		    <form class="col s12" method="post" action="{{ url('admin/robot/') }}" enctype="multipart/form-data">
	    		{{ csrf_field() }} {{-- token pour protéger votre formulaire CSRF --}}
		      <div class="row">
		        <div class="input-field col s6">
		        	{!! Form::inputMacro('text', 'name', 'robot_name', old('name')) !!}

         			@include('partials.flash-error-field', ['field' => 'name'])

		        </div>
				<div class="input-field col s6">

					{!! Form::selectMacro(false, 'category_id', 'category', $categories, old('category_id')) !!}

         			@include('partials.flash-error-field', ['field' => 'category_id'])

				</div>
		      </div>
		      <div class="row">
		        <div class="input-field col s12">
		          {!! Form::textAreaMacro('description', 'robot_description', old('description') ) !!}

         			@include('partials.flash-error-field', ['field' => 'description'])

		        </div>
		      </div>
		      <div class="row">
		        <div class="input-field col s12">
		          {!! Form::checkboxMacro( 'tags', 'robot_tag', $tags, old('tags') ) !!}
					
         			@include('partials.flash-error-field', ['field' => 'tags'])

				</div>
		      </div>
		      <div class="row">
		        <div class="input-field col s12 l3">
				  <div class="switch">
				    <label>
				      Unpublished
				      <input name="status" type="checkbox" value="published" {{ selected_fields("published", old('status')) }} >
				      <span class="lever"></span>
				      Published
				    </label>
					
         			@include('partials.flash-error-field', ['field' => 'status'])

				  </div>
				</div>
		        <div class="input-field col s12 l9">
				    <div class="file-field input-field">
				      <div class="btn">
				        <span>File</span>
				        <input name="link" type="file">
				      </div>
				      <div class="file-path-wrapper">
				        <input class="file-path validate" type="text">
				      </div>
				    </div>
				</div>

		      <div class="row">
		        <div class="input-field col s12">
					{!! Form::submitMacro('add','robot') !!}
				</div>
		      </div>
		      </div>
		    </form>
		  </div>
	</div>
</div>

@endsection








