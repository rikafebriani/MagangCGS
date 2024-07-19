<!DOCTYPE html>
<html lang="en">


<head>
    @include('layout.head')
    <style>
        .d-none {
            display: none;
        }
    </style>

</head>

<body>
    <div id="container" class="effect aside-float aside-bright mainnav-lg">

        <!--NAVBAR-->
        <header id="navbar">
            @include('layout.navbar')
        </header>

        <div class="boxed">
            <!--CONTENT CONTAINER-->
            <div id="content-container">
                <div id="page-head">

                    <!--Page Title-->
                    <div id="page-title">
                        <h1 class="page-header text-overflow">@yield('title')</h1>
                    </div>

                    <!--Breadcrumb-->
                    <ol class="breadcrumb">
                        @section('breadcrumb')
                            <li><a href="{{ route('dashboard') }}"><i class="demo-pli-home"></i></a></li>
                        @show
                        {{-- <li class="active">Prodi</li> --}}
                    </ol>
                </div>

                <!--Page content-->
                <div id="page-content">
                    @yield('content')
                    {{-- @include('pages.admin.index') --}}
                </div>
            </div>

            <!--MAIN NAVIGATION-->
            <nav id="mainnav-container">
                <div id="mainnav">

                    <!--sidebar-->
                    <div id="mainnav-menu-wrap">
                        @include('layout.sidebar')
                    </div>
                </div>
            </nav>
        </div>

        <!-- FOOTER -->
        @include('layout.footer')

        <button class="scroll-top btn">
            <i class="pci-chevron chevron-up"></i>
        </button>
    </div>

    @include('layout.script')
</body>

</html>
