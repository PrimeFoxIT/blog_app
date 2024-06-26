<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
            <a href="#" class="d-block">{{ $logged->email }}</a>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="{{ route('admin.tags') }}" class="nav-link ">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Tags</p>
                </a>
            </li>
            <li class="nav-item ">
                <a href="{{ route('admin.post-categories') }}" class="nav-link ">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Post categories</p>
                </a>
            </li>
            <li class="nav-item ">
                <a href="{{ route('admin.posts') }}" class="nav-link ">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Posts</p>
                </a>
            </li>
            <li class="nav-item ">
                <a href="{{ route('admin.logout') }}" class="nav-link ">
                        <i class="far fa-exit nav-icon"></i>
                        <p>Logout</p>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu  -->
</div>
