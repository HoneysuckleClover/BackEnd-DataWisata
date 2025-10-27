<div class="content-wrapper" style="background:#e9f3f2; min-height:100vh; padding:35px 25px;">
  
  <!-- Header -->
  <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
    <h4 style="font-weight:600; color:#0e3c38; margin-bottom:10px;">
      <i class="fas fa-plus me-2"></i><?= $title ?>
    </h4>
    <a href="<?= site_url('kecamatan') ?>" 
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
      <i class="fas fa-map-marker-alt me-1"></i> Form Tambah Data Kecamatan
    </div>

    <div class="card-body" style="padding:30px;">
      <form action="<?= site_url('kecamatan/save') ?>" method="post">
        <div class="row justify-content-center">
          <div class="col-md-8">
            <!-- Nama Kecamatan -->
            <div class="mb-4">
              <label for="nama_kecamatan" class="form-label fw-bold" style="color:#0e3c38; margin-bottom:8px;">
                <i class="fas fa-map-pin me-1 text-muted"></i>Nama Kecamatan <span class="text-danger">*</span>
              </label>
              <input type="text" 
                     class="form-control" 
                     id="nama_kecamatan" 
                     name="nama_kecamatan" 
                     required
                     placeholder="Masukkan nama kecamatan"
                     style="border:1px solid #c8e6e3; border-radius:8px; padding:12px 16px; transition:0.3s; font-size:15px;"
                     onfocus="this.style.borderColor='#20c997'; this.style.boxShadow='0 0 0 2px rgba(32, 201, 151, 0.1)';"
                     onblur="this.style.borderColor='#c8e6e3'; this.style.boxShadow='none';">
              <div class="form-text text-muted mt-2" style="font-size:13px;">
                <i class="fas fa-info-circle me-1"></i>Masukkan nama kecamatan yang valid di wilayah Magelang
              </div>
            </div>

            <!-- Info Box -->
            <div class="alert alert-info border-0 mt-4" style="background:#e3f2fd; border-radius:10px; border-left:4px solid #2196f3;">
              <div class="d-flex align-items-center">
                <i class="fas fa-info-circle me-2 text-primary fs-5"></i>
                <div>
                  <small class="fw-bold text-dark">Informasi:</small>
                  <small class="text-muted d-block">Field dengan tanda <span class="text-danger">*</span> wajib diisi.</small>
                  <small class="text-muted d-block">Pastikan nama kecamatan belum terdaftar sebelumnya.</small>
                </div>
              </div>
            </div>

            <!-- Tombol Submit -->
            <div class="d-flex gap-3 justify-content-center mt-5">
              <button type="submit" 
                      class="btn shadow-sm" 
                      style="background:#20c997; color:#fff; border:none; border-radius:8px; padding:12px 40px; font-weight:500; transition:0.3s;">
                <i class="fas fa-save me-1"></i> Simpan Data
              </button>
              <a href="<?= site_url('kecamatan') ?>" 
                 class="btn shadow-sm" 
                 style="background:#6c757d; color:#fff; border:none; border-radius:8px; padding:12px 40px; font-weight:500; transition:0.3s;">
                <i class="fas fa-times me-1"></i> Batal
              </a>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Styling Tambahan -->
<style>
  .form-label {
    font-size: 15px;
  }
  
  .form-control {
    font-size: 15px;
  }
  
  .form-control::placeholder {
    color: #a0aec0;
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
  
  .form-text {
    font-size: 13px;
  }
  
  @media (max-width: 768px) {
    .content-wrapper {
      padding: 20px 15px !important;
    }
    .card-body {
      padding: 20px !important;
    }
    .col-md-8 {
      width: 100%;
      padding: 0 10px;
    }
    .d-flex.gap-3 {
      flex-direction: column;
    }
    .btn {
      width: 100%;
      margin-bottom: 10px;
    }
  }

  @media (max-width: 576px) {
    .card-body {
      padding: 15px !important;
    }
    .form-control {
      padding: 10px 12px !important;
    }
  }
</style>

<!-- Optional: JavaScript untuk validasi -->
<script>
document.addEventListener('DOMContentLoaded', function() {
  const form = document.querySelector('form');
  const namaKecamatanInput = document.getElementById('nama_kecamatan');
  
  form.addEventListener('submit', function(e) {
    const namaKecamatan = namaKecamatanInput.value.trim();
    
    // Validasi nama kecamatan tidak boleh kosong
    if (!namaKecamatan) {
      e.preventDefault();
      showError('Nama kecamatan harus diisi!');
      namaKecamatanInput.focus();
      return false;
    }
    
    // Validasi panjang nama kecamatan
    if (namaKecamatan.length < 3) {
      e.preventDefault();
      showError('Nama kecamatan minimal 3 karakter!');
      namaKecamatanInput.focus();
      return false;
    }
    
    // Validasi format nama kecamatan (hanya huruf, spasi, dan tanda hubung)
    const namaRegex = /^[a-zA-Z\s\-']+$/;
    if (!namaRegex.test(namaKecamatan)) {
      e.preventDefault();
      showError('Nama kecamatan hanya boleh mengandung huruf, spasi, dan tanda hubung!');
      namaKecamatanInput.focus();
      return false;
    }
  });
  
  // Fungsi untuk menampilkan pesan error
  function showError(message) {
    // Cek apakah sudah ada alert error
    let existingAlert = document.querySelector('.alert-danger');
    if (existingAlert) {
      existingAlert.remove();
    }
    
    // Buat alert error baru
    const alertDiv = document.createElement('div');
    alertDiv.className = 'alert alert-danger alert-dismissible fade show';
    alertDiv.style.borderRadius = '10px';
    alertDiv.innerHTML = `
      <i class="fas fa-exclamation-circle me-2"></i>${message}
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    `;
    
    // Sisipkan alert setelah notifikasi flashdata (jika ada) atau sebelum card form
    const notifikasi = document.querySelector('.alert-success, .alert-danger');
    const cardForm = document.querySelector('.card');
    
    if (notifikasi) {
      notifikasi.parentNode.insertBefore(alertDiv, notifikasi.nextSibling);
    } else if (cardForm) {
      cardForm.parentNode.insertBefore(alertDiv, cardForm);
    }
    
    // Auto dismiss setelah 5 detik
    setTimeout(() => {
      if (alertDiv.parentNode) {
        alertDiv.remove();
      }
    }, 5000);
  }
  
  // Real-time validation pada input
  namaKecamatanInput.addEventListener('input', function() {
    const value = this.value.trim();
    
    // Hapus error styling jika input valid
    if (value.length >= 3) {
      this.style.borderColor = '#c8e6e3';
      this.style.boxShadow = 'none';
    }
  });
});
</script>