 <!-- Main content -->
      <section class="content">

        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Form Tambah Kliring Prada</h3>
          </div>
          <div class="box-body">
            <?php echo validation_errors(); 
            echo $this->session->flashdata('success');
            echo $this->session->flashdata('error');
            foreach($catarz as $c){ 
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
                  <td><label for="exampleInputEmail1">Judul Prada</label></td>
                  <td><label for="exampleInputEmail1">:</label></td>
                  <td><label for="exampleInputEmail1"><?php echo $c->judul_k; ?></label></td>
                </tr>
                
               
              </table>
            <?php } ?>
              <hr>
              <?php             
              foreach($catar as $c){  ?>
              <form action="<?php echo base_url() ?>wdosen/ekliringp_prada" name="form1" id="form1" method="post">
                <input type="hidden" name="id_kp_prodi" id="id_kp_prodi" value="<?php echo $c->id_kp_prodi; ?>">
                <input type="hidden" name="id_kp" id="id_kp" value="<?php echo $c->id_kp; ?>">
                <div class="form-group">
                  <label for="exampleInputEmail1">Dosen Pembimbing 1</label>
                  <input type="text" name="dosbing1" class="form-control" value="<?php echo $c->dosbing1 ?>">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Dosen Pembimbing 2</label>
                  <input type="text" name="dosbing2" class="form-control"  value="<?php echo $c->dosbing2 ?>">
                </div>
                 <div class="form-group">
                <label for="exampleInputEmail1">Hasil :</label>
                  <div class="radio">
                    <label>
                      <input type="radio" name="hasil" id="hasil" value="1" value="1" <?php echo ($c->hasil == '1') ? 'checked' : ''; ?>>
                      Telah Memenuhi Syarat
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="hasil" id="hasil" value="2" value="1" <?php echo ($c->hasil == '2') ? 'checked' : ''; ?>>
                      Belum Memenuhi Syarat
                    </label>
                  </div>
                </div>
                <div class="form-group">
                  <label>Keterangan :</label>
                  <textarea class="form-control" name="keterangan" id="keterangan" rows="3" placeholder="Masukkan Keterangan"><?php echo $c->keterangan ?></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?php echo base_url() ?>wdosen/ajuan_prada"><button type="button" class="btn btn-success pull-left"><i class="fa fa-chevron-left"></i>Kembali</button></a>
                </form>
              <?php } ?>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </section>
      <!-- /.content -->