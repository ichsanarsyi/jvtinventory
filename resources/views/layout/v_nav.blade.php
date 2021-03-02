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
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>      
        <ul class="sidebar-menu" data-widget="tree" data-api="tree" data-accordion=1>
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview {{ (request()->is('hardware/*')) ? 'active' : '' }}">
            <a href="#">
                <i class="glyphicon glyphicon-lock"></i> <span>Hardware</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{ (request()->is('hardware/workstations')) ? 'active bg-black' : '' }}" ><a href="/hardware/workstations"><i class="fa fa-circle-o"></i>Workstations</a></li>
                <li class="{{ (request()->is('hardware/server')) ? 'active bg-black' : '' }}"><a href="/hardware/server"><i class="fa fa-circle-o"></i>Server</a></li>
                <li class="{{ (request()->is('hardware/printer')) ? 'active bg-black' : '' }}"><a href="/hardware/printer"><i class="fa fa-circle-o"></i>Printer</a></li>
                <li class="{{ (request()->is('hardware/sparepart')) ? 'active bg-black' : '' }}"><a href="/hardware/sparepart"><i class="fa fa-circle-o"></i>Sparepart</a></li>
                <li class="{{ (request()->is('hardware/other')) ? 'active bg-black' : '' }}"><a href="/hardware/other"><i class="fa fa-circle-o"></i>Other</a></li>
            </ul>
            </li>
            <li class="treeview {{ (request()->is('software/*')) ? 'active' : '' }}">
                <a href="#">
                <i class="fa fa-cloud"></i> <span>Software</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu">
                <li class="{{ (request()->is('software/subscription')) ? 'active bg-black' : '' }}"><a href="/software/subscription"><i class="fa fa-circle-o"></i>Subscription</a></li>
                <li class="{{ (request()->is('software/sekalibayar')) ? 'active bg-black' : '' }}"><a href="/software/sekalibayar"><i class="fa fa-circle-o"></i>One-Time Purchase</a></li>
                </ul>
            </li>
            <li class="treeview {{ (request()->is('user/*')) ? 'active' : '' }}">
            <a href="#">
                <i class="glyphicon glyphicon-user"></i> <span>User</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
                <li class="{{ (request()->is('user/admin')) ? 'active bg-black' : '' }}"><a href="/user/admin"><i class="fa fa-circle-o"></i> Admin</a></li>
                <li class="{{ (request()->is('user/staff')) ? 'active bg-black' : '' }}"><a href="/user/staff"><i class="fa fa-circle-o"></i> Staff</a></li>
            </ul>
                        
            <li class="treeview {{ (request()->is('masterdata/*')) ? 'active' : '' }}">
              <a href="#">
              <i class="fa fa-cloud"></i> <span>Master Data</span>
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
              <li class="{{ (request()->is('masterdata/kategorisw')) ? 'active bg-black' : '' }}"><a href="/masterdata/kategorisw"><i class="fa fa-circle-o"></i>Kategori Software</a></li>
              </ul>
          </li>
            <li class="header">LABELS</li>
            <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>*//
            
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>