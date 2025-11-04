<div class="content-wrapper" style="background:#e9f3f2; min-height:100vh; padding:35px 25px;">

  <!-- Header dan Tombol -->
  <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
    <h4 style="font-weight:600; color:#0e3c38; margin-bottom:10px;">
      <i class="fas fa-users me-2"></i>Manajemen User WisataMag
    </h4>
    <a href="<?= site_url('usermanagement/add') ?>" 
       class="btn shadow-sm" 
       style="background:#20c997; color:#fff; border:none; border-radius:8px; padding:8px 16px; font-weight:500; transition:0.3s;">
      <i class="fas fa-plus me-1"></i> Tambah User
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

  <!-- Stats Cards -->
  <div class="row mb-4">
    <div class="col-md-3">
      <div class="card border-0 shadow-sm" style="border-radius:12px; background:linear-gradient(135deg, #0e3c38 0%, #165b57 100%);">
        <div class="card-body text-center text-white p-3">
          <i class="fas fa-users fa-2x mb-2"></i>
          <h5 class="mb-1"><?= isset($total_users) ? $total_users : 0 ?></h5>
          <small>Total Users</small>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card border-0 shadow-sm" style="border-radius:12px; background:linear-gradient(135deg, #20c997 0%, #1aa179 100%);">
        <div class="card-body text-center text-white p-3">
          <i class="fas fa-user-check fa-2x mb-2"></i>
          <h5 class="mb-1"><?= isset($total_active_users) ? $total_active_users : 0 ?></h5>
          <small>Active Users</small>
        </div>
      </div>
    </div>
  </div>

  <!-- Card Table -->
  <div class="card border-0 shadow-sm" style="border-radius:14px; overflow:hidden;">
    <div class="card-header text-white" 
         style="background:linear-gradient(135deg, #0e3c38 0%, #165b57 100%); font-weight:500; padding:14px 20px; font-size:15px;">
      <i class="fas fa-list me-1"></i> Data User Sistem
      <span class="badge bg-light text-dark ms-2"><?= isset($total_users) ? $total_users : 0 ?> Data</span>
    </div>

    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table align-middle mb-0" style="color:#0e3c38; font-size:14px;">
          <thead style="background:#165b57; color:#e8fffb; font-weight:500;">
            <tr class="text-center">
              <th style="width:50px; padding:12px 8px;">No</th>
              <th style="padding:12px 8px;">Nama Lengkap</th>
              <th style="padding:12px 8px;">Username</th>
              <th style="padding:12px 8px;">Status</th>
              <th style="width:140px; padding:12px 8px;">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php if(isset($users) && is_array($users) && !empty($users)): ?>
              <?php $no = $start + 1; foreach($users as $user): ?>
                <tr style="transition:0.25s;" 
                    onmouseover="this.style.background='#f0f9f8'; this.style.transform='translateY(-1px)';" 
                    onmouseout="this.style.background='transparent'; this.style.transform='translateY(0)';">
                  <td class="text-center text-muted fw-bold" style="padding:12px 8px;"><?= $no++ ?></td>
                  <td style="padding:12px 8px; font-weight:600; color:#0e3c38;">
                    <i class="fas fa-user me-2 text-muted"></i><?= html_escape($user->nama) ?>
                  </td>
                  <td style="padding:12px 8px;">
                    <span class="badge bg-light text-dark">@<?= html_escape($user->username) ?></span>
                  </td>
                  <td style="padding:12px 8px;">
                    <span class="badge" style="background:#d4edda; color:#155724;">
                      <i class="fas fa-check-circle me-1"></i>Active
                    </span>
                  </td>
                  <td class="text-center" style="padding:12px 8px;">
                    <div class="btn-group" role="group">
                      <a href="<?= site_url('usermanagement/edit/'.$user->id_user) ?>" 
                         class="btn btn-sm" 
                         style="background:#ffc107; color:#000; border-radius:6px; margin-right:4px;"
                         data-bs-toggle="tooltip" title="Edit User">
                        <i class="fas fa-edit"></i>
                      </a>
                      <a href="<?= site_url('user/delete/'.$user->id_user) ?>" 
                         class="btn btn-sm" 
                         style="background:#dc3545; color:white; border-radius:6px;"
                         data-bs-toggle="tooltip" title="Hapus User"
                         onclick="return confirm('Yakin ingin menghapus user <?= html_escape($user->nama) ?>?')">
                        <i class="fas fa-trash"></i>
                      </a>
                    </div>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr>
                <td colspan="5" class="text-center py-5 text-muted" style="background:#f8faf9;">
                  <i class="fas fa-users fa-2x mb-3" style="color:#ccc;"></i><br>
                  Belum ada data user.
                </td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>

    <div class="card-footer bg-white text-center py-3" style="border-top:1px solid #dee2e6;">
      <?= $pagination ?>
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
    .row.mb-4 .col-md-3 {
      margin-bottom: 15px;
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

  /* Stats card hover effect */
  .card {
    transition: transform 0.3s ease;
  }
  
  .card:hover {
    transform: translateY(-5px);
  }
</style>