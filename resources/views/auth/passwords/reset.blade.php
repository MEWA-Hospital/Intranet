<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> {{ config('app.name') }}</title>

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

    <!-- Core JS files -->
    <script src="{{ asset('global_assets/js/main/jquery.min.js') }}"></script>
    <script src="{{ asset('global_assets/js/main/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('global_assets/js/plugins/loaders/blockui.min.js') }}"></script>
    <!-- /core JS files -->

    <!-- Theme JS files -->
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <!-- /theme JS files -->

</head>

<body>

<!-- Main navbar -->
<div class="navbar navbar-expand-md navbar-dark bg-green">
    <div class="navbar-brand">
        <a href="{{ url('/') }}" class="d-inline-block">
            <img src="{{ asset('global_assets/images/logo_light.png') }}" alt="">
        </a>
    </div>


</div>
<!-- /main navbar -->


<!-- Page content -->
<div class="page-content">

    <!-- Main content -->
    <div class="content-wrapper">

        <!-- Content area -->
        <div class="content d-flex justify-content-center align-items-center">

            <!-- Password recovery form -->
            <form class="login-form" method="POST" action="{{ route('password.request') }}"
                  aria-label="{{ __('Reset Password') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">

                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <div class="card mb-0">
                    <div class="card-body">
                        <div class="text-center mb-3">
                            <i class="icon-lock icon-2x text-warning border-warning border-3 rounded-round p-3 mb-3 mt-1"></i>
                            <h5 class="mb-0">{{ __('Reset Password') }}</h5>
                        </div>

                        <div class="form-group form-group-feedback form-group-feedback-right">
                            <input type="email" id="email" name="email"
                                   class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                   placeholder="Your email" value="{{ $email or old('email') }}" required autofocus>
                            <div class="form-control-feedback">
                                <i class="icon-mail5 text-muted"></i>
                            </div>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-group form-group-feedback form-group-feedback-right {{ $errors->has('password') ? ' has-error' : '' }}">
                            <input type="password" id="password" name="password"
                                   class="form-control {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                   placeholder="Enter a new password"
                                   required >
                            <div class="form-control-feedback">
                                <i class="icon-mail5 text-muted"></i>
                            </div>
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <div class="form-group form-group-feedback form-group-feedback-right {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                   class="form-control {{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}"
                                   placeholder="Confirm your password"
                                   required >
                            <div class="form-control-feedback">
                                <i class="icon-mail5 text-muted"></i>
                            </div>
                            @if ($errors->has('password_confirmation'))
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                            @endif
                        </div>

                        <button type="submit" class="btn bg-blue btn-block"><i
                                    class="icon-refresh mr-2"></i>  Reset Password </button>
                    </div>
                </div>
            </form>
            <!-- /password recovery form -->

        </div>
        <!-- /content area -->


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
    <!-- /main content -->

</div>
<!-- /page content -->

</body>
</html>
