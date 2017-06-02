@extends('layouts.master')

@section('title', 'Robots\'s list')

@section('style')
  <style >
  </style>
@endsection

@section('content_header')
<div class="row">
    <div class="col s12">
		<h2 class="left">@yield('title')</h2>
		@if (Auth::user()->can('create', App\Robot::class))
			<a class="waves-effect waves-light btn right green" href="{{ url('admin/robot/create') }}">
				<i class="material-icons left">add</i>Add a robot
			</a>
		@else
			<a class="waves-effect waves-light btn right green disabled" href="{{ url('admin/robot/create') }}">
				<i class="material-icons left">add</i>Add a robot
			</a>
		@endif
	</div>
</div>
@endsection


@section('content')

<div class="row">
    <div class="col s12">
		<!-- <table class="bordered striped hightlight centered responsive-table">
		 --><table class="bordered striped hightlight">
			<thead>
				<tr>
					<th>Name</th>
					<th>Created At</th>
					<th>Created By</th>
					<th>Category</th>
					<th>Tags</th>
					<th>Status</th>
					<th>Published At</th>
					<th>ACTION</th>
				</tr>
			</thead>

			<tbody>

	    		@foreach ($robots as $robot)
					<tr>
						<td>
							<a href="{{ url('robot', $robot->id) }}">
								{{ $robot->name }}
							</a>
						</td>
						<td>{{ $robot->created_at }}</td>
						<td>{{ $robot->user? $robot->user->name : '' }}</td>
						<td>
							@if( $robot->category )
								<a href="{{ url('category', $robot->category->id)}}">
									{{ $robot->category? $robot->category->title : ''}}
								</a>
							@else
								No Category
							@endif
						</td>
						<td>
							@forelse($robot->tags as $tag)
						        <div class="chip">
						            <a href="{{ url('tag',$tag->id)}}">{{ $tag->name }}</a>
						        </div>
							@empty
								No tags
							@endforelse
						</td>
						<td>{{ $robot->status }}</td>
						<td>{{ $robot->published_at }}</td>
						<td>
							@if (Auth::user()->can('update', $robot))
							    <a href="{{ route('robot.edit',$robot->id) }}" class="waves-effect waves-light btn btn-icon cyan"><i class="material-icons">edit</i></a>
							@else
    							<a href="{{ route('robot.edit',$robot->id) }}" class="waves-effect waves-light btn btn-icon cyan disabled"><i class="material-icons">edit</i></a>
							@endif

							@if (Auth::user()->can('delete', $robot))
								<!-- Modal Trigger -->
								<a href="#modal{{ $robot->id }}" class="waves-effect waves-light btn btn-icon red"><i class="material-icons">delete</i></a>
							@endif
							<!-- Modal Structure -->
							<div id="modal{{ $robot->id }}" class="modal">
								<div class="modal-content">
									<h4>Are you sure you want to remove the robot : <strong>{{ $robot->name }}</strong></h4>
									<p>Be careful, this action is permanent and definitive, you will not be able to go back !</p>
									<form method="post" action="{{ route('robot.destroy',$robot->id) }}">
							    		{{ csrf_field() }} {{-- token pour protéger votre formulaire CSRF --}}
							    		{{ method_field('DELETE') }}
										<button type="submit" class="modal-action modal-close waves-effect waves-light btn green">Agree</button>
										<a href="#!" class="modal-action modal-close waves-effect waves-light btn red right">Disagree</a>
									</form>
								</div>
							</div>

						</td>
					</tr>
		
	    		@endforeach
			</tbody>
		</table>
	</div>
</div>




@endsection








