<p>
  NIM: <b><?php echo html_escape(trim($row->nim)); ?></b> &nbsp;|&nbsp;
  Nama: <b><?php echo html_escape(trim((string) $row->Nama_mahasiswa)); ?></b> &nbsp;|&nbsp;
  Prodi: <b><?php echo html_escape(trim((string) $row->nama_prodi)); ?></b>
</p>
<form id="formLapgiat2026">
  <input type="hidden" name="nim" value="<?php echo html_escape(trim($row->nim)); ?>">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Bulan Laporan</th>
        <th>Tanggal Upload</th>
        <th>Lihat File</th>
        <th>Status</th>
        <th>Keterangan</th>
      </tr>
    </thead>
    <tbody>
      <?php for ($i = 1; $i <= $cfg['bulan']; $i++):
        $file   = trim((string) $row->{'lapgiat' . $i});
        $tgl    = $row->{'date_lapgiat' . $i};
        $status = $row->{'status_lapgiat' . $i};
        $ket    = $row->{'ket_lapgiat' . $i};
        $nm     = 'status_lapgiat' . $i;
      ?>
        <tr>
          <td>Bulan Ke-<?php echo $i; ?></td>
          <td><?php echo ($file !== '' && $tgl) ? html_escape($tgl) : '-'; ?></td>
          <td>
            <?php if ($file !== ''): ?>
              <a href="<?php echo base_url() . $upload_url . $cfg['folder'] . '/' . rawurlencode($file); ?>" target="_blank" class="btn btn-sm btn-info">Lihat</a>
            <?php else: ?>
              <span class="text-danger">File tidak tersedia</span>
            <?php endif; ?>
          </td>
          <td>
            <div class="radio"><label><input type="radio" name="<?php echo $nm; ?>" value="sudah" <?php echo $status === 'sudah' ? 'checked' : ''; ?>> Diterima</label></div>
            <div class="radio"><label><input type="radio" name="<?php echo $nm; ?>" value="belum" <?php echo $status === 'belum' ? 'checked' : ''; ?>> Ditolak</label></div>
            <div class="radio"><label><input type="radio" name="<?php echo $nm; ?>" value="proses" <?php echo $status === 'proses' ? 'checked' : ''; ?>> Proses</label></div>
          </td>
          <td>
            <textarea class="form-control" name="ket_lapgiat<?php echo $i; ?>" rows="2" placeholder="Masukkan keterangan"><?php echo html_escape((string) $ket); ?></textarea>
          </td>
        </tr>
      <?php endfor; ?>
    </tbody>
  </table>
  <div class="text-right">
    <button type="button" class="btn btn-primary" id="saveLapgiat2026">Simpan Validasi</button>
  </div>
</form>
