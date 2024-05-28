
<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
      <!-- Dashboard -->
      <li class="nav-item {{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }}">
          <a class="nav-link" href="{{ route('dashboard') }}">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
          </a>
      </li>
      @php
        in_array(Route::currentRouteName(), ['visitor.create', 'visitor.index']) ? 'active' : '' 
      @endphp
      @if (Auth::user()->hasRole('SuperAdmin'))
      <!-- Manage Visitor -->
      <li class="nav-item {{ in_array(Route::currentRouteName(), ['visitor.create', 'visitor.index']) ? 'active' : '' }}">
          <a class="nav-link" data-toggle="collapse" href="#manageVisitor" aria-expanded="{{ in_array(Route::currentRouteName(), ['visitor.create', 'visitor.index']) ? 'true' : 'false' }}" aria-controls="manageVisitor">
              <i class="icon-columns menu-icon"></i>
              <span class="menu-title">Manage Visitor</span>
              <i class="menu-arrow"></i>
          </a>
          <div class="collapse {{ in_array(Route::currentRouteName(), ['visitor.create', 'visitor.index']) ? 'show' : '' }}" id="manageVisitor">
              <ul class="nav flex-column sub-menu">
                  <li class="nav-item"><a class="nav-link {{ Route::currentRouteName() == 'visitor.create' ? 'active' : '' }}" href="{{ route('visitor.create') }}">Add new Visitor</a></li>
                  <li class="nav-item"><a class="nav-link {{ Route::currentRouteName() == 'visitor.index' ? 'active' : '' }}" href="{{ route('visitor.index') }}">All Visitors</a></li>
              </ul>
          </div>
      </li>

      <!-- Manage Employees -->
      <li class="nav-item {{ in_array(Route::currentRouteName(), ['empoylee.create', 'empoylee.index']) ? 'active' : '' }}">
          <a class="nav-link" data-toggle="collapse" href="#manage_employee" aria-expanded="{{ in_array(Route::currentRouteName(), ['empoylee.create', 'empoylee.index']) ? 'true' : 'false' }}" aria-controls="manage_employee">
              <i class="icon-bar-graph menu-icon"></i>
              <span class="menu-title">Manage Employees</span>
              <i class="menu-arrow"></i>
          </a>
          <div class="collapse {{ in_array(Route::currentRouteName(), ['empoylee.create', 'empoylee.index']) ? 'show' : '' }}" id="manage_employee">
              <ul class="nav flex-column sub-menu">
                  <li class="nav-item"><a class="nav-link {{ Route::currentRouteName() == 'empoylee.create' ? 'active' : '' }}" href="{{ route('empoylee.create') }}">Add new Employee</a></li>
                  <li class="nav-item"><a class="nav-link {{ Route::currentRouteName() == 'empoylee.index' ? 'active' : '' }}" href="{{ route('empoylee.index') }}">All Employees</a></li>
              </ul>
          </div>
      </li>

      <!-- Roles -->
      <li class="nav-item {{ in_array(Route::currentRouteName(), ['role.create', 'role.index']) ? 'active' : '' }}">
          <a class="nav-link" data-toggle="collapse" href="#roles" aria-expanded="{{ in_array(Route::currentRouteName(), ['role.create', 'role.index']) ? 'true' : 'false' }}" aria-controls="roles">
              <i class="icon-bar-graph menu-icon"></i>
              <span class="menu-title">Roles</span>
              <i class="menu-arrow"></i>
          </a>
          <div class="collapse {{ in_array(Route::currentRouteName(), ['role.create', 'role.index']) ? 'show' : '' }}" id="roles">
              <ul class="nav flex-column sub-menu">
                  <li class="nav-item"><a class="nav-link {{ Route::currentRouteName() == 'role.create' ? 'active' : '' }}" href="{{ route('role.create') }}">Create role</a></li>
                  <li class="nav-item"><a class="nav-link {{ Route::currentRouteName() == 'role.index' ? 'active' : '' }}" href="{{ route('role.index') }}">All role</a></li>
              </ul>
          </div>
      </li>

      <!-- Categories -->
      <li class="nav-item {{ in_array(Route::currentRouteName(), ['visitorCategory.create', 'visitorCategory.index']) ? 'active' : '' }}">
          <a class="nav-link" data-toggle="collapse" href="#category_security" aria-expanded="{{ in_array(Route::currentRouteName(), ['visitorCategory.create', 'visitorCategory.index']) ? 'true' : 'false' }}" aria-controls="category_security">
              <i class="icon-bar-graph menu-icon"></i>
              <span class="menu-title">Category</span>
              <i class="menu-arrow"></i>
          </a>
          <div class="collapse {{ in_array(Route::currentRouteName(), ['visitorCategory.create', 'visitorCategory.index']) ? 'show' : '' }}" id="category_security">
              <ul class="nav flex-column sub-menu">
                  <li class="nav-item"><a class="nav-link {{ Route::currentRouteName() == 'visitorCategory.create' ? 'active' : '' }}" href="{{ route('visitorCategory.create') }}">Create category</a></li>
                  <li class="nav-item"><a class="nav-link {{ Route::currentRouteName() == 'visitorCategory.index' ? 'active' : '' }}" href="{{ route('visitorCategory.index') }}">All category</a></li>
              </ul>
          </div>
      </li>

      <!-- Departments -->
      <li class="nav-item {{ in_array(Route::currentRouteName(), ['department.create', 'department.index']) ? 'active' : '' }}">
          <a class="nav-link" data-toggle="collapse" href="#department" aria-expanded="{{ in_array(Route::currentRouteName(), ['department.create', 'department.index']) ? 'true' : 'false' }}" aria-controls="department">
              <i class="icon-bar-graph menu-icon"></i>
              <span class="menu-title">Department</span>
              <i class="menu-arrow"></i>
          </a>
          <div class="collapse {{ in_array(Route::currentRouteName(), ['department.create', 'department.index']) ? 'show' : '' }}" id="department">
              <ul class="nav flex-column sub-menu">
                  <li class="nav-item"><a class="nav-link {{ Route::currentRouteName() == 'department.create' ? 'active' : '' }}" href="{{ route('department.create') }}">Create department</a></li>
                  <li class="nav-item"><a class="nav-link {{ Route::currentRouteName() == 'department.index' ? 'active' : '' }}" href="{{ route('department.index') }}">All departments</a></li>
              </ul>
          </div>
      </li>

      <!-- Permissions -->
      <li class="nav-item {{ in_array(Route::currentRouteName(), ['permission.create', 'permission.index']) ? 'active' : '' }}">
          <a class="nav-link" data-toggle="collapse" href="#permission" aria-expanded="{{ in_array(Route::currentRouteName(), ['permission.create', 'permission.index']) ? 'true' : 'false' }}" aria-controls="permission">
              <i class="icon-bar-graph menu-icon"></i>
              <span the="menu-title">Permissions</span>
              <i class="menu-arrow"></i>
          </a>
          <div class="collapse {{ in_array(Route::currentRouteName(), ['permission.create', 'permission.index']) ? 'show' : '' }}" id="permission">
              <ul class="nav flex-column sub-menu">
                  <li class="nav-item"><a class="nav-link {{ Route::currentRouteName() == 'permission.create' ? 'active' : '' }}" href="{{ route('permission.create') }}">Create permission</a></li>
                  <li class="nav-item"><a class="nav-link {{ Route::currentRouteName() == 'permission.index' ? 'active' : '' }}" href="{{ route('permission.index') }}">All permissions</a></li>
              </ul>
          </div>
      </li>

      <!-- Events -->
      <li class="nav-item {{ in_array(Route::currentRouteName(), ['event.create', 'event.index']) ? 'active' : '' }}">
          <a class="nav-link" data-toggle="collapse" href="#event" aria-expanded="{{ in_array(Route::currentRouteName(), ['event.create', 'event.index']) ? 'true' : 'false' }}" aria-controls="event">
              <i class="icon-bar-graph menu-icon"></i>
              <span class="menu-title">Upcoming Events</span>
              <i class="menu-arrow"></i>
          </a>
          <div class="collapse {{ in_array(Route::currentRouteName(), ['event.create', 'event.index']) ? 'show' : '' }}" id="event">
              <ul class="nav flex-column sub-menu">
                  <li class="nav-item"><a class="nav-link {{ Route::currentRouteName() == 'event.create' ? 'active' : '' }}" href="{{ route('event.create') }}">Create event</a></li>
                  <li class="nav-item"><a class="nav-link {{ Route::currentRouteName() == 'event.index' ? 'active' : '' }}" href="{{ route('event.index') }}">All events</a></li>
              </ul>
          </div>
      </li>
      
      @elseif (Auth::user()->hasRole('SecurityOfficer'))
      <!-- Manage Visitor (Security Officer) -->
      <li class="nav-item {{ in_array(Route::currentRouteName(), ['visitor.create', 'visitor.index']) ? 'active' : '' }}">
          <a class="nav-link" data-toggle="collapse" href="#manage_visitor" aria-expanded="{{ in_array(Route::currentRouteName(), ['visitor.create', 'visitor.index']) ? 'true' : 'false' }}" aria-controls="manage_visitor">
              <i class="icon-columns menu-icon"></i>
              <span class="menu-title">Manage Visitor</span>
              <i class="menu-arrow"></i>
          </a>
          <div class="collapse {{ in_array(Route::currentRouteName(), ['visitor.create', 'visitor.index']) ? 'show' : '' }}" id="manage_visitor">
              <ul class="nav flex-column sub-menu">
                  <li class="nav-item"><a class="nav-link {{ Route::currentRouteName() == 'visitor.create' ? 'active' : '' }}" href="{{ route('visitor.create') }}">Add new Visitor</a></li>
                  <li class="nav-item"><a class="nav-link {{ Route::currentRouteName() == 'visitor.index' ? 'active' : '' }}" href="{{ route('visitor.index') }}">All Visitors</a></li>
              </ul>
          </div>
      </li>
      <!-- Categories (Security Officer) -->
      <li class="nav-item {{ in_array(Route::currentRouteName(), ['visitorCategory.create', 'visitorCategory.index']) ? 'active' : '' }}">
          <a class="nav-link" data-toggle="collapse" href="#category_security" aria-expanded="{{ in_array(Route::currentRouteName(), ['visitorCategory.create', 'visitorCategory.index']) ? 'true' : 'false' }}" aria-controls="category_security">
              <i class="icon-bar-graph menu-icon"></i>
              <span class="menu-title">Category</span>
              <i class="menu-arrow"></i>
          </a>
          <div class="collapse {{ in_array(Route::currentRouteName(), ['visitorCategory.create', 'visitorCategory.index']) ? 'show' : '' }}" id="category_security">
              <ul class="nav flex-column sub-menu">
                  <li class="nav-item"><a class="nav-link {{ Route::currentRouteName() == 'visitorCategory.create' ? 'active' : '' }}" href="{{ route('visitorCategory.create') }}">Create category</a></li>
                  <li class="nav-item"><a class="nav-link {{ Route::currentRouteName() == 'visitorCategory.index' ? 'active' : '' }}" href="{{ route('visitorCategory.index') }}">All category</a></li>
              </ul>
          </div>
      </li>
      <!-- Departments (Security Officer) -->
      <li class="nav-item {{ in_array(Route::currentRouteName(), ['department.create', 'department.index']) ? 'active' : '' }}">
          <a class="nav-link" data-toggle="collapse" href="#department_security" aria-expanded="{{ in_array(Route::currentRouteName(), ['department.create', 'department.index']) ? 'true' : 'false' }}" aria-controls="department_security">
              <i class="icon-bar-graph menu-icon"></i>
              <span class="menu-title">Department</span>
              <i class="menu-arrow"></i>
          </a>
          <div class="collapse {{ in_array(Route::currentRouteName(), ['department.create', 'department.index']) ? 'show' : '' }}" id="department_security">
              <ul class="nav flex-column sub-menu">
                  <li class="nav-item"><a class="nav-link {{ Route::currentRouteName() == 'department.create' ? 'active' : '' }}" href="{{ route('department.create') }}">Create department</a></li>
                  <li class="nav-item"><a class="nav-link {{ Route::currentRouteName() == 'department.index' ? 'active' : '' }}" href="{{ route('department.index') }}">All departments</a></li>
              </ul>
          </div>
      </li>
      @else
      <!-- Other User Roles -->
      <li class="nav-item">
          <a class="nav-link" href="{{ route('visitor.create') }}">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Apply</span>
          </a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="{{ route('user.application') }}">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Applications</span>
          </a>
      </li>
      <li class="nav-item">
          <a class="nav-link" href="{{ route('events') }}">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Upcoming Events</span>
          </a>
      </li>
      @endif
  </ul>
</nav>

