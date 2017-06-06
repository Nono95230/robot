@section('header')
  <header>
    @include('partials.nav')

    @if(auth()->check()) {{-- test si vous êtes connecté --}}
    	@include('partials.sidebar')
    @endif
  </header>

@show