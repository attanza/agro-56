<ul class="sidebar-menu tree" data-widget="tree">
  <li class="header">MAIN NAVIGATION</li>
  <li class="{{ Request::is('/') || Request::is('/dashboards*')? 'active' : '' }}">
      <a href="{!! route('dashboards.index') !!}">
        <i class="fa fa-tachometer"></i>
        <span>Dashboard</span>
      </a>
    </li>
  <li class="{{ Request::is('users*') || Request::is('roles*') ? 'active' : '' }} treeview">
    <a href="#">
      <i class="fa fa-user"></i>
      <span>Users</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li class="{{ Request::is('users*') ? 'active' : '' }}">
        <a href="{{ url('/users') }}">
          <i class="fa fa-user"></i> Data User</a>
      </li>
      <li class="{{ Request::is('roles*') ? 'active' : '' }}">
        <a href="{{ url('/roles') }}">
          <i class="fa fa-user-circle-o"></i> Role</a>
      </li>

    </ul>
  </li>
  <li class="{{ Request::is('penggaraps*') || Request::is('pasangans*') ? 'active' : '' }} treeview">
    <a href="#">
      <i class="fa fa-users"></i>
      <span>Penggarap</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li class="{{ Request::is('penggaraps*') ? 'active' : '' }}">
        <a href="{{ url('/penggaraps') }}">
          <i class="fa fa-users"></i> Penggarap</a>
      </li>
      <li class="{{ Request::is('pasangans*') ? 'active' : '' }}">
        <a href="{{ url('/pasangans') }}">
          <i class="fa fa-female"></i> Pasangan</a>
      </li>

    </ul>
  </li>
  <li class="{{ Request::is('komoditas*') || Request::is('jenisSaprotans*') || Request::is('saprotans*') ? 'active' : '' }} treeview">
    <a href="#">
      <i class="fa fa-pagelines"></i>
      <span>Komoditas</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
      <li class="{{ Request::is('komoditas*') ? 'active' : '' }}">
        <a href="{{ url('/komoditas') }}">
          <i class="fa fa-pagelines"></i> Komoditas</a>
      </li>
      <li class="{{ Request::is('jenisSaprotans*') ? 'active' : '' }}">
        <a href="{{ url('/jenisSaprotans') }}">
          <i class="fa fa-cube"></i> Jenis Saprotan</a>
      </li>
      <li class="{{ Request::is('saprotans*') ? 'active' : '' }}">
        <a href="{{ url('/saprotans') }}">
          <i class="fa fa-cubes"></i> Saprotan</a>
      </li>

    </ul>
  </li>
  <li class="{{ Request::is('vendors*') ? 'active' : '' }}">
    <a href="{!! route('vendors.index') !!}">
      <i class="fa fa-building"></i>
      <span> Vendor</span>
    </a>
  </li>
  <li class="{{ Request::is('panens*') ? 'active' : '' }}">
    <a href="{!! route('panens.index') !!}">
      <i class="fa fa-free-code-camp"></i>
      <span>Panen</span>
    </a>
  </li>

</ul>