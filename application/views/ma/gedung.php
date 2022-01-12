    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Gedung</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="form-group">
              <a class="btn btn-success btn-sm" href="<?php echo base_url() ?>aset/i_gedung"><i class="fa fa-plus"> Tambah</i></a>
              </div>
              <?php echo $this->datatables->generate('tabel_ajuan') ?>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->