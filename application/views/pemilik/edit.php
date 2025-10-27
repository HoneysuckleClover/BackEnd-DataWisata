<div class="content-wrapper" style="background:#e9f3f2; min-height:100vh; padding:35px 25px;">
  
  <!-- Header -->
  <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
    <h4 style="font-weight:600; color:#0e3c38; margin-bottom:10px;">
      <i class="fas fa-edit me-2"></i><?= $title ?>
    </h4>
    <a href="<?= base_url('/pemilik') ?>" 
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

  <!-- Card Form -->
  <div class="card border-0 shadow-sm" style="border-radius:14px; overflow:hidden;">
    <div class="card-header text-white" 
         style="background:linear-gradient(135deg, #0e3c38 0%, #165b57 100%); font-weight:500; padding:14px 20px; font-size:15px;">
      <i class="fas fa-user-edit me-1"></i> Form Edit Data Pemilik
    </div>

    <div class="card-body" style="padding:30px;">
      <form action="<?= base_url('/pemilik/update/' . $pemilik['id_pemilik']) ?>" method="post">
        <div class="row">
          <div class="col-md-6">
            <div class="mb-4">
              <label for="nama_pemilik" class="form-label" style="font-weight:600; color:#0e3c38; margin-bottom:8px;">
                <i class="fas fa-user me-1 text-muted"></i>Nama Pemilik
              </label>
              <input type="text" 
                     class="form-control" 
                     id="nama_pemilik" 
                     name="nama_pemilik" 
                     value="<?= html_escape($pemilik['nama_pemilik']) ?>" 
                     required
                     style="border:1px solid #c8e6e3; border-radius:8px; padding:10px 12px; transition:0.3s;"
                     onfocus="this.style.borderColor='#20c997'; this.style.boxShadow='0 0 0 2px rgba(32, 201, 151, 0.1)';"
                     onblur="this.style.borderColor='#c8e6e3'; this.style.boxShadow='none';">
            </div>
          </div>
          <div class="col-md-6">
            <div class="mb-4">
              <label for="nik_pemilik" class="form-label" style="font-weight:600; color:#0e3c38; margin-bottom:8px;">
                <i class="fas fa-id-card me-1 text-muted"></i>NIK
              </label>
              <input type="text" 
                     class="form-control" 
                     id="nik_pemilik" 
                     name="nik_pemilik" 
                     value="<?= html_escape($pemilik['nik_pemilik']) ?>" 
                     required
                     style="border:1px solid #c8e6e3; border-radius:8px; padding:10px 12px; transition:0.3s;"
                     onfocus="this.style.borderColor='#20c997'; this.style.boxShadow='0 0 0 2px rgba(32, 201, 151, 0.1)';"
                     onblur="this.style.borderColor='#c8e6e3'; this.style.boxShadow='none';">
            </div>
          </div>
        </div>
        
        <div class="row">
          <div class="col-md-6">
            <div class="mb-4">
              <label for="no_telp" class="form-label" style="font-weight:600; color:#0e3c38; margin-bottom:8px;">
                <i class="fas fa-phone me-1 text-muted"></i>No. Telepon
              </label>
              <input type="text" 
                     class="form-control" 
                     id="no_telp" 
                     name="no_telp" 
                     value="<?= html_escape($pemilik['no_telp']) ?>" 
                     required
                     style="border:1px solid #c8e6e3; border-radius:8px; padding:10px 12px; transition:0.3s;"
                     onfocus="this.style.borderColor='#20c997'; this.style.boxShadow='0 0 0 2px rgba(32, 201, 151, 0.1)';"
                     onblur="this.style.borderColor='#c8e6e3'; this.style.boxShadow='none';">
            </div>
          </div>
        </div>

        <div class="d-flex gap-3 mt-4">
          <button type="submit" 
                  class="btn shadow-sm" 
                  style="background:#20c997; color:#fff; border:none; border-radius:8px; padding:10px 24px; font-weight:500; transition:0.3s;">
            <i class="fas fa-save me-1"></i> Simpan Perubahan
          </button>
          <a href="<?= base_url('/pemilik') ?>" 
             class="btn shadow-sm" 
             style="background:#6c757d; color:#fff; border:none; border-radius:8px; padding:10px 24px; font-weight:500; transition:0.3s;">
            <i class="fas fa-times me-1"></i> Batal
          </a>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Styling Tambahan -->
<style>
  .form-label {
    font-size: 14px;
  }
  
  .form-control:focus {
    border-color: #20c997 !important;
    box-shadow: 0 0 0 2px rgba(32, 201, 151, 0.1) !important;
  }
  
  .btn {
    transition: all 0.3s ease;
    border: none;
  }
  
  .btn:hover {
    opacity: 0.9;
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.15) !important;
  }
  
  @media (max-width: 768px) {
    .content-wrapper {
      padding: 20px 15px !important;
    }
    .card-body {
      padding: 20px !important;
    }
    .d-flex.gap-3 {
      flex-direction: column;
    }
    .btn {
      width: 100%;
      margin-bottom: 10px;
    }
  }
</style>