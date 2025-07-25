 <!-- Main content -->
      <section class="content">

        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Form Laporan Onboard</h3>
          </div>
          <div class="box-body">
             <?php 
             
              if ($mahasiswa->cekstatus('status_sb','iya', $this->session->userdata('user')) > "0" || $mahasiswa->cekstatus('status_onboard','iya', $this->session->userdata('user')) > "0" ) {
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
              <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-warning"></i> Harap diperhatikan!</h4>
                    Batas waktu taruna Prala mengirimkan laporan sign on ke kampus melalui email atau
                  link/website yang sudah disiapkan oleh Bagian PPK adalah maksimal 1 (satu) bulan / 30 Hari
                  setelah taruna naik kapal.
                </div>
              <form action="<?php echo base_url() ?>mahasiswa/onboardp" name="form1" id="form1" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_mon" id="id_mon" value="<?php echo $c->id_mon; ?>">
                <input type="hidden" name="nim" id="nim" value="<?php echo $c->nim; ?>">
                 <div class="form-group">
                   <div class="form-group">
                        <label for="editnamakapal">Nama Perusahaan:</label>
                        <input type="text" class="form-control" id="namaperusahaan" name="namaperusahaan" value="<?php echo $c->nama_perusahaan; ?>">
                    </div>
                    <div class="form-group">
                        <label for="editnamakapal">Nama Kapal:</label>
                        <input type="text" class="form-control" id="namakapal" name="namakapal" value="<?php echo $c->nama_kapal; ?>">
                    </div>
                    <div class="form-group">
                        <label for="edittglsignon">Tanggal Sign On:</label>
                        <input type="date" class="form-control" id="edittglsignon" name="tglsignon" value="<?php echo $c->tgl_sign_on; ?>">
                    </div>
                   <div class="form-group">
                        <label for="editufsignon">Upload File Sign On (file harus dengan format .pdf dan Maks. 1 MB)</label>
                        <input type="file" class="form-control" id="editufsignon" name="ufsignon">
                        <input type="hidden" id="editufsignon_existing" name="ufsignon_existing" value="<?php echo $c->upload_file_signon; ?>">
                    </div>
                    <div id="fileUploadStatus">Belum ada file yang diunggah.</div>
                   
                    <div class="form-group">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="status_onboard" name="status_onboard" value="iya" required="harus dicentang!" <?php echo $cek = ($c->status_onboard == "iya") ? "Checked" : "" ; ?>>
                            <label class="form-check-label" for="addstatpra">Dengan mencentang tombol berikut menandakan anda telah melakukan laporan Onboard kepada PPK UNIMAR AMNI Semarang.</label>
                        </div>
                    </div>
                  </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
               <!--  <a href="<?php //echo base_url() ?>mahasiswa/onboard"><button type="button" class="btn btn-success pull-left"><i class="fa fa-chevron-left"></i>Kembali</button></a> -->
                </form>
                <!-- cek status laporan -->
                <?php if ($c->tgl_lap_sign_on > "0") {
                  # code... ?>
                  <!-- Tombol Lihat File Sign On -->
                    <?php if ($c->upload_file_signon) { ?>
                        <button class="btn btn-success view-file-button" data-filename="<?php echo $c->upload_file_signon; ?>">Lihat file onboard</button>
                    <?php } else { ?>
                        <!-- Tampilkan pesan jika file tidak ada -->
                        File tidak tersedia
                    <?php } ?>
                  <div class="alert alert-info alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-thumbs-o-up"></i> Terima Kasih!</h4>
                    Anda telah melakukan pelaporan onboard.
                  </div>
                <?php }elseif ($c->tgl_lap_sign_on > "0" && $selisihHari > 30) {
                  # code... ?>
                  <!-- Tombol Lihat File Sign On -->
                    <?php if ($c->upload_file_signon) { ?>
                        <button class="btn btn-success view-file-button" data-filename="<?php echo $c->upload_file_signon; ?>">Lihat file onboard</button>
                    <?php } else { ?>
                        <!-- Tampilkan pesan jika file tidak ada -->
                        File tidak tersedia
                    <?php } ?>
                  <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                    Anda terditeksi melakukan pelaporan lebih dari 30 Hari silakan menghubungi PPK!
                   </div>
                <?php } ?>
                
                 <!-- .cek status laporan -->
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