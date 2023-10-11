 <!-- Main content -->
      <section class="content">

        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Form Laporan Onboard</h3>
          </div>
          <div class="box-body">
             <?php 
             
              if ($mahasiswa->cekstatus('status_sb','iya', $this->session->userdata('user')) > "0" ) {
              # code... ?>
            <?php 
            // echo validation_errors(); 
            // echo $this->session->flashdata('success');
            // echo $this->session->flashdata('error');
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
              </table>
              <hr>
              <form action="<?php echo base_url() ?>mahasiswa/onboardp" name="form1" id="form1" method="post">
                <input type="hidden" name="id_mon" id="id_mon" value="<?php //echo $c->id_mon; ?>">
                 <div class="form-group">
                   <div class="form-group">
                        <label for="editnamakapal">Nama Perusahaan:</label>
                        <input type="text" class="form-control" id="editnamakapal" name="editnamakapal">
                    </div>
                    <div class="form-group">
                        <label for="editnamakapal">Nama Kapal:</label>
                        <input type="text" class="form-control" id="editnamakapal" name="editnamakapal">
                    </div>
                    <div class="form-group">
                        <label for="edittglsignon">Tanggal Sign On:</label>
                        <input type="date" class="form-control" id="edittglsignon" name="etglsignon">
                    </div>
                   <div class="form-group">
                        <label for="editufsignon">Upload File Sign On</label>
                        <input type="file" class="form-control" id="editufsignon" name="eufsignon">
                        <input type="hidden" id="editufsignon_existing" name="eufsignon_existing" value="<?php echo $i->upload_file_signon; ?>">
                    </div>
                    <div id="fileUploadStatus">Belum ada file yang diunggah.</div>
                    <div class="form-group">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="addstatpra" name="status_board" value="sudah">
                            <label class="form-check-label" for="addstatpra">Dengan mencentang tombol berikut menandakan anda telah melakukan laporan Onboard kepada PPK UNIMAR AMNI Semarang.</label>
                        </div>
                    </div>
                  </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?php echo base_url() ?>mahasiswa/onboard"><button type="button" class="btn btn-success pull-left"><i class="fa fa-chevron-left"></i>Kembali</button></a>
                </form>
              <?php } ?>
                <?php }else{ ?>
                <!-- peringatan jika belum boleh mendafatar  -->
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                    anda belum diizinkan untuk mengisi form onboard karena belum ujian Pra Prala
                </div>
            <!-- end peringatan jika belum boleh mendafatar  -->

              <?php } ?>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </section>
      <!-- /.content -->