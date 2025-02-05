<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>@yield('title')</title>

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
<link href="{{ asset('assets/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/plugins/datatables/media/css/dataTables.bootstrap.css') }}" rel="stylesheet">
<link href="{{ asset('assets/plugins/datatables/extensions/Responsive/css/responsive.dataTables.min.css') }}"
    rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.5.1/sweetalert2.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.5.1/sweetalert2.all.min.js"></script>

<!--jQuery [ REQUIRED ]-->
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>

<!--DataTables [ OPTIONAL ]-->
<script src="{{ asset('assets/plugins/datatables/media/js/jquery.dataTables.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/media/js/dataTables.bootstrap.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js') }}"></script>

<!--DataTables Sample [ SAMPLE ]-->
<script src="{{ asset('assets/js/demo/tables-datatables.js') }}"></script>
