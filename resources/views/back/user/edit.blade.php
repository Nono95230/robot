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
		          <input id="user_name" name="name" type="text" class="validate" value="{{$user->name}}">
		          <label for="user_name">Name</label>
         			@include('partials.flash-error-field', ['field' => 'name'])
		        </div>
		        <div class="input-field col s4">
		          <input id="user_email" name="email" type="email" class="validate" value="{{$user->email}}">
		          <label for="user_email">Email</label>
         			@include('partials.flash-error-field', ['field' => 'email'])
		        </div>
				<div class="input-field col s4">
					<select name="role"  >
						<option disabled {{ selected_fields('default' , 'choose' , 'selected') }}>Choose his role</option>
						<option  value="administrator"  {{ selected_fields('administrator' , $user->role, 'selected') }} >Administrator</option>
						<option  value="editor" {{ selected_fields(  'editor' , $user->role, 'selected') }} >Editor</option>
					</select>
					<label>Role</label>

         			@include('partials.flash-error-field', ['field' => 'role'])

				</div>
		      </div>
		      <div class="row">
		        <div class="input-field col s6">
		          <input id="user_password" name="password" type="password" class="validate">
		          <label for="user_password">Password</label>
         			@include('partials.flash-error-field', ['field' => 'password'])
		        </div>
		        <div class="input-field col s6">
		          <input id="user_confirm_password" name="confirm_password" type="password" class="validate">
		          <label for="user_confirm_password">Confirm Password</label>
         			@include('partials.flash-error-field', ['field' => 'confirm_password'])
		        </div>
		      </div>

		      <div class="row">
		        <div class="input-field col s12">
					<button class="btn waves-effect waves-light" type="submit">Add this user
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








