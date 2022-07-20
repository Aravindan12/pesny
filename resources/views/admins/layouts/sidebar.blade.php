<!-- partial:partials/sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
        <a class="nav-link" href="/admin/">
            <i class="icon-grid menu-icon"></i>
            <span class="menu-title">Dashboard</span>
        </a>
        </li>
        
        <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="icon-mail menu-icon"></i>
            <span class="menu-title">E-mail</span>
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="icon-watch menu-icon"></i>
            <span class="menu-title">Calendar</span>
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="icon-align-right menu-icon"></i>
            <span class="menu-title">Todo List</span>
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="icon-image menu-icon"></i>
            <span class="menu-title">Gallery</span>
        </a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="icon-paper menu-icon"></i>
            <span class="menu-title">Documentation</span>
        </a>
        </li>
        <!-- <li class="nav-item">
        <a class="nav-link" href="/roles-permissions">
            <i class="icon-paper menu-icon"></i>
            <span class="menu-title">Roles and Permissions</span>
        </a>
        </li> -->

        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="icon-layout menu-icon"></i>
              <span class="menu-title">Role & Permissions</span>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{route('admin.roles')}}">Roles</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{route('admin.permissions')}}">Permissions</a></li>
              </ul>
            </div>
          </li>
    </ul>
</nav>