 <!-- Main content -->
      <section class="content">

        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Registration of English Achievement</h3>
          </div>
          <div class="box-body">
            <?php  
            foreach($mhs_detail as $c){ 
              ?>
             <table width="50%">
                <tr>
                  <td><label for="exampleInputEmail1">NIM</label></td>
                  <td><label for="exampleInputEmail1">:</label></td>
                  <td><label for="exampleInputEmail1"><?php echo $c->nim;$nim_kirim = $c->nim; ?></label></td>
                </tr>
                <tr>
                  <td><label for="exampleInputEmail1">Nama</label></td>
                  <td><label for="exampleInputEmail1">:</label></td>
                  <td><label for="exampleInputEmail1"><?php echo $c->nama;$nama_kirim = $c->nama; ?></label></td>
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
              </table>
              <hr>
            <?php } ?>

             <?php 
             
              if ($cekstatus_double > "0") {
              # code... ?>

                <?php if ($cekstatus_bayar > "0") { ?>
                 
                  <table class="table table-hover">
                <tbody><tr>
                  <th>NIM</th>
                  <th>Bukti Bayar</th>
                  <th>Status</th>
                </tr>
                <tr>
                  <td><?php echo $nim_kirim; ?></td>
                  <td>
                     <?php if ($bukti_bayar) { ?>
                      <button class="btn btn-success view-file-button" data-filename="<?php echo $bukti_bayar; ?>">Lihat Bukti Bayar</button>
                      <form id="buktiBayarForm" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="hidden" name="id_tkbix" id="id_tkbix" value="<?php echo $id_tkbix; ?>">
                        <input type="hidden" name="nim" id="nim" value="<?php echo $nim_kirim; ?>">
                         <input type="hidden" name="model_bayar" id="model_bayar" value="<?php echo $model_bayar; ?>">
                        <input type="hidden" name="status_bayar" id="status_bayar" value="sudah">
                    </div>

                    <button type="button" class="btn btn-primary" id="saveBuktiBayar">Bayar</button>
                  </form>
                      <?php } else { ?>
                      <!-- Tampilkan pesan jika file tidak ada -->
                      File tidak tersedia
                      <?php } ?>
                  </td>
                  <td><?php if ($status_bayar == "sudah") {
                    # code...?>
                    <span class="label label-success">Sudah Terverifikasi</span></td>
                  <?php }else{ ?>
                    <span class="label label-danger">Belum Terverifikasi</span></td>
                </tr>
              </tbody></table>

                <?php }}else{ 

                  // cek model pembayaran
                  if ($model_bayar == 'loket') {
                    # code... ?>
                     <!-- peringatan jika sudah pernah Mendaftar dan harus membayar  -->
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                        Pengisian anda Berhasil!, Lakukan Pembayaran agar nama anda terdaftar mengikuti English Achievement
                    </div>
                    <!-- end peringatan jika sudah pernah Mendaftar dan harus membayar  -->
                     <p align="center">Untuk Pembayaran dapat di Transfer ke Bank BTN dengan nomor rekening <b>0838810730 an. UNIMAR AMNI</b> biaya yang harus anda bayar sebesar:</p>
                    <h2 align="center">Rp. 290.000,-</h2>
                    <form id="buktiBayarForm" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="hidden" name="nim" id="nim" value="<?php echo $nim_kirim; ?>">
                        <input type="hidden" name="nama" id="nama" value="<?php echo $nama_kirim; ?>">
                        <input type="hidden" name="id_tkbix" id="id_tkbix" value="<?php echo $id_tkbix; ?>">
                        <input type="hidden" name="status_bayar" id="status_bayar" value="sudah">
                        <input type="hidden" name="model_bayar" id="model_bayar" value="<?php echo $model_bayar; ?>">

                    </div>
                    <div id="fileUploadStatus">Belum ada file yang diunggah.</div>

                    <button type="button" class="btn btn-primary" id="saveBuktiBayar">Bayar</button>
                  </form>
                <?php  }//else{ ?>

                    <!-- <form id="buktiBayarForm" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="hidden" name="id_tkbix" id="id_tkbix" value="<?php //echo $id_tkbix; ?>">
                         <input type="hidden" name="model_bayar" id="model_bayar" value="<?php //echo $model_bayar; ?>">
                        <input type="hidden" name="status_bayar" id="status_bayar" value="sudah">
                    </div>

                    <button type="button" class="btn btn-primary" id="saveBuktiBayar">Bayar</button>
                  </form> -->


                <?php //}


                 } ?>


          <?php }elseif ($cek_periode > "0") {
            # code... ?>
             <?php 
            foreach($mhs_detail as $c){ 
              ?>
             
             <!-- peringatan jika belum daftar  -->
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                    Silakan Mengisi Form Pendaftaran Tes Kompetensi Bahasa Inggris Di Portal
                </div>
         <?php } ?>
          
                <?php }else{ ?>
                <!-- peringatan jika periode belum dibuka  -->
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                    Periode Pendafataran English Achievement belum dibuka
                </div>
            <!-- end peringatan jika periode belum dibuka  -->

              <?php } ?>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </section>
      <!-- /.content -->