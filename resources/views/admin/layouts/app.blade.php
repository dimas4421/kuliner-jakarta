<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin Dashboard</title>

    <!-- Custom fonts for this template-->
    <link
    href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap"
    rel="stylesheet"
/>
    <link href="{{ asset('backend/admin/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin Dashboard</div>
    </a>

    <hr class="sidebar-divider my-0">

    <!-- Dashboard Link -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Users Link -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin.user') }}">
            <i class="fas fa-users"></i>
            <span>Users</span>
        </a>
    </li>

    <!-- Kuliner Link -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin.kuliner') }}">
            <i class="fas fa-location-dot"></i>
            <span>Tempat Kuliner</span>
        </a>
    </li>

    <!-- Review Link -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin.review') }}">
            <i class="fas fa-comment-dots"></i>
            <span>Review</span>
        </a>
    </li>

    <hr class="sidebar-divider d-none d-md-block">

    <!-- Spacing to push logout to bottom -->
    <div class="mt-auto"></div>

    <!-- Logout -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt"></i>
            <span>Logout</span>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </li>

</ul>
<!-- End of Sidebar -->

<!-- End of Sidebar -->


      <!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
      <!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <nav class="site-nav">
        <div class="container d-flex align-items-center">
            <!-- Logo -->
            <img src="{{ asset('uploads/logo.png') }}" alt="Logo" style="width: 40px; height: 40px; margin-right: 10px;">

            <!-- Nama Brand -->
            <a class="logo m-0" style="font-family: 'Work Sans', sans-serif; font-size: 24px; font-weight: 600; color: #2c3e50;">
                Kulineran Bareng
            </a>
        </div>
    </nav>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                <img class="img-profile rounded-circle" src="{{ asset('backend/admin/img/undraw_profile.svg') }}">
            </a>
        </li>
    </ul>
</nav>
<!-- End of Topbar -->

        <!-- End of Topbar -->
>

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    @yield('content')
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website {{ date('Y') }}</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('backend/admin/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/admin/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/admin/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('backend/admin/js/sb-admin-2.min.js') }}"></script>
</body>

</html>
