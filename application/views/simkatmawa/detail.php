<?php
function smw_opt($f, $v) { return (isset($f['options']) && isset($f['options'][$v])) ? $f['options'][$v] . ' (' . $v . ')' : $v; }
$cls = ['draft' => 'label-default', 'terkirim' => 'label-success', 'gagal' => 'label-danger'];
$lbl = ['draft' => 'Draft', 'terkirim' => 'Terkirim', 'gagal' => 'Gagal'];
$sent = ($row->status === 'terkirim');
?>
<section class="content">
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title"><?php echo html_escape($title); ?></h3>
      <div class="pull-right">
        <?php if (!$sent): ?>
          <a href="<?php echo base_url(); ?>simkatmawa/edit/<?php echo (int) $row->id; ?>" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i> Edit</a>
          <form method="post" action="<?php echo base_url(); ?>simkatmawa/kirim/<?php echo html_escape($row->jenis); ?>" style="display:inline"
                onsubmit="return confirm('Kirim data ini ke SIMKATMAWA?');">
            <input type="hidden" name="ids[]" value="<?php echo (int) $row->id; ?>">
            <input type="hidden" name="mode" value="terpilih">
            <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-paper-plane"></i> Kirim</button>
          </form>
        <?php endif; ?>
        <a href="<?php echo base_url(); ?>simkatmawa/modul/<?php echo html_escape($row->jenis); ?>" class="btn btn-default btn-sm">Kembali</a>
      </div>
    </div>
    <div class="box-body">
      <table class="table table-bordered">
        <tr><th style="width:240px">Status</th>
            <td><span class="label <?php echo $cls[$row->status]; ?>"><?php echo $lbl[$row->status]; ?></span>
                <?php if ($row->status === 'gagal'): ?> <span class="text-red"><?php echo html_escape($row->error); ?></span><?php endif; ?></td></tr>
        <tr><th>Dibuat oleh / waktu</th><td><?php echo html_escape($row->user . ' / ' . $row->created_at); ?></td></tr>
        <?php if ($sent): ?>
          <tr><th>Dikirim pada</th><td><?php echo html_escape($row->sent_at); ?></td></tr>
          <tr><th>ID SIMKATMAWA</th><td><?php echo html_escape($row->api_id); ?></td></tr>
        <?php endif; ?>
        <?php foreach ($m['fields'] as $f): if (!isset($payload[$f['name']])) { continue; } ?>
          <tr>
            <th><?php echo html_escape($f['label']); ?></th>
            <td>
              <?php $v = $payload[$f['name']]; ?>
              <?php if ($f['type'] === 'url'): ?>
                <a href="<?php echo html_escape($v); ?>" target="_blank" rel="noopener"><?php echo html_escape($v); ?></a>
              <?php else: echo nl2br(html_escape(smw_opt($f, $v))); endif; ?>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>

      <?php foreach ($m['groups'] as $gname => $g): $list = isset($payload[$gname]) ? $payload[$gname] : []; ?>
        <h4><?php echo html_escape($g['label']); ?></h4>
        <table class="table table-bordered table-striped">
          <thead><tr><?php foreach ($g['fields'] as $gf): ?><th><?php echo html_escape($gf['label']); ?></th><?php endforeach; ?></tr></thead>
          <tbody>
          <?php if (!$list): ?><tr><td colspan="<?php echo count($g['fields']); ?>" class="text-muted text-center">-</td></tr><?php endif; ?>
          <?php foreach ($list as $item): ?>
            <tr><?php foreach ($g['fields'] as $gf): ?>
              <td><?php echo html_escape(isset($item[$gf['name']]) ? $item[$gf['name']] : ''); ?></td>
            <?php endforeach; ?></tr>
          <?php endforeach; ?>
          </tbody>
        </table>
      <?php endforeach; ?>
    </div>
  </div>
</section>
