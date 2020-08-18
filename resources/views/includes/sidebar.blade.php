<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{asset('/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
        style="opacity: .8">
        <span class="brand-text font-weight-light">MultiAuth</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                {{-- User Management --}}
                @hasanyrole('superadmin|admin')
                <li class="nav-item has-treeview menu-close">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            User Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('user-create')
                        <li class="nav-item">
                            <a href="{{ route('auth.create') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add User</p>
                            </a>
                        </li>
                        @endcan

                        @can('all-users')
                        <li class="nav-item">
                            <a href="{{route('all-users')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List User</p>
                            </a>
                        </li>
                        @endcan

                    </ul>
                </li>
                @endhasanyrole

                {{--Role Management  --}}
                {{-- <li class="nav-item has-treeview menu-close">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Role Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link active">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add User</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List User</p>
                            </a>
                        </li>
                    </ul>
                </li> --}}

                {{-- CMS --}}
                <li class="nav-item has-treeview menu-close">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            CMS
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Post</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List Post</p>
                            </a>
                        </li>
                    </ul>
                </li>

                {{-- <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Create Post
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li> --}}

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
