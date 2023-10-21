<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="{{ route('customerlist') }}">
            <span class="align-middle">Installment's App</span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('customerlist') }}">
                    <i class="align-middle" data-feather="users"></i> <span class="align-middle">Customers</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('admin.show') }}">
                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">Admins List</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('request.show') }}">
                    <i class="align-middle" data-feather="git-pull-request"></i> <span class="align-middle">Item Requests</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
