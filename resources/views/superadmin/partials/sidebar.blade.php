<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="{{ route('customerlist') }}">
            <span class="align-middle">Installment's App</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('superadmin.dashboard') }}">
                    <i class="align-middle" data-feather="trello"></i> <span class="align-middle">Dashboard</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('customerlist') }}">
                    <i class="align-middle" data-feather="users"></i> <span class="align-middle">Customers</span>
                </a>
            </li>


            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('request.show') }}">
                    <i class="align-middle" data-feather="git-pull-request"></i> <span class="align-middle">Item Requests</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('admin.show') }}">
                    <i class="align-middle" data-feather="users"></i> <span class="align-middle">Admins List</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('items.show') }}">
                    <i class="align-middle" data-feather="grid"></i> <span class="align-middle">Items Management</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('plans.show') }}">
                    <i class="align-middle" data-feather="package"></i> <span class="align-middle">Plans</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
