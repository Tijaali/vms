<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link" href="{{route('user.dashboard')}}">
              <i class="mdi mdi-account-card-details"></i>
              <span class="menu-title">{{Auth::user()->name}}</span>
            </a>
          </li>
         @if (Auth::user()->hasRole('visitor'))
         <li class="nav-item">
          <a class="nav-link" data-toggle="collapse" href="#manage_visitor" aria-expanded="false" aria-controls="form-elements">
            <i class="icon-columns menu-icon"></i>
            <span class="menu-title">Manage Visitor</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="manage_visitor">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"><a class="nav-link" href="{{route('visitor.create')}}">Apply</a></li>
              <li class="nav-item"><a class="nav-link" href="#">Applications</a></li>
            </ul>
          </div>
        </li>
         @endif
         
        </ul>
      </nav>
