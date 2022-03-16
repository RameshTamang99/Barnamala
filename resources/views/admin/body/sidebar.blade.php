@php
$prefix = Request::route()->getprefix();
$route = Route::current()->getName();

@endphp

<aside class="main-sidebar">
    <!-- sidebar-->
    <section class="sidebar">
        <div class="user-profile">
            <div class="ulogo">
                <a href="{{ route('dashboard') }}">
                    <!-- logo for regular state and mobile devices -->
                    <div class="d-flex align-items-center justify-content-center">
                        <img src="{{ asset('public/backend/images/logo-dark.png') }}" alt="">
                        <h3>BARNAMAALA</h3>
                    </div>
                </a>
            </div>
        </div>

        <!-- sidebar menu-->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="{{ $route == 'dashboard' ? 'active' : '' }} ">
                <a href="{{ route('dashboard') }}">
                    <i data-feather="pie-chart"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            @if (Auth::user()->role == 'Admin')
                <li class="treeview  ">
                    <a href="#">
                        <i data-feather="align-justify"></i>
                        <span>Contents</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="treeview {{ $prefix == '/byanjan' ? 'active' : '' }}">
                            <li>
                                <a href="{{ route('byanjan.view') }}"><i class="ti-more"></i>View Byanjan</a>
                            </li>
                        </li>

                        <li class="treeview {{ $prefix == '/barakhari' ? 'active' : '' }}">
                            <li>
                                <a href="{{ route('byanjanBarakhari.view') }}"><i class="ti-more"></i>View Barakhari</a>
                            </li>
                        </li>

                        <li class="treeview {{ $prefix == '/kmk' ? 'active' : '' }}">
                            <li>
                                <a href="{{ route('kmk.view') }}"><i class="ti-more"></i>View Ka Mane Kachuwa</a>
                            </li>
                        </li>

                        <li class="treeview {{ $prefix == '/swor' ? 'active' : '' }}">
                            <li>
                                <a href="{{ route('swor.view') }}"><i class="ti-more"></i>View Swor</a>
                            </li>
                        </li>

                        <li class="treeview {{ $prefix == '/sankhya' ? 'active' : '' }}">
                            <li>
                                <a href="{{ route('sankhya.view') }}"><i class="ti-more"></i>View Sankhya</a>
                            </li>
                        </li>
                    </ul>
                </li>
            @endif
            @if (Auth::user()->role == 'Admin')
                <li class="treeview  ">
                    <a href="#">
                        <i data-feather="align-justify"></i>
                        <span>Informatives</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="treeview {{ $prefix == '/infoMenu' ? 'active' : '' }}">
                            <li>
                                <a href="{{ route('infoMenu.view') }}"><i class="ti-more"></i>View Informative Menu</a>
                            </li>
                        </li>
                    </ul>
                </li>
            @endif
            @if (Auth::user()->role == 'Admin')
                <li class="treeview">
                    <a href="#">
                        <i data-feather="align-justify"></i>
                        <span>Literatures</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="treeview {{ $prefix == '/literatureCategory' ? 'active' : '' }}">
                            <li>
                                <a href="{{ route('literatureCategory.view') }}"><i class="ti-more"></i>View Literature Category</a>
                            </li>
                        </li>
                    </ul>
                </li>
            @endif
            @if (Auth::user()->role == 'Admin')
                <li class="treeview  ">
                    <a href="#">
                        <i data-feather="align-justify"></i>
                        <span>Games</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="treeview {{ $prefix == '/quizCategory' ? 'active' : '' }}">
                            <li>
                                <a href="{{ route('quizCategory.view') }}"><i class="ti-more"></i>View Quiz Category</a>
                            </li>
                        </li>

                        <li class="treeview {{ $prefix == '/flipgames' ? 'active' : '' }}">
                            <li>
                                <a href="{{ route('flipGames.view') }}"><i class="ti-more"></i>View Flip Games</a>
                            </li>
                        </li>
                    </ul>
                </li>
            @endif
            @if (Auth::user()->role == 'Admin')
                <li class="treeview   ">
                    <a href="#">
                        <i data-feather="smartphone"></i>
                        <span>User Interface</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="treeview {{ $prefix == '/design/sign-up' ? 'active' : '' }}">
                            <li>
                                <a href="{{ route('signUpScreen.view') }}"><i class="ti-more"></i>View Sign Up Screen</a>
                            </li>
                        </li>

                        <li class="treeview {{ $prefix == '/design/login' ? 'active' : '' }}">
                            <li>
                                <a href="{{ route('loginScreen.view') }}"><i class="ti-more"></i>View Login Screen</a>
                            </li>
                        </li>

                        <li class="treeview {{ $prefix == '/infoMenuUi' ? 'active' : '' }}">
                            <li>
                                <a href="{{ route('informativeMenuUi.view') }}"><i class="ti-more"></i>View Informative Menu UI</a>
                            </li>
                        </li>
                        <li class="treeview {{ $prefix == '/design/barnamaala-menu' ? 'active' : '' }}">
                            <li>
                                <a href="{{ route('barnamaalaMenuUi.view') }}"><i class="ti-more"></i>View Barnamaala Menu UI</a>
                            </li>
                        </li>
                        <li class="treeview {{ $prefix == '/barnamaalaContentsMenuUi' ? 'active' : '' }}">
                            <li>
                                <a href="{{ route('barnamaalaContentsMenuUi.view') }}"><i class="ti-more"></i>View Contents MenuUI</a>
                            </li>
                        </li>
                        <li class="treeview {{ $prefix == '/kaManeKachuwaUi' ? 'active' : '' }}">
                            <li>
                                <a href="{{ route('kaManeKachuwaUi.view') }}"><i class="ti-more"></i>View Ka Mane Kachuwa UI</a>
                            </li>
                        </li>
                        <li class="treeview {{ $prefix == '/quizMenuUi' ? 'active' : '' }}">
                            <li>
                                <a href="{{ route('quizMenuUi.view') }}"><i class="ti-more"></i>View Quiz Menu UI</a>
                            </li>
                        </li>
                        <li class="treeview {{ $prefix == '/design/quiz-level' ? 'active' : '' }}">
                            <li>
                                <a href="{{ route('quizLevelUi.view') }}"><i class="ti-more"></i>View Quiz Level UI</a>
                            </li>
                        </li>
                        <li class="treeview {{ $prefix == '/quizQuestionUi' ? 'active' : '' }}">
                            <li>
                                <a href="{{ route('quizQuestionUi.view') }}"><i class="ti-more"></i>View Quiz Question UI</a>
                            </li>
                        </li>
                        <li class="treeview {{ $prefix == '/design/home' ? 'active' : '' }}">
                            <li>
                                <a href="{{ route('homeScreenUi.view') }}"><i class="ti-more"></i>View Home Screen UI</a>
                            </li>
                        </li>
                        <li class="treeview {{ $prefix == 'literatureUi' ? 'active' : '' }}">
                            <li>
                                <a href="{{ route('literatureUi.view') }}"><i class="ti-more"></i>View Literature UI</a>
                            </li>
                        </li>
                        <li class="treeview {{ $prefix == '/design/preloader' ? 'active' : '' }}">
                            <li>
                                <a href="{{ route('preloaderUi.view') }}"><i class="ti-more"></i>View Preloader UI</a>
                            </li>
                        </li>
                        <li class="treeview {{ $prefix == '/design/profile' ? 'active' : '' }}">
                            <li>
                                <a href="{{ route('profileUi.view') }}"><i class="ti-more"></i>View Profile UI</a>
                            </li>
                        </li>
                        <li class="treeview {{ $prefix == '/design/jingles' ? 'active' : '' }}">
                            <li>
                                <a href="{{ route('jinglesUi.view') }}"><i class="ti-more"></i>View Jingles UI</a>
                            </li>
                        </li>
                        <li class="treeview {{ $prefix == '/design/noWifi' ? 'active' : '' }}">
                            <li>
                                <a href="{{ route('noWifiUi.view') }}"><i class="ti-more"></i>View No Wifi UI</a>
                            </li>
                        </li>

                    </ul>
                </li>
            @endif
            @if (Auth::user()->role == 'Admin')
                <li class="treeview  ">
                    <a href="#">
                        <i data-feather="settings"></i>
                        <span>Settings</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="treeview {{ $prefix == '/settings' ? 'active' : '' }}">
                            <li>
                                <a href="{{ route('settings.view') }}"><i class="ti-more"></i>View Settings</a>
                            </li>
                        </li>
                    </ul>
                </li>
            @endif
            @if (Auth::user()->role == 'Admin')
                <li class="treeview {{ $prefix == '/users' ? 'active' : '' }} ">
                    <a href="#">
                        <i data-feather="users"></i>
                        <span>Manage Users</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('user.view') }}"><i class="ti-more"></i>View User</a></li>
                    </ul>
                </li>
            @endif

            @if (Auth::user()->role == 'Admin')
                <li class="treeview {{ $prefix == '/notifications' ? 'active' : '' }} ">
                    <a href="#">
                        <i data-feather="bell"></i>
                        <span>Notifications</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="{{ route('view.notification') }}"><i class="ti-more"></i>View Notification</a>
                        </li>
                    </ul>
                </li>
            @endif
            @if (Auth::user()->role == 'Admin')
                <li class="treeview {{ $prefix == '/profile' ? 'active' : '' }} ">
                    <a href="#">
                        <i data-feather="check-circle"></i> <span>Manage Profile</span>
                        <span class="pull-right-container">
                            <i class="fa fa-angle-right pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ route('profile.view') }}"><i class="ti-more"></i>Your Profile</a></li>
                        <li><a href="{{ route('password.view') }}"><i class="ti-more"></i>Change Password</a></li>
                    </ul>
                </li>
            @endif
        </ul>
    </section>
</aside>
