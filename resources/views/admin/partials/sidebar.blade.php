<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="{{ route('customerlist') }}">
            <span class="align-middle">Installment's App</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('admin.dashboard') }}">
                    <i class="align-middle" data-feather="trello"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('admin.customerlist') }}">
                    <i class="align-middle" data-feather="users"></i> <span class="align-middle">Customers</span>
                </a>
            </li>

        </ul>
    </div>
</nav>
