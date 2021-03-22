<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title') | JVT Inventory</title>
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

  <style>

    body{
      background: #BBB;
    }
    .divider{
      width: 100%;
      height: 1px;
      background: #BBB;
      margin: 1rem 0;
    }

    tfoot {
        display: table-header-group;
        border: none;
    }

    table.dataTable thead tr {
     background-color: #e6e6e6;
    }

    button:focus, .form-control:focus, .select2-container *:focus{
    border-color: #3c8dbc;
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(0, 132, 255, 0.6);
    }
  
    .select2-container {
	  font-weight: normal;
    }

    table#tbl_log.dataTable tbody tr:hover {
    color: rgb(0, 94, 165);
    background-color: rgb(231, 237, 242);
    font-weight: 500;
    box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.075), 0 2px 2px rgba(1, 20, 50, 0.6);
    }
 
</style>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lato&display=swap">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <header class="main-header">
    <!-- Logo -->
    <a href="/" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><i class="fa fa-home"></i></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>JVT</b> Inventory</span>
    </a>
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation"> 
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Notifications -->
          <li class="dropdown notifications-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-danger">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> Masa lisensi antivirus A akan segera berakhir dalam waktu X
                    </a>
                  </li>
                  <!-- end notification -->
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <span style="border-radius:50%; width:2.5em; height:2.5em; margin-top:-8px; margin-bottom:-12px; margin-right:3px" class="letterpic" title="{{ Auth::user()->name }}"></span>
                <span class="hidden-xs">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <div style="border-radius:50%; width:5em; height:5em; font-weight:bold; margin-bottom:-8px;" class="letterpic" alt="User Image" title="{{ Auth::user()->name }}"></div>
                <p>
                  {{ Auth::user()->name }} <br>{{ Auth::user()->email }} 
                </p>
                <p><small class="">Member sejak {{ isset(Auth::user()->created_at) ? Auth::user()->created_at->format('d-m-Y h:i:s A') : '-' }}</small></p>
              </li>
              <!-- Menu Body -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-flat">Log out</button>
                  </form>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

    <!-- sidebar menu: : style can be found in sidebar.less -->
    @include('layout.v_nav')

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header text-secondary">
      @yield('headertitle')
    </section>

    <!-- Main content -->
    <section class="content" container-fluid>

    @yield('content')

    <!--------------------------
        | Your Page Content Here |
        -------------------------->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.12
    </div>
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE</a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <div class="pad">
      This is an example of the control sidebar.
    </div>
  </aside><!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{asset('template')}}/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Natural -->
<script src="{{asset('template')}}/bower_components/jquery/dist/natural.js"></script>
<!-- jQuery Mask -->
<script src="{{asset('template')}}/bower_components/jquery/dist/jquery.mask.min.js"></script>
<!-- jQuery Letterpic -->
<script src="{{asset('template')}}/bower_components/jquery/dist/jquery.letterpic.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('template')}}/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="{{asset('template')}}/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- bootstrap datepicker -->
<script src="{{asset('template')}}/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- SlimScroll -->
<script src="{{asset('template')}}/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="{{asset('template')}}/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('template')}}/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for avatar purposes -->
<script src="{{asset('template')}}/dist/js/avatar.js"></script>
<!-- DataTables -->
<script src="{{asset('template/')}}/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{asset('template/')}}/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

{{-- Avatar Letterpic --}}
<script>
  $(".letterpic").letterpic({
    fill: 'color',
    colors: [ "#4B0082"],
    fontSize: 0.55,
  });
</script>

