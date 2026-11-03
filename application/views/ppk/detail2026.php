<table class="table table-bordered">
  <tbody>
    <tr><th style="width:30%">NIM</th><td><?php echo html_escape(trim($row->nim)); ?></td></tr>
    <tr><th>Nama</th><td><?php echo html_escape(trim((string) $row->Nama_mahasiswa)); ?></td></tr>
    <tr><th>Program Studi</th><td><?php echo html_escape(trim((string) $row->nama_prodi)); ?></td></tr>
    <?php foreach ($cfg['fields'] as $f):
      $n = $f['name'];
      $v = trim((string) $row->$n);
    ?>
      <tr>
        <th><?php echo html_escape($f['label']); ?></th>
        <td>
          <?php if ($f['type'] === 'file'): ?>
            <?php if ($v !== ''): ?>
              <a href="<?php echo base_url() . $upload_url . $f['folder'] . '/' . rawurlencode($v); ?>" target="_blank" class="btn btn-xs btn-info"><i class="fa fa-file-o"></i> Lihat file</a>
              <small class="text-muted"><?php echo html_escape($v); ?></small>
            <?php else: ?>
              <span class="text-danger">File tidak tersedia</span>
            <?php endif; ?>
          <?php elseif ($f['type'] === 'dosen'): ?>
            <?php echo $v !== '' ? html_escape(isset($dosen[$v]) ? $dosen[$v] : $v) : '-'; ?>
          <?php elseif ($f['type'] === 'textarea'): ?>
            <?php echo $v !== '' ? nl2br(html_escape($v)) : '-'; ?>
          <?php else: ?>
            <?php echo $v !== '' ? html_escape($v) : '-'; ?>
          <?php endif; ?>
        </td>
      </tr>
    <?php endforeach; ?>
    <tr><th>Tgl Input</th><td><?php echo html_escape($row->created_at); ?></td></tr>
    <tr><th>Terakhir Diubah</th><td><?php echo $row->updated_at ? html_escape($row->updated_at) : '-'; ?></td></tr>
  </tbody>
</table>
