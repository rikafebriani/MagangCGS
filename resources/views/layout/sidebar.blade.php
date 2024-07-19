<div class="nano">
    <div class="nano-content">

        <!--Profile Widget-->
        <!--================================-->
        <div id="mainnav-profile" class="mainnav-profile">
            <div class="profile-wrap text-center">
                <div class="pad-btm">
                    <img class="img-circle img-md" src="{{ asset('assets/img/profile-photos/1.png') }}"
                        alt="Profile Picture">
                </div>
                <a href="#profile-nav" class="box-block" data-toggle="collapse" aria-expanded="false">
                    <span class="pull-right dropdown-toggle">
                        <i class="dropdown-caret"></i>
                    </span>
                    <p class="mnp-name">Aaron Chavez</p>
                    <span class="mnp-desc">aaron.cha@themeon.net</span>
                </a>
            </div>
            <div id="profile-nav" class="collapse list-group bg-trans">
                <a href="#" class="list-group-item">
                    <i class="demo-pli-male icon-lg icon-fw"></i> View Profile
                </a>
                <a href="#" class="list-group-item">
                    <i class="demo-pli-gear icon-lg icon-fw"></i> Settings
                </a>
                <a href="#" class="list-group-item">
                    <i class="demo-pli-information icon-lg icon-fw"></i> Help
                </a>
                <a href="#" class="list-group-item">
                    <i class="demo-pli-unlock icon-lg icon-fw"></i> Logout
                </a>
            </div>
        </div>


        <!--Shortcut buttons-->
        <!--================================-->
        <div id="mainnav-shortcut" class="hidden">
            <ul class="list-unstyled shortcut-wrap">
                <li class="col-xs-3" data-content="My Profile">
                    <a class="shortcut-grid" href="#">
                        <div class="icon-wrap icon-wrap-sm icon-circle bg-mint">
                            <i class="demo-pli-male"></i>
                        </div>
                    </a>
                </li>
                <li class="col-xs-3" data-content="Messages">
                    <a class="shortcut-grid" href="#">
                        <div class="icon-wrap icon-wrap-sm icon-circle bg-warning">
                            <i class="demo-pli-speech-bubble-3"></i>
                        </div>
                    </a>
                </li>
                <li class="col-xs-3" data-content="Activity">
                    <a class="shortcut-grid" href="#">
                        <div class="icon-wrap icon-wrap-sm icon-circle bg-success">
                            <i class="demo-pli-thunder"></i>
                        </div>
                    </a>
                </li>
                <li class="col-xs-3" data-content="Lock Screen">
                    <a class="shortcut-grid" href="#">
                        <div class="icon-wrap icon-wrap-sm icon-circle bg-purple">
                            <i class="demo-pli-lock-2"></i>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
        <!--================================-->
        <!--End shortcut buttons-->


        <ul id="mainnav-menu" class="list-group">

            <!--Category name-->
            <li class="list-header">Navigation</li>

            <li class="@yield('dashboard')">
                <a href="{{ route('dashboard') }}">
                    <i class="demo-pli-home"></i>
                    <span class="menu-title">
                        Dashboard
                    </span>
                </a>
            </li>

            <!--Menu list item-->
            <li class="@yield('akademik')">
                <a href="#">
                    <i class="demo-pli-split-vertical-2"></i>
                    <span class="menu-title">Akademik</span>
                    <i class="arrow"></i>
                </a>

                <!--Submenu-->
                <ul class="collapse">
                    <li class="@yield('matakuliah')"><a href="{{ route('dashboard.matakuliah.index') }}">Matakuliah</a>
                    </li>
                </ul>
            </li>

            <li class="@yield('data_master')">
                <a href="#">
                    <i class="demo-pli-split-vertical-2"></i>
                    <span class="menu-title">Data Master</span>
                    <i class="arrow"></i>
                </a>

                <!--Submenu-->
                <ul class="collapse">
                    <li class="@yield('fakultas')"><a href="{{ route('dashboard.fakultas.index') }}">Fakultas</a></li>
                    <li class="@yield('prodi')"><a href="{{ route('dashboard.prodi.index') }}">Prodi</a></li>
                    <li class="@yield('kelas')"><a href="{{ route('dashboard.kelas.index') }}">Kelas</a></li>
                    <li class="@yield('jenjang')"><a href="{{ route('dashboard.jenjang.index') }}">Jenjang</a></li>
                    <li class="@yield('jenisjabatan')"><a href="{{ route('dashboard.jenisjabatan.index') }}">Jenis Jabatan</a></li>
                    <li class="@yield('jenismatakuliah')"><a href="{{ route('dashboard.jenismatakuliah.index') }}">Jenis Matakuliah</a></li>
                </ul>
            </li>



        </ul>


        <!--Widget-->
        <!--================================-->
        <div class="mainnav-widget">

            <!-- Show the button on collapsed navigation -->
            <div class="show-small">
                <a href="#" data-toggle="menu-widget" data-target="#demo-wg-server">
                    <i class="demo-pli-monitor-2"></i>
                </a>
            </div>

            <!-- Hide the content on collapsed navigation -->
            <div id="demo-wg-server" class="hide-small mainnav-widget-content">
                <ul class="list-group">
                    <li class="list-header pad-no mar-ver">Server Status</li>
                    <li class="mar-btm">
                        <span class="label label-primary pull-right">15%</span>
                        <p>CPU Usage</p>
                        <div class="progress progress-sm">
                            <div class="progress-bar progress-bar-primary" style="width: 15%;">
                                <span class="sr-only">15%</span>
                            </div>
                        </div>
                    </li>
                    <li class="mar-btm">
                        <span class="label label-purple pull-right">75%</span>
                        <p>Bandwidth</p>
                        <div class="progress progress-sm">
                            <div class="progress-bar progress-bar-purple" style="width: 75%;">
                                <span class="sr-only">75%</span>
                            </div>
                        </div>
                    </li>
                    <li class="pad-ver"><a href="#" class="btn btn-success btn-bock">View Details</a></li>
                </ul>
            </div>
        </div>
        <!--================================-->
        <!--End widget-->

    </div>
</div>
