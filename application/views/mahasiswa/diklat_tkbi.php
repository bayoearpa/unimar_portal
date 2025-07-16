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
                  if ($model_bayar == 'tf_bni') {
                    # code... ?>
                     <!-- peringatan jika sudah pernah Mendaftar dan harus membayar  -->
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                        Pengisian anda Berhasil!, Lakukan Pembayaran agar nama anda terdaftar mengikuti English Achievement
                    </div>
                    <!-- end peringatan jika sudah pernah Mendaftar dan harus membayar  -->
                     <p align="center">Untuk Pembayaran dapat di Transfer ke Bank BTN dengan nomor rekening <b>0838810730 an. UNIMAR AMNI</b> biaya yang harus anda bayar sebesar:</p>
                    <h2 align="center">Rp. 295.000,-</h2>
                    <form id="buktiBayarForm" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="editufsignon">Upload Bukti Bayar (file harus dengan format .pdf dan Maks. 1 MB)</label>
                        <input type="hidden" name="nim" id="nim" value="<?php echo $nim_kirim; ?>">
                        <input type="hidden" name="nama" id="nama" value="<?php echo $nama_kirim; ?>">
                        <input type="hidden" name="id_tkbix" id="id_tkbix" value="<?php echo $id_tkbix; ?>">
                        <input type="file" class="form-control" id="bukti_bayar" name="bukti_bayar">
                       <!--  <input type="hidden" id="editufsignon_existing" name="ufsignon_existing" value="<?php //echo $c->upload_file_signon; ?>"> -->
                    </div>
                    <div id="fileUploadStatus">Belum ada file yang diunggah.</div>

                    <button type="button" class="btn btn-primary" id="saveBuktiBayar">Simpan</button>
                  </form>
                <?php  }else{ ?>
                   <!-- peringatan jika bayar langsung  -->
                <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                    Tunggu Pembayaran anda sedang di proses
                </div>
                  <!-- end peringatan jika bayar langsung  -->
               <?php }


                 } ?>


          <?php }elseif ($cek_periode > "0") {
            # code... ?>
             <?php 
            // echo validation_errors(); 
            // echo $this->session->flashdata('success');
            // echo $this->session->flashdata('error');
            foreach($mhs_detail as $c){ 
              ?>
             
              <form action="<?php echo base_url() ?>mahasiswa/tkbip" name="form1" id="form1" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_kelas" id="id_kelas" value="<?php echo $id_kelas; ?>">
                <input type="hidden" name="nim" id="nim" value="<?php echo $c->nim; ?>">
                 <div class="form-group">
                   <div class="form-group">
                        <label for="editnamakapal">email (Pastikan email aktif):</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="editnamakapal">No Whatsapp : (Pastikan No. WA masih aktif)</label>
                        <input type="number" class="form-control" id="no_wa" name="no_wa">
                    </div>
                     <div class="form-group">
                        <label for="editstatonboard">Pilih Model Pembayaran:</label>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="model_bayar" name="model_bayar" value="tf_bni">
                            <label class="form-check-label" for="valstatonboard">Transfer BNI</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="model_bayar" name="model_bayar" value="loket">
                            <label class="form-check-label" for="valstatonboard">Langsung di Loket</label>
                        </div>
                      <!--   <div class="form-check">
                            <input type="radio" class="form-check-input" id="model_bayar" name="model_bayar" value="qris">
                            <label class="form-check-label" for="valstatonboard">QRIS</label>
                        </div> -->
                    </div>
                  </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
                
                 <!-- .cek status laporan -->



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