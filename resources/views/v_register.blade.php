
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Tambah User</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset('template')}}/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('template')}}/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('template')}}/bower_components/Ionicons/css/ionicons.min.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="{{asset('template')}}/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('template/')}}/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="{{asset('template/')}}/bower_components/select2/dist/css/select2.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('template')}}/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{asset('template')}}/dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lato&display=swap">
</head>
<style>
  button:focus, .form-control:focus, .select2-container *:focus{
    border-color: #1060d8;
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(0, 132, 255, 0.6);
    }

  .login-page{
  background: linear-gradient(
          rgba(0, 0, 0, 0.2), 
          rgba(0, 0, 0, 0.2)
        ), url("jvtbg.png"),rgb(97, 97, 97);
  backdrop-filter: blur(6px);
  background-size: cover;
  -webkit-backdrop-filter: blur(6px);
  height: 100%;
  width: 100%;
  position: absolute;
  
}
}
</style>
<body class="hold-transition login-page">
<div style="margin-top:40px" class="login-box">
  <div class="login-logo">
    <a style="color: white"  href="/"><b>Tambah</b> User</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Isi form di bawah ini untuk mendaftar</p>

    <form method="POST" action="{{ route('register') }}">
        @csrf

      <div class="form-group has-feedback">
        <input autofocus name="name" class="form-control" placeholder="Nama" value="{{ old('name') }}">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>

      <div class="form-group has-feedback">
        <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>

      <div class="form-group has-feedback">
        <input id="password" name="password" type="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>

      <div class="form-group has-feedback">
        <input id="password" name="password_confirmation" type="password" class="form-control" placeholder="Konfirmasi Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>

      <div class="form-group has-feedback">
        <select id="level" name="level" class="form-control select2" style="width: 100%;">
            <option selected disabled value="Admin">Pilih Role (Default : User)</option>
            <option value="Admin">Admin</option>
            <option value="User">User</option>
        </select>
        <div class="text-danger">
            @error('level')
            {{ $message }}
            @enderror
        </div>
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
          <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
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
<!-- Select2 -->
<script src="{{asset('template')}}/bower_components/select2/dist/js/select2.full.min.js"></script>

{{-- Script Untuk memunculkan Dropdown otomatis saat focus --}}
<script>
  // on first focus (bubbles up to document), open the menu
  $(document).on('focus', '.select2-selection.select2-selection--single', function (e) {
    $(this).closest(".select2-container").siblings('select:enabled').select2('open');
  });
  // steal focus during close - only capture once and stop propogation
  $('select.select2').on('select2:closing', function (e) {
    $(e.target).data("select2").$selection.one('focus focusin', function (e) {
      e.stopPropagation();
    });
  });
  </script>
  {{----------------------------------------------------------}}

  <script>
    $(function () {
      $('.select2').select2()
    })
  </script>
</body>
</html>
