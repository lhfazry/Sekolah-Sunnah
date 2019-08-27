<li class="nav-item">
    <a href="{!! route('dashboard.index') !!}" class="nav-link {{ Request::is('admin/dashboard*') ? 'active' : '' }}"><i class="fa fa-tachometer-alt nav-icon"></i><p>Dashboard</p></a>
</li>

@php
$is_school = Request::is('admin/schools*') || Request::is('admin/unverified_schools*') || Request::is('admin/verified_schools*')
@endphp

<li class="nav-item has-treeview {{ $is_school ? 'menu-open' : '' }}">
    <a href="#" class="nav-link {{ $is_school ? 'active' : '' }}">
        <i class="nav-icon fas fa-graduation-cap"></i>
        <p>
        School
        <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="{{ $is_school  ? 'display:block' : '' }}">
        <li class="nav-item">
            <a href="{!! route('schools.index') !!}" class="nav-link {{ Request::is('admin/schools*') ? 'active' : '' }}"><i class="fa fa-graduation-cap nav-icon"></i><p>All</p></a>
        </li>

        <li class="nav-item">
            <a href="{!! route('schools.unverified') !!}" class="nav-link {{ Request::is('admin/unverified_schools*') ? 'active' : '' }}"><i class="fa fa-times-circle nav-icon"></i><p>Unverified</p></a>
        </li>

        <li class="nav-item">
            <a href="{!! route('schools.verified') !!}" class="nav-link {{ Request::is('admin/verified_schools*') ? 'active' : '' }}"><i class="fa fa-check-circle nav-icon"></i><p>Verified</p></a>
        </li>

        @if(\App\Models\Role::isAdmin())
        <li class="nav-item">
            <a href="{!! route('schools.editor_choice') !!}" class="nav-link {{ Request::is('admin/schools/editor_choice*') ? 'active' : '' }}"><i class="fa fa-gift nav-icon"></i><p>Editor Choice</p></a>
        </li>
        @endif
    </ul>
</li>

@if(\App\Models\Role::isAdmin())
@php
$is_user_management = Request::is('admin/users*') || Request::is('admin/roles*')
@endphp

<li class="nav-item has-treeview {{ $is_user_management ? 'menu-open' : '' }}">
    <a href="#" class="nav-link {{ $is_user_management ? 'active' : '' }}">
        <i class="nav-icon fas fa-users"></i>
        <p>
        User Management
        <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="{{ $is_user_management  ? 'display:block' : '' }}">
        <li class="nav-item">
            <a href="{!! route('roles.index') !!}" class="nav-link {{ Request::is('admin/roles*') ? 'active' : '' }}"><i class="fa fa-users-cog nav-icon"></i><p>Roles</p></a>
        </li>

        <li class="nav-item">
            <a href="{!! route('users.index') !!}" class="nav-link {{ Request::is('admin/users*') ? 'active' : '' }}"><i class="fa fa-users nav-icon"></i><p>Users</p></a>
        </li>
    </ul>
</li>
@endif

@php
$is_report = Request::is('reports*')
@endphp

<li class="nav-item has-treeview {{ $is_report ? 'menu-open' : '' }}">
    <a href="#" class="nav-link {{ $is_report ? 'active' : '' }}">
        <i class="nav-icon fas fa-table"></i>
        <p>
        Report
        <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="{{ $is_report  ? 'display:block' : '' }}">
        <li class="nav-item">
            <a href="{!! route('reports.cities') !!}" class="nav-link {{ Request::is('reports/cities*') ? 'active' : '' }}"><i class="fa fa-table nav-icon"></i><p>By City</p></a>
        </li>
    </ul>
</li>

@if(\App\Models\Role::isAdmin())
@php
$is_master_data = Request::is('admin/provinces*') || Request::is('admin/cities*') || Request::is('admin/facilities*') || Request::is('admin/levels*');
@endphp

<li class="nav-item has-treeview {{ $is_master_data ? 'menu-open' : '' }}">
    <a href="#" class="nav-link {{ $is_master_data ? 'active' : '' }}">
        <i class="nav-icon fas fa-database"></i>
        <p>
        Master Data
        <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview" style="{{ $is_master_data  ? 'display:block' : '' }}">
        <li class="nav-item">
            <a href="{!! route('provinces.index') !!}" class="nav-link {{ Request::is('admin/provinces*') ? 'active' : '' }}"><i class="far fa-building nav-icon"></i><p>Provinces</p></a>
        </li>

        <li class="nav-item">
            <a href="{!! route('cities.index') !!}" class="nav-link {{ Request::is('admin/cities*') ? 'active' : '' }}"><i class="fa fa-suitcase nav-icon"></i><p>Cities</p></a>
        </li>

        <li class="nav-item">
            <a href="{!! route('facilities.index') !!}" class="nav-link {{ Request::is('admin/facilities*') ? 'active' : '' }}"><i class="fa fa-car nav-icon"></i><p>Fasilities</p></a>
        </li>

        <li class="nav-item">
            <a href="{!! route('levels.index') !!}" class="nav-link {{ Request::is('admin/levels*') ? 'active' : '' }}"><i class="fa fa-child nav-icon"></i><p>School Levels</p></a>
        </li>
    </ul>
</li>
@endif
