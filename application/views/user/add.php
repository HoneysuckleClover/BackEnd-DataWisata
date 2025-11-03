<div class="content-wrapper" style="background:#e9f3f2; min-height:100vh; padding:35px 25px;">

  <!-- Header -->
  <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
    <h4 style="font-weight:600; color:#0e3c38; margin-bottom:10px;">
      <i class="fas fa-user-plus me-2"></i>Tambah User Baru
    </h4>
    <a href="<?= site_url('usermanagement') ?>" 
       class="btn shadow-sm" 
       style="background:#6c757d; color:#fff; border:none; border-radius:8px; padding:8px 16px; font-weight:500; transition:0.3s;">
      <i class="fas fa-arrow-left me-1"></i> Kembali
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

  <!-- Tampilkan error validasi -->
  <?php if(validation_errors()): ?>
    <div class="alert alert-danger alert-dismissible fade show" style="border-radius:10px;">
      <i class="fas fa-exclamation-triangle me-2"></i><?php echo validation_errors(); ?>
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
  <?php endif; ?>

  <!-- Form Tambah User -->
  <div class="card border-0 shadow-sm" style="border-radius:14px; overflow:hidden;">
    <div class="card-header text-white" 
         style="background:linear-gradient(135deg, #0e3c38 0%, #165b57 100%); font-weight:500; padding:14px 20px; font-size:15px;">
      <i class="fas fa-user-plus me-1"></i> Form Tambah User Baru
    </div>

    <div class="card-body p-4">
      <form action="<?= site_url('usermanagement/save') ?>" method="POST">
        <div class="row">
          <div class="col-md-6">
            <div class="mb-3">
              <label class="form-label" style="font-weight:600; color:#0e3c38;">Nama Lengkap <span class="text-danger">*</span></label>
              <input type="text" name="nama" class="form-control" 
                     value="<?= set_value('nama') ?>" 
                     placeholder="Masukkan nama lengkap"
                     style="border:2px solid #e3f2fd; border-radius:8px; padding:10px;"
                     required>
            </div>
          </div>
          <div class="col-md-6">
            <div class="mb-3">
              <label class="form-label" style="font-weight:600; color:#0e3c38;">Username <span class="text-danger">*</span></label>
              <input type="text" name="username" class="form-control" 
                     value="<?= set_value('username') ?>" 
                     placeholder="Masukkan username"
                     style="border:2px solid #e3f2fd; border-radius:8px; padding:10px;"
                     required>
              <small class="form-text text-muted">Username harus unik dan tidak boleh sama dengan user lain</small>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="mb-3">
              <label class="form-label" style="font-weight:600; color:#0e3c38;">Password <span class="text-danger">*</span></label>
              <input type="password" name="password" class="form-control" 
                     placeholder="Masukkan password"
                     style="border:2px solid #e3f2fd; border-radius:8px; padding:10px;"
                     required>
              <small class="form-text text-muted">Minimal 6 karakter</small>
            </div>
          </div>
          <div class="col-md-6">
            <div class="mb-3">
              <label class="form-label" style="font-weight:600; color:#0e3c38;">Konfirmasi Password <span class="text-danger">*</span></label>
              <input type="password" name="confirm_password" class="form-control" 
                     placeholder="Konfirmasi password"
                     style="border:2px solid #e3f2fd; border-radius:8px; padding:10px;"
                     required>
            </div>
          </div>
        </div>

        <!-- Jika ingin tambah field lain (opsional) -->
        <div class="mb-3">
          <label class="form-label" style="font-weight:600; color:#0e3c38;">Kontak (Opsional)</label>
          <input type="text" name="contact" class="form-control" 
                 value="<?= set_value('contact') ?>" 
                 placeholder="Masukkan nomor telepon atau email"
                 style="border:2px solid #e3f2fd; border-radius:8px; padding:10px;">
        </div>

        <div class="d-flex gap-2 mt-4">
          <button type="submit" class="btn shadow-sm" 
                  style="background:#20c997; color:#fff; border:none; border-radius:8px; padding:10px 20px; font-weight:500;">
            <i class="fas fa-save me-1"></i> Simpan User
          </button>
          <a href="<?= site_url('usermanagement') ?>" class="btn shadow-sm" 
             style="background:#6c757d; color:#fff; border:none; border-radius:8px; padding:10px 20px; font-weight:500;">
            <i class="fas fa-times me-1"></i> Batal
          </a>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Responsive Design -->
<style>
  @media (max-width: 768px) {
    .content-wrapper {
      padding: 20px 15px !important;
    }
    .card-body {
      padding: 20px !important;
    }
  }
</style>