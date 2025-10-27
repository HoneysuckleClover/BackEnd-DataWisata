<div class="content-wrapper" style="background:#e9f3f2; min-height:100vh; padding:35px 25px;">

  <!-- Header dan Tombol -->
  <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
    <h4 style="font-weight:600; color:#0e3c38; margin-bottom:10px;">
      <i class="fas fa-tags me-2"></i>Daftar Kategori Wisata Magelang
    </h4>
    <a href="<?= base_url('kategori/create') ?>" 
       class="btn shadow-sm" 
       style="background:#20c997; color:#fff; border:none; border-radius:8px; padding:8px 16px; font-weight:500; transition:0.3s;">
      <i class="fas fa-plus me-1"></i> Tambah Data
    </a>
  </div>

  <!-- Notifikasi -->
  <?php if ($this->session->flashdata('success')): ?>
    <div class="alert alert-success alert-dismissible fade show" style="border-radius:10px;">
      <i class="fas fa-check-circle me-2"></i><?= $this->session->flashdata('success') ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  <?php endif; ?>

  <?php if ($this->session->flashdata('error')): ?>
    <div class="alert alert-danger alert-dismissible fade show" style="border-radius:10px;">
      <i class="fas fa-exclamation-circle me-2"></i><?= $this->session->flashdata('error') ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  <?php endif; ?>

  <!-- Card Table -->
  <div class="card border-0 shadow-sm" style="border-radius:14px; overflow:hidden;">
    <div class="card-header text-white" 
         style="background:linear-gradient(135deg, #0e3c38 0%, #165b57 100%); font-weight:500; padding:14px 20px; font-size:15px;">
      <i class="fas fa-list me-1"></i> Data Kategori Wisata
      <span class="badge bg-light text-dark ms-2">
        <?= isset($total_rows) ? $total_rows : count($kategori) ?> Data
      </span>
    </div>

    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table align-middle mb-0" style="color:#0e3c38; font-size:14px;">
          <thead style="background:#165b57; color:#e8fffb; font-weight:500;">
            <tr class="text-center">
              <th style="width:50px; padding:12px 8px;">No</th>
              <th style="padding:12px 8px;">Nama Kategori</th>
              <th style="padding:12px 8px;">Deskripsi</th>
              <th style="width:140px; padding:12px 8px;">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php if(!empty($kategori)): ?>
              <?php 
              $start = isset($start) ? $start : 0;
              $no = $start + 1; 
              foreach($kategori as $kat): 
              ?>
                <tr style="transition:0.25s;" 
                    onmouseover="this.style.background='#f0f9f8'; this.style.transform='translateY(-1px)';" 
                    onmouseout="this.style.background='transparent'; this.style.transform='translateY(0)';">
                  <td class="text-center text-muted fw-bold" style="padding:12px 8px;"><?= $no++ ?></td>
                  <td style="padding:12px 8px; font-weight:600; color:#0e3c38;">
                    <i class="fas fa-tag me-2 text-muted"></i><?= html_escape($kat->nama_kategori) ?>
                  </td>
                  <td style="padding:12px 8px;">
                    <?php if($kat->deskripsi): ?>
                      <?= html_escape($kat->deskripsi) ?>
                    <?php else: ?>
                      <span class="text-muted fst-italic">- Tidak ada deskripsi -</span>
                    <?php endif; ?>
                  </td>
                  <td class="text-center" style="padding:12px 8px;">
                    <div class="btn-group" role="group">
                      <a href="<?= site_url('kategori/edit/'.$kat->id_kategori) ?>" 
                         class="btn btn-sm" 
                         style="background:#ffc107; color:#000; border-radius:6px; margin-right:4px;"
                         data-bs-toggle="tooltip" title="Edit">
                        <i class="fas fa-edit"></i>
                      </a>
                      <a href="<?= site_url('kategori/delete/'.$kat->id_kategori) ?>" 
                         class="btn btn-sm" 
                         style="background:#dc3545; color:white; border-radius:6px;"
                         data-bs-toggle="tooltip" title="Hapus"
                         onclick="return confirm('Yakin ingin menghapus kategori <?= html_escape($kat->nama_kategori) ?>?')">
                        <i class="fas fa-trash"></i>
                      </a>
                    </div>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr>
                <td colspan="4" class="text-center py-5 text-muted" style="background:#f8faf9;">
                  <i class="fas fa-inbox fa-2x mb-3" style="color:#ccc;"></i><br>
                  Belum ada data kategori.
                </td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>

    <div class="card-footer bg-white text-center py-3" style="border-top:1px solid #dee2e6;">
      <?= isset($pagination) ? $pagination : '' ?>
    </div>
  </div>
</div>

<!-- JavaScript untuk Tooltip -->
<script>
  // Initialize tooltips
  document.addEventListener('DOMContentLoaded', function() {
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
      return new bootstrap.Tooltip(tooltipTriggerEl)
    })
  });
</script>

<!-- Responsif untuk HP -->
<style>
  @media (max-width: 768px) {
    .content-wrapper {
      padding: 20px 15px !important;
    }
    table {
      font-size: 13px !important;
    }
    .btn-group .btn {
      padding: 4px 8px !important;
      margin-right: 2px !important;
    }
    .card-header {
      font-size: 14px !important;
      padding: 12px 15px !important;
    }
    th, td {
      padding: 8px 6px !important;
    }
  }

  @media (max-width: 576px) {
    .table-responsive {
      border: 1px solid #dee2e6;
      border-radius: 8px;
    }
    .btn-group {
      display: flex;
      flex-direction: column;
      gap: 4px;
    }
    .btn-group .btn {
      margin-right: 0 !important;
      width: 100%;
    }
    /* Hide deskripsi on very small screens */
    th:nth-child(3), td:nth-child(3) {
      display: none;
    }
  }

  /* Hover efek lembut pada tombol */
  .btn {
    transition: all 0.3s ease;
    border: none;
  }
  
  .btn:hover {
    opacity: 0.9;
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
  }

  /* Badge styling */
  .badge {
    font-size: 0.75em;
    padding: 4px 8px;
    border-radius: 6px;
  }

  /* Styling untuk text muted */
  .text-muted {
    color: #6c757d !important;
  }

  .fst-italic {
    font-style: italic !important;
  }
</style>