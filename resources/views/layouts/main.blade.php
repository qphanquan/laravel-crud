<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'qphanquan')</title>

    <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap-icons-1.11.1/bootstrap-icons.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/argon-dashboard.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nucleo-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/nucleo-svg.css') }}">
</head>
<body class="g-sidenav-show bg-gray-100">
    <div class="min-height-300 bg-primary position-absolute w-100"></div>
    <!-- Header -->
    @include('layouts.sidenav')
    
    <!-- Main Content -->
    <main class="main-content position-relative border-radius-lg">
        @include('components.navbar')

        @yield('main')
    </main>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert2@11.js') }}"></script>
    <script>
if(session('success')){
    Swal.fire({
    position: "top-end",
    icon: "success",
    title: "{{session('success')}}",
    showConfirmButton: false,
    timer: 1500
    });
} else if(session('error')){
    Swal.fire({
    position: "top-end",
    icon: "success",
    title: "{{session('error')}}",
    showConfirmButton: false,
    timer: 1500
    });
}
</script>
</body>
</html>