<div class="sidebar">
  <h3><i class="fas fa-mountain me-2"></i> WisataMag</h3>
  <a href="<?= base_url('dashboard') ?>" class="<?= ($title=='Dashboard'?'active':'') ?>">
    <i class="fas fa-home me-2"></i> Dashboard
  </a>
  <a href="<?= base_url('wisata') ?>" class="<?= ($title=='Data Wisata'?'active':'') ?>">
    <i class="fas fa-map-marked-alt me-2"></i> Data Wisata
  </a>
  <a href="<?= base_url('fasilitas') ?>" class="<?= ($title=='Fasilitas'?'active':'') ?>">
    <i class="fas fa-tree me-2"></i> Fasilitas
  </a>
  <a href="<?= base_url('pengunjung') ?>" class="<?= ($title=='Pengunjung'?'active':'') ?>">
    <i class="fas fa-users me-2"></i> Pengunjung
  </a>
  <a href="<?= base_url('login/logout') ?>" class="mt-3" style="color:#ffc107;">
    <i class="fas fa-sign-out-alt me-2"></i> Logout
  </a>
</div>
<div class="main-content">
