<?php defined('BASEPATH') OR exit('No direct script access allowed');

// Warna panel bergantian seperti halaman Laporan Bulanan (laponboard)
$warna = ['primary', 'danger', 'success', 'warning', 'info', 'default'];
?>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Form <?php echo html_escape($cfg['title']); ?> Per Bulan</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">

          <?php if ($this->session->flashdata('m26_ok')): ?>
            <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <?php echo html_escape($this->session->flashdata('m26_ok')); ?>
            </div>
          <?php endif; ?>

          <?php if (!empty($errors)): ?>
            <div class="alert alert-danger">
              <ul style="margin-bottom:0">
                <?php foreach ($errors as $e): ?>
                  <li><?php echo html_escape($e); ?></li>
                <?php endforeach; ?>
              </ul>
            </div>
          <?php endif; ?>

          <p>
            NIM: <b><?php echo html_escape(trim($mhs->NIM)); ?></b> &nbsp;|&nbsp;
            Nama: <b><?php echo html_escape(trim($mhs->Nama_mahasiswa)); ?></b> &nbsp;|&nbsp;
            Program Studi: <b><?php echo html_escape(trim($mhs->nama_prodi)); ?></b>
          </p>
          <p class="text-muted">Format file PDF/JPG/PNG, maksimal 5 MB per laporan. Jumlah laporan: <?php echo (int) $cfg['bulan']; ?> bulan.</p>

          <?php if (!empty($download)): ?>
            <div class="callout callout-info">
              <h4><i class="fa fa-download"></i> Format Dokumen</h4>
              <?php foreach ($download as $d): ?>
                <p>
                  <?php if ($d['url']): ?>
                    <a href="<?php echo $d['url']; ?>" target="_blank" class="btn btn-default btn-sm"><i class="fa fa-file-o"></i> <?php echo html_escape($d['label']); ?></a>
                  <?php else: ?>
                    <?php echo html_escape($d['label']); ?> <span class="text-muted">(file belum tersedia, hubungi PPK)</span>
                  <?php endif; ?>
                </p>
              <?php endforeach; ?>
            </div>
          <?php endif; ?>


          <?php for ($i = 1; $i <= $cfg['bulan']; $i++):
            $file   = $row ? trim((string) $row->{'lapgiat' . $i}) : '';
            $tgl    = $row ? $row->{'date_lapgiat' . $i} : NULL;
            $status = $row ? $row->{'status_lapgiat' . $i} : 'proses';
            $ket    = $row ? trim((string) $row->{'ket_lapgiat' . $i}) : '';
            $kunci  = ($file !== '' && $status === 'sudah');
            $w      = $warna[($i - 1) % count($warna)];
          ?>
            <div class="panel box box-<?php echo $w; ?>">
              <div class="box-header with-border">
                <h4 class="box-title">
                  <a data-toggle="collapse" data-parent="#accordion" href="#lapgiat<?php echo $i; ?>" <?php echo $i === 1 ? 'aria-expanded="true"' : 'class="collapsed" aria-expanded="false"'; ?>>
                    <?php echo html_escape($cfg['title']); ?> Bulan Ke-<?php echo $i; ?>
                  </a>
                </h4>
              </div>
              <div id="lapgiat<?php echo $i; ?>" class="panel-collapse collapse <?php echo $i === 1 ? 'in' : ''; ?>">
                <div class="box-body">

                  <strong><i class="fa fa-book margin-r-5"></i> Silakan Upload Laporan dibawah ini :</strong>
                  <?php if ($kunci): ?>
                    <p class="text-muted">Laporan sudah diterima, tidak dapat diubah.</p>
                  <?php else: ?>
                    <?php echo form_open_multipart('mahasiswa2026/simpan_lapgiat/' . $key); ?>
                      <input type="hidden" name="bulan" value="<?php echo $i; ?>">
                      <div class="form-group">
                        <input type="file" class="form-control" name="lapgiat_file" accept=".pdf,.jpg,.jpeg,.png">
                      </div>
                      <button type="submit" class="btn btn-primary"><?php echo $file !== '' ? 'Ganti File' : 'Upload'; ?></button>
                    <?php echo form_close(); ?>
                  <?php endif; ?>

                  <hr>

                  <strong><i class="fa fa-file-o margin-r-5"></i> File Laporan</strong>
                  <p class="text-muted">
                    <?php if ($file !== ''): ?>
                      <a href="<?php echo base_url() . $upload_url . $cfg['folder'] . '/' . rawurlencode($file); ?>" target="_blank"><?php echo html_escape($file); ?></a>
                    <?php else: ?>
                      Belum diunggah
                    <?php endif; ?>
                  </p>

                  <hr>

                  <strong><i class="fa fa-map-marker margin-r-5"></i> Tanggal Upload</strong>
                  <p class="text-muted"><?php echo ($file !== '' && $tgl) ? html_escape($tgl) : '0000-00-00'; ?></p>

                  <hr>

                  <strong><i class="fa fa-pencil margin-r-5"></i> Status laporan *cek dari Bagian PPK</strong>
                  <p>
                    <?php if ($status === 'proses') { ?>
                      <span class="label label-warning">Proses</span>
                    <?php } elseif ($status === 'belum') { ?>
                      <span class="label label-danger">Ditolak</span>
                    <?php } else { ?>
                      <span class="label label-success">Diterima</span>
                    <?php } ?>
                  </p>

                  <hr>

                  <strong><i class="fa fa-file-text-o margin-r-5"></i> Keterangan dari PPK</strong>
                  <p><?php echo html_escape($ket); ?></p>

                </div>
              </div>
            </div>
          <?php endfor; ?>

        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
  </div>
</section>
<!-- /.content -->
