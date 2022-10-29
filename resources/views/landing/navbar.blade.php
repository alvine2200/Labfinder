<div class="container-fluid sticky-top bg-white shadow-sm">
    <div class="container">
        <nav class="navbar navbar-expand-lg bg-white navbar-light py-3 py-lg-0">
            <a href="index.html" class="navbar-brand">
                <h1 class="m-0 text-uppercase text-primary"><i class="fa fa-clinic-medical me-2"></i>LabFinder</h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="{{ url('') }}" class="nav-item nav-link active">Home</a>
                    <a href="{{ url('labs') }}" class="nav-item nav-link">Labs</a>
                    @if (Auth::user())
                        <a href="{{ url('make_appointment') }}" class="nav-item nav-link">Dashboard</a>
                    @endif
                    @if (!Auth::user())
                        <a href="{{ url('login_view') }}" class="nav-item nav-link">Login</a>
                        <a href="{{ url('register_view') }}" class="nav-item nav-link">Register</a>
                    @endif
                </div>
            </div>
        </nav>
    </div>
</div>
