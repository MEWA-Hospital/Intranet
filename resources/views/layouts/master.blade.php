<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('page-title', str_replace('-', ' ', config('app.name')))</title>

    <!-- Global stylesheets -->
    <link href="{{ asset('assets/css/fonts.css') }}" rel="stylesheet"
          type="text/css">
    <link href="{{ asset('global_assets/css/icons/icomoon/styles.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/bootstrap_limitless.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/layout.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/components.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/colors.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->
    @yield('css')
    @stack('css')

</head>

<body>

<div class="wrapper" id="app">
    <!-- Main navbar -->
    <div class="navbar navbar-expand-md navbar-dark bg-green">
        <div class="navbar-brand wmin-0 mr-5">
            <a href="{{ route('home') }}" class="d-inline-block">
                <img src="{{ asset('img/logo.png')}}" alt="">
            </a>
        </div>

        <div class="d-md-none">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
                <i class="icon-tree5"></i>
            </button>
        </div>
        @role('superadmin')
        <div class="collapse navbar-collapse" id="navbar-mobile">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Admin</a>

                    <div class="dropdown-menu dropdown-menu-right">

                        <div class="dropdown-submenu dropdown-submenu-right">
                            <a href="#" class="dropdown-item dropdown-toggle"><i class="icon-users"></i> Users</a>
                            <div class="dropdown-menu">
                                <a href="{{ route('admin.users.index')}}" class="dropdown-item"><i
                                            class="icon-users"></i> Users Details</a>
                                <a href="{{ route('admin.users.create')}}" class="dropdown-item"><i
                                            class="icon-user-plus"></i> Create User</a>
                            </div>
                        </div>
                        <div class="dropdown-submenu dropdown-submenu-right">
                            <a href="#" class="dropdown-item dropdown-toggle"><i class="icon-calendar"></i> Events</a>
                            <div class="dropdown-menu">
                                <a href="{{ route('admin.events.index')}}" class="dropdown-item"><i
                                            class="icon-calendar"></i> Event list</a>
                                <a href="{{ route('admin.events.create')}}" class="dropdown-item"><i
                                            class="icon-user-plus"></i> Create Event</a>
                            </div>
                        </div>
                        <div class="dropdown-submenu dropdown-submenu-right">
                            <a href="#" class="dropdown-item dropdown-toggle"><i class="icon-collaboration"></i>
                                Departments</a>
                            <div class="dropdown-menu">
                                <a href="{{ route('admin.departments.index')}}" class="dropdown-item"><i
                                            class="icon-collaboration"></i> Departments list</a>
                                <a href="{{ route('admin.departments.create')}}" class="dropdown-item"><i
                                            class="icon-collaboration "></i> Create Department</a>
                            </div>
                        </div>
                        <div class="dropdown-submenu dropdown-submenu-right">
                            <a href="#" class="dropdown-item dropdown-toggle"><i class="icon-file-text"></i>
                                Memo</a>
                            <div class="dropdown-menu">
                                <a href="{{ route('admin.memos.index')}}" class="dropdown-item"><i
                                            class="icon-file-text"></i> view memo</a>
                                <a href="{{ route('admin.memos.create')}}" class="dropdown-item"><i
                                            class="icon-file-plus"></i> Create Memo</a>
                            </div>
                        </div>
                        <div class="dropdown-submenu dropdown-submenu-right">
                            <a href="#" class="dropdown-item dropdown-toggle"><i class="icon-address-book3"></i>
                                Extensions</a>
                            <div class="dropdown-menu">
                                <a href="{{ route('admin.extensions.index')}}" class="dropdown-item"><i
                                        class="icon-phone2"></i> view extensions</a>
                                <a href="{{ route('admin.extensions.create')}}" class="dropdown-item"><i
                                        class="icon-phone-plus"></i> Create extension</a>
                            </div>
                        </div>

                    </div>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                {{--<li class="nav-item">--}}
                {{--<a href="#" class="navbar-nav-link">--}}
                {{--Text link--}}
                {{--</a>--}}
                {{--</li>--}}

                {{-- <li class="nav-item dropdown"> --}}
                {{-- <a href="#" class="navbar-nav-link"> --}}
                {{-- <i class="icon-bell2"></i> --}}
                {{-- <span class="d-md-none ml-2">Notifications</span> --}}
                {{-- <span class="badge badge-mark border-white ml-auto ml-md-0"></span> --}}
                {{-- </a> --}}
                {{-- </li> --}}

                <li class="nav-item dropdown dropdown-user">
                    <a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ asset($media) }}" class="rounded-circle" alt="">
                        <span>{{ Auth::user()->username }}</span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="{{ route('profile.index', auth()->user()->username) }}" class="dropdown-item"><i
                                    class="icon-user-plus"></i> My profile</a>
                        <a href="#" class="dropdown-item"><i class="icon-coins"></i> My balance</a>
                        <a href="#" class="dropdown-item"><i class="icon-comment-discussion"></i> Messages <span
                                    class="badge badge-pill bg-blue ml-auto">58</span></a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item"><i class="icon-cog5"></i> Account settings</a>
                        <a href="{{ route('logout') }}"
                           class="dropdown-item"
                           onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();" {{ __('Logout') }} >
                            <i class="icon-switch2"></i> Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
        @endrole
    </div>
    <!-- /main navbar -->


    <!-- Secondary navbar -->
    <div class="navbar navbar-expand-md navbar-light navbar-sticky border-top-0">
        <div class="text-center d-md-none w-100">
            <button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse"
                    data-target="#navbar-navigation">
                <i class="icon-unfold mr-2"></i>
                Navigation
            </button>
        </div>

        <div class="navbar-collapse collapse" id="navbar-navigation">
            <ul class="navbar-nav navbar-nav-highlight">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="navbar-nav-link">
                        <i class="icon-home4 mr-2"></i>
                        Dashboard
                    </a>
                </li>

                <li class="nav-item dropdown">
                    <a href="#" class="navbar-nav-link dropdown-toggle " data-toggle="dropdown">
                        <i class="icon-archive mr-2"></i>
                        Document & Policies
                    </a>

                    <div class="dropdown-menu">
                        <a href="#" class="dropdown-item"><i class="icon-file-word"></i> Standard Operating
                            Procedure</a>
                        <a href="#" class="dropdown-item"><i class="icon-file-pdf"></i> Departmental Organograms</a>
                        <a href="#" class="dropdown-item"><i class="icon-file-excel"></i> Organisation Rules</a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a href="#" class="navbar-nav-link dropdown-toggle " data-toggle="dropdown">
                        <i class="icon-users mr-2"></i>
                        People
                    </a>

                    <div class="dropdown-menu">
                        <a href="{{ route('frontend.people.index') }}" class="dropdown-item"><i class="icon-people"></i> People directory</a>
                        {{--<a href="#" class="dropdown-item"><i class="icon-calendar"></i> Upcoming Birthdays</a>--}}
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a href="#" class="navbar-nav-link dropdown-toggle " data-toggle="dropdown">
                        <i class="icon-calendar3 mr-2"></i>
                        Calendar & Events
                    </a>

                    <div class="dropdown-menu">
                        <a href="{{ route('frontend.events.index') }}" class="dropdown-item"><i
                                    class="icon-archive"></i> Upcoming Events</a>
                        {{--<a href="#" class="dropdown-item"><i class="icon-align-center-horizontal"></i> Holidays</a>--}}
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a href="#" class="navbar-nav-link dropdown-toggle " data-toggle="dropdown">
                        <i class="icon-collaboration mr-2"></i>
                        Departments
                    </a>

                    <div class="dropdown-menu">
                        <a href="{{ route('frontend.departments.index') }}" class="dropdown-item"><i
                                    class="icon-archive"></i> Department directory</a>
                        {{--<a href="#" class="dropdown-item"><i class="icon-align-center-horizontal"></i> Departmental news</a>--}}
                    </div>
                </li>
            </ul>

            <ul class="navbar-nav navbar-nav-highlight ml-md-auto">
                {{--<li class="nav-item">--}}
                    {{--<a href="#" class="navbar-nav-link">Text link</a>--}}
                {{--</li>--}}

                {{--<li class="nav-item dropdown">--}}
                    {{--<a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">--}}
                        {{--<i class="icon-cog3"></i>--}}
                        {{--<span class="d-md-none ml-2">Dropdown</span>--}}
                    {{--</a>--}}

                    {{--<div class="dropdown-menu dropdown-menu-right">--}}
                        {{--<a href="#" class="dropdown-item"><i class="icon-user-lock"></i> Account security</a>--}}
                        {{--<a href="#" class="dropdown-item"><i class="icon-statistics"></i> Analytics</a>--}}
                        {{--<a href="#" class="dropdown-item"><i class="icon-accessibility"></i> Accessibility</a>--}}
                        {{--<div class="dropdown-divider"></div>--}}
                        {{--<a href="#" class="dropdown-item"><i class="icon-gear"></i> All settings</a>--}}
                    {{--</div>--}}
                {{--</li>--}}
            </ul>
        </div>
    </div>
    <!-- /secondary navbar -->

    <!-- Page header -->
    <div class="page-header">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><span class="font-weight-semibold">@yield('page-header')</span> @yield('page-header-desc')</h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>

            <div class="header-elements d-none">
                <form action="#">
                    <div class="form-group form-group-feedback form-group-feedback-right">
                        <input type="search" class="form-control wmin-md-200" placeholder="Search">
                        <div class="form-control-feedback">
                            <i class="icon-search4 font-size-sm text-muted"></i>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="breadcrumb-line breadcrumb-line-light border-bottom-teal">
            <div class="breadcrumb">
                <a href="index.html" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Home</a>
                <a href="components_page_header.html" class="breadcrumb-item">Current</a>
                <span class="breadcrumb-item active">Location</span>
            </div>
        </div>
    </div>
    <!-- /page header -->


    <!-- Page content -->
    <div class="page-content pt-0">

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Content area -->
            <div class="content">
                @yield('content')
            </div>
            <!-- /content area -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

    <flash message="{{ session('flash') }}"></flash>
    <!-- Footer -->
    <div class="navbar navbar-expand-lg navbar-light">
        <div class="text-center d-lg-none w-100">
            <button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse"
                    data-target="#navbar-footer">
                <i class="icon-unfold mr-2"></i>
                Footer
            </button>
        </div>

        <div class="navbar-collapse collapse" id="navbar-footer">
            <span class="navbar-text">
                &copy; 2018. {{ str_replace('-', ' ', config('app.name')) }}
            </span>

            <ul class="navbar-nav ml-lg-auto">

                {{--<li class="nav-item">--}}
                    {{--<a href="https://themeforest.net/item/limitless-responsive-web-application-kit/13080328?ref=kopyov"--}}
                       {{--class="navbar-nav-link font-weight-semibold">--}}
                        {{--<span class="text-pink-400">--}}
                            {{--<i class="icon-lifebuoy mr-2"></i>--}}
                            {{--Help--}}
                        {{--</span>--}}
                    {{--</a>--}}
                {{--</li>--}}
            </ul>
        </div>
    </div>

    <!-- /footer -->
</div>
<!-- Core JS files -->
<script src="{{ asset('global_assets/js/main/jquery.min.js') }}"></script>
<script src="{{ asset('global_assets/js/main/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('global_assets/js/plugins/loaders/blockui.min.js') }}"></script>
<script src="{{ asset('global_assets/js/plugins/ui/slinky.min.js') }}"></script>
<script src="{{ asset('global_assets/js/plugins/ui/fab.min.js') }}"></script>
<!-- /core JS files -->
<!-- Theme JS files -->
<script src="{{ asset('global_assets/js/plugins/ui/sticky.min.js') }}"></script>
<script src="{{ asset('global_assets/js/plugins/notifications/noty.min.js') }}"></script>

<script src="{{ asset('assets/js/app.js') }}"></script>
<script src="{{ asset('global_assets/js/demo_pages/navbar_multiple_sticky_fab.js') }}"></script>
<script src="{{ asset('js/app.js') }}"></script>
<!-- /theme JS files -->
<script type="javascript">
    window.App = {!! json_encode([
        'csrfToken' => csrf_token(),
        'user' => Auth::user(),
        'signedIn' => Auth::check()
        ]) !!};
</script>

<script>
    $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
</script>

@yield('js')
@stack('js')

</body>
</html>
