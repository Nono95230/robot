@section('nav')

    <?php (isset($currentPath) && $currentPath === "/admin/login")? $login="active":$login=""; ?>
    <nav class="top-nav">
      <div class="container">
        <div class="nav-wrapper">
          <!-- <a class="page-title">@yield('title')</a> -->
          <a href="/" class="brand-logo">Robot</a>
          <a href="#" data-activates="nav-mobile" class="button-collapse top-nav full hide-on-large-only">
            <i class="material-icons">menu</i>
          </a>
          <a id="activates-mobile-demo" href="#" data-activates="mobile-demo" class="button-collapse right"><i class="material-icons">menu</i></a>
          <ul class="hide-on-med-and-down right">
              @include('partials.category')
              @if( !auth()->check() )
                <li class="<?php echo $login; ?>">
                  <a href="{{route('login')}}">Login</a>
                </li>
              @endif
          </ul>
          <ul class="side-nav" id="mobile-demo">
              @include('partials.category')
              @if( !auth()->check() )
                <li class="<?php echo $login; ?>">
                  <a href="{{route('login')}}">Login</a>
                </li>
              @endif
          </ul>
        </div>
      </div>
    </nav>
@show

