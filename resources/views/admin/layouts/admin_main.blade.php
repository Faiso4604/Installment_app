<!DOCTYPE html>
<html lang="en">


@include('admin.partials.head')

<body>
    <div class="wrapper">
        @include('admin.partials.sidebar')

        <div class="main">
            @include('admin.partials.topbar')

            @yield('content')

        </div>
    </div>

    <script src="{{ asset('template/js/app.js') }}"></script>

</body>

</html>
