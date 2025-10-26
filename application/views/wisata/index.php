<div class="content-wrapper">
  <section class="content-header">
    <h1><?= $title ?></h1>
  </section>

  <section class="content">
    <div class="card">
      <div class="card-header">
        <a href="<?= base_url('wisata/add') ?>" class="btn btn-primary"><i class="fas fa-plus"></i> Tambah Data</a>
      </div>
      <div class="card-body">
        <table class="table table-bordered">
          <thead class="table-dark">
            <tr>
              <th>No</th>
              <th>Nama Wisata</th>
              <th>Pemilik</th>
              <th>Jenis</th>
              <th>Kecamatan</th>
              <th>No Telp</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no=1; foreach($wisata as $w): ?>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= $w->nama_wisata ?></td>
              <td><?= $w->pemilik_wisata ?></td>
              <td><?= $w->jenis_wisata ?></td>
              <td><?= $w->kecamatan_wisata ?></td>
              <td><?= $w->no_telp ?></td>
              <td>
                <a href="<?= site_url('wisata/detail/'.$w->id_wisata) ?>" class="btn btn-info btn-sm">Lihat</a>
                <a href="<?= base_url('wisata/edit/'.$w->id_wisata) ?>" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                <a href="<?= base_url('wisata/delete/'.$w->id_wisata) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')"><i class="fas fa-trash"></i></a>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        <div class="mt-3"><?= $pagination ?></div>
      </div>
    </div>
  </section>
</div>