<script>
 $(function() {
    $("#tbl_user,#tbl_jenis_lisensi,#tbl_merk_sw,#tbl_merk_hw,#tbl_kategori_hw,#tbl_departemen,#tbl_staff,#tbl_kondisi,#tbl_lokasi").DataTable({
      initComplete: function () {
        $('#tbl_user_filter [type="search"]').focus()
        $('#tbl_jenis_lisensi_filter [type="search"]').focus()
        $('#tbl_merk_sw_filter [type="search"]').focus()
        $('#tbl_merk_hw_filter [type="search"]').focus()
        $('#tbl_kategori_hw_filter [type="search"]').focus()
        $('#tbl_departemen_filter [type="search"]').focus()
        $('#tbl_staff_filter [type="search"]').focus()
        $('#tbl_kondisi_filter [type="search"]').focus()
        $('#tbl_lokasi_filter [type="search"]').focus()
      },
      stateSave: true,
      lengthMenu: [[10, 20, 40, -1], [10, 20, 40, "All"]],
    });
    $('.select2').select2()
    //Date picker
    $('#datepicker1').datepicker({
      autoclose: true
    })
    $('#datepicker2').datepicker({
      autoclose: true
    })
  })
</script>


{{-- [Works] filter per kolom HW & SW --}}
<script>
  $(document).ready(function() {
    $('#tbl_hardware').DataTable( {
          initComplete: function () {            
              this.api().columns([2,3,4,5]).every( function () {
                  var column = this;
                  var select = $('<select class="f" style="width:100%;"><option value="">Show All</option></select>')
                      .appendTo( $(column.footer()).empty() )
                      .on( 'change', function () {
                          var val = $.fn.dataTable.util.escapeRegex(
                              $(this).val()
                          );
   
                          column
                              .search( val ? '^'+val+'$' : '', true, false )
                              .draw();
                      } );
   
                  column.data().unique().sort().each( function ( d, j ) {
                      select.append( '<option value="'+d+'">'+d+'</option>' )
                  } );
              
              } );
              $('#tbl_hardware_filter [type="search"]').focus()
          },
          stateSave: true,
          lengthMenu: [[10, 20, 40, -1], [10, 20, 40, "All"]],
          // columnDefs: [{ type: 'natural', targets: 0 }],
      } );
  
      $('#tbl_software').DataTable( {
          initComplete: function () {            
              this.api().columns([2,3]).every( function () {
                  var column = this;
                  var select = $('<select class="f" style="width:100%"><option value="">Show All</option></select>')
                      .appendTo( $(column.footer()).empty() )
                      .on( 'change', function () {
                          var val = $.fn.dataTable.util.escapeRegex(
                              $(this).val()
                          );
   
                          column
                              .search( val ? '^'+val+'$' : '', true, false )
                              .draw();
                      } );
   
                  column.data().unique().sort().each( function ( d, j ) {
                      select.append( '<option value="'+d+'">'+d+'</option>' )
                  } );
              } );
              $('#tbl_software_filter [type="search"]').focus()
              
          },
          stateSave: true,
          lengthMenu: [[10, 20, 40, -1], [10, 20, 40, "All"]],
          columnDefs: [{ type: 'natural', targets: 0 }],
      } );

      $('#tbl_log').DataTable( {
          initComplete: function () {            
              this.api().columns([2,]).every( function () {
                  var column = this;
                  var select = $('<select class="f" style="width:100%"><option value="">Show All</option></select>')
                      .appendTo( $(column.footer()).empty() )
                      .on( 'change', function () {
                          var val = $.fn.dataTable.util.escapeRegex(
                              $(this).val()
                          );
   
                          column
                              .search( val ? '^'+val+'$' : '', true, false )
                              .draw();
                      } );
   
                  column.data().unique().sort().each( function ( d, j ) {
                      select.append( '<option value="'+d+'">'+d+'</option>' )
                  } );
              } );
              $('#tbl_log_filter [type="search"]').focus()   
          },
          lengthMenu: [[10, 20, 40, -1], [10, 20, 40, "All"]],
      } );
  } );
  
  $(document).ready(function($) {
    $('.f').select2();
    $('.dataTables_length select').select2();
  });
  </script>

<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
</script>

