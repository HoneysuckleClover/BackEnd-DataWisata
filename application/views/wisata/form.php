<div class="content-wrapper">
  <section class="content-header">
    <h1><?= $title ?></h1>
  </section>

  <section class="content">
    <div class="card">
      <div class="card-body">
        <form method="post" action="<?= isset($wisata) ? base_url('wisata/update/'.$wisata->id_wisata) : base_url('wisata/save') ?>">
          <div class="form-group">
            <label>Nama Wisata</label>
            <input type="text" name="nama_wisata" class="form-control" value="<?= isset($wisata) ? $wisata->nama_wisata : '' ?>" required>
          </div>
          <div class="form-group">
            <label>Pemilik Wisata</label>
            <input type="text" name="pemilik_wisata" class="form-control" value="<?= isset($wisata) ? $wisata->pemilik_wisata : '' ?>" required>
          </div>
          <div class="form-group">
            <label>NIK Pemilik</label>
            <input type="text" name="nik_pemilik" class="form-control" value="<?= isset($wisata) ? $wisata->nik_pemilik : '' ?>">
          </div>
          <div class="form-group">
            <label>Jenis Wisata</label>
            <input type="text" name="jenis_wisata" class="form-control" value="<?= isset($wisata) ? $wisata->jenis_wisata : '' ?>">
          </div>
          <div class="form-group">
            <label>Alamat Wisata</label>
            <textarea name="alamat_wisata" class="form-control"><?= isset($wisata) ? $wisata->alamat_wisata : '' ?></textarea>
          </div>
          <div class="form-group">
            <label>Kecamatan Wisata</label>
            <input type="text" name="kecamatan_wisata" class="form-control" value="<?= isset($wisata) ? $wisata->kecamatan_wisata : '' ?>">
          </div>
          <div class="form-group">
            <label>Fasilitas</label>
            <textarea name="fasilitas" class="form-control"><?= isset($wisata) ? $wisata->fasilitas : '' ?></textarea>
          </div>
          <div class="form-group">
            <label>No Telp</label>
            <input type="text" name="no_telp" class="form-control" value="<?= isset($wisata) ? $wisata->no_telp : '' ?>">
          </div>
          <div class="form-group">
            <label>Jumlah Karyawan</label>
            <input type="number" name="jumlah_karyawan" class="form-control" value="<?= isset($wisata) ? $wisata->jumlah_karyawan : '' ?>">
          </div>
          <button type="submit" class="btn btn-success">Simpan</button>
          <a href="<?= base_url('wisata') ?>" class="btn btn-secondary">Kembali</a>
        </form>
      </div>
    </div>
  </section>
</div>
