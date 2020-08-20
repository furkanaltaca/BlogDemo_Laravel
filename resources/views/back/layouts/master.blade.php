<!DOCTYPE html>
<html lang="tr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title', 'Admin Dashboard - Blog Demo')</title>

    @routes

    {{-- css --}}
    <link href="{{ asset('back/') }}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="{{ asset('back/') }}/css/sb-admin-2.min.css" rel="stylesheet">
    @toastr_css

    @stack('css')
    {{-- end css --}}
</head>

<body id="page-top">

    <div id="wrapper">

        @include('back.layouts.menu')

        <div id="content-wrapper" class="d-flex flex-column">

            <div id="content">

                @include('back.layouts.header')

                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">@yield('pageHeading')</h1>
                    </div>
                
                    @yield('content')

                </div>

            </div>

            @include('back.layouts.footer')

        </div>

    </div>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    {{-- js --}}
    <script src="{{ asset('back/') }}/vendor/jquery/jquery.min.js"></script>
    <script src="{{ asset('back/') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('back/') }}/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="{{ asset('back/') }}/js/sb-admin-2.min.js"></script>
    <script src="{{ asset('back/') }}/vendor/chart.js/Chart.min.js"></script>
    <script src="{{ asset('back/') }}/js/demo/chart-area-demo.js"></script>
    <script src="{{ asset('back/') }}/js/demo/chart-pie-demo.js"></script>
    @toastr_js
    @toastr_render

    @stack('js')

    {{-- end js --}}
</body>

</html>