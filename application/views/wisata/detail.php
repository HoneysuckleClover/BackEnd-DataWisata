<div class="content-wrapper">
  <section class="content-header">
    <div class="container-fluid">
      <h1><?= $title ?></h1>
    </div>
  </section>

  <section class="content">
    <div class="container-fluid">
      <div class="card">
        <div class="card-body">
          <table class="table table-bordered">
            <tr><th>Nama Wisata</th><td><?= $wisata->nama_wisata ?></td></tr>
            <tr><th>Jenis Wisata</th><td><?= $wisata->jenis_wisata ?></td></tr>
            <tr><th>Nama Pemilik</th><td><?= $wisata->nama_pemilik ?></td></tr>
            <tr><th>No. Telepon</th><td><?= $wisata->no_telp ?></td></tr>
            <tr><th>Kecamatan</th><td><?= $wisata->nama_kecamatan ?></td></tr>
            <tr><th>Jumlah Karyawan</th><td><?= $wisata->jumlah_karyawan ?></td></tr>
            <tr><th>Alamat</th><td><?= $wisata->alamat ?></td></tr>
          </table>
          <a href="<?= site_url('wisata') ?>" class="btn btn-secondary">Kembali</a>
        </div>
      </div>
    </div>
  </section>
</div>
