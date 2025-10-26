<div class="content-wrapper" style="background:#e9f3f2; min-height:100vh; padding:35px 25px;">

  <!-- Header dan Tombol -->
  <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap">
    <h4 style="font-weight:600; color:#0e3c38; margin-bottom:10px;">Daftar Wisata Magelang</h4>
    <a href="<?= base_url('wisata/add') ?>" 
       class="btn shadow-sm" 
       style="background:#20c997; color:#fff; border:none; border-radius:8px; padding:8px 16px; font-weight:500; transition:0.3s;">
      <i class="fas fa-plus me-1"></i> Tambah Data
    </a>
  </div>

  <!-- Card Table -->
  <div class="card border-0 shadow-sm" style="border-radius:14px; overflow:hidden;">
    <div class="card-header text-white" 
         style="background:#0e3c38; font-weight:500; padding:14px 20px; font-size:15px;">
      <i class="fas fa-map-marked-alt me-1"></i> Data Wisata Magelang
    </div>

    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table align-middle mb-0" style="color:#0e3c38; font-size:15px;">
          <thead style="background:#165b57; color:#e8fffb; font-weight:500;">
            <tr class="text-center">
              <th style="width:50px;">No</th>
              <th>Nama Wisata</th>
              <th>Pemilik</th>
              <th>Jenis</th>
              <th>Kecamatan</th>
              <th>No Telp</th>
              <th style="width:160px;">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php if(!empty($wisata)): ?>
              <?php 
              $start = isset($start) ? $start : 0;
              $no = $start + 1; 
              foreach($wisata as $w): 
              ?>
                <tr style="transition:0.25s;" 
                    onmouseover="this.style.background='#dff6f3';" 
                    onmouseout="this.style.background='transparent';">
                  <td class="text-center text-muted"><?= $no++ ?></td>
                  <td style="font-weight:500;"><?= $w->nama_wisata ?></td>
                  <td><?= $w->nama_pemilik ?></td> <!-- PERBAIKAN: ganti pemilik_wisata jadi nama_pemilik -->
                  <td><?= $w->jenis_wisata ?></td>
                  <td><?= $w->nama_kecamatan ?></td> <!-- PERBAIKAN: ganti kecamatan_wisata jadi nama_kecamatan -->
                  <td><?= $w->no_telp ?></td>
                  <td class="text-center">
                    <a href="<?= site_url('wisata/detail/'.$w->id_wisata) ?>" 
                       class="btn btn-sm" 
                       style="background:#20c997; color:white; border-radius:6px; margin-right:4px; width:32px;">
                      <i class="fas fa-eye"></i>
                    </a>
                    <a href="<?= base_url('wisata/edit/'.$w->id_wisata) ?>" 
                       class="btn btn-sm" 
                       style="background:#ffc107; color:#000; border-radius:6px; margin-right:4px; width:32px;">
                      <i class="fas fa-edit"></i>
                    </a>
                    <a href="<?= base_url('wisata/delete/'.$w->id_wisata) ?>" 
                       class="btn btn-sm" 
                       style="background:#dc3545; color:white; border-radius:6px; width:32px;"
                       onclick="return confirm('Yakin ingin menghapus data ini?')">
                      <i class="fas fa-trash"></i>
                    </a>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr>
                <td colspan="7" class="text-center py-4 text-muted" style="background:#f8faf9;">
                  Belum ada data wisata.
                </td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>

    <div class="card-footer bg-white text-end py-3" style="border-top:1px solid #dee2e6;">
      <?= $pagination ?>
    </div>
  </div>
</div>

<!-- Responsif untuk HP -->
<style>
  @media (max-width: 768px) {
    .content-wrapper {
      padding: 20px !important;
    }
    table th, table td {
      font-size: 14px !important;
    }
    .btn {
      padding: 6px 12px !important;
    }
  }

  /* Hover efek lembut pada tombol */
  .btn:hover {
    opacity: 0.85;
    transform: translateY(-2px);
  }
</style>