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
		          <input id="robot_name" name="name" type="text" class="validate" value="{{old('name')}}">
		          <label for="robot_name">Name</label>
         			@if($errors->has('name')) <div class="error">{{$errors->first('name')}}</div>@endif
		        </div>
				<div class="input-field col s6">
					<select name="category_id"  >
						<option disabled selected>Choose your category</option>
						@foreach ($categories as $id => $category)
							<option  value="{{ $id }}" {{ selected_fields($id,  old('category_id'), 'selected') }} >{{ $category }}</option>
						@endforeach
						<option value="" {{ selected_fields(null,  old('category_id'), 'selected') }}>Pas de catégorie</option>
					</select>
					<label>Category</label>
         			@if($errors->has('category_id')) <div class="error">{{$errors->first('category_id')}}</div>@endif
				</div>
		      </div>
		      <div class="row">
		        <div class="input-field col s12">
		          <textarea id="robot_description" name="description" class="materialize-textarea">{{old('description')}}</textarea>
		          <label for="robot_description">Description</label>
         			@if($errors->has('description')) <div class="error">{{$errors->first('description')}}</div>@endif
		        </div>
		      </div>
		      <div class="row">
		        <div class="input-field col s12">
		    		@foreach ($tags as $id => $tag)
					    <p>
					      <input type="checkbox" name="tags[]" id="robot_tag{{ $id }}" value="{{ $id }}" {{ selected_fields($id, old('tags')) }}  />
					      <label for="robot_tag{{ $id }}">{{ $tag }}</label>
					    </p>
		    		@endforeach
         			@if($errors->has('tags')) <div class="error">{{$errors->first('tags')}}</div>@endif
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
         			@if($errors->has('status')) <div class="error">{{$errors->first('status')}}</div>@endif
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
					<button class="btn waves-effect waves-light" type="submit">Add this robot
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








