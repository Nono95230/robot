
@if(auth()->check()) {{-- test si vous êtes connecté --}}
	@if(isset($currentPath) && $currentPath === "/admin/dashboard")
	    <li class="active">
	    	<a href="{{url('dashboard')}}">Dashboard</a>
	    </li>
	@else
	    <li>
	    	<a href="{{url('dashboard')}}">Dashboard</a>
	    </li>
	@endif
    <li>
    	<a href="{{route('logout')}}">Se déconnecter</a>
    </li>
@else
	@if(isset($currentPath) && $currentPath === "/admin/login")
	    <li class="active">
	    	<a href="{{route('login')}}">Login</a>
	    </li>
	@else
	    <li>
	    	<a href="{{route('login')}}">Login</a>
	    </li>
	@endif
@endif