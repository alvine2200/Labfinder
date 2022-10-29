<!DOCTYPE html>
<html lang="en">
@include('Admin.header')

<body class="g-sidenav-show bg-gray-100">

    @include('Admin.sidenav')

    <main class="main-content border-radius-lg">
        <!-- Navbar -->
        @include('Admin.navbar')
        @include('Admin.alerts')
        <!-- End Navbar -->

        <div class="container-fluid py-4">

    </main>

    <!--   Core JS Files   -->
    @include('Admin.javascript')
</body>

</html>
