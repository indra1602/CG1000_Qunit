<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('style/src/assets/images/favicon.png') }}">
    <title>SiLVue-FEP</title>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('style/src/dist/css/style.css') }}">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body>
    <div class="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center position-relative"
        style="background:url({{ asset('style/src/assets/images/big/auth-bg.jpg') }}) no-repeat center center;">
            <div class="row">
                <div class="offset-lg-3 col-lg-6 bg-white">
                    <div class="p-3">
                        <div class="text-center">
                            <img src="{{ asset('style/src/assets/images/Len.png') }}">
                        </div>
                        <h2 class="mt-3 text-center">Login</h2>
                        <h2 class="mt-3 text-center">SiLVue CG1000</h2>
                        <form class="mt-4" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}
                            <div class="row">
                            <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->
                                <div class="col-lg-12">
                                    <div class="form-group {{ $errors->has('username') ? ' has-error' : '' }}">
                                        <label class="text-dark" for="username">Username</label>
                                        <input class="form-control" id="username" name="username" type="text"
                                            placeholder="Username"
                                            value="{{ old('username') }}" required autocomplete="current-username" autofocus>
                                            @if ($errors->has('username'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('username') }}</strong>
                                                </span>
                                            @endif
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label class="text-dark" for="password">Password</label>
                                        <input class="form-control" id="password" name="password" type="password"
                                            placeholder="Password" required autocomplete="current-password">
                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                    </div>
                                </div>
                                <div class="col-lg-12 text-center">
                                    <button type="submit" class="btn btn-block btn-dark" id="btn_login" name="btn_login">Login</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <!-- Bootstrap tether Core JavaScript -->
    <script src="{{ asset('style/src/assets/libs/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('style/src/assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <!-- <script>
        $(".preloader ").fadeOut();
    </script> -->
</body>

</html>