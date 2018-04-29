<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{!! route('users.index') !!}"><i class="fa fa-user"></i><span>Users</span></a>
</li>

<li class="{{ Request::is('komoditas*') ? 'active' : '' }}">
    <a href="{!! route('komoditas.index') !!}"><i class="fa fa-pagelines"></i><span>Komoditas</span></a>
</li>

<li class="{{ Request::is('jenisSaprotans*') ? 'active' : '' }}">
    <a href="{!! route('jenisSaprotans.index') !!}"><i class="fa fa-cube"></i><span>Jenis Saprotan</span></a>
</li>

<li class="{{ Request::is('saprotans*') ? 'active' : '' }}">
    <a href="{!! route('saprotans.index') !!}"><i class="fa fa-cubes"></i><span>Saprotan</span></a>
</li>

<li class="{{ Request::is('vendors*') ? 'active' : '' }}">
    <a href="{!! route('vendors.index') !!}"><i class="fa fa-edit"></i><span>Vendor</span></a>
</li>

<li class="{{ Request::is('penggaraps*') ? 'active' : '' }}">
    <a href="{!! route('penggaraps.index') !!}"><i class="fa fa-edit"></i><span>Penggarap</span></a>
</li>

<li class="{{ Request::is('pasangans*') ? 'active' : '' }}">
    <a href="{!! route('pasangans.index') !!}"><i class="fa fa-edit"></i><span>Pasangans</span></a>
</li>

<li class="{{ Request::is('roles*') ? 'active' : '' }}">
    <a href="{!! route('roles.index') !!}"><i class="fa fa-edit"></i><span>Roles</span></a>
</li>
