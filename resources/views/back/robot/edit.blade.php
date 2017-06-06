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
		          <input id="robot_name" name="name" type="text" class="validate" value="{{$robot->name}}">
		          <label for="robot_name">Name</label>
         			@include('partials.flash-error-field', ['field' => 'name'])
		        </div>
				<div class="input-field col s6">
					<select name="category_id">
						<option disabled selected>Choose your category</option>
						@foreach ($categories as $id => $category)
							<option value="{{ $id }}" {{ selected_fields($id,  $robot->category_id , 'selected') }} >{{ $category }}</option>
						@endforeach
						<option value="" {{ selected_fields(null, $robot->category_id, 'selected') }}>Pas de catégorie</option>
					</select>
					<label>Category</label>
         			@include('partials.flash-error-field', ['field' => 'category_id'])
				</div>
		      </div>
		      <div class="row">
		        <div class="input-field col s12">
		          <textarea id="robot_description" name="description" class="materialize-textarea">{{ $robot->description }}</textarea>
		          <label for="robot_description">Description</label>
         			@include('partials.flash-error-field', ['field' => 'description'])
		        </div>
		      </div>
		      <div class="row">
		        <div class="input-field col s12">
		    		@foreach ($tags as $id => $tag)
					    <p>
					      <input type="checkbox" name="tags[]" id="robot_tag{{ $id }}" value="{{ $id }}" {{ $robot->isTag($id)? 'checked' : '' }} />
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
				      <input name="status" type="checkbox" value="published" {{ $robot->status == 'published' ? 'checked' : ''  }}>
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
					<button class="btn waves-effect waves-light" type="submit">Edit this robot
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








