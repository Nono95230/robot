
@if(isset($currentPath) && $currentPath === "/")
	<li class="active">
	    <a class="waves-effect" href="/">Home</a>
	</li>
@else
	<li>
	    <a class="waves-effect" href="/">Home</a>
	</li>
@endif

@foreach($categories as $category)
    @if(isset($currentPath) && $currentPath === "category/".$category->id)
	    <li class="active">
	        <a class="waves-effect" href="{{ url('category', $category->id)}}">{{ $category->title}}</a>
	    </li>
    @else
	    <li>
	        <a class="waves-effect" href="{{ url('category', $category->id)}}">{{ $category->title}}</a>
	    </li>
    @endif
@endforeach
