 <!-- Main content -->
      <section class="content">

        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Form Laporan Offboard</h3>
          </div>
          <div class="box-body">
             <?php 
             
              if ($mahasiswa->cekstatus('status_lapon','sudah', $this->session->userdata('user')) > "0" ) {
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
                <tr>
                  <td><label for="exampleInputEmail1">Nama Perusahaan</label></td>
                  <td><label for="exampleInputEmail1">:</label></td>
                  <td><label for="exampleInputEmail1"><?php echo $c->nama_perusahaan; ?></label></td>
                </tr>
                <tr>
                  <td><label for="exampleInputEmail1">Nama Kapal</label></td>
                  <td><label for="exampleInputEmail1">:</label></td>
                  <td><label for="exampleInputEmail1"><?php echo $c->nama_kapal; ?></label></td>
                </tr>
                <tr>
                  <td><label for="exampleInputEmail1">Tanggal Sign On</label></td>
                  <td><label for="exampleInputEmail1">:</label></td>
                  <td><label for="exampleInputEmail1"><?php echo $c->tgl_sign_on; ?></label></td>
                </tr>
              </table>
              <hr>
              <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-warning"></i> Harap diperhatikan!</h4>
                    Batas waktu taruna Prala mengirimkan laporan sign off ke kampus melalui email atau
                  link/website yang sudah disiapkan oleh Bagian PPK adalah maksimal 15 Hari
                  setelah taruna turun kapal.
                </div>
              <form action="<?php echo base_url() ?>mahasiswa/offboardp" name="form1" id="form1" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id_mon" id="id_mon" value="<?php echo $c->id_mon; ?>">
                <input type="hidden" name="nim" id="nim" value="<?php echo $c->nim; ?>">
                 <div class="form-group">
                    <div class="form-group">
                        <label for="edittglsignon">Tanggal Sign Off:</label>
                        <input type="date" class="form-control" id="edittglsignon" name="tglsignoff" value="<?php echo $c->tgl_sign_off; ?>">
                    </div>
                   <div class="form-group">
                        <label for="editufsignon">Upload File Sign Off (file harus dengan format .pdf dan Maks. 1 MB)</label>
                        <input type="file" class="form-control" id="editufsignoff" name="ufsignoff">
                        <input type="hidden" id="editufsignon_existing" name="ufsignoff_existing" value="<?php echo $c->upload_file_signoff; ?>">
                    </div>
                    <div id="fileUploadStatus">Belum ada file yang diunggah.</div>
                     <div class="form-group">
                        <label for="editufsignon">Kru List (file harus dengan format .pdf dan Maks. 1 MB)</label>
                        <input type="file" class="form-control" id="editufkrulist" name="ufkrulist">
                        <input type="hidden" id="editufkrulist_existing" name="ufkrulist_existing" value="<?php echo $c->upload_file_krulist; ?>">
                    </div>
                    <div id="fileUploadStatus">Belum ada file yang diunggah.</div>
                    <div class="form-group">
                        <label for="editufsignon">Ship Particular (file harus dengan format .pdf dan Maks. 1 MB)</label>
                        <input type="file" class="form-control" id="editufshippart" name="ufshippart">
                        <input type="hidden" id="editufshippart_existing" name="ufshippart_existing" value="<?php echo $c->upload_file_shippart; ?>">
                    </div>
                    <div id="fileUploadStatus">Belum ada file yang diunggah.</div>
                    <div class="form-group">
                        <label for="editufsignon">Swafoto dengan background nama kapal / No. IMO (file harus dengan format .jpg)</label>
                        <input type="file" class="form-control" id="editufswafoto" name="ufswafoto">
                        <input type="hidden" id="editufswafoto_existing" name="ufswafoto_existing" value="<?php echo $c->upload_file_swafoto; ?>">
                    </div>
                    <div id="fileUploadStatus">Belum ada file yang diunggah.</div>
                    <div class="form-group">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="status_offboard" name="status_offboard" value="iya" required="harus dicentang!" <?php echo $cek = ($c->status_offboard == "iya") ? "Checked" : "" ; ?>>
                            <label class="form-check-label" for="addstatpra">Dengan mencentang tombol berikut menandakan anda telah melakukan laporan Offboard kepada PPK UNIMAR AMNI Semarang.</label>
                        </div>
                    </div>
                  </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
               <!--  <a href="<?php //echo base_url() ?>mahasiswa/onboard"><button type="button" class="btn btn-success pull-left"><i class="fa fa-chevron-left"></i>Kembali</button></a> -->
                </form>
                <!-- cek status laporan -->
                <?php if ($c->status_offboard == "iya") {
                  # code... ?>
                  <!-- Tombol Lihat File Sign On -->
                    <?php if ($c->upload_file_signoff > "0") { ?>
                        <button class="btn btn-success view-file-button" data-filename="<?php echo $c->upload_file_signoff; ?>">Lihat file offboard</button>
                        <button class="btn btn-success view-file-button" data-filename="<?php echo $c->upload_file_krulist; ?>">Lihat file Kru List</button>
                        <button class="btn btn-success view-file-button" data-filename="<?php echo $c->upload_file_shipart; ?>">Lihat file Ship Particular</button>
                        <button class="btn btn-success view-file-button" data-filename="<?php echo $c->upload_file_swafoto; ?>">Lihat file Swafoto</button>
                    <?php } else { ?>
                        <!-- Tampilkan pesan jika file tidak ada -->
                        File tidak tersedia
                    <?php } ?>
                  <div class="alert alert-info alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-thumbs-o-up"></i> Terima Kasih!</h4>
                    Anda telah melakukan pelaporan offboard.
                  </div>
                <?php }elseif ($c->status_offboard == "iya" && $selisihHari > 15) {
                  # code... ?>
                  <!-- Tombol Lihat File Sign On -->
                    <?php if ($c->upload_file_signoff) { ?>
                        <button class="btn btn-success view-file-button" data-filename="<?php echo $c->upload_file_signoff; ?>">Lihat file offboard</button>
                         <button class="btn btn-success view-file-button2" data-filename="<?php echo $c->upload_file_krulist; ?>">Lihat file Kru List</button>
                        <button class="btn btn-success view-file-button3" data-filename="<?php echo $c->upload_file_shipart; ?>">Lihat file Ship Particular</button>
                        <button class="btn btn-success view-file-button4" data-filename="<?php echo $c->upload_file_swafoto; ?>">Lihat file Swafoto</button>
                    <?php } else { ?>
                        <!-- Tampilkan pesan jika file tidak ada -->
                        File tidak tersedia
                    <?php } ?>
                  <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                    Anda terditeksi melakukan pelaporan lebih dari 15 Hari silakan menghubungi PPK!
                   </div>
                <?php } ?>
                
                 <!-- .cek status laporan -->
              <?php } ?>
                <?php }else{ ?>
                <!-- peringatan jika belum boleh mendafatar  -->
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                    anda belum diizinkan untuk mengisi form offboard karena belum laporan Onboard
                </div>
            <!-- end peringatan jika belum boleh mendafatar  -->

              <?php } ?>
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </section>
      <!-- /.content -->