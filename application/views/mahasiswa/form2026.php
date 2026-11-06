<?php defined('BASEPATH') OR exit('No direct script access allowed');

// Nilai isian: dari POST (jika validasi gagal), kalau tidak dari data tersimpan
$val = function ($name) use ($row) {
    return set_value($name, ($row && isset($row->$name)) ? trim((string) $row->$name) : '');
};
?>
<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Form <?php echo html_escape($cfg['title']); ?></h3>
        </div>
        <!-- /.box-header -->
        <?php echo form_open_multipart('mahasiswa2026/simpan/' . $key); ?>
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
          <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

          <table width="40%">
            <tr>
              <td><label>NIM</label></td><td><label>:</label></td>
              <td><label><?php echo html_escape(trim($mhs->NIM)); ?></label></td>
            </tr>
            <tr>
              <td><label>Nama</label></td><td><label>:</label></td>
              <td><label><?php echo html_escape(trim($mhs->Nama_mahasiswa)); ?></label></td>
            </tr>
            <tr>
              <td><label>Program Studi</label></td><td><label>:</label></td>
              <td><label><?php echo html_escape(trim($mhs->nama_prodi)); ?></label></td>
            </tr>
          </table>
          <hr>

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

          <?php foreach ($cfg['fields'] as $f): $n = $f['name']; ?>
            <div class="form-group">
              <label for="<?php echo $n; ?>"><?php echo html_escape($f['label']); ?></label>

              <?php if ($f['type'] === 'textarea'): ?>
                <textarea class="form-control" id="<?php echo $n; ?>" name="<?php echo $n; ?>" rows="3"><?php echo html_escape($val($n)); ?></textarea>

              <?php elseif ($f['type'] === 'dosen'): ?>
                <?php $cur = $val($n); ?>
                <select class="form-control" id="<?php echo $n; ?>" name="<?php echo $n; ?>">
                  <option value="">-- Pilih dosen --</option>
                  <?php foreach ($dosen as $kode => $label): ?>
                    <option value="<?php echo html_escape($kode); ?>" <?php echo ((string) $cur === (string) $kode) ? 'selected' : ''; ?>>
                      <?php echo html_escape($label); ?>
                    </option>
                  <?php endforeach; ?>
                </select>

              <?php elseif ($f['type'] === 'file'): ?>
                <?php $lama = ($row && isset($row->$n)) ? trim((string) $row->$n) : ''; ?>
                <input type="file" class="form-control" id="<?php echo $n; ?>" name="<?php echo $n; ?>" accept=".pdf,.jpg,.jpeg,.png">
                <p class="help-block">Format PDF/JPG/PNG, maksimal 5 MB.</p>
                <?php if ($lama !== ''): ?>
                  <p class="help-block">
                    File saat ini:
                    <a href="<?php echo base_url() . $upload_url . $f['folder'] . '/' . rawurlencode($lama); ?>" target="_blank"><?php echo html_escape($lama); ?></a>
                    (kosongkan jika tidak ingin mengganti)
                  </p>
                <?php endif; ?>

              <?php elseif ($f['type'] === 'date'): ?>
                <input type="date" class="form-control" id="<?php echo $n; ?>" name="<?php echo $n; ?>" value="<?php echo html_escape($val($n)); ?>">

              <?php elseif ($f['type'] === 'number'): ?>
                <input type="text" inputmode="decimal" class="form-control" id="<?php echo $n; ?>" name="<?php echo $n; ?>" value="<?php echo html_escape($val($n)); ?>">

              <?php elseif ($f['type'] === 'tel'): ?>
                <input type="tel" class="form-control" id="<?php echo $n; ?>" name="<?php echo $n; ?>" value="<?php echo html_escape($val($n)); ?>" placeholder="hanya angka">

              <?php else: ?>
                <input type="text" class="form-control" id="<?php echo $n; ?>" name="<?php echo $n; ?>" value="<?php echo html_escape($val($n)); ?>">
              <?php endif; ?>
            </div>
          <?php endforeach; ?>

        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        <?php echo form_close(); ?>
      </div>
      <!-- /.box -->
    </div>
  </div>
</section>
<!-- /.content -->
