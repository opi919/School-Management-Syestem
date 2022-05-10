@php
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();

@endphp
<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">

        <div class="user-profile">
            <div class="ulogo">
                <a href="/dashboard">
                    <!-- logo for regular state and mobile devices -->
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{ asset('backend/images/logo-dark.png') }}" alt="">
                        <h3><b>Admin</b></h3>
                    </div>
                </a>
            </div>
        </div>

        <!-- sidebar menu-->
        <ul class="sidebar-menu" data-widget="tree">

            <li class="{{ $route == 'dashboard' ? 'active' : '' }}">
                <a href="/dashboard">
                    <i data-feather="pie-chart"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            @if (Auth::user()->role == 'admin')
                <li class="treeview {{ $prefix == '/user' ? 'active' : '' }}">
                    <a href="#">
                        <i data-feather="message-circle"></i>
                        <span>Manage User</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('user.index') }}"><i class="ti-more"></i>view user</a></li>
                        <li><a href="calendar.html"><i class="ti-more"></i>add user</a></li>
                    </ul>
                </li>
            @endif

            <li class="treeview">
                <a href="#">
                    <i data-feather="mail"></i> <span>Profile</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="mailbox_inbox.html"><i class="ti-more"></i>manage profile</a></li>
                    <li><a href="mailbox_compose.html"><i class="ti-more"></i>change password</a></li>
                </ul>
            </li>

            <li class="treeview {{ $prefix == '/management' ? 'active' : '' }}">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Management</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('class.index') }}"><i class="ti-more"></i>class</a></li>
                    <li><a href="{{ route('year.index') }}"><i class="ti-more"></i>year</a></li>
                    <li><a href="{{ route('group.index') }}"><i class="ti-more"></i>group</a></li>
                    <li><a href="{{ route('fee_category.index') }}"><i class="ti-more"></i>fee category</a>
                    </li>
                    <li><a href="{{ route('fee_amount.index') }}"><i class="ti-more"></i>fee amount</a></li>
                    <li><a href="{{ route('exam_type.index') }}"><i class="ti-more"></i>exam type</a></li>
                    <li><a href="{{ route('subjects.index') }}"><i class="ti-more"></i>subjects</a></li>
                    <li><a href="{{ route('assign_subject.index') }}"><i class="ti-more"></i>assign
                            subject</a></li>
                </ul>
            </li>
            <li class="treeview {{ $prefix == '/student' ? 'active' : '' }}">
                <a href="#">
                    <i data-feather="file"></i>
                    <span>Student Management</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('registration.index') }}"><i class="ti-more"></i>registration</a></li>
                </ul>
            </li>

            <li class="header nav-small-cap">User Interface</li>

            <li class="treeview">
                <a href="#">
                    <i data-feather="grid"></i>
                    <span>Components</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-right pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="components_alerts.html"><i class="ti-more"></i>Alerts</a></li>
                    <li><a href="components_badges.html"><i class="ti-more"></i>Badge</a></li>
                    <li><a href="components_buttons.html"><i class="ti-more"></i>Buttons</a></li>
                    <li><a href="components_sliders.html"><i class="ti-more"></i>Sliders</a></li>
                    <li><a href="components_dropdown.html"><i class="ti-more"></i>Dropdown</a></li>
                    <li><a href="components_modals.html"><i class="ti-more"></i>Modal</a></li>
                    <li><a href="components_nestable.html"><i class="ti-more"></i>Nestable</a></li>
                    <li><a href="components_progress_bars.html"><i class="ti-more"></i>Progress Bars</a></li>
                </ul>
            </li>

            <li>
                <a href="{{ route('logout') }}">
                    <i data-feather="lock"></i>
                    <span>Log Out</span>
                </a>
            </li>

        </ul>
    </section>

    <div class="sidebar-footer">
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title=""
            data-original-title="Settings" aria-describedby="tooltip92529"><i class="ti-settings"></i></a>
        <!-- item-->
        <a href="mailbox_inbox.html" class="link" data-toggle="tooltip" title=""
            data-original-title="Email"><i class="ti-email"></i></a>
        <!-- item-->
        <a href="javascript:void(0)" class="link" data-toggle="tooltip" title=""
            data-original-title="Logout"><i class="ti-lock"></i></a>
    </div>
</aside>
