<?php
$level_label = [];
foreach ($m['fields'] as $f) { if ($f['name'] === 'level') { $level_label = $f['options']; } }
$cls = ['draft' => 'label-default', 'terkirim' => 'label-success', 'gagal' => 'label-danger'];
$lbl = ['draft' => 'Draft', 'terkirim' => 'Terkirim', 'gagal' => 'Gagal'];
$pending = $counts['draft'] + $counts['gagal'];
?>
<section class="content">
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">Data <?php echo html_escape($title); ?> SIMKATMAWA</h3>
      <div class="pull-right">
        <span class="text-muted" style="margin-right:8px"><i class="fa fa-circle text-green"></i> <?php echo html_escape($smw_user); ?></span>
        <a href="<?php echo base_url(); ?>simkatmawa/logout" class="btn btn-default btn-sm">Logout</a>
        <a href="<?php echo base_url(); ?>simkatmawa/tambah/<?php echo $key; ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Tambah Data</a>
      </div>
    </div>
    <div class="box-body">
      <div class="alert alert-info" style="margin-bottom:12px">
        Data diinput dan disimpan <b>lokal di portal</b> sebagai <b>Draft</b>. Data baru dikirim ke SIMKATMAWA
        saat Anda menekan tombol <b>Kirim</b>.
      </div>

      <p>
        <span class="label label-default">Draft: <?php echo $counts['draft']; ?></span>
        <span class="label label-danger">Gagal: <?php echo $counts['gagal']; ?></span>
        <span class="label label-success">Terkirim: <?php echo $counts['terkirim']; ?></span>
      </p>

      <div style="margin-bottom:10px">
        <button type="button" class="btn btn-success btn-sm" onclick="smwKirim('terpilih')"><i class="fa fa-paper-plane"></i> Kirim Terpilih</button>
        <button type="button" class="btn btn-warning btn-sm" onclick="smwKirim('semua')"><i class="fa fa-send"></i> Kirim Semua yang Belum Terkirim (<?php echo $pending; ?>)</button>
      </div>

      <table id="example1" class="table table-bordered table-striped" data-order='[[1,"desc"]]' data-page-length="25">
        <thead>
          <tr>
            <th data-orderable="false" style="width:30px"></th>
            <th>Dibuat</th>
            <th><?php echo html_escape($m['title']); ?></th>
            <th>Level</th>
            <th>Tgl Sertifikat</th>
            <th>Mhs</th>
            <th>Status</th>
            <th>ID SIMKATMAWA</th>
            <th data-orderable="false">Aksi</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach ($rows as $r):
          $sent = ($r->status === 'terkirim');
          $unsure = ($r->status === 'gagal' && ((int) $r->http_status === 0 || (int) $r->http_status >= 500)); ?>
          <tr>
            <td><?php if (!$sent): ?><input type="checkbox" class="smw-chk" value="<?php echo (int) $r->id; ?>"><?php endif; ?></td>
            <td><?php echo html_escape($r->created_at); ?></td>
            <td><?php echo html_escape($r->judul); ?></td>
            <td><?php echo html_escape(isset($level_label[$r->level]) ? $level_label[$r->level] : $r->level); ?></td>
            <td><?php echo html_escape($r->tgl_sertifikat); ?></td>
            <td><?php echo (int) $r->jml_mhs; ?></td>
            <td>
              <span class="label <?php echo $cls[$r->status]; ?>" <?php echo $r->error ? 'title="' . html_escape($r->error) . '"' : ''; ?>><?php echo $lbl[$r->status]; ?></span>
              <?php if ($unsure): ?>
                <i class="fa fa-warning text-yellow" title="Hasil pengiriman tidak pasti (gangguan koneksi/server). Cek dulu di SIMKATMAWA agar tidak terkirim dua kali."></i>
              <?php endif; ?>
              <?php if ($r->status === 'gagal' && $r->error): ?><br><small class="text-red"><?php echo html_escape(mb_strimwidth($r->error, 0, 80, '...')); ?></small><?php endif; ?>
            </td>
            <td><?php echo html_escape($r->api_id); ?></td>
            <td style="white-space:nowrap">
              <a href="<?php echo base_url(); ?>simkatmawa/detail/<?php echo (int) $r->id; ?>" class="btn btn-info btn-xs"><i class="fa fa-search"></i></a>
              <?php if (!$sent): ?>
                <a href="<?php echo base_url(); ?>simkatmawa/edit/<?php echo (int) $r->id; ?>" class="btn btn-warning btn-xs"><i class="fa fa-pencil"></i></a>
                <button type="button" class="btn btn-success btn-xs" onclick="smwKirimSatu(<?php echo (int) $r->id; ?>)" title="Kirim ke SIMKATMAWA"><i class="fa fa-paper-plane"></i></button>
                <button type="button" class="btn btn-danger btn-xs" onclick="smwHapus(<?php echo (int) $r->id; ?>)" title="Hapus"><i class="fa fa-trash"></i></button>
              <?php endif; ?>
            </td>
          </tr>
        <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</section>

<script>
/* JavaScript murni (jQuery baru dimuat di footer). Pilihan centang disimpan di sini
   agar tetap terbawa walau pindah halaman tabel. */
(function () {
  var base = '<?php echo base_url(); ?>simkatmawa/', key = '<?php echo $key; ?>', sel = {};

  document.addEventListener('change', function (e) {
    var t = e.target;
    if (t && t.classList && t.classList.contains('smw-chk')) { sel[t.value] = t.checked; }
  });

  function post(url, ids, mode) {
    var f = document.createElement('form');
    f.method = 'post'; f.action = url;
    (ids || []).forEach(function (id) {
      var i = document.createElement('input'); i.type = 'hidden'; i.name = 'ids[]'; i.value = id; f.appendChild(i);
    });
    if (mode) { var m = document.createElement('input'); m.type = 'hidden'; m.name = 'mode'; m.value = mode; f.appendChild(m); }
    document.body.appendChild(f); f.submit();
  }

  window.smwKirim = function (mode) {
    var ids = Object.keys(sel).filter(function (k) { return sel[k]; });
    if (mode === 'terpilih' && !ids.length) { alert('Centang dulu data yang akan dikirim (kotak di kolom paling kiri).'); return; }
    var msg = (mode === 'semua')
      ? 'Kirim SEMUA data yang belum terkirim ke SIMKATMAWA?\nData yang sudah terkirim tidak dapat ditarik kembali dari portal.'
      : 'Kirim ' + ids.length + ' data terpilih ke SIMKATMAWA?\nData yang sudah terkirim tidak dapat ditarik kembali dari portal.';
    if (confirm(msg)) { post(base + 'kirim/' + key, ids, mode); }
  };
  window.smwKirimSatu = function (id) {
    if (confirm('Kirim data ini ke SIMKATMAWA?')) { post(base + 'kirim/' + key, [id], 'terpilih'); }
  };
  window.smwHapus = function (id) {
    if (confirm('Hapus data draft ini? Tindakan ini tidak dapat dibatalkan.')) { post(base + 'hapus/' + id, []); }
  };
})();
</script>
