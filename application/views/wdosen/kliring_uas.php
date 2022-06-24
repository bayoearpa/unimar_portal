 <!-- Main content -->
      <section class="content">

        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Form Tambah Kliring UAS</h3>
          </div>
          <div class="box-body">
            <?php echo validation_errors(); 
            echo $this->session->flashdata('success');
            echo $this->session->flashdata('error');
            foreach($catar as $c){ 
              ?>
              <table>
                <tr>
                  <td><label for="exampleInputEmail1">NIM</label></td>
                  <td><label for="exampleInputEmail1">:</label></td>
                  <td><label for="exampleInputEmail1"><?php echo $c->nim; ?></label></td>
                </tr>
                <tr>
                  <td><label for="exampleInputEmail1">Nama</label></td>
                  <td><label for="exampleInputEmail1">:</label></td>
                  <td><label for="exampleInputEmail1"><?php echo $nama; ?></label></td>
                </tr>
                 <tr>
                  <td><label for="exampleInputEmail1">Semester</label></td>
                  <td><label for="exampleInputEmail1">:</label></td>
                  <td><label for="exampleInputEmail1"><?php echo $c->smt_now; ?></label></td>
                </tr>
                <tr>
                  <td><label for="exampleInputEmail1">Kelas</label></td>
                  <td><label for="exampleInputEmail1">:</label></td>
                  <td><label for="exampleInputEmail1"><?php echo strtoupper($c->kelas); ?></label></td>
                </tr>
              </table>
              <hr>
              <form action="<?php echo base_url() ?>wdosen/kliringuasp" name="form1" id="form1" method="post">
                <input type="hidden" name="id_kuas" id="id_kuas" value="<?php echo $c->id_kuas; ?>">              
                <div class="form-group">
                  <label>Keterangan (Telah memenuhi syarat untuk mengikuti UAS?) :</label>
                  <textarea class="form-control" name="keterangan" id="keterangan" rows="3" placeholder="Masukkan Keterangan"></textarea>
                </div>
                <div class="form-group">
                <label for="exampleInputEmail1">Hasil :</label>
                  <div class="radio">
                    <label>
                      <input type="radio" name="hasil" id="hasil" value="1">
                      Telah Memenuhi Syarat
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="hasil" id="hasil" value="2">
                      Belum Memenuhi Syarat
                    </label>
                  </div>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?php echo base_url() ?>wdosen/ajuan_kuas2022"><button type="button" class="btn btn-success pull-left"><i class="fa fa-chevron-left"></i>Kembali</button></a>
                </form>
              <?php } ?>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </section>
      <!-- /.content -->