  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{asset('template')}}/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i>
          @if (auth()->user()->level == 'Admin') 
          Admin
          @else User
          @endif</a>
        </div>
      </div>      
        <ul class="sidebar-menu" data-widget="tree" data-api="tree" data-accordion=1>
            <li class="header">MAIN NAVIGATION</li>
            <li class="{{ Request::segment(1) === 'hardware' ? 'active' : null }}">
              <a href="/hardware">
                  <i class="glyphicon glyphicon-lock"></i> <span>Hardware</span>
              </a>
            </li>
            <li class="{{ Request::segment(1) === 'software' ? 'active' : null }}">
              <a href="/software">
                <i class="fa fa-cloud"></i> <span>Software</span>
              </a>                
            </li>
            
            @if (auth()->user()->level == 'Admin') 
            <li class="{{ Request::segment(1) === 'admin' ? 'active' : null }}">
              <a href="/admin">
                <i class="glyphicon glyphicon-user"></i> <span>Admin</span>
              </a>
            </li>
            <li class="{{ Request::segment(1) === 'user' ? 'active' : null }}">
              <a href="/user">
                <i class="glyphicon glyphicon-user"></i> <span>User</span>
              </a>
            </li>         
            @endif

            <li class="treeview {{ (request()->is('masterdata/*')) ? 'active' : '' }}">
              <a href="#">
              <i class="fa fa-th-list"></i> <span>Master Data</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
              </span>
              </a>
              <ul class="treeview-menu">
              <li class="{{ (request()->is('masterdata/departemen')) ? 'active bg-black' : '' }}"><a href="/masterdata/departemen"><i class="fa fa-circle-o"></i>Departemen</a></li>
              <li class="{{ (request()->is('masterdata/lokasi')) ? 'active bg-black' : '' }}"><a href="/masterdata/lokasi"><i class="fa fa-circle-o"></i>Lokasi</a></li>
              <li class="{{ (request()->is('masterdata/merkhw')) ? 'active bg-black' : '' }}"><a href="/masterdata/merkhw"><i class="fa fa-circle-o"></i>Merk Hardware</a></li>
              <li class="{{ (request()->is('masterdata/merksw')) ? 'active bg-black' : '' }}"><a href="/masterdata/merksw"><i class="fa fa-circle-o"></i>Merk Software</a></li>
              <li class="{{ (request()->is('masterdata/kategorihw')) ? 'active bg-black' : '' }}"><a href="/masterdata/kategorihw"><i class="fa fa-circle-o"></i>Kategori Hardware</a></li>
              <li class="{{ (request()->is('masterdata/lisensisw')) ? 'active bg-black' : '' }}"><a href="/masterdata/lisensisw"><i class="fa fa-circle-o"></i>Lisensi Software</a></li>
              <li class="{{ (request()->is('masterdata/staff')) ? 'active bg-black' : '' }}"><a href="/masterdata/staff"><i class="fa fa-circle-o"></i>Staff</a></li>
              <li class="{{ (request()->is('masterdata/kondisi')) ? 'active bg-black' : '' }}"><a href="/masterdata/kondisi"><i class="fa fa-circle-o"></i>Kondisi</a></li>
              </ul>
          </li>
              </a>
            </li>
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>