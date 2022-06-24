 <!-- Main content -->
      <section class="content">

        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Form Edit Kliring</h3>
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
              </table>
              <hr>
              <?php
            }
            foreach($catar as $c){ 
              ?>
              <form action="<?php echo base_url() ?>bk/ekliringp" name="form1" id="form1" method="post">
                <input type="hidden" name="id_uks" id="id_uks" value="<?php echo $c->id_uks; ?>">
                <input type="hidden" name="id_uks_bk" id="id_uks_bk" value="<?php echo $c->id_uks_bk; ?>">
                <div class="form-group">
                <label for="exampleInputEmail1">Pembayaran SPP sampai tahap:</label>
                  <input class="form-control" type="text" name="spp_a" id="spp_a" value="<?php echo $c->spp_a; ?>">
                </div>
                <div class="form-group">
                <label for="exampleInputEmail1">Sampai dengan:</label>
                  <input class="form-control" type="text" name="spp_b" id="spp_b" value="<?php echo $c->spp_b; ?>">
                </div>
                <div class="form-group">
                <label for="exampleInputEmail1">Pembayaran SPP :</label>
                  <div class="radio">
                    <label>
                      <input type="radio" name="spp" id="spp" value="1" <?php echo ($c->spp == '1') ? 'checked' : ''; ?>>
                      Lunas
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="spp" id="spp" value="2" <?php echo ($c->spp == '2') ? 'checked' : ''; ?>>
                      Belum Lunas
                    </label>
                  </div>
                </div>
                 <div class="form-group">
                <label for="exampleInputEmail1">Hasil :</label>
                  <div class="radio">
                    <label>
                      <input type="radio" name="hasil" id="hasil" value="1" <?php echo ($c->hasil == '1') ? 'checked' : ''; ?>>
                      Telah Memenuhi Syarat
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="hasil" id="hasil" value="2" <?php echo ($c->hasil == '2') ? 'checked' : ''; ?>>
                      Belum Memenuhi Syarat
                    </label>
                  </div>
                </div>
                <div class="form-group">
                  <label>Keterangan :</label>
                  <textarea class="form-control" name="keterangan" id="keterangan" rows="3" placeholder="Masukkan Keterangan"><?php echo $c->keterangan ?></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?php echo base_url() ?>bk/ajuan"><button type="button" class="btn btn-success pull-left"><i class="fa fa-chevron-left"></i>Kembali</button></a>
                </form>
              <?php } ?>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </section>
      <!-- /.content -->