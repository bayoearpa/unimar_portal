 <!-- Main content -->
      <section class="content">

        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Form Pengajuan Pasca Prala</h3>
          </div>
          <div class="box-body">
            <?php 
            // echo validation_errors(); 
            // echo $this->session->flashdata('success');
            // echo $this->session->flashdata('error');
            // foreach($catar as $c){ 
              ?>
              <table>
                <tr>
                  <td><label for="exampleInputEmail1">NIM</label></td>
                  <td><label for="exampleInputEmail1">:</label></td>
                  <td><label for="exampleInputEmail1"><?php //echo $c->nim; ?></label></td>
                </tr>
                <tr>
                  <td><label for="exampleInputEmail1">Nama</label></td>
                  <td><label for="exampleInputEmail1">:</label></td>
                  <td><label for="exampleInputEmail1"><?php //echo $nama; ?></label></td>
                </tr>
              </table>
              <hr>
              <form action="<?php //echo base_url() ?>baak/kliringp_pkl" name="form1" id="form1" method="post">
                <input type="hidden" name="id_pkl" id="id_pkl" value="<?php //echo $c->id_pkl; ?>">
                <div class="form-group">
                <label for="exampleInputEmail1">Index Prestasi IP :</label>
                  <input class="form-control" type="text" name="smt1" id="smt1" placeholder="Nilai semester 1">
                  <input class="form-control" type="text" name="smt2" id="smt2" placeholder="Nilai semester 2">
                  <input class="form-control" type="text" name="smt3" id="smt3" placeholder="Nilai semester 3">
                  <input class="form-control" type="text" name="smt4" id="smt4" placeholder="Nilai semester 4">
                  <input class="form-control" type="text" name="smt5" id="smt5" placeholder="Nilai semester 5">
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
                <a href="<?php //echo base_url() ?>baak/ajuan_pkl"><button type="button" class="btn btn-success pull-left"><i class="fa fa-chevron-left"></i>Kembali</button></a>
                </form>
              <?php //} ?>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </section>
      <!-- /.content -->