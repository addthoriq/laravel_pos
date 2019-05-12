<header class="main-header">
  <!-- Logo -->
  <a href="{{ url('admin/home') }}" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><b>S</b>KP</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>Sar</b>kop</span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            @if (auth()->check())
              @if(auth()->user()->poto)
                <img src="{{Storage::url(auth()->user()->poto)}}" class="user-image" alt="User Image">
                @else
                <img src="{{Avatar::create(auth()->user()->name)->toBase64()}}" class="user-image" alt="User Image">
              @endif
            @endif
            @if (auth()->check())
              <span class="hidden-xs">{{auth()->user()->name}}</span>
            @endif
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
              @if (auth()->check())
                @if(auth()->user()->poto)
                  <img src="{{Storage::url(auth()->user()->poto)}}" class="user-image" alt="User Image">
                  @else
                  <img src="{{Avatar::create(auth()->user()->name)->toBase64()}}" class="user-image" alt="User Image">
                @endif
              @endif

              @if (auth()->check())
                <p>
                {{auth()->user()->name}}
                @php
                  
                @endphp
                <small>Member since {{date('d F Y', strtotime(auth()->user()->created_at))}}</small>
              </p>
              @endif
            </li>
            <!-- Menu Body -->
            <li class="user-body">
              <div class="row">
                <div class="col-xs-4 text-center">
                  <a href="#">Followers</a>
                </div>
                <div class="col-xs-4 text-center">
                  <a href="#">Sales</a>
                </div>
                <div class="col-xs-4 text-center">
                  <a href="#">Friends</a>
                </div>
              </div>
              <!-- /.row -->
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-left">
                <a href="#" class="btn btn-default btn-flat">Profile</a>
              </div>
              <div class="pull-right">
                <form action="{{ route('auth.logout') }}" method="post">
                  @csrf
                  <button class="btn btn-default btn-flat">Sign Out</button>
                </form>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>
