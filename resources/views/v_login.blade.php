<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Log in - JVT Inventory</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- favicon2 -->
  <link rel="icon" href="{{ URL::asset('favicon2.png') }}" type="image/x-icon"/>
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset('template')}}/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('template')}}/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('template')}}/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('template')}}/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('template')}}/plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<style>
  button:focus, .form-control:focus, select, .select2-container *:focus{
    border-color: #eeeeee;
    box-shadow: inset 0 1px 1px rgba(255, 255, 255, 0.075), 0 0 8px rgba(255, 255, 255, 0.6);
    }

  .login-page{
    background: linear-gradient(66deg, rgba(142,21,185,1) 0%, rgba(50,18,80,1) 39%, rgba(47,30,91,1) 59%, rgba(0,212,255,1) 100%);
    backdrop-filter: blur(10px);
    background-size: cover;
    -webkit-backdrop-filter: blur(6px);
    height: 100%;
    width: 100%;
    position: absolute;
  }
  .login-box-body{
    background: rgba(255,255,255,0.2);
    border-radius: 8px;
  }

  .form-control{
    border-radius: 4px;
  }
</style>
<body class="hold-transition login-page">
  <div class="bg-image"></div>
<div class="login-box">
  <div class="login-logo">
    <a style="color: white" href="/"><b>Login</b> - JVT Inventory</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p style="color:rgb(223, 223, 223);" class="login-box-msg">Log In untuk masuk ke JVT Inventory</p>

    <form method="POST" action="{{ route('login') }}">
        @csrf
      <div class="form-group has-feedback">
        <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="Email" style="background: rgba(0, 0, 0, 0.4); color: white;">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input id="password" name="password" type="password" class="form-control" placeholder="Password" style="background: rgba(0, 0, 0, 0.4); color: white;">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        @error('email')
        <br>
        <span class="invalid-feedback" role="alert" style="color:rgb(243, 73, 73)">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        @error('password')
        <br>
        <span class="invalid-feedback" role="alert" style="color:rgb(243, 73, 73)">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>

            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block">Log In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="{{asset('template')}}/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('template')}}/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="{{asset('template')}}/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>

</body>
</html>
