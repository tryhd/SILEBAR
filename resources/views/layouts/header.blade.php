@section('header')
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <nav class="navbar-nav ml-auto">
        <div class="navbar-custom-menu" class="full-right image">
          <ul class="nav navbar-nav">
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <span class="hidden-xs"> {{Auth::User()->name}}</span>
                <i class="fa fa-gear"></i>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                    @if (Auth::user()->foto_user !=null)
                    <img src="{{ asset('images/'.auth()->user()->foto)}}" class="img-circle" alt="User Image">
                    @else
                    <img src="/dist/img/avatar5.png" class="img-circle" alt="User Image">
                    @endif
                  <p>
                    {{Auth::User()->name}}
                    <small>{{Auth::User()->role}}</small>
                  </p>
                </li>
                <!-- Menu Body -->
                <li class="user-body">
                  <div class="pull-left">
                  </div>
                  <div class="pull-right">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">Sign out</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      @csrf
                  </form>
                  </div>
                </li>
                <!-- Menu Footer-->
              </ul>
            </li>
            <!-- Control Sidebar Toggle Button -->
          </ul>
        </div>
      </nav>
  <!-- /.navbar -->
@endsection
