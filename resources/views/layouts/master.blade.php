<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('page-title', str_replace('-', ' ', config('app.name')))</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet"
          type="text/css">
    <link href="{{ asset('global_assets/css/icons/icomoon/styles.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/bootstrap_limitless.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/layout.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/components.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/colors.min.css') }}" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->
    @yield('css')
    @stack('css')

</head>

<body>

<!-- Main navbar -->
<div class="navbar navbar-expand-md navbar-dark bg-green">
    <div class="navbar-brand wmin-0 mr-5">
        <a href="../full/index.html" class="d-inline-block">
            <img src="{{ asset('global_assets/images/logo_light.png')}}" alt="">
        </a>
    </div>

    <div class="d-md-none">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
            <i class="icon-tree5"></i>
        </button>
    </div>

    <div class="collapse navbar-collapse" id="navbar-mobile">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="#" class="navbar-nav-link">Text link</a>
            </li>

            <li class="nav-item dropdown">
                <a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">Menu</a>

                <div class="dropdown-menu">
                    <a href="#" class="dropdown-item">Action</a>
                    <a href="#" class="dropdown-item">Another action</a>
                    <a href="#" class="dropdown-item">One more action</a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item">Separate action</a>
                </div>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a href="#" class="navbar-nav-link">
                    Text link
                </a>
            </li>

            <li class="nav-item dropdown">
                <a href="#" class="navbar-nav-link">
                    <i class="icon-bell2"></i>
                    <span class="d-md-none ml-2">Notifications</span>
                    <span class="badge badge-mark border-white ml-auto ml-md-0"></span>
                </a>
            </li>

            <li class="nav-item dropdown dropdown-user">
                <a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
                    <img src="../../../../global_assets/images/image.png" class="rounded-circle" alt="">
                    <span>Victoria</span>
                </a>

                <div class="dropdown-menu dropdown-menu-right">
                    <a href="#" class="dropdown-item"><i class="icon-user-plus"></i> My profile</a>
                    <a href="#" class="dropdown-item"><i class="icon-coins"></i> My balance</a>
                    <a href="#" class="dropdown-item"><i class="icon-comment-discussion"></i> Messages <span
                                class="badge badge-pill bg-blue ml-auto">58</span></a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item"><i class="icon-cog5"></i> Account settings</a>
                    <a href="#" class="dropdown-item"><i class="icon-switch2"></i> Logout</a>
                </div>
            </li>
        </ul>
    </div>
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
                <a href="../full/index.html" class="navbar-nav-link">
                    <i class="icon-home4 mr-2"></i>
                    Dashboard
                </a>
            </li>

            <li class="nav-item nav-item-levels mega-menu-full">
                <a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-make-group mr-2"></i>
                    Navigation
                </a>

                <div class="dropdown-menu dropdown-content">
                    <div class="dropdown-content-body">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="font-size-sm line-height-sm font-weight-semibold text-uppercase mt-1"><i
                                            class="icon-archive"></i> Documents & Policies
                                </div>
                                <div class="dropdown-divider mb-2"></div>
                                <div class="dropdown-item-group mb-3 mb-md-0">
                                    <ul class="list-unstyled">
                                        <li><a href="#" class="dropdown-item rounded">Standard Operating Procedure</a>
                                        </li>
                                        <li><a href="#" class="dropdown-item rounded">Departmental Organograms</a></li>
                                        <li><a href="#" class="dropdown-item rounded">Organisation Rules</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="font-size-sm line-height-sm font-weight-semibold text-uppercase mt-1"><i
                                            class="icon-users4"></i> People
                                </div>
                                <div class="dropdown-divider mb-2"></div>
                                <div class="dropdown-item-group mb-3 mb-md-0">
                                    <ul class="list-unstyled">
                                        <li><a href="#" class="dropdown-item rounded">People directory</a></li>
                                        <li><a href="#" class="dropdown-item rounded">Upcoming Birthdays</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="font-size-sm line-height-sm font-weight-semibold text-uppercase mt-1"><i
                                            class="icon-calendar"></i> Calendar & Events
                                </div>
                                <div class="dropdown-divider mb-2"></div>
                                <div class="dropdown-item-group mb-3 mb-md-0">
                                    <ul class="list-unstyled">
                                        <li><a href="#" class="dropdown-item rounded">Trainings </a></li>
                                        <li><a href="#" class="dropdown-item rounded"> CMEs</a></li>
                                        <li><a href="#" class="dropdown-item rounded"> Holidays</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="font-size-sm line-height-sm font-weight-semibold text-uppercase mt-1"><i
                                            class="icon-collaboration"></i> Departments
                                </div>
                                <div class="dropdown-divider mb-2"></div>
                                <div class="dropdown-item-group mb-3 mb-md-0">
                                    <ul class="list-unstyled">
                                        <li>
                                            <a href="#" class="dropdown-item rounded">Departmental Directory</a>
                                            <ul class="list-unstyled">
                                                <li><a href="#" class="dropdown-item rounded">Accounts</a></li>
                                                <li><a href="#" class="dropdown-item rounded">Billing</a></li>
                                                <li><a href="#" class="dropdown-item rounded">Housekeeping</a></li>
                                                <li><a href="#" class="dropdown-item rounded">Central Store</a></li>
                                                <li><a href="#" class="dropdown-item rounded">Pharmacy</a></li>
                                                <li><a href="#" class="dropdown-item rounded">Radiology</a></li>
                                                <li><a href="#" class="dropdown-item rounded">Pharmacy</a></li>
                                                <li><a href="#" class="dropdown-item rounded">Medical Records</a></li>
                                            </ul>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a href="#" class="navbar-nav-link dropdown-toggle " data-toggle="dropdown">
                    <i class="icon-strategy mr-2"></i>
                    Quick Links
                </a>

                <div class="dropdown-menu">
                    <a href="#" class="dropdown-item"><i class="icon-lock"></i> Change Password</a>
                    <a href="#" class="dropdown-item"><i class="icon-align-center-horizontal"></i> My Activity</a>
                    <a href="#" class="dropdown-item"><i class="icon-watch2"></i> Attendance records</a>
                    <a href="#" class="dropdown-item"><i class="icon-lifebuoy"></i> ICT Help desk</a>
                </div>
            </li>
        </ul>

        <ul class="navbar-nav navbar-nav-highlight ml-md-auto">
            <li class="nav-item">
                <a href="#" class="navbar-nav-link">Text link</a>
            </li>

            <li class="nav-item dropdown">
                <a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
                    <i class="icon-cog3"></i>
                    <span class="d-md-none ml-2">Dropdown</span>
                </a>

                <div class="dropdown-menu dropdown-menu-right">
                    <a href="#" class="dropdown-item"><i class="icon-user-lock"></i> Account security</a>
                    <a href="#" class="dropdown-item"><i class="icon-statistics"></i> Analytics</a>
                    <a href="#" class="dropdown-item"><i class="icon-accessibility"></i> Accessibility</a>
                    <div class="dropdown-divider"></div>
                    <a href="#" class="dropdown-item"><i class="icon-gear"></i> All settings</a>
                </div>
            </li>
        </ul>
    </div>
