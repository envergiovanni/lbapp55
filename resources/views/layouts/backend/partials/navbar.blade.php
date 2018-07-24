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
      <!-- Messages: style can be found in dropdown.less-->

      <!-- Notifications: style can be found in dropdown.less -->
      
      <!-- Tasks: style can be found in dropdown.less -->

      <!-- User Account: style can be found in dropdown.less -->
      <li class="dropdown user user-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <img src="/admin/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
          <span class="hidden-xs">{{ Auth::user()->name }}</span>
        </a>
        <ul class="dropdown-menu">
          <!-- User image -->
          <li class="user-header">
            <img src="/admin/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

            <p>
              {{ Auth::user()->name }} - Administrador
            </p>
          </li>
          <!-- Menu Body -->
          <!-- Menu Footer-->
          <li class="user-footer">
            <div class="pull-left">
              {{-- <a href="#" class="btn btn-default btn-flat">Profile</a> --}}
            </div>
            <div class="pull-right">
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: inline;">
                  {{ csrf_field() }}
                  <button type="submit" class="btn btn-danger btn-flat">Cerrar sesión &nbsp;<i class="fa fa-sign-out"></i></button>
              </form>
            </div>
          </li>
        </ul>
      </li>
    </ul>
  </div>
</nav>