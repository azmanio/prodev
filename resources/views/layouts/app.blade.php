<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="description">
    <meta content="" name="keywords">

    <title>
        @yield('tittle', 'Beranda') - Prodev Media
    </title>

    @include('includes.style')
</head>

<body>
    <!-- ======= Header ======= -->
    @include('includes.navbar')

    @yield('content')

    <!-- ======= Footer ======= -->
    @include('includes.footer')

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center scrollto">
        <i class="bi bi-arrow-up-short"></i>
    </a>

    <!-- ===== Script ===== -->
    @include('includes.script')

</body>

</html>
