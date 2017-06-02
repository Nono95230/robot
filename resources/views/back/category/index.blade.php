@extends('layouts.master')

@section('title', 'Categories\'s list')

@section('style')
  <style >
  </style>
@endsection

@section('content_header')
<div class="row">
    <div class="col s12">
		<h2 class="left">@yield('title')</h2>
		@if (Auth::user()->can('create', App\Category::class))
			<a class="waves-effect waves-light btn right green" href="{{ url('admin/category/create') }}">
				<i class="material-icons left">add</i>Add a category
			</a>
		@else
			<a class="waves-effect waves-light btn right green disabled" href="{{ url('admin/category/create') }}">
				<i class="material-icons left">add</i>Add a category
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
					<th>Id</th>
					<th>Name</th>
					<th>Created At</th>
	    			@foreach ($categories as $category)
						@if ( $category->id === 1 && Auth::user()->can('update',  $category) )
							<th>ACTION</th>
						@endif
		    		@endforeach
				</tr>
			</thead>

			<tbody>

	    		@foreach ($categories as $category)
					<tr>
						<td>{{ $category->id }}</td>
						<td>
							<a href="{{ url('category', $category->id) }}">
								{{ $category->title }}
							</a>
						</td>
						<td>{{ $category->created_at }}</td>

						@if ( Auth::user()->can('update', $category) )
							<td>
							    <a href="{{ route('category.edit',$category->id) }}" class="waves-effect waves-light btn btn-icon cyan"><i class="material-icons">edit</i></a>
								<!-- Modal Trigger -->
								<a href="#modal{{ $category->id }}" class="waves-effect waves-light btn btn-icon red"><i class="material-icons">delete</i></a>
								<!-- Modal Structure -->
								<div id="modal{{ $category->id }}" class="modal">
									<div class="modal-content">
										<h4>Are you sure you want to remove the category : <strong>{{ $category->name }}</strong></h4>
										<p>Be careful, this action is permanent and definitive, you will not be able to go back !</p>
										<form method="post" action="{{ route('category.destroy',$category->id) }}">
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








