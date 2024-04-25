<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{route('dashboard')}}">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          @if (Auth::user()->hasRole('SuperAdmin'))
         
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#manageVisitor" aria-expanded="false" aria-controls="manageVisitor">
              <i class="icon-columns menu-icon"></i>
              <span class="menu-title">Manage Visitor</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="manageVisitor">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="{{route('visitor.create')}}">Add new Visitor</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('visitor.index')}}">All Visitors</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#manage_employee" aria-expanded="false" aria-controls="manage_employee">
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
            <a class="nav-link" data-toggle="collapse" href="#roles" aria-expanded="false" aria-controls="roles">
              <i class="icon-bar-graph menu-icon"></i>
              <span class="menu-title">Roles</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="roles">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="{{route('role.create')}}">Create role</a></li>
                {{-- <li class="nav-item"><a class="nav-link" href="">Edit role </a></li> --}}
                <li class="nav-item"><a class="nav-link" href="{{route('role.index')}}">All role</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#category" aria-expanded="false" aria-controls="category">
              <i class="icon-bar-graph menu-icon"></i>
              <span class="menu-title">Category</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="category">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="{{route('visitorCategory.create')}}">Create category</a></li>
                {{-- <li class="nav-item"><a class="nav-link" href="">Edit role </a></li> --}}
                <li class="nav-item"><a class="nav-link" href="{{route('visitorCategory.index')}}">All category</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#department" aria-expanded="false" aria-controls="department">
              <i class="icon-bar-graph menu-icon"></i>
              <span class="menu-title">Department</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="department">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="{{route('department.create')}}">Create department</a></li>
                {{-- <li class="nav-item"><a class="nav-link" href="">Edit role </a></li> --}}
                <li class="nav-item"><a class="nav-link" href="{{route('department.index')}}">All departments</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#permission" aria-expanded="false" aria-controls="permission">
              <i class="icon-bar-graph menu-icon"></i>
              <span class="menu-title">Permission</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="permission">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="{{route('permission.create')}}">Create permission</a></li>
                {{-- <li class="nav-item"><a class="nav-link" href="">Edit role </a></li> --}}
                <li class="nav-item"><a class="nav-link" href="{{route('permission.index')}}">All permissions</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#permission" aria-expanded="false" aria-controls="permission">
              <i class="icon-bar-graph menu-icon"></i>
              <span class="menu-title">Permission</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="permission">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="{{route('permission.create')}}">Create permission</a></li>
                {{-- <li class="nav-item"><a class="nav-link" href="">Edit role </a></li> --}}
                <li class="nav-item"><a class="nav-link" href="{{route('permission.index')}}">All permissions</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#event" aria-expanded="false" aria-controls="event">
              <i class="icon-bar-graph menu-icon"></i>
              <span class="menu-title">Upcoming Events</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="event">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="{{route('event.create')}}">Create event</a></li>
                {{-- <li class="nav-item"><a class="nav-link" href="">Edit role </a></li> --}}
                <li class="nav-item"><a class="nav-link" href="{{route('event.index')}}">All permissions</a></li>
              </ul>
            </div>
          </li>
          @else
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#manage_visitor" aria-expanded="false" aria-controls="manage_visitor">
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
            <a class="nav-link" data-toggle="collapse" href="#category" aria-expanded="false" aria-controls="charts">
              <i class="icon-bar-graph menu-icon"></i>
              <span class="menu-title">Category</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="category">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="{{route('visitorCategory.create')}}">Create category</a></li>
                {{-- <li class="nav-item"><a class="nav-link" href="">Edit role </a></li> --}}
                <li class="nav-item"><a class="nav-link" href="{{route('visitorCategory.index')}}">All category</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#department" aria-expanded="false" aria-controls="department">
              <i class="icon-bar-graph menu-icon"></i>
              <span class="menu-title">Department</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="department">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="{{route('department.create')}}">Create department</a></li>
                {{-- <li class="nav-item"><a class="nav-link" href="">Edit role </a></li> --}}
                <li class="nav-item"><a class="nav-link" href="{{route('department.index')}}">All departments</a></li>
              </ul>
            </div>
          </li>
          
          @endif
         

        </ul>
      </nav>
