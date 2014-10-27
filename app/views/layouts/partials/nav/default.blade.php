<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      {{ link_to_route('home', 'Gotta Go', null, ['class' => 'navbar-brand'])}}
    </div>

    <!-- Left Side of Nav -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li>{{ link_to_route('tenants.index', 'Tenants') }}</li>
        <li>{{ link_to_route('houses.index', 'Houses') }}</li>
        <li>{{ link_to_route('activities.index', 'Activities') }}</li>
      </ul>

      <!-- Right Side of Nav -->
      <ul class="nav navbar-nav navbar-right">

      @if (Auth::check())
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{ $currentUser->first_name }} {{ $currentUser->last_name }} <span class="caret"></span></a>
          <!-- User Dropdown Form -->
          <ul class="dropdown-menu nav-login" role="menu">
              @include('layouts.partials.nav.dash')
          </ul>
        </li>

      @else
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Login <span class="caret"></span></a>

          <!-- Login Dropdown Form -->
          <ul class="dropdown-menu nav-login" role="menu">
            <li>
              @include('layouts.partials.nav.login')
            </li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Register <span class="caret"></span></a>
          <!-- Register Dropdown Form -->
          <ul class="dropdown-menu nav-login" role="menu">
            <li>
              @include('layouts.partials.nav.register')
            </li>
          </ul>
        </li>
        @endif
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>