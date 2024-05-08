<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Log in</title>

    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">

    <link rel="stylesheet" href="{{ asset('assets/adminLTE/') }}/plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="{{ asset('assets/adminLTE/') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">

    <link rel="stylesheet" href="{{ asset('assets/adminLTE/') }}/css/adminlte.min.css">

</head>
<body class="login-page" style="min-height: 495.6px;">
<div class="login-box">

    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start your session</p>
            <form action="{{ route('admin.login.attempt') }}" method="post" data-np-autofill-form-type="other" data-np-checked="1"
                  data-np-watching="1">
                {{ csrf_field()}}
                <div class="input-group mb-3">
                    <input type="email" class="form-control" placeholder="Email" name="email" data-np-intersection-state="visible">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password" placeholder="Password"
                           data-np-intersection-state="visible">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" name="remember_me" id="remember">
                            <label for="remember">
                                Remember Me
                            </label>
                        </div>
                    </div>

                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>

                </div>
            </form>
        </div>

    </div>
</div>


<script src="{{ asset('assets/adminLTE/') }}/plugins/jquery/jquery.min.js"></script>

<script src="{{ asset('assets/adminLTE/') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="{{ asset('assets/adminLTE/') }}/js/adminlte.min.js?v=3.2.0"></script>

</body>
</html>
