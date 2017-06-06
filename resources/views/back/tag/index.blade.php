@extends('layouts.master')

@section('title', 'Tags\'s list')

@section('style')
  <style >
  </style>
@endsection

@section('content_header')
<div class="row">
    <div class="col s12">
		<h2 class="left">@yield('title')</h2>
		@if (Auth::user()->can('create', App\Tag::class))
			<a class="waves-effect waves-light btn right green" href="{{ url('admin/tag/create') }}">
				<i class="material-icons left">add</i>Add a tag
			</a>
		@else
			<a class="waves-effect waves-light btn right green disabled" href="{{ url('admin/tag/create') }}">
				<i class="material-icons left">add</i>Add a tag
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
					<th>Id</th>
					<th>Name</th>
					<th>How much Robot use it !</th>
					<th>Created At</th>

	    			@foreach ($tags as $tag)
						@if ( $tag->id === 1 && Auth::user()->can('update',  $tag) )
							<th>ACTION</th>
						@endif
		    		@endforeach

				</tr>
			</thead>

			<tbody>

	    		@foreach ($tags as $tag)
					<tr>
						<td>{{ $tag->id }}</td>
						<td>
							<a href="{{ url('tag', $tag->id) }}">
								{{ $tag->name }}
							</a>
						</td>
						<td>
					        @foreach ($tagsCount as $tagg)
						        @if($tagg->id === $tag->id)
						            {{ $tagg->robots_count }}
						        @endif
					        @endforeach
						</td>
						<td>{{ $tag->created_at }}</td>

						@if ( Auth::user()->can('update', $tag) )
							<td>
							    <a href="{{ route('tag.edit',$tag->id) }}" class="waves-effect waves-light btn btn-icon cyan"><i class="material-icons">edit</i></a>
								<!-- Modal Trigger -->
								<a href="#modal{{ $tag->id }}" class="waves-effect waves-light btn btn-icon red"><i class="material-icons">delete</i></a>
								<!-- Modal Structure -->
								<div id="modal{{ $tag->id }}" class="modal">
									<div class="modal-content">
										<h4>Are you sure you want to remove the tag : <strong>{{ $tag->name }}</strong></h4>
										<p>Be careful, this action is permanent and definitive, you will not be able to go back !</p>
										<form method="post" action="{{ route('tag.destroy',$tag->id) }}">
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








