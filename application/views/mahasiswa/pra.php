 <!-- Main content -->
      <section class="content">

        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Form Pengajuan Ujian Pra Prala</h3>
          </div>
          <div class="box-body">

            
            <?php if ($mahasiswa->cekstatus('status_prada','sudah') > 0 ) {
              # code... ?>

            <?php 
            // echo validation_errors(); 
            // echo $this->session->flashdata('success');
            // echo $this->session->flashdata('error');
            foreach($mhs as $c){ 
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
              </table>
              <hr>
              <form action="<?php //echo base_url() ?>baak/kliringp_pkl" name="form1" id="form1" method="post">
                <input type="hidden" name="id_pkl" id="id_pkl" value="<?php //echo $c->id_pkl; ?>">
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
                        $no=2;
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
              <?php } ?>

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