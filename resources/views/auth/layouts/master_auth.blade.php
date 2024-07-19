<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>SIAKAD | Nifty - Admin Template</title>

    <!--Open Sans Font [ OPTIONAL ]-->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>

    <!--Bootstrap Stylesheet [ REQUIRED ]-->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <!--Nifty Stylesheet [ REQUIRED ]-->
    <link href="{{ asset('assets/css/nifty.min.css') }}" rel="stylesheet">

    <!--Nifty Premium Icon [ DEMONSTRATION ]-->
    <link href="{{ asset('assets/css/demo/nifty-demo-icons.min.css') }}" rel="stylesheet">

    <!--Pace - Page Load Progress Par [OPTIONAL]-->
    <link href="{{ asset('assets/plugins/pace/pace.min.css') }}" rel="stylesheet">
    <script src="{{ asset('assets/plugins/pace/pace.min.js') }}"></script>

    <!--Demo [ DEMONSTRATION ]-->
    <link href="{{ asset('assets/css/demo/nifty-demo.min.css') }}" rel="stylesheet">
</head>

<body>
    <div id="container" class="cls-container">
        <div id="bg-overlay"></div>

        <!-- LOGIN FORM -->
        @yield('content')
    </div>

    <!--jQuery [ REQUIRED ]-->
    <script src="{{ asset('assets/js/jquery.min.js') }}"></script>

    <!--BootstrapJS [ RECOMMENDED ]-->
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

    <!--NiftyJS [ RECOMMENDED ]-->
    <script src="{{ asset('assets/js/nifty.min.js') }}"></script>

    <!--Background Image [ DEMONSTRATION ]-->
    <script src="{{ asset('assets/js/demo/bg-images.js') }}"></script>

</body>

</html>
