@section('sidebar')

  <ul id="nav-mobile" class="side-nav fixed">
    <li class="logo">
      <a id="logo-container" href="#" class="brand-logo">
        <img id="front-page-logo" src="{{ url('logo/bender_logo_footer.png')}}" alt="">
      </a>
    </li>
    <li class="search">
      <div class="search-wrapper card">
        <input id="search"><i class="material-icons">search</i>
        <div class="search-results"></div>
      </div>
    </li>
    <li>
      <a href="{{route('logout')}}"><i class="material-icons">remove_circle</i>Logout</a>
    </li>
    <?php (isset($currentPath) && $currentPath === "/admin/dashboard")? $dashboard="active":$dashboard=""; ?>
    <li class="<?php echo $dashboard; ?>">
      <a href="{{route('dashboard')}}"><i class="material-icons">dashboard</i>Dashboard</a>
    </li>
    <li class="no-padding">
      <ul class="collapsible collapsible-accordion">
        <li class="bold">
          <a class="collapsible-header  waves-effect waves-teal"><i class="material-icons">android</i>Robot</a>
          <div class="collapsible-body">
            <ul>
              <li>
                <a class="collapse-custom" href="{{ route('robot.index') }}"><i class="material-icons">list</i>List</a>
              </li>
              <li>
                <a class="collapse-custom" href="{{ route('robot.create') }}"><i class="material-icons">add</i>Add</a>
              </li>
            </ul>
          </div>
        </li>
        <li class="bold">
          <a class="collapsible-header  waves-effect waves-teal"><i class="material-icons">person</i>User</a>
          <div class="collapsible-body">
            <ul>
              <li>
                <a class="collapse-custom" href="{{ route('user.index') }}"><i class="material-icons">list</i>List</a>
              </li>
              <li>
                <a class="collapse-custom" href="{{ route('user.create') }}"><i class="material-icons">person_add</i>Add</a>
              </li>
            </ul>
          </div>
        </li>
        <li class="bold">
          <a class="collapsible-header  waves-effect waves-teal"><i class="material-icons">style</i>Category</a>
          <div class="collapsible-body">
            <ul>
              <li>
                <a class="collapse-custom" href="{{ route('category.index') }}"><i class="material-icons">list</i>List</a>
              </li>
              <li>
                <a class="collapse-custom" href="{{ route('category.create') }}"><i class="material-icons">add</i>Add</a>
              </li>
            </ul>
          </div>
        </li>
        <li class="bold">
          <a class="collapsible-header  waves-effect waves-teal"><i class="material-icons">label</i>Tag</a>
          <div class="collapsible-body">
            <ul>
              <li>
                <a class="collapse-custom" href="{{ route('tag.index') }}"><i class="material-icons">list</i>List</a>
              </li>
              <li>
                <a class="collapse-custom" href="{{ route('tag.create') }}"><i class="material-icons">add</i>Add</a>
              </li>
            </ul>
          </div>
        </li>
      </ul>
    </li>
  </ul>
@show
