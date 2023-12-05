 <!-- Main content -->
      <section class="content">

        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Form Pengajuan Ujian Pra Prala</h3>
          </div>
          <div class="box-body">

            
            <?php if ($mahasiswa->cekstatus('status_prada','sudah', $this->session->userdata('user')) > "0" ) {
              # code... ?>

            <?php 
            // echo validation_errors(); 
            echo $this->session->flashdata('success');
            echo $this->session->flashdata('error');
            foreach($mhs_detail as $c){ 
              ?>
              <table width="30%">
                <tr>
                  <td><label for="exampleInputEmail1">NIM</label></td>
                  <td><label for="exampleInputEmail1">:</label></td>
                  <td><label for="exampleInputEmail1"><?php echo $c->nim; ?></label></td>
                </tr>
                <tr>
                  <td><label for="exampleInputEmail1">Nama</label></td>
                  <td><label for="exampleInputEmail1">:</label></td>
                  <td><label for="exampleInputEmail1"><?php echo $c->nama; ?></label></td>
                </tr>
                 <tr>
                  <td><label for="exampleInputEmail1">Tanggal Lahir</label></td>
                  <td><label for="exampleInputEmail1">:</label></td>
                  <td><label for="exampleInputEmail1"><?php echo $c->tgll; ?></label></td>
                </tr>
                 <tr>
                  <td><label for="exampleInputEmail1">Alamat</label></td>
                  <td><label for="exampleInputEmail1">:</label></td>
                  <td><label for="exampleInputEmail1"><?php echo $c->alamat; ?></label></td>
                </tr>
                <tr>
                  <td><label for="exampleInputEmail1">Jenis Kelamin</label></td>
                  <td><label for="exampleInputEmail1">:</label></td>
                  <td><label for="exampleInputEmail1"><?php echo $valjk = ($c->jk == 'L') ? "Laki-laki" : "Perempuan" ; ?></label></td>
                </tr>
                 <tr>
                  <td><label for="exampleInputEmail1">Seafarercode</label></td>
                  <td><label for="exampleInputEmail1">:</label></td>
                  <td><label for="exampleInputEmail1"><?php echo $c->seafarercode; ?></label></td>
                </tr>
                <tr>
                  <td colspan="3"><b><center>Periode</center></b></td>
                </tr>
                <tr>
                  <td><label for="exampleInputEmail1">Bulan</label></td>
                  <td><label for="exampleInputEmail1">:</label></td>
                  <td><label for="exampleInputEmail1"><?php echo $set_bulan; ?></label></td>
                </tr>
                <tr>
                  <td><label for="exampleInputEmail1">Tahun</label></td>
                  <td><label for="exampleInputEmail1">:</label></td>
                  <td><label for="exampleInputEmail1"><?php echo $set_tahun; ?></label></td>
                </tr>
              </table>
              <hr>
              <!-- cek sudah melakukan pendaftaran sebelumnya  -->
              <?php if ($ceklog > "0") {
                # code... ?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                    Maaf anda sudah melakukan pendaftaran silakan hubungi admin untuk melakukan reset.
                </div>
              <?php }else{ ?>
              <!-- cek sudah melakukan pendaftaran sebelumnya  -->
              <form action="<?php echo base_url() ?>mahasiswa/prap" name="form1" id="form1" method="post">
                <input type="hidden" name="seafarercode" id="seafarercode" value="<?php echo $c->seafarercode; ?>">
                <input type="hidden" name="bulan" id="bulan" value="<?php echo $c->set_bulan; ?>">
                <input type="hidden" name="tahun" id="tahun" value="<?php echo $c->set_tahun; ?>">
                <input type="hidden" name="id_profesi" id="id_profesi" value="<?php echo $valprodi = ($this->session->userdata('prodi') == '92403') ? "1" : "2" ; ?>">
                <input type="hidden" name="jenis" id="jenis" value="1">
               <div class="form-group">
                        <label for="status">Status (Perdana/Ulang)*:</label>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="status" name="estatoffboard" value="1">
                            <label class="form-check-label" for="status">Perdana</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="status" name="estatoffboard" value="2">
                            <label class="form-check-label" for="status">Ulang</label>
                        </div>
                    </div>
              
                 <table class="table table-striped">
                        <tbody><tr>
                          <th style="width: 10px">#</th>
                          <th style="width: 10px">pilih</th>
                          <th>Mata Uji</th>
                        </tr>
                        <?php
                        $no=1;
                         foreach ($mu as $key) {
                          # code... ?>
                        <tr>
                          <td><?php echo $no++; ?></td>
                          <td><input type="checkbox" name="matauji[]" value="<?php echo $key->id_matauji ?>"></td>
                          <td><?php echo $key->matauji ?></td>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
              <?php }} ?>

              <?php }else{ ?>
                <!-- peringatan jika belum boleh mendafatar  -->
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                    anda belum diizinkan untuk mendafatar Ujian Pra Prala karena belum melakukan PRADA
                </div>
            <!-- end peringatan jika belum boleh mendafatar  -->

              <?php } ?>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </section>
      <!-- /.content -->