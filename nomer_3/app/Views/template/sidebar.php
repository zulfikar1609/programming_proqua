      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">Rumah Sakit</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">RS</a>
          </div>
          <ul class="sidebar-menu">
            <li class="<?= ($active == 'asesmen') ? 'active' : '' ?>"><a href="<?= base_url('asesmen') ?>" class="nav-link" href="index-0.html"><i class="fas fa-clipboard-list"></i><span>Asesmen</span></a></li>
            <li class="<?= ($active == 'pendaftaran') ? 'active' : '' ?>"><a href="<?= base_url('pendaftaran') ?>" class="nav-link" href="index-0.html"><i class="fas fa-folder-plus"></i><span>Pendaftaran</span></a></li>
            <li class="<?= ($active == 'pasien') ? 'active' : '' ?>"><a href="<?= base_url('pasien') ?>" class="nav-link" href="index-0.html"><i class="far fa-user"></i><span>Pasien</span></a></li>
            <li class="<?= ($active == 'kunjungan') ? 'active' : '' ?>"><a href="<?= base_url('kunjungan') ?>" class="nav-link" href="index-0.html"><i class="fas fa-bed"></i><span>Kunjungan</span></a></li>
          </ul>       
        </aside>
      </div>