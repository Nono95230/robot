@extends('layouts.master')

@section('title', $title)


@section('content_header')
<div class="row">
    <div class="col s12">
		<h2 class="left">@yield('title')</h2>
		<a class="waves-effect waves-light btn right red-site" href="{{ route('user.store') }}">
			<i class="material-icons left">list</i>Return to the users's list
		</a>
	</div>
</div>
@endsection


@section('content')

<div class="row">
    <div class="col s12">
		<div class="row">

    		@include('partials.flash-errors')

		    <form class="col s12" method="post" action="{{ route('user.update', $user->id) }}">
    		  {{ csrf_field() }} {{-- token pour protéger votre formulaire CSRF --}}
    		  {{ method_field('PUT') }}
		      <div class="row">
		        <div class="input-field col s4">
		        	{!! Form::inputMacro('text', 'name', 'user_name', $user->name, old('name')) !!}
         			@include('partials.flash-error-field', ['field' => 'name'])
		        </div>
		        <div class="input-field col s4">
		          <input id="user_email" name="email" type="email" class="validate" value="{{$user->email}}">
		          <label for="user_email">Email</label>
         			@include('partials.flash-error-field', ['field' => 'email'])
		        </div>
				<div class="input-field col s4">
		        	{!! Form::selectMacro(true, 'role', 'role', ['administrator', 'editor'], $user->role, old('role')) !!}
         			@include('partials.flash-error-field', ['field' => 'role'])

				</div>
		      </div>
		      <div class="row">
		        <div class="input-field col s6">
		        	{!! Form::inputMacro('password', 'password', 'user_password') !!}
         			@include('partials.flash-error-field', ['field' => 'password'])
		        </div>
		        <div class="input-field col s6">
		        	{!! Form::inputMacro('password', 'confirm_password', 'user_confirm_password') !!}
         			@include('partials.flash-error-field', ['field' => 'confirm_password'])
		        </div>
		      </div>

		      <div class="row">
		        <div class="input-field col s12">
					{!! Form::submitMacro('edit', 'user') !!}
				</div>
		      </div>
		      </div>
		    </form>
		  </div>
	</div>
</div>

@endsection








