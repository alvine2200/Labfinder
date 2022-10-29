<!DOCTYPE html>
<html lang="en">
@include('Labowner.header')


<body class="g-sidenav-show bg-gray-100">

    @include('Labowner.sidenav')

    <main class="main-content border-radius-lg">
        <!-- Navbar -->
        @include('Labowner.navbar')
        @include('Labowner.alerts')

        <div class="container-fluid py-4">
            <form action="{{ url('create_lab_profile') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div style="width:100% !important" class="form-group mb-5">
                    <label for="exampleInputEmail1">Lab Name</label>
                    <input name="name" style="border:1px solid grey; border-radius:5px; !important" type="text"
                        class="form-control" placeholder="Enter Name of the lab">
                </div>

                <div class="form-group mb-5">
                    <select id="tests" multiple name="tests[]"
                        style="width:100%; height:40px; border-radius:6px; padding:5px; !important"
                        class="custom-select custom-select-lg mb-3">
                        <option value="arthritis">arthritis</option>
                        <option value="blood pressure">blood pressure</option>
                        <option value="corona">corona</option>
                        <option value="diabetes">diabetes</option>
                        <option value="drug toxicology">drug toxicology</option>
                        <option value="hepatitis a">hepatitis a</option>
                        <option value="hepatitis b">hepatitis b</option>
                        <option value="hcv">hcv</option>
                        <option value="h pylori">h pylori</option>
                        <option value="urinalysis">urinalysis</option>
                    </select>
                </div>
                <div class="form-group mb-5">
                    <select name="location" style="width:100%; height:40px; border-radius:6px; padding:5px;"
                        class="custom-select custom-select-lg mb-3">
                        <option selected>Select Lab Location</option>
                        <option value="cbd">cbd</option>
                        <option value="donholm">donholm</option>
                        <option value="kahawa">kahawa</option>
                        <option value="pangani">pangani</option>
                        <option value="ruai">ruai</option>
                        <option value="south b">south b</option>
                        <option value="upperhill">upperhill</option>
                        <option value="westlands">westlands</option>
                    </select>
                </div>
                <div style="width:25%; !important" class="form-group mb-5">
                    <label for="exampleInputEmail1">Profile Image</label>
                    <input name="profile" style="border:1px solid grey; border-radius:5px; !important" type="file"
                        class="form-control">
                </div>
                <input type="submit" value="Submit" class="btn btn-primary">
            </form>
        </div>

        </div>

    </main>
    <script>
        $('#tests').select2({
            width: '100%',
            placeholder: "Select Test Option",
            allowClear: true
        });
    </script>
    @include('Labowner.javascript')
</body>

</html>
