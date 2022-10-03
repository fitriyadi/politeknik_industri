<ul class="nav">
  <li class="nav-item nav-category">Main</li>

  <li class="nav-item">
    <a href="?hal=dashboard" class="nav-link">
      <i class="link-icon" data-feather="box"></i>
      <span class="link-title">Home</span>
    </a>
  </li>

  <li class="nav-item nav-category">Master Data</li>

  <li class="nav-item">
    <a href="?hal=pengguna/data" class="nav-link">
      <i class="link-icon" data-feather="phone-call"></i>
      <span class="link-title">Data Pengguna</span>
    </a>
  </li>


  <li class="nav-item">
    <a href="?hal=pegawai/data" class="nav-link">
      <i class="link-icon" data-feather="user-plus"></i>
      <span class="link-title">Data Pegawai</span>
    </a>
  </li>


  <li class="nav-item">
    <a class="nav-link" data-toggle="collapse" href="#datapengajuan" role="button" aria-expanded="false" aria-controls="datapengajuan">
      <i class="link-icon" data-feather="layers"></i>
      <span class="link-title">Data Pengajuan</span>
      <i class="link-arrow" data-feather="chevron-down"></i>
    </a>
    <div class="collapse" id="datapengajuan">
      <ul class="nav sub-menu">
        <li class="nav-item">
          <a href="?hal=pengajuan/data" class="nav-link">Data Pengajuan</a>
        </li>
        <li class="nav-item">
          <a href="?hal=order/data" class="nav-link">Data Order</a>
        </li>
      </ul>
    </div>
  </li>

  <li class="nav-item nav-category">Laporan</li>

  <li class="nav-item">
    <a class="nav-link" data-toggle="collapse" href="#laporanpengajuan" role="button" aria-expanded="false" aria-controls="laporanpengajuan">
      <i class="link-icon" data-feather="hash"></i>
      <span class="link-title">Laporan Pengajuan</span>
      <i class="link-arrow" data-feather="chevron-down"></i>
    </a>

    <div class="collapse" id="laporanpengajuan">
      <ul class="nav sub-menu">
        <li class="nav-item">
          <a href="?hal=laporan/filter-pengajuan" class="nav-link">Lap. Pengajuan</a>
        </li>
        <li class="nav-item">
          <a href="?hal=laporan/filter-order" class="nav-link">Lap. Order</a>
        </li>
      </ul>
    </div>
  </li>


</ul>