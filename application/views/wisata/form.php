<div class="content-wrapper"> 
  <section class="content-header">
    <h1><?= $title ?></h1>
  </section>

  <section class="content">
    <div class="card">
      <div class="card-body">
        <form method="post" action="<?= base_url('wisata/save') ?>">
          
          <!-- Field yang sudah ada -->
          <div class="form-group">
            <label>Nama Wisata</label>
            <input type="text" name="nama_wisata" class="form-control" value="" required>
          </div>

          <div class="form-group">
            <label>Nama Pemilik</label>
            <input type="text" name="nama_pemilik" class="form-control" value="" required>
          </div>

          <div class="form-group">
            <label>No Telp Pemilik</label>
            <input type="text" name="no_telp" class="form-control" value="">
          </div>

          <div class="form-group">
            <label>NIK Pemilik</label>
            <input type="text" name="nik_pemilik" class="form-control" value="">
          </div>

          <div class="form-group">
            <label>Jenis Wisata</label>
            <input type="text" name="jenis_wisata" class="form-control" value="">
          </div>

          <div class="form-group">
            <label>Alamat Wisata</label>
            <textarea name="alamat" class="form-control"></textarea>
          </div>

          <div class="form-group">
            <label>Kecamatan Wisata</label>
            <select name="id_kecamatan" class="form-control" required>
              <option value="">-- Pilih Kecamatan --</option>
              <?php foreach($kecamatan as $k): ?>
                <option value="<?= $k->id_kecamatan ?>">
                  <?= $k->nama_kecamatan ?>
                </option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="form-group">
            <label>Jumlah Karyawan</label>
            <input type="number" name="jumlah_karyawan" class="form-control" value="">
          </div>

          <div class="form-group">
            <label>Fasilitas</label>
            <div class="row">
              <?php foreach($fasilitas as $f): ?>
              <div class="col-md-3">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" 
                         name="fasilitas[]" value="<?= $f->id_fasilitas ?>"
                         id="fasilitas_<?= $f->id_fasilitas ?>">
                  <label class="form-check-label" for="fasilitas_<?= $f->id_fasilitas ?>">
                    <?= $f->nama_fasilitas ?>
                  </label>
                </div>
              </div>
              <?php endforeach; ?>
            </div>
          </div>

          <button type="submit" class="btn btn-success">Simpan</button>
          <a href="<?= base_url('wisata') ?>" class="btn btn-secondary">Kembali</a>
        </form>
      </div>
    </div>
  </section>
</div>