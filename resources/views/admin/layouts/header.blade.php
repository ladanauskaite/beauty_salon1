  <nav class="main-header navbar navbar-expand navbar-white navbar-light" style='margin-top:-25px!important;'>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <div class="btn btn-default pull-right">
                      <a href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                          Logout
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          {{ csrf_field() }}
                      </form>
                </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <span class="brand-text font-weight-light ml-2">BeautySalonSystem</span>
    </a>

    <!-- Sidebar -->
    
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block">Administratorius</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            @foreach(Auth::user()->roles as $role)
            @if ( $role->id == 1 || $role->id == 2)
          <li class="nav-item">
            <a href="{{ route('admin.index') }}" class="nav-link">
              <i class="nav-icon fas fa-user-cog"></i>
              <p>
                  Administratoriai<br>
                
              </p>
            </a>
          </li>
          @endif
          @endforeach
          @foreach(Auth::user()->roles as $role)
            @if ( $role->id == 1)
          <li class="nav-item">
            <a href="{{ route('role.index') }}" class="nav-link">
              <i class="nav-icon fas fa-user-tag"></i>
              <p>
                Rolės
              </p>
            </a>
          </li>
          @endif
          @endforeach
          <li class="nav-item">
            <a href="{{ route('service.index') }}" class="nav-link">
              <i class="nav-icon fas fa-cut"></i>
              <p>
                Paslaugos
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('place.index') }}" class="nav-link">
              <i class="nav-icon fas fa-location-arrow"></i>
              <p>
               Vietos
              </p>
            </a>
          </li>
          @foreach(Auth::user()->roles as $role)
            @if ( $role->id == 1)
          <li class="nav-item">
            <a href="{{ route('new.index') }}" class="nav-link">
              <i class="nav-icon fas fa-newspaper"></i>
              <p>
                Naujienos
              </p>
            </a>
          </li>
        @endif
          @endforeach
          <li class="nav-item">
            <a href="{{ route('user.index') }}" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
               Naudotojai
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('reservation.index') }}" class="nav-link">
              <i class="nav-icon fas fa-lock-open"></i>
              <p>
               Rezervacijos
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('reservedservice.index') }}" class="nav-link">
              <i class="nav-icon fas fa-lock"></i>
              <p>
               Užrezervuotos paslaugos
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
