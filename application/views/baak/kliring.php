 <!-- Main content -->
      <section class="content">

        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Form Tambah Kliring</h3>
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
              </table>
              <hr>
              <form action="<?php echo base_url() ?>baak/kliringp" name="form1" id="form1" method="post">
                <input type="hidden" name="id_uks" id="id_uks" value="<?php echo $c->id_uks; ?>">
                <div class="form-group">
                <label for="exampleInputEmail1">Index Prestasi IP :</label>
                  <input class="form-control" type="text" name="smt1" id="smt1" placeholder="Nilai semester 1">
                  <input class="form-control" type="text" name="smt2" id="smt2" placeholder="Nilai semester 2">
                  <input class="form-control" type="text" name="smt3" id="smt3" placeholder="Nilai semester 3">
                  <input class="form-control" type="text" name="smt4" id="smt4" placeholder="Nilai semester 4">
                  <input class="form-control" type="text" name="smt5" id="smt5" placeholder="Nilai semester 5">
                  <input class="form-control" type="text" name="smt6" id="smt6" placeholder="Nilai semester 6">
                  <input class="form-control" type="text" name="smt7" id="smt7" placeholder="Nilai semester 7">
                  <input class="form-control" type="text" name="smt8" id="smt8" placeholder="Nilai semester 8">
                  <input class="form-control" type="text" name="smt_mat" id="smt_mat" placeholder="Nilai semester martikulasi">
                  </div>
              
                 <div class="form-group">
                <label for="exampleInputEmail1">Scan Ijazah dan Transkip Nilai D-III (ekstensi) :</label>
                  <div class="radio">
                    <label>
                      <input type="radio" name="fcijasah_trans" id="fcijasah_trans" value="1">
                      Sudah
                    </label>
                  </div>
                  <div class="radio">
                    <label>
                      <input type="radio" name="fcijasah_trans" id="fcijasah_trans" value="2">
                      Belum
                    </label>
                  </div>
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
                <div class="form-group">
                  <label>Keterangan :</label>
                  <textarea class="form-control" name="keterangan" id="keterangan" rows="3" placeholder="Masukkan Keterangan"></textarea>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?php echo base_url() ?>baak/ajuan"><button type="button" class="btn btn-success pull-left"><i class="fa fa-chevron-left"></i>Kembali</button></a>
                </form>
              <?php } ?>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </section>
      <!-- /.content -->