@extends('layouts.master')

@section('title', 'Users\'s list')

@section('style')
  <style >
  </style>
@endsection

@section('content_header')
<div class="row">
    <div class="col s12">
		<h2 class="left">@yield('title')</h2>
		@if (Auth::user()->can('create', App\User::class))
			<a class="waves-effect waves-light btn right green" href="{{ url('admin/user/create') }}">
				<i class="material-icons left">add</i>Add a user
			</a>
		@else
			<a class="waves-effect waves-light btn right green disabled" href="{{ url('admin/user/create') }}">
				<i class="material-icons left">add</i>Add a user
			</a>
		@endif
	</div>
</div>
@endsection


@section('content')

<div class="row">
    <div class="col s12">
		<table class="bordered striped hightlight">
			<thead>
				<tr>
					<th>Name</th>
					<th>Email</th>
					<th>Role</th>
					<th>Created At</th>
	    			@foreach ($users as $user)
						@if ( $user->id === 1 && Auth::user()->can('update',  $user) )
							<th>ACTION</th>
						@endif
		    		@endforeach
				</tr>
			</thead>

			<tbody>

	    		@foreach ($users as $user)
					<tr>
						<td>
							<a href="{{ url('user', $user->id) }}">
								{{ $user->name }}
							</a>
						</td>
						<td>{{ $user->email }}</td>
						<td>{{ $user->role }}</td>
						<td>{{ $user->created_at }}</td>
						@if (Auth::user()->can('update', $user))
							<td>
							    <a href="{{ route('user.edit',$user->id) }}" class="waves-effect waves-light btn btn-icon cyan"><i class="material-icons">edit</i></a>
								<!-- Modal Trigger -->
								<a href="#modal{{ $user->id }}" class="waves-effect waves-light btn btn-icon red"><i class="material-icons">delete</i></a>
								<!-- Modal Structure -->
								<div id="modal{{ $user->id }}" class="modal">
									<div class="modal-content">
										<h4>Are you sure you want to remove the user : <strong>{{ $user->name }}</strong></h4>
										<p>Be careful, this action is permanent and definitive, you will not be able to go back !</p>
										<form method="post" action="{{ route('user.destroy',$user->id) }}">
								    		{{ csrf_field() }} {{-- token pour protéger votre formulaire CSRF --}}
								    		{{ method_field('DELETE') }}
											<button type="submit" class="modal-action modal-close waves-effect waves-light btn green">Agree</button>
											<a href="#!" class="modal-action modal-close waves-effect waves-light btn red right">Disagree</a>
										</form>
									</div>
								</div>

							</td>
						@endif
					</tr>
		
	    		@endforeach
			</tbody>
		</table>
	</div>
</div>




@endsection








