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
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Full Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>
                                <a href="{{ url('make_labowner', $user->id) }}" class="btn btn-primary">Make LabOwner</a>
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
