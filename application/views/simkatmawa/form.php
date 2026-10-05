<?php
$old = isset($old) && is_array($old) ? $old : [];
$id  = isset($id) ? $id : NULL;
$group_defs = []; $old_groups = [];
foreach ($m['groups'] as $gname => $g) {
    $group_defs[$gname] = ['fields' => $g['fields']];
    $old_groups[$gname] = (isset($old[$gname]) && is_array($old[$gname])) ? array_values($old[$gname]) : [];
}
$action = base_url() . 'simkatmawa/simpan/' . $key . ($id ? '/' . (int) $id : '');
?>
<section class="content">
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title"><?php echo $id ? 'Edit' : 'Tambah'; ?> <?php echo html_escape($title); ?></h3>
      <div class="pull-right">
        <span class="label label-default" style="margin-right:8px">Disimpan lokal sebagai Draft</span>
        <a href="<?php echo base_url(); ?>simkatmawa/modul/<?php echo $key; ?>" class="btn btn-default btn-sm">Kembali ke Data</a>
      </div>
    </div>
    <?php echo form_open($action); ?>
    <div class="box-body">
      <?php if (!empty($error)): ?>
        <div class="alert alert-danger"><?php echo !empty($error_is_html) ? $error : html_escape($error); ?></div>
      <?php endif; ?>

      <div class="row">
      <?php foreach ($m['fields'] as $f):
        $req = !empty($f['required']);
        $val = isset($old[$f['name']]) ? $old[$f['name']] : '';
        $col = ($f['type'] === 'textarea') ? 'col-md-12' : 'col-md-6'; ?>
        <div class="<?php echo $col; ?>">
          <div class="form-group">
            <label><?php echo html_escape($f['label']); ?> <?php echo $req ? '<span class="text-red">*</span>' : ''; ?></label>
            <?php if ($f['type'] === 'textarea'): ?>
              <textarea name="<?php echo $f['name']; ?>" class="form-control" rows="3"><?php echo html_escape($val); ?></textarea>
            <?php elseif ($f['type'] === 'select'): ?>
              <select name="<?php echo $f['name']; ?>" class="form-control" <?php echo $req ? 'required' : ''; ?>>
                <option value="">-- Pilih --</option>
                <?php foreach ($f['options'] as $ov => $ol): ?>
                  <option value="<?php echo html_escape($ov); ?>" <?php echo ((string) $val === (string) $ov) ? 'selected' : ''; ?>><?php echo html_escape($ol); ?></option>
                <?php endforeach; ?>
              </select>
            <?php else: ?>
              <input type="<?php echo html_escape($f['type']); ?>" name="<?php echo $f['name']; ?>" class="form-control"
                     value="<?php echo html_escape($val); ?>" <?php echo $req ? 'required' : ''; ?>
                     <?php echo $f['type'] === 'number' ? 'min="0"' : ''; ?>>
            <?php endif; ?>
            <?php if (!empty($f['hint'])): ?><span class="help-block"><?php echo html_escape($f['hint']); ?></span><?php endif; ?>
          </div>
        </div>
      <?php endforeach; ?>
      </div>

      <?php foreach ($m['groups'] as $gname => $g): ?>
        <hr>
        <h4><?php echo html_escape($g['label']); ?> <?php echo $g['min'] > 0 ? '<span class="text-red">*</span>' : ''; ?></h4>
        <p class="text-muted"><?php
          $labels = []; foreach ($g['fields'] as $gf) { $labels[] = $gf['label']; }
          echo html_escape(implode(' | ', $labels)); ?></p>
        <div id="grp-<?php echo $gname; ?>"></div>
        <button type="button" class="btn btn-default btn-sm" onclick="smwAddRow('<?php echo $gname; ?>')">
          <i class="fa fa-plus"></i> Tambah <?php echo html_escape($g['label']); ?>
        </button>
      <?php endforeach; ?>
    </div>
    <div class="box-footer">
      <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Draft</button>
      <?php if (!$id): ?>
        <button type="submit" name="lanjut" value="1" class="btn btn-default">Simpan &amp; Tambah Lagi</button>
      <?php endif; ?>
    </div>
    <?php echo form_close(); ?>
  </div>
</section>

<script>
/* JavaScript murni: jQuery baru dimuat di footer, jadi tidak dipakai di sini */
(function () {
  var defs = <?php echo json_encode($group_defs); ?>;
  var old  = <?php echo json_encode($old_groups); ?>;
  var counters = {};

  function addRow(g, vals) {
    var d = defs[g], box = document.getElementById('grp-' + g);
    counters[g] = (counters[g] || 0) + 1;
    var i = counters[g];
    var row = document.createElement('div');
    row.className = 'row'; row.style.marginBottom = '8px';
    var w = Math.floor(10 / d.fields.length);

    d.fields.forEach(function (f) {
      var col = document.createElement('div'); col.className = 'col-sm-' + w;
      var inp = document.createElement('input');
      inp.type = (f.type === 'url') ? 'url' : 'text';
      inp.className = 'form-control';
      inp.name = g + '[' + i + '][' + f.name + ']';
      inp.placeholder = f.label;
      if (vals && vals[f.name] !== undefined) { inp.value = vals[f.name]; }
      col.appendChild(inp); row.appendChild(col);
    });

    var bc = document.createElement('div'); bc.className = 'col-sm-2';
    var b = document.createElement('button');
    b.type = 'button'; b.className = 'btn btn-danger btn-sm'; b.textContent = 'Hapus';
    b.onclick = function () { box.removeChild(row); };
    bc.appendChild(b); row.appendChild(bc);
    box.appendChild(row);
  }

  window.smwAddRow = function (g) { addRow(g); };

  Object.keys(defs).forEach(function (g) {
    var rows = old[g] || [];
    var n = Math.max(rows.length, 1);
    for (var k = 0; k < n; k++) { addRow(g, rows[k]); }
  });
})();
</script>
