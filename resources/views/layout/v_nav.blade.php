  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div style="margin-left: 0px" class="user-panel">
            <div style="border-radius:50%; width:2.9em; height:2.9em; margin-left:-6px;" class="letterpic pull-left" alt="User Image" title="{{ Auth::user()->name }}"></div>
          <div style="margin-left: -12px;" class="pull-left info">
            <p style="margin-bottom: 3px;">{{ Auth::user()->name }}</p>
            <a> @if (auth()->user()->level == 'Admin') Admin @else User @endif</a>
          </div>
      </div>      
        <ul id="links" class="sidebar-menu" data-widget="tree" data-api="tree" data-accordion=1>
            <li class="header">MAIN NAVIGATION</li>
            <li class="{{ Request::segment(1) === 'hardware' ? 'active' : null }}">
              <a href="/hardware">
                  <i class="fa fa-briefcase"></i> <span>Hardware</span>
              </a>
            </li>
            <li class="{{ Request::segment(1) === 'software' ? 'active' : null }}">
              <a href="/software">
                <i class="fa fa-cloud"></i> <span>Software</span>
              </a>                
            </li>
            @if (auth()->user()->level == 'Admin') 
            <li class="{{ Request::segment(1) === 'user' ? 'active' : null }}">
              <a href="/user">
                <i class="glyphicon glyphicon-user"></i> <span>User</span>
              </a>                
            </li>
            <li class="header">RIWAYAT PERUBAHAN</li>
            <li class="{{ (request()->is('log/hardware')) ? 'active' : '' }}">
              <a href="/log/hardware">
                <i class="fa fa-history"></i> <span>Log Perubahan Hardware</span>
              </a>
            </li>
            <li class="{{ (request()->is('log/software')) ? 'active' : '' }}">
              <a href="/log/software">
                <i class="fa fa-history"></i> <span>Log Perubahan Software</span>
              </a>                
            </li>
            @endif  
          </ul>

        <ul class="sidebar-menu" data-widget="tree" data-api="tree" data-accordion=1>
            <li class="header">MASTER DATA</li>
            <li class="treeview {{ (request()->is('masterdata/*')) ? 'active' : '' }}">
              <a href="#">
              <i class="fa fa-th-list"></i> <span>Master Data</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
              </span>
              </a>
              <ul id="links" class="treeview-menu">
              <li class="{{ (request()->is('masterdata/departemen')) ? 'active' : '' }}"><a href="/masterdata/departemen"><i class="fa fa-circle-o"></i>Departemen</a></li>
              <li class="{{ (request()->is('masterdata/lokasi')) ? 'active' : '' }}"><a href="/masterdata/lokasi"><i class="fa fa-circle-o"></i>Lokasi</a></li>
              <li class="{{ (request()->is('masterdata/merkhw')) ? 'active' : '' }}"><a href="/masterdata/merkhw"><i class="fa fa-circle-o"></i>Merk Hardware</a></li>
              <li class="{{ (request()->is('masterdata/merksw')) ? 'active' : '' }}"><a href="/masterdata/merksw"><i class="fa fa-circle-o"></i>Merk Software</a></li>
              <li class="{{ (request()->is('masterdata/kategorihw')) ? 'active' : '' }}"><a href="/masterdata/kategorihw"><i class="fa fa-circle-o"></i>Kategori Hardware</a></li>
              <li class="{{ (request()->is('masterdata/lisensisw')) ? 'active' : '' }}"><a href="/masterdata/lisensisw"><i class="fa fa-circle-o"></i>Lisensi Software</a></li>
              <li class="{{ (request()->is('masterdata/staff')) ? 'active' : '' }}"><a href="/masterdata/staff"><i class="fa fa-circle-o"></i>Staff</a></li>
              <li class="{{ (request()->is('masterdata/kondisi')) ? 'active' : '' }}"><a href="/masterdata/kondisi"><i class="fa fa-circle-o"></i>Kondisi</a></li>
              </ul>
          </li>
              </a>
            </li>
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>