<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Validasi <?php echo html_escape($cfg['title']); ?> Per Bulan</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Prodi</th>
                <th>Laporan Diunggah</th>
                <th>Diterima</th>
                <th>Ditolak</th>
                <th>Menunggu</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($rows as $r):
                $up = $ok = $no = $wait = 0;
                for ($i = 1; $i <= $cfg['bulan']; $i++) {
                    if (trim((string) $r->{'lapgiat' . $i}) === '') { continue; }
                    $up++;
                    $st = $r->{'status_lapgiat' . $i};
                    if ($st === 'sudah') { $ok++; } elseif ($st === 'belum') { $no++; } else { $wait++; }
                }
              ?>
                <tr>
                  <td><?php echo html_escape(trim($r->nim)); ?></td>
                  <td><?php echo html_escape(trim((string) $r->Nama_mahasiswa)); ?></td>
                  <td><?php echo html_escape(trim((string) $r->nama_prodi)); ?></td>
                  <td><?php echo $up . ' / ' . $cfg['bulan']; ?></td>
                  <td><span class="label label-success"><?php echo $ok; ?></span></td>
                  <td><span class="label label-danger"><?php echo $no; ?></span></td>
                  <td><span class="label label-warning"><?php echo $wait; ?></span></td>
                  <td>
                    <button type="button" class="btn btn-primary btn-sm btn-cek2026" data-nim="<?php echo html_escape(trim($r->nim)); ?>">
                      <i class="fa fa-check-square-o"></i> Cek
                    </button>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
  </div>
</section>
<!-- /.content -->

<div class="modal fade" id="cekModal2026" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Validasi <?php echo html_escape($cfg['title']); ?></h4>
      </div>
      <div class="modal-body"></div>
    </div>
  </div>
</div>
