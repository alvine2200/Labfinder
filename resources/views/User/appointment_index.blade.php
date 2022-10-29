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
            <div class="form-right float-right mr-5">
                <form action="{{ url('search') }}" method="post">
                    @csrf
                    <div style="width:100%; display:inline-flex !important" class="mb-5">
                        <input name="search" style="border:1px solid grey; border-radius:5px; !important" type="text"
                            class="form-control mr-3" placeholder="Enter Name of test Or Lab">
                        <input type="submit" value="Search" class="btn btn-primary mr-3 form-control">
                    </div>
                </form>
            </div>


            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Lab Name</th>
                        <th scope="col">Lab Tests Offered</th>
                        <th scope="col">Lab Location</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($labs as $lab)
                        <tr>
                            <td>{{ $lab->name }}</td>
                            <td>{{ $lab->tests }}</td>
                            <td>{{ $lab->location }}</td>
                            <td>
                                <a href="{{ url('appointment_details', $lab->id) }}" class="btn btn-primary">Make
                                    Appointment</a>
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
