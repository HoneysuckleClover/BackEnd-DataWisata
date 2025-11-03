<div class="content-wrapper" style="background:#e9f3f2; min-height:100vh; padding:35px 25px;">
  
  <!-- Header -->
  <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
    <h4 style="font-weight:600; color:#0e3c38; margin-bottom:10px;">
      <i class="fas fa-tachometer-alt me-2"></i>Dashboard
    </h4>
    <div class="d-flex align-items-center">
      <span class="text-muted me-3" style="font-size:14px;">
        <i class="fas fa-user-circle me-1"></i><?= $this->session->userdata('ses_nama') ?? 'Administrator' ?>
      </span>
      <a href="<?= base_url('login/logout') ?>" 
         class="btn shadow-sm" 
         style="background:#dc3545; color:#fff; border:none; border-radius:8px; padding:6px 12px; font-weight:500; transition:0.3s;">
        <i class="fas fa-sign-out-alt me-1"></i> Keluar
      </a>
    </div>
  </div>

  <!-- Welcome Card -->
  <div class="card border-0 shadow-sm mb-4" style="border-radius:14px; background:linear-gradient(135deg, #0e3c38 0%, #165b57 100%);">
    <div class="card-body" style="padding:30px;">
      <div class="row align-items-center">
        <div class="col-md-8">
          <h5 style="color:#aef7de; font-weight:600; margin-bottom:10px;">
            <i class="fas fa-hand-wave me-2"></i>Selamat Datang!
          </h5>
          <p style="color:#cfeee6; margin:0; font-size:15px;">
            Anda berada di <strong style="color:#fff;">Sistem Informasi Wisata Magelang</strong>.  
            Gunakan menu di samping untuk mengelola data wisata dan fasilitas.
          </p>
        </div>
        <div class="col-md-4 text-center">
          <i class="fas fa-mountain fa-4x" style="color:rgba(174, 247, 222, 0.3);"></i>
        </div>
      </div>
    </div>
  </div>

  <!-- Statistik -->
  <div class="row g-4 mb-4">
    <!-- Total Wisata -->
    <div class="col-md-3">
      <div class="card border-0 shadow-sm h-100" style="border-radius:12px; background:#fff;">
        <div class="card-body text-center p-4">
          <div class="icon-wrapper mb-3" style="width:60px; height:60px; background:rgba(32, 201, 151, 0.1); border-radius:50%; display:flex; align-items:center; justify-content:center; margin:0 auto;">
            <i class="fas fa-map-marked-alt fa-2x" style="color:#20c997;"></i>
          </div>
          <h6 style="color:#0e3c38; font-weight:600; margin-bottom:8px;">Total Wisata</h6>
          <h2 style="color:#0e3c38; margin:0; font-weight:700;"><?= $total_wisata ?? 0 ?></h2>
          <small style="color:#6c757d; font-size:12px;">Data wisata terdaftar</small>
        </div>
      </div>
    </div>

    <!-- Total Fasilitas -->
    <div class="col-md-3">
      <div class="card border-0 shadow-sm h-100" style="border-radius:12px; background:#fff;">
        <div class="card-body text-center p-4">
          <div class="icon-wrapper mb-3" style="width:60px; height:60px; background:rgba(13, 202, 240, 0.1); border-radius:50%; display:flex; align-items:center; justify-content:center; margin:0 auto;">
            <i class="fas fa-tree fa-2x" style="color:#0dcaf0;"></i>
          </div>
          <h6 style="color:#0e3c38; font-weight:600; margin-bottom:8px;">Total Fasilitas</h6>
          <h2 style="color:#0e3c38; margin:0; font-weight:700;"><?= $total_fasilitas ?? 0 ?></h2>
          <small style="color:#6c757d; font-size:12px;">Fasilitas tersedia</small>
        </div>
      </div>
    </div>

    <!-- Total User -->
    <div class="col-md-3">
      <div class="card border-0 shadow-sm h-100" style="border-radius:12px; background:#fff;">
        <div class="card-body text-center p-4">
          <div class="icon-wrapper mb-3" style="width:60px; height:60px; background:rgba(255, 193, 7, 0.1); border-radius:50%; display:flex; align-items:center; justify-content:center; margin:0 auto;">
            <i class="fas fa-users fa-2x" style="color:#ffc107;"></i>
          </div>
          <h6 style="color:#0e3c38; font-weight:600; margin-bottom:8px;">Total User</h6>
          <h2 style="color:#0e3c38; margin:0; font-weight:700;"><?= $total_user ?? 0 ?></h2>
          <small style="color:#6c757d; font-size:12px;">Pengguna sistem</small>
        </div>
      </div>
    </div>

    <!-- Total Kategori -->
    <div class="col-md-3">
      <div class="card border-0 shadow-sm h-100" style="border-radius:12px; background:#fff;">
        <div class="card-body text-center p-4">
          <div class="icon-wrapper mb-3" style="width:60px; height:60px; background:rgba(108, 117, 125, 0.1); border-radius:50%; display:flex; align-items:center; justify-content:center; margin:0 auto;">
            <i class="fas fa-tags fa-2x" style="color:#6c757d;"></i>
          </div>
          <h6 style="color:#0e3c38; font-weight:600; margin-bottom:8px;">Total Kategori</h6>
          <h2 style="color:#0e3c38; margin:0; font-weight:700;"><?= $total_kategori ?? 0 ?></h2>
          <small style="color:#6c757d; font-size:12px;">Jenis wisata</small>
        </div>
      </div>
    </div>
  </div>

  <div class="row g-4">
    <!-- Data Wisata Terbaru -->
    <div class="col-md-8">
      <div class="card border-0 shadow-sm" style="border-radius:14px;">
        <div class="card-header text-white" 
             style="background:linear-gradient(135deg, #0e3c38 0%, #165b57 100%); font-weight:500; padding:14px 20px; font-size:15px; border-radius:14px 14px 0 0;">
          <i class="fas fa-map-marked-alt me-1"></i> Data Wisata Terbaru
        </div>
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table align-middle mb-0" style="color:#0e3c38; font-size:14px;">
              <thead style="background:#165b57; color:#e8fffb; font-weight:500;">
                <tr>
                  <th style="padding:12px 8px;">Nama Wisata</th>
                  <th style="padding:12px 8px;">Lokasi</th>
                  <th style="padding:12px 8px;">Kategori</th>
                  <th style="padding:12px 8px;">Status</th>
                </tr>
              </thead>
              <tbody>
                <?php if (!empty($wisata_terbaru)): ?>
                  <?php foreach ($wisata_terbaru as $w): ?>
                    <tr style="transition:0.25s;" 
                        onmouseover="this.style.background='#f0f9f8';" 
                        onmouseout="this.style.background='transparent';">
                      <td style="padding:12px 8px; font-weight:600;"><?= html_escape($w->nama_wisata) ?></td>
                      <td style="padding:12px 8px;"><?= html_escape($w->lokasi) ?></td>
                      <td style="padding:12px 8px;">
                        <span class="badge" style="background:#e3f2fd; color:#1976d2; font-weight:500;">
                          <?= html_escape($w->kategori) ?>
                        </span>
                      </td>
                      <td style="padding:12px 8px;">
                        <span class="badge" style="background:#20c997; color:#fff; padding:6px 12px; border-radius:6px;">
                          Aktif
                        </span>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                <?php else: ?>
                  <tr>
                    <td colspan="4" class="text-center py-5 text-muted" style="background:#f8faf9;">
                      <i class="fas fa-inbox fa-2x mb-3" style="color:#ccc;"></i><br>
                      Belum ada data wisata.
                    </td>
                  </tr>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer bg-white text-center py-3" style="border-top:1px solid #dee2e6;">
          <a href="<?= base_url('wisata') ?>" 
             class="btn btn-sm" 
             style="background:#20c997; color:#fff; border:none; border-radius:6px; padding:6px 16px; font-weight:500;">
            <i class="fas fa-eye me-1"></i> Lihat Semua Data
          </a>
        </div>
      </div>
    </div>

    <!-- Quick Actions -->
    <div class="col-md-4">
      <div class="card border-0 shadow-sm" style="border-radius:14px;">
        <div class="card-header text-white" 
             style="background:linear-gradient(135deg, #0e3c38 0%, #165b57 100%); font-weight:500; padding:14px 20px; font-size:15px; border-radius:14px 14px 0 0;">
          <i class="fas fa-bolt me-1"></i> Quick Actions
        </div>
        <div class="card-body" style="padding:20px;">
          <div class="d-grid gap-3">
            <a href="<?= base_url('wisata/add') ?>" 
               class="btn d-flex align-items-center justify-content-between p-3" 
               style="background:#f8f9fa; border:1px solid #dee2e6; border-radius:8px; text-decoration:none; transition:0.3s;">
              <div class="d-flex align-items-center">
                <div class="icon-wrapper me-3" style="width:40px; height:40px; background:rgba(32, 201, 151, 0.1); border-radius:8px; display:flex; align-items:center; justify-content:center;">
                  <i class="fas fa-plus" style="color:#20c997;"></i>
                </div>
                <span style="color:#0e3c38; font-weight:500;">Tambah Wisata</span>
              </div>
              <i class="fas fa-chevron-right text-muted"></i>
            </a>

            <a href="<?= base_url('pemilik/add') ?>" 
               class="btn d-flex align-items-center justify-content-between p-3" 
               style="background:#f8f9fa; border:1px solid #dee2e6; border-radius:8px; text-decoration:none; transition:0.3s;">
              <div class="d-flex align-items-center">
                <div class="icon-wrapper me-3" style="width:40px; height:40px; background:rgba(13, 202, 240, 0.1); border-radius:8px; display:flex; align-items:center; justify-content:center;">
                  <i class="fas fa-user-plus" style="color:#0dcaf0;"></i>
                </div>
                <span style="color:#0e3c38; font-weight:500;">Tambah Pemilik</span>
              </div>
              <i class="fas fa-chevron-right text-muted"></i>
            </a>

            <a href="<?= base_url('fasilitas/add') ?>" 
               class="btn d-flex align-items-center justify-content-between p-3" 
               style="background:#f8f9fa; border:1px solid #dee2e6; border-radius:8px; text-decoration:none; transition:0.3s;">
              <div class="d-flex align-items-center">
                <div class="icon-wrapper me-3" style="width:40px; height:40px; background:rgba(255, 193, 7, 0.1); border-radius:8px; display:flex; align-items:center; justify-content:center;">
                  <i class="fas fa-tree" style="color:#ffc107;"></i>
                </div>
                <span style="color:#0e3c38; font-weight:500;">Tambah Fasilitas</span>
              </div>
              <i class="fas fa-chevron-right text-muted"></i>
            </a>

            <a href="<?= base_url('usermanagement') ?>" 
               class="btn d-flex align-items-center justify-content-between p-3" 
               style="background:#f8f9fa; border:1px solid #dee2e6; border-radius:8px; text-decoration:none; transition:0.3s;">
              <div class="d-flex align-items-center">
                <div class="icon-wrapper me-3" style="width:40px; height:40px; background:rgba(108, 117, 125, 0.1); border-radius:8px; display:flex; align-items:center; justify-content:center;">
                  <i class="fas fa-cog" style="color:#6c757d;"></i>
                </div>
                <span style="color:#0e3c38; font-weight:500;">Kelola User</span>
              </div>
              <i class="fas fa-chevron-right text-muted"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Styling untuk Hover Effects -->
<style>
  .card {
    transition: all 0.3s ease;
  }
  
  .card:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.1) !important;
  }
  
  .btn:hover {
    opacity: 0.9;
    transform: translateY(-1px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
  }
  
  .quick-action-btn:hover {
    background: #f0f9f8 !important;
    border-color: #20c997 !important;
    transform: translateX(5px);
  }
  
  @media (max-width: 768px) {
    .content-wrapper {
      padding: 20px 15px !important;
    }
    .row.g-4 {
      margin-left: -8px;
      margin-right: -8px;
    }
    .col-md-3, .col-md-4, .col-md-8 {
      padding-left: 8px;
      padding-right: 8px;
    }
  }
</style>