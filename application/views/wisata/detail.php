<div class="content-wrapper" style="background:#e9f3f2; min-height:100vh; padding:35px 25px;">
  
  <!-- Header -->
  <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
    <h4 style="font-weight:600; color:#0e3c38; margin-bottom:10px;">
      <i class="fas fa-info-circle me-2"></i><?= $title ?>
    </h4>
    <a href="<?= site_url('wisata') ?>" class="btn" style="background:#6c757d; color:white; border-radius:8px; padding:8px 16px;">
      <i class="fas fa-arrow-left me-1"></i> Kembali
    </a>
  </div>

  <!-- Card Detail -->
  <div class="card border-0 shadow-sm" style="border-radius:14px; overflow:hidden;">
    <div class="card-header text-white" 
         style="background:linear-gradient(135deg, #0e3c38 0%, #165b57 100%); font-weight:500; padding:14px 20px; font-size:15px;">
      <i class="fas fa-map-marked-alt me-1"></i> Detail Wisata
    </div>
    
    <div class="card-body">
      <div class="row">
        <!-- Kolom Kiri -->
        <div class="col-md-6">
          <div class="info-item mb-3">
            <label class="fw-bold text-muted mb-1">Nama Wisata</label>
            <div class="p-3 rounded" style="background:#f8f9fa; border-left:4px solid #0e3c38;">
              <i class="fas fa-landmark me-2 text-primary"></i><?= html_escape($wisata->nama_wisata) ?>
            </div>
          </div>

          <div class="info-item mb-3">
            <label class="fw-bold text-muted mb-1">Jenis Wisata</label>
            <div class="p-3 rounded" style="background:#f8f9fa; border-left:4px solid #20c997;">
              <i class="fas fa-tag me-2 text-success"></i>
              <span class="badge" style="background:#e3f2fd; color:#1976d2; font-weight:500;">
                <?= html_escape($wisata->nama_jenis_wisata) ?>
              </span>
            </div>
          </div>

          <div class="info-item mb-3">
            <label class="fw-bold text-muted mb-1">Nama Pemilik</label>
            <div class="p-3 rounded" style="background:#f8f9fa; border-left:4px solid #ffc107;">
              <i class="fas fa-user-tie me-2 text-warning"></i><?= html_escape($wisata->nama_pemilik) ?>
            </div>
          </div>

          <div class="info-item mb-3">
            <label class="fw-bold text-muted mb-1">No. Telepon</label>
            <div class="p-3 rounded" style="background:#f8f9fa; border-left:4px solid #17a2b8;">
              <i class="fas fa-phone me-2 text-info"></i><?= html_escape($wisata->no_telp) ?>
            </div>
          </div>
        </div>

        <!-- Kolom Kanan -->
        <div class="col-md-6">
          <div class="info-item mb-3">
            <label class="fw-bold text-muted mb-1">Kecamatan</label>
            <div class="p-3 rounded" style="background:#f8f9fa; border-left:4px solid #dc3545;">
              <i class="fas fa-map-marker-alt me-2 text-danger"></i><?= html_escape($wisata->nama_kecamatan) ?>
            </div>
          </div>

          <div class="info-item mb-3">
            <label class="fw-bold text-muted mb-1">Jumlah Karyawan</label>
            <div class="p-3 rounded" style="background:#f8f9fa; border-left:4px solid #6f42c1;">
              <i class="fas fa-users me-2 text-purple"></i><?= html_escape($wisata->jumlah_karyawan) ?> orang
            </div>
          </div>

          <div class="info-item mb-3">
            <label class="fw-bold text-muted mb-1">Alamat</label>
            <div class="p-3 rounded" style="background:#f8f9fa; border-left:4px solid #fd7e14;">
              <i class="fas fa-location-dot me-2 text-orange"></i><?= html_escape($wisata->alamat) ?>
            </div>
          </div>

          <div class="info-item mb-3">
            <label class="fw-bold text-muted mb-1">Fasilitas</label>
            <div class="p-3 rounded" style="background:#f8f9fa; border-left:4px solid #20c997;">
              <i class="fas fa-tree me-2 text-success"></i>
              <?php if(!empty($wisata->fasilitas)): ?>
                <?= html_escape($wisata->fasilitas) ?>
              <?php else: ?>
                <span class="text-muted">Tidak ada fasilitas</span>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Styling untuk Responsif -->
<style>
  @media (max-width: 768px) {
    .content-wrapper {
      padding: 20px 15px !important;
    }
    .info-item label {
      font-size: 14px;
    }
  }

  .info-item div {
    transition: all 0.3s ease;
  }

  .info-item div:hover {
    transform: translateX(5px);
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
  }

  .badge {
    font-size: 0.8em;
    padding: 6px 10px;
    border-radius: 8px;
  }
</style>