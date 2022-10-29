<!DOCTYPE html>
<html lang="en">
@include('Labowner.header')

<body class="g-sidenav-show bg-gray-100">

    @include('Labowner.sidenav')

    <main class="main-content border-radius-lg">
        @include('Labowner.navbar')
        @include('Labowner.alerts')
        <div class="container-fluid py-4">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Lab Name</th>
                        <th scope="col">Lab Tests Offered</th>
                        <th scope="col">Lab Location</th>
                        <th scope="col">Lab Profile</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($labsprofile as $pro)
                        <tr>
                            <td>{{ $pro->name }}</td>
                            <td>{{ $pro->tests }}</td>
                            <td>{{ $pro->location }}</td>
                            <td>
                                <img height="100px" src="ProfileImages/{{ $pro->profile }}" alt="profileimage">
                            </td>
                            <td>
                                <a href="{{ url('edit_lab_profile', $pro->id) }}" class="btn btn-primary">Edit</a>
                                <a href="{{ url('delete_lab_profile', $pro->id) }}" class="btn btn-primary">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    </main>
    @include('Labowner.javascript')
</body>

</html>
