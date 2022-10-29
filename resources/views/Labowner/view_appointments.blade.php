<!DOCTYPE html>
<html lang="en">
@include('Labowner.header')

<body class="g-sidenav-show bg-gray-100">

    @include('Labowner.sidenav')

    <main class="main-content border-radius-lg">
        <!-- Navbar -->
        @include('Labowner.navbar')

        <!-- End Navbar -->

        <div class="container-fluid py-4">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Full Name</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Test To be Administered</th>
                        <th scope="col">Date</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($appointments as $appo)
                        <tr>
                            <td>{{ $appo?->fullname }}</td>
                            <td>{{ $appo?->phone }}</td>
                            <td>{{ $appo?->test }}</td>
                            <td>{{ $appo?->date }}</td>
                            <td><span class="btn btn-info">{{ $appo?->status }}</span></td>
                            <td>
                                <a href="{{ url('approve_appointment', $appo->id) }}" class="btn btn-primary">
                                    Approve Appointment</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

    </main>

    <!--   Core JS Files   -->
    @include('Admin.javascript')
</body>

</html>
