<ul class="sidebar-menu" data-widget="tree">
  <li class="header">HEADER</li>
  <!-- Optionally, you can add icons to the links -->
  <li class="{{ set_active('admin.dashboard') }}">
    <a href="{{ route('admin.dashboard') }}">
      <i class="fa fa-dashboard"></i> 
        <span>Dashboard</span>
    </a>
  </li>
  <li class="{{ set_active('manajemen.tahun.kepengurusan') }}">
    <a href="{{ route('manajemen.tahun.kepengurusan') }}">
      <i class="fa fa-calendar"></i>
        <span>Tahun Kepengurusan</span>
    </a>
  </li>
  <li class="treeview {{ set_active(['manajemen.prodi','manajemen.bidang','manajemen.jabatan']) }}">
    <a href="#"><i class="fa fa-list"></i> <span>Data Master</span>
      <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
      <li class="{{ set_active('manajemen.prodi') }}"><a href="{{ route('manajemen.prodi') }}"><i class="fa fa-building"></i>Program Studi</a></li>
      <li class="{{ set_active('manajemen.bidang') }}"><a href="{{ route('manajemen.bidang') }}"><i class="fa fa-tasks"></i>Bidang Kepengurusan</a></li>
      <li class="{{ set_active('manajemen.jabatan') }}"><a href="{{ route('manajemen.jabatan') }}"><i class="fa fa-briefcase"></i>Jabatan Pengurus</a></li>
      <li><a href="#"><i class="fa fa-user"></i>Data Admin</a></li>
    </ul>
  </li>
  <li class="treeview {{ set_active(['manajemen.anggota','manajemen.pengurus','manajemen.pembina','manajemen.mapres']) }}">
    <a href="#"><i class="fa fa-users"></i> <span>Anggota & Pengurus</span>
      <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
      <li class="{{ set_active('manajemen.anggota') }}" ><a href="{{ route('manajemen.anggota') }}"><i class="fa fa-users"></i>Anggota Ercom</a></li>
      <li class="{{ set_active('manajemen.pengurus') }}" ><a href="{{ route('manajemen.pengurus') }}"><i class="fa fa-user-o"></i>Badan Pengurus Harian</a></li>
      <li class="{{ set_active('manajemen.pembina') }}" ><a href="{{ route('manajemen.pembina') }}"><i class="fa fa-user"></i>Pembina Ercom</a></li>
      <li class="{{ set_active('manajemen.mapres') }}" ><a href="{{ route('manajemen.mapres') }}"><i class="fa fa-user"></i>Mahasiswa Berprestasi</a></li>
    </ul>
  </li>
  <li class="treeview {{ set_active(['manajemen.agenda','manajemen.jenis_berita','manajemen.berita']) }}">
    <a href="#"><i class="fa fa-calendar-check-o"></i> <span>Agenda & Berita</span>
      <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
      <li class="{{ set_active('manajemen.agenda') }}"><a href="{{ route('manajemen.agenda') }}"><i class="fa fa-calendar-check-o"></i>&nbsp;Agenda Ercom</a></li>
      <li class="{{ set_active('manajemen.jenis_berita') }}"><a href="{{ route('manajemen.jenis_berita') }}"><i class="fa fa-newspaper-o"></i>&nbsp;Jenis Berita</a></li>
      <li class="{{ set_active('manajemen.berita') }}"><a href="{{ route('manajemen.berita') }}"><i class="fa fa-newspaper-o"></i>&nbsp;Berita</a></li>
    </ul>
  </li>
  <li class="treeview {{ set_active(['manajemen.slide','manajemen.galeri']) }}">
    <a href="#"><i class="fa fa-users"></i> <span>Pengaturan</span>
      <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
      <li class="{{ set_active('manajemen.slide') }}" ><a href="{{ route('manajemen.slide') }}"><i class="fa fa-sliders"></i>Pengaturan Slide Show</a></li>
      <li class="{{ set_active('manajemen.galeri') }}" ><a href="{{ route('manajemen.galeri') }}"><i class="fa fa-sliders"></i>Galeri Foto</a></li>
    </ul>
  </li>
</ul>
<!-- /.sidebar-menu -->