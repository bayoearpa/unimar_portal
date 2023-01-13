    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Karyawan dan Dosen</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="form-group col-md-3 col-sm-6 col-xs-12">
                <a href=""><button type="button" class="btn btn-block btn-success btn-xs">Tambah Karyawan / Dosen</button></a>
              </div>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>NIAK</th>
                  <th>Nama</th>
                  <th>Jenis Kelamin</th>
                  <th>Tempat Lahir</th>
                  <th>Tanggal Lahir</th>
                  <th>Telepon</th>
                  <th>Jabatan</th>
                  <th>Status</th>
                  <th>Proses</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                foreach($kardos as $k){ 
                 ?>
                <tr>
                  <td><?php echo $k->niak; ?></td>
                  <td><?php echo $k->nama ?></td>
                  <td><?php echo $k->jenis_kelamin ?></td>
                  <td><?php echo $k->tempat_lahir ?></td>
                  <td><?php echo $k->tanggal_lahir ?></td>
                  <td><?php echo $k->telepon ?></td>
                  <td><?php echo $k->jabatan ?></td>
                  <td><?php echo $k->status ?></td>
                  <td>
                  <!--   <a class="btn btn-warning btn-sm" href="<?php //echo base_url().'hrd/kliring/'.$c->id_uks;?>"><span class="glyphicon glyphicon-pencil"></span> Kliring</a> -->
                     <a class="btn btn-warning btn-sm" href="<?php echo base_url().'hrd/edit_kardos/'.$c->id; ?>"><span class="glyphicon glyphicon-pencil"></span> Edit</a>
                  </td>
                  
                </tr>
               <?php } ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>NIAK</th>
                  <th>Nama</th>
                  <th>Jenis Kelamin</th>
                  <th>Tempat Lahir</th>
                  <th>Tanggal Lahir</th>
                  <th>Telepon</th>
                  <th>Jabatan</th>
                  <th>Status</th>
                  <th>Proses</th>
                </tr>
                </tfoot>
              </table>
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