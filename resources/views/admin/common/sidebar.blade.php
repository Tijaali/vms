<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{route('dashboard')}}">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#categories" aria-expanded="false" aria-controls="ui-basic">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">Categories</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="categories">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="">Visitors</a></li>
                <li class="nav-item"> <a class="nav-link" href="">Employees</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#manage_visitor" aria-expanded="false" aria-controls="form-elements">
              <i class="icon-columns menu-icon"></i>
              <span class="menu-title">Manage Visitor</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="manage_visitor">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="{{route('visitor.create')}}">Add new Visitor</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('visitor.index')}}">All Visitors</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#manage_employee" aria-expanded="false" aria-controls="charts">
              <i class="icon-bar-graph menu-icon"></i>
              <span class="menu-title">Manage Employees</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="manage_employee">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="{{route('empoylee.create')}}">Add new Employee</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('empoylee.index')}}">All Employees</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#roles" aria-expanded="false" aria-controls="charts">
              <i class="icon-bar-graph menu-icon"></i>
              <span class="menu-title">Roles</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="roles">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="{{route('role.create')}}">Create role</a></li>
                {{-- <li class="nav-item"><a class="nav-link" href="">Edit role </a></li> --}}
                <li class="nav-item"><a class="nav-link" href="">All role</a></li>
              </ul>
            </div>
          </li>

        </ul>
      </nav>
