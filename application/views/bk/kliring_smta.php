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
                  <td><label for="exampleInputEmail1">Prodi</label></td>
                  <td><label for="exampleInputEmail1">:</label></td>
                  <td><label for="exampleInputEmail1"><?php echo $prodi; ?></label></td>
                </tr>
               
              </table>
              <hr>
               <?php 
                if ($list_makul==null) {
                      
                      echo "<div class='alert alert-danger'>Mahasiswa/Taruna Ini belum divalidasi oleh Prodi.</div>";
                    }else{

                 ?>
               <table class="table table-bordered">
                  <tr>
                    <td><b>Mata Kuliah</b></td>
                    <td><b>SKS</b></td>
                    <td><b>Kuota Peserta Terkini (Maks. 10 Orang)</b></td>
                  </tr>                 
                    <?php 
                      foreach ($list_makul as $keyz) { ?>
                        <tr>
                        <td><?php echo $keyz->nama_makul; ?></td>
                        <td><?php echo $keyz->sks;?></td>
                        <td><?php 
                          echo $bk->countkuotakelas($keyz->kd_makul);
                         ?></td>
                        </tr>
                      <?php
                      # code...
                      }
                     ?>
                  
                </table>
                <table class="table table-bordered">
                  <tr>
                    <td><b>Rincian</b></td>
                    <td><b>yang diambil</b></td>
                    <td><b>Biaya satuan</b></td>
                    <td><b>Total</b></td>
                  </tr>
                  <tr>
                    <td><b>Biaya Administrasi</b></td>
                    <td><?php echo $jml_smt ?></td>
                    <td><?php echo $b_adm?></td>
                    <td><?php echo $tot_adm?></td>
                  </tr>
                  <tr>
                    <td><b>Biaya Per SKS</b></td>
                    <td><?php echo $sum_sks?></td>
                    <td><?php echo $per_sks?></td>
                    <td><?php echo $tot_sks?></td>
                  </tr>
                  <tr>
                    <td colspan="3"><b>TOTAL</b></td>
                    <td><b><?php echo $total?></b></td>
                  </tr>
                </table>

              <form action="<?php echo base_url() ?>bk/kliringsmtap" name="form1" id="form1" method="post">
                 <input type="hidden" name="tot_adm" value="<?php echo $tot_adm?>">
                  <input type="hidden" name="tot_sks" value="<?php echo $tot_sks?>">
                   <input type="hidden" name="total" value="<?php echo $total?>">
                <input type="hidden" name="id_smta" id="id_smta" value="<?php echo $c->id_smta; ?>">              
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
                <a href="<?php echo base_url() ?>bk/ajuan_smta"><button type="button" class="btn btn-success pull-left"><i class="fa fa-chevron-left"></i>Kembali</button></a>
                </form>
              <?php }} ?>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </section>
      <!-- /.content -->