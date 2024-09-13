<?php $settings = App\Models\Settings::first(); ?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    {{-- <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">{{ $settin }}</span>
    </a> --}}

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->first_name ?? 'Adminadmin' }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                @can('General_Dashboard_Show')
                    <li class="nav-item has-treeview">
                        <a href="{{ route('admin.dashboard') }}"
                            class="nav-link {{ request()->is('admin/dashboard*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-th-large"></i>
                            {{-- <i class="fa fa-th-large"></i> --}}

                            <p>
                                {{ __('general.dashboard') }}
                            </p>
                        </a>


                    </li>
                @endcan
                @can('Admin_Roles')

                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link {{ request()->is('admin/roles*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-user-cog"></i>
                            <p>
                                {{ __('roles.User_Roles') }}
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.roles') }}"
                                    class="nav-link {{ request()->is('admin/roles') ? 'active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>{{ __('roles.All_Roles') }}</p>
                                </a>
                            </li>
                            @can('Create_Admin_Roles')
                                <li class="nav-item">
                                    <a href="{{ route('admin.roles.create') }}"
                                        class="nav-link {{ request()->is('admin/roles/create') ? 'active' : '' }}">

                                        {{-- <a href="{{ route('admin.roles.create') }}" class="nav-link {{ @if (request()->is('admin/roles/create')) 'active' @elseif ( request()->is('admin/roles/edit') ) 'active' @else '' @endif }}"> --}}
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>{{ __('roles.New_Roles') }}</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan

                @can('Admin_Categories')
                    <li class="nav-item has-treeview">
                        <a href="" class="nav-link {{ request()->is('admin/departments*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-cog"></i>
                            <p>
                                {{ __('department.departments') }}
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        {{-- @can('Edit_Admin_Settings') --}}
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.departments') }}" class="nav-link {{ request()->is('admin/departments') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p> {{ __('department.departments') }} </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.departments.create') }}" class="nav-link {{ request()->is('admin/departments/create') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p> {{ __('department.create_department') }} </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="" class="nav-link {{ request()->is('admin/departments/edit') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p> {{ __('department.edit_department') }} </p>
                                    </a>
                                </li>

                            </ul>
                        {{-- @endcan --}}

                    </li>
                @endcan
                @can('Admin_Categories')
                    <li class="nav-item has-treeview">
                        <a href="" class="nav-link {{ request()->is('admin/categories*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-cog"></i>
                            <p>
                                {{ __('category.categories') }}
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        {{-- @can('Edit_Admin_Settings') --}}
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.categories') }}" class="nav-link {{ request()->is('admin/categories') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p> {{ __('category.categories') }} </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.categories.create') }}" class="nav-link {{ request()->is('admin/categories/create') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p> {{ __('category.create_category') }} </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="" class="nav-link {{ request()->is('admin/categories/edit') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p> {{ __('category.edit_category') }} </p>
                                    </a>
                                </li>

                            </ul>
                        {{-- @endcan --}}

                    </li>
                @endcan
                @can('Admin_Pages')
                    <li class="nav-item has-treeview">
                        <a href="" class="nav-link {{ request()->is('admin/pages*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-cog"></i>
                            <p>
                                {{ __('page.pages') }}
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        {{-- @can('Edit_Admin_Settings') --}}
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.pages') }}" class="nav-link {{ request()->is('admin/pages') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p> {{ __('page.pages') }} </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('admin.pages.create') }}" class="nav-link {{ request()->is('admin/pages/create') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p> {{ __('page.page_create') }} </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="" class="nav-link {{ request()->is('admin/pages/edit') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p> {{ __('page.edit_page') }} </p>
                                    </a>
                                </li>

                            </ul>
                        {{-- @endcan --}}

                    </li>
                @endcan


                @can('Admin_Settings')
                    <li class="nav-item has-treeview">
                        <a href="" class="nav-link {{ request()->is('admin/settings*') ? 'active' : '' }}">
                            <i class="nav-icon fas fa-cog"></i>
                            <p>
                                {{ __('settings.settings') }}
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        @can('Edit_Admin_Settings')
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('admin.settings') }}" class="nav-link {{ request()->is('admin/settings') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p> {{ __('settings.settings') }} </p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="" class="nav-link {{ request()->is('admin/settings/edit') ? 'active' : '' }}">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p> {{ __('settings.edit_settings') }} </p>
                                    </a>
                                </li>

                            </ul>
                        @endcan

                    </li>
                @endcan





                





                <li class="nav-item has-treeview">
                    <a href="{{ url('/') }}" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            {{ __('general.Front_Office') }}
                            {{-- <i class="right fas fa-angle-left"></i> --}}
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ route('logout') }}" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            {{ __('general.Logout') }}
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
