<div class="topbar">
  <h4>Dashboard</h4>
  <a href="<?= base_url('login/logout') ?>" class="btn-logout">
    <i class="fas fa-sign-out-alt"></i> Keluar
  </a>
</div>

<!-- Welcome -->
<div style="background:#173838; border-radius:12px; padding:25px; margin-bottom:35px;">
  <h5 style="color:#aef7de;">Haloooo</h5>
  <p style="color:#cfeee6; margin:0;">
    Anda berada di <strong>Sistem Informasi Wisata Magelang</strong>.  
    Gunakan menu di samping untuk mengelola data wisata dan fasilitas.
  </p>
</div>

<!-- Statistik -->
<div class="row g-4 mb-4">
  <div class="col-md-4">
    <div style="background:#1b4444; border-radius:12px; padding:25px; text-align:center;">
      <i class="fas fa-map fa-2x" style="color:#20c997;"></i>
      <h6 style="color:#aef7de; margin-top:10px;">Total Wisata</h6>
      <h2 style="color:#fff;"><?= $total_wisata ?></h2>
    </div>
  </div>

  <div class="col-md-4">
    <div style="background:#1b4444; border-radius:12px; padding:25px; text-align:center;">
      <i class="fas fa-tree fa-2x" style="color:#0dcaf0;"></i>
      <h6 style="color:#aef7de; margin-top:10px;">Total Fasilitas</h6>
      <h2 style="color:#fff;"><?= $total_fasilitas ?></h2>
    </div>
  </div>

  <div class="col-md-4">
    <div style="background:#1b4444; border-radius:12px; padding:25px; text-align:center;">
      <i class="fas fa-users fa-2x" style="color:#ffc107;"></i>
      <h6 style="color:#aef7de; margin-top:10px;">Pengunjung Hari Ini</h6>
      <h2 style="color:#fff;"><?= $total_pengunjung ?></h2>
    </div>
  </div>
</div>

<!-- Data Wisata -->
<div style="background:#173838; border-radius:12px; padding:25px;">
  <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:20px;">
    <h5 style="color:#aef7de; margin:0;"><i class="fas fa-map-marked-alt"></i> Data Wisata Terbaru</h5>
    <a href="<?= base_url('wisata') ?>" style="color:#20c997; text-decoration:none;">Lihat Semua</a>
  </div>

  <div style="overflow-x:auto;">
    <table class="table table-dark table-hover mb-0">
      <thead style="background:#0f2d2d; color:#aef7de;">
        <tr>
          <th>Nama Wisata</th>
          <th>Lokasi</th>
          <th>Kategori</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <?php if (!empty($wisata_terbaru)): ?>
          <?php foreach ($wisata_terbaru as $w): ?>
            <tr>
              <td><?= $w->nama_wisata ?></td>
              <td><?= $w->lokasi ?></td>
              <td><?= $w->kategori ?></td>
              <td><span style="background:#20c997; color:#fff; padding:4px 10px; border-radius:6px;">Aktif</span></td>
            </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr>
            <td colspan="4" class="text-center text-muted py-3">Belum ada data wisata.</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>