{{-- Script Untuk mengingat status "Collapse" sidebar Navigation --}}
<script type="text/javascript">
    (function ($) {
        /* Store sidebar state */
        $('.sidebar-toggle').click(function(event) {
            event.preventDefault();
            if (Boolean(localStorage.getItem('sidebar-toggle-collapsed'))) {
                localStorage.setItem('sidebar-toggle-collapsed', '');
             } else {
                localStorage.setItem('sidebar-toggle-collapsed', '1');
             }
         });
    })(jQuery);
</script>
<script type="text/javascript">
    /* Recover sidebar state */
     (function () {
        if (Boolean(localStorage.getItem('sidebar-toggle-collapsed'))) {
            var body = document.getElementsByTagName('body')[0];
            body.className = body.className + ' sidebar-collapse';
        }
    })();
</script>
{{---------------------------------------------------------------------}}

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

{{-- Script Format Input Uang & FILTER--}} 
<script type="text/javascript">
  $(document).ready(function(){
      $('.uang').mask('000.000.000.000', {reverse: true});
  })
  $(document).submit(function() {
    $('.uang').unmask();
  });

</script>

{{-- Script User sedang login - Hilangkan Aksi --}}
<script>
  $('#tbl_user').on('draw.dt',function(){
  $( ".btn" ).not( "#btndeleteuser{{ Auth::user()->id }}, #btnedituser{{ Auth::user()->id }}" )
    .css( "visibility", "visible" );
  var textTd = document.getElementById("cellaksi{{Auth::user()->id}}");
  textTd.innerHTML = '<i class="fa fa-circle text-success"></i> User sedang Login';
  document.getElementById("cellaksi{{Auth::user()->id}}").style.color = "green";
  })
</script>

{{-- Script untuk Enter tidak Submit --}}
<script>
$('form').on('keydown', 'input, select', function(e) {
  
    if (e.key === "Enter") {
        var self = $(this), form = self.parents('form:eq(0)'), focusable, next;
        focusable = form.find('input,a,select,textarea').filter(':visible');
        next = focusable.eq(focusable.index(this)+1);
        if (next.length) {
         // next.focus();
        } else {
            form.submit();
        }
        return false;
    }
});
</script>


{{-- Script Untuk Auto Focus & Select saat Modal muncul --}}
<script>
  $('.modal').on('shown.bs.modal', function() {
  $(this).find('[autofocus], #button-tidak').focus().select();
  });
</script>

<script>

</script>
{{-----------------------------------------------}}

{{-- Jika Modal Error Auto Muncul --}}
@if (Session::has('errors'))
<script>
  $(document).ready(function(){
    $('#modal-add').modal({show: true});
})
</script>
@endif
{{-- 
<script>
  jQuery(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
});
</script> --}}

{{-- disable datepicker2 jika pilihan onetime subscribtion --}}
{{-- <script type="text/javascript">
  $(function () {
      $("#lisensi").change(function () {
          if ($(this).val() == 1) {
            $("#datepicker2").removeAttr("disabled");
          } else {            
            $("#datepicker2").attr("disabled", "disabled");
          }
      });
  });
</script> --}}

{{-- Percobaan di bawah ini --}}
{{-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script> --}}
{{-- <script type="text/javascript">
    $(function () {
        $("#ddlModels").change(function () {
            if ($(this).val() == 5) {
                $("#txtOther").removeAttr("disabled");
                $("#txtOther").focus();
            } else {
                $("#txtOther").attr("disabled", "disabled");
            }
        });
    });
</script>

<script src="script.js">
  var form = document.getElementById('userInfo'),
  gender = form.elements.gender;

  gender.onchange = function () {
    var form = this.form;
    if (this.value === 'male') {
        form.elements.pregnant.disabled = true;
    } else {
        form.elements.pregnant.disabled = false;
    }
  };
</script>

<script>
  function myFunction() {
    var x = document.getElementById("mySelect").value;
    document.getElementById("avatar").innerHTML = "You selected: " + x;
  }
</script> --}}

</body>
</html>
