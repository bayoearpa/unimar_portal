<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data <?php echo html_escape($cfg['title']); ?> (Input Mahasiswa)</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Prodi</th>
                <?php foreach ($kolom as $label): ?>
                  <th><?php echo html_escape($label); ?></th>
                <?php endforeach; ?>
                <th>Tgl Input</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($rows as $r): ?>
                <tr>
                  <td><?php echo html_escape(trim($r->nim)); ?></td>
                  <td><?php echo html_escape(trim((string) $r->Nama_mahasiswa)); ?></td>
                  <td><?php echo html_escape(trim((string) $r->nama_prodi)); ?></td>
                  <?php foreach ($kolom as $n => $label): ?>
                    <td><?php echo html_escape(trim((string) $r->$n)); ?></td>
                  <?php endforeach; ?>
                  <td><?php echo html_escape($r->created_at); ?></td>
                  <td>
                    <button type="button" class="btn btn-info btn-sm btn-detail2026" data-nim="<?php echo html_escape(trim($r->nim)); ?>">
                      <i class="fa fa-eye"></i> Detail
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

<div class="modal fade" id="detailModal2026" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Detail <?php echo html_escape($cfg['title']); ?></h4>
      </div>
      <div class="modal-body"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>