</div>
<!-- /secondary navbar -->

<!-- Page header -->
<div class="page-header">
    <div class="page-header-content header-elements-md-inline">
        <div class="page-title d-flex">
            <h4> <span class="font-weight-semibold">@yield('page-header')</span> - @yield('page-header-desc')</h4>
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
				&copy; 2018. <a href="#">{{ str_replace('-', ' ', config('app.name')) }}</a>
			</span>

        <ul class="navbar-nav ml-lg-auto">

            <li class="nav-item">
                <a href="https://themeforest.net/item/limitless-responsive-web-application-kit/13080328?ref=kopyov"
                   class="navbar-nav-link font-weight-semibold">
						<span class="text-pink-400">
							<i class="icon-lifebuoy mr-2"></i>
							Help
						</span>
                </a>
            </li>
        </ul>
    </div>
</div>
<!-- /footer -->

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
<!-- /theme JS files -->

<script>
    Noty.overrideDefaults({
        layout: 'bottomRight',
        // type: 'alert',
        timeout: 2500,
        progressBar: true,
    });

    @if(Session::has('info'))
    new Noty({
        theme: ' alert alert-info alert-styled-left p-0 bg-white',
        text: '{{ session::get('info') }}',
        type: 'info',
    }).show();
    @endif

    @if(Session::has('success'))
    new Noty({
        theme: ' alert alert-success alert-styled-left p-0 bg-white',
        text: '{{ session::get('success') }}',
        type: 'success',

    }).show();
    @endif

</script>

@yield('js')
@stack('js')

</body>
</html>
