<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-header text-primary text-center">More Settings</li>

        <li class="nav-item">
            <a href="#" class="nav-link {{ request()->is('profile*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-globe"></i>
                <p>
                    About
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="#" class="nav-link {{ request()->is('profile*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-question-circle"></i>
                <p>
                    Help
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="#" class="nav-link {{ request()->is('profile*') ? 'active' : '' }}">
                <i class="nav-icon fas fa-phone"></i>
                <p>
                    Contact
                </p>
            </a>
        </li>
    </ul>
</nav>
