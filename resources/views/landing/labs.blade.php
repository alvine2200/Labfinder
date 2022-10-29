<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>MEDINOVA - Hospital Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&family=Roboto:wght@400;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="landingpage/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="landingpage/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="landingpage/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="landingpage/css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Topbar Start -->
    @include('landing.topnav')
    <!-- Topbar End -->


    <!-- Navbar Start -->
    @include('landing.navbar')
    <!-- Navbar End -->

    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5" style="max-width: 500px;">
                <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">All Labs Displayed</h5>
                <h1 class="display-4">Make your Appointment</h1>
            </div>
            <div class="row g-5">
                @foreach ($labs as $lab)
                    <div class="col-lg-4 col-md-6">
                        <div
                            class="service-item bg-light rounded d-flex flex-column align-items-center justify-content-center text-center">
                            <div class=" mb-4">
                                <img src="ProfileImages/{{ $lab->profile }}" style="border-radius: 50%; width:80px;"
                                    alt="image">
                            </div>
                            <h4 class="mb-3">{{ $lab->name }}</h4>
                            <p class="m-0"> Tests Offered are: {{ $lab->tests }}</p>
                            <p class="m-0  mt-2"> Lab Location: {{ $lab->location }}</p>

                            <p class="m-0 mt-3"> <a style="color:red; !important;"
                                    href="{{ url('book_appointment', $lab->id) }}">Book Appointment</a>
                            </p>

                            <a class="btn btn-lg btn-primary rounded-pill" href="">
                                <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Footer Start -->
    @include('landing.footer')
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="landingpage/lib/easing/easing.min.js"></script>
    <script src="landingpage/lib/waypoints/waypoints.min.js"></script>
    <script src="landingpage/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="landingpage/lib/tempusdominus/js/moment.min.js"></script>
    <script src="landingpage/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="landingpage/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="landingpage/js/main.js"></script>
</body>

</html>
