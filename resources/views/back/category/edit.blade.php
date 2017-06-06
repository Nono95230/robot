@extends('layouts.master')

@section('title', $title)


@section('content_header')
<div class="row">
    <div class="col s12">
		<h2 class="left">@yield('title')</h2>
		<a class="waves-effect waves-light btn right red-site" href="{{ route('category.store') }}">
			<i class="material-icons left">list</i>Return to the categories's list
		</a>
	</div>
</div>
@endsection


@section('content')

<div class="row">
    <div class="col s12">
		<div class="row">

    		@include('partials.flash-errors')

		    <form class="col s12" method="post" action="{{ route('category.update', $category->id) }}">
    		  {{ csrf_field() }} {{-- token pour protéger votre formulaire CSRF --}}
    		  {{ method_field('PUT') }}
		      <div class="row">
		        <div class="input-field col s6">
		          <input id="category_title" name="title" type="text" class="validate" value="{{$category->title}}">
		          <label for="category_title">Title</label>
         			@include('partials.flash-error-field', ['field' => 'title'])
		        </div>
		      </div>

		      <div class="row">
		        <div class="input-field col s12">
					<button class="btn waves-effect waves-light" type="submit">Add this category
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








