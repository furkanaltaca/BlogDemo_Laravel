<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Blog Demo')</title>

    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
    <link href="{{asset('frontend/')}}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{asset('frontend/')}}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href="{{asset('frontend/')}}/css/clean-blog.min.css" rel="stylesheet">

    @stack('css')
</head>

<body>
    @include('front.layouts.header')

    <div class="container">
        <div class="row">
            @yield('content')
        </div>
    </div>

    @include('front.layouts.footer')

    <script src="{{asset('frontend/')}}/vendor/jquery/jquery.min.js"></script>
    <script src="{{asset('frontend/')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('frontend/')}}/js/clean-blog.min.js"></script>

    @stack('js')

</body>

</html>