<div class="content-wrapper" style="background:#e9f3f2; min-height:100vh; padding:35px 25px;">
  
  <!-- Header -->
  <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
    <h4 style="font-weight:600; color:#0e3c38; margin-bottom:10px;">
      <i class="fas fa-edit me-2"></i><?= $title ?>
    </h4>
    <a href="<?= site_url('wisata') ?>" 
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
      <i class="fas fa-edit me-1"></i> Form Edit Data Wisata
    </div>

    <div class="card-body" style="padding:30px;">
      <form method="post" action="<?= site_url('wisata/update/'.$wisata->id_wisata) ?>">
        <div class="row">
          <!-- Kolom Kiri -->
          <div class="col-md-6">
            <!-- Nama Wisata -->
            <div class="mb-4">
              <label class="form-label fw-bold" style="color:#0e3c38; margin-bottom:8px;">
                <i class="fas fa-landmark me-1 text-muted"></i>Nama Wisata <span class="text-danger">*</span>
              </label>
              <input type="text" name="nama_wisata" class="form-control" 
                     value="<?= html_escape($wisata->nama_wisata) ?>" 
                     style="border:1px solid #c8e6e3; border-radius:8px; padding:10px 12px; transition:0.3s;"
                     required
                     onfocus="this.style.borderColor='#20c997'; this.style.boxShadow='0 0 0 2px rgba(32, 201, 151, 0.1)';"
                     onblur="this.style.borderColor='#c8e6e3'; this.style.boxShadow='none';">
            </div>

            <!-- Nama Pemilik -->
            <div class="mb-4">
              <label class="form-label fw-bold" style="color:#0e3c38; margin-bottom:8px;">
                <i class="fas fa-user-tie me-1 text-muted"></i>Nama Pemilik <span class="text-danger">*</span>
              </label>
              <input type="text" name="nama_pemilik" class="form-control" 
                     value="<?= html_escape($wisata->nama_pemilik) ?>" 
                     style="border:1px solid #c8e6e3; border-radius:8px; padding:10px 12px; transition:0.3s;"
                     required
                     onfocus="this.style.borderColor='#20c997'; this.style.boxShadow='0 0 0 2px rgba(32, 201, 151, 0.1)';"
                     onblur="this.style.borderColor='#c8e6e3'; this.style.boxShadow='none';">
            </div>

            <!-- No Telp Pemilik -->
            <div class="mb-4">
              <label class="form-label fw-bold" style="color:#0e3c38; margin-bottom:8px;">
                <i class="fas fa-phone me-1 text-muted"></i>No Telepon Pemilik <span class="text-danger">*</span>
              </label>
              <input type="text" name="no_telp" class="form-control" 
                     value="<?= html_escape($wisata->no_telp) ?>" 
                     style="border:1px solid #c8e6e3; border-radius:8px; padding:10px 12px; transition:0.3s;"
                     required
                     onfocus="this.style.borderColor='#20c997'; this.style.boxShadow='0 0 0 2px rgba(32, 201, 151, 0.1)';"
                     onblur="this.style.borderColor='#c8e6e3'; this.style.boxShadow='none';">
            </div>

            <!-- NIK Pemilik -->
            <div class="mb-4">
              <label class="form-label fw-bold" style="color:#0e3c38; margin-bottom:8px;">
                <i class="fas fa-id-card me-1 text-muted"></i>NIK Pemilik <span class="text-danger">*</span>
              </label>
              <input type="text" name="nik_pemilik" class="form-control" 
                     value="<?= html_escape($wisata->nik_pemilik) ?>" 
                     style="border:1px solid #c8e6e3; border-radius:8px; padding:10px 12px; transition:0.3s;"
                     required
                     onfocus="this.style.borderColor='#20c997'; this.style.boxShadow='0 0 0 2px rgba(32, 201, 151, 0.1)';"
                     onblur="this.style.borderColor='#c8e6e3'; this.style.boxShadow='none';">
            </div>
          </div>

          <!-- Kolom Kanan -->
          <div class="col-md-6">
            <!-- Jenis Wisata -->
            <div class="mb-4">
              <label class="form-label fw-bold" style="color:#0e3c38; margin-bottom:8px;">
                <i class="fas fa-tag me-1 text-muted"></i>Jenis Wisata <span class="text-danger">*</span>
              </label>
              <select name="id_kategori" class="form-control" 
                      style="border:1px solid #c8e6e3; border-radius:8px; padding:10px 12px; transition:0.3s;"
                      required
                      onfocus="this.style.borderColor='#20c997'; this.style.boxShadow='0 0 0 2px rgba(32, 201, 151, 0.1)';"
                      onblur="this.style.borderColor='#c8e6e3'; this.style.boxShadow='none';">
                <option value="">-- Pilih Jenis Wisata --</option>
                <?php if(isset($kategori_wisata) && is_array($kategori_wisata)): ?>
                  <?php foreach($kategori_wisata as $kategori): ?>
                    <option value="<?= $kategori->id_kategori ?>" 
                      <?= (isset($wisata->id_kategori) && $wisata->id_kategori == $kategori->id_kategori) ? 'selected' : '' ?>>
                      <?= html_escape($kategori->nama_kategori) ?>
                    </option>
                  <?php endforeach; ?>
                <?php else: ?>
                  <option value="">Data kategori tidak tersedia</option>
                <?php endif; ?>
              </select>
            </div>

            <!-- Kecamatan -->
            <div class="mb-4">
              <label class="form-label fw-bold" style="color:#0e3c38; margin-bottom:8px;">
                <i class="fas fa-map-marker-alt me-1 text-muted"></i>Kecamatan <span class="text-danger">*</span>
              </label>
              <select name="id_kecamatan" class="form-control" 
                      style="border:1px solid #c8e6e3; border-radius:8px; padding:10px 12px; transition:0.3s;"
                      required
                      onfocus="this.style.borderColor='#20c997'; this.style.boxShadow='0 0 0 2px rgba(32, 201, 151, 0.1)';"
                      onblur="this.style.borderColor='#c8e6e3'; this.style.boxShadow='none';">
                <option value="">-- Pilih Kecamatan --</option>
                <?php foreach($kecamatan as $k): ?>
                  <option value="<?= $k->id_kecamatan ?>" 
                    <?= $wisata->id_kecamatan == $k->id_kecamatan ? 'selected' : '' ?>>
                    <?= html_escape($k->nama_kecamatan) ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>

            <!-- Jumlah Karyawan -->
            <div class="mb-4">
              <label class="form-label fw-bold" style="color:#0e3c38; margin-bottom:8px;">
                <i class="fas fa-users me-1 text-muted"></i>Jumlah Karyawan
              </label>
              <input type="number" name="jumlah_karyawan" class="form-control" 
                     value="<?= html_escape($wisata->jumlah_karyawan) ?>" 
                     style="border:1px solid #c8e6e3; border-radius:8px; padding:10px 12px; transition:0.3s;"
                     min="0"
                     onfocus="this.style.borderColor='#20c997'; this.style.boxShadow='0 0 0 2px rgba(32, 201, 151, 0.1)';"
                     onblur="this.style.borderColor='#c8e6e3'; this.style.boxShadow='none';">
            </div>
          </div>
        </div>

        <!-- Alamat -->
        <div class="row">
          <div class="col-12">
            <div class="mb-4">
              <label class="form-label fw-bold" style="color:#0e3c38; margin-bottom:8px;">
                <i class="fas fa-location-dot me-1 text-muted"></i>Alamat Wisata <span class="text-danger">*</span>
              </label>
              <textarea name="alamat" class="form-control" 
                        style="border:1px solid #c8e6e3; border-radius:8px; padding:12px; height:100px; transition:0.3s;"
                        required
                        onfocus="this.style.borderColor='#20c997'; this.style.boxShadow='0 0 0 2px rgba(32, 201, 151, 0.1)';"
                        onblur="this.style.borderColor='#c8e6e3'; this.style.boxShadow='none';"><?= html_escape($wisata->alamat) ?></textarea>
            </div>
          </div>
        </div>

        <!-- Fasilitas -->
        <div class="row">
          <div class="col-12">
            <div class="mb-4">
              <label class="form-label fw-bold mb-3" style="color:#0e3c38;">
                <i class="fas fa-tree me-1"></i>Fasilitas
              </label>
              <div class="card border-0 shadow-sm" style="border-radius:10px; background:#f8fdfc;">
                <div class="card-body">
                  <div class="row">
                    <?php 
                    // Inisialisasi array fasilitas terpilih
                    $fasilitas_terpilih_ids = [];
                    if(isset($fasilitas_terpilih) && is_array($fasilitas_terpilih)) {
                        foreach($fasilitas_terpilih as $ft) {
                            $fasilitas_terpilih_ids[] = $ft->id_fasilitas;
                        }
                    }
                    ?>
                    
                    <?php if(isset($fasilitas) && is_array($fasilitas)): ?>
                      <?php foreach($fasilitas as $f): ?>
                      <div class="col-md-3 mb-3">
                        <div class="form-check p-2 rounded" style="transition:0.3s; border:1px solid #e3f2fd;">
                          <input class="form-check-input" type="checkbox" 
                                 name="fasilitas[]" value="<?= $f->id_fasilitas ?>"
                                 id="fasilitas_<?= $f->id_fasilitas ?>"
                                 <?= in_array($f->id_fasilitas, $fasilitas_terpilih_ids) ? 'checked' : '' ?>
                                 style="cursor:pointer; transform:scale(1.2); margin-right:10px;">
                          <label class="form-check-label fw-medium" for="fasilitas_<?= $f->id_fasilitas ?>" 
                                 style="cursor:pointer; color:#0e3c38; font-size:14px;">
                            <?= html_escape($f->nama_fasilitas) ?>
                          </label>
                        </div>
                      </div>
                      <?php endforeach; ?>
                    <?php else: ?>
                      <div class="col-12">
                        <p class="text-muted text-center py-3">
                          <i class="fas fa-exclamation-circle me-1"></i>Tidak ada fasilitas tersedia.
                        </p>
                      </div>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Info Box -->
        <div class="alert alert-info border-0 mb-4" style="background:#e3f2fd; border-radius:10px; border-left:4px solid #2196f3;">
          <div class="d-flex align-items-center">
            <i class="fas fa-info-circle me-2 text-primary fs-5"></i>
            <div>
              <small class="fw-bold text-dark">Informasi:</small>
              <small class="text-muted d-block">Field dengan tanda <span class="text-danger">*</span> wajib diisi.</small>
              <small class="text-muted d-block">Pastikan data yang dimasukkan sudah benar sebelum diupdate.</small>
            </div>
          </div>
        </div>

        <!-- Tombol Submit -->
        <div class="d-flex gap-3 justify-content-center">
          <button type="submit" 
                  class="btn shadow-sm" 
                  style="background:#20c997; color:#fff; border:none; border-radius:8px; padding:12px 40px; font-weight:500; transition:0.3s;">
            <i class="fas fa-save me-1"></i> Update Data
          </button>
          <a href="<?= site_url('wisata') ?>" 
             class="btn shadow-sm" 
             style="background:#6c757d; color:#fff; border:none; border-radius:8px; padding:12px 40px; font-weight:500; transition:0.3s;">
            <i class="fas fa-times me-1"></i> Batal
          </a>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Styling untuk Responsif -->
