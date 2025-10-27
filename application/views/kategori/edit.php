<div class="content-wrapper" style="background:#e9f3f2; min-height:100vh; padding:35px 25px;">
  
  <!-- Header -->
  <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
    <h4 style="font-weight:600; color:#0e3c38; margin-bottom:10px;">
      <i class="fas fa-edit me-2"></i><?= $title ?>
    </h4>
    <a href="<?= base_url('kategori') ?>" 
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
      <i class="fas fa-tags me-1"></i> Form Edit Kategori Wisata
    </div>

    <div class="card-body" style="padding:30px;">
      <!-- Tampilkan error validasi -->
      <?php if (validation_errors()): ?>
        <div class="alert alert-danger alert-dismissible fade show" style="border-radius:10px;">
          <i class="fas fa-exclamation-triangle me-2"></i>
          <?= validation_errors() ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
      <?php endif; ?>

      <form method="post" action="<?= base_url('kategori/update/' . $kategori->id_kategori) ?>">
        <div class="row justify-content-center">
          <div class="col-md-8">
            <!-- Nama Kategori -->
            <div class="mb-4">
              <label class="form-label fw-bold" style="color:#0e3c38; margin-bottom:8px;">
                <i class="fas fa-tag me-1 text-muted"></i>Nama Kategori <span class="text-danger">*</span>
              </label>
              <input type="text" 
                     name="nama_kategori" 
                     class="form-control" 
                     value="<?= set_value('nama_kategori', html_escape($kategori->nama_kategori)) ?>" 
                     required
                     placeholder="Masukkan nama kategori"
                     style="border:1px solid #c8e6e3; border-radius:8px; padding:12px 16px; transition:0.3s; font-size:15px;"
                     onfocus="this.style.borderColor='#20c997'; this.style.boxShadow='0 0 0 2px rgba(32, 201, 151, 0.1)';"
                     onblur="this.style.borderColor='#c8e6e3'; this.style.boxShadow='none';">
              <div class="form-text text-muted mt-2" style="font-size:13px;">
                <i class="fas fa-info-circle me-1"></i>Contoh: Alam, Budaya, Kuliner, dll.
              </div>
            </div>

            <!-- Deskripsi -->
            <div class="mb-4">
              <label class="form-label fw-bold" style="color:#0e3c38; margin-bottom:8px;">
                <i class="fas fa-align-left me-1 text-muted"></i>Deskripsi
              </label>
              <textarea name="deskripsi" 
                        class="form-control" 
                        rows="4"
                        placeholder="Masukkan deskripsi kategori (opsional)"
                        style="border:1px solid #c8e6e3; border-radius:8px; padding:12px 16px; transition:0.3s; font-size:15px; resize:vertical;"
                        onfocus="this.style.borderColor='#20c997'; this.style.boxShadow='0 0 0 2px rgba(32, 201, 151, 0.1)';"
                        onblur="this.style.borderColor='#c8e6e3'; this.style.boxShadow='none';"><?= set_value('deskripsi', html_escape($kategori->deskripsi)) ?></textarea>
              <div class="form-text text-muted mt-2" style="font-size:13px;">
                <i class="fas fa-info-circle me-1"></i>Deskripsi singkat tentang kategori wisata ini
              </div>
            </div>

            <!-- Info Box -->
            <div class="alert alert-info border-0 mt-4" style="background:#e3f2fd; border-radius:10px; border-left:4px solid #2196f3;">
              <div class="d-flex align-items-center">
                <i class="fas fa-info-circle me-2 text-primary fs-5"></i>
                <div>
                  <small class="fw-bold text-dark">Informasi:</small>
                  <small class="text-muted d-block">Field dengan tanda <span class="text-danger">*</span> wajib diisi.</small>
                  <small class="text-muted d-block">Pastikan nama kategori belum digunakan oleh data lain.</small>
                  <small class="text-muted d-block">Perubahan akan mempengaruhi data wisata yang terkait.</small>
                </div>
              </div>
            </div>

            <!-- Tombol Submit -->
            <div class="d-flex gap-3 justify-content-center mt-5">
              <button type="submit" 
                      class="btn shadow-sm" 
                      style="background:#20c997; color:#fff; border:none; border-radius:8px; padding:12px 40px; font-weight:500; transition:0.3s;">
                <i class="fas fa-save me-1"></i> Update Data
              </button>
              <a href="<?= base_url('kategori') ?>" 
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
  
  .form-control, .form-select {
    font-size: 15px;
  }
  
  .form-control::placeholder, .form-select::placeholder {
    color: #a0aec0;
    font-size: 14px;
  }
  
  .form-control:focus, .form-select:focus, textarea:focus {
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
  
  textarea {
    resize: vertical;
    min-height: 100px;
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
    .form-control, textarea {
      padding: 10px 12px !important;
    }
  }
</style>

<!-- Optional: JavaScript untuk validasi -->
<script>
document.addEventListener('DOMContentLoaded', function() {
  const form = document.querySelector('form');
  const namaKategoriInput = document.querySelector('input[name="nama_kategori"]');
  const deskripsiTextarea = document.querySelector('textarea[name="deskripsi"]');
  const originalNama = namaKategoriInput.value.trim();
  const originalDeskripsi = deskripsiTextarea.value.trim();
  
  form.addEventListener('submit', function(e) {
    const namaKategori = namaKategoriInput.value.trim();
    const deskripsi = deskripsiTextarea.value.trim();
    
    // Validasi nama kategori tidak boleh kosong
    if (!namaKategori) {
      e.preventDefault();
      showError('Nama kategori harus diisi!');
      namaKategoriInput.focus();
      return false;
    }
    
    // Validasi panjang nama kategori
    if (namaKategori.length < 3) {
      e.preventDefault();
      showError('Nama kategori minimal 3 karakter!');
      namaKategoriInput.focus();
      return false;
    }
    
    // Validasi format nama kategori (hanya huruf, spasi, dan tanda hubung)
    const namaRegex = /^[a-zA-Z\s\-']+$/;
    if (!namaRegex.test(namaKategori)) {
      e.preventDefault();
      showError('Nama kategori hanya boleh mengandung huruf, spasi, dan tanda hubung!');
      namaKategoriInput.focus();
      return false;
    }
    
    // Validasi panjang deskripsi (jika diisi)
    if (deskripsi.length > 500) {
      e.preventDefault();
      showError('Deskripsi maksimal 500 karakter!');
      deskripsiTextarea.focus();
      return false;
    }
    
    // Cek jika tidak ada perubahan
    if (namaKategori === originalNama && deskripsi === originalDeskripsi) {
      e.preventDefault();
      showWarning('Tidak ada perubahan data yang dilakukan.');
      return false;
    }
  });
  
  // Fungsi untuk menampilkan pesan error
  function showError(message) {
    showAlert(message, 'danger');
  }
  
  // Fungsi untuk menampilkan pesan warning
  function showWarning(message) {
    showAlert(message, 'warning');
  }
  
  // Fungsi umum untuk menampilkan alert
  function showAlert(message, type) {
    // Cek apakah sudah ada alert
    let existingAlert = document.querySelector('.alert-danger, .alert-warning');
    if (existingAlert && !existingAlert.classList.contains('alert-dismissible')) {
      existingAlert.remove();
    }
    
    // Tentukan kelas dan ikon berdasarkan type
    const alertClass = type === 'danger' ? 'alert-danger' : 'alert-warning';
    const iconClass = type === 'danger' ? 'fa-exclamation-circle' : 'fa-exclamation-triangle';
    
    // Buat alert baru
    const alertDiv = document.createElement('div');
    alertDiv.className = `alert ${alertClass} alert-dismissible fade show`;
    alertDiv.style.borderRadius = '10px';
    alertDiv.innerHTML = `
      <i class="fas ${iconClass} me-2"></i>${message}
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
  namaKategoriInput.addEventListener('input', function() {
    const value = this.value.trim();
    
    // Hapus error styling jika input valid
    if (value.length >= 3) {
      this.style.borderColor = '#c8e6e3';
      this.style.boxShadow = 'none';
    }
    
    // Tampilkan indikator perubahan
    if (value !== originalNama) {
      this.style.borderLeft = '4px solid #ffc107';
    } else {
      this.style.borderLeft = '1px solid #c8e6e3';
    }
  });
  
  // Real-time validation pada textarea
  deskripsiTextarea.addEventListener('input', function() {
    const value = this.value.trim();
    
    // Tampilkan indikator perubahan
    if (value !== originalDeskripsi) {
      this.style.borderLeft = '4px solid #ffc107';
    } else {
      this.style.borderLeft = '1px solid #c8e6e3';
    }
    
    // Hitung karakter tersisa
    const maxLength = 500;
    const currentLength = value.length;
    if (currentLength > maxLength - 50) {
      this.style.borderColor = currentLength > maxLength ? '#dc3545' : '#ffc107';
    } else {
      this.style.borderColor = '#c8e6e3';
    }
  });
  
  // Set border left awal berdasarkan perubahan
  if (namaKategoriInput.value.trim() !== originalNama) {
    namaKategoriInput.style.borderLeft = '4px solid #ffc107';
  }
  if (deskripsiTextarea.value.trim() !== originalDeskripsi) {
    deskripsiTextarea.style.borderLeft = '4px solid #ffc107';
  }
});
</script>