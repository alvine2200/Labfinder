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
                        <th scope="col">Test to be Examined</th>
                        <th scope="col">Lab Location</th>
                        <th scope="col">Appointment Date</th>
                        <th scope="col">Appointment Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($appointments as $appoint)
                        <tr>
                            <td>{{ $appoint->lab }}</td>
                            <td>{{ $appoint->test }}</td>
                            <td>{{ $appoint->location }}</td>
                            <td>{{ $appoint->date }}</td>
                            <td> <span style="color:brown;">{{ $appoint->status }}</span></td>
                            <td>
                                <a href="{{ url('cancel_appointment', $appoint->id) }}" class="btn btn-primary">
                                    Cancel An Appointment</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    </main>

    <!--   Core JS Files   -->
    @include('User.javascript')
</body>

</html>
