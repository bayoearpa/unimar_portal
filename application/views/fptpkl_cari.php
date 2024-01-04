

      <!-- Main content -->
      <section class="content">
        <!-- <div class="callout callout-info">
          <h4>Tip!</h4>

          <p>Add the layout-top-nav class to the body tag to get this layout. This feature can also be used with a
            sidebar! So use this class if you want to remove the custom dropdown menus from the navbar and use regular
            links instead.</p>
        </div> -->
      <!--   <div class="callout callout-danger">
          <h4>Warning!</h4>

          <p>The construction of this layout differs from the normal one. In other words, the HTML markup of the navbar
            and the content will slightly differ than that of the normal layout.</p>
        </div> -->
        <div class="box box-default">
          <div class="box-header with-border">
            <h3 class="box-title">Pengajuan Turun PKL</h3>
          </div>
          <div class="box-body">
                  <!-- row -->
      <div class="row">
        <div class="col-md-12">

          <!-- konten -->
          <?php 
    // echo validation_errors(); 
    
    if ($this->session->flashdata('success') > "0") {
      # code...
      echo "<div class='alert alert-success'>".$this->session->flashdata('success')."</div>";
    }
     if ($this->session->flashdata('error') > "0") {
      # code...
      echo "<div class='alert alert-danger'>".$this->session->flashdata('error')."</div>";
    }
    ?>
  <form name="form1" id="form1" method="post" enctype="multipart/form-data" action="<?php echo base_url() ?>cek_tpkl">
    <div class="form-group">
      <a href="<?php echo base_url() ?>ajuan_tpkl"><button type="button" class="btn bg-orange btn-flat margin">Ajukan Turun PKL</button></a>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail">Masukan NIM anda untuk cek proses kliring Turun PKL</label>
      <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan NIM anda">
    </div>            
        <button type="submit" class="btn btn-primary">Cari</button>   
    <div class="form-group">
      <ol>
          <li>Lakukan pengajuan Turun PKL dengan klik tombol "Ajukan Turun PKL"</li>
          <li>Setelah proses ajuan selesai, untuk melakukan cek proses ajuan silakan memasukkan nim pada form diatas.</li>
          <li>lalu akan muncul update proses pengajuan PKL. jika semua proses telah di <b>ACC</b> maka proses pengajuan PKL telah selesai.</li>
      </ol>
    </div>

    <!-- cari -->
     <?php 
if ($catar==null) {
  
  echo "<div class='alert alert-danger'>Data Tidak Ditemukan.</div>";
}else{
 foreach($catar as $c){  ?>
              <!-- data diri -->
               <table class="table">
                <tr>
                  <td width="10%"><label for="exampleInputEmail1">NIM</label></td>
                  <td width="5%"><label for="exampleInputEmail1">:</label></td>
                  <td><label for="exampleInputEmail1"><?php echo $nim; ?></label></td>
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
                <tr>
                  <td><label for="exampleInputEmail1">Judul PKL</label></td>
                  <td><label for="exampleInputEmail1">:</label></td>
                  <td><label for="exampleInputEmail1"><?php echo $judul_pkl; ?></label></td>
                </tr>
               
              
              </table>
               <div class="form-group">
              <label for="exampleInputEmail1">Keterangan :</label>
              <a class="btn btn-warning btn-sm" href="#"><i class="fa fa-gear"></i></a>Kliring di PROSES,
              <a class="btn btn-success btn-sm" href="#"><i class="fa fa-check"></i></a>Kliring di ACC,
              <a class="btn btn-danger btn-sm" href="#"><i class="fa fa-close"></i></a>Kliring di TOLAK
              </div>
              <!-- /data diri -->

              <table class="table table-bordered">
                <tr>
                  <td>1.</td>
                  <td>Prodi</td>
                  <td>
                    <?php echo $prodi_ket; ?>
                  </td>
                  <td><?php echo $prodi_label; ?></td>
                </tr>
                <tr>
                  <td>2.</td>
                  <td>PPK</td>
                  <td>
                    <?php echo $ppk_ket; ?>
                  </td>
                  <td><?php echo $ppk_label; ?></td>
                </tr>
                <tr>
                  <td>3.</td>
                   <!-- Tombol Lihat File Sign On -->
                    <?php if ($c->file_konduite) { ?>
                        <td>File Konduite tersedia</td>
                        <td colspan="2"> <button class="btn btn-info view-file-button" data-filename="$c->file_konduite; ?>">Lihat</button></td>
                    <?php } else { ?>
                        <!-- Tampilkan pesan jika file tidak ada -->
                        <td>File Konduite tidak tersedia</td>
                        <td colspan="2">
                        <div class="form-group">
                        <label for="file_konduite">Upload File Konduite</label>
                        <input type="file" class="form-control" id="file_konduite" name="file_konduite">
                        <button class="editfk-button" data-id-tpkl="<?php echo $c->id_tpkl; ?>">Edit File Konduite</button>
                        </div>
                        </td>
                    <?php } ?>
                </tr>
                <tr>
                  <td>4.</td>
                   <!-- Tombol Lihat File Sign On -->
                    <?php if ($c->file_suratketoff) { ?>
                        <td>File Konduite tersedia</td>
                        <td colspan="2"> <button class="btn btn-info view-file-button" data-filename="$c->file_suratketoff; ?>">Lihat</button></td>
                    <?php } else { ?>
                        <!-- Tampilkan pesan jika file tidak ada -->
                        <td>File Surat Keterangan Off tidak tersedia</td>
                        <td colspan="2">
                        <div class="form-group">
                        <label for="file_suratketoff">Upload File Surat Keterangan Off</label>
                        <input type="file" class="form-control" id="file_suratketoff" name="file_suratketoff">
                        <button class="editsk-button" data-id-tpkl="<?php echo $c->id_tpkl; ?>">Edit File Surat Ket Off</button>
                        </div>
                        </td>
                    <?php } ?>
                </tr>
                 <tr>
                   <td colspan="4">
                     <?php 
                      if ($tombol == 1) {
                        # code...
                       echo $tombol = "<a class='btn btn-warning btn-sm' href='cetaksuratpermohonanturunpkl/$c->id_tpkl'><span class='glyphicon glyphicon-print'> </span>Cetak Permohonan Praktek Kerja Lapangan</a>";                     
                      }else{
                       echo  $tombol = "<a class='btn btn-danger btn-sm' href='#''><span class='glyphicon glyphicon-print'> </span>Belum Bisa Download Permohonan</a>";
                      }
                      ?>
                   </td>
                 </tr>
              </table>


              <?php }}?>
    <!-- /.cari -->
        
          <!-- /.konten -->
          
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
          </div>
          <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
 