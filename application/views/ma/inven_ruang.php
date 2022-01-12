    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Inventaris</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="form-group">
              <a class="btn btn-success btn-sm" href="<?php echo base_url() ?>aset/i_inventaris"><i class="fa fa-plus"> Tambah</i></a>
              </div>
              <?php echo $this->datatables->generate('tabel_ajuan') ?>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
   <!-- summary -->
              <div class="box">
            <div class="box-header">
              <h3 class="box-title">Rincian :</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody><tr>
                  <th>Nama Barang</th>
                  <th>Jumlah Barang</th>
                 
                </tr>
                <?php foreach($summary as $s){ ?>
                <tr>
                 <td><?php echo $s->dis_nama_barang; ?></td>
                 <td><?php echo $s->count_barang; ?></td>
                </tr>
               <?php } ?>
              </tbody></table>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->