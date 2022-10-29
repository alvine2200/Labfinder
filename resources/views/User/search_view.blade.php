<!DOCTYPE html>

<html lang="en">
@include('User.header')

<body class="g-sidenav-show bg-gray-100">

    @include('User.sidenav')

    <main class="main-content border-radius-lg">
        <!-- Navbar -->
        @include('User.navbar')
        @include('User.alerts')

        <!-- End Navbar -->

        <div class="container-fluid py-4">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Lab Name</th>
                        <th scope="col">Tests Offered</th>
                        <th scope="col">Lab Location</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($find as $fi)
                        <tr>
                            <td>{{ $fi->name }}</td>
                            <td>{{ $fi->tests }}</td>
                            <td>{{ $fi->location }}</td>
                            <td>
                                <a href="{{ url('appointment_details', $fi->id) }}" class="btn btn-secondary">Make
                                    Appointment</a>
                            <td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    </main>

    <!--   Core JS Files   -->
    @include('User.javascript')
</body>

</html>
