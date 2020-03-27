<li class="{{ Request::is('barangs*') ? 'active' : '' }}">
    <a href="{!! route('barangs.index') !!}"><i class="fa fa-database"></i><span>Barang</span></a>
</li>

<li class="{{ Request::is('pelanggans*') ? 'active' : '' }}">
    <a href="{!! route('pelanggan.index') !!}"><i class="fa fa-address-card-o"></i><span>Pelanggan</span></a>
</li>

<li class="{{ Request::is('pegawais*') ? 'active' : '' }}">
    <a href="{!! route('pegawai.index') !!}"><i class="fa fa-user-md"></i><span>Pegawai</span></a>
</li>

<li class="{{ Request::is('penjualans*') ? 'active' : '' }}">
    <a href="{!! route('penjualan.index') !!}"><i class="fa fa-shopping-cart"></i><span>Penjualan</span></a>
</li>

<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{!! route('users.index') !!}"><i class="fa fa-users"></i><span>User</span></a>
</li>

