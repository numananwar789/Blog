<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Dashboard</title>
    <!-- styles -->
    @include('admin.inc.styles')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('backend_assets/dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo"
                height="60" width="60">
        </div>
        @include('admin.inc.main_navbar')
        @include('admin.inc.main_sidebar')
        @include('admin.inc.main_content')
        @include('admin.inc.footer')
        @include('admin.inc.control_sidebar')
    </div>
    <!-- ./wrapper -->
    <!-- scripts -->
    @include('admin.inc.scripts')
</body>

</html>
