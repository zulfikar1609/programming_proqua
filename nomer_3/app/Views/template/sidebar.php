      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">Rumah Sakit</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">RS</a>
          </div>
          <ul class="sidebar-menu">
            <?php $role = session()->get('role'); ?>
            <li class="<?= ($active == 'dashboard') ? 'active' : '' ?>"><a href="<?= base_url('dashboard') ?>" class="nav-link ajax-link"><i class="fas fa-dashboard"></i><span>Dashboard</span></a></li>
            <?php if ($role == 'superadmin' || $role == 'perawat'): ?>
              <li class="<?= ($active == 'asesmen') ? 'active' : '' ?>"><a href="<?= base_url('asesmen') ?>" class="nav-link ajax-link"><i class="fas fa-clipboard-list"></i><span>Asesmen</span></a></li>
              <li class="<?= ($active == 'pendaftaran') ? 'active' : '' ?>"><a href="<?= base_url('pendaftaran') ?>" class="nav-link ajax-link"><i class="fas fa-folder-plus"></i><span>Pendaftaran</span></a></li>
              <li class="<?= ($active == 'pasien') ? 'active' : '' ?>"><a href="<?= base_url('pasien') ?>" class="nav-link ajax-link"><i class="far fa-user"></i><span>Pasien</span></a></li>
              <li class="<?= ($active == 'kunjungan') ? 'active' : '' ?>"><a href="<?= base_url('kunjungan') ?>" class="nav-link ajax-link"><i class="fas fa-bed"></i><span>Kunjungan</span></a></li>
            <?php endif; ?>
            <?php if ($role == 'admisi'): ?>
              <li class="<?= ($active == 'pendaftaran') ? 'active' : '' ?>"><a href="<?= base_url('pendaftaran') ?>" class="nav-link ajax-link"><i class="fas fa-folder-plus"></i><span>Pendaftaran</span></a></li>
              <li class="<?= ($active == 'kunjungan') ? 'active' : '' ?>"><a href="<?= base_url('kunjungan') ?>" class="nav-link ajax-link"><i class="fas fa-bed"></i><span>Kunjungan</span></a></li>
            <?php endif; ?>
          </ul>       
        </aside>
      </div>