<style>
  .form-label {
    font-size: 14px;
  }
  
  .form-control, .form-select {
    font-size: 14px;
  }
  
  .form-control:focus, .form-select:focus {
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
  
  .form-check-input:checked {
    background-color: #20c997;
    border-color: #20c997;
  }
  
  .form-check {
    transition: all 0.3s ease;
  }
  
  .form-check:hover {
    background-color: #f0f9f8;
    border-color: #20c997 !important;
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
    .col-md-3 {
      width: 50%;
    }
  }

  @media (max-width: 576px) {
    .row {
      margin-left: -8px;
      margin-right: -8px;
    }
    .col-md-6, .col-md-3 {
      padding-left: 8px;
      padding-right: 8px;
    }
    .col-md-3 {
      width: 100%;
    }
  }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
  const form = document.querySelector('form');
  
  form.addEventListener('submit', function(e) {
    const namaWisata = document.querySelector('input[name="nama_wisata"]').value.trim();
    const namaPemilik = document.querySelector('input[name="nama_pemilik"]').value.trim();
    const noTelp = document.querySelector('input[name="no_telp"]').value.trim();
    const nikPemilik = document.querySelector('input[name="nik_pemilik"]').value.trim();
    const idKategori = document.querySelector('select[name="id_kategori"]').value;
    const idKecamatan = document.querySelector('select[name="id_kecamatan"]').value;
    const alamat = document.querySelector('textarea[name="alamat"]').value.trim();
    
    // Validasi field wajib
    if (!namaWisata) {
      e.preventDefault();
      alert('Nama wisata harus diisi!');
      document.querySelector('input[name="nama_wisata"]').focus();
      return false;
    }
    
    if (!namaPemilik) {
      e.preventDefault();
      alert('Nama pemilik harus diisi!');
      document.querySelector('input[name="nama_pemilik"]').focus();
      return false;
    }
    
    if (!noTelp) {
      e.preventDefault();
      alert('No. Telepon harus diisi!');
      document.querySelector('input[name="no_telp"]').focus();
      return false;
    }
    
    if (!nikPemilik) {
      e.preventDefault();
      alert('NIK pemilik harus diisi!');
      document.querySelector('input[name="nik_pemilik"]').focus();
      return false;
    }
    
    if (!idKategori) {
      e.preventDefault();
      alert('Jenis wisata harus dipilih!');
      document.querySelector('select[name="id_kategori"]').focus();
      return false;
    }
    
    if (!idKecamatan) {
      e.preventDefault();
      alert('Kecamatan harus dipilih!');
      document.querySelector('select[name="id_kecamatan"]').focus();
      return false;
    }
    
    if (!alamat) {
      e.preventDefault();
      alert('Alamat wisata harus diisi!');
      document.querySelector('textarea[name="alamat"]').focus();
      return false;
    }
    
    // Validasi format telepon
    const telpRegex = /^[0-9+\-\s()]{10,}$/;
    if (noTelp && !telpRegex.test(noTelp)) {
      e.preventDefault();
      alert('Format no. telepon tidak valid!');
      document.querySelector('input[name="no_telp"]').focus();
      return false;
    }
    
    // Validasi NIK (16 digit)
    const nikRegex = /^[0-9]{16}$/;
    if (nikPemilik && !nikRegex.test(nikPemilik)) {
      e.preventDefault();
      alert('NIK harus terdiri dari 16 digit angka!');
      document.querySelector('input[name="nik_pemilik"]').focus();
      return false;
    }
  });
});
</script>CXIUUUUUUUFL8PPHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHH 0O