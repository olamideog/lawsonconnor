<!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="{{url('/_admin/dashboard')}}">Lawson Connor - Admin Area</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="{{url('/_admin/dashboard')}}">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Administrators">
          <a class="nav-link" href="{{url('/_admin/admin')}}">
            <i class="fa fa-fw fa-user-circle"></i>
            <span class="nav-link-text">Administrators</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Users">
          <a class="nav-link" href="{{url('/_admin/user')}}">
            <i class="fa fa-fw fa-users"></i>
            <span class="nav-link-text">Users</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Files">
          <a class="nav-link" href="{{url('/_admin/files')}}">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Files</span>
          </a>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Logout">
          <a class="nav-link" href="{{url('/_admin/logout')}}">
            <i class="fa fa-fw fa-sign-out"></i>
            <span class="nav-link-text">Logout</span>
          </a>
        </li>
      </ul>

      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="profileDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-user-o"></i> {{session('admin_firstname')}} {{session('admin_lastname')}}
          </a>
          <div class="dropdown-menu" aria-labelledby="profileDropdown">
            <!-- <a class="dropdown-item" href="{{url('_admin/profile')}}">
              <strong>My Profile</strong>
            </a>
            <div class="dropdown-divider"></div> -->
            <a class="dropdown-item" href="{{url('_admin/logout')}}">
              <strong>Log Out</strong>
            </a>
            <div class="dropdown-divider"></div>            
          </div>
        </li>
      </ul>
    </div>
  </nav>