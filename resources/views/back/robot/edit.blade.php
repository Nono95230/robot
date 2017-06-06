@extends('layouts.master')

@section('title', $title)


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

		    <form class="col s12" method="post" action="{{ route('robot.update', $robot->id) }}" enctype="multipart/form-data">
	    		{{ csrf_field() }} {{-- token pour protéger votre formulaire CSRF --}}
	    		{{ method_field('PUT') }}
		      <div class="row">
		        <div class="input-field col s6">
		        	{!! Form::inputMacro('text', 'name', 'robot_name', $robot->name, old('name')) !!}
         			@include('partials.flash-error-field', ['field' => 'name'])

		        </div>
				<div class="input-field col s6">

					{!! Form::selectMacro(false, 'category_id', 'category', $categories, $robot->category_id, old('category_id') ) !!}
         			@include('partials.flash-error-field', ['field' => 'category_id'])
				</div>
		      </div>
		      <div class="row">
		        <div class="input-field col s12">
		          {!! Form::textAreaMacro('description', 'robot_description', $robot->description, old('description') ) !!}
         			@include('partials.flash-error-field', ['field' => 'description'])
		        </div>
		      </div>
		      <div class="row">
		        <div class="input-field col s12">
		    		@foreach ($tags as $id => $tag)
					    <p>
					      @if( old('tags') != null && $robot->isTag($id) != old('tags') )
					      	<input type="checkbox" name="tags[]" id="robot_tag{{ $id }}" value="{{ $id }}" {{ selected_fields($id, old('tags') ) }} />
					      @else
					      	<input type="checkbox" name="tags[]" id="robot_tag{{ $id }}" value="{{ $id }}" {{ $robot->isTag($id)? 'checked' : '' }} />
					      @endif
					      <label for="robot_tag{{ $id }}">{{ $tag }}</label>
					    </p>
		    		@endforeach
         			@include('partials.flash-error-field', ['field' => 'tags'])
				</div>
		      </div>
		      <div class="row">
		        <div class="input-field col s12 l3">
				  <div class="switch">
				    <label>
				      Unpublished
				      {{--@if( old('status') === null || old('status') != null && $robot->status != old('status') )
				      	<input name="status" type="checkbox" value="published" {{ selected_fields('published', old('status') )  }}>
				      @elseif( old('status') === null && $robot->status != old('status') )--}}
				      	<input name="status" type="checkbox" value="published" {{ selected_fields('published', $robot->status) }}>
				      {{--@endif--}}
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
				        <input name="file" type="file">
				      </div>
				      <div class="file-path-wrapper">
				        <input class="file-path validate" type="text">
				      </div>
				    </div>
				</div>

		      <div class="row">
		        <div class="input-field col s12">					
					{!! Form::submitMacro('edit','robot') !!}
				</div>
		      </div>
		      </div>
		    </form>
		  </div>
	</div>
</div>

@endsection








