<!-- Brand Logo -->
<a href="{{ url('/') }}" class="brand-link text-center">
    <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
</a>

<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{asset('dist/admin/img/profile-default.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">Admin</a>
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
            <li class="nav-header">Main</li>
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="{{route('admin.dashboard.index')}}"
                    class="nav-link {{request()->routeIs('admin.dashboard.*') ? 'active' : ''}}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
            @hasrole('super-admin')
            <li class="nav-item">
                <a href="{{route('admin.laboratories.index')}}"
                    class="nav-link {{request()->routeIs('admin.laboratories.*') ? 'active' : ''}}">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        Manajemen Lab
                    </p>
                </a>
            </li>
            @endhasrole
            <li class="nav-header">Konten</li>
            @hasrole('super-admin')
            <li class="nav-item">
                <a href="{{route('admin.slide-show.index')}}"
                    class="nav-link {{request()->routeIs('admin.slide-show.*') ? 'active' : ''}}">
                    <i class="nav-icon fas fa-images"></i>
                    <p>
                        Slide Show
                    </p>
                </a>
            </li>
            @endhasrole
            @hasrole('super-admin')
            <li class="nav-item">
                <a href="{{route('admin.abouts.index')}}"
                    class="nav-link {{request()->routeIs('admin.abouts.*') ? 'active' : ''}}">
                    <i class="nav-icon fas fa-user"></i>
                    <p>
                        Profil
                    </p>
                </a>
            </li>
            @endhasrole
            @hasrole('super-admin')
            <li class="nav-item">
                <a href="{{route('admin.contacts.index')}}"
                    class="nav-link {{request()->routeIs('admin.contacts.*') ? 'active' : ''}}">
                    <i class="nav-icon fas fa-address-book"></i>
                    <p>
                        Kontak
                    </p>
                </a>
            </li>
            @endhasrole
            <li class="nav-item">
                <a href="{{route('admin.blog.index')}}"
                    class="nav-link {{request()->routeIs('admin.blog.*') ? 'active' : ''}}">
                    <i class="nav-icon fas fa-newspaper"></i>
                    <p>
                        Berita
                    </p>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->