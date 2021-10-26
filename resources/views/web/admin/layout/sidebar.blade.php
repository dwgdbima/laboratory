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
            <li class="nav-item">
                <a href="{{route('admin.equipments.index')}}"
                    class="nav-link {{request()->routeIs('admin.equipments.*') ? 'active' : ''}}">
                    <i class="nav-icon fas fa-toolbox"></i>
                    <p>
                        Peralatan
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.tests.index')}}"
                    class="nav-link {{request()->routeIs('admin.tests.*') ? 'active' : ''}}">
                    <i class="nav-icon fas fa-vial"></i>
                    <p>
                        Pengujian
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.practices.index')}}"
                    class="nav-link {{request()->routeIs('admin.practices.*') ? 'active' : ''}}">
                    <i class="nav-icon fas fa-microscope"></i>
                    <p>
                        Praktikum
                    </p>
                </a>
            </li>
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
                <a href="{{route('admin.component.index')}}"
                    class="nav-link {{request()->routeIs('admin.component.*') ? 'active' : ''}}">
                    <i class="nav-icon fas fa-paint-roller"></i>
                    <p>
                        Komponen
                    </p>
                </a>
            </li>
            @endhasrole
            @hasrole('super-admin')
            <li class="nav-item">
                <a href="{{route('admin.about.index')}}"
                    class="nav-link {{request()->routeIs('admin.about.*') ? 'active' : ''}}">
                    <i class="nav-icon fas fa-user"></i>
                    <p>
                        Profil
                    </p>
                </a>
            </li>
            @endhasrole
            <li class="nav-item">
                <a href="{{route('admin.blogs.index')}}"
                    class="nav-link {{request()->routeIs('admin.blogs.*') ? 'active' : ''}}">
                    <i class="nav-icon fas fa-newspaper"></i>
                    <p>
                        Berita
                    </p>
                </a>
            </li>
            @hasrole('super-admin')
            <li class="nav-item">
                <a href="{{route('admin.contact.index')}}"
                    class="nav-link {{request()->routeIs('admin.contact.*') ? 'active' : ''}}">
                    <i class="nav-icon fas fa-address-book"></i>
                    <p>
                        Kontak
                    </p>
                </a>
            </li>
            @endhasrole
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->