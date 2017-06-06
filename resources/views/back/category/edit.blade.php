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
		          {!! Form::inputMacro('text', 'title', 'category_title', $category->title, old('title')) !!}
         			@include('partials.flash-error-field', ['field' => 'title'])
		        </div>
		      </div>

		      <div class="row">
		        <div class="input-field col s12">
					{!! Form::submitMacro('edit', 'category') !!}
				</div>
		      </div>
		      </div>
		    </form>
		  </div>
	</div>
</div>

@endsection








