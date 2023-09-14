<div class="user-panel mt-3 pb-3 mb-3 d-flex">
    <div class="image">
        @if (Auth::user()->image)
            <img src="{{ asset('images/users/' . Auth::user()->image) }}"
                style="height: 40px; width: 40px; border-radius: 50%" alt="User Image">
        @else
            <img src="{{ asset('images/users/default.png') }}" alt="Default Image"
                style="height: 40px; width: 40px; border-radius: 50%">
        @endif
    </div>

    <div class="info">
        <a href="{{ route('users.show', Auth::user()) }}" class="d-block">{{ Auth::user()->name }}</a>
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


<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <li class="nav-header text-primary  ">Admin Management</li>

        <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link {{ request()->is('dashboard*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-tachometer-alt text-warning"></i>
                <p>
                    Dashboard
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('adjustments') }}" class="nav-link {{ request()->is('adjustments*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-copy text-warning"></i>
                <p>Adjustments
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('users') }}" class="nav-link {{ request()->is('users*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-users text-warning"></i>
                <p>
                    Users
                </p>
            </a>
        </li>
    </ul>
</nav>
