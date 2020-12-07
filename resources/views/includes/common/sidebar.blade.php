<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->

    @include('layouts.partials.admin-panel-logo')

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ Auth::user()->profile_photo_url }}" class="img-circle elevation-2" alt="user_image">
            </div>
            <div class="info">
                <a href="{{ route('dashboard') }}" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                {{-- User Management --}}
                {{-- @hasanyrole('superadmin|admin') --}}
                @can('all-users')
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
                                    <a href="{{ route('all-users') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>List User</p>
                                    </a>
                                </li>
                            @endcan

                        </ul>
                    </li>
                @endcan
                {{-- @endhasanyrole --}}

                {{-- Role Management --}}
                @hasrole('superadmin')
                    <li class="nav-item has-treeview menu-close">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Role Management
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('role.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Role</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('permission.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Permission</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endhasrole

                {{-- CMS --}}
                @can('list-post')
                    <li class="nav-item has-treeview menu-close">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                CMS
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @can('create-post')
                                <li class="nav-item">
                                    <a href="{{ route('posts.create') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Add New</p>
                                    </a>
                                </li>
                            @endcan

                            @can('list-post')
                                <li class="nav-item">
                                    <a href="{{ route('posts.index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>All Posts</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('posts.saved') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Saved Posts</p>
                                    </a>
                                </li>
                            @endcan

                            @can('category-list')
                                <li class="nav-item">
                                    <a href="{{ route('category.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-th"></i>
                                        <p>
                                            Categories
                                        </p>
                                    </a>
                                </li>
                            @endcan

                            @can('subcategory-lists')
                                <li class="nav-item">
                                    <a href="{{ route('subcategory.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-th"></i>
                                        <p>
                                            SubCategory
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('tag-list')
                                <li class="nav-item">
                                    <a href="{{ route('tag.index') }}" class="nav-link">
                                        <i class="nav-icon fas fa-th"></i>
                                        <p>
                                            Tags
                                        </p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan

                {{-- Appearance --}}
                @hasanyrole('superadmin|admin')
                    <li
                        class="nav-item has-treeview {{ request()->routeIs('customize*') ? 'menu-open' :'' }}">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-palette"></i>
                            <p>
                                Appearance
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            {{-- <li class="nav-item">
                          <a href="themes.html" class="nav-link">
                             <i class="far fa-circle nav-icon"></i>
                             <p>Themes</p>
                          </a>
                       </li> --}}
                            <li class="nav-item">
                                <a href="{{ route('customize') }}"
                                    class="nav-link {{ request()->routeIs('customize') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Customize</p>
                                </a>
                            </li>
                            {{-- <li class="nav-item">
                          <a href="widgets.html" class="nav-link">
                             <i class="far fa-circle nav-icon"></i>
                             <p>Widgets</p>
                          </a>
                       </li>
                       <li class="nav-item">
                          <a href="menus.html" class="nav-link">
                             <i class="far fa-circle nav-icon"></i>
                             <p>Menus</p>
                          </a>
                       </li>
                       <li class="nav-item">
                          <a href="slider.html" class="nav-link">
                             <i class="far fa-circle nav-icon"></i>
                             <p>Slider</p>
                          </a>
                       </li> --}}
                        </ul>
                    </li>
                @endhasanyrole

                {{-- Appointment --}}
                <li class="nav-item has-treeview menu-close">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Appointment
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('bookevents.index',['events'=>'upcoming']) }}"
                                class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Appointment Pages
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('confirmed_users.index') }}" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Customers
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('allBookingEvent') }}" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Calendar
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!--booking dropdown end here -->

                @hasanyrole('superadmin|admin')
                <li
                    class="nav-item has-treeview {{ request()->routeIs('subscribers*') || request()->routeIs('newsletter.emails*') || request()->routeIs('newsletters.create') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Newsletter
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('subscribers',['subscribed'=> 'subscribers']) }}"
                                class="nav-link {{ request()->routeIs('subscribers*') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Subscribers
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('newsletter.emails') }}"
                                class="nav-link {{ request()->routeIs('newsletter.emails*') || request()->routeIs('newsletters.create') ? 'active' : '' }}">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Newsletter Emails
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endhasanyrole
                <li class="nav-item">
                    <a href="{{ route('settings') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Settings
                        </p>
                    </a>
                </li>

            </ul>
            <!--main ul end-->
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
