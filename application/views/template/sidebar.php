<div class="sidebar">
  <h3><i class="fas fa-mountain me-2"></i> WisataMag</h3>
  
  <!-- Menu Utama -->
  <a href="<?= base_url('dashboard') ?>" class="<?= ($title=='Dashboard'?'active':'') ?>">
    <i class="fas fa-home me-2"></i> Dashboard
  </a>
  
  <!-- Data Master Wisata -->
  <a href="<?= base_url('wisata') ?>" class="<?= ($title=='Data Wisata'?'active':'') ?>">
    <i class="fas fa-map-marked-alt me-2"></i> Data Wisata
  </a>
  
  <!-- Data Master Lainnya (SUDAH ADA TABELNYA) -->
  <a href="<?= base_url('pemilik') ?>" class="<?= ($title=='Data Pemilik'?'active':'') ?>">
    <i class="fas fa-user-tie me-2"></i> Data Pemilik
  </a>
  
  <a href="<?= base_url('kecamatan') ?>" class="<?= ($title=='Kecamatan'?'active':'') ?>">
    <i class="fas fa-map-marker-alt me-2"></i> Data Kecamatan
  </a>

  <!-- Fasilitas (SUDAH ADA) -->
  <a href="<?= base_url('fasilitas') ?>" class="<?= ($title=='Fasilitas'?'active':'') ?>">
    <i class="fas fa-tree me-2"></i> Fasilitas
  </a>

  <!-- Kategori Wisata (PERLU TABEL BARU) -->
  <a href="<?= base_url('kategori') ?>" class="<?= ($title=='Kategori Wisata'?'active':'') ?>">
    <i class="fas fa-tags me-2"></i> Kategori Wisata
  </a>

  <!-- Laporan (BISA DIBUAT DARI DATA EXISTING) -->
  <a href="<?= base_url('laporan') ?>" class="<?= ($title=='Laporan'?'active':'') ?>">
    <i class="fas fa-chart-bar me-2"></i> Laporan & Statistik
  </a>

  <!-- Logout -->
  <a href="<?= base_url('login/logout') ?>" class="mt-3" style="color:#ffc107;">
    <i class="fas fa-sign-out-alt me-2"></i> Logout
  </a>
</div>
<div class="main-content">