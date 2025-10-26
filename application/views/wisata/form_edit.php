<div class="content-wrapper"> 
  <section class="content-header">
    <h1><?= $title ?></h1>
  </section>

  <section class="content">
    <div class="card">
      <div class="card-body">
        <form method="post" action="<?= base_url('wisata/update/'.$wisata->id_wisata) ?>">
          
          <!-- Field yang sudah ada -->
          <div class="form-group">
            <label>Nama Wisata</label>
            <input type="text" name="nama_wisata" class="form-control" 
                   value="<?= $wisata->nama_wisata ?>" required>
          </div>

          <div class="form-group">
            <label>Nama Pemilik</label>
            <input type="text" name="nama_pemilik" class="form-control" 
                   value="<?= $wisata->nama_pemilik ?>" required>
          </div>

          <div class="form-group">
            <label>No Telp Pemilik</label>
            <input type="text" name="no_telp" class="form-control" 
                   value="<?= $wisata->no_telp ?>">
          </div>

          <div class="form-group">
            <label>NIK Pemilik</label>
            <input type="text" name="nik_pemilik" class="form-control"
                   value="<?= $wisata->nik_pemilik ?>">
          </div>

          <div class="form-group">
            <label>Jenis Wisata</label>
            <input type="text" name="jenis_wisata" class="form-control" 
                   value="<?= $wisata->jenis_wisata ?>">
          </div>

          <div class="form-group">
            <label>Alamat Wisata</label>
            <textarea name="alamat" class="form-control"><?= $wisata->alamat ?></textarea>
          </div>

          <div class="form-group">
            <label>Kecamatan Wisata</label>
            <select name="id_kecamatan" class="form-control" required>
              <option value="">-- Pilih Kecamatan --</option>
              <?php foreach($kecamatan as $k): ?>
                <option value="<?= $k->id_kecamatan ?>" 
                  <?= $wisata->id_kecamatan == $k->id_kecamatan ? 'selected' : '' ?>>
                  <?= $k->nama_kecamatan ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="form-group">
            <label>Jumlah Karyawan</label>
            <input type="number" name="jumlah_karyawan" class="form-control" 
                   value="<?= $wisata->jumlah_karyawan ?>">
          </div>

          <!-- BAGIAN FASILITAS - DIPERBAIKI -->
          <div class="form-group">
            <label>Fasilitas</label>
            <div class="row">
              <?php 
              // PERBAIKAN: Inisialisasi array dan pastikan tidak error
              $fasilitas_terpilih_ids = [];
              if(isset($fasilitas_terpilih) && is_array($fasilitas_terpilih)) {
                  foreach($fasilitas_terpilih as $ft) {
                      $fasilitas_terpilih_ids[] = $ft->id_fasilitas;
                  }
              }
              ?>
              
              <?php if(isset($fasilitas) && is_array($fasilitas)): ?>
                <?php foreach($fasilitas as $f): ?>
                <div class="col-md-3">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" 
                           name="fasilitas[]" value="<?= $f->id_fasilitas ?>"
                           id="fasilitas_<?= $f->id_fasilitas ?>"
                           <?= in_array($f->id_fasilitas, $fasilitas_terpilih_ids) ? 'checked' : '' ?>>
                    <label class="form-check-label" for="fasilitas_<?= $f->id_fasilitas ?>">
                      <?= $f->nama_fasilitas ?>
                    </label>
                  </div>
                </div>
                <?php endforeach; ?>
              <?php else: ?>
                <div class="col-12">
                  <p class="text-muted">Tidak ada fasilitas tersedia.</p>
                </div>
              <?php endif; ?>
            </div>
          </div>

          <button type="submit" class="btn btn-success">Update</button>
          <a href="<?= base_url('wisata') ?>" class="btn btn-secondary">Kembali</a>
        </form>
      </div>
    </div>
  </section>
</div>