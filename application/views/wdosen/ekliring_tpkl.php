 <!-- Main content -->
      <section class="content">

        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Form Tambah Kliring Turun PKL</h3>
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
                  <td><label for="exampleInputEmail1"><?php echo $c->judul_pkl; ?></label></td>
                </tr>
                
               
              </table>
            <?php } ?>
              <hr>
              <?php             
              foreach($catar as $c){  ?>
              <form action="<?php echo base_url() ?>wdosen/ekliringp_tpkl" name="form1" id="form1" method="post">
                <input type="hidden" name="id_tpkl_prodi" id="id_tpkl_prodi" value="<?php echo $c->id_tpkl_prodi; ?>">
                <input type="hidden" name="id_tpkl" id="id_tpkl" value="<?php echo $c->id_tpkl; ?>">
                <div class="form-group">
                  <label for="exampleInputEmail1">Dosen Pembimbing</label>
                  <!-- <input type="text" name="dosbing" class="form-control" value="<?php //echo $c->dosbing ?>"> -->
                   <select class="select2 form-control" name="dosbing">
                    <option value="<?php echo $c->dosbing ?>"><?php echo $wdosen->getNamaDosen($c->dosbing); ?></option>
                    <?php foreach ($dosen as $key) {
                      # code... ?>
                         <option value="<?php echo $key->Kode_dosen ?>"><?php echo $key->Nama_dosen ?></option>
                    <?php } ?>
                  </select>
                </div>
                <!-- <div class="form-group">
                  <label for="exampleInputEmail1">Dosen Pembimbing 2</label>
                  <input type="text" name="dosbing2" class="form-control"  value="<?php// echo $c->dosbing2 ?>">
                </div> -->
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
                <a href="<?php echo base_url() ?>wdosen/ajuan_pkl"><button type="button" class="btn btn-success pull-left"><i class="fa fa-chevron-left"></i>Kembali</button></a>
                </form>
              <?php } ?>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </section>
      <!-- /.content -->