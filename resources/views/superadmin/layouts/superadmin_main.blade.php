<!DOCTYPE html>
<html lang="en">


@include('superadmin.partials.head')

<body>
    <div class="wrapper">
        @include('superadmin.partials.sidebar')

        <div class="main">
            @include('superadmin.partials.topbar')

            @yield('content')

        </div>
    </div>

    <script src="{{ asset('template/js/app.js') }}"></script>

</body>

</html>
